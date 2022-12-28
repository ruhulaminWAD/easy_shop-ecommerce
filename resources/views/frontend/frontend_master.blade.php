<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
@php
$seo = App\Models\Seo::find(1);
@endphp
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="{{ $seo->meta_description }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="{{ $seo->meta_author }}">
<meta name="keywords" content="{{ $seo->meta_keyword }}">
<meta name="robots" content="all">
<!-- /// Google Analytics Code // -->
<script>
    {{ $seo->google_analytics }}
</script>
<!-- /// Google Analytics Code // -->
<link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">
<title>@yield('title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/blue.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/owl.transitions.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/rateit.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-select.min.css') }}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.css') }}">

<!-- Toastr css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
</head>
<body class="cnt-home">
<!-- ============== HEADER ============== -->
@include('frontend.body.header')
<!-- ============== HEADER : END ============== -->
<!-- ====== main content  ====== -->
@yield('main_content')
<!-- /#top-banner-and-menu --> 

<!-- ========== FOOTER ========== -->
@include('frontend.body.footer')
<!-- ========== FOOTER : END ========== --> 

<!-- Add to Cart Product Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <strong>
            <span id="product_name"></span>
          </strong>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row">

          <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <img src=" " class="card-img-top" alt="..." style="height: 200px; width: 200px;" id="product_image">
            </div>
          </div><!-- // end col md -->

          <div class="col-md-4">
            <ul class="list-group">
              <li class="list-group-item">
                Product Price: 
                <strong class="text-danger">
                  <span>$</span><span id="product_price"></span>
                </strong>
                  <del class="text-info">
                    <span id="old_price"></span>
                  </del>  
              </li>
              <li class="list-group-item">Product Code: <strong id="product_code"></strong></li>
              <li class="list-group-item">Category: <strong id="product_category"></strong></li>
              <li class="list-group-item">Brand: <strong id="product_brand"></strong></li>
              <li class="list-group-item">
                Stock: 
                <span class="badge badge-pill badge-success" id="aviable" style="background: green; color: white;"></span> 
                <span class="badge badge-pill badge-danger" id="stockout" style="background: red; color: white;"></span>
              </li>
            </ul>
          </div><!-- // end col md -->

          <div class="col-md-4">
            <div class="form-group">
              <label for="color">Choose Color</label>
              <select class="form-control" id="color" name="color"></select>
            </div>  <!-- // end form group -->
            <div id="sizeArea" class="form-group">
              <label for="size">Choose Size</label>
              <select class="form-control" id="size" name="size"></select>
            </div>  <!-- // end form group -->
            <div class="form-group">
              <label for="qty">Quantity</label>
              <input type="number" class="form-control" id="qty" value="1" min="1" >
            </div>  <!-- // end form group -->
            <input type="hidden" id="product_id">
            <button type="submit" class="btn btn-primary mb-2" onclick="addToCart()" data-dismiss="modal" aria-label="Close">Add to Cart</button>
          </div><!-- // end col md -->

        </div> <!-- // end row -->

      </div> <!-- // end modal Body -->
    </div>
  </div>
</div>
<!-- End Add to Cart Product Modal -->



  <!-- For demo purposes – can be removed on production --> 

  <!-- For demo purposes – can be removed on production : End --> 

  <!-- JavaScripts placed at the end of the document so the pages load faster --> 
  <script src="{{ asset('frontend/js/jquery-1.11.1.min.js') }}"></script> 
  <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script> 
  <script src="{{ asset('frontend/js/bootstrap-hover-dropdown.min.js') }}"></script> 
  <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script> 
  <script src="{{ asset('frontend/js/echo.min.js') }}"></script> 
  <script src="{{ asset('frontend/js/jquery.easing-1.3.min.js') }}"></script> 
  <script src="{{ asset('frontend/js/bootstrap-slider.min.js') }}"></script> 
  <script src="{{ asset('frontend/js/jquery.rateit.min.js') }}"></script> 
  <script type="text/javascript" src="{{ asset('frontend/js/lightbox.min.js') }}"></script> 
  <script src="{{ asset('frontend/js/bootstrap-select.min.js') }}"></script> 
  <script src="{{ asset('frontend/js/wow.min.js') }}"></script> 
  <script src="{{ asset('frontend/js/scripts.js') }}"></script>

  <!-- Sweetalert script -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Toastr js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>       
  <script type="text/javascript">
      @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
       @endif

      @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
      @endif

      @if(Session::has('error'))
        toastr.warning("{{ Session::get('error') }}");
      @endif
  </script> 

 <!--========================  -->
 <!--========================  -->
