<!DOCTYPE html>
<html class="no-js before-run" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">

  <title>Login | UMKM NAIK KELAS</title>

  <link rel="apple-touch-icon" href="{{url('remark/assets/images/apple-touch-icon.png')}}">
  <link rel="shortcut icon" href="{{asset('images/logo-small.png')}}">

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
  <link rel="stylesheet" href="{{url('remark/assets/vendor/toastr/toastr.css')}}">


  <!-- Page -->
  <link rel="stylesheet" href="{{url('remark/assets/css/pages/login.css')}}">

  {{Html::style('remark/assets/fonts/web-icons/web-icons.min.css')}}
    {{Html::style('remark/assets/fonts/brand-icons/brand-icons.min.css')}}
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>  


  <!--[if lt IE 9]>
    <script src="../../assets/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

  <!--[if lt IE 10]>
    <script src="../../assets/vendor/media-match/media.match.min.js"></script>
    <script src="../../assets/vendor/respond/respond.min.js"></script>
    <![endif]-->

  <!-- Scripts -->
    {{Html::script(asset('remark/assets/vendor/modernizr/modernizr.js'))}}
    {{Html::script(asset('remark/assets/vendor/breakpoints/breakpoints.js'))}}
  <script>
    Breakpoints();
  </script>
  <style type="text/css">
    a {
    color: #000000;
    text-decoration: none;
}
a:focus, a:hover {
    color: #ffffff;
    text-decoration: underline;
}
  </style>
</head>
<body class="page-login layout-full">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


  <!-- Page -->
  <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
  data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle">
      <div class="brand">
      <a href="{{url('/')}}">
        <img class="brand-img" src="{{url('images/logo.png')}}" alt="logo">
      </a>        
      </div>
      <p>Silahkan Masukkan Akun Anda</p>
      <form method="post" action="{{ route('login') }}">        
      {{ csrf_field() }}
        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
          <label class="sr-only" for="inputEmail">Email</label>
          <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
        </div>
        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
          <label class="sr-only" for="inputPassword">Password</label>
          <input type="password" class="form-control" id="inputPassword" name="password"
          placeholder="Password">
        </div>
        <div class="form-group clearfix">
          <div class="checkbox-custom checkbox-inline pull-left">
            <input type="checkbox" id="inputCheckbox" name="checkbox">
            <label for="inputCheckbox">Ingatkan Saya</label>
          </div>
          <a class="pull-right" href="{{ route('password.request') }}">Lupa password?</a>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
      </form>
      <p>Tidak punya akun ? Silahkan <a style="color: #f16f35;font-weight: bold;" href="{{url('register')}}">Daftar Disini</a></p>
      <p>
      <a href="redirect/facebook" class="btn btn-labeled social-facebook">
                    <span class="btn-label"><i class="icon bd-facebook" aria-hidden="true"></i></span>Masuk</a> Atau
        <a href="redirect/twitter" class="btn btn-labeled social-twitter">
                    <span class="btn-label"><i class="icon bd-twitter" aria-hidden="true"></i></span>Masuk</a></p>
      <footer class="page-copyright">
        <p>WEBSITE BY PeacBromo</p>
        <p>© 2017. All RIGHT RESERVED.</p>
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
<script src="{{url('remark/assets/vendor/toastr/toastr.js')}}"></script>

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
  <script src="{{url('remark/assets/js/components/jquery-placeholder.js')}}"></script>
  <script src="{{url('remark/assets/js/components/toastr.js')}}"></script>

  <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();        
      });
    })(document, window, jQuery);

    {{$errors->all()?'error()':''}}    

    function error()
    {
      toastr.warning('Email dan Password Salah');
    }
  </script>

</body>

</html>