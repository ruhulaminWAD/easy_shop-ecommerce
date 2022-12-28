@extends('frontend.frontend_master')

@section('title')
Easy Online Shop
@endsection

@section('main_content')
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
      <!-- ================== SIDEBAR ======================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
        
        <!-- ============ TOP NAVIGATION ============ -->
        @include('frontend.body.sidebar.firstCategory')
        <!-- /.side-menu --> 
        <!-- ============ TOP NAVIGATION : END ============ --> 
        
        <!-- ============ HOT DEALS ============ -->
        @include('frontend.body.sidebar.hot_deals')
        <!-- ============ HOT DEALS: END ============ --> 
        
        <!-- ============ SPECIAL OFFER ============ -->
        @include('frontend.body.sidebar.special_offer')
        <!-- /.sidebar-widget --> 
        <!-- ============ SPECIAL OFFER : END ============ --> 
        
        <!-- ============ PRODUCT TAGS ============ -->
        @include('frontend.body.sidebar.product_tag')
        <!-- /.sidebar-widget --> 
        <!--  PRODUCT TAGS : END  --> 

        <!--  SPECIAL DEALS  -->
        @include('frontend.body.sidebar.special_deals')
        <!-- /.sidebar-widget --> 
        <!-- ============ SPECIAL DEALS : END ============ --> 
        <!-- ============ NEWSLETTER ============ -->
        @include('frontend.body.sidebar.newsletters')
        <!-- /.sidebar-widget --> 
        <!-- ============ NEWSLETTER: END ============ --> 
        
        <!-- ============ Testimonials============ -->
        @include('frontend.body.sidebar.testimonials')
        <!-- ============ Testimonials: END ============ -->
        
        <div class="home-banner"> <img src="{{ asset('frontend/images/banners/LHS-banner.jpg') }}" alt="Image"> </div>
      </div>
      <!-- /.sidemenu-holder --> 
      <!-- ============ SIDEBAR : END ============ --> 

      <!-- =================================================== -->
      <!-- =================================================== -->
      
      <!-- ============ CONTENT ============ -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 


        <!-- ============ SECTION – HERO ============ -->
        @include('frontend.content.hero_section')
        <!-- ============ SECTION – HERO : END ============ --> 
      

        <!-- ============ INFO BOXES ============ -->
        @include('frontend.content.info_boxes')
        <!-- ============ INFO BOXES : END ============ --> 


        <!-- =============NEW PRODUCTS =============  -->
        @include('frontend.content.new_products')
        <!-- ============= NEW PRODUCTS : END =============  -->


        <!-- ============ WIDE PRODUCTS ============ -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-7 col-sm-7">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('frontend/images/banners/home-banner1.jpg') }}" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col -->
            <div class="col-md-5 col-sm-5">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('frontend/images/banners/home-banner2.jpg') }}" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <!-- ============ WIDE PRODUCTS : END ============ --> 


        <!-- ============ FEATURED PRODUCTS ============ -->
        @include('frontend.content.featured_profucts') 
        <!-- ============ FEATURED PRODUCTS : END ============ --> 


        <!-- ============ WIDE PRODUCTS ============ -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-12">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('frontend/images/banners/home-banner.jpg') }}" alt=""> </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right">New Mens Fashion<br>
                      <span class="shopping-needs">Save up to 40% off</span></h2>
                  </div>
                </div>
                <div class="new-label">
                  <div class="text">NEW</div>
                </div>
                <!-- /.new-label --> 
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
            
          </div>
          <!-- /.row --> 
        </div>
        <!-- ============ WIDE PRODUCTS : END ============ --> 


        <!-- ============ CATEGORY PRODUCTS ============ -->
        @include('frontend.content.category_profucts') 
        <!-- ============ CATEGORY PRODUCTS : END ============ --> 


        <!-- ============ BEST SELLER ============ -->
        @include('frontend.content.best_seller')  
        <!-- ============ BEST SELLER : END ============ --> 

        
        <!-- ============ BLOG SLIDER latest form blog ============ -->
        @include('frontend.content.latest_form_blog') 
        <!-- ============ BLOG SLIDER : END ============ --> 

        
        <!-- ============ FEATURED PRODUCTS New Arrivals ============ -->
        @include('frontend.content.new_arrivals')
        <!-- ============ FEATURED PRODUCTS New Arrivals : END ============ --> 
        
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============ CONTENT : END ============ --> 
    </div>
    <!-- /.row --> 
    <!-- ============ BRANDS CAROUSEL ============ -->
    @include('frontend.body.brand_carousel')
    <!-- ============ BRANDS CAROUSEL : END ============ --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /#top-banner-and-menu -->
@endsection