<!-- Strt Add to Cart script -->
<script type="text/javascript">
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  })

  // Start Product View with Modal
  function productView(id) {
    // alert(id);
    $.ajax({
      type: 'GET',
      url: '/product/view/modal/'+id,
      dataType: 'json',
      success:function(data){
        // console.log(date)
        $('#product_image').attr('src','/'+data.product.product_thumbnail);
        $('#product_name').text(data.product.product_name_en);
        $('#product_code').text(data.product.product_code);
        $('#product_category').text(data.product.category.category_name_en);
        $('#product_brand').text(data.product.brand.brand_name_en);

        $('#product_id').val(id);
        $('#qty').val(1);

        // price
        if (data.product.discount_price == null) {
          $('#product_price').text("");
          $('#old_price').text("");
          $('#product_price').text(data.product.selling_price);
        } else {
          $('#old_price').text(data.product.selling_price);
          $('#product_price').text(data.product.discount_price);
        }

        // Start Stock opiton
        if (data.product.product_qty > 0) {
          $('#aviable').text('');
          $('#stockout').text('');
          $('#aviable').text('aviable');
        }else{
          $('#aviable').text('');
          $('#stockout').text('');
          $('#stockout').text('stockout');
        } // end Stock Option 

        // color
        $('select[name="color"]').empty();
        $.each(data.color,function(key,value){
          $('select[name="color"]').append('<option value=" '+value+' ">'+value+'</option>')
        })
        
        // size
        $('select[name="size"]').empty();
        $.each(data.size,function(key,value){
          $('select[name="size"]').append('<option value=" '+value+' ">'+value+'</option>')
          if (data.size == "") {
            $('#sizeArea').hide();
          } else {
            $('#sizeArea').show();
            
          }
        })
        
      } // End success
    }) //end ajax
  }
  // End Product View with Modal
  // =================================
  // =================================
  // Start Add To Cart Product 

  function addToCart() {
    var product_name = $('#product_name').text();
    var id           = $('#product_id').val();
    var color        = $('#color option:selected').text();
    var size         = $('#size option:selected').text();
    var quantity     = $('#qty ').val();
    $.ajax({
      type: 'POST',
      dataType: 'json',
      data:{
        product_name:product_name,
        color:color,
        size:size,
        quantity:quantity,
      },
      url: '/cart/data/store/'+id,
      success:function(data){
        // console.log(data)
        miniCart(); // Run miniCart Method
        // Start Message
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          icon: 'success',
          showConfirmButton: false,
          timer: 3000
        })
        if ($.isEmptyObject(data.error)) {
            Toast.fire({
                type: 'success',
                title: data.success
            })
        }else{
            Toast.fire({
                type: 'error',
                title: data.error
            })
        }
        // End Message 

      } // End success
    }); //end ajax
  } //End addToCart function 

  // End Add To Cart Product 
</script>
<!-- End Add to Cart script -->

<!-- ================== -->
<!-- ================== -->

