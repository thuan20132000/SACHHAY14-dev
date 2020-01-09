<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoaiModel;
use App\SachModel;
use App\ChuongModel;
use DB; 

class ChuongController extends Controller
{
    //

    public function getDanhSach($id){
        $theloais = TheLoaiModel::all();
        $chuongs = ChuongModel::where('id_sach',$id)->orderBy('chuong','desc')->get();
        
        // $maxChuong = ChuongModel::where('id_sach',$id)->max('chuong');
       

        
        return view('admin.chuong.danhsach',['theloais'=>$theloais,'chuongs'=>$chuongs,'ids'=>$id]);
    }
    public function getThem($idSach){
        $theloais = TheLoaiModel::all();

         $maxChuong = ChuongModel::where('id_sach',$idSach)->max('chuong');
        return view('admin.chuong.them',['maxChuong'=>$maxChuong,'idSach'=>$idSach,'theloais'=>$theloais]);
    }
    public function postThem(Request $request){

        $request->validate([
            'tenchuong'=>'required',
            'noidung'=>'required'
        ],[
       
            'tenchuong.required'=>'chưa nhập tên chương',
            'noidung.required'=>'chưa nhập nội dung chương'
        ]);

        $c = new ChuongModel;
        $c->id_sach = $request->input('idSach');
        $c->chuong = $request->input('chuong');
        $c->tenchuong= $request->input('tenchuong');
        $c->noidung = $request->noidung;
        $c->save();

        return redirect()->back()->with('success','Thêm Chương Thành Công');
    }
    public function getSua($idSach,$chuong){
        $theloais = TheLoaiModel::all();


        $chuongSua = ChuongModel::where('chuong',$chuong)->get();
        $chuong = $chuongSua[0];
        
        return view('admin.chuong.sua',['idSach'=>$idSach,'chuong'=>$chuong,'theloais'=>$theloais]);
    }
    public function postSua(Request $request){

        $request->validate([
            'tenchuong'=>'required',
            'noidung'=>'required'
        ],[
       
            'tenchuong.required'=>'chưa nhập tên chương',
            'noidung.required'=>'chưa nhập nội dung chương'
        ]);

        $id_sach = $request->input('idSach');
        $chuong = $request->input('chuong');
        $tenchuong= $request->input('tenchuong');
        $noidung = $request->noidung;
        DB::table('chuongs')
            ->where(['id_sach'=>$id_sach,'chuong'=>$chuong])
            ->update(['tenchuong'=>$tenchuong,'noidung'=>$noidung]);


        return redirect()->route('admin/chuong/danhsach',['id_sach'=>$id_sach])->with('success','Sửa Chương Thành Công');
    }
    public function getXoa($idSach,$chuong){
        DB::table('chuongs')->where(['id_sach'=>$idSach,'chuong'=>$chuong])->delete();

        return redirect()->back()->with('success','Xoa Chương Thành Công');
    }
}
