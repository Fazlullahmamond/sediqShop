            <!-- Sidebar Area Start -->
            <div class="ec-shop-leftside ec-vendor-sidebar col-lg-3 col-md-12">
                <div class="ec-sidebar-wrap ec-border-box">
                    <!-- Sidebar Category Block -->
                    <div class="ec-sidebar-block">
                        <div class="ec-vendor-block">
                            <div class="ec-vendor-block-items">
                                <ul>
                                    <li><a class="{{ Request::is('user/dashboard') ? 'active_item' : '' }}" href="{{route('user.dashboard')}}">User Profile</a></li>
                                    <li><a class="@if (Request::is('user/historypage')) active_item @elseif (Request::is('user/historyDetails/*')) active_item @endif" href="{{route('historypage')}}">History</a></li>
                                    <li><a class="{{ Request::is('user/wishlistpage') ? 'active_item' : '' }}" href="{{route('wishlistpage')}}">Wishlist</a></li>
                                    <li><a class="{{ Request::is('user/cardpage') ? 'active_item' : '' }}" href="{{route('cardpage')}}">Cart</a></li>
                                    <li><a class="{{ Request::is('user/trackorderpage') ? 'active_item' : '' }}" href="{{route('trackorderpage')}}">Track Order</a></li>
                                    <li><a class="{{ Request::is('user/invoicepage') ? 'active_item' : '' }}" href="{{route('invoicepage')}}">Invoice</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>