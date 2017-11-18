@extends('templates.admin')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap.css') }}"/>
@endsection


@section('content')
<form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Danh sách thành viên</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<!-- X-title -->
					<div class="x_title">
						<h2>Danh sách tài khoản chưa kích hoạt</h2>
						<!-- <div class="nav navbar-right"> -->
							<!-- <button class="btn btn-default" id="refresh-gallery-wating" "><i class="fa fa-refresh"></i></button> -->
						<!-- </div> -->
						<div class="clearfix"></div>
					</div>
					<!-- X-title -->
					
					<!-- X-content -->
					<div class="x_content">
						<div id="">
							<div class="form-group">
								<table id="table-not-active" class="table table-condensed">
									<thead>
											<th>STT</th>
											<th width="30%">Tên</th>
											<th>Email</th>
											<th>Ảnh đại diện</th>
											<th>Loại tài khoản</th>
											<th>Thời gian tạo</th>
											<th>Chức năng</th>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3 col-sm-3 col-xs-12"></div>
							<div class="col-md-6 col-sm-6 col-xs-12 text-center">
							</div>
						</div>
					</div>
					<!-- X-content -->
				</div>
			</div>
		</div>
		<div class="row">
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<!-- X-title -->
					<div class="x_title">
						<h2>Danh sách tài khoản đã kích hoạt</h2>
						<div class="nav navbar-right">
							<a class="btn btn-primary" href="{{ route('user.create') }}">Tạo mới</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<!-- X-title -->
					
					<!-- X-content -->
					<div class="x_content">
						<div id="list_posted">
							<div class="form-group">
								<table id="table-actived" class="table table-condensed">
									<thead>
										<th>STT</th>
										<th width="30%">Tên</th>
										<th>Email</th>
										<th>Ảnh đại diện</th>
										<th>Loại tài khoản</th>
										<th>Thời gian tạo</th>
										<th>Chức năng</th>
									</thead>
									<tbody>
									</tbody>
									<tfoot>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3 col-sm-3 col-xs-12"></div>
							<div class="col-md-6 col-sm-6 col-xs-12 text-center">
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
<script type="text/javascript" src="{{ asset('js/dataTables.min.js') }}"></script>
<script type="text/javascript">
	// $('#category-search-waiting').select2();
	// $('#category-search-posted').select2();


	$('#confirm-delete').on('click', function(e) {
		e.preventDefault();
		$('#modal-delete').modal('hide');
		$.ajax({
			url : $(this).attr('href'),
			type : "GET",
		}).done(function(data) {
			if (data == 1) {
				tbl_gallery_posted.draw();
				tbl_gallery_waiting.draw();
				toastr.success('{{ Lang::get("general.success") }}');
			} else {
				toastr.error('{{ Lang::get("general.error") }}');
			}
			$('#modal-delete').modal('hide');
		});
	});
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': '{{ csrf_token() }}',
		}
	});
	// Table gallery waiting
	var table_not_active = $('#table-not-active').DataTable({
		processing : true,
		serverSide : true,
		ajax : {
			url : "{{ route('user.getUserNotActive') }}",
			type : "POST",
		},
		columns : [
			{"data":null,
				"render" : function (data, type, full, meta) {
					return meta.row+1; 
				},
				"searchable": false,
				"orderable": false 
			},
			{data : 'name'},
			{data : 'email'},
			{
				data : 'avatar', 
				name : 'avatar',
				"searchable": false,
				"orderable": false,
				render : function (data, type, full, meta) {
					var string = '';
					if (data != '' && data != null)
						var string = '<img src="'+data+'" width="70px" height="70px">';
					else 
						string = '<img src="/images/user.png" width="70px" height="70px">';
					
					return string;
				}
			},
			{
				data : 'role', 
				name : 'role',
				render : function (data, type, full, meta) {
					// console.log(data);
					if (data == 1)
						return '<span class="label label-success">'+'Nhân viên'+'</span>';
					else if (data == 2)
						return '<span class="label label-warning">'+'Phòng ban'+'</span>';
					else if (data == 3)
						return '<span class="label label-warning">'+'Quản láy cấp Xã'+'</span>';
					else if (data == 4)
						return '<span class="label label-warning">'+'Quản lý cấp Huyện'+'</span>';
					else
						return '<span class="label label-warning">'+'Quản lý cấp tỉnh'+'</span>';
				}
			},
			{data : 'created_at', name : 'created_at'},
			{
				data : 'id', 
				"searchable": false,
				"orderable" : false,
				render : function (data, type, full, meta) {
					var string = '';
					return string;
				}
			}
		],
	});

	// Table new posted
	var table_actived = $('#table-actived').DataTable({
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
			{data : 'name'},
			{data : 'email'},
			{
				data : 'avatar', 
				name : 'avatar',
				"searchable": false,
				"orderable": false,
				render : function (data, type, full, meta) {
					var string = '';
					if (data != '' && data != null)
						var string = '<img src="'+data+'" width="70px" height="70px">';
					else 
						string = '<img src="/images/user.png" width="70px" height="70px">';
					
					return string;
				}
			},
			{
				data : 'role', 
				name : 'role',
				render : function (data, type, full, meta) {
					if (data == 1)
						return '<span class="label label-success">'+'Nhân viên'+'</span>';
					else if (data == 2)
						return '<span class="label label-warning">'+'Phòng ban'+'</span>';
					else if (data == 3)
						return '<span class="label label-warning">'+'Quản láy cấp Xã'+'</span>';
					else if (data == 4)
						return '<span class="label label-warning">'+'Quản lý cấp Huyện'+'</span>';
					else
						return '<span class="label label-warning">'+'Quản lý cấp tỉnh'+'</span>';
				}
			},
			{data : 'created_at', name : 'created_at'},
			{
				data : 'id', 
				"searchable": false,
				"orderable" : false,
				render : function (data, type, full, meta) {
					var string = '';
					return string;
				}
			}
		],
	});
	//Search by category 

	// Add event listener for opening and closing details
</script>
@endpush