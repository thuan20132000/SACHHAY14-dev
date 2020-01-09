<?php

namespace App\Http\Controllers;

use App\myClasses\getSachVui;
use Illuminate\Http\Request;
use App\SachModel;

use Illuminate\Support\Facades\Input;

class GetSachController extends Controller
{
    //
    public function getSach(Request $request){
        $sachs_tb = SachModel::orderBy('id','desc')->take(1)->get();
        //dd($sachs_tb);
        $ids = $sachs_tb[0]->id;   // lay id sach lon nhat
        // dd($ids);
        $ids++;
        $tensach = Input::get('tensach');
        $tacgia = Input::get('tacgia');
        $tenkhongdau = Input::get('tenkhongdau');
        $linkhinhanh = Input::get('hinhanh');
        $theloai = Input::get('theloai');

        return view('admin.getsachvui',['ids'=>$ids,'tensach'=>$tensach,'tacgia'=>$tacgia,'theloai'=>$theloai,'hinhanh'=>$linkhinhanh,'tenkhongdau'=>$tenkhongdau]);
    }

    public function postSach(Request $request){

        $request->validate([
            'id'=>'required|unique:sachs',
            'urlSach'=>'required'
        ]);
        $idtl = $request->input('theloai');
        $ids = $request->input('id');
        $url = $request->input('urlSach');

        $gs = new getSachVui();
        $gs->laySach($idtl,$ids,$url);
        
        $gtensach = $gs->getTenSach();
        $gtacgia = $gs->getTacGia();
        $gtheloai = $gs->getTheLoai();
        $gtenkhongdau = $gs->getTenKhongDau();
        $glinkhinh = $gs->getLinkHinhAnh();
        
        $previousUrl = app('url')->previous();
       
        return redirect()->to($previousUrl.'?'.http_build_query(['tensach'=>$gtensach,'tacgia'=>$gtacgia,'theloai'=>$gtheloai,'tenkhongdau'=>$gtenkhongdau,'hinhanh'=>$glinkhinh]));


    }

    

}
