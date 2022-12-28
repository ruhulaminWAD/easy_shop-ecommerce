@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">

	<!-- Main content -->
	<section class="content">
		<div class="row">
		<div class="col-12">
			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Update Coupon</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<form action="{{ route('coupon.update', $coupon->id) }}" method="post" >{{ csrf_field() }}			
						<div class="form-group">
							<h5>Coupon Name</h5>
							<div class="controls">
								<input id="coupon_name" type="text" name="coupon_name" class="form-control" value="{{ $coupon->coupon_name }}">
							</div>
							@error('coupon_name')
								<p class="text-danger">{{ $message  }}</p>
							@enderror
						</div>
						<div class="form-group">
							<h5>Coupon Discount(%)</h5>
							<div class="controls">
								<input id="coupon_discount" type="text" name="coupon_discount" class="form-control" value="{{ $coupon->coupon_discount }}">
							</div>
							@error('coupon_discount')
								<p class="text-danger">{{ $message  }}</p>
							@enderror
						</div>
						<div class="form-group">
							<h5>Coupon Validity Date</h5>
							<div class="controls">
								<input id="coupon_validity" type="date" name="coupon_validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ $coupon->coupon_validity }}">
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