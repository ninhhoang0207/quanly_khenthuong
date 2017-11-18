@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Đăng ký</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Tên</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Địa chỉ E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mật khẩu</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Nhập lại mật khẩu</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role" class="col-md-4 control-label">Loại tài khoản</label>

                            <div class="col-md-6">
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
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                        @endif

                        <div class="form-group">
                            <label for="avatar" class="col-md-4 control-label">Ảnh đại diện</label>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" class="form-control" name="avatar" id="avatar">
                                <div class="form-group">
                                    <img src="" class="img img-thumbnail" id="preview_avatar" width="500px" height="auto" style="display: none;">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('form').validate({ // initialize the plugin
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
@endsection