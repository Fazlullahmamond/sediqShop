@php
    $menu = ['dashboard'=> '', 'user'=> 'has-sub', 'category'=> 'has-sub', 'product'=> 'has-sub', 'order'=> 'has-sub', 'blog'=> 'has-sub active', 'review'=> '', 'contact'=> ''];
@endphp

@extends('admin.components.layout')



@section('main')

    			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
						<div>
							<h1>Product</h1>
							<p class="breadcrumbs"><span><a href="{{ route("admin.dashboard") }}">Dashboard</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>List Product</p>
						</div>
						<div>
							<a href="{{ route('products.create') }}" class="btn btn-primary"> Add Porduct</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="responsive-data-table"  class="table"
											style="width:100%">
											<thead>
												<tr>
													<th>Product</th>
													<th>Name</th>
													<th>Price</th>
													<th>Offer</th>
													<th>Purchased</th>
													<th>Stock</th>
													<th>Status</th>
													<th>Date</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td><img class="tbl-thumb" src="{{ asset('back/assets/img/products/p1.jpg') }}" alt="Product Image" /></td>
													<td>Baby shoes</td>
													<td>$20</td>
													<td>25% OFF</td>
													<td>61</td>
													<td>5421</td>
													<td>ACTIVE</td>
													<td>2021-10-30</td>
													<td>
														<div class="btn-group mb-1">
															<button type="button"
																class="btn btn-outline-success">Info</button>
															<button type="button"
																class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
																data-bs-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false" data-display="static">
																<span class="sr-only">Info</span>
															</button>

															<div class="dropdown-menu">
																<a class="dropdown-item" href="#">Edit</a>
																<a class="dropdown-item" href="#">Delete</a>
															</div>
														</div>
													</td>
												</tr>

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->

@endsection

@section('scripts')
    <!-- Datatables -->
	<script src="{{ asset('back/assets/plugins/data-tables/jquery.datatables.min.js') }}"></script>
	<script src="{{ asset('back/assets/plugins/data-tables/datatables.bootstrap5.min.js') }}"></script>
	<script src="{{ asset('back/assets/plugins/data-tables/datatables.responsive.min.js') }}"></script>
@endsection

@section('styles')
	<!-- Data Tables -->
	<link href="{{ asset('back/assets/plugins/data-tables/datatables.bootstrap5.min.css') }}" rel='stylesheet'>
	<link href="{{ asset('back/assets/plugins/data-tables/responsive.datatables.min.css') }}" rel='stylesheet'>
@endsection
