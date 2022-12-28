@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">

	<!-- Main content -->
	<section class="content">
		<div class="row">
		<!-- /.col -->
		<div class="col-12">
			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Update Category</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<form action="{{ route('category.update', $category->id) }}" method="post" >{{ csrf_field() }}	
						<input type="hidden" name="category_id" value="{{ $category->id }}">		
						<div class="form-group">
							<h5>Category Name English</h5>
							<div class="controls">
								<input id="category_name_en" type="text" name="category_name_en" class="form-control" value="{{$category->category_name_en }}">
							</div>
							@error('category_name_en')
								<p class="text-danger">{{ $message  }}</p>
							@enderror
						</div>
						<div class="form-group">
							<h5>Category Name bangla</h5>
							<div class="controls">
								<input id="category_name_bn" type="text" name="category_name_bn" class="form-control" value="{{$category->category_name_bn }}">
							</div>
							@error('category_name_bn')
								<p class="text-danger">{{ $message  }}</p>
							@enderror
						</div>
						<div class="form-group">
							<h5>Category Icon</h5>
							<div class="controls">
								<input id="category_icon" type="text" name="category_icon" class="form-control" value="{{$category->category_icon }}">
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