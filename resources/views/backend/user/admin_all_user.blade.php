@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">

	<!-- Main content -->
	<section class="content">
		<div class="row">
            <div class="col-lg-12">
                <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Total All Admin User <span class="badge badge-pill badge-danger"> {{ count($adminUser) }} </span> </h3>
                    <a href="{{ route('add.admin.user') }}" class="btn btn-danger" style="float: right;">Add Admin User</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example5" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Image </th>
								<th>Name </th>
								<th>Email</th>
								<th>Access </th>
								<th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($adminUser as $user)
                                <tr>
                                    <td>
                                        <img src="{{ (!empty($user->profile_photo_path))? asset($user->profile_photo_path) : url('upload/no_image.jpg') }}" style="width: 50px; height: 50px;"> 
                                    </td>
                                    <td>{{ $user->name }}</td> 
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->brand == 1)
                                        <span class="badge btn-primary">Brand</span>
                                        @endif

                                        @if($user->category == 1)
                                        <span class="badge btn-secondary">Category</span>
                                        @endif

                                        @if($user->product == 1)
                                        <span class="badge btn-success">Product</span>
                                        @endif

                                        @if($user->slider == 1)
                                        <span class="badge btn-danger">Slider</span>
                                        @endif

                                        @if($user->coupon == 1)
                                        <span class="badge btn-warning">Coupons</span>
                                        @endif

                                        @if($user->shipping_area == 1)
                                        <span class="badge btn-info">Shipping</span>
                                        @endif

                                        @if($user->blog == 1)
                                        <span class="badge btn-light">Blog</span>
                                        @endif

                                        @if($user->setting == 1)
                                        <span class="badge btn-dark">Setting</span>
                                        @endif

                                        @if($user->return_order == 1)
                                        <span class="badge btn-primary">Return Order</span>
                                        @endif


                                        @if($user->review == 1)
                                        <span class="badge btn-secondary">Review</span>
                                        @endif

                                        @if($user->order == 1)
                                        <span class="badge btn-success">Orders</span>
                                        @else
                                        @endif

                                        @if($user->stock == 1)
                                        <span class="badge btn-danger">Stock</span>
                                        @else
                                        @endif

                                        @if($user->report == 1)
                                        <span class="badge btn-warning">Reports</span>
                                        @else
                                        @endif

                                        @if($user->all_user == 1)
                                        <span class="badge btn-info">Alluser</span>
                                        @endif

                                        @if($user->adminuserrole == 1)
                                        <span class="badge btn-dark">Adminuserrole</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('admin.user.destroy', $user->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                <!-- /.box-body -->
                </div>
                <!-- /.box -->      
            </div>
            <!-- /.col -->
		
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->

</div> <!-- /.container-full  -->
@endsection