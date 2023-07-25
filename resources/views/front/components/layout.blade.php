<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>W World</title>
    <meta name="description" content="Find all the latest wedding accessories at our online boutique store. Shop for wedding dresses, veils, shoes, and more.">
    <meta name="keywords" content="wedding, boutique, online store, accessories, dresses, veils, shoes">

    <meta property="og:title" content="<?php echo $title ?? "W World" ?>"/>
    <meta property="og:type" content="<?php echo $type ?? "website" ?>"/>
    <meta property="og:url" content="<?php echo $url ?? "https://www.sediq.net" ?>"/>
    @if (isset($image))
        <meta property="og:image" content="{{ asset($image) }}"/>
    @else
        <meta property="og:image" content="{{ asset("front/assets/images/product-image/product.jpg") }}"/>
    @endif
    <meta property="og:description" content="<?php echo $description ?? "Find all the latest wedding accessories at our online boutique store. Shop for wedding dresses, veils, shoes, and more." ?>"/>
    <meta property="og:site_name" content="<?php echo $site_name ?? "W World" ?>"/>


    <!-- site Favicon -->
    <link rel="icon" href="{{ asset('front/assets/images/favicon/favicon.png') }}" sizes="32x32" />
    <link rel="apple-touch-icon" href="{{ asset('front/assets/images/favicon/favicon.png') }}" />
    <meta name="msapplication-TileImage" content="{{ asset('front/assets/images/favicon/favicon.png') }}" />

    <!-- css Icon Font -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor/ecicons.min.css') }}" />

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/jquery-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/countdownTimer.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/slick.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/assets/css/plugins/bootstrap.css') }}" />

    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/demo1.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/assets/css/responsive.css') }}" />

    {{-- Sweet Alert --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">


    <!-- Background css -->
    <link rel="stylesheet" id="bg-switcher-css" href="{{ asset('front/assets/css/backgrounds/bg-4.css') }}">
    <style>
        .notification {
            position: fixed;
            z-index: 99999;
            bottom: 20px;
            left: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            display: none;
        }
    </style>
    @yield('styles')

</head>

<body>
    <div class="notification">
        <span id="notification-message"></span>
    </div>
    <div id="ec-overlay" style="opacity: 0.7;">
        <div class="ec-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- Header start  -->
    <header class="ec-header">
        <!-- Ec Header Bottom  Start -->
        <div class="ec-header-bottom d-none d-lg-block">
            <div class="container position-relative">
                <div class="row">
                    <div class="ec-flex">
                        <!-- Ec Header Logo Start -->
                        <div class="align-self-center">
                            <div class="header-logo">
                                <a href="{{ route('front.index') }}"><img src="{{ asset('front/assets/images/logo/logo.png') }}" alt="Site Logo" /><img
                                        class="dark-logo" src="{{ asset('front/assets/images/logo/dark-logo.png') }}" alt="Site Logo"
                                        style="display: none;" /></a>
                            </div>
                        </div>
                        <!-- Ec Header Logo End -->

                        <!-- Ec Header Search Start -->
                        <div class="align-self-center">
                            <div class="header-search">
                                <form class="ec-btn-group-form" action="#">
                                    <input class="form-control ec-search-bar" placeholder="Search products..."
                                    type="text" id="searchProduct1">
                                    <button class="submit" type=""><i class="fi-rr-search"></i></button>
                                </form>
                                <div id="search-results1" style="position: absolute; z-index: 99; background-color: white; width: 500px; padding: 20px; box-shadow: black 10px 10px 20px; display:none;"></div>
                            </div>
                        </div>
                        <!-- Ec Header Search End -->

                        <!-- Ec Header Button Start -->
                        <div class="align-self-center">
                            <div class="ec-header-bottons">

                                <!-- Header User Start -->
                                @if (Auth::check())
                            <div class="ec-header-user dropdown">
                                <button class="dropdown-toggle" data-bs-toggle="dropdown"><i
                                        class="fi-rr-user"></i></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a class="dropdown-item" href="{{ route('redirectTo') }}">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{ route('checkout') }}">Checkout</a></li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                this.closest('form').submit(); "
                                                role="button">

                                                {{ __('Log Out') }}
                                            </a>
                                        </li>
                                    </form>
                                </ul>
                            </div>
                            @else
                            <div class="ec-header-user dropdown">
                                <button class="dropdown-toggle" data-bs-toggle="dropdown"><i
                                        class="fi-rr-user"></i></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a class="dropdown-item" href="{{ route("register") }}">Register</a></li>
                                    <li><a class="dropdown-item" href="{{ route("login") }}">Login</a></li>
                                </ul>
                            </div>
                            @endif
                                <!-- Header User End -->
                                <!-- Header wishlist Start -->
                                <a href="{{ route("front.wishlist") }}" class="ec-header-btn ec-header-wishlist">
                                    <div class="header-icon"><i class="fi-rr-heart"></i></div>
                                    <span class="ec-header-count">
                                        @if (auth()->guest())
                                            +
                                        @else
                                            {{ Auth::user()->wishlist->count(); }}
                                        @endif
                                    </span>
                                </a>
                                <!-- Header wishlist End -->
                                <!-- Header Cart Start -->
                                <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                                    <div class="header-icon"><i class="fi-rr-shopping-bag"></i></div>
                                    <span class="ec-header-count cart-count-lable">
                                        @if (auth()->guest())
                                            +
                                        @else
                                            {{ Auth::user()->cartItems->count(); }}
                                        @endif
                                    </span>
                                </a>
                                <!-- Header Cart End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec Header Button End -->

        <!-- Header responsive Bottom  Start -->
        <div class="ec-header-bottom d-lg-none">
            <div class="container position-relative">
                <div class="row ">

                    <!-- Ec Header Logo Start -->
                    <div class="col">
                        <div class="header-logo">
                            <a href="{{ route('front.index') }}"><img src="{{ asset('front/assets/images/logo/logo.png') }}" alt="Site Logo" /><img
                                    class="dark-logo" src="{{ asset('front/assets/images/logo/dark-logo.png') }}" alt="Site Logo"
                                    style="display: none;" /></a>
                        </div>
                    </div>
                    <!-- Ec Header Logo End -->
                    <!-- Ec Header Search Start -->
                    <div class="col">
                        <div class="header-search">
                            <form class="ec-btn-group-form" action="#">
                                <input class="form-control ec-search-bar" placeholder="Search products..." type="text" id="searchProduct2">
                                <button class="submit" type=""><i class="fi-rr-search"></i></button>
                            </form>
                            <div id="search-results2" style="position: absolute; z-index: 99; background-color: white; width: 300px; padding: 20px; box-shadow: black 10px 10px 20px; display:none;"></div>
                        </div>
                    </div>
                    <!-- Ec Header Search End -->
                </div>
            </div>
        </div>
        <!-- Header responsive Bottom  End -->

        <!-- EC Main Menu Start -->
        <div id="ec-main-menu-desk" class="d-none d-lg-block sticky-nav">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-md-12 align-self-center">
                        <div class="ec-main-menu">
                            <a href="javascript:void(0)" class="ec-header-btn ec-sidebar-toggle">
                                <i class="fi fi-rr-apps"></i>
                            </a>
                            <ul>
                                <li><a href="{{ route('front.index') }}">Home</a></li>
                                <li class="dropdown position-static"><a href="javascript:void(0)">Categories</a>
                                    <ul class="mega-menu d-block">
                                        <li class="d-flex">
                                                @foreach($categories as $category)
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">{{ $category->name }}</a></li>
                                                @if(count($category->subcategories))
                                                @foreach($category->subcategories as $subcategory)
                                                    @if ($subcategory->products->count())
                                                        <li><a href="{{ route('category.products', $subcategory->id) }}">{{ $subcategory->name }}</a></li>
                                                    @endif
                                                @endforeach
                                                @endif
                                            </ul>
                                            @endforeach
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('front.products') }}">Products</a></li>
                                <li><a href="{{ route('front.featureProducts') }}">Features</a></li>
                                <li><a href="{{ route('front.hotOffers') }}">Hot Offers</a></li>
                                <li><a href="{{ route('front.blog') }}">Blog</a></li>
                                <li><a href="{{ route('front.contactUs') }}">Contact Us</a></li>
                                <li><a href="{{ route('front.aboutUs') }}">About Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec Main Menu End -->

        <!-- ekka Mobile Menu Start -->
        <div id="ec-mobile-menu" class="ec-side-cart ec-mobile-menu">
            <div class="ec-menu-title">
                <span class="menu_title">My Menu</span>
                <button class="ec-close">×</button>
            </div>
            <div class="ec-menu-inner">
                <div class="ec-menu-content">
                    <ul>
                        <li><a href="{{ route('front.index') }}">Home</a></li>
                        <li><a href="javascript:void(0)">Categories</a>
                            <ul class="sub-menu">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="javascript:void(0)">{{ $category->name }}</a>
                                        <ul class="sub-menu">
                                            @if(count($category->subcategories))
                                                @foreach($category->subcategories as $subcategory)
                                                    @if ($subcategory->products->count())
                                                        <li><a href="{{ route('category.products', $subcategory->id) }}">{{ $subcategory->name }}</a></li>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                @endforeach
                                <li><a class="p-0" href="shop-left-sidebar-col-3.html"><img class="img-responsive"
                                            src="{{ asset('front/assets/images/menu-banner/1.jpg') }}" alt=""></a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{ route('front.products') }}">Products</a></li>
                        <li><a href="{{ route('front.featureProducts') }}">Features</a></li>
                        <li><a href="{{ route('front.hotOffers') }}">Hot Offers</a></li>
                        <li><a href="{{ route('front.blog') }}">Blog</a></li>
                        <li><a href="{{ route('front.contactUs') }}">Contact Us</a></li>
                        <li><a href="{{ route('front.aboutUs') }}">About Us</a></li>
                    </ul>
                </div>

                <div class="header-res-lan-curr">
                    <!-- Social Start -->
                    <div class="header-res-social">
                        <div class="header-top-social">
                            <ul class="mb-0">
                                <li class="list-inline-item"><a class="hdr-facebook" href="#"><i
                                            class="ecicon eci-facebook"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-twitter" href="#"><i
                                            class="ecicon eci-twitter"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-instagram" href="#"><i
                                            class="ecicon eci-instagram"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-linkedin" href="#"><i
                                            class="ecicon eci-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Social End -->
                </div>
            </div>
        </div>
        <!-- ekka mobile Menu End -->
    </header>
    <!-- Header End  -->

    <!-- ekka Cart Start -->
    <div class="ec-side-cart-overlay"></div>
    <div id="ec-side-cart" class="ec-side-cart">
        <div class="ec-cart-inner">
            @if (auth()->guest())
                <div class="ec-cart-top">
                    <div class="ec-cart-title">
                        <span class="cart_title">My Cart</span>
                        <button class="ec-close">×</button>
                    </div>
                    <ul class="eccart-pro-items">
                        <li>
                            Please <a href="{{ route("login") }}">&nbsp; login &nbsp;</a> to your account.
                        </li>
                    </ul>
                </div>
                <div class="ec-cart-bottom">
                    <div class="cart-sub-total">
                        <table class="table cart-table">
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart_btn">
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-secondary">Signup</a>
                    </div>
                </div>
            @else
                <div class="ec-cart-top">
                    <div class="ec-cart-title">
                        <span class="cart_title">My Cart</span>
                        <button class="ec-close">×</button>
                    </div>

                    @if (Auth::user()->cartItems)
                        @foreach (Auth::user()->cartItems as $item)
                            <ul class="eccart-pro-items" style="margin-bottom: 20px;">
                                <li>
                                    <a href="{{ route('product.details', $item->product->id) }}" class="sidekka_pro_img"><img
                                            src="{{ $item->product->image }}" alt="product"></a>
                                    <div class="ec-pro-content">
                                        <a href="{{ route('product.details', $item->product->id) }}" class="cart_pro_title">{{ $item->product->title }}</a>
                                        @if($item->product->discount > 0)
                                            <span class="cart-price"><del>${{ number_format($item->product->price, 2) }}</del></span>
                                            <span class="cart-price"><span>${{ number_format($item->product->price - ($item->product->price * ($item->product->discount / 100)), 2) }}</span> x {{ $item->quantity }} </span>
                                        @else
                                            <span class="cart-price"><span>${{ number_format($item->product->price, 2) }}</span> x {{ $item->quantity }} </span>
                                        @endif
                                        @if($item->product->discount > 0)
                                            {{ $item->product->discount }} % OFF
                                        @endif
                                        <a href="{{ route('product.details', $item->product->id) }}" class="cart_pro_title">View product</a>
                                        <a class='removeFromCart remove' data-item-id='{{ $item->product->id }}'>×</a>
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                    @else
                        <ul class="eccart-pro-items">
                            <li>
                                <a href="{{ route('front.products') }}">add products</a> to your cart.
                            </li>
                        </ul>
                    @endif
                </div>
                <div class="ec-cart-bottom">
                    <div class="cart-sub-total">
                        <table class="table cart-table">
                            <tbody>
                                <tr>
                                    @php
                                        $totalPrice = 0;
                                    @endphp

                                    @foreach(Auth::user()->cartItems as $cartItem)
                                        @if($cartItem->product->discount > 0)
                                            @php
                                                $price = $cartItem->product->price - ($cartItem->product->price * $cartItem->product->discount / 100);
                                            @endphp
                                        @else
                                            @php
                                                $price = $cartItem->product->price;
                                            @endphp
                                        @endif

                                        @php
                                            $subtotal = $price * $cartItem->quantity;
                                            $totalPrice += $subtotal;
                                        @endphp
                                    @endforeach
                                    <td class="text-left">Total :</td>
                                    <td class="text-right primary-color">${{ number_format($totalPrice, 2); }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart_btn">
                        <a href="cart.html" class="btn btn-primary">View Cart</a>
                        <a href="{{ route('checkout') }}" class="btn btn-secondary">Checkout</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- ekka Cart End -->

    <!-- Category Sidebar start -->
    <div class="ec-side-cat-overlay"></div>
    <div class="col-lg-3 category-sidebar" data-animation="fadeIn">
        <div class="cat-sidebar">
            <div class="cat-sidebar-box">
                <div class="ec-sidebar-wrap">
                    <!-- Sidebar Category Block -->
                    <div class="ec-sidebar-block">
                        <div class="ec-sb-title">
                            <h3 class="ec-sidebar-title">Category<button class="ec-close">×</button></h3>
                        </div>
                        @foreach($categories as $category)
                            <div class="ec-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-block-item"><img src="{{ asset('front/assets/images/icons/dress-8.png') }}"
                                                class="svg_img" alt="drink" />{{ $category->name }}</div>
                                        <ul>
                                            @if(count($category->subcategories))
                                                @foreach($category->subcategories as $subcategory)
                                                    @if ($subcategory->products->count())
                                                        <li>
                                                            <div class="ec-sidebar-sub-item"><a
                                                                    href="{{ route('category.products', $subcategory->id) }}">{{ $subcategory->name }} <span
                                                                        title="Available Stock">- {{ $subcategory->products->count() }}</span></a>
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
            <div class="ec-sidebar-slider-cat">
                <div class="ec-sb-slider-title">Best Sellers</div>
                <div class="ec-sb-pro-sl">

                    @foreach ($recentProducts as $product)
                        <div>
                            <div class="ec-sb-pro-sl-item">
                                <a href="{{ route('product.details', $product->id) }}" class="sidekka_pro_img"><img
                                        src="{{ asset($product->image) }}" alt="{{ $product->tags }}" /></a>
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
                                    <span class="ec-price">
                                        @if($product->discount > 0)
                                            <span class="old-price">{{ $product->price }}</span>
                                            <span class="new-price">{{ $product->price - ($product->price * ($product->discount / 100)) }}</span>
                                        @else
                                            <span class="new-price">{{ $product->price }}</span>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>



    @yield('main')



    <!-- Footer Start -->
    <footer class="ec-footer section-space-mt">
        <div class="footer-container">
            <div class="footer-offer">
                <div class="container">
                    <div class="row">
                        <div class="text-center footer-off-msg">
                            <span>Win a contest! Get this limited-editon</span><a href="{{ route('login') }}">View
                                Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-top section-space-footer-p">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-3 ec-footer-contact">
                            <div class="ec-footer-widget">
                                <div class="ec-footer-logo"><a href="#"><img src="{{ asset('front/assets/images/logo/footer-logo.png') }}"
                                            alt=""><img class="dark-footer-logo" src="{{ asset('front/assets/images/logo/dark-logo.png') }}"
                                            alt="Site Logo" style="display: none;" /></a></div>
                                <h4 class="ec-footer-heading">Contact us</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link">71 Pilgrim Avenue Chevy Chase, east california.</li>
                                        <li class="ec-footer-link"><span>Call Us:</span><a href="tel:+440123456789">+44
                                                0123 456 789</a></li>
                                        <li class="ec-footer-link"><span>Email:</span><a
                                                href="mailto:contact@sediq.net">contact@sediq.net</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-2 ec-footer-info">
                            <div class="ec-footer-widget">
                                <h4 class="ec-footer-heading">Information</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link"><a href="{{ route('front.aboutUs') }}">About us</a></li>
                                        <li class="ec-footer-link"><a href="{{ route('front.faq') }}">FAQ</a></li>
                                        <li class="ec-footer-link"><a href="{{ route('front.blog') }}">Blog</a>
                                        </li>
                                        <li class="ec-footer-link"><a href="{{ route('front.contactUs') }}">Contact us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-2 ec-footer-account">
                            <div class="ec-footer-widget">
                                <h4 class="ec-footer-heading">Account</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link"><a href="user-profile.html">My Account</a></li>
                                        <li class="ec-footer-link"><a href="track-order.html">Order History</a></li>
                                        <li class="ec-footer-link"><a href="{{ route("front.wishlist") }}">Wish List</a></li>
                                        <li class="ec-footer-link"><a href="{{ route("front.hotOffers") }}">Special Offers</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-2 ec-footer-service">
                            <div class="ec-footer-widget">
                                <h4 class="ec-footer-heading">Services</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link"><a href="{{ route('front.discountReturn') }}">Discount Returns</a></li>
                                        <li class="ec-footer-link"><a href="{{ route('front.privacy') }}">Privacy Policy </a>
                                        </li>
                                        <li class="ec-footer-link"><a href="{{ route('front.customer') }}">Customer Service</a>
                                        </li>
                                        <li class="ec-footer-link"><a href="{{ route('front.termsCondition') }}">Term & condition</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-3 ec-footer-news">
                            <div class="ec-footer-widget">
                                <h4 class="ec-footer-heading">Newsletter</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link">Get instant updates about our new products and special promos!</li>
                                    </ul>
                                    <div class="ec-subscribe-form">
                                        <div id="ec-newsletter-form" name="ec-newsletter-form" >
                                            <form id="newsletter-form" name="ec-newsletter-form" method="POST" action="{{ route('newsletter.subscribe') }}">
                                                <div id="ec_news_signup" class="ec-form">
                                                    <input class="ec-email" type="email" required="" id="newsEmail"
                                                        placeholder="Enter your email here..." name="news_email" value="" />
                                                    <button id="ec-news-btn" class="button btn-primary" type="submit">
                                                        <i class="ecicon eci-paper-plane-o" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Footer social Start -->
                        <div class="col text-left footer-bottom-left">
                            <div class="footer-bottom-social">
                                <span class="social-text text-upper">Follow us on:</span>
                                <ul class="mb-0">
                                    <li class="list-inline-item"><a class="hdr-facebook" href="#"><i
                                                class="ecicon eci-facebook"></i></a></li>
                                    <li class="list-inline-item"><a class="hdr-twitter" href="#"><i
                                                class="ecicon eci-twitter"></i></a></li>
                                    <li class="list-inline-item"><a class="hdr-instagram" href="#"><i
                                                class="ecicon eci-instagram"></i></a></li>
                                    <li class="list-inline-item"><a class="hdr-linkedin" href="#"><i
                                                class="ecicon eci-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Footer social End -->
                        <!-- Footer Copyright Start -->
                        <div class="col text-center footer-copy">
                            <div class="footer-bottom-copy ">
                                <div class="ec-copy">Copyright © 2023 <a class="site-name text-upper" href="#">W World<span>.</span></a>. All Rights Reserved</div>
                            </div>
                        </div>
                        <!-- Footer Copyright End -->
                        <!-- Footer payment -->
                        <div class="col footer-bottom-right">
                            <div class="footer-bottom-payment d-flex justify-content-end">
                                <div class="payment-link">
                                    <img src="{{ asset('front/assets/images/icons/payment.png') }}" alt="">
                                </div>

                            </div>
                        </div>
                        <!-- Footer payment -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->



    @yield('modals')

    <!-- Footer navigation panel for responsive display -->
    <div class="ec-nav-toolbar">
        <div class="container">
            <div class="ec-nav-panel">
                <div class="ec-nav-panel-icons">
                    <a href="#ec-mobile-menu" class="navbar-toggler-btn ec-header-btn ec-side-toggle"><i
                            class="fi-rr-menu-burger"></i></a>
                </div>
                <div class="ec-nav-panel-icons">
                    <a href="#ec-side-cart" class="toggle-cart ec-header-btn ec-side-toggle"><i
                            class="fi-rr-shopping-bag"></i><span
                            class="ec-cart-noti ec-header-count cart-count-lable">
                            @if (auth()->guest())
                                +
                            @else
                                {{ Auth::user()->cartItems->count(); }}
                            @endif
                    </span></a>
                </div>
                <div class="ec-nav-panel-icons">
                    <a href="{{ route('front.index') }}" class="ec-header-btn"><i class="fi-rr-home"></i></a>
                </div>
                <div class="ec-nav-panel-icons">
                    <a href="{{ route("front.wishlist") }}" class="ec-header-btn"><i class="fi-rr-heart"></i><span
                            class="ec-cart-noti">
                            @if (auth()->guest())
                                +
                            @else
                                {{ Auth::user()->wishlist->count(); }}
                            @endif
                        </span></a>
                </div>
                <div class="ec-nav-panel-icons">
                    <a href="{{ route("login") }}" class="ec-header-btn"><i class="fi-rr-user"></i></a>
                </div>

            </div>
        </div>
    </div>
    <!-- Footer navigation panel for responsive display end -->

    {{-- <!-- Recent Purchase Popup  -->
    <div class="recent-purchase">
        <img src="{{ asset('front/assets/images/product-image/1.jpg') }}" alt="payment image">
        <div class="detail">
            <p>Someone in new just bought</p>
            <h6>stylish baby shoes</h6>
            <p>10 Minutes ago</p>
        </div>
        <a href="javascript:void(0)" class="icon-btn recent-close">×</a>
    </div>
    <!-- Recent Purchase Popup end --> --}}

    <!-- Cart Floating Button -->
    <div class="ec-cart-float">
        <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
            <div class="header-icon"><i class="fi-rr-shopping-basket"></i>
            </div>
            <span class="ec-cart-count cart-count-lable">+</span>
        </a>
    </div>
    <!-- Cart Floating Button end -->

    <!-- Whatsapp -->
    <div class="ec-style ec-right-bottom">
        <!-- Start Floating Panel Container -->
        <div class="ec-panel">
            <!-- Panel Header -->
            <div class="ec-header">
                <strong>Need Help?</strong>
                <p>Chat with us on WhatsApp</p>
            </div>
            <!-- Panel Content -->
            <div class="ec-body">
                <ul>
                    <!-- Start Single Contact List -->
                    <li>
                        <a class="ec-list" data-number="918866774266"
                            data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                            <div class="d-flex bd-highlight">
                                <!-- Profile Picture -->
                                <div class="ec-img-cont">
                                    <img src="{{ asset('front/assets/images/whatsapp/profile_01.jpg') }}" class="ec-user-img"
                                        alt="Profile image">
                                    <span class="ec-status-icon"></span>
                                </div>
                                <!-- Display Name & Last Seen -->
                                <div class="ec-user-info">
                                    <span>Sahar Darya</span>
                                    <p>Sahar left 7 mins ago</p>
                                </div>
                                <!-- Chat iCon -->
                                <div class="ec-chat-icon">
                                    <i class="fa fa-whatsapp"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <!--/ End Single Contact List -->
                    <!-- Start Single Contact List -->
                    <li>
                        <a class="ec-list" data-number="918866774266"
                            data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                            <div class="d-flex bd-highlight">
                                <!-- Profile Picture -->
                                <div class="ec-img-cont">
                                    <img src="{{ asset('front/assets/images/whatsapp/profile_02.jpg') }}" class="ec-user-img"
                                        alt="Profile image">
                                    <span class="ec-status-icon ec-online"></span>
                                </div>
                                <!-- Display Name & Last Seen -->
                                <div class="ec-user-info">
                                    <span>Yolduz Rafi</span>
                                    <p>Yolduz is online</p>
                                </div>
                                <!-- Chat iCon -->
                                <div class="ec-chat-icon">
                                    <i class="fa fa-whatsapp"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <!--/ End Single Contact List -->
                    <!-- Start Single Contact List -->
                    <li>
                        <a class="ec-list" data-number="918866774266"
                            data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                            <div class="d-flex bd-highlight">
                                <!-- Profile Picture -->
                                <div class="ec-img-cont">
                                    <img src="{{ asset('front/assets/images/whatsapp/profile_03.jpg') }}" class="ec-user-img"
                                        alt="Profile image">
                                    <span class="ec-status-icon ec-offline"></span>
                                </div>
                                <!-- Display Name & Last Seen -->
                                <div class="ec-user-info">
                                    <span>Nargis Hawa</span>
                                    <p>Nargis left 30 mins ago</p>
                                </div>
                                <!-- Chat iCon -->
                                <div class="ec-chat-icon">
                                    <i class="fa fa-whatsapp"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <!--/ End Single Contact List -->
                    <!-- Start Single Contact List -->
                    <li>
                        <a class="ec-list" data-number="918866774266"
                            data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                            <div class="d-flex bd-highlight">
                                <!-- Profile Picture -->
                                <div class="ec-img-cont">
                                    <img src="{{ asset('front/assets/images/whatsapp/profile_04.jpg') }}" class="ec-user-img"
                                        alt="Profile image">
                                    <span class="ec-status-icon ec-offline"></span>
                                </div>
                                <!-- Display Name & Last Seen -->
                                <div class="ec-user-info">
                                    <span>Khadija Mehr</span>
                                    <p>Khadija left 50 mins ago</p>
                                </div>
                                <!-- Chat iCon -->
                                <div class="ec-chat-icon">
                                    <i class="fa fa-whatsapp"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <!--/ End Single Contact List -->
                </ul>
            </div>
        </div>
        <!--/ End Floating Panel Container -->
        <!-- Start Right Floating Button-->
        <div class="ec-right-bottom">
            <div class="ec-box">
                <div class="ec-button rotateBackward">
                    <img class="whatsapp" src="{{ asset('front/assets/images/common/whatsapp.png') }}" alt="whatsapp icon">
                </div>
            </div>
        </div>
        <!--/ End Right Floating Button-->
    </div>
    <!-- Whatsapp end -->









    <!-- Vendor JS -->
    <script src="{{ asset('front/assets/js/vendor/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/modernizr-3.11.2.min.js') }}"></script>

    <!--Plugins JS-->
    <script src="{{ asset('front/assets/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/countdownTimer.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/slick.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/infiniteslidev2.js') }}"></script>
    <script src="{{ asset('front/assets/js/vendor/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('front/assets/js/plugins/jquery.sticky-sidebar.js') }}"></script>
    <!-- Google translate Js -->
    {{-- <script src="{{ asset('front/assets/js/vendor/google-translate.js') }}"></script>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
        }
    </script> --}}
    <!-- Main Js -->
    <script src="{{ asset('front/assets/js/vendor/index.js') }}"></script>
    <script src="{{ asset('front/assets/js/main.js') }}"></script>

    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>


    @yield('scripts')

