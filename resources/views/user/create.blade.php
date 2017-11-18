@extends('templates.admin')
@section('content')
<form class="form-horizontal form-label-left" id="form" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Tài khoản</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<!-- X-title -->
					<div class="x_title">
						<h2>Tạo mới</h2>
						<div class="clearfix"></div>
					</div>
					<!-- X-title -->

					<!-- X-content -->
					<div class="x_content">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tên <span class="description">*</span>
							</label>

							<div class="col-md-6 col-sm-6 col-xs-12 " >
								<input type="text" name="name" id="name" required="required" class="form-control col-md-7 col-xs-12" value="{{old('name')}}">
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Địa chỉ Email<span class="description">*</span></label>

							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="email" name="email" id="email" required="required" class="form-control col-md7 col-xs-7 col-xs-12">

								@if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Mật khẩu<span class="required">*</span></label>
							
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="password" name="password" id="password" required="requird" class="form-control col-md7 col-xs-7 col-xs-12" minlength="5">
								@if ($errors->has('password'))
								<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<label for="password-confirmation" class="control-label col-md-3 col-sm-3 col-xs-12">Nhập lại mật khẩu<span class="required">*</span></label>
							
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="password" name="password_confirmation" id="password-confirm" class="form-control col-md7 col-xs-7 col-xs-12">
							</div>
						</div>
						
						<div class="form-group">
							<label for="role" class="control-label col-md-3 col-sm-3 col-xs-12">Loại tài khoản<span class="required">*</span></label>
							
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select class="form-control" name="role" required>
                                    <option selected disabled>-- Chọn loại tài khoản --</option>
                                    <option value="1">Tài khoản nhân viên</option>
                                    <option value="2">Tài khoản phòng ban</option>
                                    <option value="3">Tài khoản quản lý cấp Xã</option>
                                    <option value="4">Tài khoản quản lý cấp Huyện</option>
                                    <option value="5">Tài khoản quản lý cấp Tỉnh</option>
                                </select>
							</div>
						</div>

						<div class="form-group">
							<label for="avatar" class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh đại diện</label>
							
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="file" class="form-control" name="avatar" id="avatar">
								<div class="form-group">
									<img src="" class="img img-thumbnail" id="preview_avatar" width="500px" height="auto" style="display: none;">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-md-3 col-sm-3 col-xs-12"></div>
							<div class="col-md-6 col-sm-6 col-xs-12 text-center">
								<a href="{{ route('user') }}" class="btn btn-default">Hủy</a>
								<button class="btn btn-primary">Tạo tài khoản</button>
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
<script src="http://demo.expertphp.in/js/jquery.validate.min.js"></script>

<script type="text/javascript">
	 $(document).ready(function () {
    $('#form').validate({ // initialize the plugin
    	rules : {
    		password_confirmation : {
    			equalTo : '#password',
    		},
    		avatar : {
    			accept:"jpg,png,jpeg,bmp"
    		}
    	},

    	messages : {
    		email : {
    			required : "Email không được để trống",
    			email : "Email không đúng định dạng",

    		},
    		password : {
    			required : "Mật khẩu không được để trống",
    			minlength : "Mật khẩu phải có ít nhất 5 ký tự"
    		},
    		password_confirmation : {
    			equalTo : "Nhập lại mật khẩu không chính xác",
    		},
    		name: {
    			required: "Tên đăng nhập không được để trống",
    		},
    		role: {
    			required: "Chưa chọn loại tài khoản",
    		},
    		avatar: {
    			accept: "Ảnh tải lên phải có dạng jpg, jpeg, png hoặc bmp",
    		},
    	},

    });
 });
</script>
<script>
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#preview_avatar').attr('src', e.target.result);
				$('#preview_avatar').css('display', 'block');
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#avatar").change(function() {
		readURL(this);
	});
</script>

@endpush

