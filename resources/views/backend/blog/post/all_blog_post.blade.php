@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">

	<!-- Main content -->
	<section class="content">
		<div class="row">
		<div class="col-12">
			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Total Blog Post List <span class="badge badge-pill badge-danger"> {{ count($allBlogPosts) }} </span> </h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<table id="example5" class="table table-bordered table-striped" style="width:100%">
					<thead>
						<tr>
                            <th>Post Category  </th>
                            <th>Post Image </th>
                            <th>Post Title En </th>
                            <th>Post Title Hin </th>
							<th style="width: 25%;">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($allBlogPosts as $item)
							<tr>
                                <td>{{ $item->BlogCategory->blog_category_name_en }}</td>
                                <td> <img src="{{ asset($item->post_image) }}" style="width: 60px; height: 60px;"> </td>
                                <td>{{ $item->post_title_en }}</td>
                                <td>{{ $item->post_title_bn }}</td>
								<td>
									<a href="" class="btn btn-primary" title="Product Details Data"><i class="fa fa-eye"></i></a>
									<a href="{{ route('blog.post.edit', $item->id) }}" class="btn btn-info"  title="Edit Data"><i class="fa fa-edit"></i></a>
									<a href="{{ route('blog.post.destroy', $item->id) }}" class="btn btn-danger" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
									
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
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->

</div> <!-- /.container-full  -->
@endsection