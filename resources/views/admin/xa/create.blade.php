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
            <h3>XÃ</h3>
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
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="store">Tỉnh (Thành phố) <span class="required">*</span>
                     </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="tinh_id" name="tinh_id" required>
                        <option disabled selected id="store_id_none"></option>
                        <?php foreach ($tinh as $key => $value): ?>
                           <option value="{{ $value->id }}">{{ $value->ten }}</option>
                        <?php endforeach ?>
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="store">Huyện<span class="required">*</span>
                     </label>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="huyen_id" name="huyen_id" required>
                        <option disabled selected id="store_id_none"></option>
                        <?php foreach ($huyen as $key => $datas): ?>
                           <option value="{{ $datas->id }}">{{ $datas->ten }}</option>
                        <?php endforeach ?>
                        </select>
                     </div>
                  </div>
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