<!-- Start Mini Cart script -->
<script type="text/javascript">
  function miniCart() {
    $.ajax({
      type: 'GET',
      url: '/product/mini/cart',
      dataType: 'json',
      success:function(response){
        // console.log(response)
        $('span[id="cartSubTotal"]').text(response.cartTotal);
        $('#cartQty').text(response.cartQty);
        var miniCart = ''
        $.each(response.carts, function(key, value){
          miniCart += 
          `<div class="cart-item product-summary">
              <div class="row">
                <div class="col-xs-4">
                  <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
                </div>
                <div class="col-xs-7">
                  <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                  <div class="price"><span>$</span> ${value.price}*${value.qty} </div>
                </div>
                <div class="col-xs-1 action"> 
                  <button  type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button> 
                </div>
              </div>
            </div>
            <!-- /.cart-item -->
            <div class="clearfix"></div>
            <hr>`
        }); //End each
        $('#miniCart').html(miniCart);
      } //End success
    }); //End ajax
  } //End miniCart
  miniCart(); // Run miniCart Method

  ///  Start mini cart remove  
  function miniCartRemove(rowId) {
    $.ajax({
      type: 'GET',
      url: '/minicart/product-remove/'+rowId,
      dataType: 'json',
      success:function(data){
        miniCart(); // Run miniCart Method
        mycart(); // Run mycart Method
        couponCalculation() // run method
        $('#couponField').show();
        $('#coupon_name').val('');

        // Start Message
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          icon: 'success',
          showConfirmButton: false,
          timer: 3000
        })
        if ($.isEmptyObject(data.error)) {
            Toast.fire({
                type: 'success',
                title: data.success
            })
        }else{
            Toast.fire({
                type: 'error',
                title: data.error
            })
        }
        // End Message 

      } //End success
    }); //End ajax
  } //End miniCartRemove function
  ///  End mini cart remove  
</script>
<!-- End Mini Cart script -->

<!-- ================== -->
<!-- ================== -->

<!--  /// Start Add Wishlist Page  //// -->
<script type="text/javascript">
  function addToWishList(product_id) {
    $.ajax({
      type: 'POST',
      dataType: 'json',
      url: '/add-to-wishlist/'+product_id,

      success:function(data){
        // Start Message
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        })
        if ($.isEmptyObject(data.error)) {
            Toast.fire({
                type: 'success',
                icon: 'success',
                title: data.success
            })
        }else{
            Toast.fire({
                type: 'error',
                icon: 'error',
                title: data.error
            })
        }
        // End Message
      } //End success
    }); //End ajax
    
  } //End addToWishList function

</script>
<!--  /// End Add Wishlist Page  //// -->

<!-- Start Wishlist script -->
<script type="text/javascript">
  function wishlist() {
    $.ajax({
      type: 'GET',
      url: '/user/get-wishlist-product',
      dataType: 'json',
      success:function(response){

        var rows = ''
        $.each(response, function(key, value){
          rows += 
          `<tr>
              <td class="col-md-2"><img src="/${value.product.product_thumbnail}" alt="imga"></td>
              <td class="col-md-7">
                  <div class="product-name"><a href="#">${value.product.product_name_en}</a></div>
                  <div class="rating">
                      <i class="fa fa-star rate"></i>
                      <i class="fa fa-star rate"></i>
                      <i class="fa fa-star rate"></i>
                      <i class="fa fa-star rate"></i>
                      <i class="fa fa-star non-rate"></i>
                      <span class="review">( 06 Reviews )</span>
                  </div>
                  <div class="price">
                    ${value.product.discount_price == null 
                      ? `$${value.product.selling_price}` 
                      :  `$${value.product.discount_price} <span>$${value.product.selling_price}</span>`}
                      
                      
                  </div>
              </td>
              <td class="col-md-2">
                <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)"> Add To Cart</button>
              </td>
              <td class="col-md-1 close-btn">
              <button type="submit" class="" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fa fa-times"></i></button>
              </td>
          </tr>`
        }); //End each
        $('#wishlist').html(rows);
      } //End success
    }); //End ajax
  } //End wishlist
  wishlist(); // Run miniCart Method

  ///  Start mini cart remove  
  function wishlistRemove(id) {
    $.ajax({
      type: 'GET',
      url: '/user/wishlist-remove/'+id,
      dataType: 'json',
      success:function(data){
        wishlist(); // Run wishlist Method

        // Start Message
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        })
        if ($.isEmptyObject(data.error)) {
            Toast.fire({
                type: 'success',
                icon: 'success',
                title: data.success
            })
        }else{
            Toast.fire({
                type: 'error',
                icon: 'error',
                title: data.error
            })
        }
        // End Message 

      } //End success
    }); //End ajax
  } //End wishlistRemove function
