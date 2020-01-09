<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\TheLoaiModel;
use App\SachModel;
use App\ChuongModel;
use App\DanhNgonModel;
use App\GiaSachModel;
class pagesController extends Controller
{
    //
    public function getHome(){
        $theloais = TheLoaiModel::all();
        $sachs = SachModel::all();
        $sachDocNhieu = SachModel::where('docnhieu','1')->take(10)->get();
        $sachNoiBat = SachModel::where('noibat','1')->take(12)->get();
        $sachMoiCaphat = SachModel::where('moicapnhat','1')->orderBy('id','desc')->take('20')->get();
        $sachyeuthich = SachModel::where('yeuthich','>','2')->get();
        //dd($sachDocNhieu);
        $danhngon  = DanhNgonModel::all();
        
        $ngontinh = SachModel::where('id_theloai',4)->get();
        
        return view('pages.index',['sachyeuthich'=>$sachyeuthich,'sachMoiCapNhat'=>$sachMoiCaphat,'sachNoiBat'=>$sachNoiBat,'sachDocNhieu'=>$sachDocNhieu,'theloais'=>$theloais,'sachs'=>$sachs,'danhngon'=>$danhngon]);
    }

    public function getTheLoai($id){
        $sachDocNhieu = SachModel::all();
        $theloais = TheLoaiModel::all();
        $danhngon  = DanhNgonModel::all();

        $sachDocNhieu = SachModel::where('docnhieu','1')->take(10)->get();
        $sachNoiBat = SachModel::where('noibat','1')->take(12)->get();
        $sachMoiCaphat = SachModel::where('moicapnhat','1')->orderBy('id','desc')->take('20')->get();

        $sachs  = SachModel::where('id_theloai',$id)->get();
            
        return view('pages.theloai',['sachMoiCapNhat'=>$sachMoiCaphat,'sachNoiBat'=>$sachNoiBat,'sachDocNhieu'=>$sachDocNhieu,'sachs'=>$sachs,'theloais'=>$theloais,'danhngon'=>$danhngon]);
    }

    public function getSach($id){
        $danhngon  = DanhNgonModel::all();
        $theloais = TheLoaiModel::all();
        $sach  = SachModel::find($id);
        $sachDocNhieu = SachModel::where('docnhieu','1')->take(10)->get();
        $sachNoiBat = SachModel::where('noibat','1')->take(12)->get();
        $sachMoiCaphat = SachModel::where('moicapnhat','1')->orderBy('id','desc')->take('20')->get();
       // dd($sachs);
        $chuongs = ChuongModel::where('id_sach',$id)->paginate(15);
        //dd($chuongs);
        $sachs = SachModel::all();
        
        return view('pages.sach',['sachMoiCapNhat'=>$sachMoiCaphat,'sachNoiBat'=>$sachNoiBat,'sachDocNhieu'=>$sachDocNhieu,'sachs'=>$sachs,'sach'=>$sach,'theloais'=>$theloais,'chuongs'=>$chuongs,'danhngon'=>$danhngon]);
    }

    public function getDocSach($id,$tensach,$chuong){
        $sachDocNhieu = SachModel::all();
        $theloais = TheLoaiModel::all();
        $sach  = SachModel::find($id);
        
        // $chuongs = ChuongModel::where('chuong',$chuong+1)->get();
        $chuongs =  DB::select('select * from chuongs where chuong = ? and id_sach = ?', [$chuong,$id]);
        $danhsachChuong = ChuongModel::where('id_sach',$id)->get();
        $count = $danhsachChuong->count();
       
        return view('pages.docsach',['tongsochuong'=>$count,'sach'=>$sach,'theloais'=>$theloais,'chuongs'=>$chuongs,'danhsachChuong'=>$danhsachChuong,'sachDocNhieu'=>$sachDocNhieu]);
    }

    public function getTimKiem(Request $request){
        $theloais = TheLoaiModel::all();
        $sachs = SachModel::all();
        $sachDocNhieu = SachModel::where('docnhieu','1')->take(10)->get();
        $sachNoiBat = SachModel::where('noibat','1')->take(12)->get();
        $sachMoiCaphat = SachModel::where('moicapnhat','1')->orderBy('id','desc')->take('20')->get();
        //dd($sachDocNhieu);
        $danhngon  = DanhNgonModel::all();
        $search =  $request->input('search');
        $sachtimkiem = SachModel::where('tensach','like','%'.$search.'%')
                    ->orWhere('tacgia','like','%'.$search.'%')->get();
        return view('pages.timkiem',['sachMoiCapNhat'=>$sachMoiCaphat,'sachNoiBat'=>$sachNoiBat,'sachDocNhieu'=>$sachDocNhieu,'theloais'=>$theloais,'sachs'=>$sachs,'danhngon'=>$danhngon,'sachtimkiem'=>$sachtimkiem]);
    }

   

   

}
