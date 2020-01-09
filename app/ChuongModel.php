<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuongModel extends Model
{
    //
    protected $table = 'chuongs';

    public function sach(){
        return $this->belongsTo('App\SachModel','id_sach','id');
    }
}
