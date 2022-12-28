
@extends('frontend.user.userDashboard')
@section('user_content')
<h3><strong>Update Your Password</strong></h3>
<br>
<form action="{{ route('user.updatePassword') }}" method="post">{{ csrf_field() }}
	<div class="form-group">
		<label class="info-title" for="current_password">Current Password</label>
		@if(Session::has('current_password'))
            <div class="alert alert-success">
                {{ Session::get('current_password')}}
            </div>
        @endif
		<input type="password" class="form-control unicase-form-control text-input" id="current_password" name="oldpassword">
		@error('current_password')
            <p class="text-danger">{{ $message  }}</p>
        @enderror
		
	</div>
	<div class="form-group">
		<label class="info-title" for="new_password">New Password</label>
		<input type="password" class="form-control unicase-form-control text-input" id="new_password" name="new_password">
		@error('new_password')
            <p class="text-danger">{{ $message  }}</p>
        @enderror
	</div>
	<div class="form-group">
		<label class="info-title" for="password">Confirm Password</label>
		<input type="password" class="form-control unicase-form-control text-input" id="password" name="password">
		@error('password')
            <p class="text-danger">{{ $message  }}</p>
        @enderror
	</div>
	<div class="form-group">
		<input class="btn btn-primary btn-sm " type="submit" value="Save Change">
	</div>
</form>


<br>
@endsection