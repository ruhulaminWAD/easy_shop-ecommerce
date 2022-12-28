@extends('frontend.frontend_master')

@section('title')
    @if(session()->get('language') == 'bangla') 
    My Checkout  
    @else 
    My Checkout  
    @endif
@endsection

@section('main_content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
                <form action="{{ route('checkout.store') }}"  method="post">{{ csrf_field() }}
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" ">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">

                                <div class="panel-collapse collapse in">

                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <div class="row">			
                                                <div class="col-md-6 col-sm-6 ">
                                                    <h4 class="checkout-subtitle"><b>Shipping Address</b></h4>
                                                    
                                                        <div class="form-group">
                                                            <label class="info-title" for="shipping_name"><b>Shipping Name </b><span>*</span></label>
                                                            <input type="text" name="shipping_name" class="form-control unicase-form-control text-input" id="shipping_name" placeholder="Full Name" value="{{ Auth::user()->name }}" required="">
                                                        </div>  <!-- // end form group  -->

                                                        <div class="form-group">
                                                            <label class="info-title" for="shipping_email"><b>Email </b><span>*</span></label>
                                                            <input type="email" name="shipping_email" class="form-control unicase-form-control text-input" id="shipping_email" placeholder="Email" value="{{ Auth::user()->email }}" required="">
                                                        </div>  <!-- // end form group  -->


                                                        <div class="form-group">
                                                            <label class="info-title" for="shipping_phone"><b>Phone </b><span>*</span></label>
                                                            <input type="number" name="shipping_phone" class="form-control unicase-form-control text-input" id="shipping_phone" placeholder="Phone" value="{{ Auth::user()->phone }}" required="">
                                                        </div>  <!-- // end form group  -->


                                                        <div class="form-group">
                                                            <label class="info-title" for="post_code"><b>Post Code </b><span>*</span></label>
                                                            <input type="text" name="post_code" class="form-control unicase-form-control text-input" id="post_code" placeholder="Post Code" required="">
                                                        </div>  <!-- // end form group  -->
                                                </div>	

                                                <div class="col-md-6 col-sm-6 ">


                                                    <div class="form-group">
                                                        <h5><b>Division Select </b><span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="division_id" class="form-control"  >
                                                                <option selected disabled>Select Division</option>
                                                                @foreach($divisions as $division)
                                                                <option value="{{ $division->id }}">{{ $division->division_name }}</option>	
                                                                @endforeach
                                                            </select>
                                                            @error('division_id') 
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror 
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <h5><b>District Select </b><span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="district_id" class="form-control"  >
                                                                <option selected disabled>Select District</option>
                                                            </select>
                                                            @error('district_id') 
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror 
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <h5><b>State Select </b><span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="state_id" class="form-control"  >
                                                                <option selected disabled>Select State</option>
                                                            </select>
                                                            @error('state_id') 
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror 
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1"><b>Notes</b><span>*</span></label>
                                                            <textarea class="form-control" cols="30" rows="5" placeholder="Notes" name="notes"></textarea>
                                                    </div>  <!-- // end form group  -->
                                                    
                                                </div>
                                            
                                        </div>			
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>
                            <!-- checkout-step-01  -->
                        </div><!-- /.checkout-steps -->
                    </div>

                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">
                                            @foreach($carts as $item)
                                            <li>
                                                <strong>Product Image : </strong>
                                                <img src="{{ asset($item->options->image) }}" style="height:50px; width:50px;">
                                            </li>
                                            <li>
                                                <strong>Quantity : </strong>
                                                ({{ $item->qty }})

                                                <strong>Size : </strong>
                                                {{ $item->options->size }}

                                                <strong>Color : </strong>
                                                {{ $item->options->color }}
                                            </li>
                                            @endforeach
                                            <hr>
                                            <li>
                                                @if(Session::has('coupon'))
                                                    <strong>Sub Totail : </strong>${{ $cartTotal }} <hr>

                                                    <strong>Coupon Name : </strong>{{ session()->get('coupon')['coupon_name'] }} ( {{session()->get('coupon')['coupon_discount']}}% ) 
                                                    <hr>

                                                    <strong>Coupon Discount Amount : </strong>${{ session()->get('coupon')['discount_amount'] }}
                                                    <hr>

                                                    <strong>Grand Totail : </strong>${{ session()->get('coupon')['total_amount'] }}
                                                    <hr>
                                                @else
                                                    <strong>Sub Totail : </strong>${{ $cartTotal }} <hr>
                                                    <strong>Grand Totail : </strong>${{ $cartTotal }} <hr>
                                                @endif
                                            </li>
                                        </ul>		
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <!-- checkout-progress-sidebar -->				
                    </div>

                    <div class="col-md-6">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Select Payment Method</h4</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="info-title" for=""><b>Stripe </b><span>*</span></label>
                                            <input type="radio" name="payment_method" value="stripe">
                                            <img src="{{ asset('frontend/images/payments/4.png') }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="info-title" for=""><b>Card </b><span>*</span></label>
                                            <input type="radio" name="payment_method" value="card">
                                            <img src="{{ asset('frontend/images/payments/3.png') }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="info-title" for=""><b>Cash </b><span>*</span></label>
                                            <input type="radio" name="payment_method" value="cash">
                                            <img src="{{ asset('frontend/images/payments/6.png') }}">
                                        </div>
                                        <hr>
                                        <hr>
                                        
                                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment Step</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <!-- checkout-progress-sidebar -->				
                    </div>

                </form>	 <!-- //// register-form Shipping Address -->
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->

        
        <!-- ============ BRANDS CAROUSEL ============ -->
        @include('frontend.body.brand_carousel')
        <!-- ============ BRANDS CAROUSEL : END ============ --> 

    </div><!-- /.container -->
</div><!-- /.body-content -->


<script type="text/javascript">
	$(document).ready(function() {
		$('select[name="division_id"]').on('change', function(){
			var division_id = $(this).val();
			if(division_id) {
				$.ajax({
					url: "{{  url('/district-get/ajax') }}/"+division_id,
					type:"GET",
					dataType:"json",
					success:function(data) {
					var d =$('select[name="district_id"]').empty();
                        $('select[name="state_id"]').empty();
						$.each(data, function(key, value){
							$('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
						});
					},
				});
			} else {
				alert('danger');
			}
		});

        // ========
		$('select[name="district_id"]').on('change', function(){
			var district_id = $(this).val();
			if(district_id) {
				$.ajax({
					url: "{{  url('/state-get/ajax') }}/"+district_id,
					type:"GET",
					dataType:"json",
					success:function(data) {
					var d =$('select[name="state_id"]').empty();
						$.each(data, function(key, value){
							$('select[name="state_id"]').append('<option value="'+ value.id +'">' + value.state_name + '</option>');
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