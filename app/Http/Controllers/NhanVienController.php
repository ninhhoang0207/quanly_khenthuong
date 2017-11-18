<?php

namespace App\Http\Controllers;

use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NhanVienController extends Controller
{

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
        /*Quá trình công tác*/
        $quatrinhcongtac = DB::table('nhanvien_quatrinh_congtac')->where('user_id', $user_id)->get(['*']);

        /*Thong bao*/
//        $now =date_format(Carbon::now(),'Y-D-M') ;
//        $sql = 'cuoc_thi.thoihan_thamgia >= '.$now;
        $thongbao= DB::table('cuoc_thi')->get(['*']);
//
//        dd($thongbao);
        return view('admin.nhanvien.profile',compact('thongbao','quatrinhcongtac','nguoithans','selectTinh','selectHuyen','selectXa','informationsEmployee'));
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
        $relatives = $request->nguoithan;
        if($relatives){
            foreach ($relatives as $key => $relative){
                if($key>0){
                    DB::table('nhanvien_nguoithan')
                        ->where('id', $key)
                        ->update($relative);
                }
                else{
                    $relative['user_id'] = Auth::id();
                    DB::table('nhanvien_nguoithan')->insert($relative);
                }
            }
        }

        return redirect(route('admin.nhanvien.profile'));
    }
    public function updateQuaTrinhCongTac(Request $request){
//        $input = $request->all();
        $qtcts = $request->quatrinhcongtac;
//        dd($qtcts);
        if($qtcts){
            foreach ($qtcts as $key => $qtcongtac){
                if($key>0){
                    DB::table('nhanvien_quatrinh_congtac')
                        ->where('id', $key)
                        ->update($qtcongtac);
                }
                else{
                    $qtcongtac['user_id'] = Auth::id();
                    DB::table('nhanvien_quatrinh_congtac')->insert($qtcongtac);
                }
            }
        }
        return redirect(route('admin.nhanvien.profile'));
    }

    public function download($id){
        $files = DB::table('cuoc_thi_tepdinhkem')->where('cuocthi_id', $id)->get(['*']);

        if($files) {
            foreach ($files as $f) {
                $file = public_path() . "".$f->url;

                $headers = array(
                    'Content-Type: application/pdf',
                );

                response()->download($file, '', $headers);
            }

        }
        return ;
    }
}
