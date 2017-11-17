<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Huyen extends Model
{
    protected $table = "huyen";
    protected $fillable = array('id','tinh_id','ten');

    public function tinh(){
    	 return $this->belongsTo('App\Models\Tinh','tinh_id');
    }

    public function xa(){
         return $this->hasMany('App\Models\Xa','huyen-_id');  
    }
}
