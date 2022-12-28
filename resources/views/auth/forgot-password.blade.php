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
                    <h3>Recover Password</h3>
                    <div class="">
                        <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                    </div>
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                    <form method="POST" action="{{ route('password.email') }}">@csrf
                        <div class="form-group">
                            <label class="info-title" for="email">Email</label>
                            <input type="email" class="form-control unicase-form-control text-input" id="email" name="email" placeholder="enter your email">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary btn-sm " type="submit" value="reset">
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