</body>


<script>
    function showNotification(message) {
        var notification = document.querySelector('.notification');
        var notificationMessage = document.getElementById('notification-message');

        notificationMessage.textContent = message;
        notification.style.display = 'block';

        setTimeout(function() {
            notification.style.display = 'none';
        }, 3000); // Hide the notification after 3 seconds (adjust as needed)
    }


    $(document).ready(function() {
        document.querySelectorAll('.removeFromCart').forEach(button => {
            button.addEventListener('click', function(){
                var product_id =  button.getAttribute('data-item-id');
                $('#ec-overlay').attr('style', 'opacity: 0.7; z-index: 9999;');
                $.ajax({
                    url: '/user/removeFromCart',
                    data: {
                        product_id: product_id
                    },
                    success: function(data) {
                        showNotification(data.message);
                        location.reload();
                    },
                    error: function(error) {
                        console.error(error);
                        location.reload();
                    }
                })
            });
        });

        $('#newsletter-form').submit(function(event) {
            event.preventDefault();
            $('#ec-overlay').attr('style', 'opacity: 0.7; z-index: 9999;');
            var news_email = $("#newsEmail");
            $("#ec-news-btn").attr("disabled", true);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $(this).attr('action'), // form action URL
                type: $(this).attr('method'), // form method
                data: news_email,
                success: function(response) {
                    $('#ec-overlay').attr('style', 'opacity: 0.7; display:none;');
                    Swal.fire("Success!", "You are now subscribed to our newsletter.", "success"); // show success message
                    $('#newsletter-form')[0].reset(); // reset form
                    $("#ec-news-btn").attr("disabled", false);
                },
                error: function(xhr) {
                    $('#ec-overlay').attr('style', 'opacity: 0.7; display:none;');
                    var err = JSON.parse(xhr.responseText)
                    Swal.fire("Error!", err['message'], "error"); // show error message
                    $("#ec-news-btn").attr("disabled", false);
                }
            });
        });

        const selectElement = document.querySelector('#searchProduct1');
        selectElement.addEventListener('input', (event) => {
        var query = $('#searchProduct1').val();
            $.ajax({
            url: '/searchProduct',
            data: {query: query},
            success: function(response) {
                var results = response;
                var dropdown = $('#search-results1');
                dropdown.show();
                dropdown.empty();
                if (results.length > 0) {
                $.each(results, function(index, result) {
                    var link = '<a href="/product/'+result.id+'">'+result.title+'</a>';
                    dropdown.append('<div class="result">'+link+'</div>');
                });
                } else {
                dropdown.append('<div class="no-results">No results found</div>');
                }
                dropdown.show();
            },
            error: function(response) {
                alert(response);
            }
            });
        });

        $(document).click(function() {
            $('#search-results1').hide();
        });
    });
</script>


<script>
    $(document).ready(function() {
        const selectElement = document.querySelector('#searchProduct2');
        selectElement.addEventListener('input', (event) => {
        var query = $('#searchProduct2').val();
            $.ajax({
                url: '/searchProduct',
                data: {query: query},
                success: function(response) {
                    var results = response;
                    var dropdown = $('#search-results2');
                    dropdown.empty();
                    dropdown.show();
                    if (results.length > 0) {
                    $.each(results, function(index, result) {
                        var link = '<a href="/product/'+result.id+'">'+result.title+'</a>';
                        dropdown.append('<div class="result">'+link+'</div>');
                    });
                    } else {
                    dropdown.append('<div class="no-results">No results found</div>');
                    }
                    dropdown.show();
                },
                error: function(response) {
                    alert(response);
                }
            });
        });

        $(document).click(function() {
            $('#search-results2').hide();
        });
    });
</script>


</html>
