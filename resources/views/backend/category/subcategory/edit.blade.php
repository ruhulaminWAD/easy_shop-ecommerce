@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">

	<!-- Main content -->
	<section class="content">
		<div class="row">
		<div class="col-12">
			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Update Sub Category</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<form action="{{ route('SubCategory.update', $subcategory->id ) }}" method="post" >{{ csrf_field() }}
						<input type="hidden" name="subcategory_id" value="{{ $subcategory->id }}">
						<div class="form-group validate">
							<h5>Category Select <span class="text-danger">*</span></h5>
							<div class="controls">
								<select name="category_id" id="category_id" required="" class="form-control" aria-invalid="false">
									@foreach($categorys as $category)
									<option value="{{ $category->id }}" {{ ($category->id == $subcategory->category_id) ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
									@endforeach
								</select>
							<div class="help-block"></div></div>
							@error('category_id')
								<p class="text-danger">{{ $message  }}</p>
							@enderror
						</div>			
						<div class="form-group">
							<h5>Sub Category Name English</h5>
							<div class="controls">
								<input id="subcategory_name_en" type="text" name="subcategory_name_en" class="form-control" value="{{ $subcategory->subcategory_name_en }}">
							</div>
							@error('subcategory_name_en')
								<p class="text-danger">{{ $message  }}</p>
							@enderror
						</div>
						<div class="form-group">
							<h5>Sub Category Name bangla</h5>
							<div class="controls">
								<input id="subcategory_name_bn" type="text" name="subcategory_name_bn" class="form-control" value="{{ $subcategory->subcategory_name_bn }}">
							</div>
							@error('subcategory_name_bn')
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