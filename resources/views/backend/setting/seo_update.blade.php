@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">
	<!-- Main content -->
	<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Seo Setting Page</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">  
					<form action="{{ route('seo.setting.update') }}" method="post">{{ csrf_field() }}
					  <div class="row">
                      <input type="hidden" name="seo_id" value="{{ $seo->id }}">

						<div class="col-md-6">
							<div class="form-group">
								<h5>Meta Title:</h5>
								<div class="controls">
									<input type="text" name="meta_title" class="form-control" value="{{ $seo->meta_title }}">
								</div>
							</div>
							<div class="form-group">
								<h5>Meta Author:</h5>
								<div class="controls">
									<input type="text" name="meta_author" class="form-control" value="{{ $seo->meta_author }}">
								</div>
							</div>
							<div class="form-group">
								<h5>Meta Keyword :</h5>
								<div class="controls">
									<input type="text" name="meta_keyword" class="form-control" value="{{ $seo->meta_keyword }}">
								</div>
							</div>
						</div>

						<div class="col-md-6">
                            <div class="form-group">
								<h5>Meta Description :</h5>
								<div class="controls">
									<input type="text" name="meta_description" class="form-control" value="{{ $seo->meta_description }}">
								</div>
							</div>
                            <div class="form-group">
								<h5>Google Analytics:</h5>
								<div class="controls">
									<input type="text" name="google_analytics" class="form-control" value="{{ $seo->google_analytics }}">
								</div>
							</div>
						</div>

                        <div class="form-group">
							    <input class="btn btn-rounded btn-info" type="submit" value="Update Password">
						    </div>
					  </div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

	</section>
	<!-- /.content -->

</div> <!-- /.container-full  -->


@endsection