@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">

	<!-- Main content -->
	<section class="content">
		<div class="row">
		<div class="col-lg-8">
			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Total District List <span class="badge badge-pill badge-danger"> {{ count($districts) }} </span> </h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<table id="example5" class="table table-bordered table-striped" style="width:100%">
					<thead>
						<tr>
							<th>Division Name </th>
							<th>District Name </th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($districts as $item)
							<tr>
								<td>{{ $item->division->division_name }}</td>
								<td>{{ $item->district_name }}</td>
								<td>
									<a href="{{ route('district.edit', $item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
									<a href="{{ route('district.destroy', $item->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				</div>
			</div>
			<!-- /.box-body -->
			</div>
			<!-- /.box -->      
		</div>
		<!-- /.col -->
		<div class="col-lg-4">
			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Add District</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<form action="{{ route('district.store') }}" method="post" >{{ csrf_field() }}	

						<div class="form-group">
							<h5>Division Select <span class="text-danger">*</span></h5>
							<div class="controls">
								<select name="shipdivision_id" class="form-control"  >
									<option selected disabled>Select Division</option>
									@foreach($divisions as $division)
									<option value="{{ $division->id }}">{{ $division->division_name }}</option>	
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
								<input id="district_name" type="text" name="district_name" class="form-control">
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