@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">

	<!-- Main content -->
	<section class="content">
		<div class="row">
		<div class="col-lg-12">
			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Return Order List</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<table id="example5" class="table table-bordered table-striped" style="width:100%">
					<thead>
						<tr>
							<th>Date </th>
							<th>Invoice </th>
							<th>Amount </th>
							<th>Payment </th>
							<th>Status </th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($orders as $item)
							<tr>
								<td> {{ $item->order_date }}</td>
								<td> {{ $item->invoice_no }}</td>
								<td> ${{ $item->amount }}</td>
								<td> {{ $item->payment_method }}</td>
								<td>
                                    @if($item->return_order == 1)
                                    <span class="badge badge-pill badge-primary">Pending </span>
                                    @elseif($item->return_order == 2)
                                    <span class="badge badge-pill badge-success">Success </span>
                                    @endif 
								</td>
								<td>
                                    <a href="{{ route('return.approve', $item->id) }}" class="btn btn-danger">Approve </a>
									
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