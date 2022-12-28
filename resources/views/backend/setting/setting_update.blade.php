@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">
	<!-- Main content -->
	<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Site Setting Page</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">  
					<form action="{{ route('site.setting.update') }}" method="post"  enctype="multipart/form-data">{{ csrf_field() }}
					  <div class="row">
                      <input type="hidden" name="setting_id" value="{{ $setting->id }}">

						<div class="col-md-6">						
							<div class="form-group">
								<h5>Site Logo :</h5>
								<div class="controls">
									<input type="file" name="logo" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<h5>Phone One :</h5>
								<div class="controls">
									<input type="text" name="phone_one" class="form-control" value="{{ $setting->phone_one }}">
								</div>
							</div>
							<div class="form-group">
								<h5>Phone Two :</h5>
								<div class="controls">
									<input type="text" name="phone_two" class="form-control" value="{{ $setting->phone_two }}">
								</div>
							</div>
							<div class="form-group">
								<h5>Email :</h5>
								<div class="controls">
									<input type="text" name="email" class="form-control" value="{{ $setting->email }}">
								</div>
							</div>
							<div class="form-group">
								<h5>Company Name:</h5>
								<div class="controls">
									<input type="text" name="company_name" class="form-control" value="{{ $setting->company_name }}">
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<h5>Company Address :</h5>
								<div class="controls">
									<input type="text" name="company_address" class="form-control" value="{{ $setting->company_address }}">
								</div>
							</div>
							<div class="form-group">
								<h5>Facebook :</h5>
								<div class="controls">
									<input type="text" name="facebook" class="form-control" value="{{ $setting->facebook }}">
								</div>
							</div>
							<div class="form-group">
								<h5>Twitter :</h5>
								<div class="controls">
									<input type="text" name="twitter" class="form-control" value="{{ $setting->twitter }}">
								</div>
							</div>
							<div class="form-group">
								<h5>Linkedin :</h5>
								<div class="controls">
									<input type="text" name="linkedin" class="form-control" value="{{ $setting->linkedin }}">
								</div>
							</div>
							<div class="form-group">
								<h5>Youtube :</h5>
								<div class="controls">
									<input type="text" name="youtube" class="form-control" value="{{ $setting->youtube }}">
								</div>
							</div>
						</div>

                        <div class="form-group">
							    <input class="btn btn-rounded btn-info" type="submit" value="Update Password">
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