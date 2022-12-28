@extends('frontend.frontend_master')

@section('title')
    @if(session()->get('language') == 'bangla') 
    Category Blog -- Easy Shop  
    @else 
    Category Blog -- Easy Shop 
    @endif
@endsection

@section('main_content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Blog</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">
                    @forelse($blogPosts as $blogPost)
					<div class="blog-post  wow fadeInUp">
                        <a href="{{ route('blog.post.details',$blogPost->id) }}"><img class="img-responsive" src="{{ asset($blogPost->post_image) }}" alt=""></a>
                        <h1>
                            <a href="{{ route('blog.post.details',$blogPost->id) }}">
                                @if(session()->get('language') == 'bangla') 
                                {{ $blogPost->post_title_bn }}
                                @else 
                                {{ $blogPost->post_title_en }}
                                @endif
                            </a>
                        </h1>
                        <span class="date-time">{{ Carbon\Carbon::parse($blogPost->created_at)->diffForHumans() }}</span>
                        <p>
                            @if(session()->get('language') == 'bangla') 
                            {!! Str::limit($blogPost->post_details_bn, 200) !!}
                            @else 
                            {!! Str::limit($blogPost->post_details_en, 200) !!}
                            @endif
                        </p>
                        <a href="{{ route('blog.post.details',$blogPost->id) }}" class="btn btn-upper btn-primary read-more">read more</a>
                    </div>
                    @empty
                    <h5 class="text-danger">No Blog Found</h5>
                    @endforelse

                    <div class="clearfix blog-pagination filters-container  wow fadeInUp" style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">
                                            
                        <div class="text-right">
                            <div class="pagination-container">
                                <ul class="list-inline list-unstyled">
                                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#">1</a></li>	
                                    <li class="active"><a href="#">2</a></li>	
                                    <li><a href="#">3</a></li>	
                                    <li><a href="#">4</a></li>	
                                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul><!-- /.list-inline -->
                            </div><!-- /.pagination-container -->    
                        </div><!-- /.text-right -->

                    </div><!-- /.filters-container -->				
                </div> <!-- /.col-md-9 -->

                <div class="col-md-3 sidebar">      
                    <div class="sidebar-module-container">
                        <div class="search-area outer-bottom-small">
                            <form>
                                <div class="control-group">
                                    <input placeholder="Type to search" class="search-field">
                                    <a href="#" class="search-button"></a>   
                                </div>
                            </form>
                        </div>		

                        <div class="home-banner outer-top-n outer-bottom-xs">
                            <img src="{{ asset('frontend/images/banners/LHS-banner.jpg') }}" alt="Image">
                        </div>
                        <!-- =====================CATEGORY============================================== -->
                        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                            <h3 class="section-title">Category</h3>
                            <div class="sidebar-widget-body m-t-10">
                                <ul class="list-group">
                                    @foreach($blogcategorys as $blogcategory)
                                    <a href="{{ url('blog/category/post/'.$blogcategory->id) }}">
                                        <li class="list-group-item">
                                            @if(session()->get('language') == 'bangla') 
                                            {{ $blogcategory->blog_category_name_bn  }}
                                            @else 
                                            {{ $blogcategory->blog_category_name_en  }}
                                            @endif
                                        </li>
                                    </a>
                                    @endforeach
                                </ul>
                            
                            </div><!-- /.sidebar-widget-body -->
                        </div><!-- /.sidebar-widget -->
                        <!-- ========================== CATEGORY : END ============================================== -->	

                        <!-- ============ PRODUCT TAGS ============ -->
                        @include('frontend.body.sidebar.product_tag')
                        <!-- /.sidebar-widget --> 
                        <!--  PRODUCT TAGS : END  --> 					
                    </div>
				</div> <!-- /.col-md-3-->
			</div>
		</div>
		<!-- ============ BRANDS CAROUSEL ============ -->
        @include('frontend.body.brand_carousel')
        <!-- ============ BRANDS CAROUSEL : END ============ --> 	
    </div> <!-- /.container -->
</div> <!-- /.body-content -->







@endsection