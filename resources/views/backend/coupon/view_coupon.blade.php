@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">

	<!-- Main content -->
	<section class="content">
		<div class="row">
		<div class="col-lg-8">
			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Total Coupon List <span class="badge badge-pill badge-danger"> {{ count($coupons) }} </span> </h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<table id="example5" class="table table-bordered table-striped" style="width:100%">
					<thead>
						<tr>
							<th>Coupon Name </th>
							<th>Coupon Discount</th>
							<th style="width: 25%;">Validity </th>
							<th>Status </th>
							<th style="width: 25%;">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($coupons as $item)
							<tr>
								<td>{{ $item->coupon_name }}</td>
								<td>{{ $item->coupon_discount }}%</td>
								<td>{{ Carbon\Carbon::parse($item->coupon_validity)->format('D, d F Y') }}</td>
								<td>
									@if($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
										<span class="badge badge-pill badge-success"> Valid  </span>
										@else
										<span class="badge badge-pill badge-danger"> Invalid  </span>
									@endif
								</td>
								<td>
									<a href="{{ route('coupon.edit', $item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
									<a href="{{ route('coupon.destroy', $item->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				</div>
			</div>
			<!-- /.box-body -->
			</div>
			<!-- /.box -->      
		</div>
		<!-- /.col -->
		<div class="col-lg-4">
			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Add Coupon</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<form action="{{ route('coupon.store') }}" method="post" >{{ csrf_field() }}			
						<div class="form-group">
							<h5>Coupon Name</h5>
							<div class="controls">
								<input id="coupon_name" type="text" name="coupon_name" class="form-control">
							</div>
							@error('coupon_name')
								<p class="text-danger">{{ $message  }}</p>
							@enderror
						</div>
						<div class="form-group">
							<h5>Coupon Discount(%)</h5>
							<div class="controls">
								<input id="coupon_discount" type="text" name="coupon_discount" class="form-control">
							</div>
							@error('coupon_discount')
								<p class="text-danger">{{ $message  }}</p>
							@enderror
						</div>
						<div class="form-group">
							<h5>Coupon Validity Date</h5>
							<div class="controls">
								<input id="coupon_validity" type="date" name="coupon_validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
							</div>
							@error('coupon_validity')
								<p class="text-danger">{{ $message  }}</p>
							@enderror
						</div>
						<div class="form-group">
							<input class="btn btn-rounded btn-info" type="submit" value="Save">
						</div>
					</form>
				</div>
			</div>
			<!-- /.box-body -->
			</div>
			<!-- /.box -->      
		</div>
		<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->

</div> <!-- /.container-full  -->
@endsection