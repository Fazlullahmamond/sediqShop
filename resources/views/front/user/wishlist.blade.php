@extends('front.components.layout')

@section('main')
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Wishlist</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
                                <li class="ec-breadcrumb-item active">Wishlist</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="ec-page-content ec-vendor-uploads ec-user-account wishlist-2 section-space-p">
        <div class="container">
            <div class="row">
           
            @include('front.user.sidebar.sidebar')
                
                <div class="ec-shop-rightside col-lg-9 col-md-12">
                    <div class="ec-vendor-dashboard-card">
                        <div class="ec-vendor-card-header">
                            <h5>
                                Wishlist
                            </h5>
                            <div class="ec-header-btn">
                                <a class="btn btn-lg btn-primary" href="{{ route('front.products') }}">Add to Wishlist</a>
                            </div>
                        </div>
                        <div class="ec-vendor-card-body">
                            <div class="ec-vendor-card-table">
                                @if ($wishlists->count() > 0)
                                    <table class="table ec-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="wish-empt">
                                            @foreach ($wishlists as $wishlist)
                                                <tr class="pro-gl-content">
                                                    <th scope="row"><span>{{ $loop->index + 1 }}</span></th>
                                                    <td><img class="prod-img" src="{{ asset($wishlist->product->image) }}"
                                                            alt="product image"></td>
                                                    <td><span><a href="{{ route('product.details', $wishlist->product->id) }}">{{ $wishlist->product->title }}</a></span>
                                                    </td>
                                                    <td><span>${{ $wishlist->product->price }}</span></td>
                                                    <td><span class="tbl-btn">
                                                            <a class="btn btn-lg btn-primary" href="{{ route('wishlist.addToCart', $wishlist->id) }}"
                                                                title="Add To Cart">
                                                                <i class="fi-rr-shopping-basket"></i>
                                                            </a>
                                                            <a class="btn btn-lg btn-primary ec-com-remove ec-remove-wish"
                                                                href="{{ route('wishlist.remove', $wishlist->id) }}"
                                                                title="Remove From List">×</a></span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                @else
                                    No Items in Wishlist
                                @endif
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
