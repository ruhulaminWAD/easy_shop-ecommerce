
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">New Products</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">

              <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
              @foreach($categorys as $category)
              <li>
                <a data-transition-type="backSlide" href="#category{{$category->id}}" data-toggle="tab">
                  @if(session()->get('language') == 'bangla') 
                    {{ $category->category_name_bn }}
                  @else 
                    {{ $category->category_name_en }}
                  @endif
                </a>
              </li>
              @endforeach
              
              <!-- <li><a data-transition-type="backSlide" href="#smartphone" data-toggle="tab">Clothing</a></li>
              <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li>
              <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li> -->
            </ul>
            <!-- /.nav-tabs --> 
          </div>
          <div class="tab-content outer-top-xs">
            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                  @foreach($products as $product)
                  @php
                    $amount = $product->selling_price - $product->discount_price;
                    $discount = ($amount/$product->selling_price) * 100;
                  @endphp 
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"><img  src="{{ asset($product->product_thumbnail )}}" alt=""></a> </div>
                          <!-- /.image -->
                          <div>
                            @if($product->discount_price == NULL)
                              <div class="tag new"><span>new</span></div>
                            @else
                              <div class="tag new"><span>{{ round($discount) }}%</span></div>
                            @endif
                          </div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
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
                          <div class="description"></div>
                          @if($product->discount_price == NULL)
                            <div class="product-price"> <span class="price">${{ $product->selling_price }}</span></div>
                          @else
                            <div class="product-price"> <span class="price">${{ $product->discount_price }}</span> <span class="price-before-discount">${{ $product->selling_price }}</span> </div>
                          @endif
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">

                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist">
                                 <a data-toggle="tooltip" class="add-to-cart"  title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="icon fa fa-heart"></i> </a> 
                              </li>

                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->
                  @endforeach    <!-- Endforeach all Product  -->
                
                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->

            <!-- ========================== -->
            <!-- ========================== -->
            <!-- ========================== -->
            @foreach($categorys as $category)
            <div class="tab-pane" id="category{{$category->id}}">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                  @php
                    $catwiseProduct = App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get(); 
                  @endphp
                  @forelse($catwiseProduct as $product)
                  @php
                  $amount = $product->selling_price - $product->discount_price;
                  $discount = ($amount/$product->selling_price) * 100;
                  @endphp
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"><img  src="{{ asset($product->product_thumbnail )}}" alt=""></a> </div>
                          <!-- /.image -->
                          
                          <div>
                            @if($product->discount_price == NULL)
                              <div class="tag new"><span>new</span></div>
                            @else
                              <div class="tag new"><span>{{ round($discount) }}%</span></div>
                            @endif
                          </div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
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
                          <div class="description"></div>
                          @if($product->discount_price == NULL)
                            <div class="product-price"> <span class="price">${{ $product->selling_price }}</span></div>
                          @else
                            <div class="product-price"> <span class="price">${{ $product->discount_price }}</span> <span class="price-before-discount">${{ $product->selling_price }}</span> </div>
                          @endif
                          <!-- /.product-price --> 
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">

                              <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist">
                                 <a data-toggle="tooltip" class="add-to-cart"  title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="icon fa fa-heart"></i> </a> 
                              </li>

                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->
                  @empty
                  <h5 class="text-danger">No Product Found</h5>
                  @endforelse    <!-- Endforeach all Product  -->
                
                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->
            @endforeach
            
          </div>
          <!-- /.tab-content --> 
        </div>