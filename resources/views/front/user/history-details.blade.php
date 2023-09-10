@extends('front.components.layout')

@section('main')
<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">History Details</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
                            <li class="ec-breadcrumb-item active">History Details</li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
    <div class="container">
        <div class="row">

            @include('front.user.sidebar.sidebar')
            
            <div class="ec-shop-rightside col-lg-9 col-md-12">
                <div class="ec-vendor-dashboard-card">
                    <div class="ec-vendor-card-header">
                        <h5>Product History</h5>
                        <div class="ec-header-btn">
                            <a class="btn btn-lg btn-primary" href="{{ route('front.products') }}">Shop Now</a>
                        </div>
                    </div>
                    <div class="ec-vendor-card-body">
                        <div class="ec-vendor-card-table">
                            <table class="table ec-table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Product Image</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($order_details as $order)
                                            
                                        <th scope="row"><span>{{ $loop->index+1 }}</span></th>
                                            <td><img class="prod-img" src="{{ asset($order->product->image) }}"
                                                alt="product image"></td>
                                            <td><span><a href="{{ route('product.details', $order->product->id) }}">{{ $order->product->title }}</a></span></td>
                                            <td><span>{{ $order->quantity }}</span></td>
                                            <td><span>{{ $order->price }}</span></td>
                                        </tr>

                                        @endforeach
                                </tbody>
                            </table>
                            {{ $order_details->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('scripts')
    <!-- Datatables -->
	<script src="{{ asset('back/assets/plugins/data-tables/jquery.datatables.min.js') }}"></script>
	<script src="{{ asset('back/assets/plugins/data-tables/datatables.bootstrap5.min.js') }}"></script>
	<script src="{{ asset('back/assets/plugins/data-tables/datatables.responsive.min.js') }}"></script>
@endsection