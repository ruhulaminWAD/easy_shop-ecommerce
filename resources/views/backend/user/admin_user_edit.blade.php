@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">
	<!-- Main content -->
	<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
                <h3 class="box-title">Edit Admin User Role</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{ route('admin.user.update', $adminUser->id) }}" method="post" >{{ csrf_field() }}
                        <div class="row">
                            <div class="col">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_2" name="brand" value="1" {{ $adminUser->brand == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_2">Brand</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_3" name="category" value="1" {{ $adminUser->category == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_3">Category</label>
                                                </fieldset>

                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_4" name="product" value="1" {{ $adminUser->product == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_4">Product</label>
                                                </fieldset>

                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_5" name="slider" value="1" {{ $adminUser->slider == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_5">Slider</label>
                                                </fieldset>

                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_6" name="coupon" value="1" {{ $adminUser->coupon == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_6">Coupons</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div> <!-- col-md-4  -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_7" name="shipping_area" value="1" {{ $adminUser->shipping_area == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_7">Shipping</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_8" name="blog" value="1" {{ $adminUser->blog == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_8">Blog</label>
                                                </fieldset>

                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_9" name="setting" value="1" {{ $adminUser->setting == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_9">Setting</label>
                                                </fieldset>


                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_10" name="return_order" value="1" {{ $adminUser->return_order == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_10">Return Order</label>
                                                </fieldset>

                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_11" name="review" value="1" {{ $adminUser->review == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_11">	Review</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div> <!-- col-md-4  -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_12" name="order" value="1" {{ $adminUser->order == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_12">Orders</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_13" name="stock" value="1" {{ $adminUser->stock == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_13">Stock</label>
                                                </fieldset>

                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_14" name="report" value="1" {{ $adminUser->report == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_14">Reports</label>
                                                </fieldset>

                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_15" name="all_user" value="1" {{ $adminUser->all_user == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_15">Alluser</label>
                                                </fieldset>

                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_16" name="adminuserrole" value="1" {{ $adminUser->adminuserrole == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_16">Adminuserrole</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div> <!-- col-md-4  -->

                                </div> <!-- End row  -->
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Edit Admin User Role">					 
                                </div>
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