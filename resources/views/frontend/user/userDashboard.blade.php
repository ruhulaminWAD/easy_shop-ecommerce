@extends('frontend.frontend_master')
@section('main_content')
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row">
		<div class="col-md-2">
			<img class="card-img-top" style="width: 100px; height: 100px; border-radius: 50%;" src="{{ (!empty(Auth::user()->profile_photo_path)) ? url('upload/user_profile_pic/'.Auth::user()->profile_photo_path) : url('upload/no_image.jpg') }}" alt="User Images">
			<br><br>
			<ul class="list-group list-group-flosh">
				<a href="{{ route('user.dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
				<a href="{{ route('user.profileEdit') }}" class="btn btn-primary btn-sm btn-block">Profle Update</a>
				<a href="{{ route('user.changePassword') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
				<a href="{{ route('MyOrder') }}" class="btn btn-primary btn-sm btn-block">My Orders</a>
				<a href="{{ route('return.order.list') }}" class="btn btn-primary btn-sm btn-block">Return Orders</a>
				<a href="{{ route('cancel.order') }}" class="btn btn-primary btn-sm btn-block">Cancel Orders</a>
				
				<a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
			</ul>
		</div><!-- End col-md-2 --> 
		<div class="col-md-1"></div><!-- End col-md-2 -->
		<div class="col-md-9">
            @yield('user_content')
		</div><!-- End col-md-8 -->
	</div>
	<div class="row">
		@yield('order_details')
	</div>
  </div>
  <!-- /.container --> 
</div>
<!-- /#top-banner-and-menu -->
@endsection