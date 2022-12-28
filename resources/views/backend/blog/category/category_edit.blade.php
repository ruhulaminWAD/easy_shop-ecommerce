@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">

	<!-- Main content -->
	<section class="content">
		<div class="row">
		
		<!-- /.col -->
		<div class="col-lg-12">
			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Edit Blog Category</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<form action="{{ route('blog.category.update', $blogcategory->id) }}" method="post" >{{ csrf_field() }}			
						<div class="form-group">
							<h5>Category Name English</h5>
							<div class="controls">
								<input type="text" name="blog_category_name_en" class="form-control"  value="{{ $blogcategory->blog_category_name_en }}">
							</div>
							@error('blog_category_name_en')
								<p class="text-danger">{{ $message  }}</p>
							@enderror
						</div>
						<div class="form-group">
							<h5>Category Name bangla</h5>
							<div class="controls">
								<input type="text" name="blog_category_name_bn" class="form-control"  value="{{ $blogcategory->blog_category_name_bn }}">
							</div>
							@error('blog_category_name_bn')
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