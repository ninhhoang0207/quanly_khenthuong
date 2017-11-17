<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Tinh;
use App\Models\Huyen;
use Auth;
use Session;
use Redirect;
use Carbon\Carbon;
use Yajra\Datatables\Facades\Datatables;
use Input;
use Log;
use Response; 
use Validator;

class HuyenController extends Controller
{
     public function admin_index()
    {	
    	$data = Huyen::all();
    	$this->viewData = array(
    		'data' => $data 
    	);
        return view('admin.huyen.index', $this->viewData);
    }


public function create()
    {   
    	$tinh = Tinh::all();
    	$this->viewData = array(
    		'tinh' => $tinh 
    	);
        return view('admin.huyen.create',$this->viewData);
    }
public function store(Request $request)
    {   
        $data = $request->all(); 
        // dd($data);
        try {
            $rules = [
                'ten'               =>'required', 
                ];
            $messages = [
                'ten.required'      =>'Vui lòng nhập tên!!!',
            ];

            $validator = Validator::make( $request->all(), $rules, $messages);

            if ( $validator->fails() ){
                return redirect()->back()->withInput($data)->withErrors($validator);
            }else{
                DB::beginTransaction();
                $data = Huyen::create( $data );
                DB::commit();
                Session::flash('success','Success!');
                return redirect(route('admin.huyen.index'));
            }
        } catch (Exception $e) {
             Session::flash('error','Opp! Please try again.Error!');
            DB::rollback();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Huyen::find( $id );
        $tinh = Tinh::all();
        $this ->viewData = array(
            'data' => $data, 
            'tinh' => $tinh
            );
        return view ( 'admin.huyen.edit', $this->viewData );
    }

  
    public function update( Request $request, $id )
    {
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
            $huyen = Huyen::where('id', $id)->first();
            $huyen->update($data);
            Session::flash( 'success', 'Sửa thành công !!!!!');
            return redirect(route('admin.huyen.index'));
        }

//     }
//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function delete(Request $request, $id= -1)
//     {
//         DB::beginTransaction();
//         try {
//             Video::find( $id )->delete();
//             DB::commit();
//         } catch(\Exception $e) {
//             \Log::info( $e->getMessage() );
//             DB::rollback();
//             return -1;
//         }
//         return 1;
//     }
}
