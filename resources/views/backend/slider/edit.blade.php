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
					<h3 class="box-title">Edit Slider</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form action="{{ route('slider.update') }}" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
								<input type="hidden" name="id" value="{{ $slider->id }}">	
								<input type="hidden" name="old_image" value="{{ $slider->slider_image }}">				
								<div class="form-group">
									<h5>Slider Title</h5>
									<div class="controls">
										<input  type="text" name="title" class="form-control" value="{{ $slider->title }}">
									</div>
								</div>
								<div class="form-group">
									<h5>Slider Description</h5>
									<div class="controls">
										<textarea class="form-control" name="description">{{ $slider->description }}</textarea>
									</div>
								</div>
								<div class="form-group">
									<h5>Slider Image</h5>
									<div class="controls">
										<input  type="file" name="slider_image" class="form-control">
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