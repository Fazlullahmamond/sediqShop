@php
    $menu = ['dashboard'=> '', 'user'=> 'has-sub active', 'category'=> 'has-sub', 'product'=> 'has-sub', 'order'=> 'has-sub', 'blog'=> 'has-sub', 'review'=> '', 'contact'=> ''];
@endphp

@extends('admin.components.layout')



@section('main')

			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>User List</h1>
							<p class="breadcrumbs"><span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>User
							</p>
						</div>
						<div>
							<a href="{{ route('adminUsers.create') }}" class="btn btn-primary"> Add User </a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="ec-vendor-list card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="responsive-data-table" class="table">
											<thead>
												<tr>
													<th>Profile</th>
													<th>Name</th>
													<th>Email</th>
													<th>Address</th>
													<th>Total Buy</th>
													<th>Status</th>
													<th>Join On</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>

                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td><img class="vendor-thumb" src="{{ $user->image }}" alt="user profile" /></td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->full_address }}</td>
                                                        <td>total buy</td>
                                                        <td>Status</td>
                                                        <td>{{ $user->created_at }}</td>
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
