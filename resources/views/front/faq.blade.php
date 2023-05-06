@extends('front.components.layout')

@section('main')

        <!-- Ec breadcrumb start -->
        <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row ec_breadcrumb_inner">
                            <div class="col-md-6 col-sm-12">
                                <h2 class="ec-breadcrumb-title">FAQ</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
                                    <li class="ec-breadcrumb-item active">Faq</li>
                                </ul>
                                <!-- ec-breadcrumb-list end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec breadcrumb end -->

         <!-- Ec FAQ page -->
        <section class="ec-page-content section-space-p">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="section-title">
                            <h2 class="ec-bg-title">FAQ</h2>
                            <h2 class="ec-title">FAQ</h2>
                            <p class="sub-title mb-3">Customer service management</p>
                        </div>
                    </div>
                    <div class="ec-faq-wrapper">
                        <div class="ec-faq-container">
                            <h2 class="ec-faq-heading">What is ekka services?</h2>
                            <div id="ec-faq">
                                <div class="col-sm-12 ec-faq-block">
                                    <h4 class="ec-faq-title">What is the multi vendor services?</h4>
                                    <div class="ec-faq-content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                            unknown printer took a galley of type and scrambled it to make a type specimen
                                            book. It has survived not only five centuries, but also the leap into electronic
                                            typesetting, remaining essentially unchanged. </p>
                                    </div>
                                </div>
                                <div class="col-sm-12 ec-faq-block">
                                    <h4 class="ec-faq-title">How to buy many products at a time?</h4>
                                    <div class="ec-faq-content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                            unknown printer took a galley of type and scrambled it to make a type specimen
                                            book. It has survived not only five centuries, but also the leap into electronic
                                            typesetting, remaining essentially unchanged. </p>
                                    </div>
                                </div>
                                <div class="col-sm-12 ec-faq-block">
                                    <h4 class="ec-faq-title">Refund policy for customer</h4>
                                    <div class="ec-faq-content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                            unknown printer took a galley of type and scrambled it to make a type specimen
                                            book. It has survived not only five centuries, but also the leap into electronic
                                            typesetting, remaining essentially unchanged. </p>
                                    </div>
                                </div>
                                <div class="col-sm-12 ec-faq-block">
                                    <h4 class="ec-faq-title">Exchange policy for customer</h4>
                                    <div class="ec-faq-content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                            unknown printer took a galley of type and scrambled it to make a type specimen
                                            book. It has survived not only five centuries, but also the leap into electronic
                                            typesetting, remaining essentially unchanged. </p>
                                    </div>
                                </div>
                                <div class="col-sm-12 ec-faq-block">
                                    <h4 class="ec-faq-title">Give a way products available</h4>
                                    <div class="ec-faq-content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                            unknown printer took a galley of type and scrambled it to make a type specimen
                                            book. It has survived not only five centuries, but also the leap into electronic
                                            typesetting, remaining essentially unchanged. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection