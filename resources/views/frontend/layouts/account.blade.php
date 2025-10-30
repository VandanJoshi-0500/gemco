@include('frontend.partials.header')
<div class="container-fluid my-dashboard-main-container">
    <div class="row container py-5">
        <!-- Sidebar -->
        <div class="col-md-3 sidebar">
            <div class="shadow-sm p-3 rounded my-dashboard-left-sidebar">
                <a href="{{ route('user.dashboard') }}"
                    class="bg-transparent {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                    Account Dashboard
                </a>
                <!-- <a href="{{ route('account_information') }}"
                    class="bg-transparent {{ request()->routeIs('account_information') ? 'active' : '' }}">
                    Account Information
                </a> -->
                <!-- <a href="{{ route('address_book') }}"
                    class="bg-transparent {{ request()->routeIs('address_book') ? 'active' : '' }}">
                    Address Book
                </a> -->
                <a href="{{ route('wishlist') }}"
                    class="bg-transparent {{ request()->routeIs('wishlist') ? 'active' : '' }}">
                    My Wishlist
                </a>
                <!-- <a href="{{ route('wishlist_history') }}"
                    class="bg-transparent {{ request()->routeIs('wishlist_history') ? 'active' : '' }}">
                    My Wishlist History
                </a> -->
            </div>
        </div>
        @yield('content')
    </div>
</div>
@include('frontend.partials.footer')