</script>
<!-- End Wishlist script -->

<!-- Start  My Crat script -->
<script type="text/javascript">
  function mycart() {
    $.ajax({
      type: 'GET',
      url: '/user/get-cart-product',
      dataType: 'json',
      success:function(response){

        var rows = ''
        $.each(response.carts, function(key, value){
          rows += 
          `<tr>
              <td class="romove-item"> <button type="submit" title="cancel" class="icon" id="${value.rowId}" onclick="mycCartRemove(this.id)"><i class="fa fa-trash-o"></i></button></td>
              <td class="cart-image">
                  <a class="entry-thumbnail" href="">
                      <img src="/${value.options.image}" alt="" style="width:60px; height:70px;">
                  </a>
              </td>
              <td class="cart-product-name-info">
                  <h4 class='cart-product-description'><a href="">${value.name}</a></h4>
                  <div class="row">
                      <div class="col-sm-6">
                        <div class="cart-product-info">
                          <span class="product-color">COLOR:<span>${value.options.color}</span></span>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="cart-product-info">
                          <span class="product-color">SIZE:
                            ${value.options.size == null
                              ? `<span> .... </span>`
                              :
                            `<span>${value.options.size}</span>` 
                            }
                          </span>
                        </div>
                      </div>
                  </div><!-- /.row -->
              </td>
              <td class="cart-product-edit">
                <a href="#" class="product-edit"> </a>
              </td>
              <td class="cart-product-quantity">
                  <div class="quant-input">
                          <div class="arrows">
                            <div class="arrow plus gradient">
                              <a id="${value.rowId}" onclick="cartIncrement(this.id)">
                                <span class="ir"><i class="icon fa fa-sort-asc"></i></span>
                              </a>
                            </div>
                            <div class="arrow minus gradient">
                              ${value.qty > 1
                              ?  `<a id="${value.rowId}" onclick="cartDecrement(this.id)">
                                <span class="ir"><i class="icon fa fa-sort-desc"></i></span>
                              </a>`
                              : `<a disabled >
                                <span class="ir"><i class="icon fa fa-sort-desc"></i></span>
                              </a>`}
                              
                            </div>
                          </div>
                          <input type="text" value="${value.qty}" min="1" max="100" disabled="">
                  </div>
              </td>
              <td class="cart-product-sub-total"><span class="cart-sub-total-price">$${value.price}</span></td>
              <td class="cart-product-grand-total"><span class="cart-grand-total-price">$${value.subtotal}</span></td>
          </tr>`
        }); //End each
        
        $('#cartPage').html(rows);
      } //End success
    }); //End ajax
  } //End mycart
  mycart(); // Run mycart Method

  ///  Start mini cart remove  
  function mycCartRemove(rowId) {
    $.ajax({
      type: 'GET',
      url: '/user/cart-remove/'+rowId,
      dataType: 'json',
      success:function(data){

        mycart(); // Run mycart Method
        miniCart(); // Run miniCart Method
        couponCalculation() // run method
        $('#couponField').show();
        $('#coupon_name').val('');

        // Start Message
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        })
        if ($.isEmptyObject(data.error)) {
            Toast.fire({
                type: 'success',
                icon: 'success',
                title: data.success
            })
        }else{
            Toast.fire({
                type: 'error',
                icon: 'error',
                title: data.error
            })
        }
        // End Message 

      } //End success
    }); //End ajax
  } //End wishlistRemove function

  ///  Start cartIncrement  
  function cartIncrement(rowId) {
    $.ajax({
      type: 'GET',
      url: '/user/cart-increment/'+rowId,
      dataType: 'json',
      success:function(data){

        mycart(); // Run mycart Method
        miniCart(); // Run miniCart Method
        couponCalculation() // run method

      } //End success
    }); //End ajax
  } //End cartIncrement function

  ///  Start cartIncrement  
  function cartDecrement(rowId) {
    $.ajax({
      type: 'GET',
      url: '/user/cart-decrement/'+rowId,
      dataType: 'json',
      success:function(data){

        mycart(); // Run mycart Method
        miniCart(); // Run miniCart Method
        couponCalculation() // run method
        

      } //End success
    }); //End ajax
  } //End cartIncrement function


