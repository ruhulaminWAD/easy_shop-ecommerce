
@php
  $route = Route::current()->getName();
  $prefix = Request::route()->getPrefix();
@endphp

@php
$brand = (auth()->guard('admin')->user()->brand == 1);
$category = (auth()->guard('admin')->user()->category == 1);
$product = (auth()->guard('admin')->user()->product == 1);
$slider = (auth()->guard('admin')->user()->slider == 1);
$coupon = (auth()->guard('admin')->user()->coupon == 1);
$shipping_area = (auth()->guard('admin')->user()->shipping_area == 1);
$blog = (auth()->guard('admin')->user()->blog == 1);
$setting = (auth()->guard('admin')->user()->setting == 1);
$return_order = (auth()->guard('admin')->user()->return_order == 1);
$review = (auth()->guard('admin')->user()->review == 1);
$order = (auth()->guard('admin')->user()->order == 1);
$stock = (auth()->guard('admin')->user()->stock == 1);
$report = (auth()->guard('admin')->user()->report == 1);
$all_user = (auth()->guard('admin')->user()->all_user == 1);
$adminuserrole = (auth()->guard('admin')->user()->adminuserrole == 1);
@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{ route('admin.dashboard') }}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
						  <h3><b>Easy</b> Shop</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		    <li class="{{ ($route == 'admin.dashboard') ? 'active' : '' }}">
          <a href="{{ route('admin.dashboard') }}">
            <i data-feather="pie-chart"></i>
			      <span>Dashboard</span>
          </a>
        </li>  
        @if($brand)
        <li id="active" class="treeview ">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'brand.view') ? 'active' : '' }}"><a href="{{ route('brand.view') }}"><i class="ti-more"></i>All Brand</a></li>
          </ul>
        </li> 
        @endif

        @if($category)
        <li id="active" class="treeview ">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'category.view') ? 'active' : '' }}"><a href="{{ route('category.view') }}"><i class="ti-more"></i>All Category</a></li>
            <li class="{{ ($route == 'SubCategory.view') ? 'active' : '' }}"><a href="{{ route('SubCategory.view') }}"><i class="ti-more"></i>All SubCategory</a></li>
            <li class="{{ ($route == 'SubSubCategory.view') ? 'active' : '' }}"><a href="{{ route('SubSubCategory.view') }}"><i class="ti-more"></i>All Sub->SubCategory</a></li>
          </ul>
        </li> 
        @endif

        @if($product)
        <li id="active" class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'product.view') ? 'active' : '' }}"><a href="{{ route('product.view') }}"><i class="ti-more"></i>All Product</a></li>
            <li class="{{ ($route == 'product.create') ? 'active' : '' }}"><a href="{{ route('product.create') }}"><i class="ti-more"></i>Add Product</a></li>
          </ul>
        </li>
        @endif
		  
        @if($slider)
        <li id="active" class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'slider.view') ? 'active' : '' }}"><a href="{{ route('slider.view') }}"><i class="ti-more"></i>All Slider</a></li>
          </ul>
        </li>
        @endif

        @if($coupon)
        <li id="active" class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Coupon</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'coupon.view') ? 'active' : '' }}"><a href="{{ route('coupon.view') }}"><i class="ti-more"></i>All Coupon</a></li>
          </ul>
        </li>
        @endif

        @if($shipping_area)
        <li id="active" class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Shipping Area</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'division.view') ? 'active' : '' }}"><a href="{{ route('division.view') }}"><i class="ti-more"></i>Shipping Division</a></li>
            <li class="{{ ($route == 'district.view') ? 'active' : '' }}"><a href="{{ route('district.view') }}"><i class="ti-more"></i>Shipping District</a></li>
            <li class="{{ ($route == 'state.view') ? 'active' : '' }}"><a href="{{ route('state.view') }}"><i class="ti-more"></i>Shipping State</a></li>
          </ul>
        </li>
        @endif

        @if($blog)
        <li id="active" class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Manage Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'blog.category') ? 'active' : '' }}">
              <a href="{{ route('blog.category') }}"><i class="ti-more"></i>Blog Category</a>
            </li>

            <li class="{{ ($route == 'all.blog.post') ? 'active' : '' }}">
              <a href="{{ route('all.blog.post') }}"><i class="ti-more"></i>All Blog Post</a>
            </li>

            <li class="{{ ($route == 'blog.post.add') ? 'active' : '' }}">
              <a href="{{ route('blog.post.add') }}"><i class="ti-more"></i>Add Blog Post</a>
            </li>
            
          </ul>
        </li>
        @endif

        @if($setting)
        <li id="active" class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Manage Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'site.setting') ? 'active' : '' }}">
              <a href="{{ route('site.setting') }}"><i class="ti-more"></i>Site Setting</a>
            </li>
            <li class="{{ ($route == 'seo.setting') ? 'active' : '' }}">
              <a href="{{ route('seo.setting') }}"><i class="ti-more"></i>Seo Setting</a>
            </li>
            
          </ul>
        </li>
        @endif
		
        		
        <li id="active" class="header nav-small-cap">User Interface</li>

        @if($all_user)
        <li id="active" class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Users  </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li class="{{ ($route == 'all.users') ? 'active' : '' }}">
              <a href="{{ route('all.users') }}"><i class="ti-more"></i>All Users</a>
            </li>
          </ul>
          
        </li>
        @endif

        @if($return_order)
        <li id="active" class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Return Order </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li class="{{ ($route == 'return.request') ? 'active' : '' }}">
              <a href="{{ route('return.request') }}"><i class="ti-more"></i>Return Reques</a>
            </li>
            <li class="{{ ($route == 'all.request') ? 'active' : '' }}">
              <a href="{{ route('all.request') }}"><i class="ti-more"></i>All Request</a>
            </li>
          </ul>
          
        </li>
        @endif

        @if($order)
        <li id="active" class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Orders </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li class="{{ ($route == 'pendingOrders') ? 'active' : '' }}">
              <a href="{{ route('pendingOrders') }}"><i class="ti-more"></i>Pending Orders</a>
            </li>
            <li class="{{ ($route == 'confirmedOrders') ? 'active' : '' }}">
              <a href="{{ route('confirmedOrders') }}"><i class="ti-more"></i>Confirmed Orders</a>
            </li>
            <li class="{{ ($route == 'processingOrders') ? 'active' : '' }}">
              <a href="{{ route('processingOrders') }}"><i class="ti-more"></i>Processing Orders</a>
            </li>
            <li class="{{ ($route == 'pickedOrders') ? 'active' : '' }}">
              <a href="{{ route('pickedOrders') }}"><i class="ti-more"></i>Picked Orders</a>
            </li>
            <li class="{{ ($route == 'shippedOrders') ? 'active' : '' }}">
              <a href="{{ route('shippedOrders') }}"><i class="ti-more"></i>Shipped Orders</a>
            </li>
            <li class="{{ ($route == 'deliveredOrders') ? 'active' : '' }}">
              <a href="{{ route('deliveredOrders') }}"><i class="ti-more"></i>Delivered Orders</a>
            </li>
            <li class="{{ ($route == 'cancelOrders') ? 'active' : '' }}">
              <a href="{{ route('cancelOrders') }}"><i class="ti-more"></i>Cancel Orders</a>
            </li>
          </ul>
          
        </li>
        @endif

        @if($report)
        <li id="active" class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Reports </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li class="{{ ($route == 'all.reports') ? 'active' : '' }}">
              <a href="{{ route('all.reports') }}"><i class="ti-more"></i>All Reports </a>
            </li>
          </ul>
          
        </li>
        @endif

        @if($stock)
        <li id="active" class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Manage Stock</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li class="{{ ($route == 'product.stock') ? 'active' : '' }}">
              <a href="{{ route('product.stock') }}"><i class="ti-more"></i>Product Stock</a>
            </li>
          </ul>
          
        </li>
        @endif

        @if($review)
        <li id="active" class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Manage Review</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li class="{{ ($route == 'pending.review') ? 'active' : '' }}">
              <a href="{{ route('pending.review') }}"><i class="ti-more"></i>Pending Review</a>
            </li>
            <li class="{{ ($route == 'pending.review') ? 'active' : '' }}">
              <a href="{{ route('publish.review') }}"><i class="ti-more"></i>Publish  Review</a>
            </li>
          </ul>
          
        </li>
        @endif

        @if($adminuserrole)
        <li id="active" class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Admin User Role</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li class="{{ ($route == 'all.admin.user') ? 'active' : '' }}">
              <a href="{{ route('all.admin.user') }}"><i class="ti-more"></i>All Admin User</a>
            </li>
          </ul>
          
        </li>
        @endif
 
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>