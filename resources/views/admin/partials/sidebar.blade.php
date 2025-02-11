<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="#" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{url('frontend/Assets/Logo.png')}}" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="{{url('frontend/Assets/google.png')}}" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="#" class="logo logo-dark">
        <span class="logo-lg">
            <img src="#" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="#" alt="small logo">
        </span>
    </a>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    {{-- <span class="badge bg-success float-end">9+</span> --}}
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages1" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-user-settings-line"></i>
                    <span> Customers </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages1">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="#">Manage Customer</a>
                        </li>
                        <li>
                            <a href="#">Manage Group</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-share-line"></i>
                    <span> Catalog </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="#">Products</a>
                        </li>
                        <li>
                            <a href="#">Categories</a>
                        </li>
                        <li>
                            <a href="#">Collection</a>
                        </li>
                        <li>
                            <a href="#">Banners</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <i class="ri-table-line"></i>
                    {{-- <span class="badge bg-success float-end">9+</span> --}}
                    <span> Events </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <i class="ri-pages-line"></i>
                    {{-- <span class="badge bg-success float-end">9+</span> --}}
                    <span> Pages </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <i class="ri-user-line"></i>
                    {{-- <span class="badge bg-success float-end">9+</span> --}}
                    <span> Subscribers </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <i class="ri-shopping-bag-3-line"></i>
                    {{-- <span class="badge bg-success float-end">9+</span> --}}
                    <span> Wishlists </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <i class="ri-shopping-bag-3-line"></i>
                    {{-- <span class="badge bg-success float-end">9+</span> --}}
                    <span> Contact Inquiries </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <i class="ri-shopping-bag-3-line"></i>
                    {{-- <span class="badge bg-success float-end">9+</span> --}}
                    <span> Catalog Request </span>
                </a>
            </li>
        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid mt-3">
