<!DOCTYPE html>
<html class="no-js before-run" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">

    <title>@yield('title') | {{config('app.name')}}</title>

    <link rel="apple-touch-icon" href="{{url('remark/assets/images/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('images/logo-small.png')}}">

    <!-- Stylesheets -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    {{Html::style('remark/assets/css/bootstrap.min.css')}}
    {{Html::style('kartika-upload/css/fileinput.min.css')}}
    {{Html::style('remark/assets/css/bootstrap-extend.min.css')}}
    {{Html::style('remark/assets/css/site.min.css')}}

    {{Html::style('remark/assets/vendor/animsition/animsition.css')}}
    {{Html::style('remark/assets/vendor/asscrollable/asScrollable.css')}}
    {{Html::style('remark/assets/vendor/switchery/switchery.css')}}
    {{Html::style('remark/assets/vendor/intro-js/introjs.css')}}
    {{Html::style('remark/assets/vendor/slidepanel/slidePanel.css')}}
    {{Html::style('remark/assets/vendor/flag-icon-css/flag-icon.css')}}

    <!-- Plugin -->
    {{Html::style('remark/assets/vendor/bootstrap-sweetalert/sweet-alert.css')}}
    {{Html::style('remark/assets/vendor/toastr/toastr.css')}}
    {{Html::style('remark/assets/vendor/select2/select2.css')}}

            <!-- Fonts -->
    {{Html::style('remark/assets/fonts/web-icons/web-icons.min.css')}}
    {{Html::style('remark/assets/fonts/brand-icons/brand-icons.min.css')}}
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <!-- Inline -->
    <style>
        .page-content .navbar-fixed-top,
        .page-content .navbar-fixed-bottom {
            position: relative;
        }

        .scrollspy-example {
            position: relative;
            height: 200px;
            padding: 0 20px;
            overflow: auto;
            -webkit-box-shadow: 0 2px 4px rgba(0, 0, 0, .08);
            box-shadow: 0 2px 4px rgba(0, 0, 0, .08);
        }

        .example-fixed {
            height: 400px;
            line-height: 400px;
            text-align: center;
        }

        .example-grid .example-col {
            margin-bottom: 10px;
            word-break: break-all;
        }

        .site-navbar .navbar-header {
    color: #fff;
    background-color: #ffffff;
}

.site-navbar .navbar-header .navbar-toggle {
    color: #060606;
}

.navbar-default .navbar-toolbar>li>a {
    color: #ffffff;
}

.navbar-default .navbar-toolbar>.open>a, .navbar-default .navbar-toolbar>.open>a:focus, .navbar-default .navbar-toolbar>.open>a:hover {
    color: #0e0e0e;
    background-color: rgba(243,247,249,.6);
}
.site-navbar .navbar-header .hamburger .hamburger-bar, .site-navbar .navbar-header .hamburger:after, .site-navbar .navbar-header .hamburger:before {
    background-color: #040404;
}

.site-gridmenu-toggle:after {
    position: relative;
    top: -1px;
    right: -3px;
    display: inline-block;
    font-family: 'Web Icons';
    font-size: 14px;
    font-style: normal;
    font-weight: 400;
    content: '\f183';
    opacity: 0;
    -webkit-transition: opacity .15s;
    -o-transition: opacity .15s;
    transition: opacity .15s;
    -webkit-transform: translate(0,0);
    -ms-transform: translate(0,0);
    -o-transform: translate(0,0);
    transform: translate(0,0);
    text-rendering: auto;
    speak: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    color: black;
}

.scrollable-inverse.scrollable .scrollable-bar-handle {
    background: rgb(233, 143, 46);
}

.navbar-default .hamburger .hamburger-bar, .navbar-default .hamburger:after, .navbar-default .hamburger:before {
    background: #ffffff;
}

.floating {
    position: fixed;
    bottom: 80px;
    right: 30px;
    width: 53px;
    height: 53px;
    border-radius: 50%;
    background-color: #f16f35;
    transition: all 0.3s ease 0s;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
        }
    .floating a {
    display: block;
    line-height: 53px;
    width: 100%;
    text-align: center;
    color: #fff;
    }

.navbar-brand-logo {
    width: 50px;
    height: auto;
    /*margin-left: 50px;*/
    margin-top: -19px;
}

.site-navbar .navbar-header .navbar-brand {
    font-family: Roboto,sans-serif;
    color: #e98f2e;
    cursor: pointer;
}

    </style>
    @yield('css')

    <!--[if lt IE 9]>
    {{Html::script(asset('remark/assets/vendor/html5shiv/html5shiv.min.js'))}}
    <![endif]-->

    <!--[if lt IE 10]>
    {{Html::script(asset('remark/assets/vendor/media-match/media.match.min.js'))}}
    {{Html::script(asset('remark/assets/vendor/respond/respond.min.js'))}}
    <![endif]-->

    <!-- Scripts -->
    {{Html::script(asset('remark/assets/vendor/modernizr/modernizr.js'))}}
    {{Html::script(asset('remark/assets/vendor/breakpoints/breakpoints.js'))}}
    <script>
        Breakpoints();
    </script>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

