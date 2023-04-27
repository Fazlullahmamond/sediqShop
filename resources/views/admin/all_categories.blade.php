@php
    $menu = ['dashboard'=> '', 'user'=> 'has-sub', 'category'=> 'has-sub active', 'product'=> 'has-sub', 'order'=> 'has-sub', 'blog'=> 'has-sub', 'review'=> '', 'contact'=> ''];
@endphp

@extends('admin.components.layout')



@section('main')

			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
							<h1>Main Categories</h1>
							<p class="breadcrumbs"><span><a href="{{ route("admin.dashboard") }}">Dashboard</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Main Categories</p>
					</div>
					<div class="row">
						<div class="col-xl-4 col-lg-12">
							<div class="ec-cat-list card card-default mb-24px">
								<div class="card-body">
									<div class="ec-cat-form">
										<h4>Add New Category</h4>

										<form>

											<div class="form-group row">
												<label for="text" class="col-12 col-form-label">Name</label> 
												<div class="col-12">
													<input id="text" name="text" class="form-control here slug-title" type="text">
												</div>
											</div>

											<div class="form-group row">
												<label for="slug" class="col-12 col-form-label">Slug</label> 
												<div class="col-12">
													<input id="slug" name="slug" class="form-control here set-slug" type="text">
													<small>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</small>
												</div>
											</div>

											<div class="form-group row">
												<label class="col-12 col-form-label">Sort Description</label> 
												<div class="col-12">
													<textarea id="sortdescription" name="sortdescription" cols="40" rows="2" class="form-control"></textarea>
												</div>
											</div> 

											<div class="form-group row">
												<label class="col-12 col-form-label">Full Description</label> 
												<div class="col-12">
													<textarea id="fulldescription" name="fulldescription" cols="40" rows="4" class="form-control"></textarea>
												</div>
											</div> 

											<div class="form-group row">
												<label class="col-12 col-form-label">Product Tags <span>( Type and
														make comma to separate tags )</span></label>
												<div class="col-12">
													<input type="text" class="form-control" id="group_tag" name="group_tag" value="" placeholder="" data-role="tagsinput">
												</div>
											</div>

											<div class="row">
												<div class="col-12">
													<button name="submit" type="submit" class="btn btn-primary">Submit</button>
												</div>
											</div>

										</form>

									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-8 col-lg-12">
							<div class="ec-cat-list card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="responsive-data-table" class="table">
											<thead>
												<tr>
													<th>Thumb</th>
													<th>Name</th>
													<th>Sub Categories</th>
													<th>Product</th>
													<th>Total Sell</th>
													<th>Status</th>
													<th>Trending</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td><img class="cat-thumb" src="{{ asset('back/assets/img/category/clothes.png') }}" alt="Product Image" /></td>
													<td>Clothes</td>
													<td>
														<span class="ec-sub-cat-list">
														<span class="ec-sub-cat-count" title="Total Sub Categories">5</span>
														<span class="ec-sub-cat-tag">T-shirt</span>
														<span class="ec-sub-cat-tag">Shirt</span>
														<span class="ec-sub-cat-tag">Dress</span>
														<span class="ec-sub-cat-tag">Jeans</span>
														<span class="ec-sub-cat-tag">Top</span>
														</span>
													</td>
													<td>28</td>
													<td>2161</td>
													<td>ACTIVE</td>
													<td><span class="badge badge-success">Top</span></td>
													<td>
														<div class="btn-group">
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
												<tr>
													<td><img class="cat-thumb" src="{{ asset('back/assets/img/category/footwear.png') }}" alt="Product Image" /></td>
													<td>Footwear</td>
													<td>
														<span class="ec-sub-cat-list">
															<span class="ec-sub-cat-count" title="Total Sub Categories">4</span>
															<span class="ec-sub-cat-tag">Sports</span>
															<span class="ec-sub-cat-tag">Casual</span>
															<span class="ec-sub-cat-tag">safety shoes </span>
															<span class="ec-sub-cat-tag">Sandal</span>
														</span>
													</td>
													<td>68</td>
													<td>5161</td>
													<td>ACTIVE</td>
													<td><span class="badge bg-primary">Medium</span></td>
													<td>
														<div class="btn-group">
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
												<tr>
													<td><img class="cat-thumb" src="{{ asset('back/assets/img/category/jewelry.png') }}" alt="Product Image" /></td>
													<td>Jewelry</td>
													<td>
														<span class="ec-sub-cat-list">
															<span class="ec-sub-cat-count" title="Total Sub Categories">4</span>
															<span class="ec-sub-cat-tag">necklace</span>
															<span class="ec-sub-cat-tag">chain</span>
															<span class="ec-sub-cat-tag">rings</span>
															<span class="ec-sub-cat-tag">earings</span>
														</span>
													</td>
													<td>68</td>
													<td>5161</td>
													<td><span class="inactive">Inactive</span></td>
													<td><span class="badge badge-success">Top</span></td>
													<td>
														<div class="btn-group">
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
												<tr>
													<td><img class="cat-thumb" src="{{ asset('back/assets/img/category/perfume.png') }}" alt="Product Image" /></td>
													<td>Perfume</td>
													<td>
														<span class="ec-sub-cat-list">
															<span class="ec-sub-cat-count" title="Total Sub Categories">4</span>
															<span class="ec-sub-cat-tag">Clothes perfume</span>
															<span class="ec-sub-cat-tag">deodorant </span>
															<span class="ec-sub-cat-tag">Flower fragrance </span>
															<span class="ec-sub-cat-tag">Air Freshener</span>
														</span>
													</td>
													<td>38</td>
													<td>1561</td>
													<td>ACTIVE</td>
													<td><span class="badge bg-primary">Medium</span></td>
													<td>
														<div class="btn-group">
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
												<tr>
													<td><img class="cat-thumb" src="{{ asset('back/assets/img/category/cosmetics.png') }}" alt="Product Image" /></td>
													<td>Cosmetics</td>
													<td>
														<span class="ec-sub-cat-list">
															<span class="ec-sub-cat-count" title="Total Sub Categories">10</span>
															<span class="ec-sub-cat-tag">Makeup kit</span>
															<span class="ec-sub-cat-tag">Hair gel</span>
															<span class="ec-sub-cat-tag">sunscreen</span>
															<span class="ec-sub-cat-tag">facewash</span>
															<span class="ec-sub-cat-tag">Body shop</span>
															<span class="ec-sub-cat-tag">Lipstick</span>
															<span class="ec-sub-cat-tag">eye liner</span>
															<span class="ec-sub-cat-tag">Hair Shampoo</span>
															<span class="ec-sub-cat-tag">Beauty Cream</span>
															<span class="ec-sub-cat-tag">Skin Serum</span>
														</span>
													</td>
													<td>18</td>
													<td>1061</td>
													<td>ACTIVE</td>
													<td><span class="badge bg-danger">Low</span></td>
													<td>
														<div class="btn-group">
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
												<tr>
													<td><img class="cat-thumb" src="{{ asset('back/assets/img/category/glasses.png') }}" alt="Product Image" /></td>
													<td>Glasses</td>
													<td>
														<span class="ec-sub-cat-list">
															<span class="ec-sub-cat-count" title="Total Sub Categories">2</span>
															<span class="ec-sub-cat-tag">Sunglasses </span>
															<span class="ec-sub-cat-tag">Lenses </span>
														</span>
													</td>
													<td>82</td>
													<td>10061</td>
													<td><span class="inactive">Inactive</span></td>
													<td><span class="badge bg-primary">Medium</span></td>
													<td>
														<div class="btn-group">
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
												<tr>
													<td><img class="cat-thumb" src="{{ asset('back/assets/img/category/bag.png') }}" alt="Product Image" /></td>
													<td>Bags</td>
													<td>
														<span class="ec-sub-cat-list">
															<span class="ec-sub-cat-count" title="Total Sub Categories">4</span>
															<span class="ec-sub-cat-tag">shopping bag</span>
															<span class="ec-sub-cat-tag">Gym backpack</span>
															<span class="ec-sub-cat-tag">purse </span>
															<span class="ec-sub-cat-tag">wallet </span>
														</span>
													</td>
													<td>18</td>
													<td>3061</td>
													<td>ACTIVE</td>
													<td><span class="badge badge-success">Top</span></td>
													<td>
														<div class="btn-group">
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
												<tr>
													<td><img class="cat-thumb" src="{{ asset('back/assets/img/category/footwear.png') }}" alt="Product Image" /></td>
													<td>Footwear</td>
													<td>
														<span class="ec-sub-cat-list">
															<span class="ec-sub-cat-count" title="Total Sub Categories">4</span>
															<span class="ec-sub-cat-tag">Sports</span>
															<span class="ec-sub-cat-tag">Casual</span>
															<span class="ec-sub-cat-tag">safety shoes </span>
															<span class="ec-sub-cat-tag">Sandal</span>
														</span>
													</td>
													<td>68</td>
													<td>5161</td>
													<td>ACTIVE</td>
													<td><span class="badge bg-primary">Medium</span></td>
													<td>
														<div class="btn-group">
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
												<tr>
													<td><img class="cat-thumb" src="{{ asset('back/assets/img/category/jewelry.png') }}" alt="Product Image" /></td>
													<td>Jewelry</td>
													<td>
														<span class="ec-sub-cat-list">
															<span class="ec-sub-cat-count" title="Total Sub Categories">4</span>
															<span class="ec-sub-cat-tag">necklace</span>
															<span class="ec-sub-cat-tag">chain</span>
															<span class="ec-sub-cat-tag">rings</span>
															<span class="ec-sub-cat-tag">earings</span>
														</span>
													</td>
													<td>68</td>
													<td>5161</td>
													<td><span class="inactive">Inactive</span></td>
													<td><span class="badge badge-success">Top</span></td>
													<td>
														<div class="btn-group">
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
												<tr>
													<td><img class="cat-thumb" src="{{ asset('back/assets/img/category/perfume.png') }}" alt="Product Image" /></td>
													<td>Perfume</td>
													<td>
														<span class="ec-sub-cat-list">
															<span class="ec-sub-cat-count" title="Total Sub Categories">4</span>
															<span class="ec-sub-cat-tag">Clothes perfume</span>
															<span class="ec-sub-cat-tag">deodorant </span>
															<span class="ec-sub-cat-tag">Flower fragrance </span>
															<span class="ec-sub-cat-tag">Air Freshener</span>
														</span>
													</td>
													<td>38</td>
													<td>1561</td>
													<td>ACTIVE</td>
													<td><span class="badge bg-primary">Medium</span></td>
													<td>
														<div class="btn-group">
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