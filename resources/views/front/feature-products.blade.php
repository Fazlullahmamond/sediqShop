@extends('front.components.layout')

@section('main')
        <!-- Start Offer section -->
        <section class="labels section-space-p">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="section-title">
                            <h2 class="ec-bg-title">Features product</h2>
                            <h2 class="ec-title">Features product</h2>
                            <p class="sub-title">Browse The Collection of Top Categories</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($products as $product)
                        
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12 margin-b-30">
                            <div class="ec-offer-coupon">
                                <div class="ec-cpn-brand">
                                    <img class="ec-brand-img" src="{{ $product->image }}" alt="" />
                                </div>
                                <div class="ec-cpn-title">
                                    <h2 class="coupon-title">{{ $product->title }}</h2>
                                </div>
                                <div class="ec-cpn-desc">
                                    <p class="coupon-text">{{ $product->description }}</p>
                                </div>
                                <div class="ec-cpn-code">
                                    <a href="{{ route('product.details', $product->id) }}" class="btn btn-secondary">Buy Now</a>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </section>
        <!-- End Offer section -->
@endsection