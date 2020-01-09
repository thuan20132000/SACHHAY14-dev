<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhNgonModel;
use App\TheLoaiModel;
use App\SachModel;

use Illuminate\Support\Facades\DB;
class DanhNgonController extends Controller
{
    //
    public function getDanhSach(){
        $theloais = TheLoaiModel::all();
        $sachs = SachModel::all();
        $danhngons = DanhNgonModel::all();
        return view('admin.danhngon.danhsach',['danhngons'=>$danhngons,'theloais'=>$theloais,'sachs'=>$sachs]);
    }
    public function getThem(){
        $theloais = TheLoaiModel::all();
        return view('admin.danhngon.them',['theloais'=>$theloais]);
    }

    public function postThem(Request $request){
        $theloais = TheLoaiModel::all();
        $sachs = SachModel::all();
        $danhngons =new DanhNgonModel;

        $request->validate([
            'id'=>'required|unique:danhngons',
            
        ],
        [
            'id.unique'=>'id da ton tai',
        ]
        );

        $danhngons->id = $request->input('id');
        $danhngons->tienganh = $request->input('dn-ta');
        $danhngons->chuthich = $request->input('dn-dta');
        $danhngons->tiengviet = $request->input('dn-tv');
        $danhngons->noibat = $request->input('dn-nb');
        $danhngons->save();
           


        return redirect()->back()->with('success','Them Thanh Cong');
    }

    public function getSua($id){
        $theloais = TheLoaiModel::all();
        $sachs = SachModel::all();
        $danhngon = DanhNgonModel::find($id);
        
        return view('admin.danhngon.sua',['danhngon'=>$danhngon]);
    }
    public function postSua(Request $request){
        $theloais = TheLoaiModel::all();
        $sachs = SachModel::all();
        $danhngon =new DanhNgonModel;

        

        $id = $request->input('id');
        $tienganh = $request->input('dn-ta');
        $chuthich = $request->input('dn-dta');
        $tiengviet = $request->input('dn-tv');
        $noibat = $request->input('dn-nb');
        DB::table('danhngons')
        ->where('id',$id)
        ->update(['tienganh'=>$tienganh,'chuthich'=>$chuthich,'tiengviet'=>$tiengviet,'noibat'=>$noibat]);
           


        return redirect()->back()->with('success','Sua Thanh Cong Danh Ngon '.$id);
    }

    public function getXoa($id){
        $theloais = TheLoaiModel::all();
        $sachs = SachModel::all();
        $danhngon = DanhNgonModel::find($id);

        return view('admin/danhngon/xoa',['danhngon'=>$danhngon]);
    }
    public function postXoa(Request $request){
        $theloais = TheLoaiModel::all();
        $sachs = SachModel::all();
        
        $id = $request->input('id');
        $danhngon = DanhNgonModel::find($id);
        //  dd($danhngon);
        $danhngon->delete();

        return redirect()->route('admin/danhngon/danhsach')->with('success','xoa thanh cong');
    }
}
