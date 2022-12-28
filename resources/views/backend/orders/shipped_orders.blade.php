@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">

	<!-- Main content -->
	<section class="content">
		<div class="row">
		<div class="col-lg-12">
			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Shipped Orders List</h3>
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
									<span class="badge badge-pill badge-primary">{{ $item->status }} </span>  
								</td>
								<td>
									<a href="{{ route('pendingOrderDetails', $item->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
									<a href="{{ route('AdminInvoiceDownload',$item->id) }}" class="btn btn-danger" title="Invoice Download"><i class="fa fa-download"></i></a>
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