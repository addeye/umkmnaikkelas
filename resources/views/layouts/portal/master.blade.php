<!DOCTYPE html>
<html class="no-js before-run" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">

    <title>@yield('title') | {{config('app.name')}}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" href="{{url('remark/assets/images/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{url('remark/assets/images/favicon.ico')}}">

    <!-- Stylesheets -->
    {{Html::style('remark/assets/css/bootstrap.min.css')}}
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

            <!-- Fonts -->
    {{Html::style('remark/assets/fonts/web-icons/web-icons.min.css')}}
    {{Html::style('remark/assets/fonts/brand-icons/brand-icons.min.css')}}
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    {{Html::style('remark/assets/vendor/owl-carousel/owl.carousel.css')}}
    {{Html::style('remark/assets/vendor/slick-carousel/slick.css')}}
    @yield('css')

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
        .navbar-inverse .navbar-toolbar>li>a {
        color: black;
        }
        .navbar-inverse .navbar-toggle {
        color: black;
        }
        .navbar-inverse .hamburger .hamburger-bar, .navbar-inverse .hamburger:after, .navbar-inverse .hamburger:before {
            background: black;
        }
        .navbar-inverse .navbar-toolbar>li>a:focus, .navbar-inverse .navbar-toolbar>li>a:hover {
            color: #ffffff;
            background-color: #f17036;
        }

        .site-footer {
            height: 44px;
            padding: 10px 30px;
            background-color: rgb(241, 111, 53);
            border-top: 1px solid #ff4f00;
            color: black;
        }
        .navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
            border-color: #f16f35;
        }

        ::-webkit-scrollbar-thumb {
            background: #f16f35;
        }

        ::-webkit-scrollbar-track {
            background: #fff;
        }
        ::-webkit-scrollbar {
            width: 10px;
        }

        .floating {
    position: fixed;
    bottom: 35px;
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
        .navbar-inverse .navbar-toolbar>.active>a, .navbar-inverse .navbar-toolbar>.active>a:focus, .navbar-inverse .navbar-toolbar>.active>a:hover {
            color: #fff;
            background-color: #f16f35;
        }
    </style>

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
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};
    </script>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

@include('layouts.portal.header')


<!-- Page -->
@yield('content')
<!-- End Page -->


@include('layouts.portal.footer')

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

{{Html::script(asset('remark/assets/vendor/slick-carousel/slick.js'))}}

{{Html::script(asset('remark/assets/js/components/bootbox.js'))}}
{{Html::script(asset('remark/assets/js/components/bootstrap-sweetalert.js'))}}
{{Html::script(asset('remark/assets/js/components/toastr.js'))}}

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
            $('#exampleSingleItem').slick();
            // Example Slick Autoplay
        // ----------------------
        $('#exampleAutoplay').slick({
          dots: false,
          infinite: true,
          speed: 500,
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2000,
          prevArrow: null,
         nextArrow: null,
        });

        });
    })(document, window, jQuery);
</script>
@yield('js')

</body>

</html>