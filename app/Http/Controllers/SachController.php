<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SachModel;
use App\TheLoaiModel;
use Illuminate\Support\Facades\Input;
use DB;

class SachController extends Controller
{
    //
    public function getDanhSach(){
        $theloais = TheLoaiModel::all();
        $input = Input::get('id_theloai');
        $sachs = SachModel::all();

        $sachTheLoai = SachModel::where('id_theloai',$input)->get();
        //dd($sachTheLoai);

        return view('admin.sach.danhsach',['sachTL'=>$sachTheLoai,'theloais'=>$theloais,'sachs'=>$sachs]);
    }
    public function getThem(){
        $theloais = TheLoaiModel::all();
        return view('admin.sach.them',['theloais'=>$theloais]);
    }
    public function postThem(Request $request){
        
        $request->validate([
            'idtheloai'=>'required',
            'id'=>'required|numeric|unique:sachs',
            'tens'=>'required',
            'tenkd'=>'required',
            'tacgia'=>'required',
            'hinhanh'=>'required',
            
        ],[
            'idtheloai.required'=>'bạn chưa chọn thể loại',
            'id.required'=>'bạn chưa nhập id sách',
            'id.unique'=>'id sách đã tồn tại',
            'tens.required'=>'bạn chưa nhập tên sách',
            'tenkd.required'=>'bạn chưa nhập tên không dấu',
            'tacgia.required'=>'bạn chưa nhập tên tác giả',
            'hinhanh.required'=>'bạn chưa chọn hình ảnh cho sách'
        ]);

        $sach = new SachModel;
        $sach->id_theloai = $request->idtheloai;
        $sach->id = $request->input('id');
        $sach->tensach = $request->input('tens');
        $sach->tenkhongdau = $request->input('tenkd');
        $sach->tacgia = $request->input('tacgia');
        $sach->noibat = $request->input('noibat');
        $sach->moicapnhat = $request->input('moicapnhat');

        if($request->hasFile('hinhanh')){
           $file = $request->file('hinhanh');
           $tenhinhtamthoi = $file->getClientOriginalName();
           $tenhinh = rand(1000,4000).'-'.$tenhinhtamthoi;
           while(file_exists('hinh/$tenhinh')){
            $tenhinh = string_random(4).'-'.$tenhinhtamthoi;
           }
           //dd($tenhinh);
           $file->move('hinhanh',$tenhinh);
           $sach->hinhanh = $tenhinh;
        }
       
        //dd($request->all());
        $sach->save();

        return redirect()->back()->with('success','Thêm Sách Thành Công');
    }
    public function getSua($idSach){
        $theloais = TheLoaiModel::all();
        $s = SachModel::find($idSach);
        
        return view('admin.sach.sua',['theloais'=>$theloais,'s'=>$s]);
    }
    public function postSua(Request $request){
       
        $idSach = $request->input('ids');
        $tensach = $request->input('tens');
        $tenkhongdau = $request->input('tenkd');
        $noibat = $request->input('noibat');
        $moicapnhat = $request->input('moicapnhat');
        $docnhieu = $request->input('docnhieu');
        $chuthich = $request->input('chuthich');

        $id_theloai = $request->input('idtl');
        DB::table('sachs')
            ->where(['id'=>$idSach])
            ->update(['tensach'=>$tensach,'tenkhongdau'=>$tenkhongdau,'noibat'=>$noibat,'moicapnhat'=>$moicapnhat,'docnhieu'=>$docnhieu,'chuthich'=>$chuthich]);
       
        return redirect()->route('admin/sach/danhsach',['id_theloai'=>$id_theloai])->with('success','Sửa thành Công');
    }
    public function getXoa($id){
        $theloais = TheLoaiModel::all();
        $s = SachModel::find($id);
        
        return view('admin.sach.xoa',['theloais'=>$theloais,'s'=>$s]);
    }
    public function postXoa(Request $request,$id){
        $idSach = $request->input('ids');
        $idTheLoai = $request->input('idtl');

        DB::table('chuongs')->where(['id_sach'=>$idSach])->delete();
        DB::table('sachs')->where(['id_theloai'=>$idTheLoai,'id'=>$idSach])->delete();

        return redirect()->route('admin/sach/danhsach',['id_theloai'=>$idTheLoai])->with('success','xoa sach thanh cong');
    }


    public function postData(Request $request){
        if($idtl = $request->get('id'))
        {
            //$sach = DB::table('sachs')->where('id_theloai',$idtl)->get();
            $data = SachModel::where('id_theloai',$idtl)->get();
            
            foreach($data as $s){
                echo '<tr>';
                echo '<td scope="row">'.$s->id.'</td>';
                echo '<td scope="row">'.$s->tensach.'</td>';
                echo '<td scope="row">'.$s->tenkhongdau.'</td>';
                echo '<td scope="row">'.$s->noibat.'</td>';
                echo '<td scope="row">'.$s->moicapnhat.'</td>';
                echo '<td scope="row">'.$s->docnhieu.'</td>';
                echo '<td scope="row">'.$s->chuthich.'</td>';
                echo '<td><a href="../../admin/chuong/danhsach/'.$s->id.'">Chi tiet</a></td>';
                echo '<td><a href="sua/'.$s->id.'" class="btn btn-success">Sua</a></td>';
                echo '<td><a href="xoa/'.$s->id.'" class="btn btn-danger">Xoa</a></td>';
                echo '</tr>';
            }
        }else{
            echo "<small>Chon the loai de hien thi sach</small>";
        }
        
    }
}
