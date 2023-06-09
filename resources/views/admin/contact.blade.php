@php
    $menu = ['dashboard'=> '', 'user'=> 'has-sub', 'category'=> 'has-sub', 'product'=> 'has-sub', 'order'=> 'has-sub', 'blog'=> 'has-sub', 'review'=> '', 'contact'=> 'active'];
@endphp

@extends('admin.components.layout')

@section('main')


			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div
						class="breadcrumb-wrapper breadcrumb-wrapper-2 d-flex align-items-center justify-content-between">
						<h1>User  Contacts</h1>
						<p class="breadcrumbs"><span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
							<span><i class="mdi mdi-chevron-right"></i></span>Contacts
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
													<th>Full Name</th>
													<th>Email</th>
													<th>Phone</th>
													<th>Comment</th>
													<th>Status</th>
												</tr>
											</thead>

											<tbody>

                                                @foreach ($contact as $con)
                                                    <tr>
                                                        <td>{{ $con->first_name }} {{ $con->last_name }}</td>
                                                        <td>{{ $con->email }}</td>
                                                        <td>{{ $con->phone_number }}</td>
                                                        <td>{{ $con->comment }}</td>
                                                        @if ($con->status == 0)
                                                            <td style="color: red;">Pendding</td>
                                                        @elseif ($con->status == 1)
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
