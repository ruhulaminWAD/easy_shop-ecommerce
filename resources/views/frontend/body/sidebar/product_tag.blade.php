
@php
$tags_en = App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
$tags_bn = App\Models\Product::groupBy('product_tags_bn')->select('product_tags_bn')->get();
@endphp


<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">
            @if(session()->get('language') == 'bangla') 
                @foreach($tags_bn as $tag_bn)
                <a class="item" title="Phone" href="{{ url('tagwise-product-details/'.$tag_bn->product_tags_bn) }}">{{ str_replace(',',' ',$tag_bn->product_tags_bn) }}</a>
                @endforeach
            @else 
                @foreach($tags_en as $tag_en)
                <a class="item" title="Phone" href="{{ url('tagwise-product-details/'.$tag_en->product_tags_en) }}">{{ str_replace(',',' ',$tag_en->product_tags_en) }}</a>
                @endforeach
            @endif
        </div>
        <!-- /.tag-list --> 
    </div>
     <!-- /.sidebar-widget-body --> 
</div>