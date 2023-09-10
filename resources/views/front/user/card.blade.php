@extends('front.components.layout')

@section('main')
<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">Cart</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="ec-breadcrumb-item active">Cart</li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ec breadcrumb end -->

<!-- Ec cart page -->
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="ec-cart-leftside col-lg-8 col-md-12 ">
                <!-- cart content Start -->
                <div class="ec-cart-content">
                    <div class="ec-cart-inner">
                        <div class="row">
                            <form action="#">
                                <div class="table-content cart-table-content">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th style="text-align: center;">Quantity</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td data-label="Product" class="ec-cart-pro-name"><a
                                                        href="product-left-sidebar.html"><img
                                                            class="ec-cart-pro-img mr-4"
                                                            src="assets/images/product-image/1.jpg" alt="" />Stylish
                                                        Baby Shoes</a></td>
                                                <td data-label="Price" class="ec-cart-pro-price"><span
                                                        class="amount">$56.00</span></td>
                                                <td data-label="Quantity" class="ec-cart-pro-qty"
                                                    style="text-align: center;">
                                                    <div class="cart-qty-plus-minus">
                                                        <input class="cart-plus-minus" type="text"
                                                            name="cartqtybutton" value="1" />
                                                    </div>
                                                </td>
                                                <td data-label="Total" class="ec-cart-pro-subtotal">$56.00</td>
                                                <td data-label="Remove" class="ec-cart-pro-remove">
                                                    <a href="#"><i class="ecicon eci-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td data-label="Product" class="ec-cart-pro-name"><a
                                                        href="product-left-sidebar.html"><img
                                                            class="ec-cart-pro-img mr-4"
                                                            src="assets/images/product-image/2.jpg" alt="" />Unisex
                                                        Fully Solid Hoodie</a></td>
                                                <td data-label="Price" class="ec-cart-pro-price"><span
                                                        class="amount">$75.00</span></td>
                                                <td data-label="Quantity" class="ec-cart-pro-qty"
                                                    style="text-align: center;">
                                                    <div class="cart-qty-plus-minus">
                                                        <input class="cart-plus-minus" type="text"
                                                            name="cartqtybutton" value="1" />
                                                    </div>
                                                </td>
                                                <td data-label="Total" class="ec-cart-pro-subtotal">$75.00</td>
                                                <td data-label="Remove" class="ec-cart-pro-remove">
                                                    <a href="#"><i class="ecicon eci-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td data-label="Product" class="ec-cart-pro-name"><a
                                                        href="product-left-sidebar.html"><img
                                                            class="ec-cart-pro-img mr-4"
                                                            src="assets/images/product-image/3.jpg"
                                                            alt="" />Beautiful T-shirt For Women</a></td>
                                                <td data-label="Price" class="ec-cart-pro-price"><span
                                                        class="amount">$48.00</span></td>
                                                <td data-label="Quantity" class="ec-cart-pro-qty"
                                                    style="text-align: center;">
                                                    <div class="cart-qty-plus-minus">
                                                        <input class="cart-plus-minus" type="text"
                                                            name="cartqtybutton" value="1" />
                                                    </div>
                                                </td>
                                                <td data-label="Total" class="ec-cart-pro-subtotal">$48.00</td>
                                                <td data-label="Remove" class="ec-cart-pro-remove">
                                                    <a href="#"><i class="ecicon eci-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td data-label="Product" class="ec-cart-pro-name"><a
                                                        href="product-left-sidebar.html"><img
                                                            class="ec-cart-pro-img mr-4"
                                                            src="assets/images/product-image/4.jpg" alt="" />Wool
                                                        Hat For Men</a></td>
                                                <td data-label="Price" class="ec-cart-pro-price"><span
                                                        class="amount">$95.00</span></td>
                                                <td data-label="Quantity" class="ec-cart-pro-qty"
                                                    style="text-align: center;">
                                                    <div class="cart-qty-plus-minus">
                                                        <input class="cart-plus-minus" type="text"
                                                            name="cartqtybutton" value="1" />
                                                    </div>
                                                </td>
                                                <td data-label="Total" class="ec-cart-pro-subtotal">$95.00</td>
                                                <td data-label="Remove" class="ec-cart-pro-remove">
                                                    <a href="#"><i class="ecicon eci-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="ec-cart-update-bottom">
                                            <a href="#">Continue Shopping</a>
                                            <button class="btn btn-primary">Check Out</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--cart content End -->
            </div>
            <!-- Sidebar Area Start -->
            <div class="ec-cart-rightside col-lg-4 col-md-12">
                <div class="ec-sidebar-wrap">
                    <!-- Sidebar Summary Block -->
                    <div class="ec-sidebar-block">
                        <div class="ec-sb-title">
                            <h3 class="ec-sidebar-title">Summary</h3>
                        </div>
                        <div class="ec-sb-block-content">
                            <h4 class="ec-ship-title">Estimate Shipping</h4>
                            <div class="ec-cart-form">
                                <p>Enter your destination to get a shipping estimate</p>
                                <form action="#" method="post">
                                    <span class="ec-cart-wrap">
                                        <label>Country *</label>
                                        <span class="ec-cart-select-inner">
                                            <select name="ec_cart_country" id="ec-cart-select-country"
                                                class="ec-cart-select">
                                                <option selected="" disabled="">United States</option>
                                                <option value="1">Country 1</option>
                                                <option value="2">Country 2</option>
                                                <option value="3">Country 3</option>
                                                <option value="4">Country 4</option>
                                                <option value="5">Country 5</option>
                                            </select>
                                        </span>
                                    </span>
                                    <span class="ec-cart-wrap">
                                        <label>State/Province</label>
                                        <span class="ec-cart-select-inner">
                                            <select name="ec_cart_state" id="ec-cart-select-state"
                                                class="ec-cart-select">
                                                <option selected="" disabled="">Please Select a region, state
                                                </option>
                                                <option value="1">Region/State 1</option>
                                                <option value="2">Region/State 2</option>
                                                <option value="3">Region/State 3</option>
                                                <option value="4">Region/State 4</option>
                                                <option value="5">Region/State 5</option>
                                            </select>
                                        </span>
                                    </span>
                                    <span class="ec-cart-wrap">
                                        <label>Zip/Postal Code</label>
                                        <input type="text" name="postalcode" placeholder="Zip/Postal Code">
                                    </span>
                                </form>
                            </div>
                        </div>

                        <div class="ec-sb-block-content">
                            <div class="ec-cart-summary-bottom">
                                <div class="ec-cart-summary">
                                    <div>
                                        <span class="text-left">Sub-Total</span>
                                        <span class="text-right">$80.00</span>
                                    </div>
                                    <div>
                                        <span class="text-left">Delivery Charges</span>
                                        <span class="text-right">$80.00</span>
                                    </div>
                                    <div>
                                        <span class="text-left">Coupan Discount</span>
                                        <span class="text-right"><a class="ec-cart-coupan">Apply Coupan</a></span>
                                    </div>
                                    <div class="ec-cart-coupan-content">
                                        <form class="ec-cart-coupan-form" name="ec-cart-coupan-form" method="post"
                                            action="#">
                                            <input class="ec-coupan" type="text" required=""
                                                placeholder="Enter Your Coupan Code" name="ec-coupan" value="">
                                            <button class="ec-coupan-btn button btn-primary" type="submit"
                                                name="subscribe" value="">Apply</button>
                                        </form>
                                    </div>
                                    <div class="ec-cart-summary-total">
                                        <span class="text-left">Total Amount</span>
                                        <span class="text-right">$80.00</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Sidebar Summary Block -->
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