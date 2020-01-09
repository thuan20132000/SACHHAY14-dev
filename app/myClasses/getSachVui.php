<?php
namespace App\myClasses;

use Illuminate\Support\Facades\DB;
use Sunra\PhpSimple\HtmlDomParser;
Use Exception;  

class getSachVui{

    var $tenSach;
    var $tacGia;
    var $theLoai;
    var $tenKhongDau;
    var $linkHinh;
    var $tenHinh;

    public function getTenSach(){
       return  $this->tenSach;
    }
    public function getTacgia(){
        return  $this->tacGia;
     }
     public function getTenKhongDau(){
        return  $this->tenKhongDau;
     }
     public function getLinkHinhAnh(){
        return  $this->linkHinh;
     }
     public function getTenHinhAnh(){
        return  $this->tenHinh;
     }
     public function getTheLoai(){
         return $this->theLoai;
     }
    
    
    public function getQuery($query)
    {
        DB::statement($query);

       

    }

    function luuHinhAnh($tenhinh,$linkhinh){
        $file="hinhanh/$tenhinh";
        // Function to write image into file 
        file_put_contents($file, file_get_contents($linkhinh));  
        
    }

    public function laySach($idTheLoai,$idSach,$urlSach)
    {
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,$urlSach);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_USERAGENT,'Mozilla');
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);

        $data = curl_exec($curl);
        curl_close($curl);

        $hinhAnh = '/<img src="(https:\/\/sachvui\.com\/cover\/(\d+)\/((.*?)\.jpg))" class="img-thumbnail" alt="(.*?)" width="(\d+)" height="(\d+)">/';
        $tenSachCoDau = '/<h1 class="ebook_title text-primary">(.*?)<\/h1>/';
        $tenTacGia = '/<h5 class="">Tác giả : (.*?)<\/h5>/';
        $tenTheLoai = '/<h5 class="">Thể Loại : <a href="(.*?)">(.*?)<\/a><\/h5>/';
      
        preg_match($tenSachCoDau,$data,$tenSach);
        preg_match($tenTacGia,$data,$tacgia);
        preg_match($tenTheLoai,$data,$theloai);
        preg_match($hinhAnh,$data,$hinh);

        $this->tenHinh =  $hinh[3];
        $this->linkHinh = $hinh[1];
        $this->tenSach = $tenSach[1];
        $this->tacGia =  $tacgia[1];
        $this->theLoai = $theloai[2];
        
        // lay ten khong dau de co linkChuong
        $linkChuong = '/<li> <a href="https:\/\/sachvui\.com\/doc-sach\/(.*?)\/(.*?)\.html" target="_blank">(.*?)<\/a><\/li>/';      
        preg_match($linkChuong,$data,$tenkd);
       
        $this->tenKhongDau =  $tenkd[1];

        $chuong = '/<li> <a href="(.*?)" target="_blank">(.*?)<\/a><\/li>/';
        preg_match($chuong,$data,$linkC);

        $lc = $linkC[1];
        $tkd = $this->tenKhongDau;
        $ts = $this->tenSach;
        $tl = $this->theLoai;
        $tg = $this->tacGia;
        $linkhinh = $this->linkHinh;
        $tenhinh = $this->tenHinh;

        $moicapnhat = '1';
        
        $query = "insert into  sachs(id,tensach,tenkhongdau,tacgia,hinhanh,moicapnhat,id_theloai)
                 values('$idSach','$ts','$tkd','$tg','$tenhinh',$moicapnhat,'$idTheLoai')";
        $this->getQuery($query);
        
       $this->luuHinhAnh($tenhinh,$linkhinh);//luu Hinh Anh 
        

        $this->getAllChuong($lc,$idSach);
    
    }

    public function getAllChuong($linkChuong,$idSach)
        {   
            $curl = curl_init();
            curl_setopt($curl,CURLOPT_URL,$linkChuong);
            curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($curl,CURLOPT_USERAGENT,'Mozilla');
            curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);

            $data = curl_exec($curl);
            curl_close($curl);
        

            $getUl = '/<ul class="dropdown-menu scrollable-menu">(.*?)<\/ul>/';
            preg_match($getUl,$data,$match);

            $getLink = '/<a href="(.*?)">(.*?)<\/a>/';
            preg_match_all($getLink,$match[0],$ChuongAll);
            
            //Lay tat ca cac chuong cua 1 sach
            
            $chuongNumber =1;
            foreach($ChuongAll[1] as $l){
               $this->getNoiDungLink($l,$chuongNumber,$idSach);

            $chuongNumber++;
            //break; //huy vong lap de  test 1 chuong
            }
            
        }

    public function getNoiDungLink($linkC,$sochuong,$idSach)
    {   
        
        
            $curl = curl_init();
            curl_setopt($curl,CURLOPT_URL,$linkC);
            curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($curl,CURLOPT_USERAGENT,'Mozilla');
            curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);

            $data = curl_exec($curl);
            curl_close($curl);

            $getDocOnline = '/<div class="doc-online">(.+)<\/div>/';
            preg_match($getDocOnline,$data,$match3);

            $getTenChuong = '/<small><a class="link-tap" href="(.*?)">(.*?)<\/a><\/small>/';
            preg_match($getTenChuong,$data,$tenchuong);
            
            $tc = $tenchuong[2];
 
            //loai 1 cho nhung sach lay duoc tat ca text
            //loai 2 cho nhung sach lay duoc mot phan text
            $getNoiDungLoai1= '/<p class=" noi_dung_online">(.*?)<\/p>/';
            $getNoiDungLoai2= '/<p class=" noi_dung_online">(.*?)<\/p>(.+)?<p>(.*?)<\/p>/';

            preg_match($getNoiDungLoai1,$match3[1],$matchNoiDung);
            
            $html = HTMLDomParser::file_get_html($linkC);
           // $html =  file_get_html($linkC);
            $nd =  $html->find('.noi_dung_online p');
           
            
           $NoiDung='';
            if(!$nd){
            // echo '<p>Lay Noi Dung->Curl</p>';
                    $NoiDung =   $matchNoiDung[0];
            }
            else{
            // echo '<h1>Lay Noi Dung->SimpleHtml</h1>';
               
                foreach($nd as $n){
                    
                    $NoiDung  =$NoiDung.$n;  
                }
            
            }

            //$connect =new mysqli('localhost', 'root', 'root', 'db_docsach');
            $sql = "insert into  chuongs(id_sach,chuong,tenchuong,noidung)
                            values('$idSach','$sochuong','$tc','$NoiDung')";

            
                            try
                            {
                                $this->getQuery($sql);
                            }
                            catch(Exception $e)
                            {   
                               return back()->with('failed','Khong luu duoc noi dung chuong'.$sochuong.'<br>');
                            }
                            
    }   
}

?>