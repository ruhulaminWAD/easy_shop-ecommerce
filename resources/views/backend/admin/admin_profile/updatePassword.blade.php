@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">
	<!-- Main content -->
	<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Update Password</h4>
              <p>Ensure your account is using a long, random password to stay secure. </p>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">  
					<form action="{{ route('admin.updatePassword') }}" method="post">{{ csrf_field() }}
					  <div class="row">
						<div class="col-md-6">						
							<div class="form-group">
								<h5>Current Password :</h5>
								@if(Session::has('current_password'))
									<div class="alert alert-success">
										{{ Session::get('current_password')}}
									</div>
								@endif
								<div class="controls">
									<input id="current_password" type="password" name="oldpassword" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false">
								</div>
								@error('oldpassword')
									<p class="text-danger">{{ $message  }}</p>
								@enderror
								
							</div>
							<div class="form-group">
								<h5>New Password :</h5>
								<div class="controls">
									<input id="password" type="password" name="password" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false">
								</div>
								@error('password')
									<p class="text-danger">{{ $message  }}</p>
								@enderror
							</div>
							<div class="form-group">
								<h5>Confirm Password :</h5>
								<div class="controls">
									<input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false">
								</div>
								@error('password')
									<p class="text-danger">{{ $message  }}</p>
								@enderror
							</div>
                            <div class="form-group">
							    <input class="btn btn-rounded btn-info" type="submit" value="Update Password">
						    </div>
						</div>
					  </div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

	</section>
	<!-- /.content -->

</div> <!-- /.container-full  -->


@endsection