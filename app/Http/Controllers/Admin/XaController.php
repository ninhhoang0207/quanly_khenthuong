<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Tinh;
use App\Models\Huyen;
use App\Models\Xa;
use Auth;
use Session;
use Redirect;
use Carbon\Carbon;
use Yajra\Datatables\Facades\Datatables;
use Input;
use Log;
use Response; 
use Validator;

class XaController extends Controller
{
     public function admin_index()
    {	
    	$data = Xa::all();
    	$this->viewData = array(
    		'data' => $data 
    	);
        return view('admin.xa.index', $this->viewData);
    }


public function create()
    {   
    	$tinh = Tinh::all();
    	$huyen = Huyen::all();
    	$this->viewData = array(
    		'tinh' => $tinh ,
    		'huyen' => $huyen
    	);
        return view('admin.xa.create',$this->viewData);
    }
public function store(Request $request)
    {   
        $data = $request->all(); 
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
                $data = Xa::create( $data );
                DB::commit();
                Session::flash('success','Success!');
                return redirect(route('admin.xa.index'));
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
        $data = Xa::find( $id );
        $tinh = Tinh::all();
        $huyen = Huyen::all();
        $this ->viewData = array(
            'data' => $data, 
            'tinh' => $tinh,
            'huyen' => $huyen
            );
        return view ( 'admin.xa.edit', $this->viewData );
    }

  
    public function update( Request $request, $id )
    {
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
            $huyen = Huyen::where('id', $id)->first();
            $huyen->update($data);
            Session::flash( 'success', 'Sửa thành công !!!!!');
            return redirect(route('admin.xa.index'));
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
