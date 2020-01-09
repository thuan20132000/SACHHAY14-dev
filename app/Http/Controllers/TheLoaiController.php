<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoaiModel;
class TheLoaiController extends Controller
{
    //
    public function getDanhSach(){
        $theloais = TheLoaiModel::all();
        return view('admin.theloai.danhsach',['theloais'=>$theloais]);
    }
    public function getThem(){
        $theloais = TheLoaiModel::all();
        return view('admin.theloai.them',['theloais'=>$theloais]);
    }
    public function postThem(Request $request){
         
        $request->validate([
            'id'=>'required|numeric|unique:theloais',
            'tentheloai'=>'required:unique:theloais',
        ],
        [
            'id.required'=>'chưa nhập id thể loại',
            'id.numeric'=>'thể loại phải là số',
            'id.unique'=>'id thể loại đã tồn tại',
            'tentheloai.required'=>'bạn chưa nhập tên thể loại',
            'tentheloai.unique'=>'tên thể loại đã tồn tại'
            
        ]);

        $tl = new TheLoaiModel;
        $tl->id = $request->input('id');
        $tl->tentheloai = $request->input('tentheloai');
        $tl->save();

        return redirect()->route('admin/theloai/danhsach');
    }
    public function getSua($id){
        $theloais = TheLoaiModel::all();
        $tl = TheLoaiModel::find($id);
        return view('admin.theloai.sua',['theloais'=>$theloais,'tl'=>$tl]);
    }
    public function postSua(Request $request,$id){
        $tl = TheLoaiModel::find($id);
        $tl->tentheloai = $request->input('tentl');
        $tl->save();

        return redirect()->route('admin/theloai/danhsach');
    }
    public function getXoa($id){
        $theloais = TheLoaiModel::all();
        $tl = TheLoaiModel::find($id);
        return view('admin.theloai.xoa',['theloais'=>$theloais,'tl'=>$tl]);
    }
    public function postXoa(Request $request,$id){
        $tl = TheLoaiModel::find($id);
        $tl->tentheloai = $request->input('tentl');
        $tl->delete();

        return redirect()->route('admin/theloai/danhsach');
    }
    
}
