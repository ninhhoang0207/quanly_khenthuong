<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tinh extends Model
{
    protected $table = "tinh";
    protected $fillable = array('id','ten');

    public function xa(){
         return $this->hasMany('App\Models\Xa','tinh_id');  
    }
    public function huyen(){
         return $this->hasMany('App\Models\Huyen','tinh_id');  
    }

}
