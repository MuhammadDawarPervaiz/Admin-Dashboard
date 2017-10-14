<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        

        <!-- BEGIN META TAGS -->
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta content="width=device-width, initial-scale=1" name="viewport" />
            <!-- CSRF Token -->
                <meta name="csrf-token" content="{{ csrf_token() }}">
            @yield('meta_description')
            <meta content="" name="author" />
        <!-- END META TAGS -->

        <!-- Styles -->
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
            <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
            <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
            <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
            <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
            <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
            <link href="../assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />
            <link href="../assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->

        @yield('stylesheets')
        <style>
            #flash
            {
                position: absolute;
                margin-top: 10px;
                margin-left: 350px;
                opacity: .8;
                z-index: 10;
            }
        </style>

        <!-- BEGIN PAGE LEVEL PLUGINS -->
            @yield('page_level_plugins')
        <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN THEME GLOBAL STYLES -->
            @yield('theme_global_styles')
            <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
            <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->

        <!-- BEGIN PAGE LEVEL STYLES -->
            @yield('page_level_styles')
        <!-- END PAGE LEVEL STYLES -->

        <!-- BEGIN THEME LAYOUT STYLES -->
            @yield('theme_layout_styles')       
            <link href="../assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
            <link href="../assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
            <link href="../assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <!-- END THEME LAYOUT STYLES -->

        <link rel="shortcut icon" href="../assets/layouts/layout/img/logo.png" />
        
        <!-- Stylesheet For Printing -->
            <link href="{{ asset('css/print.css') }}" rel="stylesheet" type="text/css" media="print" />

        <!-- Scripts -->
            <script>
                window.Laravel = {!! json_encode([
                    'csrfToken' => csrf_token(),
                ]) !!};
            </script>
    </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top hide-to-print">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="{{ url('dashboard') }}">
                            @php ($images = App\company_details::select('logo_image')->limit(1)->get())
                            @foreach($images as $logo)
                                <img src="{{ asset('uploads/'.$logo->logo_image) }}" alt="logo" class="logo-default" style="height: 20px; width: 150px"/>
                            @endforeach
                        </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
     
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>

                    <div class="top-menu">  
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="../assets/pages/media/profile/photo3.jpg" />
                                    <span class="username username-hide-on-mobile"> {{ Auth::user()->name }} </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="icon-key"></i> Log Out
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>                      
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
        
            <div class="clearfix"> </div>
           
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                    <div class="page-sidebar navbar-collapse collapse hide-to-print">
                        <ul class="page-sidebar-menu  page-header-fixed hide-to-print" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <li class="nav-item start ">
                                <a href="{{ url('dashboard') }}" class="nav-link ">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>   
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a  class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">Orders</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{ url('add_order') }}" class="nav-link ">
                                            <span class="title">Add Order</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{ url('view_order') }}" class="nav-link ">
                                            <span class="title">View Order</span>
                                            <span class="badge badge-danger">{{ session('num_of_orders') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  ">
                                <a  class="nav-link nav-toggle">
                                    <i class="icon-puzzle"></i>
                                    <span class="title">Category</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{ url('add_category') }}" class="nav-link ">
                                            <span class="title">Add Category</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{ url('view_category') }}" class="nav-link ">
                                            <span class="title">View Category</span>
                                            <span class="badge badge-danger">{{ session('num_of_cat') }}</span>
                                        </a>
                                    </li>    
                                </ul>
                            </li>
                            <li class="nav-item  ">
                                <a class="nav-link nav-toggle">
                                    <i class="icon-settings"></i>
                                    <span class="title">Brand</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{ url('add_brand') }}" class="nav-link ">
                                            <span class="title">Add Brands</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{ url('view_brand') }}" class="nav-link ">
                                            <span class="title">View Brands</span>
                                            <span class="badge badge-danger">{{ session('num_of_brands') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-bulb"></i>
                                    <span class="title">Customer</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{ url('add_customer') }}" class="nav-link ">
                                            <span class="title">Add Customers</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{ url('view_customer') }}" class="nav-link ">
                                            <span class="title">View Customers</span>
                                            <span class="badge badge-danger">{{ session('num_of_cus') }}</span>
                                        </a>
                                    </li> 
                                </ul>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                  <i class="fa fa-sticky-note-o"></i>
                                    <span class="title">Status</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{ url('add_status') }}" class="nav-link ">
                                            <span class="title">Add Status</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{ url('view_status') }}" class="nav-link ">
                                            <span class="title">View Status</span>
                                            <span class="badge badge-danger">{{ session('num_of_statuses') }}</span>
                                        </a>
                                    </li> 
                                </ul> 
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-settings"></i>
                                    <span class="title">Settings</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{ url('general_settings') }}" class="nav-link ">
                                            <span class="title">General</span>
                                        </a>
                                    </li>
                                    <!--
                                    <li class="nav-item  ">
                                        <a href="{{ url('user_settings') }}" class="nav-link ">
                                            <span class="title">User</span>
                                        </a>
                                    </li>
                                    --> 
                                </ul> 
                            </li>
                            <!-- For Further query
                            <li class="nav-item  ">
                                <a href="{{ url('view_report') }}" class="nav-link nav-toggle">
                                    <i class="icon-briefcase"></i>
                                    <span class="title">View Reports</span>
                                </a>
                            </li>
                            -->
                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <br/>
                        <div class="row">
                            @yield('print_btn')
                        </div>
                    </div>
                <!-- END SIDEBAR -->

                <!-- BEGIN CONTENT -->
                    <div class="page-content-wrapper">
                        <!-- BEGIN CONTENT BODY -->
                            <div class="page-content">
                                <!-- BEGIN PAGE HEADER-->
                                    <!-- BEGIN THEME PANEL -->
                                        <div class="theme-panel hidden-xs hidden-sm hide-to-print">
                                            <div class="toggler"> </div>
                                            <div class="toggler-close"> </div>
                                            <div class="theme-options">
                                                <div class="theme-option theme-colors clearfix">
                                                    <span> THEME COLOR </span>
                                                    <ul>
                                                        <li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default"> </li>
                                                        <li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue"> </li>
                                                        <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue"> </li>
                                                    <!--<li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey"> </li>-->
                                                        <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light"> </li>
                                                    <!--<li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2"> </li>-->
                                                    </ul>
                                                </div>
                                                <div class="theme-option">
                                                    <span> Theme Style </span>
                                                    <select class="layout-style-option form-control input-sm">
                                                        <option value="square" selected="selected">Square corners</option>
                                                        <option value="rounded">Rounded corners</option>
                                                    </select>
                                                </div>
                                           <!-- <div class="theme-option">
                                                    <span> Layout </span>
                                                    <select class="layout-option form-control input-sm">
                                                        <option value="fluid" selected="selected">Fluid</option>
                                                        <option value="boxed">Boxed</option>
                                                    </select>
                                                </div>-->
                                                <div class="theme-option">
                                                    <span> Header </span>
                                                    <select class="page-header-option form-control input-sm">
                                                        <option value="fixed" selected="selected">Fixed</option>
                                                        <option value="default">Default</option>
                                                    </select>
                                                </div>
                                                <div class="theme-option">
                                                    <span> Top Menu Dropdown</span>
                                                    <select class="page-header-top-dropdown-style-option form-control input-sm">
                                                        <option value="light" selected="selected">Light</option>
                                                        <option value="dark">Dark</option>
                                                    </select>
                                                </div>
                                                <div class="theme-option">
                                                    <span> Sidebar Mode</span>
                                                    <select class="sidebar-option form-control input-sm">
                                                        <option value="fixed">Fixed</option>
                                                        <option value="default" selected="selected">Default</option>
                                                    </select>
                                                </div>
                                                <div class="theme-option">
                                                    <span> Sidebar Menu </span>
                                                    <select class="sidebar-menu-option form-control input-sm">
                                                        <option value="accordion" selected="selected">Accordion</option>
                                                        <option value="hover">Hover</option>
                                                    </select>
                                                </div>
                                                <div class="theme-option">
                                                    <span> Sidebar Style </span>
                                                    <select class="sidebar-style-option form-control input-sm">
                                                        <option value="default" selected="selected">Default</option>
                                                        <option value="light">Light</option>
                                                    </select>
                                                </div>
                                                <div class="theme-option">
                                                    <span> Sidebar Position </span>
                                                    <select class="sidebar-pos-option form-control input-sm">
                                                        <option value="left" selected="selected">Left</option>
                                                        <option value="right">Right</option>
                                                    </select>
                                                </div>
                                                <div class="theme-option">
                                                    <span> Footer </span>
                                                    <select class="page-footer-option form-control input-sm">
                                                        <option value="fixed">Fixed</option>
                                                        <option value="default" selected="selected">Default</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- END THEME PANEL -->

                                    <!-- BEGIN PAGE BAR -->
                                        <div class="page-bar hide-to-print">
                                            <ul class="page-breadcrumb">
                                                <li>
                                                    <a href="{{ url('dashboard') }}">Home</a>
                                                    <i class="fa fa-circle"></i>
                                                </li>
                                                <li>
                                                    <span>@yield('title')</span>
                                                </li>
                                            </ul>
                                            @if($flash = session('message'))
                                                <div id="flash" class="alert alert-success text-center" role="alert">
                                                    {{ $flash }}
                                                </div>
                                            @endif
                                            @if($flash = session('exception'))
                                                <div id="flash" class="alert alert-danger text-center" role="alert">
                                                    {{ $flash }}
                                                </div>
                                            @endif
                                            @if (count($errors) > 0)
                                                <div id="flash" class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    <!-- END PAGE BAR -->
                                    
                                    <!-- BEGIN PAGE TITLE-->
                                        @yield('page_title')
                                    <!-- END PAGE TITLE-->
                                    
                                <!-- END PAGE HEADER-->
                                
                                @yield('content')

                            </div>
                        <!-- END CONTENT BODY -->
                    </div>
                <!-- END CONTENT -->
                
                <!-- BEGIN QUICK SIDEBAR -->
                    @yield('quick_sidebar')
                <!-- END QUICK SIDEBAR -->
            
            </div>
            <!-- END CONTAINER -->
            
            <!-- BEGIN FOOTER -->
            <div class="page-footer hide-to-print">
                <div class="page-footer-inner"> 2016 &copy;Admin Panel By &nbsp;|&nbsp;
                    <a target="_blank" class="hide-to-print" href="http://zeroonelogix.com/">ZeroOneLogix
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->
        </div>

        <!-- BEGIN QUICK NAV -->
            <div class="quick-nav-overlay"></div>
        <!-- END QUICK NAV -->

        <!-- Begin SCRIPTS -->

            <!-- BEGIN CORE PLUGINS -->
                <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
                <script src="../assets/layouts/layout/scripts/awesomplete.min.js" type="text/javascript"></script>
                <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
                <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
                <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
                <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
                <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
            <!-- END CORE PLUGINS -->
            
                <script src="../assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
                <script src="../assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
                
            @yield('scripts')

            <!-- BEGIN THEME GLOBAL SCRIPTS -->
                <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->

            <!-- BEGIN THEME LAYOUT SCRIPTS -->
                <script src="../assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
                <script src="../assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
                <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
                <script src="../assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
            <!-- END THEME LAYOUT SCRIPTS -->

            <!-- Google Code for Universal Analytics -->
                <script>
                    @yield('toastr')
                    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                    })(window,document,'script','../../../../../www.google-analytics.com/analytics.js','ga');
                    ga('create', 'UA-37564768-1', 'auto');
                    ga('send', 'pageview');
                </script>
            <!-- End -->

            <!-- Google Tag Manager -->
                <noscript>
                    <iframe src="http://www.googletagmanager.com/ns.html?id=GTM-W276BJ" height="0" width="0" style="display:none;visibility:hidden"></iframe>
                </noscript>
                <script>
                    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                    '../../../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
                    })(window,document,'script','dataLayer','GTM-W276BJ');
                </script>
            <!-- End -->

            <script>
                $(function()
                {
                    $('#flash').delay(200).fadeIn(10000).delay(2000).fadeOut(1000);
                });
            </script>

        <!-- END SCRIPTS -->

    </body>
</html>