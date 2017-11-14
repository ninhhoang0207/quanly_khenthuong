@extends('templates.admin')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/select2.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/switchery.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('iCheck/skins/flat/green.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap.css') }}">
@endsection

@section('content')
<form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
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
						<h2>Danh sách tài khoản đã kích hoạt</h2>
						<a href="{{ route('user.create') }}" class="btn btn-primary pull-right">Tạo mới</a>
						<div class="clearfix"></div>
					</div>
					<!-- X-title -->

					<!-- X-content -->
					<div class="x_content">
						<table class="table" id="table-user-actived">
							<thead>
								<th>STT</th>
								<th>Họ tên</th>
								<th>Địa chỉ Email</th>
								<th>Ảnh đại diện</th>
								<th>Quyền hạn</th>
								<th>Ngày tạo</th>
								<th></th>
							</thead>
							<tbody>
							</tbody>
						</table>
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
<script type="text/javascript" src="{{ asset('js/dataTables.min.js') }}"></script>
<script type="text/javascript" >
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': '{{ csrf_token() }}',
		}
	})

	// Bảng tài khoản đã được kích hạot
	var table_user_actived = $('#table-user-actived').DataTable({
		processing : true,
		serverSide : true,
		ajax : {
			url : "{{ route('user.getUserActived') }}",
			type : "POST",
		},
		// ajax : "posted-data",
		columns : [
			{"data":null,
				"render" : function (data, type, full, meta) {
					return meta.row+1; 
				},
				"searchable": false,
				"orderable": false 
			},
			{
				data : 'name',
			},
			{
				data : 'email',
			},
			{
				data : 'avatar', 
				"searchable": false,
				"orderable": false,
				render : function (data, type, full, meta) {
					var string = '<img src="'+data+'" width="70px" height="50px">';
					return string;
				}
			},
			{
				data : 'role', 
				"searchable": false,
				"orderable": false,
				render : function (data, type, full, meta) {
					var string = '<span class="label">'+data+'</span>';
					return string;
				}
			},
			{data : 'created_at'},
			{
				data : 'id', 
				"searchable": false,
				"orderable" : false,
			}
		],
	});

	function getModalDelete(url) {
		var modal = $('#modal-delete');
		modal.find('.modal-title').text('Delete category');
		modal.find('#confirm-delete').attr('href', url);
		modal.modal('show');
	}
</script>
@endpush


