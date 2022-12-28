@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">

 	<!-- Main content -->
	<section class="content">
		<div class="row">
		<div class="col-lg-8">
			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"> List</h3>
				<h3 class="box-title">Total Slider List <span class="badge badge-pill badge-danger"> {{ count($sliders) }} </span> </h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<table id="example5" class="table table-bordered table-striped" style="width:100%">
					<thead>
						<tr>
							<th>Slider Image </th>
							<th>Title</th>
							<th>Decription</th>
							<th>Status</th>
							<th style="width: 25%;">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($sliders as $item)
							<tr>
								<td>
									<img src="{{ asset($item->slider_image) }}" alt="Image" style="width: 70px; height: 40px;">
								</td>
								<td>
									@if($item->title == NULL)
									<span class="badge badge-pill badge-danger"> No Title </span>
									@else
									{{ $item->title }}
									@endif
								</td>
								<td>
									@if($item->description == NULL)
									<span class="badge badge-pill badge-danger"> No Description </span>
									@else
									{{ $item->description }}
									@endif
								</td>
								<td>
									@if($item->status == 1)
										<span class="badge badge-pill badge-success"> Active </span>
										@else
										<span class="badge badge-pill badge-danger"> InActive </span>
									@endif
								</td>
								<td>
									<a href="{{ route('slider.edit', $item->id) }}" class="btn btn-info  btn-sm" title="Slider Edit"><i class="fa fa-edit"></i></a>
									<a href="{{ route('slider.destroy', $item->id) }}" class="btn btn-danger btn-sm" id="delete" title="Slider Delete"><i class="fa fa-trash"></i></a>
									@if($item->status == 1)
										<a href="{{ route('slider.Inactive', $item->id) }}" class="btn btn-danger btn-sm" title="Inactive Now" ><i class="fa fa-arrow-down"></i></a>
									@else
										<a href="{{ route('slider.Active', $item->id) }}" class="btn btn-success btn-sm" title="Active Now"><i class="fa fa-arrow-up"></i></a>
									@endif
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
				<h3 class="box-title">Add Slider</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">{{ csrf_field() }}			
						<div class="form-group">
							<h5>Slider Title</h5>
							<div class="controls">
								<input  type="text" name="title" class="form-control" value="{{ old('title') }}">
							</div>
						</div>
						<div class="form-group">
							<h5>Slider Description</h5>
							<div class="controls">
								<textarea class="form-control" name="description">{{ old('description') }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<h5>Slider Image</h5>
							<div class="controls">
								<input  type="file" name="slider_image" class="form-control" required>
							</div>
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