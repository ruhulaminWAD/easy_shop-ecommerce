@php
$setting = App\Models\SiteSetting::find(1);
@endphp

<header class="header-style-1"> 

  <!-- =============== TOP MENU =============== -->
  <div class="top-bar animate-dropdown">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">
          <ul class="list-unstyled">
            <li><a href="{{ route('user.dashboard') }}"><i class="icon fa fa-user"></i> @if(session()->get('language') == 'bangla') আমার অ্যাকাউন্ট @else My Account @endif</a></li>
            <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
            <li><a href="{{ route('mycart') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
            <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>Checkout</a></li>
            <li><a href="" type="button" data-toggle="modal" data-target="#ordertraking"><i class="icon fa fa-check"></i>Order Traking</a></li>

            @auth
            <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>User Profile</a></li>
            @else
            <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Login/Register</a></li>
            @endauth
          </ul>
        </div>
        <!-- /.cnt-account -->
		<!-- ==================================================== -->
		<!-- ==================================================== -->
        
        <div class="cnt-block">
          <ul class="list-unstyled list-inline">
            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">USD</a></li>
                <li><a href="#">INR</a></li>
                <li><a href="#">GBP</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-small">
              <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
                <span class="value">
                  @if(session()->get('language') == 'bangla') 
                    Bangla
                  @else 
                    English 
                  @endif
                </span><b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('english.language') }}">English</a></li>
                <li><a href="{{ route('bangla.language') }}">Bangla</a></li>
              </ul>
            </li>
          </ul>
          <!-- /.list-unstyled --> 
        </div>
        <!-- /.cnt-cart -->
        <div class="clearfix"></div>
      </div>
      <!-- /.header-top-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.header-top --> 
  <!-- ================ TOP MENU : END ================ -->
  <!-- ==================================================== -->
  <!-- ==================================================== -->
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
          <!-- ================ LOGO ================ -->
          <div class="logo"> <a href="{{ url('/') }}"> <img src="{{ asset($setting->logo) }}" alt="logo"> </a> </div>
          <!-- /.logo --> 
          <!-- ================ LOGO : END ================ --> </div>
        <!-- /.logo-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
          <!-- /.contact-row --> 
          <!-- ================ SEARCH AREA ================ -->
          <div class="search-area">
            <form action="{{ route('product.search') }}" method="post"> @csrf
              <div class="control-group">
                <ul class="categories-filter animate-dropdown">
                  <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" >
                      <li class="menu-header">Computer</li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Clothing</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Shoes</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Watches</a></li>
                    </ul>
                  </li>
                </ul>
                <input class="search-field" id="search" name="search" onfocus="search_product_show()" onblur="search_product_hide()" placeholder="Search here..."  required/>
                <button class="search-button" type="submit"></button> 
                <!-- <input class="search-button" type="submit" value="Search"> -->
              </div>
            </form>
            <div id="searchProducts"></div>
          </div>
          <!-- /.search-area --> 
          <!-- ================ SEARCH AREA : END ================ --> </div>
        <!-- /.top-search-holder -->
		<!-- ==================================================== -->
		<!-- ==================================================== -->
        
        <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
          <!-- ================ SHOPPING CART DROPDOWN ================ -->
          
          <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
              <div class="basket-item-count"><span class="count" id="cartQty"></span></div>
              <div class="total-price-basket"> <span class="lbl">cart -</span> <span class="total-price"> <span class="sign">$</span><span class="value" id="cartSubTotal"></span> </span> </div>
            </div>
            </a>
            <ul class="dropdown-menu">
              <li>
                <!-- // Start Mini cart  with ajax -->
                <div id="miniCart"></div>
                <!-- // End Mini cart  with ajax -->

                <div class="clearfix cart-total">
                  <div class="pull-right"> <span class="text">Sub Total :</span><span class="sign">$</span><span class='price' id="cartSubTotal"></span> </div>
                  <div class="clearfix"></div>
                  <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                <!-- /.cart-total--> 
                
              </li>
              <span></span>
            </ul>
            <!-- /.dropdown-menu--> 
          </div>
          <!-- /.dropdown-cart --> 
          
          <!-- ================ SHOPPING CART DROPDOWN : END================ --> </div>
        <!-- /.top-cart-row --> 
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.main-header --> 

  <!-- ==================================================== -->
  <!-- ==================================================== -->
  
  <!-- ================ NAVBAR ================ -->
  <!-- ================ NAVBAR ================ -->
  <!-- ================ NAVBAR ================ -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                <li class="active dropdown yamm-fw"> <a href="{{ url('/') }}">@if(session()->get('language') == 'bangla') হোম @else Home @endif</a> </li>

                <!--   // Get Category Table Data -->
                @php
                $categorys = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                @endphp
                <!-- Start Categorys Foreach  --> 
                @foreach($categorys as $category)
                <li class="dropdown yamm mega-menu">
                  <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                    @if(session()->get('language') == 'bangla') 
                      {{ $category->category_name_bn }}
                    @else 
                      {{ $category->category_name_en }}
                    @endif
                  </a>
                  <ul class="dropdown-menu container">
                    <li>
                      <div class="yamm-content ">
                        <div class="row">

                          <!--   // Get SubCategory Table Data -->
                          @php
                          $subcategorys = App\Models\SubCategory::where('category_id', $category->id)->orderBy('subcategory_name_en', 'ASC')->get();
                          @endphp
                          <!-- Start Sub Categorys Foreach  -->
                          @foreach($subcategorys as $subcategory)
                          <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                            <a href="{{ url('SubCategorywise-product-details/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en) }}">
                              <h2 class="title">
                                @if(session()->get('language') == 'bangla') 
                                  {{ $subcategory->subcategory_name_bn }}
                                @else 
                                  {{ $subcategory->subcategory_name_en }}
                                @endif
                              </h2>
                            </a>

                            <!--   // Get SubSubCategory Table Data -->
                            @php
                            $subsubcategorys = App\Models\SubsubCategory::where('subcategory_id', $subcategory->id)->orderBy('sub_subcategory_name_en', 'ASC')->get();
                            @endphp
                            <!-- Start Sub Sub Categorys Foreach  -->
                            @foreach($subsubcategorys as $subsubcategory)
                            <ul class="links">
                              <li>
                                <a href="{{ url('SubSubCategorywise-product-details/'.$subsubcategory->id.'/'.$subsubcategory->sub_subcategory_slug_en) }}">
                                  @if(session()->get('language') == 'bangla') 
                                    {{ $subsubcategory->sub_subcategory_name_bn }}
                                  @else 
                                    {{ $subsubcategory->sub_subcategory_name_en }}
                                  @endif
                                </a>
                              </li>
                            </ul>
                            @endforeach
                            <!-- End Sub Sub Categorys Foreach  -->
                          </div>
                          @endforeach
                          <!-- End Sub Categorys Foreach  -->
                          <!-- /.col -->
                          
                          <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="{{ asset('frontend/images/banners/top-menu-banner.jpg') }}" alt=""> </div>
                          <!-- /.yamm-content --> 
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                @endforeach
                <!-- End Categorys Foreach  -->

                <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li>
                <li class="dropdown  navbar-right special-menu"> <a href="{{ route('frontend.blog') }}">Blog</a> </li>
              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer --> 
          </div>
          <!-- /.navbar-collapse --> 
          
        </div>
        <!-- /.nav-bg-class --> 
      </div>
      <!-- /.navbar-default --> 
    </div>
    <!-- /.container-class --> 
    
  </div>
  <!-- /.header-nav --> 
  <!-- ================ NAVBAR : END ================ --> 
  
</header>

<!-- ================ HEADER : END ================ -->



<!-- Order Traking Modal -->
<div class="modal fade" id="ordertraking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Track Your Order </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="{{ route('order.tracking') }}">
          @csrf
          <div class="modal-body">
            <label>Invoice Code</label>
            <input type="text" name="code" required="" class="form-control" placeholder="Your Order Invoice Number">           
          </div>

          <button class="btn btn-danger" type="submit" style="margin-left: 17px;"> Track Now </button>

        </form> 
      </div>

    </div>
  </div>
</div>

<style>
  .search-area{
    position: relative;
  }
  #searchProducts{
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background: #ffffff;
    z-index: 999;
    border-radius: 10px;
    margin-top: 7px;
  }
</style>

<script>
  function search_product_hide() {
    $('#searchProducts').slideUp();
  }
  function search_product_show() {
    $('#searchProducts').slideDown();
  }
</script>
