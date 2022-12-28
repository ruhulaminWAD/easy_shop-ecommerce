
<section class="section latest-blog outer-bottom-vs wow fadeInUp">
  <h3 class="section-title">latest form blog</h3>
  <div class="blog-slider-container outer-top-xs">
    <div class="owl-carousel blog-slider custom-carousel"> 

      @foreach($blogPosts as $blogPost)
      <div class="item">
        <div class="blog-post">
          <div class="blog-post-image">
            <div class="image"> <a href="{{ route('blog.post.details',$blogPost->id) }}"><img src="{{ asset($blogPost->post_image) }}" alt=""></a> </div>
          </div>
          <!-- /.blog-post-image -->
          
          <div class="blog-post-info text-left">
            <h3 class="name">
              <a href="{{ route('blog.post.details',$blogPost->id) }}">
                @if(session()->get('language') == 'bangla') 
                {{ $blogPost->post_title_bn }}
                @else 
                {{ $blogPost->post_title_en }}
                @endif
              </a>
            </h3>
            <span class="info">{{ Carbon\Carbon::parse($blogPost->created_at)->diffForHumans() }}</span>
            <p class="text">
              @if(session()->get('language') == 'bangla') 
              {!! Str::limit($blogPost->post_details_bn, 200) !!}
              @else 
              {!! Str::limit($blogPost->post_details_en, 200) !!}
              @endif
            </p>
            <a href="{{ route('blog.post.details',$blogPost->id) }}" class="lnk btn btn-primary">Read more</a> </div>
          <!-- /.blog-post-info --> 
          
        </div>
        <!-- /.blog-post --> 
      </div>
      @endforeach
      <!-- /.item --> 
      
    </div>
    <!-- /.owl-carousel --> 
  </div>
  <!-- /.blog-slider-container --> 
</section>