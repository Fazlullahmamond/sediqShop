<?php
    $title = "Hot Offer Products";
    $type = "website";
    $url = "https://www.sediq.net/feature-products";
    $image = "front/assets/images/product-image/product.jpg";
    $description = "Discover our handpicked collection of Hot Offer products at W World! We curate a selection of high-quality items that are not only stylish but also reflect the latest trends in fashion. From trendy clothing pieces to fashionable accessories, our Hot Offer products showcase the best of what we have to offer. Whether you're looking for a statement piece to elevate your wardrobe or seeking everyday essentials with a touch of flair, our Hot Offer products are designed to inspire and delight. With a focus on quality, affordability, and exceptional style, our Hot Offer products are sure to enhance your shopping experience at W World. Explore our collection and find your next favorite piece today!";
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
                            <h2 class="ec-bg-title">Hot Offer products</h2>
                            <h2 class="ec-title">Hot Offer products</h2>
                            <p class="sub-title" style="text-align: justify">Discover our handpicked collection of Hot Offer products at W World! We curate a selection of high-quality items that are not only stylish but also reflect the latest trends in fashion. From trendy clothing pieces to fashionable accessories, our Hot Offer products showcase the best of what we have to offer. Whether you're looking for a statement piece to elevate your wardrobe or seeking everyday essentials with a touch of flair, our Hot Offer products are designed to inspire and delight. With a focus on quality, affordability, and exceptional style, our Hot Offer products are sure to enhance your shopping experience at W World. Explore our collection and find your next favorite piece today!</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($products as $product)
                        
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
            </div>
        </section>
        <!-- End Offer section -->
@endsection