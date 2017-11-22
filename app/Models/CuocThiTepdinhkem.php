<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CuocThiTepdinhkem extends Model
{
    protected $table = "cuoc_thi_tepdinhkem";
    protected $fillable = array('id','cuocthi_id','ten_tep', 'url');

    public function cuocthi(){
    	 return $this->belongsTo('App\Models\CuocThi','cuocthi_id');
    }
}
