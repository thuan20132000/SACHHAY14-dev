<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TheLoaiModel;
use App\SachModel;
use App\DanhNgonModel;
use App\GiaSachModel;
use App\GocTiengAnhModel;

use Illuminate\Support\Facades\Hash;
use Auth;
class userController extends Controller
{
    //
    public function getDangKy(){
        $theloais = TheLoaiModel::all();
        return view('pages.user.dangky',['theloais'=>$theloais]);
    }

    public function postDangKy(Request $request){

        $request->validate([
            
            'tendangnhap'=>'required|unique:users|min:5',
            'matkhau'=>'required|min:3',
        ],
        [
            'tendangnhap.required'=>'chưa nhập tên đăng nhập',
            'tendangnhap.unique'=>'tên đăng nhập đã tồn tại',
            'tendangnhap.min'=>'tên đăng nhập phải có ít nhất 5 kí tự',
            'matkhau.required'=>'chưa nhập mật khẩu',
            'matkhau.min'=>'mật khẩu phải có ít nhất 3 kí tự' 
        ]);

       $user = new User;
       $user->hoten= $request->input('hoten');
       $user->tendangnhap = $request->tendangnhap;
       $user->email = $request->email;
       $user->password = Hash::make($request->matkhau);
       $user->quyen = '1';
       $user->save();
     
    
        return redirect()->back()->with('success','Bạn đã đăng ký thành công');
    }
    public function getDangNhap(){
        $theloais = TheLoaiModel::all();
        return view('pages.user.dangnhap',['theloais'=>$theloais]);
    }
    public function postDangNhap(Request $request){
        $request->validate([
            'tendangnhap'=>'required|min:5',
            'matkhau'=>'required|min:3'
        ],[
            'tendangnhap.required'=>'chưa nhập tên đăng nhập',
            'tendangnhap.min'=>'tên đăng nhập phải ít nhất 3 kí tự',
            'matkhau.required'=>'chưa nhập mật khẩu',
            'matkhau.min'=>'mật khẩu phải ít nhất 3 kí tự',
        ]);

        $data =[
            'tendangnhap'=>$request->tendangnhap,
            'password'=>$request->matkhau,
        ];
        if(Auth::attempt($data) ){

            $id_user = auth()->User()->id;
            // dd($id_user);
            $gs =  GiaSachModel::where('id_user',$id_user)->get();
            
            
            return redirect()->route('home');

        }else{
            return redirect()->back()->with(['failed'=>'Tên đăng nhập hoặc mật khẩu không đúng']);
        }
    }
    public function getDangXuat(){
        Auth::logout();

        return redirect()->route('user/dangnhap');
    }

    public function getGiaSach(){
   
        $id_user =  auth()->User()->id;
        
        $theloais = TheLoaiModel::all();
        $danhngon  = DanhNgonModel::all();
        $sachs = SachModel::all();
        $giasach = GiaSachModel::where('id_user',$id_user)->get();
        $goctienganhs = GocTiengAnhModel::all();
        
        $sachDocNhieu = SachModel::where('docnhieu','1')->take(10)->get();
        $sachNoiBat = SachModel::where('noibat','1')->take(12)->get();
        $sachMoiCaphat = SachModel::where('moicapnhat','1')->orderBy('id','desc')->take('20')->get();

        
        //dd($sach_array);

        return view('pages.giasach',['sachMoiCapNhat'=>$sachMoiCaphat,'sachNoiBat'=>$sachNoiBat,'sachDocNhieu'=>$sachDocNhieu,'goctienganhs'=>$goctienganhs,'giasach'=>$giasach,'sachs'=>$sachs,'theloais'=>$theloais,'danhngon'=>$danhngon]);
    }

    public function getThemGiaSach($id_sach){
       
        if(Auth::check()){
           $id_user =  auth()->User()->id;
           $ts = new GiaSachModel;
            $ts->id_user = $id_user;
            $ts->id_sach = $id_sach;
            $ts->soluong = 1;
            $ts->save();
        }else{
            
           return redirect()->route('user/dangnhap')->with('failed','đăng nhập để thực hiện chức năng thêm tủ sách!!!');
        }

        return redirect()->back();

    }
    public function getXoaGiaSach($id_giasach){
        $gs =  GiaSachModel::find($id_giasach);
        $gs->delete();

        return redirect()->back();

    }
}
