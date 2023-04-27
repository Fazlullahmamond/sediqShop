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
                                <img class="a-img" src="assets/images/offer-image/1.jpg" alt="about">
                                </div>
                            </div>
                            <div class="col-md-6 ec-cms-block ec-abcms-block text-center">
                                <div class="ec-cms-block-inner">
                                    <h3 class="ec-cms-block-title">What is the ekka?</h3>
                                    <p>Electronic typesetting text of the printing and typesetting industry. when an unknown printer took a galley of type
                                        and scrambled it to make a type specimen book. Lorem Ipsum is
                                        simply dutmmy text ever since the 1500s, It has survived not only,
                                        but also the leap into electronic typesetting.</p>
                                    <p>Lorem Ipsum is simply dummy text of the printing. It has survived not only five centuries,
                                        but also the leap into electronic typesetting.</p>
                                    <p>Also the leap into electronic typesetting printing and typesetting industry. It has survived not only five centuries,
                                        but also the leap into electronic typesetting, when an unknown printer took a galley of type
                                        and scrambled it to make a type specimen book. It has survived not only five centuries,
                                        but also the leap into electronic typesetting, remaining essentially unchanged.</p>
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
                            <p class="sub-title mb-3">What say client about us</p>
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
                                            src="assets/images/testimonial/1.jpg" /></div>
                                    <div class="ec-test-content">
                                        <div class="ec-test-desc">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                                            ever since the 1500s, when an unknown printer took a galley of type and
                                            scrambled it to make a type specimen</div>
                                        <div class="ec-test-name">John Doe</div>
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
                            <li class="ec-test-item ">
                                <i class="fi-rr-quote-right top"></i>
                                <div class="ec-test-inner">
                                    <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                            src="assets/images/testimonial/2.jpg" /></div>
                                    <div class="ec-test-content">
                                        <div class="ec-test-desc">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                                            ever since the 1500s, when an unknown printer took a galley of type and
                                            scrambled it to make a type specimen</div>
                                        <div class="ec-test-name">John Doe</div>
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
                                            src="assets/images/testimonial/3.jpg" /></div>
                                    <div class="ec-test-content">
                                        <div class="ec-test-desc">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                                            ever since the 1500s, when an unknown printer took a galley of type and
                                            scrambled it to make a type specimen</div>
                                        <div class="ec-test-name">John Doe</div>
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

        <!-- Ec Instagram Start -->
        <section class="section ec-instagram-section module section-space-p">
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
                    <div class="container">
                        <div class="insta-auto">
                            <!-- instagram item -->
                            <div class="ec-insta-item">
                                <div class="ec-insta-inner">
                                    <a href="#" target="_blank"><img src="assets/images/instragram-image/1.jpg"
                                            alt="insta"></a>
                                </div>
                            </div>
                            <!-- instagram item -->
                            <div class="ec-insta-item">
                                <div class="ec-insta-inner">
                                    <a href="#" target="_blank"><img src="assets/images/instragram-image/2.jpg"
                                            alt="insta"></a>
                                </div>
                            </div>
                            <!-- instagram item -->
                            <div class="ec-insta-item">
                                <div class="ec-insta-inner">
                                    <a href="#" target="_blank"><img src="assets/images/instragram-image/3.jpg"
                                            alt="insta"></a>
                                </div>
                            </div>
                            <!-- instagram item -->
                            <div class="ec-insta-item">
                                <div class="ec-insta-inner">
                                    <a href="#" target="_blank"><img src="assets/images/instragram-image/4.jpg"
                                            alt="insta"></a>
                                </div>
                            </div>
                            <!-- instagram item -->
                            <!-- instagram item -->
                            <div class="ec-insta-item">
                                <div class="ec-insta-inner">
                                    <a href="#" target="_blank"><img src="assets/images/instragram-image/5.jpg"
                                            alt="insta"></a>
                                </div>
                            </div>
                            <!-- instagram item -->
                            <!-- instagram item -->
                            <div class="ec-insta-item">
                                <div class="ec-insta-inner">
                                    <a href="#" target="_blank"><img src="assets/images/instragram-image/6.jpg"
                                            alt="insta"></a>
                                </div>
                            </div>
                            <!-- instagram item -->
                            <!-- instagram item -->
                            <div class="ec-insta-item">
                                <div class="ec-insta-inner">
                                    <a href="#" target="_blank"><img src="assets/images/instragram-image/7.jpg"
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