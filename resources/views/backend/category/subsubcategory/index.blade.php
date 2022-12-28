@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">

	<!-- Main content -->
	<section class="content">
		<div class="row">
		<div class="col-lg-8">
			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Total Sub Sub Category List <span class="badge badge-pill badge-danger"> {{ count($subsubcategorys) }} </span> </h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<table id="example5" class="table table-bordered table-striped" style="width:100%">
					<thead>
						<tr>
							<th>Category</th>
							<th>Sub Category</th>
							<th>Sub Sub Category</th>
							<th style="width: 25%;">Sub Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($subsubcategorys as $item)
							<tr>
								<td>{{ $item->category->category_name_en }}</td>
								<td>{{ $item->subcategory->subcategory_name_en }}</td>
								<td>{{ $item->sub_subcategory_name_en }}</td>
								<td>
									<a href="{{ route('SubSubCategory.edit', $item->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
									<a href="{{ route('SubSubCategory.destroy', $item->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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
				<h3 class="box-title">Add Sub Sub Category</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<form action="{{ route('SubSubCategory.store') }}" method="post" >{{ csrf_field() }}
						<div class="form-group validate">
							<h5>Select Category<span class="text-danger">*</span></h5>
							<div class="controls">
								<select name="category_id" required="" class="form-control" aria-invalid="false">
									<option value="" selected disabled>Select Category</option>
									@foreach($categorys as $category)
									<option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
									@endforeach
									
								</select>
							<div class="help-block"></div></div>
							@error('category_id')
								<p class="text-danger">{{ $message  }}</p>
							@enderror
						</div>			
						<div class="form-group validate">
							<h5>Select Sub Category<span class="text-danger">*</span></h5>
							<div class="controls">
								<select name="subcategory_id" required="" class="form-control" aria-invalid="false"></select>
							<div class="help-block"></div></div>
							@error('sub_category_id')
								<p class="text-danger">{{ $message  }}</p>
							@enderror
						</div>			
						<div class="form-group">
							<h5>Sub Sub Category Name English</h5>
							<div class="controls">
								<input type="text" name="sub_subcategory_name_en" class="form-control">
							</div>
							@error('sub_subcategory_name_en')
								<p class="text-danger">{{ $message  }}</p>
							@enderror
						</div>
						<div class="form-group">
							<h5>Sub Sub Category Name bangla</h5>
							<div class="controls">
								<input type="text" name="sub_subcategory_name_bn" class="form-control">
							</div>
							@error('sub_subcategory_name_bn')
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
			$('select[name="category_id"]').on('change', function(){
				var category_id = $(this).val();
				if(category_id) {
					$.ajax({
						url: "{{  url('/subsubcategory/getsubcategory/ajax') }}/"+category_id,
						type:"GET",
						dataType:"json",
						success:function(data) {
						var d =$('select[name="subcategory_id"]').empty();
							$.each(data, function(key, value){
								$('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
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