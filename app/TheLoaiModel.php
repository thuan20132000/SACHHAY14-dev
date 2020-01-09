<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoaiModel extends Model
{
    //
    protected $table = 'theloais';

    public function sachs(){
        return $this->hasMany('App\SachModel','id_theloai','id');
    }
}
