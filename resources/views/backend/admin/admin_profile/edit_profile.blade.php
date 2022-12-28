@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">
	<!-- Main content -->
	<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Profile</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{ route('admin.profile.update', ['id'=>$admin->id]) }}" method="post" enctype="multipart/form-data">{{ csrf_field() }}
						<div class="row">
							<div class="col-md-6">						
								<div class="form-group">
									<h5>Name:</h5>
									<div class="controls">
										<input type="text" name="name" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false" value="{{ $admin->name }}">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<h5>Email:</h5>
									<div class="controls">
										<input type="email" name="email" class="form-control" required="" data-validation-required-message="This field is required" value="{{ $admin->email }}">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<h5>Profile Image</h5>
									<div class="controls">
										<input id="image" type="file" name="image" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<img id="showImage" class="rounded-circle" style="width: 100px; height: 100px" src="{{ (!empty($admin->profile_photo_path)) ? url('upload/admin_images/'.$admin->profile_photo_path) : url('upload/no_image.jpg') }}" alt="UseAvatar">
							</div>
							<div class="form-group">
								<input class="btn btn-rounded btn-info" type="submit" value="Update Profile">
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

<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>
@endsection