@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="box box-widget widget-user">
				<!-- Add the bg color to the header using any of the bg-* classes -->
				<div class="widget-user-header bg-black">
					<h3 class="widget-user-username">Admin Name: {{ $admin->name }}</h3>
					<a href="{{ route('admin.profile.edit', ['id'=>$admin->id]) }}" class="btn btn-success btn-flat mb-5" style="float: right;"><i class="fa fa-edit"></i> Edit profile</a>
					<h6 class="widget-user-desc">Admin Email: {{ $admin->email }}</h6>
				</div>
				<div class="widget-user-image">
				<img style="width: 80px; height: 80px" class="rounded-circle" src="{{ (!empty($admin->profile_photo_path)) ? asset($admin->profile_photo_path) : url('upload/no_image.jpg') }}" alt="UseAvatar">
				</div>
				<div class="box-footer">
				<div class="row">
					<div class="col-sm-4">
					<div class="description-block">
						<h5 class="description-header">12K</h5>
						<span class="description-text">FOLLOWERS</span>
					</div>
					<!-- /.description-block -->
					</div>
					<!-- /.col -->
					<div class="col-sm-4 br-1 bl-1">
					<div class="description-block">
						<h5 class="description-header">550</h5>
						<span class="description-text">FOLLOWERS</span>
					</div>
					<!-- /.description-block -->
					</div>
					<!-- /.col -->
					<div class="col-sm-4">
					<div class="description-block">
						<h5 class="description-header">158</h5>
						<span class="description-text">TWEETS</span>
					</div>
					<!-- /.description-block -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->

</div> <!-- /.container-full  -->
@endsection