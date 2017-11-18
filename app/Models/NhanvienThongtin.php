<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhanvienThongtin extends Model
{
    public static $rules = [
        'hoten' => 'required'
    ];
}
