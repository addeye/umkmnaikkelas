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


            <!-- Page -->
    {{Html::style('remark/assets/css/pages/errors.css')}}

            <!-- Fonts -->
    {{Html::style('remark/assets/fonts/web-icons/web-icons.min.css')}}
    {{Html::style('remark/assets/fonts/brand-icons/brand-icons.min.css')}}
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>


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
<body class="page-error page-error-404 layout-full">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


<!-- Page -->
<div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
     data-animsition-out="fade-out">
    <div class="page-content vertical-align-middle">
        @yield('content')
        <h2>Halaman Tidak Ditemukan</h2>
        <p class="error-advise">Silhakan Kembali Kehalaman Utama</p>
        <a class="btn btn-primary btn-round" href="{{url('/')}}">Halaman Utama</a>

        <footer class="page-copyright">
            <p>WEBSITE BY PeacBromo</p>
            <p>&copy; 2017. All RIGHT RESERVED.</p>
            <div class="social">
                <a href="javascript:void(0)">
                    <i class="icon bd-twitter" aria-hidden="true"></i>
                </a>
                <a href="javascript:void(0)">
                    <i class="icon bd-facebook" aria-hidden="true"></i>
                </a>
                <a href="javascript:void(0)">
                    <i class="icon bd-dribbble" aria-hidden="true"></i>
                </a>
            </div>
        </footer>
    </div>
</div>
<!-- End Page -->


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


<script>
    (function(document, window, $) {
        'use strict';

        var Site = window.Site;
        $(document).ready(function() {
            Site.run();
        });
    })(document, window, jQuery);
</script>

</body>

</html>