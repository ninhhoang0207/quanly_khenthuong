<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NhanVienController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $informationsEmployee = DB::table('nhanvien_thongtin')->where('user_id', $user_id)->first();
        $tinhDB = DB::table('tinh')->get();
        $huyenDB = DB::table('huyen')->get();
        $xaDB = DB::table('xa')->get();

        $selectTinh = [];
        foreach ($tinhDB as $tinh){
            $selectTinh[$tinh->id] = $tinh->ten;
        }
        $selectHuyen = [];
        foreach ($huyenDB as $huyen){
            $selectHuyen[$huyen->id] = $huyen->ten;
        }
        $selectXa = [];
        foreach ($xaDB as $xa){
            $selectXa[$xa->id] = $xa->ten;
        }
//        dd($informationsEmployee);
        $nguoithans = DB::table('nhanvien_nguoithan')->where('user_id', $user_id)->get(['*']);
        return view('admin.nhanvien.profile',compact('nguoithans','selectTinh','selectHuyen','selectXa','informationsEmployee'));
    }

    public function updateThongTinCaNhan($id, Request $request){
        $input = $request->all();
        unset($input['_method']);
        unset($input['_token']);
        DB::table('nhanvien_thongtin')
            ->where('id', $id)
            ->update($input);
        return redirect(route('admin.nhanvien.profile'));
    }
    public function updateThongTinNguoiThan(Request $request){
        dd($request->nguoithan);
        return redirect(route('admin.nhanvien.profile'));
    }
}
