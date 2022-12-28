@extends('backend.admin.backend_master')
@section('main_content')

<div class="container-full">
    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Add Product</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
            <div class="col-12">
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data"> {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row"> <!-- product 1st row start -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Name English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"  name="product_name_en" class="form-control" value="{{ old('product_name_en') }}">
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
                                            <input type="text" name="product_name_bn" class="form-control" value="{{ old('product_name_bn') }}">
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
                                            <input type="text" name="selling_price" class="form-control" value="{{ old('selling_price') }}">
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
                                            <input type="text" name="discount_price" class="form-control" value="{{ old('discount_price') }}">
                                        </div>
                                        @error('discount_price')
                                            <p class="text-danger">{{ $message  }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div><!-- product 2nd row end -->
                            <div class="row"> <!-- product 3rd row start -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Thumbnail <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="product_thumbnail" class="form-control" onchange="ProductThumUrl(this)" value="{{ old('product_thumbnail') }}">
                                        </div>
                                        @error('product_thumbnail')
                                            <p class="text-danger">{{ $message  }}</p>
                                        @enderror
                                        <img id="productThum" src="" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Multiple Image</h5>
                                        <div class="controls">
                                            <input type="file" id="muli_image" name="muli_image[]" multiple class="form-control" value="{{ old('muli_image') }}">
                                        </div>
                                        @error('muli_image')
                                            <p class="text-danger">{{ $message  }}</p>
                                        @enderror
                                        <div class="row" id="preview_img"></div>
                                    </div>
                                </div>
                            </div><!-- product 3rd row end -->
                            <div class="row"> <!-- product 4th row start -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Short Description English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="short_description_en" class="form-control" >{{ old('short_description_en') }}</textarea>
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
                                            <textarea name="short_description_bn" class="form-control" >{{ old('short_description_bn') }}</textarea>
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
                                            <textarea name="long_description_en" id="editor1" rows="10" cols="80" class="form-control" >{{ old('long_description_en') }}</textarea>
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
                                            <textarea name="long_description_bn" id="editor2" rows="10" cols="80" class="form-control" >{{ old('long_description_bn') }}</textarea>
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
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name_en }}</option>
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
                                        <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
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
                                        <option value="{{ $Subsubcategory->id }}">{{ $Subsubcategory->sub_subcategory_name_en }}</option>
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
                                    <input type="text" name="product_code" class="form-control" value="{{ old('product_code') }}">
                                </div>
                                @error('product_code')
                                    <p class="text-danger">{{ $message  }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <h5>Product Quantity <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_qty" class="form-control" value="{{ old('product_qty') }}">
                                </div>
                                @error('product_qty')
                                    <p class="text-danger">{{ $message  }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <h5>Product Tags English <span class="text-danger">*</span></h5>
                                <p class="box-subtitle d-block mb-10">You can also use <code>select multiple</code> to your input field.</p>
                                <div class="controls">
                                    <input type="text" value="Phone,Vest,Smartphone,Furniture,T-shirt,Sweatpants,Sneaker,Rose" name="product_tags_en" data-role="tagsinput" placeholder="add tags" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Product Tags bangla <span class="text-danger">*</span></h5>
                                <p class="box-subtitle d-block mb-10">You can also use <code>select multiple</code> to your input field.</p>
                                <div class="controls">
                                    <input type="text" value="Phone,Vest,Smartphone,Furniture,T-shirt,Sweatpants,Sneaker,Rose" name="product_tags_bn" data-role="tagsinput" placeholder="add tags" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Product size English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" value="M,L,XL,XXL" name="product_size_en" data-role="tagsinput" placeholder="add size" >
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Product size bangla <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" value="M,L,XL,XXL" name="product_size_bn" data-role="tagsinput" placeholder="add size" >
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Product Color English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" value="rad,blue,black" name="product_color_en" data-role="tagsinput" placeholder="add color" >
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Product Color bangla <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" value="rad,blue,black" name="product_color_bn" data-role="tagsinput" placeholder="add color" >
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
                                        <input type="checkbox" id="hot_deals" name="hot_deals" value="1">
                                        <label for="hot_deals">Hot Deals</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="featured" name="featured" value="1">
                                        <label for="featured">Featured</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="special_offer" name="special_offer" value="1">
                                        <label for="special_offer">Special Offer</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="special_deals" name="special_deals" value="1">
                                        <label for="special_deals">Special Deals</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-xs-right">
                        <input class="btn btn-rounded btn-info" type="submit" value="Add Product">
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

@endsection