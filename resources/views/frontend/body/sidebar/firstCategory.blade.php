<div class="side-menu animate-dropdown outer-bottom-xs">
  <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
  <nav class="yamm megamenu-horizontal">
    <ul class="nav">

      <!--   // Get Category Table Data -->
      @foreach($categorys as $category) <!-- Start Categorys Foreach  -->
      <li class="dropdown menu-item">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="icon {{ $category->category_icon }}" aria-hidden="true"></i>
          @if(session()->get('language') == 'bangla') 
            {{ $category->category_name_bn }}
          @else 
            {{ $category->category_name_en }}
          @endif
        </a>
        <ul class="dropdown-menu mega-menu">
          <li class="yamm-content">
            <div class="row">

              <!--   // Get SubCategory Table Data -->
              @php
              $subcategorys = App\Models\SubCategory::where('category_id', $category->id)->orderBy('subcategory_name_en', 'ASC')->get();
              @endphp
              <!-- Start Sub Categorys Foreach  -->
              @foreach($subcategorys as $subcategory)
              <div class="col-sm-12 col-md-3">
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
                <ul class="links list-unstyled">
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
                @endforeach  <!-- End Sub Sub Categorys Foreach  -->
              </div>
              @endforeach <!-- End Sub Categorys Foreach  -->

            </div>
            <!-- /.row --> 
          </li>
          <!-- /.yamm-content -->
        </ul>
        <!-- /.dropdown-menu --> </li>
      <!-- /.menu-item -->
      @endforeach
      <!-- End Categorys Foreach  -->
      
    </ul>
    <!-- /.nav --> 
  </nav>
  <!-- /.megamenu-horizontal --> 
</div>