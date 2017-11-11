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
				<h3>Coupons</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<!-- X-title -->
					<div class="x_title">
						<h2>Edit</h2>
						<div class="clearfix"></div>
					</div>
					<!-- X-title -->

					<!-- X-content -->
					<div class="x_content">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="title" id="title" required="required" class="form-control col-md-7 col-xs-12" value="{{ $data->title }}">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="discount">Discount<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="number" name="discount" id="discount" required="discount" class="form-control col-md-7 col-xs-12" value="{{ $data->discount }}">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="offer_type">Offer Type<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select class="form-control" id="offer_type" name="offer_type" required>
									<option disabled selected id="offer_type_none"></option>
									<option value="Coupon" @if($data->coupon_type=='Coupon') select @endif>Coupons</option>
									<option value="Printable" @if($data->coupon_type=='Printable') select @endif>Printable</option>
									<option value="Deal" @if($data->coupon_type=='Deal') select @endif>Deals</option>
									<option value="Stores" @if($data->coupon_type=='Stores') select @endif>Stores</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="store">Store<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select class="form-control" id="store_id" name="store_id" required>
									<option disabled selected id="store_id_none"></option>
									<?php foreach ($stores as $key => $value): ?>
										<option value="{{ $value->id }}">{{ $value->name }}</option>
									<?php endforeach?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="code">Code <span class="required"> *</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="code" id="code" class="form-control" required value="{{ $data->code }}">
							</div>
						</div>
						<div class="form-group" style="display: none;">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="store">URL<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="deal_url" id="deal_url" class="form-control" disabled">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="store">Description<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea class="form-control" name="description" id="description" cols="40" rows="5">{{ $data->description }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Coupon Type</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<div class="">
									<label>
										<input type="radio" name="coupon_type" id="coupon_type" class="flat" value="Feature" required="" @if($data->coupon_type == 'Feature') checked  @endif/> Feature &nbsp
										<input type="radio" name="coupon_type" id="coupon_type" class="flat" value="Free" @if($data->coupon_type == 'Free') checked  @endif/>&nbsp Free
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="discount">Date Expired<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="input" name="expired" id="expired" required class="form-control col-md-7 col-xs-12" value="{{ isset($data->expired)?Carbon\Carbon::parse($data->expired)->format('d/m/Y'):'' }}">
							</div>
						</div>

						<div class="form-group">
							<label for="avatar" class="control-label col-md-3 col-sm-3 col-xs-12">Image<span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="file" class="form-control" name="image" id="image">
								<div class="form-group">
									<img src="{{ Storage::url($data->image) }}" class="img img-thumbnail" id="image_preview" width="500px" height="auto">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3 col-sm-3 col-xs-12"></div>
							<div class="col-md-6 col-sm-6 col-xs-12 text-center">
								<a href="{{ route('admin.coupons.index') }}" class="btn btn-default">Cancel</a>
								<button class="btn btn-primary">Update</button>
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
<script type="text/javascript">
	$('#offer_type').select2({
		placeholder : "-- Select a offer type--",
		allowClear : true,
	});
	$('#store_id').select2({
		placeholder : "-- Select a Store --",
	});
	$('#expired').datepicker({
		autoclose : true,
		format : 'dd/mm/yyyy',
	});

	$('#offer_type').val("{{ $data->offer_type }}").trigger("change");
	$('#store_id').val("{{ $data->store_id }}").trigger("change");
</script>
<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#image_preview').attr('src', e.target.result);
				$('#image_preview').css('display', 'block');
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#image").change(function() {
		readURL(this);
	});
</script>
<script type="text/javascript">
	$('#offer_type').on('change',function() {
		var type = $('#offer_type').val();
		if (type == 'Deal') {
			$('#store_id').attr('disabled',true);
			$('#store_id_none').attr('selected','selected');
			$('#store_id').parent().parent().hide();
			$('#code').attr('disabled',true);
			// $('#code').val('');
			$('#code').parent().parent().hide();
			$('#deal_url').attr('disabled',false);
			$('#deal_url').parent().parent().show();
		} else {
			$('#store_id').attr('disabled',false);
			// $('#store_id_none').attr('selected','selected');
			$('#store_id').parent().parent().show();
			$('#code').attr('disabled',false);
			$('#code').parent().parent().show();
			$('#deal_url').attr('disabled',true);
			$('#deal_url').val('');
			$('#deal_url').parent().parent().hide();
			// $('#store_id').val(null).trigger("change");
		}
	});
</script>
@endpush


