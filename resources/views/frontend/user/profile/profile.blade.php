@extends('frontend.user.userDashboard')
@section('user_content')

<h3> Welcome to Easy Online Shop</h3>
<br>
<div class="form-group">
	<label class="info-title" >Name </label>
	<p class="form-control unicase-form-control text-input" >{{ Auth::user()->name }}</p>
</div>
<div class="form-group">
	<label class="info-title" >Email </label>
	<p class="form-control unicase-form-control text-input" >{{ Auth::user()->email }}</p>
</div>
@if(Auth::user()->phone)
<div class="form-group">
	<label class="info-title" >Phone Number </label>
	<p class="form-control unicase-form-control text-input" >{{ Auth::user()->phone }}</p>
</div>
@endif
@if(Auth::user()->address)
<div class="form-group">
	<label class="info-title" >Address </label>
	<p class="form-control unicase-form-control text-input" >{{ Auth::user()->address }}</p>
</div>
@endif


<br>
@endsection