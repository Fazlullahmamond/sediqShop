@extends('front.components.layout')


@section('main')
    <!-- Main Slider Start -->
    <div class="sticky-header-next-sec ec-main-slider section section-space-pb">
        <div class="ec-slider swiper-container main-slider-nav main-slider-dot">
            <!-- Main slider -->
            <div class="swiper-wrapper">
                <div class="ec-slide-item swiper-slide d-flex ec-slide-1">
                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                                <div class="ec-slide-content slider-animation">
                                    <h1 class="ec-slide-title" style="color: white;">New Fashion Collection</h1>
                                    <h2 class="ec-slide-stitle" style="color: white;">Sale Offer</h2>
                                    <p style="color: white;">Hurry up and buy our new fashion products.</p>
                                    <a href="{{ route('front.products') }}" class="btn btn-lg btn-secondary">Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ec-slide-item swiper-slide d-flex ec-slide-2">
                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                                <div class="ec-slide-content slider-animation">
                                    <h1 class="ec-slide-title" style="color: white;">New Fashion Collection</h1>
                                    <h2 class="ec-slide-stitle" style="color: white;">Sale Offer</h2>
                                    <p style="color: white;">Hurry up and buy our new fashion products.</p>
                                    <a href="{{ route('front.products') }}" class="btn btn-lg btn-secondary">Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination swiper-pagination-white"></div>
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
    <!-- Main Slider End -->

    <!-- Product tab Area Start -->
    <section class="section ec-product-tab section-space-p" id="collection">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Our Top Collection</h2>
                        <h2 class="ec-title">Our Top Collection</h2>
                        <p class="sub-title">Browse The Collection of Top Products</p>
                    </div>
                </div>

                <!-- Tab Start -->
                <div class="col-md-12 text-center">
                    <ul class="ec-pro-tab-nav nav justify-content-center">
                        @foreach ($categories as $category)
                            @if ($category->id == 1)
                                <?php $active = 'active'; ?>
                            @else
                                <?php $active = ''; ?>
                            @endif
                            <li class="nav-item"><a class="nav-link <?php echo $active; ?>" data-bs-toggle="tab"
                                    href="#tab-pro-for-{{ $category->id }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- Tab End -->
            </div>
            <div class="row">
                <div class="col">
                    <div class="tab-content">
                        @foreach ($categories as $category)
                            @if ($category->id == 1)
                                <?php $show = 'show active'; ?>
                            @else
                                <?php $show = ''; ?>
                            @endif
                            <!-- 1st Product tab start -->
                            <div class="tab-pane fade show <?php echo $show; ?>" id="tab-pro-for-{{ $category->id }}">
                                <div class="row">
                                    <!-- Product Content -->
                                    @if (count($category->subcategories))
                                        @foreach ($category->subcategories as $subcategory)
                                            @if ($subcategory->products->count())
                                                @foreach ($subcategory->products as $product)
                                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6  ec-product-content"
                                                        data-animation="fadeIn">
                                                        <div class="ec-product-inner">
                                                            <div class="ec-pro-image-outer">
                                                                <div class="ec-pro-image">
                                                                    <a href="{{ route('product.details', $product->id) }}"
                                                                        class="image">
                                                                        <img class="main-image" src="{{ $product->image }}"
                                                                            alt="{{ $product->tags }}" />
                                                                        <img class="hover-image" src="{{ $product->image }}"
                                                                            alt="{{ $product->tags }}" />
                                                                    </a>
                                                                    @if ($product->discount != 0)
                                                                        <span
                                                                            class="percentage">{{ $product->discount }}%</span>
                                                                    @endif

                                                                    <div class="ec-pro-actions">
                                                                        <button title="Add To Cart" class="add-to-cart"><i
                                                                                class="fi-rr-shopping-basket"></i> Add To
                                                                            Cart</button>
                                                                        <a class="ec-btn-group wishlist" title="Wishlist"><i
                                                                                class="fi-rr-heart"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="ec-pro-content">
                                                                <h5 class="ec-pro-title"><a
                                                                        href="{{ route('product.details', $product->id) }}">{{ $product->title }}</a>
                                                                </h5>
                                                                <div class="ec-pro-rating">
                                                                    @php
                                                                        $average_review = $product->productReviews->avg('rating');
                                                                    @endphp
                                                                    @if ($average_review > 0)
                                                                        @for ($i = 1; $i <= $average_review; $i++)
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
                                                                    @if ($product->discount > 0)
                                                                        <span
                                                                            class="old-price">{{ $product->price }}</span>
                                                                        <span
                                                                            class="new-price">{{ $product->price - $product->price * ($product->discount / 100) }}</span>
                                                                    @else
                                                                        <span
                                                                            class="new-price">{{ $product->price }}</span>
                                                                    @endif
                                                                </span>
                                                                <div class="ec-pro-option">
                                                                    <div class="ec-pro-size">
                                                                        <span class="ec-pro-opt-label">Size</span>
                                                                        <ul class="ec-opt-size">
                                                                            @foreach ($product->sizes as $size)
                                                                                <li class="active"><a href="#"
                                                                                        class="ec-opt-sz"
                                                                                        data-tooltip="Small">{{ $size->name }}</a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif

                                    <div class="col-sm-12 shop-all-btn"><a href="{{ route('front.products') }}">Show all
                                            products</a></div>
                                </div>
                            </div>
                            <!-- ec 1st Product tab end -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ec Product tab Area End -->

    <!-- ec Banner Section Start -->
    <section class="ec-banner section section-space-p">
        <h2 class="d-none">Banner</h2>
        <div class="container">
            <!-- ec Banners Start -->
            <div class="ec-banner-inner">
                <!--ec Banner Start -->
                <div class="ec-banner-block ec-banner-block-2">
                    <div class="row">
                        <div class="banner-block col-lg-6 col-md-12 margin-b-30" data-animation="slideInRight"
                            style="max-height: 400px;">
                            <div class="bnr-overlay">
                                <img src="{{ asset($new_product->image) }}" alt="{{ $new_product->tags }}" />
                                <div class="banner-text">
                                    <span class="ec-banner-stitle">New Arrivals</span>
                                    <span class="ec-banner-title">{{ $new_product->subCategory->Category->name }}<br>
                                        {{ $new_product->title }}</span>
                                    <span class="ec-banner-discount">{{ $new_product->price }} $</span>
                                </div>
                                <div class="banner-content">
                                    <span class="ec-banner-btn"><a
                                            href="{{ route('product.details', $new_product->id) }}">Order Now</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="banner-block col-lg-6 col-md-12" data-animation="slideInLeft"
                            style="max-height: 400px;">
                            <div class="bnr-overlay">
                                <img src="{{ asset($most_viewed->image) }}" alt="{{ $most_viewed->tags }}" />
                                <div class="banner-text">
                                    <span class="ec-banner-stitle">New Trending</span>
                                    <span class="ec-banner-title">{{ $most_viewed->subCategory->Category->name }}<br>
                                        {{ $most_viewed->title }}</span>
                                    <span class="ec-banner-discount">Buy any 3 Items & get <br>20% Discount</span>
                                </div>
                                <div class="banner-content">
                                    <span class="ec-banner-btn"><a
                                            href="{{ route('product.details', $most_viewed->id) }}">Order Now</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ec Banner End -->
                </div>
                <!-- ec Banners End -->
            </div>
        </div>
    </section>
    <!-- ec Banner Section End -->

    <!--  Category Section Start -->
    <section class="section ec-category-section section-space-p" id="categories">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Our Top Collection</h2>
                        <h2 class="ec-title">Top Categories</h2>
                        <p class="sub-title">Browse The Collection of Top Categories</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <!--Category Nav Start -->
                <div class="col-lg-3">
                    <ul class="ec-cat-tab-nav nav">
                        @foreach ($top_subcategories as $subcategory)
                            <li class="cat-item"><a class="cat-link" data-bs-toggle="tab"
                                    href="{{ route('category.products', $subcategory->id) }}">
                                    <div class="cat-icons">
                                        <img class="cat-icon"
                                            src="{{ $subcategory->image ? asset($subcategory->image) : asset('front/assets/images/icons/cat_1.png') }}"
                                            alt="{{ $subcategory->description }}">
                                        <img class="cat-icon-hover"
                                            src="{{ $subcategory->image ? asset($subcategory->image) : asset('front/assets/images/icons/cat_1_1.png') }}"
                                            alt="{{ $subcategory->description }}">
                                    </div>
                                    <div class="cat-desc">
                                        <span>{{ $subcategory->name }}</span><span>{{ $subcategory->products_count }}
                                            Products</span></div>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </div>
                <!-- Category Nav End -->
                <!--Category Tab Start -->
                <div class="col-lg-9">
                    <div class="tab-content">
                        <!-- 1st Category tab end -->
                        <div class="tab-pane fade show active" id="tab-cat-1">
                            <div class="row">
                                <img src="{{ asset('front/assets/images/product-image/product.jpg') }}" alt="" />
                            </div>
                            <span class="panel-overlay">
                                <a href="{{ route('front.products') }}" class="btn btn-primary">View All</a>
                            </span>
                        </div>
                    </div>
                    <!-- Category Tab End -->
                </div>
            </div>
        </div>
    </section>
    <!-- Category Section End -->

    <!--  Feature & Special Section Start -->
    <section class="section ec-fre-spe-section section-space-p" id="offers">
        <div class="container">
            <div class="row">
                <!--  Feature Section Start -->
                <div class="ec-fre-section col-12 margin-b-30" data-animation="slideInRight">
                    <div class="col-md-12 text-left">
                        <div class="section-title">
                            <h2 class="ec-bg-title">Feature Items</h2>
                            <h2 class="ec-title">Feature Items</h2>
                        </div>
                    </div>

                    <div class="ec-fre-products">

                        @foreach ($feature_products as $feature_product)
                            <div class="ec-fs-product">
                                <div class="ec-fs-pro-inner">
                                    <div class="ec-fs-pro-image-outer col-lg-6 col-md-6 col-sm-6">
                                        <div class="ec-fs-pro-image">
                                            <a href="{{ route('product.details', $feature_product->id) }}"
                                                class="image">
                                                <img class="main-image"
                                                    src="{{ $feature_product->image ? asset($feature_product->image) : asset('front/assets/images/product-image/1_1.jpg') }}"
                                                    alt="{{ $feature_product->tags }}" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ec-fs-pro-content col-lg-6 col-md-6 col-sm-6">
                                        <h5 class="ec-fs-pro-title"><a
                                                href="{{ route('product.details', $feature_product->id) }}">
                                                {{ $feature_product->title }} </a> </h5>
                                        <div class="ec-fs-pro-rating">
                                            <div class="ec-single-rating-wrap">
                                                <div class="ec-single-rating">
                                                    @php
                                                        $average_review = $feature_product->productReviews->avg('rating');
                                                    @endphp
                                                    @if ($average_review > 0)
                                                        @for ($i = 1; $i <= $average_review; $i++)
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
                                        </div>
                                        <div class="ec-fs-price">
                                            <div class="ec-single-price">
                                                <span class="ec-single-ps-title">As low as</span>
                                                @if ($feature_product->discount > 0)
                                                    <span class="old-price">{{ $feature_product->price }}</span>
                                                    <span
                                                        class="new-price">{{ $feature_product->price - $feature_product->price * ($feature_product->discount / 100) }}</span>
                                                @else
                                                    <span class="new-price">{{ $feature_product->price }}</span>
                                                @endif
                                                $
                                            </div>
                                        </div>

                                        <div class="countdowntimer"><span id="ec-fs-count-1"></span></div>
                                        <div class="ec-single-desc">{{ $feature_product->description }}</div>
                                        @php
                                            $randomNumber = rand(1, 100);
                                        @endphp
                                        <div class="ec-fs-pro-book">Total Sales: <span>{{ $randomNumber }}</span></div>
                                        <div class="ec-fs-pro-btn">
                                            <a href="#" class="btn btn-lg btn-secondary">Remind Me</a>
                                            <a href="{{ route('product.details', $feature_product->id) }}"
                                                class="btn btn-lg btn-primary">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <!--  Feature Section End -->
            </div>
        </div>
    </section>
    <!-- Feature & Special Section End -->

    <!--  Top Vendor Section Start -->
    {{-- <section class="section section-space-p" id="vendors">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Top Vendor</h2>
                        <h2 class="ec-title">Top Vendor</h2>
                        <p class="sub-title">Browse The Collection of <a href="catalog-multi-vendor.html">All
                                Vendors.</a></p>
                    </div>
                </div>
            </div>
            <div class="row margin-minus-t-15 margin-minus-b-15">
                <div class="col-sm-12 col-md-6 col-lg-3 ec_ven_content" data-animation="zoomIn">
                    <div class="ec-vendor-card">
                        <div class="ec-vendor-detail">
                            <div class="ec-vendor-avtar">
                                <img src="{{ asset('front/assets/images/vendor/2.jpg') }}" alt="vendor img">
                            </div>
                            <div class="ec-vendor-info">
                                <a href="catalog-single-vendor.html" class="name">Marvelus</a>
                                <p class="prod-count">154 Products</p>
                                <div class="ec-pro-rating">
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star"></i>
                                </div>
                                <div class="ec-sale">
                                    <p title="Weekly sales">Sales 954</p>
                                </div>
                            </div>
                        </div>
                        <div class="ec-vendor-prod">
                            <div class="ec-prod-img">
                                <a href="product-left-sidebar.html"><img
                                        src="{{ asset('front/assets/images/product-image/1_1.jpg') }}"
                                        alt="vendor img"></a>
                            </div>
                            <div class="ec-prod-img">
                                <a href="product-left-sidebar.html"><img
                                        src="{{ asset('front/assets/images/product-image/2_1.jpg') }}"
                                        alt="vendor img"></a>
                            </div>
                            <div class="ec-prod-img">
                                <a href="product-left-sidebar.html"><img
                                        src="{{ asset('front/assets/images/product-image/3_1.jpg') }}"
                                        alt="vendor img"></a>
                            </div>
                            <div class="ec-prod-img">
                                <a href="product-left-sidebar.html"><img
                                        src="{{ asset('front/assets/images/product-image/4_1.jpg') }}"
                                        alt="vendor img"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 ec_ven_content" data-animation="zoomIn">
                    <div class="ec-vendor-card">
                        <div class="ec-vendor-detail">
                            <div class="ec-vendor-avtar">
                                <img src="{{ asset('front/assets/images/vendor/3.jpg') }}" alt="vendor img">
                            </div>
                            <div class="ec-vendor-info">
                                <a href="catalog-single-vendor.html" class="name">Oreva Fashion</a>
                                <p class="prod-count">546 Products</p>
                                <div class="ec-pro-rating">
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                </div>
                                <div class="ec-sale">
                                    <p title="Weekly sales">Sales 785</p>
                                </div>
                            </div>
                        </div>
                        <div class="ec-vendor-prod">
                            <div class="ec-prod-img">
                                <a href="product-left-sidebar.html"><img
                                        src="{{ asset('front/assets/images/product-image/5_1.jpg') }}"
                                        alt="vendor img"></a>
                            </div>
                            <div class="ec-prod-img">
                                <a href="product-left-sidebar.html"><img
                                        src="{{ asset('front/assets/images/product-image/6_1.jpg') }}"
                                        alt="vendor img"></a>
                            </div>
                            <div class="ec-prod-img">
                                <a href="product-left-sidebar.html"><img
                                        src="{{ asset('front/assets/images/product-image/7_1.jpg') }}"
                                        alt="vendor img"></a>
                            </div>
                            <div class="ec-prod-img">
                                <a href="product-left-sidebar.html"><img
                                        src="{{ asset('front/assets/images/product-image/8_1.jpg') }}"
                                        alt="vendor img"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 ec_ven_content" data-animation="zoomIn">
                    <div class="ec-vendor-card">
                        <div class="ec-vendor-detail">
                            <div class="ec-vendor-avtar">
                                <img src="{{ asset('front/assets/images/vendor/4.jpg') }}" alt="vendor img">
                            </div>
                            <div class="ec-vendor-info">
                                <a href="catalog-single-vendor.html" class="name">Cenva Art</a>
                                <p class="prod-count">854 Products</p>
                                <div class="ec-pro-rating">
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star"></i>
                                    <i class="ecicon eci-star"></i>
                                </div>
                                <div class="ec-sale">
                                    <p title="Weekly sales">Sales 587</p>
                                </div>
                            </div>
                        </div>
                        <div class="ec-vendor-prod">
                            <div class="ec-prod-img">
                                <a href="product-left-sidebar.html"><img
                                        src="{{ asset('front/assets/images/product-image/9_1.jpg') }}"
                                        alt="vendor img"></a>
                            </div>
                            <div class="ec-prod-img">
                                <a href="product-left-sidebar.html"><img
                                        src="{{ asset('front/assets/images/product-image/10_1.jpg') }}"
                                        alt="vendor img"></a>
                            </div>
                            <div class="ec-prod-img">
                                <a href="product-left-sidebar.html"><img
                                        src="{{ asset('front/assets/images/product-image/11_1.jpg') }}"
                                        alt="vendor img"></a>
                            </div>
                            <div class="ec-prod-img">
                                <a href="product-left-sidebar.html"><img
                                        src="{{ asset('front/assets/images/product-image/12_1.jpg') }}"
                                        alt="vendor img"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 ec_ven_content" data-animation="zoomIn">
                    <div class="ec-vendor-card">
                        <div class="ec-vendor-detail">
                            <div class="ec-vendor-avtar">
                                <img src="{{ asset('front/assets/images/vendor/5.jpg') }}" alt="vendor img">
                            </div>
                            <div class="ec-vendor-info">
                                <a href="catalog-single-vendor.html" class="name">Neon Fashion</a>
                                <p class="prod-count">154 Products</p>
                                <div class="ec-pro-rating">
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                </div>
                                <div class="ec-sale">
                                    <p title="Weekly sales">Sales 354</p>
                                </div>
                            </div>
                        </div>
                        <div class="ec-vendor-prod">
                            <div class="ec-prod-img">
                                <a href="product-left-sidebar.html"><img
                                        src="{{ asset('front/assets/images/product-image/13_1.jpg') }}"
                                        alt="vendor img"></a>
                            </div>
                            <div class="ec-prod-img">
                                <a href="product-left-sidebar.html"><img
                                        src="{{ asset('front/assets/images/product-image/14_1.jpg') }}"
                                        alt="vendor img"></a>
                            </div>
                            <div class="ec-prod-img">
                                <a href="product-left-sidebar.html"><img
                                        src="{{ asset('front/assets/images/product-image/15_1.jpg') }}"
                                        alt="vendor img"></a>
                            </div>
                            <div class="ec-prod-img">
                                <a href="product-left-sidebar.html"><img
                                        src="{{ asset('front/assets/images/product-image/16_1.jpg') }}"
                                        alt="vendor img"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--  Top Vendor Section End -->

    <!--  services Section Start -->
    <section class="section ec-services-section section-space-p" id="services">
        <h2 class="d-none">Services</h2>
        <div class="container">
            <div class="row">
                <div class="ec_ser_content ec_ser_content_1 col-sm-12 col-md-6 col-lg-3" data-animation="zoomIn">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <i class="fi fi-ts-truck-moving"></i>
                        </div>
                        <div class="ec-service-desc">
                            <h2>Free Shipping</h2>
                            <p>Free shipping on all US order or order above $200</p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content ec_ser_content_2 col-sm-12 col-md-6 col-lg-3" data-animation="zoomIn">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <i class="fi fi-ts-hand-holding-seeding"></i>
                        </div>
                        <div class="ec-service-desc">
                            <h2>24X7 Support</h2>
                            <p>Contact us 24 hours a day, 7 days a week</p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content ec_ser_content_3 col-sm-12 col-md-6 col-lg-3" data-animation="zoomIn">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <i class="fi fi-ts-badge-percent"></i>
                        </div>
                        <div class="ec-service-desc">
                            <h2>30 Days Return</h2>
                            <p>Simply return it within 30 days for an exchange</p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content ec_ser_content_4 col-sm-12 col-md-6 col-lg-3" data-animation="zoomIn">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <i class="fi fi-ts-donate"></i>
                        </div>
                        <div class="ec-service-desc">
                            <h2>Payment Secure</h2>
                            <p>Contact us 24 hours a day, 7 days a week</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--services Section End -->

    <!--  offer Section Start -->
    <section class="section ec-offer-section section-space-p section-space-m"
        style="background-image: url({{ asset('front/assets/images/product-image/1.jpg') }});">
        <h2 class="d-none">Offer</h2>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center ec-offer-content">
                    <h2 class="ec-offer-title">Hot Offer Products</h2>
                    <h3 class="ec-offer-stitle" data-animation="slideInDown">Super Offers</h3>
                    <span class="ec-offer-img" data-animation="zoomIn"><img
                            src="{{ asset('front/assets/images/product-image/product.jpg') }}"
                            alt="offer image" /></span>
                    <span class="ec-offer-desc">discover the hot offer products</span>
                    <a class="btn btn-primary" href="{{ route('front.hotOffers') }}" data-animation="zoomIn">View
                        All</a>
                </div>
            </div>
        </div>
    </section>
    <!-- offer Section End -->

    <!-- New Product Start -->
    <section class="section ec-new-product section-space-p" id="arrivals">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">New Arrivals</h2>
                        <h2 class="ec-title">New Arrivals</h2>
                        <p class="sub-title">Browse The Collection of Top Products</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- New Product Content -->
                @foreach ($new_arrivals as $product)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6  ec-product-content" data-animation="fadeIn">
                        <div class="ec-product-inner">
                            <div class="ec-pro-image-outer">
                                <div class="ec-pro-image">
                                    <a href="{{ route('product.details', $product->id) }}" class="image">
                                        <img class="main-image" src="{{ $product->image }}"
                                            alt="{{ $product->tags }}" />
                                        <img class="hover-image" src="{{ $product->image }}"
                                            alt="{{ $product->tags }}" />
                                    </a>
                                    @if ($product->discount != 0)
                                        <span class="percentage">{{ $product->discount }}%</span>
                                    @endif

                                    <div class="ec-pro-actions">
                                        <button title="Add To Cart" class="add-to-cart"><i
                                                class="fi-rr-shopping-basket"></i> Add To Cart</button>
                                        <a class="ec-btn-group wishlist" title="Wishlist"><i class="fi-rr-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="ec-pro-content">
                                <h5 class="ec-pro-title"><a
                                        href="{{ route('product.details', $product->id) }}">{{ $product->title }}</a>
                                </h5>
                                <div class="ec-pro-rating">
                                    @php
                                        $average_review = $product->productReviews->avg('rating');
                                    @endphp
                                    @if ($average_review > 0)
                                        @for ($i = 1; $i <= $average_review; $i++)
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
                                    @if ($product->discount > 0)
                                        <span class="old-price">{{ $product->price }}</span>
                                        <span
                                            class="new-price">{{ $product->price - $product->price * ($product->discount / 100) }}</span>
                                    @else
                                        <span class="new-price">{{ $product->price }}</span>
                                    @endif
                                </span>
                                <div class="ec-pro-option">
                                    <div class="ec-pro-size">
                                        <span class="ec-pro-opt-label">Size</span>
                                        <ul class="ec-opt-size">
                                            @foreach ($product->sizes as $size)
                                                <li class="active"><a href="#" class="ec-opt-sz"
                                                        data-tooltip="Small">{{ $size->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-sm-12 shop-all-btn"><a href="{{ route('front.products') }}">View All Collection</a>
                </div>
            </div>
        </div>
    </section>
    <!-- New Product end -->

    <!-- ec testmonial Start -->
    <section class="section ec-test-section section-space-ptb-100 section-space-m" id="reviews">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title mb-0">
                        <h2 class="ec-bg-title">Testimonial</h2>
                        <h2 class="ec-title">Client Review</h2>
                        <p class="sub-title mb-3">What clients say about us</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="ec-test-outer">
                    <ul id="ec-testimonial-slider">
                        <li class="ec-test-item">
                            <i class="fi-rr-quote-right top"></i>
                            <div class="ec-test-inner">
                                <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                        src="{{ asset('front/assets/images/user/1.png') }}" /></div>
                                <div class="ec-test-content">
                                    <div class="ec-test-desc">I absolutely love shopping at W World! The variety of products they offer is amazing. Whether I need a stylish outfit for a special occasion or trendy accessories to complete my look, I always find exactly what I'm looking for. The quality of the products is top-notch, and the customer service is outstanding. W World has become my favorite online shopping destination!</div>
                                    <div class="ec-test-name">Esmat Noori</div>
                                    <div class="ec-test-designation">Software Developer</div>
                                    <div class="ec-test-rating">
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                    </div>
                                </div>
                            </div>
                            <i class="fi-rr-quote-right bottom"></i>
                        </li>
                        <li class="ec-test-item ">
                            <i class="fi-rr-quote-right top"></i>
                            <div class="ec-test-inner">
                                <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                        src="{{ asset('front/assets/images/user/1.png') }}" /></div>
                                <div class="ec-test-content">
                                    <div class="ec-test-desc">W World has exceeded my expectations in terms of both product selection and customer service. The website is easy to navigate, and I appreciate the detailed product descriptions and images that help me make informed purchasing decisions. The delivery is prompt, and the packaging is always secure. I have recommended W World to all my friends and family because of the exceptional shopping experience they provide.</div>
                                    <div class="ec-test-name">Fazlullah Mamond</div>
                                    <div class="ec-test-designation">General Manager</div>
                                    <div class="ec-test-rating">
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                    </div>
                                </div>
                            </div>
                            <i class="fi-rr-quote-right bottom"></i>
                        </li>
                        <li class="ec-test-item">
                            <i class="fi-rr-quote-right top"></i>
                            <div class="ec-test-inner">
                                <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                        src="{{ asset('front/assets/images/user/1.png') }}" /></div>
                                <div class="ec-test-content">
                                    <div class="ec-test-desc">I love shopping on W World! They have a wide variety of products to choose from, and I always find something new and exciting. The prices are very reasonable, and the quality of the products is consistently high. Shipping is fast and reliable, and I appreciate the tracking information provided. I have recommended W World to all of my friends and family, and I will continue to shop here for all of my online shopping needs</div>
                                    <div class="ec-test-name">Sediq</div>
                                    <div class="ec-test-designation">Business Manager</div>
                                    <div class="ec-test-rating">
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                    </div>
                                </div>
                            </div>
                            <i class="fi-rr-quote-right bottom"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ec testmonial end -->

    <!-- Ec Brand Section Start -->
    <section class="section ec-brand-area section-space-p">
        <h2 class="d-none">Brand</h2>
        <div class="container">
            <div class="row">
                <div class="ec-brand-outer">
                    <ul id="ec-brand-slider">
                        <li class="ec-brand-item" data-animation="zoomIn">
                            <div class="ec-brand-img"><a href="#"><img alt="brand" title="brand"
                                        src="{{ asset('front/assets/images/brand-image/1.png') }}" /></a></div>
                        </li>
                        <li class="ec-brand-item" data-animation="zoomIn">
                            <div class="ec-brand-img"><a href="#"><img alt="brand" title="brand"
                                        src="{{ asset('front/assets/images/brand-image/2.png') }}" /></a></div>
                        </li>
                        <li class="ec-brand-item" data-animation="zoomIn">
                            <div class="ec-brand-img"><a href="#"><img alt="brand" title="brand"
                                        src="{{ asset('front/assets/images/brand-image/3.png') }}" /></a></div>
                        </li>
                        <li class="ec-brand-item" data-animation="zoomIn">
                            <div class="ec-brand-img"><a href="#"><img alt="brand" title="brand"
                                        src="{{ asset('front/assets/images/brand-image/4.png') }}" /></a></div>
                        </li>
                        <li class="ec-brand-item" data-animation="zoomIn">
                            <div class="ec-brand-img"><a href="#"><img alt="brand" title="brand"
                                        src="{{ asset('front/assets/images/brand-image/5.png') }}" /></a></div>
                        </li>
                        <li class="ec-brand-item" data-animation="zoomIn">
                            <div class="ec-brand-img"><a href="#"><img alt="brand" title="brand"
                                        src="{{ asset('front/assets/images/brand-image/6.png') }}" /></a></div>
                        </li>
                        <li class="ec-brand-item" data-animation="zoomIn">
                            <div class="ec-brand-img"><a href="#"><img alt="brand" title="brand"
                                        src="{{ asset('front/assets/images/brand-image/7.png') }}" /></a></div>
                        </li>
                        <li class="ec-brand-item" data-animation="zoomIn">
                            <div class="ec-brand-img"><a href="#"><img alt="brand" title="brand"
                                        src="{{ asset('front/assets/images/brand-image/8.png') }}" /></a></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Ec Brand Section End -->

    <!-- Ec Instagram Start -->
    <section class="section ec-instagram-section module section-space-p" id="insta">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Instagram Feed</h2>
                        <h2 class="ec-title">Instagram Feed</h2>
                        <p class="sub-title">Share your store with us</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="ec-insta-wrapper">
            <div class="ec-insta-outer">
                <div class="container" data-animation="fadeIn">
                    <div class="insta-auto">
                        <!-- instagram item -->
                        <div class="ec-insta-item">
                            <div class="ec-insta-inner">
                                <a href="#" target="_blank"><img
                                        src="{{ asset('front/assets/images/instragram-image/1.jpg') }}"
                                        alt="insta"></a>
                            </div>
                        </div>
                        <!-- instagram item -->
                        <div class="ec-insta-item">
                            <div class="ec-insta-inner">
                                <a href="#" target="_blank"><img
                                        src="{{ asset('front/assets/images/instragram-image/2.jpg') }}"
                                        alt="insta"></a>
                            </div>
                        </div>
                        <!-- instagram item -->
                        <div class="ec-insta-item">
                            <div class="ec-insta-inner">
                                <a href="#" target="_blank"><img
                                        src="{{ asset('front/assets/images/instragram-image/3.jpg') }}"
                                        alt="insta"></a>
                            </div>
                        </div>
                        <!-- instagram item -->
                        <div class="ec-insta-item">
                            <div class="ec-insta-inner">
                                <a href="#" target="_blank"><img
                                        src="{{ asset('front/assets/images/instragram-image/4.jpg') }}"
                                        alt="insta"></a>
                            </div>
                        </div>
                        <!-- instagram item -->
                        <!-- instagram item -->
                        <div class="ec-insta-item">
                            <div class="ec-insta-inner">
                                <a href="#" target="_blank"><img
                                        src="{{ asset('front/assets/images/instragram-image/5.jpg') }}"
                                        alt="insta"></a>
                            </div>
                        </div>
                        <!-- instagram item -->
                        <!-- instagram item -->
                        <div class="ec-insta-item">
                            <div class="ec-insta-inner">
                                <a href="#" target="_blank"><img
                                        src="{{ asset('front/assets/images/instragram-image/6.jpg') }}"
                                        alt="insta"></a>
                            </div>
                        </div>
                        <!-- instagram item -->
                        <!-- instagram item -->
                        <div class="ec-insta-item">
                            <div class="ec-insta-inner">
                                <a href="#" target="_blank"><img
                                        src="{{ asset('front/assets/images/instragram-image/7.jpg') }}"
                                        alt="insta"></a>
                            </div>
                        </div>
                        <!-- instagram item -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Ec Instagram End -->
@endsection


@section('modals')
    <!-- Modal -->
    {{-- <div class="modal fade" id="ec_quickview_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close qty_close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <!-- Swiper -->
                            <div class="qty-product-cover">
                                <div class="qty-slide">
                                    <img class="img-responsive"
                                        src="{{ asset('front/assets/images/product-image/3_1.jpg') }}" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive"
                                        src="{{ asset('front/assets/images/product-image/3_2.jpg') }}" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive"
                                        src="{{ asset('front/assets/images/product-image/3_3.jpg') }}" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive"
                                        src="{{ asset('front/assets/images/product-image/3_4.jpg') }}" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive"
                                        src="{{ asset('front/assets/images/product-image/3_5.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="qty-nav-thumb">
                                <div class="qty-slide">
                                    <img class="img-responsive"
                                        src="{{ asset('front/assets/images/product-image/3_1.jpg') }}" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive"
                                        src="{{ asset('front/assets/images/product-image/3_2.jpg') }}" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive"
                                        src="{{ asset('front/assets/images/product-image/3_3.jpg') }}" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive"
                                        src="{{ asset('front/assets/images/product-image/3_4.jpg') }}" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive"
                                        src="{{ asset('front/assets/images/product-image/3_5.jpg') }}" alt="">
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
                                                <li><a href="#" class="ec-opt-sz" data-tooltip="Medium">M</a>
                                                </li>
                                                <li><a href="#" class="ec-opt-sz" data-tooltip="Large">X</a>
                                                </li>
                                                <li><a href="#" class="ec-opt-sz" data-tooltip="Extra Large">XL</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="ec-quickview-qty">
                                    <div class="qty-plus-minus">
                                        <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                                    </div>
                                    <div class="ec-quickview-cart ">
                                        <button class="btn btn-primary"><i class="fi-rr-shopping-basket"></i> Add To
                                            Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Modal end -->

    @if (auth()->guest())
        <!-- Newsletter Modal Start -->
        <div id="ec-popnews-bg"></div>
        <div id="ec-popnews-box">
            <div id="ec-popnews-close"><i class="ecicon eci-close"></i></div>
            <div class="row">
                <div class="col-md-6 disp-no-767">
                    <img src="{{ asset('front/assets/images/banner/newsletter.png') }}" alt="newsletter">
                </div>
                <div class="col-md-6">
                    <div id="ec-popnews-box-content">
                        <h2>Subscribe Newsletter</h2>
                        <p>Subscribe the ekka ecommerce to get in touch and get the future update. </p>
                        <form id="ec-popnews-form" action="#" method="post">
                            <input type="email" name="newsemail" placeholder="Email Address" required />
                            <button type="button" class="btn btn-primary" name="subscribe">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter Modal end -->
    @endif
@endsection
