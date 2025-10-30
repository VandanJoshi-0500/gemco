<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gemco</title>

    <!-- GOOGLE FONTS -->
    {{-- poppins font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- work_sans font  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ url('frontend/Assets/smalllogo.png') }}">

    <!-- css link -->
    <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/collection.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/MobileFriendly.css') }}">

    <!-- Font link -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    {{-- SLICK SLIDER --}}
    <!-- Slick CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

</head>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .discount-card {
        position: relative;
        overflow: hidden;
    }

    .discount-card img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    .discount-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: start;
        color: white;
        text-align: center;
        padding: 20px;
    }

    .search-popup-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.75);
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .search-popup {
        background: #000000;
        padding: 30px;
        border-radius: 8px;
        width: 90%;
        max-width: 500px;
        position: relative;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    }

    .search-popup input::placeholder {
        color: #fff;
        opacity: 1;
    }

    .search-popup input[type="text"] {
        width: 100%;
        padding: 12px 15px;
        color: #fff;
        border: 1px solid #ccc;
        font-size: 16px;
        border-radius: 4px;
        margin: 10px 0px;
    }

    .search-popup i {
        position: absolute;
        top: 35px;
        right: 30px;
        color: #333;
        cursor: pointer;
    }

    .close-search {
        position: absolute;
        top: 0px;
        right: 10px;
        background: #000000;
        font-size: 30px;
        cursor: pointer;
        color: #fff !important;
    }

    .footer-icon a:hover {
        text-decoration: underline !important;
    }

    .footer-email-link:hover {
        text-decoration: underline !important;
    }
</style>

@yield('css')

