@extends('frontend.frontend_master')
@section('main_content')
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ route('homePage') }}">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="">
            <div class="row ">
                <div class="col-lg-3"></div>
                <div class="col-lg-6 sign-in-page">
                    <h3>Update Password</h3><br>
                    <form method="POST" action="{{ route('password.update') }}">@csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="form-group">
                            <label class="info-title" for="email">Email</label>
                            <input type="email" class="form-control unicase-form-control text-input" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="password">New Password</label>
                            <input type="password" class="form-control unicase-form-control text-input" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control unicase-form-control text-input" id="password_confirmation" name="password_confirmation">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary btn-sm " type="submit" value="Save Change">
                        </div>
                    </form>
                </div>
                <div class="col-lg-3"></div>
            </div>
		</div><!-- /.sigin-in-->
	</div><!-- /.container-->
</div><!-- /.body-content -->



    <br><br><br><br>
  </div>
  <!-- /.container --> 
</div>
<!-- /#top-banner-and-menu -->
@endsection