<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\CuocThi;
use App\Models\CuocThiTepdinhkem;
use Auth;
use Session;
use Redirect;
use Carbon\Carbon;
use Yajra\Datatables\Facades\Datatables;
use Input;
use Log;
use Response; 
use Validator;

class CuocThiFileController extends Controller
{
    public function admin_index()
    {	
    	$data = CuocThiTepdinhkem::all();
    	$this->viewData = array(
    		'data' => $data 
    	);
        return view('admin.cuocthifile.index', $this->viewData);
    }


	public function create()
    {   
    	$cuocthi = CuocThi::all();
    	$this->viewData = array(
    		'cuocthi' => $cuocthi 
    	);
        return view('admin.cuocthifile.create',$this->viewData);
    }
	public function store(Request $request)
    {   
        $data = $request->all(); 
        try {
            $rules = [
                'cuocthi_id'               =>'required', 
                'ten_tep'               	=>'required', 
                'url'               	=>'required', 
                ];
            $messages = [
                'cuocthi_id.required'      =>'Vui lòng chọn cuộc thi!!!',
                'ten_tep.required'      =>'Vui lòng nhập tên!!!',
                'url.required'      =>'Vui lòng chọn tệp đính kèm!!!',
            ];

            $validator = Validator::make( $request->all(), $rules, $messages);

            if ( $validator->fails() ){
                return redirect()->back()->withInput($data)->withErrors($validator);
            }else{
                DB::beginTransaction();
                $file = $data['url'];
                $extension = $file->getClientOriginalName();
                $path = public_path().'/file/';
                $data['url'] = 'file/'.$extension;
                $file->move($path,$data['url']);
                $data = CuocThiTepdinhkem::create( $data );
                DB::commit();
                Session::flash('success','Success!');
                return redirect(route('admin.cuocthifile.index'));
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
    	$cuocthi = CuocThi::all();
        $data = CuocThiTepdinhkem::find( $id );
        $this ->viewData = array(
            'data' => $data, 
            'cuocthi' => $cuocthi
            );
        return view ( 'admin.cuocthifile.edit', $this->viewData );
    }

  
    public function update( Request $request, $id )
    {
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        try {
            $rules = [
                'cuocthi_id'               =>'required', 
                'ten_tep'               	=>'required', 
                ];
            $messages = [
                'cuocthi_id.required'      =>'Vui lòng chọn cuộc thi!!!',
                'ten_tep.required'      =>'Vui lòng nhập tên!!!',
            ];

            $validator = Validator::make( $request->all(), $rules, $messages);

            if ( $validator->fails() ){
                return redirect()->back()->withInput($data)->withErrors($validator);
            }else{
                DB::beginTransaction();
                if(!$request->hasFile('url')){   
                $cuocthi_file = CuocThiTepdinhkem::where('id', $id)->first();
                $cuocthi_file->update($data);
                Session::flash( 'success', 'Sửa thành công !!!!!');
                return redirect(route('admin.cuocthifile.index'));
                }else{
                $file = $data['url'];
                $extension = $file->getClientOriginalName();
                $path = public_path().'/file/';
                $data['url'] = 'file/'.$extension;
                $file->move($path,$data['url']);
                $cuocthi_file = CuocThiTepdinhkem::where('id', $id)->first();
                $cuocthi_file->update($data);
                Session::flash( 'success', 'Sửa thành công !!!!!');
                return redirect(route('admin.cuocthifile.index'));
                }
            }
        } catch (Exception $e) {
             Session::flash('error','Opp! Please try again.Error!');
            DB::rollback();
        }
         
    }       

}
