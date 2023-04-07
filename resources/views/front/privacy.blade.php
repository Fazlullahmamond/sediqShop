@extends('front.components.layout')


@section('main')

    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Policy</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
                                <li class="ec-breadcrumb-item active">Policy</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Start Privacy & Policy page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Privacy & Policy</h2>
                        <h2 class="ec-title">Privacy & Policy</h2>
                        <p class="sub-title mb-3">Welcome to the W World Boutique marketplace</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="ec-common-wrapper">
                        <div class="col-sm-12 ec-cms-block">
                            <div class="ec-cms-block-inner">
                                <h3 class="ec-cms-block-title">Welcome to the W World Boutique marketplace</h3>
                                <p class='mb-3'>We at W World Boutique are committed to protecting your privacy. This Privacy Policy governs our data collection, processing, and usage practices. By using our website, you consent to the data practices described in this policy.</b></b></p>
                            </div>
                        </div>
                        <div class="col-sm-12 ec-cms-block">
                            <div class="ec-cms-block-inner">
                                <h3 class="ec-cms-block-title">Information Collection</h3>
                                <p class='mb-3'>We collect information from you when you register on our website or place an order. When ordering or registering on our website, you may be asked to enter your name, email address, mailing address, phone number, and credit card information. We also automatically receive and record information on our server logs from your browser, including your IP address, cookie information, and the pages you request.</b></b></p>
                            </div>
                        </div>
                        <div class="col-sm-12 ec-cms-block">
                            <div class="ec-cms-block-inner">
                                <h3 class="ec-cms-block-title">Information Usage</h3>
                                <p class='mb-3'>The information we collect from you may be used in the following ways:

                                    To personalize your experience on our website and to allow us to deliver the type of content and product offerings in which you are most interested.
                                    To process transactions. Your information, whether public or private, will not be sold, exchanged, transferred, or given to any other company for any reason whatsoever, without your consent, except for the express purpose of delivering the purchased product or service requested.
                                    To improve our website. We continually strive to improve our website offerings based on the information and feedback we receive from you.
                                    To send periodic emails. The email address you provide for order processing may be used to send you information and updates pertaining to your order, in addition to occasional company news, updates, promotions, and related product or service information.</b></b></p>
                            </div>
                        </div>
                        <div class="col-sm-12 ec-cms-block">
                            <div class="ec-cms-block-inner">
                                <h3 class="ec-cms-block-title">Information Protection</h3>
                                <p class='mb-3'>We implement a variety of security measures to maintain the safety of your personal information when you place an order or enter, submit, or access your personal information. We offer the use of a secure server. All supplied sensitive/credit information is transmitted via Secure Socket Layer (SSL) technology and then encrypted into our Payment gateway provider's database. It will only be accessible by those authorized with special access rights to such systems.</b></b></p>
                            </div>
                        </div>
                        <div class="col-sm-12 ec-cms-block">
                            <div class="ec-cms-block-inner">
                                <h3 class="ec-cms-block-title">Information Disclosure</h3>
                                <p class='mb-3'>We do not sell, trade, or otherwise transfer to outside parties your personally identifiable information. This does not include trusted third parties who assist us in operating our website, conducting our business, or servicing you, as long as those parties agree to keep this information confidential. We may also release your information when we believe release is appropriate to comply with the law, enforce our site policies, or protect ours or others' rights, property, or safety.</b></b></p>
                            </div>
                        </div>
                        <div class="col-sm-12 ec-cms-block">
                            <div class="ec-cms-block-inner">
                                <h3 class="ec-cms-block-title">Changes to Our Privacy Policy</h3>
                                <p class='mb-3'>We may update this Privacy Policy from time to time to reflect changes to our information practices. If we make any material changes, we will notify you by email or by posting a prominent notice on our website.</b></b></p>
                            </div>
                        </div>
                        <div class="col-sm-12 ec-cms-block">
                            <div class="ec-cms-block-inner">
                                <h3 class="ec-cms-block-title">Contact Us</h3>
                                <p class='mb-3'>If you have any questions or concerns about this Privacy Policy, please contact us at <a href="mailto:contact@W Worldboutique.com">contact@W Worldboutique.com</a>.</b></b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Privacy & Policy page -->

@endsection
