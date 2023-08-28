<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Admin Dashboard">

    <title>Admin Dashboard</title>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css"
        integrity="sha512-LX0YV/MWBEn2dwXCYgQHrpa9HJkwB+S+bnBpifSOTO1No27TqNMKYoAn6ff2FBh03THAzAiiCwQ+aPX+/Qt/Ow=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('back/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('back/assets/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />

    <!-- Ekka CSS -->
    <link id="ekka-css" href="{{ asset('back/assets/css/ekka.css') }}" rel="stylesheet" />

    <!-- FAVICON -->
    <link href="{{ asset('back/assets/img/favicon.png') }}" rel="shortcut icon" />

    @yield('styles')


</head>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body">

    <!--  WRAPPER  -->
    <div class="wrapper">

        <!-- LEFT MAIN SIDEBAR -->
        <div class="ec-left-sidebar ec-bg-sidebar">
            <div id="sidebar" class="sidebar ec-sidebar-footer">

                <div class="ec-brand">
                    <a href="{{ route('front.index') }}" title="W World">
                        <img class="ec-brand-icon" src="{{ asset('back/assets/img/logo/ec-site-logo.png') }}"
                            alt="" style="max-width: 130px; margin-left: -18px;" />
                    </a>
                </div>

                <!-- begin sidebar scrollbar -->
                <div class="ec-navigation" data-simplebar>
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">
                        <!-- Dashboard -->
                        <li class="{{ $menu['dashboard'] }}">
                            <a class="sidenav-item-link" href="{{ route('admin.dashboard') }}">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                            <hr>
                        </li>


                        <!-- Users -->
                        <li class="{{ $menu['user'] }}">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-account-group"></i>
                                <span class="nav-text">Users</span> <b class="caret"></b>
                            </a>
                            <div class="collapse">
                                <ul class="sub-menu" id="users" data-parent="#sidebar-menu">

                                    <li class="">
                                        <a class="sidenav-item-link" href="{{ route('adminUsers.index') }}">
                                            <span class="nav-text">Users List</span>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                            <hr>
                        </li>

                        <!-- Category -->
                        <li class="{{ $menu['category'] }}">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-dns-outline"></i>
                                <span class="nav-text">Categories</span> <b class="caret"></b>
                            </a>
                            <div class="collapse">
                                <ul class="sub-menu" id="categorys" data-parent="#sidebar-menu">
                                    <li class="">
                                        <a class="sidenav-item-link" href="{{ route('categories.index') }}">
                                            <span class="nav-text">Main Categories</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a class="sidenav-item-link" href="{{ route('subcategories.index') }}">
                                            <span class="nav-text">Sub Categories</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- Products -->
                        <li class="{{ $menu['product'] }}">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-palette-advanced"></i>
                                <span class="nav-text">Products</span> <b class="caret"></b>
                            </a>
                            <div class="collapse">
                                <ul class="sub-menu" id="products" data-parent="#sidebar-menu">
                                    <li class="">
                                        <a class="sidenav-item-link" href="{{ route('products.create') }}">
                                            <span class="nav-text">Add Product</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a class="sidenav-item-link" href="{{ route('products.index') }}">
                                            <span class="nav-text">List Product</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- Orders -->
                        <li class="{{ $menu['order'] }}">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-cart"></i>
                                <span class="nav-text">Orders</span> <b class="caret"></b>
                            </a>
                            <div class="collapse">
                                <ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
                                    <li class="">
                                        <a class="sidenav-item-link" href="new-order.html">
                                            <span class="nav-text">New Order</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a class="sidenav-item-link" href="order-history.html">
                                            <span class="nav-text">Order History</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- Blog -->
                        <li class="{{ $menu['blog'] }}">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-access-point"></i>
                                <span class="nav-text">Blog</span> <b class="caret"></b>
                            </a>
                            <div class="collapse">
                                <ul class="sub-menu" id="products" data-parent="#sidebar-menu">
                                    <li class="">
                                        <a class="sidenav-item-link" href="{{ route('blog.create') }}">
                                            <span class="nav-text">Add Blog</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a class="sidenav-item-link" href="{{ route('blog.index') }}">
                                            <span class="nav-text">List Blogs</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- Reviews -->
                        <li class="{{ $menu['review'] }}">
                            <a class="sidenav-item-link" href="{{ route('product.reviews') }}">
                                <i class="mdi mdi-star"></i>
                                <span class="nav-text">Reviews</span>
                            </a>
                        </li>

                        <!-- Contact -->
                        <li class="{{ $menu['contact'] }}">
                            <a class="sidenav-item-link" href="{{ route('admin.contact') }}">
                                <i class="mdi mdi-comment-text-outline"></i>
                                <span class="nav-text">Contact</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <!--  PAGE WRAPPER -->
        <div class="ec-page-wrapper">

            <!-- Header -->
            <header class="ec-main-header" id="header">
                <nav class="navbar navbar-static-top navbar-expand-lg">
                    <!-- Sidebar toggle button -->
                    <span id="sidebar-toggler" class="sidebar-toggle"></span>
                    <!-- search form -->
                    <div class="search-form d-lg-inline-block">
                        <div class="input-group">
                            <input type="text" name="query" id="search-input" class="form-control"
                                placeholder="search.." autofocus autocomplete="off" />
                            <button type="button" name="search" id="search-btn" class="btn btn-flat">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                        </div>
                        <div id="search-results-container">
                            <ul id="search-results"></ul>
                        </div>
                    </div>

                    <!-- navbar right -->
                    <div class="navbar-right">
                        <ul class="nav navbar-nav">
                            <!-- User Account -->
                            <li class="dropdown user-menu">
                                <button class="dropdown-toggle nav-link ec-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="{{ Auth::user()->image }}" class="user-image"
                                        alt="User Image" />
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right ec-dropdown-menu">
                                    <!-- User image -->
                                    <li class="dropdown-header">
                                        <img src="{{ Auth::user()->image }}" class="img-circle"
                                            alt="User Image" />
                                        <div class="d-inline-block">
                                            {{ Auth::user()->name }} <small class="pt-1">{{ Auth::user()->email }}</small>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{route('showpage')}}">
                                            <i class="mdi mdi-account"></i> My Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="mdi mdi-diamond-stone"></i> My Orders </a>
                                    </li>
                                    <li class="right-sidebar-in">
                                        <a href="javascript:0"> <i class="mdi mdi-settings-outline"></i> Setting </a>
                                    </li>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                this.closest('form').submit(); "
                                                role="button">
                                                <i class="mdi mdi-settings-outline"></i>

                                                {{ __('Log Out') }}
                                            </a>
                                        </li>
                                    </form>
                                </ul>
                            </li>
                            <li class="right-sidebar-in right-sidebar-2-menu">
                                <i class="mdi mdi-settings-outline mdi-spin"></i>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>






            @yield('main')





            <!-- Footer -->
            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p> Copyright &copy; <span id="ec-year"></span><a class="text-primary"
                            href="https://www.sediq.net" target="_blank"> W World</a>. All Rights Reserved.
                    </p>
                </div>
            </footer>

        </div> <!-- End Page Wrapper -->
    </div> <!-- End Wrapper -->

    <!-- Common Javascript -->
    <script src="{{ asset('back/assets/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('back/assets/plugins/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('back/assets/plugins/jquery-zoom/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('back/assets/plugins/slick/slick.min.js') }}"></script>

    <!-- Chart -->
    <script src="{{ asset('back/assets/plugins/charts/Chart.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/chart.js') }}"></script>

    <!-- Google map chart -->
    <script src="{{ asset('back/assets/plugins/charts/google-map-loader.js') }}"></script>
    <script src="{{ asset('back/assets/plugins/charts/google-map.js') }}"></script>

    <!-- Date Range Picker -->
    <script src="{{ asset('back/assets/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('back/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('back/assets/js/date-range.js') }}"></script>

    <!-- Option Switcher -->
    <script src="{{ asset('back/assets/plugins/options-sidebar/optionswitcher.js') }}"></script>

    <!-- Ekka Custom -->
    <script src="{{ asset('back/assets/js/ekka.js') }}"></script>

    @yield('scripts')

</body>

</html>
