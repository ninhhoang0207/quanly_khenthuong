<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title') | QUẢN LÝ KHEN THƯỞNG</title>
	<!-- Bootstrap library-->
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<!-- Font-awsome -->
	<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
	<!-- Bootstrap library-->
	<link href="{{asset('css/nprogress.css')}}" rel="stylesheet">
	<!-- Toastr -->
	<link href="{{asset('css/toastr.min.css')}}" rel="stylesheet">
	<!-- Select 2 -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/select2.css') }}">
	<!-- Swtich button -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/switchery.css') }}">
	<!-- Check button -->
	<link rel="stylesheet" type="text/css" href="{{ asset('iCheck/skins/flat/green.css') }}">
	<!-- Custom Theme Style -->
	<link href="{{asset('build/css/custom.css')}}" rel="stylesheet">
	<!-- Date Picker -->
	<link rel="stylesheet" href="{{url('css/bootstrap-datepicker3.css')}}"/>

	@yield('header')
</head>
<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			@include('includes/sidebar_menu')
			@include('includes/top_menu')
			<!-- page content -->
			<div class="right_col" role="main">
				@yield('content')
			</div>
		</div>
	</div>
	<!-- Modal delete-->
	<div id="modal-delete" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
				<p>Có chắc chắn muốn xóa đối tượng này?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
					<a href="" id="confirm-delete"  class="btn btn-danger" >Xóa</a>
				</div>
			</div>
		</div>
	</div>
</body>
<!-- jQuery -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- Moment -->
<script src="{{asset('js/moment.min.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('js/nprogress.js')}}"></script>
<!-- Select 2 -->
<script type="text/javascript" src="{{ asset('js/select2.js') }}"></script>
<!-- Switch button -->
<script type="text/javascript" src="{{ asset('js/switchery.js') }}"></script>
<!-- Toastr -->
<script type="text/javascript" src="{{ asset('js/toastr.min.js') }}"></script>
<!-- Checkbox -->
<script type="text/javascript" src="{{ asset('iCheck/icheck.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{asset('build/js/custom.min.js')}}"></script>
<!-- Date Picker -->
<script type="text/javascript" src="{{url('js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
	@if (Session::has('success')) 
	toastr.success('{{ Session::get("success") }}');
	@endif
	@if (Session::has('warning')) 
	toastr.warning('{{ Session::get("warning") }}');
	@endif
	@if (Session::has('error')) 
	toastr.error('{{ Session::get("error") }}');
	@endif
</script>
@stack('scripts')
</html>
