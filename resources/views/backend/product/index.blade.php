@extends('backend.admin.backend_master')
@section('main_content')
<div class="container-full">

	<!-- Main content -->
	<section class="content">
		<div class="row">
		<div class="col-12">
			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Total Product List <span class="badge badge-pill badge-danger"> {{ count($products) }} </span> </h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<table id="example5" class="table table-bordered table-striped" style="width:100%">
					<thead>
						<tr>
							<th>Product Image</th>
							<th>Product Name en</th>
							<th>Product Price</th>
							<th>Quantity</th>
							<th>Discount</th>
							<th>Status</th>
							<th style="width: 25%;">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $item)
							<tr>
								<td><img src="{{ asset($item->product_thumbnail) }}" alt="Product_image" style="width: 60px; height: 50px;"></td>
								<td>{{ $item->product_name_en }}</td>
								<td>{{ $item->selling_price }} $</td>
								<td>{{ $item->product_qty }} pic</td>
								<td>
									@if($item->discount_price == NULL)
										<span class="badge badge-pill badge-danger">No Discount</span>
									@else
										@php
										$amount = $item->selling_price - $item->discount_price;
										$discount = ($amount/$item->selling_price) * 100;
										@endphp
										<span class="badge badge-pill badge-danger">{{ round($discount)  }}%</span>
									@endif
								</td>
								<td>
									@if($item->status == 1)
										<span class="badge badge-pill badge-success"> Active </span>
										@else
										<span class="badge badge-pill badge-danger"> InActive </span>
									@endif
								</td>
								<td>
									<a href="{{ route('product.edit', $item->id) }}" class="btn btn-primary" title="Product Details Data"><i class="fa fa-eye"></i></a>
									<a href="{{ route('product.edit', $item->id) }}" class="btn btn-info"  title="Edit Data"><i class="fa fa-edit"></i></a>
									<a href="{{ route('product.destroy', $item->id) }}" class="btn btn-danger" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
									@if($item->status == 1)
										<a href="{{ route('product.Inactive', $item->id) }}" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down"></i></a>
									@else
										<a href="{{ route('product.Active', $item->id) }}" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up"></i></a>
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