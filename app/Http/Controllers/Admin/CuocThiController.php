<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\CuocThi;
use Auth;
use Session;
use Redirect;
use Carbon\Carbon;
use Yajra\Datatables\Facades\Datatables;
use Input;
use Log;
use Response; 
use Validator;

class CuocThiController extends Controller
{
    public function admin_index()
    {	
    	$data = CuocThi::all();
    	$this->viewData = array(
    		'data' => $data 
    	);
        return view('admin.cuocthi.index', $this->viewData);
    }


public function create()
    {   
    	$tinh = CuocThi::all();
    	$this->viewData = array(
    		'tinh' => $tinh 
    	);
        return view('admin.cuocthi.create',$this->viewData);
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
                $data = CuocThi::create( $data );
                DB::commit();
                Session::flash('success','Success!');
                return redirect(route('admin.cuocthi.index'));
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
        $data = CuocThi::find( $id );
        $this ->viewData = array(
            'data' => $data, 
            );
        return view ( 'admin.cuocthi.edit', $this->viewData );
    }

  
    public function update( Request $request, $id )
    {
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
            $cuocthi = CuocThi::where('id', $id)->first();
            $cuocthi->update($data);
             return redirect(route('admin.huyen.index'));
            Session::flash( 'success', 'Sửa thành công !!!!!');
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
    public function destroy(){
        DB::beginTransaction();
        try {
            CuocThi::find( $id )->delete();
            return redirect(route('admin.huyen.index'));
            Session::flash( 'success', 'Xóa thành công !!!!!');
            DB::commit();
        } catch(\Exception $e) {
            \Log::info( $e->getMessage() );
            DB::rollback();
        }
    }
}
