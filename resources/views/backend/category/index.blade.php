@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">

	<!-- Main content -->
	<section class="content">
		<div class="row">
		<div class="col-lg-8">
			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Total Category List <span class="badge badge-pill badge-danger"> {{ count($categorys) }} </span> </h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<table id="example5" class="table table-bordered table-striped" style="width:100%">
					<thead>
						<tr>
							<th>Category Icon</th>
							<th>Category en</th>
							<th>Category bn</th>
							<th style="width: 25%;">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categorys as $item)
							<tr>
								<td><span><i class="{{ $item->category_icon }}"></i></span></td>
								<td>{{ $item->category_name_en }}</td>
								<td>{{ $item->category_name_bn }}</td>
								<td>
									<a href="{{ route('category.edit', $item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
									<a href="{{ route('category.destroy', $item->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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
				<h3 class="box-title">Add Category</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<form action="{{ route('category.store') }}" method="post" >{{ csrf_field() }}			
						<div class="form-group">
							<h5>Category Name English</h5>
							<div class="controls">
								<input id="category_name_en" type="text" name="category_name_en" class="form-control">
							</div>
							@error('category_name_en')
								<p class="text-danger">{{ $message  }}</p>
							@enderror
						</div>
						<div class="form-group">
							<h5>Category Name bangla</h5>
							<div class="controls">
								<input id="category_name_bn" type="text" name="category_name_bn" class="form-control">
							</div>
							@error('category_name_bn')
								<p class="text-danger">{{ $message  }}</p>
							@enderror
						</div>
						<div class="form-group">
							<h5>Category Icon</h5>
							<div class="controls">
								<input id="category_icon" type="text" name="category_icon" class="form-control">
							</div>
							@error('category_icon')
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