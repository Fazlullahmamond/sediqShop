<?php
    $title = "Contact Us: contact@sediq.net";
    $type = "website";
    $url = "https://www.sediq.net/contact-us";
    $image = "front/assets/images/logo/contact.png";
    $description = "Whether you have a question about our products, need assistance with an order, or simply want to share your thoughts, our Contact Us page is the gateway to connecting with our knowledgeable and friendly support team. Feel free to reach out to us, and we'll be more than happy to assist you. Your satisfaction is our priority at W World.";
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
                                <h2 class="ec-breadcrumb-title">Contact Us</h2>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <li class="ec-breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
                                    <li class="ec-breadcrumb-item active">Contact Us</li>
                                </ul>
                                <!-- ec-breadcrumb-list end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec breadcrumb end -->

         <!-- Ec Contact Us page -->
        <section class="ec-page-content section-space-p">
            <div class="container">
                <div class="row">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="ec-common-wrapper">
                        <div class="ec-contact-leftside">
                            <div class="ec-contact-container">
                                <div class="ec-contact-form">
                                    <form action="{{ route('front.contactUsStore') }}" method="POST">
                                        @csrf
                                        <span class="ec-contact-wrap">
                                            <label>First Name*</label>
                                            @error('first_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="first_name" placeholder="Enter your first name"  />
                                        </span>
                                        <span class="ec-contact-wrap">
                                            <label>Last Name*</label>
                                            @error('last_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="last_name" placeholder="Enter your last name"  />
                                        </span>
                                        <span class="ec-contact-wrap">
                                            <label>Email*</label>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="email" name="email" placeholder="Enter your email address"  />
                                        </span>
                                        <span class="ec-contact-wrap">
                                            <label>Phone Number*</label>
                                            @error('phone_number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="text" name="phone_number" placeholder="Enter your phone number"  />
                                        </span>
                                        <span class="ec-contact-wrap">
                                            <label>Comments/Questions*</label>
                                            @error('comment')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <textarea name="comment" placeholder="Please leave your comments here.." ></textarea>
                                        </span>
                                        <span class="ec-contact-wrap ec-recaptcha">
                                            <span class="g-recaptcha"
                                                data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S"
                                                data-callback="verifyRecaptchaCallback"
                                                data-expired-callback="expiredRecaptchaCallback"></span>
                                            <input class="form-control d-none" data-recaptcha="true"
                                                data-error="Please complete the Captcha">
                                            <span class="help-block with-errors"></span>
                                        </span>
                                        <span class="ec-contact-wrap ec-contact-btn">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="ec-contact-rightside">
                            <div class="ec_contact_map">
                                <div class="ec_map_canvas">
                                    <iframe id="ec_map_canvas"
                                        src="https://www.google.com/maps/d/u/0/embed?mid=1122CMPdX0IhtF6SyyDVmlrSd7c0&msa=0&hl=en&ie=UTF8&t=m&vpsrc=6&ll=57.93818300000002%2C15.02929700000001&spn=4.667525%2C15.13916&z=6&output=embed"></iframe>
                                    <a href="https://sites.google.com/view/maps-api-v2/mapv2"></a>
                                </div>
                            </div>
                            <div class="ec_contact_info">
                                <h1 class="ec_contact_info_head">Contact us</h1>
                                <ul class="align-items-center">
                                    <li class="ec-contact-item"><i class="ecicon eci-map-marker" aria-hidden="true"></i><span>Address: </span>Klenavägen, Vendelsö Sweden</li>
                                    <li class="ec-contact-item align-items-center"><i class="ecicon eci-phone" aria-hidden="true"></i><span>Call Us: </span><a href="tel:+31634150783">+31634150783</a></li>
                                    <li class="ec-contact-item align-items-center"><i class="ecicon eci-envelope" aria-hidden="true"></i><span>Email: </span><a href="mailto:contact@sediq.net">contact@sediq.net</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection