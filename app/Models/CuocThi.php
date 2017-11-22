<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CuocThi extends Model
{
    protected $table = "cuoc_thi";
    protected $fillable = array('id','ten','thoihan_thamgia', 'loaihinh', 'ban_tochuc', 'batbuoc', 'giaithuong', 'mota');

    public function cuocthiFile(){
         return $this->hasMany('App\Models\CuocThiTepdinhkem','cuocthi_id');  
    }
}
