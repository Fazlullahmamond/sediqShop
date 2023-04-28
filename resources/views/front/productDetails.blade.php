@extends('front.components.layout')

@section('main')
        <!-- Ec breadcrumb start -->
        <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row ec_breadcrumb_inner">
                            <div class="col-md-6 col-sm-12">
                                <h2 class="ec-breadcrumb-title">{{ $product->title }}</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="{{ route("front.index") }}">Home</a></li>
                                    <li class="ec-breadcrumb-item active">Products</li>
                                </ul>
                                <!-- ec-breadcrumb-list end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec breadcrumb end -->

        <!-- Sart Single product -->
        <section class="ec-page-content section-space-p">
            <div class="container">
                <div class="row">
                    <div class="ec-pro-rightside ec-common-rightside col-lg-9 col-md-12">

                        <!-- Single product content Start -->
                        <div class="single-pro-block">
                            <div class="single-pro-inner">
                                <div class="row">
                                    <div class="single-pro-img">
                                        <div class="single-product-scroll">
                                            <div class="single-product-cover">
                                                <div class="single-slide zoom-image-hover">
                                                    <img class="img-responsive" src="{{ $product->image }}"
                                                        alt="">
                                                </div>
                                                <div class="single-slide zoom-image-hover">
                                                    <img class="img-responsive" src="{{ $product->image }}"
                                                        alt="">
                                                </div>
                                                <div class="single-slide zoom-image-hover">
                                                    <img class="img-responsive" src="{{ $product->image }}"
                                                        alt="">
                                                </div>
                                                <div class="single-slide zoom-image-hover">
                                                    <img class="img-responsive" src="{{ $product->image }}"
                                                        alt="">
                                                </div>
                                                <div class="single-slide zoom-image-hover">
                                                    <img class="img-responsive" src="{{ $product->image }}"
                                                        alt="">
                                                </div>
                                            </div>
                                            <div class="single-nav-thumb">
                                                <div class="single-slide">
                                                    <img class="img-responsive" src="{{ $product->image }}"
                                                        alt="">
                                                </div>
                                                <div class="single-slide">
                                                    <img class="img-responsive" src="{{ $product->image }}"
                                                        alt="">
                                                </div>
                                                <div class="single-slide">
                                                    <img class="img-responsive" src="{{ $product->image }}"
                                                        alt="">
                                                </div>
                                                <div class="single-slide">
                                                    <img class="img-responsive" src="{{ $product->image }}"
                                                        alt="">
                                                </div>
                                                <div class="single-slide">
                                                    <img class="img-responsive" src="{{ $product->image }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-pro-desc">
                                        <div class="single-pro-content">
                                            <h5 class="ec-single-title">{{ $product->title }}</h5>
                                            <div class="ec-single-rating-wrap">
                                                <div class="ec-single-rating">
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
                                            </div>
                                            <div class="ec-single-desc">{{ $product->description }}</div>

                                            <div class="ec-single-sales">
                                                <div class="ec-single-sales-inner">
                                                    <div class="ec-single-sales-title">sales accelerators</div>
                                                    <div class="ec-single-sales-visitor">real time <span>{{ mt_rand(1, 100) }}</span> visitor
                                                        right now!</div>
                                                    <div class="ec-single-sales-progress">
                                                        <span class="ec-single-progress-desc">Hurry up!left {{ $product->quantity }} in
                                                            stock</span>
                                                        <span class="ec-single-progressbar"></span>
                                                    </div>
                                                    <div class="ec-single-sales-countdown">
                                                        <div class="ec-single-countdown"><span
                                                                id="ec-single-countdown"></span></div>
                                                        <div class="ec-single-count-desc">Time is Running Out!</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ec-single-price-stoke">
                                                <div class="ec-single-price">
                                                    <span class="ec-single-ps-title">As low as</span>
                                                    @if($product->discount > 0)
                                                        <span class="old-price">{{ $product->price }}</span>
                                                        <span class="new-price">{{ $product->price - ($product->price * ($product->discount / 100)) }}</span>
                                                    @else
                                                        <span class="new-price">{{ $product->price }}</span>
                                                    @endif
                                                </div>
                                                <div class="ec-single-stoke">
                                                    <span class="ec-single-ps-title">IN STOCK</span>
                                                    <span class="ec-single-sku">{{ $product->slug }}</span>
                                                </div>
                                            </div>

                                            <div class="ec-pro-variation">
                                                <div class="ec-pro-variation-inner ec-pro-variation-size">
                                                    <span>SIZE</span>
                                                    <div class="ec-pro-variation-content">
                                                        <ul>
                                                            @foreach ($product->sizes as $size)
                                                                <li class="active"><a href="#" class="ec-opt-sz" data-tooltip="Small">{{ $size->name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ec-single-qty">
                                                <div class="qty-plus-minus">
                                                    <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                                                </div>
                                                <div class="ec-single-cart ">
                                                    <button class="btn btn-primary">Add To Cart</button>
                                                </div>
                                                <div class="ec-single-wishlist">
                                                    <a class="ec-btn-group wishlist" title="Wishlist"><i class="fi-rr-heart"></i></a>
                                                </div>
                                                <div class="ec-single-quickview">
                                                    <a href="#" class="ec-btn-group quickview" data-link-action="quickview"
                                                        title="Quick view" data-bs-toggle="modal"
                                                        data-bs-target="#ec_quickview_modal"><i class="fi-rr-eye"></i></a>
                                                </div>
                                            </div>
                                            <div class="ec-single-social">
                                                <ul class="mb-0">
                                                    <li class="list-inline-item facebook"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(URL::current()) }}"><i
                                                                class="ecicon eci-facebook"></i></a></li>
                                                    <li class="list-inline-item twitter"><a target="_blank" href="https://twitter.com/intent/tweet?url={{ urlencode(URL::current()) }}"><i
                                                                class="ecicon eci-twitter"></i></a></li>
                                                    <li class="list-inline-item instagram"><a target="_blank" href="https://www.instagram.com/?url={{ urlencode(URL::current()) }}"><i
                                                                class="ecicon eci-instagram"></i></a></li>
                                                    <li class="list-inline-item youtube-play"><a target="_blank" href="https://www.youtube.com/?url={{ urlencode(URL::current()) }}" ><i
                                                                class="ecicon eci-youtube-play"></i></a></li>
                                                    <li class="list-inline-item behance"><a target="_blank" href="https://www.behance.net/?url={{ urlencode(URL::current()) }}" ><i
                                                                class="ecicon eci-behance"></i></a></li>
                                                    <li class="list-inline-item whatsapp"><a target="_blank" href="https://wa.me/?text={{ urlencode(URL::current()) }}" ><i
                                                                class="ecicon eci-whatsapp"></i></a></li>
                                                    <li class="list-inline-item plus"><a  href="javascript:void(0);" onclick="navigator.share({url: '{{ urlencode(URL::current()) }}'})"><i
                                                                class="ecicon eci-plus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single product content End -->
                        <!-- Single product tab start -->
                        <div class="ec-single-pro-tab">
                            <div class="ec-single-pro-tab-wrapper">
                                <div class="ec-single-pro-tab-nav">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab"
                                                data-bs-target="#ec-spt-nav-details" role="tablist">Detail</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-review"
                                                role="tablist">Reviews</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content  ec-single-pro-tab-content">
                                    <div id="ec-spt-nav-details" class="tab-pane fade show active">
                                        <div class="ec-single-pro-tab-desc">
                                            {{ $product->full_description }}
                                        </div>
                                    </div>

                                    <div id="ec-spt-nav-review" class="tab-pane fade">
                                        <div class="row">
                                            <div class="ec-t-review-wrapper">
                                                @foreach ($product->productReviews as $review)

                                                    <div class="ec-t-review-item">
                                                        <div class="ec-t-review-avtar">
                                                            <img src="{{ $review->user->image }}" alt="" />
                                                        </div>
                                                        <div class="ec-t-review-content">
                                                            <div class="ec-t-review-top">
                                                                <div class="ec-t-review-name">{{ $review->user->name }}</div>
                                                                <div class="ec-t-review-rating">
                                                                    @for($i = 1; $i <= $review->rating; $i++)
                                                                        <i class="ecicon eci-star fill"></i>
                                                                    @endfor
                                                                </div>
                                                            </div>
                                                            <div class="ec-t-review-bottom">
                                                                <p>{{ $review->description }}</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endforeach

                                            </div>
                                            <div class="ec-ratting-content">
                                                <h3>Add a Review</h3>
                                                <div class="ec-ratting-form">
                                                    <form action="#">
                                                        <div class="ec-ratting-star">
                                                            <span>Your rating:</span>
                                                            <div class="ec-t-review-rating">
                                                                <i class="ecicon eci-star fill"></i>
                                                                <i class="ecicon eci-star fill"></i>
                                                                <i class="ecicon eci-star-o"></i>
                                                                <i class="ecicon eci-star-o"></i>
                                                                <i class="ecicon eci-star-o"></i>
                                                            </div>
                                                        </div>
                                                        <div class="ec-ratting-input">
                                                            <input name="your-name" placeholder="Name" type="text" />
                                                        </div>
                                                        <div class="ec-ratting-input">
                                                            <input name="your-email" placeholder="Email*" type="email"
                                                                required />
                                                        </div>
                                                        <div class="ec-ratting-input form-submit">
                                                            <textarea name="your-commemt"
                                                                placeholder="Enter Your Comment"></textarea>
                                                            <button class="btn btn-primary" type="submit"
                                                                value="Submit">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details description area end -->
                    </div>
                    <!-- Sidebar Area Start -->
                    <div class="ec-pro-leftside ec-common-leftside col-lg-3 col-md-12">
                        <div class="ec-sidebar-wrap">
                            <!-- Sidebar Category Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Category</h3>
                                </div>

                                @foreach ($categories as $category)

                                <div class="ec-sb-block-content">
                                    <ul>
                                        <li>
                                            <div class="ec-sidebar-block-item">{{ $category->name }}</div>
                                            <ul style="display: block;">
                                                @if(count($category->subcategories))
                                                    @foreach($category->subcategories as $subcategory)
                                                        @if ($subcategory->products->count())
                                                            <li>
                                                                <div class="ec-sidebar-sub-item"><a href="{{ route('category.products', $subcategory->id) }}">{{ $subcategory->name }} <span>-{{ $subcategory->products->count() }}</span></a>
                                                                </div>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                                @endforeach

                            </div>
                            <!-- Sidebar Category Block -->
                        </div>
                    </div>
                    <!-- Sidebar Area Start -->
                </div>
            </div>
        </section>
        <!-- End Single product -->

        <!-- Related Product Start -->
        <section class="section ec-releted-product section-space-p">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="section-title">
                            <h2 class="ec-bg-title">Recent products</h2>
                            <h2 class="ec-title">Recent products</h2>
                            <p class="sub-title">Browse The Collection of Top Products</p>
                        </div>
                    </div>
                </div>
                <div class="row margin-minus-b-30">
                    <!-- Related Product Content -->
                    @foreach ($recent_products as $product)

                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                        <div class="ec-product-inner">
                            <div class="ec-pro-image-outer">
                                <div class="ec-pro-image">
                                    <a href="product-left-sidebar.html" class="image">
                                        <img class="main-image"
                                            src="{{ $product->image }}" alt="Product" />
                                        <img class="hover-image"
                                            src="{{ $product->image }}" alt="Product" />
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
                                <h5 class="ec-pro-title"><a href="product-left-sidebar.html">{{ $product->title }}</a></h5>
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

                </div>
            </div>
        </section>
        <!-- Related Product end -->
@endsection
