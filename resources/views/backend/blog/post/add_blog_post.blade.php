@extends('backend.admin.backend_master')
@section('main_content')

<div class="container-full">
    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Add Blog Post</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
            <div class="col-12">
                <form action="{{ route('blog.post.store') }}" method="post" enctype="multipart/form-data"> {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row"> <!-- product 1st row start -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Blog Post Name English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"  name="post_title_en" class="form-control" value="{{ old('post_title_en') }}">
                                        </div>
                                        @error('post_title_en')
                                            <p class="text-danger">{{ $message  }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Blog Post Name bangla <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="post_title_bn" class="form-control" value="{{ old('post_title_bn') }}">
                                        </div>
                                        @error('post_title_bn')
                                            <p class="text-danger">{{ $message  }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- product 1st row end -->

                            <div class="row"> <!-- product 2nd row start -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Blog Post Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="post_image" class="form-control" onchange="ProductThumUrl(this)" value="{{ old('post_image') }}">
                                        </div>
                                        @error('post_image')
                                            <p class="text-danger">{{ $message  }}</p>
                                        @enderror
                                        <img id="productThum" src="" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group validate">
                                    <h5>Blog Post Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control" aria-invalid="false">
                                            <option value="" selected disabled>Select Blog Category</option>
                                            @foreach($blogcategorys as $category)
                                            <option value="{{ $category->id }}">{{ $category->blog_category_name_en }}</option>
                                            @endforeach
                                            
                                        </select>
                                    <div class="help-block"></div></div>
                                        @error('category_id')
                                            <p class="text-danger">{{ $message  }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- product 2nd row end -->

                            
                            <div class="row"> <!-- product 5th row start -->
                                <div class="col-6">
                                    <div class="form-group">
                                        <h5>Blog Details English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="post_details_en" id="editor1" rows="10" cols="80" class="form-control" >{{ old('post_details_en') }}</textarea>
                                        </div>
                                        @error('post_details_en')
                                            <p class="text-danger">{{ $message  }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <h5>Blog Details bangla <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="post_details_bn" id="editor2" rows="10" cols="80" class="form-control" >{{ old('post_details_bn') }}</textarea>
                                        </div>
                                        @error('post_details_bn')
                                            <p class="text-danger">{{ $message  }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- product 5th row end -->
                        </div>

                    </div>
                    <hr>  
                    <div class="text-xs-right">
                        <input class="btn btn-rounded btn-info" type="submit" value="Add Post">
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




<!-- Product Thumbnail Show -->
<script type="text/javascript">
	function ProductThumUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#productThum').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>


@endsection