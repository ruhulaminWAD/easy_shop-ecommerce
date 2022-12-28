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
				<h3 class="box-title">Edit Brand</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<form action="{{ route('brand.update', $brand->id) }}" method="post" enctype="multipart/form-data">{{ csrf_field() }}	
						<input type="hidden" name="brand_id" value="{{ $brand->id }}">		
						<input type="hidden" name="old_image" value="{{ $brand->brand_image }}">		
						<div class="form-group">
							<h5>Brand Name English</h5>
							<div class="controls">
								<input id="brand_name_en" type="text" name="brand_name_en" class="form-control" value="{{ $brand->brand_name_en }}">
							</div>
							@error('brand_name_en')
								<p class="text-danger">{{ $message  }}</p>
							@enderror
						</div>
						<div class="form-group">
							<h5>Brand Name bangla</h5>
							<div class="controls">
								<input id="brand_name_bn" type="text" name="brand_name_bn" class="form-control" value="{{ $brand->brand_name_bn }}">
							</div>
							@error('brand_name_bn')
								<p class="text-danger">{{ $message  }}</p>
							@enderror
						</div>
						<div class="row" style="margin-right: 15px;">
							<div class="col-sm-8">
								<div class="form-group">
									<h5>Brand Image</h5>
									<div class="controls">
										<input id="brand_image" type="file" name="brand_image" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<h5>Brand Image</h5>
									<div class="controls">
										<img id="showImage" src="{{ asset($brand->brand_image) }}" alt="{{ $brand->brand_name_en }}" style="width: 70px; height: 40px;">
									</div>
								</div>
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#brand_image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>
@endsection