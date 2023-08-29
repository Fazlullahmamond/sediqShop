@php
    $menu = ['dashboard'=> '', 'user'=> 'has-sub active', 'category'=> 'has-sub', 'product'=> 'has-sub', 'order'=> 'has-sub', 'blog'=> 'has-sub', 'review'=> '', 'contact'=> ''];
@endphp

@extends('admin.components.layout')



@section('main')

<div class="ec-content-wrapper">
	<div class="content">
		<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
			<div>
				<h1>Edit User</h1>
				<p class="breadcrumbs"><span><a href="{{ route("admin.dashboard") }}">Dashboard</a></span>
					<span><i class="mdi mdi-chevron-right"></i></span>Edit User</p>
			</div>
			<div>
				<a href="{{ route("products.index") }}" class="btn btn-primary"> View All
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card card-default">
					<div class="card-header card-header-border-bottom">
						<h2>Edit User</h2>
					</div>

					<div class="card-body">
						<div class="row ec-vendor-uploads">
							<div class="col-lg-12">
								<div class="ec-vendor-upload-detail">
									<form class="row g-3" action="{{ route('adminUsers.update' , $users->id) }}" method="POST" enctype="multipart/form-data">
										@csrf
										@method("PUT")
										<div class="col-lg-4">
											<div class="ec-vendor-img-upload">
												<div class="ec-vendor-main-img">
													<div class="avatar-upload">
														<div class="avatar-edit">
															<input type='file' id="imageUpload" name='profile_photo_path' value="{{$users->image }}" class="ec-image-upload"
																accept=".png, .jpg, .jpeg" />
															<label for="imageUpload"><img
																	src="{{ asset('back/assets/img/icons/edit.svg') }}"
																	class="svg_img header_svg" alt="edit" name='profile_photo_path' /></label>
														</div>
														<div class="avatar-preview ec-preview">
															<div class="imagePreview ec-div-preview">
																<img class="ec-image-preview"
																	src="{{ asset($users->image) }}"
																	alt="edit"  name='profile_photo_path'/>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

									<div class="col-lg-8">
										<div class="ec-vendor-upload-detail">
											<div class="col-lg-10">
												<div class="form-group">
													<label for="name">Full Name</label>
													<input type="text" class="form-control" name="name" id="name" value="{{old('name' , $users->name)}}" placeholder="Enter your name">
													@if ($errors->has('name'))
														<div style="color: red;">{{ $errors->first('name') }}</div>
													@endif
												</div>
											</div>

											<div class="col-lg-10">
												<div class="form-group mb-4">
													<label for="email">Email</label>
													<input type="email" class="form-control" name="email" id="email" value="{{old('email' , $users->email)}}" placeholder="example@gmail.com">
													@if ($errors->has('email'))
														<div style="color: red;">{{ $errors->first('email') }}</div>
													@endif
												</div>
											</div>

											<div class="col-lg-10">
												<div class="form-group mb-4">
													<label>Gender</label>
													<select name="gender" class="form-control">
														<option @selected(old('gender',$users->gender)==1) value="1" selected>Male</option>
														<option @selected(old('gender',$users->gender)==0) value="0">Female</option>
														<option @selected(old('gender',$users->gender)==2) value="2">Not Intressted</option>
													</select>
													@if ($errors->has('gender'))
														<div style="color: red;">{{ $errors->first('gender') }}</div>
													@endif
												</div>
											</div>

											<div class="col-lg-10">
												<div class="form-group mb-4">
													<label>Status</label>
													<select name="status" class="form-control">
														<option  @selected(old('status',$users->status)==1) value="1" >Active</option>
														<option  @selected(old('status',$users->status)==0) value="0">inActive</option>
													</select>
													@if ($errors->has('status'))
														<div style="color: red;">{{ $errors->first('status') }}</div>
													@endif
												</div>
											</div>

										<div class="col-md-12">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</div>
								</div>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- End Content -->
</div> 

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
