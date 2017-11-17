@extends('templates.admin')

@section('header')   
<link rel="stylesheet" type="text/css" href="{{ asset('css/select2.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/switchery.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('iCheck/skins/flat/green.css') }}">
@endsection

@section('content')
<form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
   {{ csrf_field() }}
   <div class="">
      <div class="page-title">
         <div class="title_left">
            <h3>CUỘC THI</h3>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
         <div class="clearfix"></div>
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
               <!-- X-title -->
               <div class="x_title">
                  <h2>THÊM MỚI</h2>
                  <div class="clearfix"></div>
               </div>
               <!-- X-title -->

               <!-- X-content -->
               <div class="x_content">
                  <div class="form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ten">Tên<span class="required">*</span>
                     </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="ten" id="ten" required="required" class="form-control col-md-7 col-xs-12">
                        @if($errors->has('ten'))
                                  <span class="help-block">
                                      <strong style="color: red;">{{$errors->first('ten')}}</strong>
                                  </span>   
                              @endif
                     </div>
                  </div>      
                  <div class="form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ten">Thời hạn tham gia<span class="required">*</span>
                     </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="thoihan_thamgia" id="thoihan_thamgia" required="required" class="form-control col-md-7 col-xs-12">
                        @if($errors->has('thoihan_thamgia'))
                                  <span class="help-block">
                                      <strong style="color: red;">{{$errors->first('thoihan_thamgia')}}</strong>
                                  </span>   
                              @endif
                     </div>
                  </div>  
                  <div class="form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="offer_type">Loại hình<span class="required">*</span>
                     </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="loaihinh" name="loaihinh" required>
                           <option disabled selected id="offer_type_none"></option>
                           <option value="1">Cá nhân</option>
                           <option value="2">Tổ chức</option>
                        </select>
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="offer_type">Ban tổ chức<span class="required">*</span>
                     </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="ban_tochuc" name="ban_tochuc" required>
                           <option disabled selected id="offer_type_none"></option>
                           <option value="5">Tỉnh</option>
                           <option value="4">Huyện</option>
                           <option value="3">Xã</option>
                        </select>
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="offer_type">Ban tổ chức<span class="required">*</span>
                     </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="ban_tochuc" name="ban_tochuc" required>
                           <option disabled selected id="offer_type_none"></option>
                           <option value="5">Tỉnh</option>
                           <option value="4">Huyện</option>
                           <option value="3">Xã</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="offer_type">Bắt buộc<span class="required">*</span>
                     </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="checkbox" class="js-switch" name="batbuoc" value="1" checked />
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ten">Giải thưởng<span class="required">*</span>
                     </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="giaithuong" id="giaithuong" required="required" class="form-control col-md-7 col-xs-12">
                        @if($errors->has('giaithuong'))
                                  <span class="help-block">
                                      <strong style="color: red;">{{$errors->first('giaithuong')}}</strong>
                                  </span>   
                              @endif
                     </div>
                  </div>  
                  <div class="form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ten">Mô tả<span class="required">*</span>
                     </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="mota" id="mota" required="required" class="form-control col-md-7 col-xs-12">
                     </div>
                  </div>  
                  <div class="form-group">
                     <div class="col-md-3 col-sm-3 col-xs-12"></div>
                     <div class="col-md-6 col-sm-6 col-xs-12 text-center">
                        <button class="btn btn-default">Hủy</button>
                        <button class="btn btn-primary">Lưu</button>
                     </div>
                  </div>
               </div>
               <!-- X-content -->
            </div>
         </div>
      </div>
   </div>
</form>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ asset('js/select2.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/switchery.js') }}"></script>
<script type="text/javascript" src="{{ asset('iCheck/icheck.js') }}"></script>

@endpush


