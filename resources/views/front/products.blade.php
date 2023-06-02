<?php
    $title = "New Fashion and Stylish Products";
    $type = "website";
    $url = "https://www.sediq.net/products";
    $image = "front/assets/images/product-image/product.jpg";
    $description = "Discover the latest fashion trends, explore diverse categories, and indulge in the joy of shopping at W World. Join our community of fashion enthusiasts and let us be your go-to destination for all your style desires. Experience the world of fashion at your fingertips with W World.";
    $site_name = "W World";
?>

@extends('front.components.layout')

@section('main')
    <!-- Related Product Start -->
    <section class="section ec-releted-product section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">All our products</h2>
                        <h2 class="ec-title">All our products</h2>
                        <p class="sub-title" style="text-align: justify;">Discover the latest fashion trends, explore diverse categories, and indulge in the joy of shopping at W World. Join our community of fashion enthusiasts and let us be your go-to destination for all your style desires. Experience the world of fashion at your fingertips with W World.</p>
                    </div>
                </div>
            </div>
            <div class="row margin-minus-b-30">
                <!-- Related Product Content -->

                @foreach ($products as $product)

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                    <div class="ec-product-inner">
                        <div class="ec-pro-image-outer">
                            <div class="ec-pro-image">
                                <a href="{{ route('product.details', $product->id) }}" class="image">
                                    <img class="main-image"
                                        src="{{ $product->image }}" alt="{{ $product->tags }}" />
                                    <img class="hover-image"
                                        src="{{ $product->image }}" alt="{{ $product->tags }}" />
                                </a>
                                @if ($product->discount != 0)
                                    <span class="percentage">{{ $product->discount }}%</span>
                                @endif
                                <a href="#" class="quickview" data-link-action="quickview" title="Quick view"
                                    data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><i class="fi-rr-eye"></i></a>
                                <div class="ec-pro-actions">
                                    <a href="compare.html" class="ec-btn-group compare" title="Compare"><i
                                            class="fi fi-rr-arrows-repeat"></i></a>
                                    <button title="Add To Cart" class="add-to-cart"><i
                                            class="fi-rr-shopping-basket"></i> Add To Cart</button>
                                    <a class="ec-btn-group wishlist" title="Wishlist"><i class="fi-rr-heart"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="ec-pro-content">
                            <h5 class="ec-pro-title"><a href="{{ route('product.details', $product->id) }}">{{ $product->title }}</a></h5>
                            <div class="ec-pro-rating">
                                @php
                                    $average_review = $product->productReviews->avg('rating');
                                @endphp
                                @if($average_review > 0)
                                    @for($i = 1; $i <= $average_review; $i++)
                                        <i class="ecicon eci-star fill"></i>
                                    @endfor
                                @else
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                @endif
                            </div>
                            <div class="ec-pro-list-desc">hello.</div>
                            <span class="ec-price">
                                @if($product->discount > 0)
                                    <span class="old-price">{{ $product->price }}</span>
                                    <span class="new-price">{{ $product->price - ($product->price * ($product->discount / 100)) }}</span>
                                @else
                                    <span class="new-price">{{ $product->price }}</span>
                                @endif
                            </span>
                            <div class="ec-pro-option">
                                <div class="ec-pro-size">
                                    <span class="ec-pro-opt-label">Size</span>
                                    <ul class="ec-opt-size">
                                        @foreach ($product->sizes as $size)
                                            <li class="active"><a href="#" class="ec-opt-sz" data-tooltip="Small">{{ $size->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
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
    <!-- Related Product end -->
@endsection

{{-- @section('modals')

    <!-- Modal -->
    <div class="modal fade" id="ec_quickview_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close qty_close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <!-- Swiper -->
                            <div class="qty-product-cover">
                                <div class="qty-slide">
                                    <img class="img-responsive" src="{{ asset('front/assets/images/product-image/3_1.jpg') }}" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="{{ asset('front/assets/images/product-image/3_2.jpg') }}" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="{{ asset('front/assets/images/product-image/3_3.jpg') }}" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="{{ asset('front/assets/images/product-image/3_4.jpg') }}" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="{{ asset('front/assets/images/product-image/3_5.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="qty-nav-thumb">
                                <div class="qty-slide">
                                    <img class="img-responsive" src="{{ asset('front/assets/images/product-image/3_1.jpg') }}" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="{{ asset('front/assets/images/product-image/3_2.jpg') }}" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="{{ asset('front/assets/images/product-image/3_3.jpg') }}" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="{{ asset('front/assets/images/product-image/3_4.jpg') }}" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="{{ asset('front/assets/images/product-image/3_5.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="quickview-pro-content">
                                <h5 class="ec-quick-title"><a href="product-left-sidebar.html">Handbag leather purse for
                                        women</a>
                                </h5>
                                <div class="ec-quickview-rating">
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star"></i>
                                </div>

                                <div class="ec-quickview-desc">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1500s,</div>
                                <div class="ec-quickview-price">
                                    <span class="old-price">$100.00</span>
                                    <span class="new-price">$80.00</span>
                                </div>

                                <div class="ec-pro-variation">
                                    <div class="ec-pro-variation-inner ec-pro-variation-color">
                                        <span>Color</span>
                                        <div class="ec-pro-color">
                                            <ul class="ec-opt-swatch">
                                                <li><span style="background-color:#ebbf60;"></span></li>
                                                <li><span style="background-color:#75e3ff;"></span></li>
                                                <li><span style="background-color:#11f7d8;"></span></li>
                                                <li><span style="background-color:#acff7c;"></span></li>
                                                <li><span style="background-color:#e996fa;"></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="ec-pro-variation-inner ec-pro-variation-size ec-pro-size">
                                        <span>Size</span>
                                        <div class="ec-pro-variation-content">
                                            <ul class="ec-opt-size">
                                                <li class="active"><a href="#" class="ec-opt-sz"
                                                        data-tooltip="Small">S</a></li>
                                                <li><a href="#" class="ec-opt-sz" data-tooltip="Medium">M</a></li>
                                                <li><a href="#" class="ec-opt-sz" data-tooltip="Large">X</a></li>
                                                <li><a href="#" class="ec-opt-sz" data-tooltip="Extra Large">XL</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="ec-quickview-qty">
                                    <div class="qty-plus-minus">
                                        <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                                    </div>
                                    <div class="ec-quickview-cart ">
                                        <button class="btn btn-primary"><i class="fi-rr-shopping-basket"></i> Add To Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
@endsection --}}
