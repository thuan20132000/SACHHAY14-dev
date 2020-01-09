<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaSachModel extends Model
{
    //
    protected $table = 'giasach';

    public function user(){
        return $this->hasOne('App\GiaSachModel');
    }
}
