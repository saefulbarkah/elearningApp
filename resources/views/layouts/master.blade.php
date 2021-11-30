<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->


<!-- Mirrored from radixtouch.com/templates/admin/redstar/source/light/blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Oct 2021 14:50:45 GMT -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="RedstarHospital" />
    <title>Elearning</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <!-- icons -->
    <link href="{{ asset('assets/bundles/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--bootstrap -->
    <link href="{{ asset('assets/bundles/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/bundles/flatpicker/css/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="{{ asset('assets/bundles/material/material.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/material_style.css')}}">
    <!-- Theme Styles -->
    <link href="{{ asset('assets/css/theme_style.css') }}" rel="stylesheet" id="rt_style_components" type="text/css" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/formlayout.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/theme-color.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/font-awesome/css/all.css') }}" rel="stylesheet">
    @stack('css')
    <!-- favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" />
</head>
<!-- END HEAD -->

<body
    class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
        <!-- start header -->
        <div class="page-header navbar navbar-fixed-top">
            @include('layouts.component.navbar')
        </div>
        <!-- end header -->
        <!-- start color quick setting -->
        <div class="settingSidebar">
            <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
            </a>
            <div class="settingSidebar-body ps-container ps-theme-default">
                <div class=" fade show active">
                    <div class="setting-panel-header">Setting Panel
                    </div>
                    <div class="quick-setting slimscroll-style">
                        <ul id="themecolors">
                            <li>
                                <p class="sidebarSettingTitle">Sidebar Color</p>
                            </li>
                            <li class="complete">
                                <div class="theme-color sidebar-theme">
                                    <a href="#" data-theme="white"><span class="head"></span><span
                                            class="cont"></span></a>
                                    <a href="#" data-theme="dark"><span class="head"></span><span
                                            class="cont"></span></a>
                                    <a href="#" data-theme="blue"><span class="head"></span><span
                                            class="cont"></span></a>
                                    <a href="#" data-theme="indigo"><span class="head"></span><span
                                            class="cont"></span></a>
                                    <a href="#" data-theme="cyan"><span class="head"></span><span
                                            class="cont"></span></a>
                                    <a href="#" data-theme="green"><span class="head"></span><span
                                            class="cont"></span></a>
                                    <a href="#" data-theme="red"><span class="head"></span><span
                                            class="cont"></span></a>
                                </div>
                            </li>
                            <li>
                                <p class="sidebarSettingTitle">Header Brand color</p>
                            </li>
                            <li class="theme-option">
                                <div class="theme-color logo-theme">
                                    <a href="#" data-theme="logo-white"><span class="head"></span><span
                                            class="cont"></span></a>
                                    <a href="#" data-theme="logo-dark"><span class="head"></span><span
                                            class="cont"></span></a>
                                    <a href="#" data-theme="logo-blue"><span class="head"></span><span
                                            class="cont"></span></a>
                                    <a href="#" data-theme="logo-indigo"><span class="head"></span><span
                                            class="cont"></span></a>
                                    <a href="#" data-theme="logo-cyan"><span class="head"></span><span
                                            class="cont"></span></a>
                                    <a href="#" data-theme="logo-green"><span class="head"></span><span
                                            class="cont"></span></a>
                                    <a href="#" data-theme="logo-red"><span class="head"></span><span
                                            class="cont"></span></a>
                                </div>
                            </li>
                            <li>
                                <p class="sidebarSettingTitle">Header color</p>
                            </li>
                            <li class="theme-option">
                                <div class="theme-color header-theme">
                                    <a href="#" data-theme="header-white"><span class="head"></span><span
                                            class="cont"></span></a>
                                    <a href="#" data-theme="header-dark"><span class="head"></span><span
                                            class="cont"></span></a>
                                    <a href="#" data-theme="header-blue"><span class="head"></span><span
                                            class="cont"></span></a>
                                    <a href="#" data-theme="header-indigo"><span class="head"></span><span
                                            class="cont"></span></a>
                                    <a href="#" data-theme="header-cyan"><span class="head"></span><span
                                            class="cont"></span></a>
                                    <a href="#" data-theme="header-green"><span class="head"></span><span
                                            class="cont"></span></a>
                                    <a href="#" data-theme="header-red"><span class="head"></span><span
                                            class="cont"></span></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end color quick setting -->
        <!-- start page container -->
        <div class="page-container">
            <!-- start sidebar menu -->
            <div class="sidebar-container">
                @role('admin')
                @include('layouts.component.sidebar-admin')
                @endrole
                @role('teacher')
                @include('layouts.component.sidebar-teacher')
                @endrole
                @role('student')
                @include('layouts.component.sidebar-student')
                @endrole
            </div>
            <!-- end sidebar menu -->
            <!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class="pull-left">
                                <div class="page-title">@yield('title-page')</div>
                            </div>
                        </div>
                    </div>
                    @yield('content')
                    <!-- add content here -->
                </div>
            </div>
            <!-- end page content -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
        {{-- <div class="page-footer fixed">
            <div class="page-footer-inner"> 2021 &copy; RedStar Hospital Template By
                <a href="https://radixtouch.com/cdn-cgi/l/email-protection#5624333225223724223e333b3316313b373f3a7835393b"
                    target="_top" class="makerCss">Redstartheme</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div> --}}
        <!-- end footer -->
    </div>
    <script src="{{ asset('assets/bundles/jquery/jquery.min.js') }}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <script src="{{ asset('assets/bundles/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/bundles/jquery-blockUI/jquery.blockui.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/jquery.slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('assets/bundles/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <!-- Common js-->
    <script src="{{ asset('assets/app.js') }}"></script>
    <script src="{{ asset('assets/layout.js') }}"></script>
    <script src="{{ asset('assets/theme-color.js') }}"></script>
    <!-- Material -->
    <script src="{{ asset('assets/bundles/material/material.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/material/material.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/flatpicker/js/flatpicker.min.js') }}"></script>
    <!-- end js include path -->
    @stack('js')
    <script src="{{ asset('assets/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/sweetalert2@11.js') }}"></script>
</body>


<!-- Mirrored from radixtouch.com/templates/admin/redstar/source/light/blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Oct 2021 14:50:45 GMT -->

</html>
