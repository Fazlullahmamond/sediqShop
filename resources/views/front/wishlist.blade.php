<?php
$title = "Wishlist";
$type = "website";
$url = "https://www.sediq.net/wishlist";
$image = "front/assets/images/offer-image/1.jpg";
$description = "Find all the latest wedding accessories at our online boutique store. Shop for wedding dresses, veils, shoes, and more.";
$site_name = "W World";
?>

@extends('front.components.layout')

@section('main')

            <!-- Start Offer section -->
            <section class="labels section-space-p">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="section-title">
                                <h2 class="ec-bg-title">Wishlist products</h2>
                                <h2 class="ec-title">Wishlist products</h2>
                            </div>
                        </div>
                    </div>
                    @if (isset($wishlistItems))
                        <div class="row">
                            @foreach ($wishlistItems as $product)

                                <div class="col-lg-4 col-md-6 col-sm-12 col-12 margin-b-30">
                                    <div class="ec-offer-coupon">
                                        <div class="ec-cpn-brand">
                                            <img class="ec-brand-img" src="{{ $product->image }}" alt="{{ $product->description }}" />
                                        </div>
                                        <div class="ec-cpn-title">
                                            <h2 class="coupon-title">{{ $product->title }}</h2>
                                        </div>
                                        <div class="ec-cpn-desc">
                                            <p class="coupon-text">{{ $product->description }}</p>
                                        </div>
                                        <div class="ec-cpn-code">
                                            <a href="{{ route('product.details', $product->id) }}" class="btn btn-primary">View Product</a>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                            @if ($products->hasPages())
                                <div class="pagination">
                                    {{ $products->links('vendor.pagination.bootstrap-4') }}
                                </div>
                            @endif

                        </div>
                    @endif

                </div>
            </section>
            <!-- End Offer section -->

@endsection
