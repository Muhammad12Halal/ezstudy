<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="">
    <meta name="description"
        content="">
    <meta name="robots" content="noindex,nofollow">
    <title>{{ config('app.name', 'Laravel') }} |  {{ Str::upper(Request::segment(2)) }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('panel/assets/images/favicon.png') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('panel/assets/libs/flot/css/float-chart.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('panel/dist/css/style.min.css') }}" rel="stylesheet">

    @yield('style')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">

                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon ps-2">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{ asset('efront/STUDYA++.png') }}" width="150px" alt="homepage" class="light-logo" />

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        {{-- <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" />

                        </span> --}}
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item d-none d-lg-block"><a
                                class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end">

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('panel/assets/images/users/1.jpg') }}" alt="user" class="rounded-circle" width="31">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <br>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();"><i
                                        class="fa fa-power-off me-1 ms-1"></i> Logout</a>

                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                         @csrf
                                     </form>
                            </ul>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    @if (Auth::user()->level == 'Admin')
                        <ul id="sidebarnav" class="pt-4">
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="{{ route('admin.dashboard.index') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                        class="hide-menu">Dashboard</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                                    class="hide-menu">Account </span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item"><a href="{{ route('admin.user.index') }}" class="sidebar-link"><i
                                        class="mdi mdi-note-outline"></i><span class="hide-menu"> User & Role
                                    </span></a></li>
                                    <li class="sidebar-item"><a href="{{ route('admin.profile.index') }}" class="sidebar-link"><i
                                        class="mdi mdi-note-plus"></i><span class="hide-menu"> User Profile
                                    </span></a></li>
                                </ul>
                            </li>
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                    href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                                        class="hide-menu">Course </span></a>
                                    <ul aria-expanded="false" class="collapse  first-level">
                                        <li class="sidebar-item"><a href="{{ route('admin.category.index') }}" class="sidebar-link"><i
                                            class="mdi mdi-note-outline"></i><span class="hide-menu"> Course Category
                                        </span></a></li>
                                        <li class="sidebar-item"><a href="{{ route('admin.level.index') }}" class="sidebar-link"><i
                                            class="mdi mdi-note-outline"></i><span class="hide-menu"> Course Level
                                        </span></a></li>
                                        <li class="sidebar-item"><a href="{{ route('admin.course.index') }}" class="sidebar-link"><i
                                            class="mdi mdi-note-outline"></i><span class="hide-menu"> Course
                                        </span></a></li>
                                        <li class="sidebar-item"><a href="{{ route('admin.content.index') }}" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Course Content
                                        </span></a></li>
                                        <li class="sidebar-item"><a href="{{ route('admin.lecture.index') }}" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Course Lecture
                                        </span></a></li>
                                        <li class="sidebar-item"><a href="{{ route('admin.enroll.index') }}" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Course Enrollment
                                        </span></a></li>
                                        <li class="sidebar-item"><a href="{{ route('admin.rating.index') }}" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Course Rating
                                        </span></a></li>
                                    </ul>
                            </li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('admin.event.index') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Event</span></a></li>
                        </ul>
                    @endif
                    @if (Auth::user()->level == 'Instructor')
                        @if (Auth::user()->profiles == NULL)
                        <ul id="sidebarnav" class="pt-4">
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="{{ route('instructor.dashboard.index') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                        class="hide-menu">Dashboard</span></a></li>
                        </ul>
                        @endif
                        @if (Auth::user()->profiles != NULL)
                        <ul id="sidebarnav" class="pt-4">
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="{{ route('instructor.dashboard.index') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                        class="hide-menu">Dashboard</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('instructor.dashboard.profile') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Profile</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('instructor.course.index') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Course</span></a></li>
                        </ul>
                        @endif
                    @endif
                    @if (Auth::user()->level == 'User')
                        @if (Auth::user()->profiles == NULL)
                        <ul id="sidebarnav" class="pt-4">
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="{{ route('user.dashboard.index') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                        class="hide-menu">Dashboard</span></a></li>
                        </ul>
                        @endif
                        @if (Auth::user()->profiles != NULL)
                        <ul id="sidebarnav" class="pt-4">
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="{{ route('user.dashboard.index') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                        class="hide-menu">Dashboard</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('user.dashboard.profile') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Profile</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('user.enroll.index') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Course</span></a></li>
                        </ul>
                        @endif
                    @endif
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            @yield('content')
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Copyright © 2022 EZ Study A++ by Muhammad Halal - All Rights Reserved.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('panel/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('panel/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('panel/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('panel/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('panel/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('panel/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('panel/dist/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
    <!-- <script src="{{ asset('panel/dist/js/pages/dashboards/dashboard1.js') }}"></script> -->
    <!-- Charts js Files -->
    <script src="{{ asset('panel/assets/libs/flot/excanvas.js') }}"></script>
    <script src="{{ asset('panel/assets/libs/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('panel/assets/libs/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('panel/assets/libs/flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('panel/assets/libs/flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('panel/assets/libs/flot/jquery.flot.crosshair.js') }}"></script>
    <script src="{{ asset('panel/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('panel/dist/js/pages/chart/chart-page-init.js') }}"></script>

    @yield('script')
</body>

</html>