</script>
<!-- End My Crat script -->

<!-- =========== Coupon Apply Start =============  -->
<script type="text/javascript">
  function applyCoupon() {
    var coupon_name = $('#coupon_name').val();
    $.ajax({
      type: 'POST',
      dataType: 'json',
      data: {coupon_name:coupon_name},
      url: "{{ url('/coupon-apply') }}",

      success:function(data){
        couponCalculation() // run method
        
        if (data.validity == true) {
          $('#couponField').hide();
        }
        
        // Start Message
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        })
        if ($.isEmptyObject(data.error)) {
            Toast.fire({
                type: 'success',
                icon: 'success',
                title: data.success
            })
        }else{
            Toast.fire({
                type: 'error',
                icon: 'error',
                title: data.error
            })
        }
        // End Message 
      }
    });
  }

 //----======== couponCalculation ====-----
  function couponCalculation(){
    $.ajax({
        type: 'GET',
        url: "{{ url('/coupon-calculation') }}",
        dataType: 'json',
        success:function(data){
          if (data.total){
            $('#couponCalField').html(`
              <tr>
                <th>
                  <div class="cart-sub-total">
                      Subtotal : <span class="inner-left-md">$${data.total}</span>
                  </div>
                  <div class="cart-grand-total">
                      Grand Total : <span class="inner-left-md">$${data.total}</span>
                  </div>
                </th>
              </tr>
            `)
          }else{
            $('#couponCalField').html(`
              <tr>
                <th>
                  <div class="cart-sub-total">
                      Subtotal : <span class="inner-left-md">$${data.subtotal}</span>
                  </div>
                  <div class="cart-sub-total">
                    <a title="cancel" class="icon" > <i class="fa fa-trash-o"></i></a>
                      Coupon Name : <span class="inner-left-md">${data.coupon_name} </span>
                  </div>
                  <div class="cart-sub-total">
                      Coupon Remove : <span class="inner-left-md">
                        
                        <button type="submit" onclick="couponRemove()"><i class="fa fa-times"></i>  </button>
                      </span>
                  </div>
                  <div class="cart-sub-total">
                    Coupon Discount : <span class="inner-left-md">${data.coupon_discount}%</span>
                  </div>
                  <div class="cart-sub-total">
                      Discount Amount : <span class="inner-left-md">$${data.discount_amount}</span>
                  </div>
                  <div class="cart-sub-total">
                    Grand Total : <span class="inner-left-md">$${data.total_amount}</span>
                  </div>
                </th>
              </tr>
            `)
          }
        }
    })
  }
  couponCalculation() // run method

  ///  Start couponRemove 
  function couponRemove(){
    $.ajax({
      type: 'GET',
      dataType: 'json',
      url: "{{ url('/coupon-remove') }}",

      success:function(data){
        couponCalculation() // run method
        $('#couponField').show();
        $('#coupon_name').val('');
        // Start Message
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        })
        if ($.isEmptyObject(data.error)) {
            Toast.fire({
                type: 'success',
                icon: 'success',
                title: data.success
            })
        }else{
            Toast.fire({
                type: 'error',
                icon: 'error',
                title: data.error
            })
        }
        // End Message
      }
    });

  }
  
</script>




</body>
</html>
