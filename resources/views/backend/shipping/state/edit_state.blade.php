@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">

	<!-- Main content -->
	<section class="content">
		<div class="row">
		<div class="col-12">
			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Update State</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<form action="{{ route('state.update', $state->id) }}" method="post" >{{ csrf_field() }}	

						<div class="form-group">
							<h5>Division Select <span class="text-danger">*</span></h5>
							<div class="controls">
								<select name="shipdivision_id" class="form-control">
									@foreach($divisions as $division)
									<option value="{{ $division->id }}" {{ $division->id == $state->shipdivision_id ? 'selected': '' }}>{{ $division->division_name }}</option>	
									@endforeach
								</select>
								@error('shipdivision_id') 
									<span class="text-danger">{{ $message }}</span>
								@enderror 
							</div>
						</div>

						<div class="form-group">
							<h5>District Select <span class="text-danger">*</span></h5>
							<div class="controls">
								<select name="shipdistrict_id" class="form-control">
									<option selected disabled>Select District</option>
									@foreach($districts as $district)
									<option value="{{ $district->id }}" {{ $district->id == $state->shipdistrict_id ? 'selected': '' }}>{{ $district->district_name }}</option>	
									@endforeach
								</select>
								@error('shipdistrict_id') 
									<span class="text-danger">{{ $message }}</span>
								@enderror 
							</div>
						</div>

						<div class="form-group">
							<h5>State Name</h5>
							<div class="controls">
								<input id="state_name" type="text" name="state_name" class="form-control" value="{{ $state->state_name }}">
							</div>
							@error('state_name')
								<p class="text-danger">{{ $message  }}</p>
							@enderror
						</div>
						<div class="form-group">
							<input class="btn btn-rounded btn-info" type="submit" value="Save">
						</div>
					</form>
				</div>
			</div>
			<!-- /.box-body -->
			</div>
			<!-- /.box -->      
		</div>
		<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->

</div> <!-- /.container-full  -->	

<script type="text/javascript">
	$(document).ready(function() {
		$('select[name="shipdivision_id"]').on('change', function(){
			var shipdivision_id = $(this).val();
			if(shipdivision_id) {
				$.ajax({
					url: "{{  url('/shipping/state/division/ajax') }}/"+shipdivision_id,
					type:"GET",
					dataType:"json",
					success:function(data) {
					var d =$('select[name="shipdistrict_id"]').empty();
						$.each(data, function(key, value){
							$('select[name="shipdistrict_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
						});
					},
				});
			} else {
				alert('danger');
			}
		});
	});
</script>
@endsection