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
				<h3>Coupon</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<!-- X-title -->
					<div class="x_title">
						<h2>List</h2>
						<a href="{{ route('admin.coupons.create') }}" class="btn btn-primary pull-right">Create</a>
						<div class="clearfix"></div>
					</div>
					<!-- X-title -->

					<!-- X-content -->
					<div class="x_content">
						<table class="table" id="table-category">
							<thead>
								<th>Order</th>
								<th>Tile</th>
								<th>Discount</th>
								<th>Store</th>
								<th>Type</th>
								<th>Expired</th>
								<th></th>
							</thead>
							<tbody>
								@foreach ($data as $key => $value)
								<tr>
									<td>{{ $key+1 }}</td>
									<td>{{ $value->title }}</td>
									<td>{{ $value->discount }}</td>
									<td>{{ isset($value->store)?$value->store->name:'' }}</td>
									<td>{{ $value->offer_type }}</td>
									<td>{{ Carbon\Carbon::parse($value->expired)->format('d/m/Y') }}</td>
									<td>
										<a href="{{ route('admin.coupons.edit', ['id'=>$value->id]) }}" class="btn btn-warning btn-xs">Edit</a>
										<a onclick="getModalDelete('{{ route('admin.coupons.remove', ['id'=>$value->id]) }}')" class="btn btn-danger btn-xs">Remove</a>
									</td>
								</tr>
								@endforeach
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
<script type="text/javascript" src="{{ asset('js/switchery.js') }}"></script>
<script type="text/javascript" src="{{ asset('iCheck/icheck.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dataTables.min.js') }}"></script>
<script type="text/javascript" >
	$('#table-category').DataTable();


	function getModalDelete(url) {
		var modal = $('#modal-delete');
		modal.find('.modal-title').text('Delete category');
		modal.find('#confirm-delete').attr('href', url);
		modal.modal('show');
	}
</script>
@endpush


