@php
    $menu = ['dashboard'=> '', 'user'=> 'has-sub', 'category'=> 'has-sub', 'product'=> 'has-sub', 'order'=> 'has-sub', 'blog'=> 'has-sub active', 'review'=> '', 'contact'=> ''];
@endphp

@extends('admin.components.layout')



@section('main')

    			<!-- CONTENT WRAPPER -->
				<div class="col-lg-12">
					<div class="ec-cat-list card card-default">
						<div class="card-body">
							<div class="table-responsive">
								<table id="responsive-data-table" class="table">
									<thead>
										<tr>
											<th>Thumb</th>
											<th>Title</th>
											<th>Description</th>
											<th>Tags</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
										@foreach ($blogs as $blogs)
										<tr>
											<td><img src="{{ asset($blogs->image_url) }}"
												width="150" height="100" alt=""></td>
											<td>{{$blogs->title}}</td>
											<td>
												{{$blogs->description}}
											</td>
											<td>{{$blogs->tags}}</td>
											<td>
												<div class="btn-group">
													<a type="button" href="{{ route('blog.edit', $blogs->id) }}" class="btn btn-outline-success">Edit</a>
													<form action="{{ route('blog.destroy', $blogs->id) }}" method="POST" class="btn btn-outline-danger">
														@csrf
														@method('DELETE')
														<button type="submit" onclick="return confirm('Are you sure you want to delete')">Delete</button>
													</form>
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
			 <!-- End Content Wrapper -->

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
