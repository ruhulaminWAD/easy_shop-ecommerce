@extends('frontend.frontend_master')

@section('title')
    @if(session()->get('language') == 'bangla') 
    {{ $blogPost->post_title_bn }}
    @else 
    {{ $blogPost->post_title_en }}
    @endif
@endsection

@section('main_content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>
                    @if(session()->get('language') == 'bangla') 
                    {{ $blogPost->post_title_bn }}
                    @else 
                    {{ $blogPost->post_title_en }}
                    @endif
                </li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">
					<div class="blog-post wow fadeInUp">
                        <img class="img-responsive" src="{{ asset($blogPost->post_image) }}" alt="">
                        <h1>Nemo enim ipsam voluptatem quia voluptas sit aspernatur</h1>
                        <span class="author">John Doe</span>
                        <span class="review">7 Comments</span>
                        <span class="date-time">{{ Carbon\Carbon::parse($blogPost->created_at)->diffForHumans() }}</span>
                        
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_share_toolbox_rjw0"></div>
            

                        <p>
                            @if(session()->get('language') == 'bangla') 
                            {!! $blogPost->post_details_bn !!}
                            @else 
                            {!! $blogPost->post_details_en !!}
                            @endif
                        </p>
                        
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_share_toolbox_rjw0"></div>
            
                    </div>
                    
                    <div class="blog-write-comment outer-bottom-xs outer-top-xs">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Leave A Comment</h4>
                            </div>
                            <div class="col-md-4">
                                <form class="register-form" role="form">
                                    <div class="form-group">
                                    <label class="info-title" for="exampleInputName">Your Name <span>*</span></label>
                                    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="">
                                </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form class="register-form" role="form">
                                    <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
                                </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form class="register-form" role="form">
                                    <div class="form-group">
                                    <label class="info-title" for="exampleInputTitle">Title <span>*</span></label>
                                    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputTitle" placeholder="">
                                </div>
                                </form>
                            </div>
                            <div class="col-md-12">
                                <form class="register-form" role="form">
                                    <div class="form-group">
                                    <label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
                                    <textarea class="form-control unicase-form-control" id="exampleInputComments" ></textarea>
                                </div>
                                </form>
                            </div>
                            <div class="col-md-12 outer-bottom-small m-t-20">
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit Comment</button>
                            </div>
                        </div>
                    </div>
				</div> 




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
				        <!-- =========CATEGORY=========-->
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
	                    <!-- =========CATEGORY : END =================== -->	
						

                        <!-- ============ PRODUCT TAGS ============ -->
                        @include('frontend.body.sidebar.product_tag')
                        <!-- /.sidebar-widget --> 
                        <!--  PRODUCT TAGS : END  --> 						

                    </div>
				</div>

                
			</div>
		</div>
	</div>
</div>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6379ef466468077c"></script>


@endsection