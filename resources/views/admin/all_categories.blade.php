@php
    $menu = ['dashboard' => '', 'user' => 'has-sub', 'category' => 'has-sub active', 'product' => 'has-sub', 'order' => 'has-sub', 'blog' => 'has-sub', 'review' => '', 'contact' => ''];
@endphp

@extends('admin.components.layout')



@section('main')
    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
                <h1>Main Categories</h1>
                <p class="breadcrumbs"><span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Main Categories
                </p>
            </div>
            @if(Session::has('error'))
                <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('error') }}</p>
            @endif
            <div class="row">
                <div class="col-xl-4 col-lg-12">
                    <div class="ec-cat-list card card-default mb-24px">
                        <div class="card-body">
                            <div class="ec-cat-form">
                                <h4>Add New Category</h4>

                                <form action="categories" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="text" class="col-12 col-form-label">Name</label>
                                        <div class="col-12">
                                            <input id="text" name="name" class="form-control here slug-title" type="text">
                                            @if ($errors->has('name'))
                                                <div style="color: red;">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-12 col-form-label">Short Description</label>
                                        <div class="col-12">
                                            <textarea id="sortdescription" name="description" cols="40" rows="2" class="form-control"></textarea>
                                            @if ($errors->has('description'))
                                                <div style="color: red;">{{ $errors->first('description') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-12 col-form-label">Image</label>
                                        <div class="col-12">
                                            <input type="file" id="Categoryimage" name="image" class="form-control">
                                            @if ($errors->has('image'))
                                                <div style="color: red;">{{ $errors->first('image') }}</div>
                                            @endif
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
                                            <th>description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td><img src="{{ asset($category->image_url) }}"
                                                        width="150" height="100" alt=""></td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    <span class="ec-sub-cat-list">
                                                        <span class="ec-sub-cat-count"
                                                            title="Total Sub Categories">{{ count($category->subcategories) }}</span>
                                                        @foreach ($category->subcategories as $subcategory)
                                                            <span class="ec-sub-cat-tag">{{ $subcategory->name }}</span>
                                                        @endforeach
                                                    </span>
                                                </td>
                                                <td>{{ $category->description }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a type="button" href="categories/{{ $category->id }}"
                                                            class="btn btn-outline-success">Edit</a>

                                                        <form action="{{ route('categories.destroy', $category->id) }}"
                                                            method="POST" class="btn btn-outline-danger">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm('Are you sure you want to delete')">Delete</button>
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
            </div>
        </div> <!-- End Content -->~
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

