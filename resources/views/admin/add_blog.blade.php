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
							<h1>Add Product</h1>
							<p class="breadcrumbs"><span><a href="{{ route("admin.dashboard") }}">Dashboard</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Add Product</p>
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
									<h2>Add blog</h2>
								</div>

								<div class="card-body">
									<div class="row ec-vendor-uploads">
										<form class="row g-3" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
										@csrf
										<div class="col-lg-4">
											<div class="ec-vendor-img-upload">
												<div class="ec-vendor-main-img">
													<div class="avatar-upload">
														<div class="avatar-edit">
															<input type='file' id="imageUpload" name='image' class="ec-image-upload"
																accept=".png, .jpg, .jpeg" />
															<label for="imageUpload"><img
																	src="{{ asset('back/assets/img/icons/edit.svg') }}"
																	class="svg_img header_svg" alt="edit" name='image' /></label>
														</div>
														<div class="avatar-preview ec-preview">
															<div class="imagePreview ec-div-preview">
																<img class="ec-image-preview"
																	src="{{ asset('back/assets/img/products/vender-upload-thumb-preview.jpg') }}"
																	  alt="edit"  name='image'/>
															</div>
														</div>
														@if ($errors->has('image'))
														<div style="color: red;">{{ $errors->first('image') }}</div>
														@endif
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-8">
											<div class="ec-vendor-upload-detail">
												
													<div class="col-md-12">
														<label for="Productname" class="form-label mt-4" name='title'>Title</label>
														<input type="text" class="form-control slug-title" id="Productname" name='title' >
														@if ($errors->has('title'))
                                                		<div style="color: red;">{{ $errors->first('title') }}</div>
                                            			@endif
													</div>

													<div class="col-md-12">
														<label class="form-label mt-4">blog Tags <span>( Type and
																make comma to separate tags )</span></label>
														<input type="text" class="form-control" id="group_tag"
															name="tags" value="" placeholder=""
															data-role="tagsinput" />
														@if ($errors->has('tags'))
														<div style="color: red;">{{ $errors->first('tags') }}</div>
														@endif
													</div>
													
													<div class="col-md-12">
														<label class="form-label mt-4" name='description'>Description</label>
														<textarea class="form-control" rows="4" name='description'></textarea>
														@if ($errors->has('description'))
                                                		<div style="color: red;">{{ $errors->first('description') }}</div>
                                            			@endif
													</div>
													


													<div class="col-md-12 mt-3">
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
				</div> <!-- End Content -->
			</div> 
			<!-- End Content Wrapper -->

@endsection
