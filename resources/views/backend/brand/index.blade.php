@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">

	<!-- Main content -->
	<section class="content">
		<div class="row">
		<div class="col-lg-8">
			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Total Brand List <span class="badge badge-pill badge-danger"> {{ count($brands) }} </span> </h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<table id="example5" class="table table-bordered table-striped" style="width:100%">
					<thead>
						<tr>
							<th>Brand Name_en</th>
							<th>Brand Name_bn</th>
							<th>Brand Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($brands as $item)
							<tr>
								<td>{{ $item->brand_name_en }}</td>
								<td>{{ $item->brand_name_bn }}</td>
								<td><img src="{{ asset($item->brand_image) }}" alt="Image" style="width: 70px; height: 40px;"></td>
								<td>
									<a href="{{ route('brand.edit', $item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
									<a href="{{ route('brand.destroy', $item->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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
				<h3 class="box-title">Add Brand</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">{{ csrf_field() }}			
						<div class="form-group">
							<h5>Brand Name English</h5>
							<div class="controls">
								<input id="brand_name_en" type="text" name="brand_name_en" class="form-control">
							</div>
							@error('brand_name_en')
								<p class="text-danger">{{ $message  }}</p>
							@enderror
						</div>
						<div class="form-group">
							<h5>Brand Name bangla</h5>
							<div class="controls">
								<input id="brand_name_bn" type="text" name="brand_name_bn" class="form-control">
							</div>
							@error('brand_name_bn')
								<p class="text-danger">{{ $message  }}</p>
							@enderror
						</div>
						<div class="form-group">
							<h5>Brand Image</h5>
							<div class="controls">
								<input id="brand_image" type="file" name="brand_image" class="form-control">
							</div>
							@error('brand_image')
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