<div class="sidebar-widget wow fadeInUp">
    <h3 class="section-title">shop by</h3>
    <div class="widget-header">
        <h4 class="widget-title">Category</h4>
    </div>
    <div class="sidebar-widget-body">
        <div class="accordion">

            <!--   // Get Category Table Data -->
            @foreach($categorys as $category) <!-- Start Categorys Foreach  -->
            <div class="accordion-group">
                <div class="accordion-heading"> 
                    <a href="#collapse{{$category->id}}" data-toggle="collapse" class="accordion-toggle collapsed">
                        @if(session()->get('language') == 'bangla') 
                            {{ $category->category_name_bn }}
                        @else 
                            {{ $category->category_name_en }}
                        @endif
                    </a> 
                </div>
                <!-- /.accordion-heading -->
                <div class="accordion-body collapse" id="collapse{{$category->id}}" style="height: 0px;">
                    <div class="accordion-inner">
                        <!--   // Get SubCategory Table Data -->
                        @php
                        $subcategorys = App\Models\SubCategory::where('category_id', $category->id)->orderBy('subcategory_name_en', 'ASC')->get();
                        @endphp
                        <!-- Start Sub Categorys Foreach  -->
                        @foreach($subcategorys as $subcategory)
                        <ul>
                            <li>
                                <a href="{{ url('SubCategorywise-product-details/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en) }}">
                                    @if(session()->get('language') == 'bangla') 
                                        {{ $subcategory->subcategory_name_bn }}
                                    @else 
                                        {{ $subcategory->subcategory_name_en }}
                                    @endif
                                </a>
                            </li>
                        </ul>
                        @endforeach  <!-- End Sub Sub Categorys Foreach  -->
                    </div>
                    <!-- /.accordion-inner --> 
                </div>
                <!-- /.accordion-body --> 
            </div>
            <!-- /.accordion-group -->
            @endforeach
            <!-- End Categorys Foreach  -->
        
        </div>
        <!-- /.accordion --> 
    </div>
    <!-- /.sidebar-widget-body --> 
</div>
<!-- /.sidebar-widget --> 