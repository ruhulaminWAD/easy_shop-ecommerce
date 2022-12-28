
<div class="sidebar-widget outer-bottom-small wow fadeInUp">
  <h3 class="section-title">Special Deals</h3>
  <div class="sidebar-widget-body outer-top-xs">
    <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

      <div class="item">
        <div class="products special-product">
          @forelse($specialDeals->take(3) as $product)
          <div class="product">
            <div class="product-micro">
              <div class="row product-micro-row">
                <div class="col col-xs-5">
                  <div class="product-image">
                    <div class="image"> <a href="#"> <img src="{{ asset($product->product_thumbnail )}}" alt=""> </a> </div>
                    <!-- /.image --> 
                    
                  </div>
                  <!-- /.product-image --> 
                </div>
                <!-- /.col -->
                <div class="col col-xs-7">
                  <div class="product-info">
                    <h3 class="name">
                      <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                        @if(session()->get('language') == 'bangla') 
                          {{ $product->product_name_bn }}
                        @else 
                          {{ $product->product_name_en }}
                        @endif
                      </a>
                    </h3>
                    <div class="rating rateit-small"></div>
                    <div class="product-price"> <span class="price">${{ $product->selling_price }}</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                </div>
                <!-- /.col --> 
              </div>
              <!-- /.product-micro-row --> 
            </div>
            <!-- /.product-micro --> 
            
          </div>
          @empty
          <h5 class="text-danger">No Product Found</h5>
          @endforelse    <!-- Endforeach all Product  -->
          
        </div>
      </div>

      @php
      $crount = $specialDeals->count();
      @endphp
      @if($crount > 3)
      <div class="item">
        <div class="products special-product">
          @foreach($specialDeals->skip(3)->take(3) as $product)
          <div class="product">
            <div class="product-micro">
              <div class="row product-micro-row">
                <div class="col col-xs-5">
                  <div class="product-image">
                    <div class="image"> <a href="#"> <img src="{{ asset($product->product_thumbnail )}}" alt=""> </a> </div>
                    <!-- /.image --> 
                    
                  </div>
                  <!-- /.product-image --> 
                </div>
                <!-- /.col -->
                <div class="col col-xs-7">
                  <div class="product-info">
                    <h3 class="name">
                      <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                        @if(session()->get('language') == 'bangla') 
                          {{ $product->product_name_bn }}
                        @else 
                          {{ $product->product_name_en }}
                        @endif
                      </a>
                    </h3>
                    <div class="rating rateit-small"></div>
                    <div class="product-price"> <span class="price">${{ $product->selling_price }}</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                </div>
                <!-- /.col --> 
              </div>
              <!-- /.product-micro-row --> 
            </div>
            <!-- /.product-micro --> 
            
          </div>
          @endforeach 
          
        </div>
      </div>
      @endif
      <!-- ============= -->
      @php
      $crount = $specialDeals->count();
      @endphp
      @if($crount > 6)
      <div class="item">
        <div class="products special-product">
          @foreach($specialDeals->skip(6)->take(3) as $product)
          <div class="product">
            <div class="product-micro">
              <div class="row product-micro-row">
                <div class="col col-xs-5">
                  <div class="product-image">
                    <div class="image"> <a href="#"> <img src="{{ asset($product->product_thumbnail )}}" alt=""> </a> </div>
                    <!-- /.image --> 
                    
                  </div>
                  <!-- /.product-image --> 
                </div>
                <!-- /.col -->
                <div class="col col-xs-7">
                  <div class="product-info">
                    <h3 class="name">
                      <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
                        @if(session()->get('language') == 'bangla') 
                          {{ $product->product_name_bn }}
                        @else 
                          {{ $product->product_name_en }}
                        @endif
                      </a>
                    </h3>
                    <div class="rating rateit-small"></div>
                    <div class="product-price"> <span class="price">${{ $product->selling_price }}</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                </div>
                <!-- /.col --> 
              </div>
              <!-- /.product-micro-row --> 
            </div>
            <!-- /.product-micro --> 
            
          </div>
          @endforeach 
          
        </div>
      </div>
      @endif
      

    </div>
  </div>
  <!-- /.sidebar-widget-body --> 
</div>