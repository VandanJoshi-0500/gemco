<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gemco</title>
    <link rel="icon" type="image/x-icon" href="#">
    <link rel="stylesheet" href="{{url('/')}}/assets1/sweetalert/sweetalert.min.css">

    <!-- Daterangepicker css -->
    <link rel="stylesheet" href="{{url('/')}}/assets/vendor/daterangepicker/daterangepicker.css">

    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{url('/')}}/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css">

    <!-- Theme Config Js -->
    <script src="{{url('/')}}/assets/js/config.js"></script>

    <!-- App css -->
    <link href="{{url('/')}}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{url('/')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- Datatables css -->
    <link href="{{url('/')}}/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{url('/')}}/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{url('/')}}/assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{url('/')}}/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{url('/')}}/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />

    <script src="{{url('/')}}/assets1/JS/3.5.1_jquery.min.js" charset="utf-8"></script>

    @yield('style')
</head>
<body>
    <div class="wrapper">
        <div class="navbar-custom">
            <div class="topbar container-fluid">
                <div class="d-flex align-items-center gap-1">

                    <!-- Topbar Brand Logo -->
                    <div class="logo-topbar">
                        <!-- Logo light -->
                        <a href="{{url('/admin/dashboard')}}" class="logo-light">
                            <span class="logo-lg">
                                <img src="{{url('frontend/Assets/Logo.png')}}" alt="logo">
                            </span>
                            <span class="logo-sm">
                                <img src="{{url('frontend/Assets/google.png')}}" alt="small logo">
                            </span>
                        </a>

                        <!-- Logo Dark -->
                        <a href="#" class="logo-dark">
                            <span class="logo-lg">
                                <img src="#" alt="dark logo">
                            </span>
                            <span class="logo-sm">
                                <img src="#" alt="small logo">
                            </span>
                        </a>
                    </div>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="button-toggle-menu">
                        <i class="ri-menu-line"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>

                </div>

                <ul class="topbar-menu d-flex align-items-center gap-3">



                    {{-- <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="ri-notification-3-line fs-22"></i>
                            <span class="noti-icon-badge badge text-bg-pink">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                            <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0 fs-16 fw-semibold"> Notification</h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="javascript: void(0);" class="text-dark text-decoration-underline">
                                            <small>Clear All</small>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div style="max-height: 300px;" data-simplebar>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-primary-subtle">
                                        <i class="mdi mdi-comment-account-outline text-primary"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin
                                        <small class="noti-time">1 min ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-warning-subtle">
                                        <i class="mdi mdi-account-plus text-warning"></i>
                                    </div>
                                    <p class="notify-details">New user registered.
                                        <small class="noti-time">5 hours ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-danger-subtle">
                                        <i class="mdi mdi-heart text-danger"></i>
                                    </div>
                                    <p class="notify-details">Carlos Crouch liked
                                        <small class="noti-time">3 days ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-pink-subtle">
                                        <i class="mdi mdi-comment-account-outline text-pink"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admi
                                        <small class="noti-time">4 days ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-purple-subtle">
                                        <i class="mdi mdi-account-plus text-purple"></i>
                                    </div>
                                    <p class="notify-details">New user registered.
                                        <small class="noti-time">7 days ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-success-subtle">
                                        <i class="mdi mdi-heart text-success"></i>
                                    </div>
                                    <p class="notify-details">Carlos Crouch liked <b>Admin</b>.
                                        <small class="noti-time">Carlos Crouch liked</small>
                                    </p>
                                </a>
                            </div>

                            <!-- All-->
                            <a href="javascript:void(0);"
                                class="dropdown-item text-center text-primary text-decoration-underline fw-bold notify-item border-top border-light py-2">
                                View All
                            </a>

                        </div>
                    </li> --}}

                    <li class="d-none d-sm-inline-block">
                        <div class="nav-link" id="light-dark-mode">
                            <i class="ri-moon-line fs-22"></i>
                        </div>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none nav-user" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <span class="account-user-avatar">
                                <img src="{{url('/')}}/assets/images/users/avatar-1.jpg" alt="user-image" width="32" class="rounded-circle">
                            </span>
                            <span class="d-lg-block d-none">
                                <h5 class="my-0 fw-normal">Admin<i
                                        class="ri-arrow-down-s-line d-none d-sm-inline-block align-middle"></i></h5>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="#" class="dropdown-item">
                                <i class="ri-account-circle-line fs-18 align-middle me-1"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="#" class="dropdown-item">
                                <i class="ri-settings-4-line fs-18 align-middle me-1"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="#" class="dropdown-item">
                                <i class="ri-logout-box-line fs-18 align-middle me-1"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ========== Topbar End ========== -->



        {{-- <div class="row header_row mx-0 py-2 sticky-top">
            <div class="col-2 p-0 d-none d-md-flex align-items-center">
                <div class="header_logo px-4 mt-2">
                    <a href="{{route('admin.dashboard')}}"><img src="{{ URL::asset('settings/'.$setting->logo) }}" alt="" class="header_logo "></a>
                </div>
            </div>
            <div class="col-md-10 col-12 p-0">
                <div class="header py-1 px-3">
                    <div class="d-flex align-items-center">
                        <div id="menu-btn" class="toggle_bar me-4 me-md-5"><img src="{{url('/')}}/assets/Images/Sidebar_Icons/toggle_bar.png" alt=""> </div>
                        <div class="d-none d-md-block"><h4 class="mb-0 pt-1 ">{{$page}}</h4></div>
                        <div class="d-block d-md-none"><a href="{{url('/')}}/"><img src="{{ URL::asset('settings/'.$setting->logo) }}" alt="" class="header_logo "></a></div>
                        <div class="d-flex ms-auto align-items-center">
                            <!-- <img src=".\assets\Images\Sidebar_Icons\notification.png" alt="" class="noti_bell me-4"> -->
                            <!-- <img src=".\assets\Images\Sidebar_Icons\profile.png" alt="" class="profile"> -->
                            <div class="nav-item">
                                <a href="#" onclick="openNav()" class="nav-link nav-link-notify pe-3 p-md-3"  data-sidebar-target="#notifications">
                                    <img src="{{url('/')}}\assets\Images\Sidebar_Icons\notification.png" alt="" class="noti_bell">
                                </a>
                            </div>
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle profile-dropdown sub-menu me-3" data-bs-toggle="dropdown" type="button" aria-expanded="false">
                                        <img src="{{url('/')}}\assets\Images\Sidebar_Icons\profile.png" class="rounded-circle profile" alt='userProfile'/>
                                </a>
                                <ul class="dropdown-menu" >
                                    <li class=''><a class="dropdown-item fs-6 py-2" href="{{ route('view.profile') }}">My Profile</a> </li>
                                    <li class=''><a class="dropdown-item fs-6 py-2" href="{{ route('edit.profile') }}">Edit Profile</a> </li>
                                    <li class=''><a class="dropdown-item fs-6 py-2" href="{{route('settings')}}">Settings</a> </li>
                                    <li class=''><a class="dropdown-item fs-6 py-2" href="{{route('logout')}}/">Logout</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar sidepanel" id="notifications">
            <div class="p-3">
                <div class="sidebar-header d-block align-items-end">
                    <div class="align-items-center d-flex justify-content-between py-4" >
                        <h4>Notifications</h4>
                        <div role='button'  onClick="CloseNav()">
                        <h4 >X</h4>
                        </div>
                    </div>
                </div>
                <div class="sidebar-content">
                    <div class="tab-content">
                        <div class="tab-pane active" id="activities">
                            <div class="tab-pane-body">
                                <ul class="list-unstyled list-group-flush">
                                    <li class="px-2 ">
                                        <p class="mb-0 fw-bold houmanity-color d-flex justify-content-between">
                                            No New Notification
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

