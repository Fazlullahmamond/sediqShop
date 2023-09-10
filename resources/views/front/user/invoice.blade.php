@extends('front.components.layout')

@section('main')
<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">User Invoice</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="ec-breadcrumb-item active">Invoice</li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
    <div class="container">
        <div class="row">
            @include('front.user.sidebar.sidebar')
            <div class="ec-shop-rightside col-lg-9 col-md-12">
                <div class="ec-vendor-dashboard-card">
                    <div class="ec-vendor-card-header">
                        <h5>Invoice</h5>
                        <div class="ec-header-btn">
                            <a class="btn btn-lg btn-secondary" href="#">Print</a>
                            <a class="btn btn-lg btn-primary" href="#">Export</a>
                        </div>
                    </div>
                    <div class="ec-vendor-card-body padding-b-0">
                        <div class="page-content">
                            <div class="page-header text-blue-d2">
                                <img src="assets/images/logo/logo.png" alt="Site Logo">
                            </div>

                            <div class="container px-0">
                                <div class="row mt-4">
                                    <div class="col-lg-12">
                                        <hr class="row brc-default-l1 mx-n1 mb-4" />

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="my-2">
                                                    <span class="text-sm text-grey-m2 align-middle">To : </span>
                                                    <span class="text-600 text-110 text-blue align-middle">Alex
                                                        Doe</span>
                                                </div>
                                                <div class="text-grey-m2">
                                                    <div class="my-2">
                                                        123, Mountain View,
                                                    </div>
                                                    <div class="my-2">
                                                        California, US State.
                                                    </div>
                                                    <div class="my-2"><b class="text-600">Phone : </b>1234567890
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.col -->

                                            <div
                                                class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                                <hr class="d-sm-none" />
                                                <div class="text-grey-m2">

                                                    <div class="my-2"><span class="text-600 text-90">ID : </span>
                                                        #111-222</div>

                                                    <div class="my-2"><span class="text-600 text-90">HSN Code :
                                                        </span> #123456</div>
                                                    <div class="my-2"><span class="text-600 text-90">Issue Date :
                                                        </span> Oct 12, 2021-2022</div>

                                                    <div class="my-2"><span class="text-600 text-90">Invoice No :
                                                        </span>6548</div>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>

                                        <div class="mt-4">

                                            <div class="text-95 text-secondary-d3">
                                                <div class="ec-vendor-card-table">
                                                    <table class="table ec-table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">ID</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Qty</th>
                                                                <th scope="col">Price</th>
                                                                <th scope="col">Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th><span>225</span></th>
                                                                <td><span>Women sliveless top</span></td>
                                                                <td><span>2</span></td>
                                                                <td><span>$65</span></td>
                                                                <td><span>$130</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th><span>548</span></th>
                                                                <td><span>Mens cotton fabric shirt</span></td>
                                                                <td><span>3</span></td>
                                                                <td><span>$10</span></td>
                                                                <td><span>$30</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th><span>684</span></th>
                                                                <td><span>Baby clothes pair</span></td>
                                                                <td><span>1</span></td>
                                                                <td><span>$360</span></td>
                                                                <td><span>$360</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th><span>987</span></th>
                                                                <td><span>Hand bags for women</span></td>
                                                                <td><span>5</span></td>
                                                                <td><span>$50</span></td>
                                                                <td><span>$250</span></td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td class="border-none" colspan="3">
                                                                    <span></span></td>
                                                                <td class="border-color" colspan="1">
                                                                    <span><strong>Sub Total</strong></span></td>
                                                                <td class="border-color">
                                                                    <span><b>$3520</b></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="border-none" colspan="3">
                                                                    <span></span></td>
                                                                <td class="border-color" colspan="1">
                                                                    <span><strong>Tax (10%)</strong></span></td>
                                                                <td class="border-color">
                                                                    <span><b>$352</b></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="border-none m-m15"
                                                                    colspan="3"><span class="note-text-color">Extra
                                                                        note such as company or payment
                                                                        information...</span></td>
                                                                <td class="border-color m-m15"
                                                                    colspan="1"><span><strong>Total</strong></span>
                                                                </td>
                                                                <td class="border-color m-m15">
                                                                    <span><b>$3872</b></span></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('scripts')
    <!-- Datatables -->
	<script src="{{ asset('back/assets/plugins/data-tables/jquery.datatables.min.js') }}"></script>
	<script src="{{ asset('back/assets/plugins/data-tables/datatables.bootstrap5.min.js') }}"></script>
	<script src="{{ asset('back/assets/plugins/data-tables/datatables.responsive.min.js') }}"></script>
@endsection