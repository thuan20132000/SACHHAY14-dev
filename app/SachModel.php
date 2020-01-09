<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SachModel extends Model
{
    //
    protected $table = 'sachs';

    public function chuong(){
        return $this->hasMany('App\ChuongModel','id_sach','id');
    }
    public  function theloai(){
        return $this->belongsTo('App\TheLoaiModel','id_theloai','id');
    }
}
