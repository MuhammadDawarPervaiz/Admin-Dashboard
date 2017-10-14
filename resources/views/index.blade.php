<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

    <head>
        <title>Login</title>
        
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for " name="description" />
        <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="" name="author" />
        
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
            <!-- Fonts -->
                <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
        
            <link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        
        <!-- BEGIN THEME GLOBAL STYLES -->
            <link href="{{ asset('assets/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
            <link href="{{ asset('assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->

        <!-- BEGIN PAGE LEVEL STYLES -->
            <link href="{{ asset('assets/pages/css/lock.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        
        <!-- BEGIN THEME LAYOUT STYLES -->
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <!-- END THEME LAYOUT STYLES -->
            <link rel="shortcut icon" href="{{ asset('assets/layouts/layout/img/logo.png') }}" />

        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
    </head>
    <!-- END HEAD -->
    
    <body>
        <div class="page-lock">
            <div class="page-logo">
                <a class="brand" href="index.html">
                    <img src="{{ asset('assets/pages/img/logo-big.png') }}" alt="logo" /> 
                </a>
            </div>
            <div class="page-body">
                <div class="lock-head"> Locked </div>
                <div class="lock-body">
                    <div class="pull-left lock-avatar-block">
                        <img src="{{ asset('assets/pages/media/profile/photo3.jpg') }}" class="lock-avatar"> 
                    </div>
                    <form class="lock-form pull-left" action="{{ route('admin.login.submit') }}" method="post">
                        {{ csrf_field() }}
                        <h4>Amanda Smith</h4>
                        <div class="form-group">
                            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" required autofocus/>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-actions">
                            <input type="submit"  class="btn red uppercase" value="Login"/>
                        </div>
                    </form>
                </div>
                <div class="lock-bottom"></div>
            </div>
            @if($flash = session('message'))
                <div id="flash" class="alert alert-default text-center" role="alert">
                    {{ $flash }}
                </div>
            @endif
            <div class="page-footer-custom"> 2017 &copy;ZeroOneLogix</div>
        </div>
        <!--[if lt IE 9]>
            <script src="{{ asset('assets/global/plugins/respond.min.js') }}"></script>
            <script src="{{ asset('assets/global/plugins/excanvas.min.js') }}"></script> 
            <script src="{{ asset('assets/global/plugins/ie8.fix.min.js') }}"></script> 
        <![endif]-->
        
        <!-- BEGIN CORE PLUGINS -->
            <script src="{{ asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
            <script src="{{ asset('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
            
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <script src="{{ asset('assets/pages/scripts/lock.min.js') }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
            
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        
        <!-- Google Code for Universal Analytics -->
            <script>
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
    </body>
</html>