@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">

	<!-- Main content -->
	<section class="content">
		<div class="row">
		<div class="col-lg-8">
			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Total Blog  Category List <span class="badge badge-pill badge-danger"> {{ count($blogcategorys) }} </span> </h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<table id="example5" class="table table-bordered table-striped" style="width:100%">
					<thead>
						<tr>
                            <th>Blog Category En</th>
							<th>Blog Category Hin </th>
							<th style="width: 25%;">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($blogcategorys as $item)
							<tr>
                                <td>{{ $item->blog_category_name_en }}</td>
		                        <td>{{ $item->blog_category_name_bn }}</td>
								<td>
									<a href="{{ route('blog.category.edit', $item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
									<a href="{{ route('blog.category.destroy', $item->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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
				<h3 class="box-title">Add Blog Category</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<form action="{{ route('blog.category.store') }}" method="post" >{{ csrf_field() }}			
						<div class="form-group">
							<h5>Category Name English</h5>
							<div class="controls">
								<input type="text" name="blog_category_name_en" class="form-control">
							</div>
							@error('blog_category_name_en')
								<p class="text-danger">{{ $message  }}</p>
							@enderror
						</div>
						<div class="form-group">
							<h5>Category Name bangla</h5>
							<div class="controls">
								<input type="text" name="blog_category_name_bn" class="form-control">
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