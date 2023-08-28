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
							<p class="breadcrumbs"><span><a href="index.html">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>User
							</p>
						</div>
						<div>
							<button type="button" class="btn btn-primary" data-bs-toggle="modal"
								data-bs-target="#addUser"> Add User
							</button>
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
													<th>image</th>
													<th>Name</th>
													<th>Email</th>
													<th>Gender</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
												@foreach ($users as $user)													
												<tr>
													<td><img class="vendor-thumb" src="{{ $user->image }}" alt="user profile" /></td>
													<td>{{ $user->name }}</td>
													<td>{{ $user->email }}</td>
													<td>@if ($user->gender == 0) Female @elseif ($user->gender == 1) Male @else Not Interested @endif</td>
													<td>{{ $user->status == 1 ? 'Active' : 'inActive' }}</td>
													<td>
														<td>
															<div class="btn-group">
																<a type="button" href="{{route('adminUsers.edit' , $user->id)}}"
																	class="btn btn-outline-success">Edit</a>
		
																<form action="{{ route('adminUsers.destroy', $user->id) }}"
																	method="POST" class="btn btn-outline-danger">
																	@csrf
																	@method('DELETE')
																	<button type="submit"
																		onclick="return confirm('Are you sure you want to delete')">Delete</button>
																</form>
		
															</div>
														</td>
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
					<!-- Add User Modal  -->
					<div class="modal fade modal-add-contact" id="addUser" tabindex="-1" role="dialog"
						aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<form action="{{ route('adminUsers.store') }}" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Add New User</h5>
									</div>

									<div class="modal-body px-4">
										
										<div class="row mb-2">
											<div class="col-lg-6">
												<div class="form-group">
													<label for="name">Full Name</label>
													<input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="Enter your name">
													@if ($errors->has('name'))
														<div style="color: red;">{{ $errors->first('name') }}</div>
													@endif
												</div>
											</div>

											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="email">Email</label>
													<input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="example@gmail.com">
													@if ($errors->has('email'))
														<div style="color: red;">{{ $errors->first('email') }}</div>
													@endif
												</div>
											</div>

											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label>Gender</label>
													<select name="gender" class="form-control">
														<option @selected(old('gender')==1) value="1" selected>Male</option>
														<option @selected(old('gender')==0) value="0">Female</option>
														<option @selected(old('gender')==2) value="2">Not Intressted</option>
													</select>
													@if ($errors->has('gender'))
														<div style="color: red;">{{ $errors->first('gender') }}</div>
													@endif
												</div>
											</div>

											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label>Status</label>
													<select name="status" class="form-control">
														<option @selected(old('status')==1) value="1" >Active</option>
														<option @selected(old('status')==0) value="0">inActive</option>
													</select>
													@if ($errors->has('status'))
														<div style="color: red;">{{ $errors->first('status') }}</div>
													@endif
												</div>
											</div>

											<div class="form-group row mb-6">
												<label for="profile_photo_path" class="col-sm-4 col-lg-2 col-form-label">User Image</label>
												<div class="col-sm-8 col-lg-10">
													<div class="custom-file mb-1">
														<input type="file" name="profile_photo_path">
														@if ($errors->has('profile_photo_path'))
															<div style="color: red;">{{ $errors->first('profile_photo_path') }}</div>
														@endif
													</div>
												</div>
											</div>
											
										</div>
									</div>

									<div class="modal-footer px-4">
										<button type="button" class="btn btn-secondary btn-pill"
											data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-primary btn-pill">Save Contact</button>
									</div>
								</form>
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
	<script>
		@if ($errors->any())
			$(document).ready(function(){
				$('#addUser').modal('show');
			});
		@endif
	</script>
@endsection

@section('styles')
	<!-- Data Tables -->
	<link href="{{ asset('back/assets/plugins/data-tables/datatables.bootstrap5.min.css') }}" rel='stylesheet'>
	<link href="{{ asset('back/assets/plugins/data-tables/responsive.datatables.min.css') }}" rel='stylesheet'>
@endsection
