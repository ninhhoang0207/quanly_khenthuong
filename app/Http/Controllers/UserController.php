<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Redirect, Session;
use Carbon\Carbon;
use DB;

class UserController extends Controller
{
    private $user;

    public function __construct() {
        $this->user = new User;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('templates.admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      =>  'required|string|max:255',
            'email'     =>  'required|string|email|max:255|unique:users',
            'password'  =>  'required|string|min:5|confirmed',
            'role'      =>  'required',
            'avatar'    =>  'mimes:jpeg,bmp,png,jpg'
        ],[
            'email.unique'  =>  'Email đã được sử dụng.',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $new_user = new User;
        $new_user->name = $request->name;
        $new_user->email = $request->email;
        $new_user->role = $request->role;
        $new_user->password = bcrypt($request->password);
        $new_user->active = 'images/user.png';
        $new_user->active = 0;

        if ($request->avatar) {
            $file = $request->avatar;
            $extension = $file->getClientOriginalExtension();
            $new_name = time().'.'.$extension;
            $path = 'images/user/';
            $file->move(public_path($path),$new_name);
            $new_user->avatar = $path.$new_name;
        }

        $new_user->save();

        Session::flash('success', 'Tạo tài khoản thành công.');

        return Redirect::route('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function getUser($is_active = 1) {
        $users = User::select(['id', 'name', 'email', 'role','created_at'])
                ->where('is_active',$is_active)
                ->whereIn('role',['user','admin']);
           return Datatables::of($users)->editColumn('created_at', function ($user) {
                        return $user->created_at->format('d/m/Y H:i');
                    })->filterColumn('created_at', function ($query, $keyword) {
                        $query->whereRaw("DATE_FORMAT(created_at,'%Y/%m/%d %H:%i') like ?", ["%$keyword%"]);
                    })->make(true);
        return $this->whereIn('role',['admin', 'user'])->where('is_active', $is_active)->get();
    }
}
