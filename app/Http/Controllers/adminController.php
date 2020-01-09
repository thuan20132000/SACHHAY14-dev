<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


use Auth;
use App\User;
use App\AdminModel;
use App\TheLoaiModel;
class adminController extends Controller
{
    


    public function getDangNhap(){
        $theloais = TheLoaiModel::all();
        return view('admin.dangnhap',['theloais'=>$theloais]);
    }
    public function postDangNhap(Request $request){

        $data =[
            'tendangnhap'=>$request->tendangnhap,
            'password'=>$request->matkhau,
        ];
        if(Auth::guard('admin')->attempt($data) ){
           return redirect()->route('admin/trangchu');
        }else{
            return redirect()->back()->with("failed","Dang Nhap that bai");
        }
        
    }
    public function getDangKy(){
        $theloais = TheLoaiModel::all();
        return view('admin.dangky',['theloais'=>$theloais]);
    }
    public function postDangKy(Request $request){
        $request->validate([
            'tendangnhap'=>'required',
            'matkhau'=>'required',
        ],
        [
           'tendangnhap.required'=>'chua nhap ten dang nhap',
           'matkhau.required'=>'chua nhap mat khau' 
        ]);

       $ad = new AdminModel;
       $ad->hoten= $request->input('hoten');
       $ad->tendangnhap = $request->tendangnhap;
       $ad->password = Hash::make($request->matkhau);
       $ad->save();
    
        return redirect()->route('admin/dangnhap');

    }

    public function getTrangChu(){
         $theloais = TheLoaiModel::all();
        return view('admin.trangchu',['theloais'=>$theloais]);
    }   
    
    public function getDangXuat(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin/dangnhap');
    }
}
