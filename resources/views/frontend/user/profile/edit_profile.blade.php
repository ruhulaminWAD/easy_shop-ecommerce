
@extends('frontend.user.userDashboard')
@section('user_content')
<h3><strong>Update Your Profile</strong> </h3>
<br>
<form action="{{ route('user.profileUpdate') }}" method="post" enctype="multipart/form-data">{{ csrf_field() }}
	<div class="form-group">
		<label class="info-title" for="profile_pic">Profile Picture </label>
		<input type="file" class="form-control unicase-form-control text-input" id="profile_pic" name="profile_pic">
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="info-title" for="name">Name </label>
				<input type="text" class="form-control unicase-form-control text-input" id="name" name="name" value="{{ Auth::user()->name }}">
				@error('name')
					<p class="text-danger">{{ $message  }}</p>
				@enderror
			</div>
			<div class="form-group">
				<label class="info-title" for="phone">Phone Number </label>
				<input type="number" class="form-control unicase-form-control text-input" id="phone" name="phone" value="{{ Auth::user()->phone }}">
				@error('phone') 
					<p class="text-danger">{{ $message  }}</p>
				@enderror
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="info-title" for="address">Address </label>
				<textarea class="form-control unicase-form-control text-input" name="address" id="address" cols="30" rows="4">{{ Auth::user()->address }}</textarea>
			</div>
				@error('address') 
					<p class="text-danger">{{ $message  }}</p>
				@enderror
		</div>
	</div>

	<div class="form-group">
		<input class="btn btn-primary btn-sm " type="submit" value="Save Change">
	</div>
</form>


<br>

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