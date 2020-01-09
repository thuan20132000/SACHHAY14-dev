<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {

    Route::get('dangnhap','adminController@getDangNhap')->name('admin/dangnhap');
    Route::post('dangnhap','adminController@postDangNhap')->name('admin/postdangnhap');
    Route::get('dangky','adminController@getDangKy')->name('admin/dangky');
    Route::post('dangky','adminController@postDangKy')->name('admin/postdangky');
    Route::get('dangxuat','adminController@getDangXuat')->name('admin/dangxuat');


    Route::get('/trangchu','adminController@getTrangChu')->name('admin/trangchu')->middleware('admin');

    Route::group(['prefix' => '/theloai','middleware'=>'admin'], function () {
        Route::get('danhsach','TheLoaiController@getDanhSach')->name('admin/theloai/danhsach');
        Route::get('them','TheLoaiController@getThem')->name('admin/theloai/them');
        Route::post('them','TheLoaiController@postThem')->name('admin/theloai/postthem');;
        Route::get('sua/{id}','TheLoaiController@getSua')->name('admin/theloai/sua');
        Route::post('sua/{id}','TheLoaiController@postSua')->name('admin/theloai/postsua');
        Route::get('xoa/{id}','TheLoaiController@getXoa')->name('admin/theloai/xoa');
        Route::post('xoa{id}','TheLoaiController@postXoa')->name('admin/theloai/postxoa');
    });

    Route::group(['prefix' => '/sach','middleware'=>'admin'], function () {
        Route::get('danhsach','SachController@getDanhSach')->name('admin/sach/danhsach');
        Route::get('them','SachController@getThem')->name('admin/sach/them');
        Route::post('them','SachController@postThem')->name('admin/sach/postthem');;
        Route::get('sua/{id}','SachController@getSua')->name('admin/sach/sua');
        Route::post('sua/{id}','SachController@postSua')->name('admin/sach/postsua');
        Route::get('xoa/{id}','SachController@getXoa')->name('admin/sach/xoa');
        Route::post('xoa{id}','SachController@postXoa')->name('admin/sach/postxoa');
        Route::post('data','SachController@postData')->name('admin/sach/postdata');


    });
    Route::group(['prefix' => '/chuong','middleware'=>'admin'], function () {
        Route::get('danhsach/{id}','ChuongController@getDanhSach')->name('admin/chuong/danhsach');
        Route::get('them/{id}','ChuongController@getThem')->name('admin/chuong/them');
        Route::post('them','ChuongController@postThem')->name('admin/chuong/postthem');;
        Route::get('sua/{id}','ChuongController@getSua')->name('admin/chuong/sua');
        Route::post('sua/{id}','ChuongController@postSua')->name('admin/chuong/postsua');
        Route::get('xoa/{id}','ChuongController@getXoa')->name('admin/chuong/xoa');
        Route::post('xoa{id}','ChuongController@postXoa')->name('admin/chuong/postxoa');
        
        Route::get('uploadFile','ChuongController@getHinhAnh')->name('uploadPhoto');
    });
    Route::group(['prefix' => '/danhngon','middleware'=>'admin'], function () {
        Route::get('danhsach','DanhNgonController@getDanhSach')->name('admin/danhngon/danhsach');
        Route::get('them','DanhNgonController@getThem')->name('admin/danhngon/them');
        Route::post('them','DanhNgonController@postThem')->name('admin/danhngon/postthem');
        Route::get('sua/{id}','DanhNgonController@getSua')->name('admin/danhngon/sua');
        Route::post('sua','DanhNgonController@postSua')->name('admin/danhngon/postsua');
        Route::get('xoa/{id}','DanhNgonController@getXoa')->name('admin/danhngon/getxoa');
        Route::post('xoa','DanhNgonController@postXoa')->name('admin/danhngon/postxoa');

    });

    Route::get('laysachvui','GetSachController@getSach')->name('sachvui/getsach');
    Route::post('laysachvui','GetSachController@postSach')->name('sachvui/postsach');

});

Route::group(['prefix' => '/home'], function () {

    Route::group(['prefix' => 'user'], function () {
        Route::get('dangnhap','userController@getDangNhap')->name('user/dangnhap');
        Route::post('dangnhap','userController@postDangNhap')->name('user/postdangnhap');
        Route::get('giasach','userController@getGiaSach')->name('user/giasach');
        Route::get('dangky','userController@getDangKy')->name('user/dangky');
        Route::post('dangky','userController@postDangKy')->name('user/postdangky');
        Route::get('dangxuat','userController@getDangXuat')->name('user/dangxuat');
        Route::get('themgiasach/{id}','userController@getThemGiaSach')->name('user/themgiasach');
        Route::get('xoagiasach/{id}','userController@getXoaGiaSach')->name('user/xoagiasach');


    });

 
});

Route::get('/home','pagesController@getHome')->name('home');
Route::get('/theloai/{id}','pagesController@getTheLoai')->name('home/theloai');
Route::get('/sach/sach_id={id}/sach_name={tensach}','pagesController@getSach')->name('home/sach');
Route::get('/docsach/{id}/{tensach}/{chuong}','pagesController@getDocSach')->name('home/docsach');



