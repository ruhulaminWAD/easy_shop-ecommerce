@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">

	<!-- Main content -->
	<section class="content">
		<div class="row">
            <div class="col-lg-12">
                <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Total User <span class="badge badge-pill badge-danger"> {{ count($users) }} </span> </h3>
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
								<th>Phone</th>
								<th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        <img src="{{ (!empty($user->profile_photo_path))? url('upload/user_profile_pic/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" style="width: 50px; height: 50px;"> 
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @if($user->UserOnline())
                                        <span class="badge badge-pill badge-success">Active Now</span>
                                        @else
                                        <span class="badge badge-pill badge-success">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>
                                        @endif
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