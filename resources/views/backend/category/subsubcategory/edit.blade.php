@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">

	<!-- Main content -->
	<section class="content">
		<div class="row">
		<div class="col-12">
			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Update Sub Sub Category</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<form action="{{ route('SubSubCategory.update', $subsubcategory->id) }}" method="post" >{{ csrf_field() }}
						<input type="hidden" name="subsubcategory_id" value="{{ $subsubcategory->id }}">
						<div class="form-group validate">
							<h5>Select Category<span class="text-danger">*</span></h5>
							<div class="controls">
								<select name="category_id" required="" class="form-control" aria-invalid="false">
									@foreach($categorys as $category)
									<option value="{{ $category->id }}" {{ ($category->id == $subsubcategory->category_id) ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
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
								<select name="subcategory_id" required="" class="form-control" aria-invalid="false">
									@foreach($subcategorys as $subcategory)
									<option value="{{ $subcategory->id }}" {{ ($subcategory->id == $subsubcategory->subcategory_id) ? 'selected' : '' }}>{{ $subcategory->subcategory_name_en }}</option>
									@endforeach
								</select>
							<div class="help-block"></div></div>
							@error('sub_category_id')
								<p class="text-danger">{{ $message  }}</p>
							@enderror
						</div>			
						<div class="form-group">
							<h5>Sub Sub Category Name English</h5>
							<div class="controls">
								<input type="text" name="sub_subcategory_name_en" class="form-control" value="{{ $subsubcategory->sub_subcategory_name_en }}">
							</div>
							@error('sub_subcategory_name_en')
								<p class="text-danger">{{ $message  }}</p>
							@enderror
						</div>
						<div class="form-group">
							<h5>Sub Sub Category Name bangla</h5>
							<div class="controls">
								<input type="text" name="sub_subcategory_name_bn" class="form-control" value="{{ $subsubcategory->sub_subcategory_name_bn }}">
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