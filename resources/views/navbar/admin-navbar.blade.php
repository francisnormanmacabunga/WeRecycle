<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <title>WeRecycle™ Administrator</title>
    <!-- Custom CSS -->
    <link href="{{ asset('assets/libs/flot/css/float-chart.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/extra-libs/multicheck/multicheck.css') }}">
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/quill/dist/quill.snow.css') }}">
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">

</head>

<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>

<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="{{ url('/admin') }}">
                <!-- Logo icon -->
                <b class="logo-icon p-l-10">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="{{ asset('assets/images/logo-icon.png') }}" alt="homepage" class="light-logo" />

                </b>
                <!--End Logo icon -->
                 <!-- Logo text -->
                <span class="logo-text">
                     <!-- dark Logo text -->
                     <img src="{{ asset('assets/images/logo-text.png') }}" alt="homepage" class="light-logo" />

                </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-right">
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong style="color:white">{{ Auth::user()->username }}</strong></a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated">
                      <a class="dropdown-item"><h5>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</h5></a>
                        <div class="p-l-30 p-10"><a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-sm btn-danger btn-rounded">Logout</a></div>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
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
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Menu</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/donors') }}" aria-expanded="false"><i class="mdi mdi-account-edit"></i><span class="hide-menu">Manage Donor</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-settings"></i><span class="hide-menu">Employee</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ url('/admin/createAC') }}" class="sidebar-link"><i class="mdi mdi-account-plus"></i><span class="hide-menu"> Create Employee Account </span></a></li>
                        <li class="sidebar-item"><a href="{{ url('/admin/employees') }}" class="sidebar-link"><i class="mdi mdi-account-multiple"></i><span class="hide-menu"> Manage Employee Account </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-file-multiple"></i><span class="hide-menu">Catalog</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ url('/admin/createCatalog') }}" class="sidebar-link"><i class="mdi mdi-table-large"></i><span class="hide-menu"> Create Catalog </span></a></li>
                        <li class="sidebar-item"><a href="{{ url('/admin/managedonation') }}" class="sidebar-link"><i class="mdi mdi-table-edit"></i><span class="hide-menu"> Manage Catalog </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/auditlogs') }}" aria-expanded="false"><i class="mdi mdi-book-open"></i><span class="hide-menu">Audit Logs</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
