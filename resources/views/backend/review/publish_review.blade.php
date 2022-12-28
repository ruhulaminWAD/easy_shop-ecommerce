@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">

	<!-- Main content -->
	<section class="content">
		<div class="row">
		<div class="col-lg-12">
			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Total Publish All Reviews <span class="badge badge-pill badge-danger"> {{ count($reviews) }} </span> </h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<table id="example5" class="table table-bordered table-striped" style="width:100%">
					<thead>
						<tr>
                            <th>Summary  </th>
                            <th>Comment </th>
                            <th>User </th>
                            <th>Product  </th>
                            <th>Status </th>
                            <th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($reviews as $item)
							<tr>
                                <td> {{ $item->summary }}  </td>
                                <td> {{ $item->comment }}  </td>
                                <td>  {{ $item->user->name }}  </td>
                                <td> {{ $item->product->product_name_en }}  </td>
                                <td>
                                    @if($item->status == 0)
                                        <span class="badge badge-pill badge-primary">Pending </span>
                                    @elseif($item->status == 1)
                                        <span class="badge badge-pill badge-success">Publish </span>
                                     @endif
                                </td>
                                <td>
									<a href="{{ route('destroy.review', $item->id) }}" class="btn btn-danger" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
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
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->

</div> <!-- /.container-full  -->
@endsection