@include('layouts.apps.header')

@include('layouts.apps.menu')


<!-- Page -->
@yield('content')
<!-- End Page -->


@include('layouts.apps.footer')

<!-- Core  -->
{{Html::script(asset('remark/assets/vendor/jquery/jquery.js'))}}
{{Html::script(asset('remark/assets/vendor/bootstrap/bootstrap.js'))}}
{{Html::script(asset('remark/assets/vendor/animsition/jquery.animsition.js'))}}
{{Html::script(asset('remark/assets/vendor/asscroll/jquery-asScroll.js'))}}
{{Html::script(asset('remark/assets/vendor/mousewheel/jquery.mousewheel.js'))}}
{{Html::script(asset('remark/assets/vendor/asscrollable/jquery.asScrollable.all.js'))}}
{{Html::script(asset('remark/assets/vendor/ashoverscroll/jquery-asHoverScroll.js'))}}

        <!-- Plugins -->
{{Html::script(asset('remark/assets/vendor/switchery/switchery.min.js'))}}
{{Html::script(asset('remark/assets/vendor/intro-js/intro.js'))}}
{{Html::script(asset('remark/assets/vendor/screenfull/screenfull.js'))}}
{{Html::script(asset('remark/assets/vendor/slidepanel/jquery-slidePanel.js'))}}

{{Html::script(asset('remark/assets/vendor/bootbox/bootbox.js'))}}
{{Html::script(asset('remark/assets/vendor/bootstrap-sweetalert/sweet-alert.js'))}}
{{Html::script(asset('remark/assets/vendor/toastr/toastr.js'))}}

{{Html::script(asset('remark/assets/vendor/formvalidation/formValidation.min.js'))}}
{{Html::script(asset('remark/assets/vendor/formvalidation/framework/bootstrap.min.js'))}}

{{Html::script(asset('kartika-upload/js/plugins/canvas-to-blob.min.js'))}}
{{Html::script(asset('kartika-upload/js/plugins/sortable.min.js'))}}
{{Html::script(asset('kartika-upload/js/plugins/purify.min.js'))}}
{{Html::script(asset('kartika-upload/js/fileinput.min.js'))}}

{{Html::script(asset('kartika-upload/themes/fa/theme.js'))}}
{{Html::script(asset('kartika-upload/js/locales/id.js'))}}

{{Html::script(asset('remark/assets/vendor/select2/select2.min.js'))}}

        <!-- Scripts -->
{{Html::script(asset('remark/assets/js/core.js'))}}
{{Html::script(asset('remark/assets/js/site.js'))}}

{{Html::script(asset('remark/assets/js/sections/menu.js'))}}
{{Html::script(asset('remark/assets/js/sections/menubar.js'))}}
{{Html::script(asset('remark/assets/js/sections/sidebar.js'))}}

{{Html::script(asset('remark/assets/js/configs/config-colors.js'))}}
{{Html::script(asset('remark/assets/js/configs/config-tour.js'))}}

{{Html::script(asset('remark/assets/js/components/asscrollable.js'))}}
{{Html::script(asset('remark/assets/js/components/animsition.js'))}}
{{Html::script(asset('remark/assets/js/components/slidepanel.js'))}}
{{Html::script(asset('remark/assets/js/components/switchery.js'))}}

{{Html::script(asset('remark/assets/js/components/bootbox.js'))}}
{{Html::script(asset('remark/assets/js/components/bootstrap-sweetalert.js'))}}
{{Html::script(asset('remark/assets/js/components/toastr.js'))}}

{{Html::script(asset('remark/assets/js/components/select2.js'))}}

{{Html::script(asset('price-format/jquery.priceformat.js'))}}

{{--<script src="http://maps.google.com/maps/api/js"></script>--}}
{{--{{Html::script(asset('js/gmaps.js'))}}--}}


<!-- Include this after the sweet alert js file -->
    <script type="text/javascript">
        $(window).load(function(){
  $(document).ready(function () {
      
      @if (Session::has('sweet_alert.alert'))
    
        swal({!! Session::get('sweet_alert.alert') !!});
    
    @endif
    });
});
    </script>


<script>
    (function(document, window, $) {
        'use strict';
        var Site = window.Site;
        $(document).ready(function() {
            Site.run();

        });
    })(document, window, jQuery);
</script>
{{--<script>--}}
    {{--var map = new GMaps({--}}
        {{--el: '#map',--}}
        {{--lat: -12.043333,--}}
        {{--lng: -77.028333--}}
    {{--});--}}
{{--</script>--}}
@yield('js')
</body>

</html>