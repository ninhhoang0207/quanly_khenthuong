<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Xa extends Model
{
    protected $table = "xa";
    protected $fillable = array('id','tinh_id', 'huyen_id','ten');

    public function tinh(){
    	 return $this->belongsTo('App\Models\Tinh','tinh_id');
    }

    public function huyen(){
    	 return $this->belongsTo('App\Models\Huyen','huyen_id');
    }
}
