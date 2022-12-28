@extends('backend.admin.backend_master')
@section('main_content')

<div class="container-full">
    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Edit Product</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
            <div class="col-12">
                <form action="{{ route('product.dataUpdate', $products->id) }}" method="post" enctype="multipart/form-data"> {{ csrf_field() }}
                    <input type="hidden" name="product_id" value="{{ $products->id }}">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row"> <!-- product 1st row start -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Name English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"  name="product_name_en" class="form-control" value="{{ $products->product_name_en }}">
                                        </div>
                                        @error('product_name_en')
                                            <p class="text-danger">{{ $message  }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Name bangla <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_name_bn" class="form-control" value="{{ $products->product_name_bn }}">
                                        </div>
                                        @error('product_name_bn')
                                            <p class="text-danger">{{ $message  }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- product 1st row end -->
                            <div class="row"> <!-- product 2nd row start -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Selling Price <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="selling_price" class="form-control" value="{{ $products->selling_price }}">
                                        </div>
                                        @error('selling_price')
                                            <p class="text-danger">{{ $message  }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Discount Price</h5>
                                        <div class="controls">
                                            <input type="text" name="discount_price" class="form-control" value="{{ $products->discount_price }}">
                                        </div>
                                        @error('discount_price')
                                            <p class="text-danger">{{ $message  }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- product 2nd row end -->
                            <div class="row"> <!-- product 4th row start -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Short Description English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="short_description_en" class="form-control" >{{ $products->short_description_en }}</textarea>
                                        </div>
                                        @error('short_description_en')
                                            <p class="text-danger">{{ $message  }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Short Description Bangla <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="short_description_bn" class="form-control" >{{ $products->short_description_bn }}</textarea>
                                        </div>
                                        @error('short_description_bn')
                                            <p class="text-danger">{{ $message  }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- product 4th row end -->
                            <div class="row"> <!-- product 5th row start -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <h5>Long Description English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="long_description_en" id="editor1" rows="10" cols="80" class="form-control" >{{ $products->long_description_en }}</textarea>
                                        </div>
                                        @error('long_description_en')
                                            <p class="text-danger">{{ $message  }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <h5>Long Description bangla <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="long_description_bn" id="editor2" rows="10" cols="80" class="form-control" >{{ $products->long_description_bn }}</textarea>
                                        </div>
                                        @error('long_description_bn')
                                            <p class="text-danger">{{ $message  }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- product 5th row end -->
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group validate">
                                <h5>Brand Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="brand_id" id="brand_id" class="form-control" aria-invalid="false">
                                        <option value="" selected disabled>Select brand</option>
                                        @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ ($brand->id == $products->brand_id) ? 'selected' : '' }}>{{ $brand->brand_name_en }}</option>
                                        @endforeach
                                        
                                    </select>
                                <div class="help-block"></div></div>
                                @error('category_id')
                                    <p class="text-danger">{{ $message  }}</p>
                                @enderror
                            </div>
                            <div class="form-group validate">
                                <h5>Category Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id" id="category_id" class="form-control" aria-invalid="false">
                                        <option value="" selected disabled>Select Category</option>
                                        @foreach($categorys as $category)
                                        <option value="{{ $category->id }}" {{ ($category->id == $products->category_id) ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
                                        @endforeach
                                        
                                    </select>
                                <div class="help-block"></div></div>
                                @error('category_id')
                                    <p class="text-danger">{{ $message  }}</p>
                                @enderror
                            </div>
                            <div class="form-group validate">
                                <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="subcategory_id" id="subcategory_id" class="form-control" aria-invalid="false">
                                        <option value="" selected disabled>Select subcategory</option>
                                        @foreach($subcategorys as $subcategory)
                                        <option value="{{ $subcategory->id }}" {{ ($subcategory->id == $products->subcategory_id) ? 'selected' : '' }}>{{ $subcategory->subcategory_name_en }}</option>
                                        @endforeach
                                    </select>
                                <div class="help-block"></div></div>
                                @error('subcategory_id')
                                    <p class="text-danger">{{ $message  }}</p>
                                @enderror
                            </div>
                            <div class="form-group validate">
                                <h5>SubSubCategory Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="subsubcategory_id" id="subsubcategory_id" required="" class="form-control" aria-invalid="false">
                                        <option value="" selected disabled>Select Subsubcategory</option>
                                        @foreach($Subsubcategorys as $Subsubcategory)
                                        <option value="{{ $Subsubcategory->id }}" {{ ($Subsubcategory->id == $products->subsubcategory_id) ? 'selected' : '' }}>{{ $Subsubcategory->sub_subcategory_name_en }}</option>
                                        @endforeach
                                        
                                    </select>
                                <div class="help-block"></div></div>
                                @error('subsubcategory_id')
                                    <p class="text-danger">{{ $message  }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <h5>Product Code <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_code" class="form-control" value="{{ $products->product_code }}">
                                </div>
                                @error('product_code')
                                    <p class="text-danger">{{ $message  }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <h5>Product Quantity <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_qty" class="form-control" value="{{ $products->product_qty }}">
                                </div>
                                @error('product_qty')
                                    <p class="text-danger">{{ $message  }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <h5>Product Tags English <span class="text-danger">*</span></h5>
                                <p class="box-subtitle d-block mb-10">You can also use <code>select multiple</code> to your input field.</p>
                                <div class="controls">
                                    <input type="text" value="{{ $products->product_tags_en }}" name="product_tags_en" data-role="tagsinput" placeholder="add tags" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Product Tags bangla <span class="text-danger">*</span></h5>
                                <p class="box-subtitle d-block mb-10">You can also use <code>select multiple</code> to your input field.</p>
                                <div class="controls">
                                    <input type="text" value="{{ $products->product_tags_bn }}" name="product_tags_bn" data-role="tagsinput" placeholder="add tags" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Product size English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" value="{{ $products->product_size_en }}" name="product_size_en" data-role="tagsinput" placeholder="add size" >
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Product size bangla <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" value="{{ $products->product_size_bn }}" name="product_size_bn" data-role="tagsinput" placeholder="add size">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Product Color English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" value="{{ $products->product_color_en }}" name="product_color_en" data-role="tagsinput" placeholder="add color" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Product Color bangla <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" value="{{ $products->product_color_bn }}" name="product_color_bn" data-role="tagsinput" placeholder="add color" required>
                                </div>
                            </div>


                        </div>
                    </div>
                    <hr><hr>
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="hot_deals" name="hot_deals" value="1" {{ ($products->hot_deals == 1) ? 'checked': ''}}>
                                        <label for="hot_deals">Hot Deals</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="featured" name="featured" value="1" {{ ($products->featured == 1) ? 'checked': ''}}>
                                        <label for="featured">Featured</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="special_offer" name="special_offer" value="1" {{ ($products->special_offer == 1) ? 'checked': ''}}>
                                        <label for="special_offer">Special Offer</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="special_deals" name="special_deals" value="1" {{ ($products->special_deals == 1) ? 'checked': ''}}>
                                        <label for="special_deals">Special Deals</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-xs-right">
                        <input class="btn btn-rounded btn-info" type="submit" value="Update Product">
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
     
    <!-- ///////////////// Start Thumbnail Image Update Area ///////// -->

    <section class="content"><!-- start section -->
        <div class="row"> <!-- start row -->
            <div class="col-md-12">
                <div class="box bt-3 border-info ">
                    <div class="box-header">
                        <h4 class="box-title">Product Thumbnail Image <strong>Update</strong></h4>
                    </div>
                    <form action="{{ route('product.imgUpdate', $products->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="product_id" value="{{ $products->id }}">
                        <input type="hidden" name="old_img" value="{{ $products->product_thumbnail }}">
                        <div class="row row-sm p-3">
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="{{ asset($products->product_thumbnail) }}" class="card-img-top" style="height: 130px; width: 280px;">
                                    <img id="productThum" src="" alt="">
                                    <div class="card-body">
                                        <p class="card-text"> 
                                            <div class="form-group">
                                                <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                <input class="form-control" type="file" name="product_thumbnail" onchange="ProductThumUrl(this)">
                                            </div> 
                                        </p>
                                    </div>
                                    @error('product_thumbnail')
                                        <p class="text-danger">{{ $message  }}</p>
                                    @enderror
                                </div> 	<!--  end Card		 -->
                            </div><!--  end col md 3 -->
                        </div>	<!-- end row sm -->	
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                        </div>
                        <br><br>
                    </form>	
                </div><!-- // end box bt-3 border-info  -->
            </div><!-- // end col-md-12  -->
        </div> <!-- // end row  -->
    </section><!-- end section -->

    <!-- ///////////////// Start Multiple Image Update Area ///////// -->

    <section class="content"><!-- start section -->
        <div class="row"> <!-- start row -->
            <div class="col-md-12">
                <div class="box bt-3 border-info ">
                    <div class="box-header">
                        <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                        <!-- Button to Open the Modal -->
                        <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        Add Image
                        </a>
                    </div>
                    <form action="{{ route('product.multiImgUpdate') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row row-sm p-3">
                            @foreach($multiImgs as $img)
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="{{ asset($img->photo_name) }}" class="card-img-top" style="height: 130px; width: 280px;">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="{{ route('product.multiImgDelete', $img->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i> </a>
                                        </h5>
                                        <p class="card-text"> 
                                            <div class="form-group">
                                                <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                <input class="form-control" type="file" name="multi_img[ {{ $img->id }} ]">
                                            </div> 
                                            @error('multi_img')
                                                <p class="text-danger">{{ $message  }}</p>
                                            @enderror
                                        </p>
                                    </div>
                                </div> 	<!--  end Card		 -->
                            </div><!--  end col md 3		 -->	
                            @endforeach
                            
                        </div>	<!-- end row sm -->		
                        

                        <div class="text-xs-right px-4">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                        </div>
                        <br><br>
                    </form>
                </div><!-- // end box bt-3 border-info  -->
            </div><!-- // end col-md-12  -->
        </div> <!-- // end row  -->
    </section><!-- end section -->

</div> <!-- /.container-full  -->

<!-- Start Modal Multi Image -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Image</h4>
                <a type="button" class="close" data-dismiss="modal">&times;</a>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="card">
                    <img id="showImage" src="{{ asset('upload/no_image.jpg') }}" class="card-img-top" style="height: 130px; width: 280px;">
                    <div class="card-body">
                        <p class="card-text"> 
                            <form action="{{ route('product.multiImgAdd') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="product_id" value="{{ $products->id }}">
                                <div class="form-group">
                                    <input id="image" class="form-control" type="file" name="newImage" required>
                                </div>
                                <input type="submit" class="btn btn-sm btn-rounded btn-primary mb-5" value="Add Image">
                            </form>
                        </p>
                    </div>
                </div> <!--  end Card		 -->
            </div>
        </div>
    </div>
</div>
<!-- End Modal Multi Image -->

<!-- Category Ajax -->
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
                        $('select[name="subsubcategory_id"]').html('');
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
        $('select[name="subcategory_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/subsubcategory/getsubsubcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    var d =$('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.sub_subcategory_name_en + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>

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
<!-- Product Multiple Image Show -->
<script>
  $(document).ready(function(){
   $('#muli_image').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
</script>

<!-- Show Multi Image -->
<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>

@endsection