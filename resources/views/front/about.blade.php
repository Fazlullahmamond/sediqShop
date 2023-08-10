<?php
$title = "About Us";
$type = "website";
$url = "https://www.sediq.net/about-us";
$image = "front/assets/images/offer-image/about.png";
$description = "Find all the latest wedding accessories at our online boutique store. Shop for wedding dresses, veils, shoes, and more.";
$site_name = "W World";
?>

@extends('front.components.layout')

@section('main')
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">About Us</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
                                <li class="ec-breadcrumb-item active">About Us</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Ec About Us page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">About Us</h2>
                        <h2 class="ec-title">About Us</h2>
                        <p class="sub-title mb-3">About our business Firm</p>
                    </div>
                </div>
                <div class="ec-common-wrapper">
                    <div class="row">
                        <div class="col-md-6 ec-cms-block ec-abcms-block text-center">
                            <div class="ec-cms-block-inner">
                                <img class="a-img" src="{{ asset('front/assets/images/offer-image/about.png') }} "
                                    alt="about">
                            </div>
                        </div>
                        <div class="col-md-6 ec-cms-block ec-abcms-block text-center">
                            <div class="ec-cms-block-inner">
                                <h3 class="ec-cms-block-title">What is W World?</h3>
                                <p>Welcome to W World, your ultimate destination for trendy fashion and lifestyle products!
                                    We are a leading e-commerce platform dedicated to providing you with a seamless shopping
                                    experience. At W World, we curate a wide range of high-quality clothing, bags, shoes,
                                    and accessories to cater to your unique style and fashion needs.

                                    Our mission is to make your online shopping journey enjoyable, convenient, and
                                    inspiring. With our user-friendly interface, you can effortlessly browse through our
                                    extensive collection, find the perfect items, and make secure purchases with just a few
                                    clicks. We prioritize customer satisfaction and strive to deliver exceptional customer
                                    service at all times.

                                    Discover the latest fashion trends, explore diverse categories, and indulge in the joy
                                    of shopping at W World. Join our community of fashion enthusiasts and let us be your
                                    go-to destination for all your style desires. Experience the world of fashion at your
                                    fingertips with W World.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                            <p>Free shipping on all order or order above $200</p>
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
                            <h2>7 Days Return</h2>
                            <p>Simply return it within 7 days for an exchange</p>
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

    <!-- Ec Instagram Start -->
    <section class="section ec-instagram-section module section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Feed</h2>
                        <h2 class="ec-title">Feed</h2>
                        <p class="sub-title">Share your store with us</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="ec-insta-wrapper">
            <div class="ec-insta-outer">
                <div class="container">
                    <div class="insta-auto">
                        <!-- instagram item -->
                        <div class="ec-insta-item">
                            <div class="ec-insta-inner">
                                <a href="#" target="_blank"><img
                                        src="{{ asset('front/assets/images/instragram-image/1.jpg') }}" alt="insta"></a>
                            </div>
                        </div>
                        <!-- instagram item -->
                        <div class="ec-insta-item">
                            <div class="ec-insta-inner">
                                <a href="#" target="_blank"><img
                                        src="{{ asset('front/assets/images/instragram-image/2.jpg') }}" alt="insta"></a>
                            </div>
                        </div>
                        <!-- instagram item -->
                        <div class="ec-insta-item">
                            <div class="ec-insta-inner">
                                <a href="#" target="_blank"><img
                                        src="{{ asset('front/assets/images/instragram-image/3.jpg') }}" alt="insta"></a>
                            </div>
                        </div>
                        <!-- instagram item -->
                        <div class="ec-insta-item">
                            <div class="ec-insta-inner">
                                <a href="#" target="_blank"><img
                                        src="{{ asset('front/assets/images/instragram-image/4.jpg') }}" alt="insta"></a>
                            </div>
                        </div>
                        <!-- instagram item -->
                        <!-- instagram item -->
                        <div class="ec-insta-item">
                            <div class="ec-insta-inner">
                                <a href="#" target="_blank"><img
                                        src="{{ asset('front/assets/images/instragram-image/5.jpg') }}" alt="insta"></a>
                            </div>
                        </div>
                        <!-- instagram item -->
                        <!-- instagram item -->
                        <div class="ec-insta-item">
                            <div class="ec-insta-inner">
                                <a href="#" target="_blank"><img
                                        src="{{ asset('front/assets/images/instragram-image/6.jpg') }}" alt="insta"></a>
                            </div>
                        </div>
                        <!-- instagram item -->
                        <!-- instagram item -->
                        <div class="ec-insta-item">
                            <div class="ec-insta-inner">
                                <a href="#" target="_blank"><img
                                        src="{{ asset('front/assets/images/instragram-image/7.jpg') }}" alt="insta"></a>
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