<body cz-shortcut-listen="true">

    <!-- .....NAVBAR..... -->
    <nav class="navbar navbar-expand-lg text-light">
        <div class="container Nav-Container">
            <!-- Logo on the left -->
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ url('frontend/Assets/whitelogo.png') }}" alt="Logo" width="140" height="auto">
            </a>

            <!-- Toggle Button for Mobile -->
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <a class="navbar-toggler" data-bs-toggle="offcanvas" href="#offcanvasExample1" role="button"
                aria-controls="offcanvasExample">
                <i class="fa-solid fa-bars"></i>
            </a>


            <!-- MOBILE SIDEBAR FOR NAVIGATION -->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample1"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body navbar-mobile-menu">
                    <!-- Navigation Links in Center -->
                    <ul class="navbar-nav Menu-UL">
                        <li class="nav-item Menu-LI"><a class="nav-link" href="{{ route('home') }}">Home</a></li>

                        {{-- collection dynamic dropdown --}}


                        <!-- JEWELLERY MAIN DROPDOWN IN MOBILE NAV -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="mobileJewelleryDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Jewelry
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="mobileJewelleryDropdown">
                                <!-- All Products -->
                                <li>
                                    <a class="dropdown-item" href="{{ route('all_product.details') }}">
                                        All Products
                                    </a>
                                </li>

                                <!-- Collections Submenu -->
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">Collections</a>
                                    <ul class="dropdown-menu">
                                        {{-- @php
                                            // slugs to exclude for collections
                                            $excludedCollectionSlugs = [
                                                'pave jewelry',
                                                'inlay jewelry',
                                                'links jewelry',
                                                'slice diamond jewelry',
                                                'bakelite jewelry',
                                                'beads jewelry',
                                                'ball jewelry',
                                            ];
                                        @endphp

                                        @foreach ($collections->sortBy('name') as $collection)
                                            @if (!in_array($collection->slug, $excludedCollectionSlugs))
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ url('viewcategory/' . $collection->slug) }}">
                                                        {{ $collection->name }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach --}}
                                        @foreach ($collections->where('showindropdown', 1)->sortBy('name') as $collection)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ url('viewcategory/' . $collection->slug) }}">
                                                    {{ $collection->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>

                                <!-- Categories Submenu -->
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">Categories</a>
                                    <ul class="dropdown-menu">
                                        {{-- @php
                                            // list all slugs you want to hide here
                                            $excludedSlugs = [
                                                'alphabet',
                                            ];
                                        @endphp

                                        @foreach ($categories->sortBy('name') as $category)
                                            @if (!in_array($category->slug, $excludedSlugs))
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ url('viewcategory/' . $category->slug) }}">
                                                        {{ $category->name }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach --}}
                                        @foreach ($categories->where('showindropdown', 1)->sortBy('name') as $category)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ url('viewcategory/' . $category->slug) }}">
                                                    {{ $category->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </li>



                        <li class="nav-item Menu-LI">
                            <a class="nav-link" href="{{ route('about') }}">
                                About Us
                            </a>
                        </li>
                        {{-- <li class="nav-item Menu-LI">
                            <a class="nav-link" href="{{ route('catalog') }}">
                                Catalog
                            </a>
                        </li> --}}
                        <li class="nav-item Menu-LI">
                            <a class="nav-link" href="{{ route('contact') }}">
                                Contact Us
                            </a>
                        </li>
                    </ul>

                    <!-- Icons and Button on the Right -->
                    <div class="d-flex align-items-center NavIcons">
                        <a href="#" class="nav-link"><i class="fas fa-search"></i></a>
                        {{-- <a href="#" class="nav-link"><i class="fas fa-search"></i></a> --}}
                        <a href="{{ route('cart') }}" class="nav-link"><i class="fas fa-shopping-cart"></i></a>
                        <!-- <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div> -->


                        <a href="{{ route('catalog') }}" class="btn btn-primary ms-2 GetSpecialBTN">Request
                            Catalog</a>
                    </div>
                </div>
            </div>


            <!-- Navigation Links in Center -->
            <div class="collapse navbar-collapse justify-content-center NavMenu" id="navbarNav">
                <ul class="navbar-nav Menu-UL py-3">
                    <li class="nav-item Menu-LI"><a class="nav-link" href="{{ route('home') }}">Home</a></li>

                    {{-- collection dynamic dropdown --}}
                    <!-- Jwellery Dropdown new -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="{{ route('all_product.details') }}"
                            id="jewelleryDropdown">
                            Jewelry
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="jewelleryDropdown">
                            {{-- All Products Listing --}}
                            <li class="dropdown-submenu2">
                                <a class="dropdown-item text-light" href="{{ route('all_product.details') }}">All
                                    Products</a>
                                {{-- <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul> --}}
                            </li>

                            {{-- Example of submenu inside "Jewellery" --}}
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle text-light" href="#">Collections</a>
                                <ul class="dropdown-menu">
                                    @foreach ($collections->where('showindropdown', 1)->sortBy('name') as $collection)
                                        <li>
                                            <a class="dropdown-item text-light"
                                                href="{{ url('viewcategory/' . $collection->slug) }}">
                                                {{ $collection->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                    {{-- @php
                                        // slugs to exclude for collections
                                        $excludedCollectionSlugs = [
                                            'pave jewelry',
                                        ];
                                    @endphp

                                    @foreach ($collections->sortBy('name') as $collection)
                                        @if (!in_array($collection->slug, $excludedCollectionSlugs))
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ url('viewcategory/' . $collection->slug) }}">
                                                    {{ $collection->name }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach --}}
                                </ul>
                            </li>

                            <li class="dropdown-submenu1">
                                <a class="dropdown-item dropdown-toggle text-light" href="#">Categories</a>
                                <ul class="dropdown-menu">
                                    @foreach ($categories->where('showindropdown', 1)->sortBy('name') as $category)
                                        <li>
                                            <a class="dropdown-item text-light"
                                                href="{{ url('viewcategory/' . $category->slug) }}">
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                    @endforeach

                                    {{-- @php
                                        // list all slugs you want to hide here
                                        $excludedSlugs = [
                                            'alphabet',
                                        ];
                                    @endphp

                                    @foreach ($categories->sortBy('name') as $category)
                                        @if (!in_array($category->slug, $excludedSlugs))
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ url('viewcategory/' . $category->slug) }}">
                                                    {{ $category->name }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach --}}

                                </ul>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item Menu-LI">
                        <a class="nav-link" href="{{ route('about') }}">
                            About Us
                        </a>
                    </li>
                    {{-- <li class="nav-item Menu-LI">
                        <a class="nav-link" href="{{ route('catalog') }}">
                            Catalog
                        </a>
                    </li> --}}
                    <li class="nav-item Menu-LI">
                        <a class="nav-link" href="{{ route('contact') }}">
                            Contact Us
                        </a>
                    </li>
                    <li class="nav-item Menu-LI">
                        <a class="nav-link" href="{{ route('catalog') }}">
                            Request Catalog
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Icons and Button on the Right -->
            <div class="d-flex align-items-center NavIcons">
                {{-- <a href="#" class="nav-link"><i class="fas fa-search"></i></a> --}}

                <a href="#" class="nav-link" id="openSearch"><i class="fas fa-search fw-300"></i></a>
                <div id="searchPopup" class="search-popup-overlay d-none">
                    <div class="search-popup">
                        <span class="close-search">&times;</span>
                        <form action="{{ route('product.search') }}" method="GET">
                            <input type="text" name="query" placeholder="Search for products..." required>
                            <button type="submit" style="display: none;"></button>
                        </form>
                    </div>
                </div>
                {{-- 
                <a href="{{ route('wishlist') }}" class="nav-link fw-300 header-heart-icon"><i
                        class="fa-regular fa-heart fw-300"></i>
                    <p class="count-of-wishlist-products">10</p> --}}
                <a href="{{ route('wishlist') }}" class="nav-link fw-300 header-heart-icon">
                    <i class="fa-regular fa-heart fw-300"></i>
                    {{-- <p class="count-of-wishlist-products wishlist-count">0</p> --}}
                </a>
                {{-- <p class="count-of-wishlist-products">{{ $wishlistCount }}</p> --}}

                </a>

                <div class="dropdown">
                    {{-- <a href="" class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                        <img src="https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&w=600" class="header-user-profile" ></img>
                    </a> --}}
                    <i class="fa-regular fa-user dropdown-toggle fw-300" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false"></i>

                    <ul class="dropdown-menu">
                        {{-- <li class="username"><a href="#" class="dropdown-item header-user-icon-dropdown-list no-pointer">{{ Auth::user()->name }}</a></li> --}}
                        <li><a class="dropdown-item header-user-icon-dropdown-list"
                                href="{{ route('user.dashboard') }}"> My Account</a>
                        </li>
                        <!-- <li><a class="dropdown-item header-user-icon-dropdown-list" href="#"> Setting</a></li>
                        <li> -->
                        <a class='dropdown-item header-user-icon-dropdown-list'
                            href="@if (auth()->user()) {{ route('logout') }} @else {{ route('user.login') }} @endif">
                            <!-- Login Icon -->
                            @if (auth()->user())
                                <h6 class="text-overflow">LOGOUT</h6>
                            @else
                                LOGIN
                            @endif
                        </a>
                        </li>
                    </ul>
                </div>
                {{-- <a href="{{ route('catalog') }}" class="btn btn-primary ms-2 GetSpecialBTN">Request a Catalog</a> --}}
            </div>
        </div>
    </nav>
    <!-- .....NAVBAR END..... -->
