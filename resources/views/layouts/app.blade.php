<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <meta charset="utf-8">
    <title>Blood Bank</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="{{asset('assets/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{asset('assets/plugins/bootstrapv3/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/bootstrapv3/css/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{asset('assets/plugins/animate.min.css" rel="stylesheet') }}" type="text/css" />
    <link href="{{asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css" />
    <link href="/webarch/css/webarch.css" rel="stylesheet" type="text/css" />
    <link href="/assets/plugins/jquery-notifications/css/messenger.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="/assets/plugins/jquery-notifications/css/messenger-theme-flat.css" rel="stylesheet" type="text/css" media="screen" />
   
</head>

<body class="pace-done">
    <div class="header navbar navbar-inverse ">
        <!-- BEGIN TOP NAVIGATION BAR -->
        <div class="navbar-inner">
            <div class="header-seperation" style="background-color:#B83841 !important;">
                <ul class="nav pull-left notifcation-center visible-xs visible-sm">
                    <li class="dropdown">
                        <a href="#main-menu" style="background-color:#B83841 !important;" data-webarch="toggle-left-side">
                            <i class="material-icons">menu</i>
                        </a>
                    </li>
                </ul>
                <!-- BEGIN LOGO -->
            <img src="/img/logo.png" class="logo" alt="" data-src="/img/logo.png" data-src-retina="/assets/img/logo.png" width="106" height="21">
            </div>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <div class="header-quick-nav" style="background-color:#B83841 !important;">

                    <div class = "pull-left" style = " font-style: bold; font-size: 20px; color:#FFCBCE; margin-top :12px !important;  margin-left :20% !important;">
                            <span >With donation , You can save lives</span> 
                    </div> 

                <div class = "pull-right">
                    <img src = "/img/logo3.png" style ="margin-top:4px" width="50" height="50" >
                </div>   
               
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END TOP NAVIGATION BAR -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container row-fluid">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar "  id="main-menu">
            <!-- BEGIN MINI-PROFILE -->
            <div class="scroll-wrapper page-sidebar-wrapper scrollbar-dynamic" style="position: relative;">
                <div class="page-sidebar-wrapper scrollbar-dynamic scroll-content" id="main-menu-wrapper" style="margin-bottom: -17px; margin-right: -17px;">
                    <div class="user-info-wrapper sm">
                        <div class="profile-wrapper sm">
                            <img src="/img/avatar.jpg"  width="69" height="69">
                            <div class="availability-bubble online"></div>
                        </div>
                        <div class="user-info sm">
                            <div class="username" style="margin-top:10px">{{Session::get('cur_user')["name"]}}</div>
                            <div class="status"> &nbsp;</div>
                        </div>
                    </div>
                    <!-- END MINI-PROFILE -->
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul>
                        <li>
                            <a href="/"> <i class="material-icons">home</i> <span class="title">Home</span> </a>
                        </li>
                        <li>
                            <a href="/profile"> <i class="material-icons">apps</i> <span class="title">Profile</span> </a>
                        </li>
                        <li>
                            <a href="/settings"> <i class="material-icons">settings_applications</i> <span class="title">Settings</span> </a>
                        </li>
                        <li>
                            <a href="/logout"> <i class="material-icons">power_settings_new</i> <span class="title">Log out</span> </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                    <!-- END SIDEBAR MENU -->
                </div>
                <div class="scroll-element scroll-x">
                    <div class="scroll-element_outer">
                        <div class="scroll-element_size"></div>
                        <div class="scroll-element_track"></div>
                        <div class="scroll-bar" style="width: 96px;">
                        </div>
                    </div>
                </div>
                <div class="scroll-element scroll-y">
                    <div class="scroll-element_outer">
                        <div class="scroll-element_size">
                        </div>
                        <div class="scroll-element_track">
                        </div>
                        <div class="scroll-bar" style="height: 96px; top: 0px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="clearfix"></div>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>

    <div class="modal fade" id = "loading_modal" tabindex="-1" role="dialog">
            <div style="margin-left : 50% ; margin-top :30%" class="modal-dialog modal-dialog-centered justify-content-center" role="document">
                <span style = " color: white;"class="fa fa-spinner fa-spin fa-7x"></span>
            </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('assets/plugins/jquery/jquery-3.4.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/pace/pace.min.js')}}" type="text/javascript"></script>
    <!-- BEGIN JS DEPENDECENCIES--> 
    <script src="{{asset('assets/plugins/bootstrapv3/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/jquery-block-ui/jqueryblockui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/jquery-unveil/jquery.unveil.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/bootstrap-select2/select2.min.js')}}" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-notifications/js/messenger.min.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-notifications/js/messenger-theme-future.js" type="text/javascript"></script>
    <script src="/webarch/js/webarch.js" type="text/javascript"></script>
    <script src="{{asset('js/nav.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/material_modal.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/posts.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/home.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/profile.js')}}" type="text/javascript"></script>
</html>