<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DataTables;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'active', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getUser($is_active = 1) {
        $users = User::select(['id', 'name', 'email', 'avatar', 'role','created_at'])
                ->where('is_active',$is_active);
                // ->whereIn('role',['user','admin']);
           return Datatables::of($users)->editColumn('created_at', function ($user) {
                        return $user->created_at->format('d/m/Y H:i');
                    })->filterColumn('created_at', function ($query, $keyword) {
                        $query->whereRaw("DATE_FORMAT(created_at,'%Y/%m/%d %H:%i') like ?", ["%$keyword%"]);
                    })->make(true);
        // return $this->whereIn('role',['admin', 'user'])->where('is_active', $is_active)->get();
    }
}
