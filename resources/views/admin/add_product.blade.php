@php
    $menu = ['dashboard'=> '', 'user'=> 'has-sub', 'category'=> 'has-sub', 'product'=> 'has-sub active', 'order'=> 'has-sub', 'blog'=> 'has-sub', 'review'=> '', 'contact'=> ''];
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
									<h2>Add Product</h2>
								</div>

								<div class="card-body">
									<div class="row ec-vendor-uploads">
										<div class="col-lg-4">
											<div class="ec-vendor-img-upload">
												<div class="ec-vendor-main-img">
													<div class="avatar-upload">
														<div class="avatar-edit">
															<input type='file' id="imageUpload" class="ec-image-upload"
																accept=".png, .jpg, .jpeg" name='image'/>
															<label for="imageUpload"><img
																	src="{{ asset('back/assets/img/icons/edit.svg') }}"
																	class="svg_img header_svg" alt="edit" /></label>
														</div>
														
													</div>
													{{-- <div class="thumb-upload-set colo-md-12">
														<div class="thumb-upload">
															<div class="thumb-edit">
																<input type='file' id="thumbUpload01"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg" />
																<label for="imageUpload"><img
																		src="{{ asset('back/assets/img/icons/edit.svg') }}"
																		class="svg_img header_svg" alt="edit" /></label>
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
																	<img class="image-thumb-preview ec-image-preview"
																		src="{{ asset('back/assets/img/products/vender-upload-thumb-preview.jpg') }}"
																		alt="edit" />
																</div>
															</div>
														</div>
														<div class="thumb-upload">
															<div class="thumb-edit">
																<input type='file' id="thumbUpload02"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg" />
																<label for="imageUpload"><img
																		src="{{ asset('back/assets/img/icons/edit.svg') }}"
																		class="svg_img header_svg" alt="edit" /></label>
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
																	<img class="image-thumb-preview ec-image-preview"
																		src="{{ asset('back/assets/img/products/vender-upload-thumb-preview.jpg') }}"
																		alt="edit" />
																</div>
															</div>
														</div>
														<div class="thumb-upload">
															<div class="thumb-edit">
																<input type='file' id="thumbUpload03"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg" />
																<label for="imageUpload"><img
																		src="{{ asset('back/assets/img/icons/edit.svg') }}"
																		class="svg_img header_svg" alt="edit" /></label>
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
																	<img class="image-thumb-preview ec-image-preview"
																		src="{{ asset('back/assets/img/products/vender-upload-thumb-preview.jpg') }}"
																		alt="edit" />
																</div>
															</div>
														</div>
														<div class="thumb-upload">
															<div class="thumb-edit">
																<input type='file' id="thumbUpload04"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg" />
																<label for="imageUpload"><img
																		src="{{ asset('back/assets/img/icons/edit.svg') }}"
																		class="svg_img header_svg" alt="edit" /></label>
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
																	<img class="image-thumb-preview ec-image-preview"
																		src="{{ asset('back/assets/img/products/vender-upload-thumb-preview.jpg') }}"
																		alt="edit" />
																</div>
															</div>
														</div>
														<div class="thumb-upload">
															<div class="thumb-edit">
																<input type='file' id="thumbUpload05"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg" />
																<label for="imageUpload"><img
																		src="{{ asset('back/assets/img/icons/edit.svg') }}"
																		class="svg_img header_svg" alt="edit" /></label>
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
																	<img class="image-thumb-preview ec-image-preview"
																		src="{{ asset('back/assets/img/products/vender-upload-thumb-preview.jpg') }}"
																		alt="edit" />
																</div>
															</div>
														</div>
														<div class="thumb-upload">
															<div class="thumb-edit">
																<input type='file' id="thumbUpload06"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg" />
																<label for="imageUpload"><img
																		src="{{ asset('back/assets/img/icons/edit.svg') }}"
																		class="svg_img header_svg" alt="edit" /></label>
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
																	<img class="image-thumb-preview ec-image-preview"
																		src="{{ asset('back/assets/img/products/vender-upload-thumb-preview.jpg') }}"
																		alt="edit" />
																</div>
															</div>
														</div>
													</div> --}}
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="ec-vendor-upload-detail">
												<form class="row g-3" action="{{ route("products.store") }}" method="POST" enctype="multipart/form-data">
													@csrf
													<div class="col-md-4">
														<div class="thumb-preview ec-preview">
															<div class="image-thumb-preview">
																<img class="image-thumb-preview ec-image-preview" src="{{ asset('back/assets/img/products/vender-upload-thumb-preview.jpg') }}" width="250" height="200" name="image" alt="edit" />
																@if ($errors->has('image'))
                                                				<div style="color: red;">{{ $errors->first('image') }}</div>
                                            					@endif
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<label for="Productname" class="form-label">Product name</label>
														<input type="text" class="form-control slug-title" id="Productname" name='title' >
														@if ($errors->has('title'))
                                                		<div style="color: red;">{{ $errors->first('title') }}</div>
                                            			@endif
													</div>
													<div class="col-md-4">
														<label class="form-label">Select Categories</label>
														<select name="sub_category_id" id="Categories" class="form-select">
															@foreach ($categories as $categories)
															<option value="{{$categories->id}}">{{$categories->name}}</option>		
															@endforeach
															@if ($errors->has('sub_category_id'))
                                                			<div style="color: red;">{{ $errors->first('sub_category_id') }}</div>
                                            				@endif
														</select>
													</div>
													<div class="col-md-12">
														<label for="slug" class="col-12 col-form-label">Slug</label> 
														<div class="col-12">
															<input id="slug" name="slug" class="form-control here set-slug" type="text" value="">
															@if ($errors->has('slug'))
                                                			<div style="color: red;">{{ $errors->first('slug') }}</div>
                                            				@endif
														</div>
													</div>
													<div class="col-md-12">
														<label class="form-label">Short Description</label>
														<textarea class="form-control" rows="2" name='description'></textarea>
														@if ($errors->has('description'))
                                                		<div style="color: red;">{{ $errors->first('description') }}</div>
                                            			@endif
													</div>


													<div class="col-md-12 mb-25">
														<label class="form-label">Size</label>
														<div class="form-checkbox-box">
															@foreach ($sizes as $size)
															<div class="form-check form-check-inline">
																<input type="checkbox" name="sizes[]" value="{{$size->id}}">
																<label>{{$size->name}}</label>
															</div>
																
															@endforeach
														</div>
													</div>
													<div class="col-md-4">
														<label class="form-label">Price <span>( In USD
																)</span></label>
														<input type="number" class="form-control" id="price1" name='price'>
														@if ($errors->has('price'))
                                                		<div style="color: red;">{{ $errors->first('price') }}</div>
                                            			@endif
													</div>
													<div class="col-md-4">
														<label class="form-label">Quantity</label>
														<input type="number" class="form-control" id="quantity1" name='quantity'>
														@if ($errors->has('quantity'))
                                                		<div style="color: red;">{{ $errors->first('quantity') }}</div>
                                            			@endif
													</div>
													<div class="col-md-4">
														<label class="form-label">Discount</label>
														<input type="number" class="form-control" id="discount" name='discount'>
													</div>
													<div class="col-md-12">
														<label class="form-label">Ful Detail</label>
														<textarea class="form-control" rows="4" name='all_details'></textarea>
														@if ($errors->has('all_details'))
                                                		<div style="color: red;">{{ $errors->first('all_details') }}</div>
                                            			@endif
													</div>
													<div class="col-md-12">
														<label class="form-label">Product Tags <span>( Type and
																make comma to separate tags )</span></label>
														<input type="text" class="form-control" id="group_tag"
															name="tags" value="" placeholder=""
															data-role="tagsinput" />
													</div>

													<div class="col-md-8 mb-25">
														<div class="form-check form-check-inline">
															<input type="checkbox" name="hot_offer" value="1">
															<label>Hot Offer</label>
														</div>
													</div>

													<div class="col-md-8 mb-25">
														<div class="form-check form-check-inline">
															<input type="checkbox" name="feature" value="1">
															<label>Feature</label>
														</div>
													</div>

													<div class="col-md-12">
														<button type="submit" class="btn btn-primary">Submit</button>
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
			</div> <!-- End Content Wrapper -->

@endsection
