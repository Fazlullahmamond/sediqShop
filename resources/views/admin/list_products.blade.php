@php
    $menu = ['dashboard' => '', 'user' => 'has-sub', 'category' => 'has-sub', 'product' => 'has-sub active', 'order' => 'has-sub', 'blog' => 'has-sub', 'review' => '', 'contact' => ''];
@endphp

@extends('admin.components.layout')



@section('main')
    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h1>Product</h1>
                    <p class="breadcrumbs"><span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>List Product
                    </p>
                </div>
                <div>
                    <a href="{{ route('products.create') }}" class="btn btn-primary"> Add Porduct</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="responsive-data-table" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Offer</th>
                                            <th>Purchased</th>
                                            <th>Stock</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($products as $products)
                                            <tr>
                                                <td><img class="tbl-thumb"
                                                        src="{{ asset('back/assets/img/products/p1.jpg') }}"
                                                        alt="Product Image" /></td>
                                                <td>{{ $products->title }}</td>
                                                <td>{{ $products->price }}</td>
                                                <td>{{ $products->hot_offer }}</td>
                                                <td>12</td>
                                                <td>5421</td>
                                                <td>{{ $products->Status }}</td>
                                                <td>{{ $products->created_at }}</td>
                                                <td>

                                                    <div class="btn-group">
                                                        <a type="button" href="products/{{ $products->id }}" class="btn btn-outline-success">Edit</a>
                                                        <form action="{{'products.destroy', $products->id }}" method="POST" class="btn btn-outline-danger">
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
