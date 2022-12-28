@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">

	<!-- Main content -->
	<section class="content">
		<div class="row">
		<div class="col-12">
			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Update District</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<form action="{{ route('district.update', $district->id) }}" method="post" >{{ csrf_field() }}	

						<div class="form-group">
							<h5>Division Select <span class="text-danger">*</span></h5>
							<div class="controls">
								<select name="shipdivision_id" class="form-control">
									@foreach($divisions as $division)
									<option value="{{ $division->id }}" {{ $division->id == $district->shipdivision_id ? 'selected': '' }}>{{ $division->division_name }}</option>	
									@endforeach
								</select>
								@error('shipdivision_id') 
									<span class="text-danger">{{ $message }}</span>
								@enderror 
							</div>
						</div>

						<div class="form-group">
							<h5>District Name</h5>
							<div class="controls">
								<input id="district_name" type="text" name="district_name" class="form-control" value="{{ $district->district_name }}">
							</div>
							@error('district_name')
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
@endsection