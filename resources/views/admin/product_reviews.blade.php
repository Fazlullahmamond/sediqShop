@php
    $menu = ['dashboard'=> '', 'user'=> 'has-sub', 'category'=> 'has-sub', 'product'=> 'has-sub', 'order'=> 'has-sub', 'blog'=> 'has-sub', 'review'=> 'active', 'contact'=> ''];
@endphp

@extends('admin.components.layout')



@section('main')


			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div
						class="breadcrumb-wrapper breadcrumb-wrapper-2 d-flex align-items-center justify-content-between">
						<h1>Review</h1>
						<p class="breadcrumbs"><span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
							<span><i class="mdi mdi-chevron-right"></i></span>Review
						</p>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="responsive-data-table" class="table" style="width:100%">
											<thead>
												<tr>
													<th>User</th>
													<th>Product</th>
													<th>Title</th>
													<th>Description</th>
													<th>Ratings</th>
													<th>Date</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>

                                                @foreach ($product_reviews as $reviews)

                                                    <tr>
                                                        <td>{{ $reviews->user->name }}</td>
                                                        <td>{{ $reviews->product->title }}</td>
                                                        <td>{{ $reviews->title }}</td>
                                                        <td>{{ $reviews->description }}</td>
                                                        <td>
                                                            <div class="ec-t-rate">
                                                                @for ($i = 0; $i < $reviews->rating; $i++)
                                                                    <i class="mdi mdi-star is-rated"></i>
                                                                @endfor
                                                            </div>
                                                        </td>
                                                        <td>{{ $reviews->created_at }}</td>
                                                        @if ($reviews->status == 0)
                                                            <td style="color: red;">Pendding</td>
                                                        @elseif ($reviews->status == 1)
                                                            <td style="color: green;">Active</td>
                                                        @else
                                                            <td style="color: yellow;">Not Active</td>
                                                        @endif
                                                    </tr>

                                                @endforeach

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
