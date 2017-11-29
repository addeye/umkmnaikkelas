<nav class="navbar navbar-inverse bg-white navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="navbar-toggle hamburger hamburger-close collapsed" data-target="#example-navbar-search-overlap-collapse" data-toggle="collapse" type="button">
                <span class="sr-only">
                    Toggle navigation
                </span>
                <span class="hamburger-bar">
                </span>
            </button>
            <button aria-expanded="false" class="navbar-toggle collapsed" data-target="#example-navbar-search-overlap" data-toggle="collapse" type="button">
                <span class="sr-only">
                    Toggle Search
                </span>
                <i aria-hidden="true" class="icon wb-search">
                </i>
            </button>
            <a class="navbar-brand navbar-brand-center" href="{{ url('/') }}">
                <img src="{{url('images/logo-small.png')}}">
                </img>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="example-navbar-search-overlap-collapse">
            @if(Auth::user())
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li class="dropdown">
                    <a aria-expanded="false" class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="avatar avatar-online">
                            @if(!Auth::user()->image)
                            <img alt="..." src="{{asset('remark/assets/portraits/5.jpg')}}">
                                @else
                                <img alt="..." src="{{asset('uploads/user/images/'.Auth::user()->image)}}">
                                    @endif
                                    <i>
                                    </i>
                                </img>
                            </img>
                        </span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation">
                            <a href="{{route('profile',['id'=>md5(Auth::user()->id)])}}" role="menuitem">
                                <i aria-hidden="true" class="icon wb-user">
                                </i>
                                Setting Akun
                            </a>
                        </li>
                        <li class="divider" role="presentation">
                        </li>
                        <li role="presentation">
                            <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" role="menuitem">
                                <i aria-hidden="true" class="icon wb-power">
                                </i>
                                Logout
                            </a>
                            <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                {{-- <notification></notification> --}}
                {{-- <li class="dropdown">
                    <a aria-expanded="false" data-animation="slide-bottom" data-toggle="dropdown" href="javascript:void(0)" role="button" title="Messages">
                        <i aria-hidden="true" class="icon wb-envelope">
                        </i>
                        <span class="badge badge-info up">
                            3
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                        <li class="dropdown-menu-header" role="presentation">
                            <h5>
                                MESSAGES
                            </h5>
                            <span class="label label-round label-info">
                                New 3
                            </span>
                        </li>
                        <li class="list-group" role="presentation">
                            <div data-role="container">
                                <div data-role="content">
                                    <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="media-left padding-right-10">
                                                <span class="avatar avatar-sm avatar-online">
                                                    <img alt="..." src="{{ asset('remark/assets/portraits/2.jpg')}}"/>
                                                    <i>
                                                    </i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">
                                                    Mary Adams
                                                </h6>
                                                <div class="media-meta">
                                                    <time datetime="2015-06-17T20:22:05+08:00">
                                                        30 minutes ago
                                                    </time>
                                                </div>
                                                <div class="media-detail">
                                                    Anyways, i would like just do it
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="media-left padding-right-10">
                                                <span class="avatar avatar-sm avatar-off">
                                                    <img alt="..." src="{{url('remark/assets/portraits/3.jpg')}}"/>
                                                    <i>
                                                    </i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">
                                                    Caleb Richards
                                                </h6>
                                                <div class="media-meta">
                                                    <time datetime="2015-06-17T12:30:30+08:00">
                                                        12 hours ago
                                                    </time>
                                                </div>
                                                <div class="media-detail">
                                                    I checheck the document. But there seems
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="media-left padding-right-10">
                                                <span class="avatar avatar-sm avatar-busy">
                                                    <img alt="..." src="{{url('remark/assets/portraits/4.jpg')}}"/>
                                                    <i>
                                                    </i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">
                                                    June Lane
                                                </h6>
                                                <div class="media-meta">
                                                    <time datetime="2015-06-16T18:38:40+08:00">
                                                        2 days ago
                                                    </time>
                                                </div>
                                                <div class="media-detail">
                                                    Lorem ipsum Id consectetur et minim
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="media-left padding-right-10">
                                                <span class="avatar avatar-sm avatar-away">
                                                    <img alt="..." src="../../assets/portraits/5.jpg"/>
                                                    <i>
                                                    </i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">
                                                    Edward Fletcher
                                                </h6>
                                                <div class="media-meta">
                                                    <time datetime="2015-06-15T20:34:48+08:00">
                                                        3 days ago
                                                    </time>
                                                </div>
                                                <div class="media-detail">
                                                    Dolor et irure cupidatat commodo nostrud nostrud.
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-menu-footer" role="presentation">
                            <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                <i aria-hidden="true" class="icon wb-settings">
                                </i>
                            </a>
                            <a href="javascript:void(0)" role="menuitem">
                                See all messages
                            </a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
            {{-- navbar include --}}

      @if(Auth::user()->role_id==ROLE_PENDAMPING)
        @include('layouts.portal.menu_pendamping')
      @elseif(Auth::user()->role_id==ROLE_UMKM)
        @include('layouts.portal.menu_umkm')
      @elseif(Auth::user()->role_id==ROLE_CALON)
        @include('layouts.portal.menu_calon')
      @endif

      @else
            <ul class="nav navbar-toolbar navbar-right">
                <li>
                    <a href="{{ url('/login') }}">
                        <i class="icon fa-sign-in">
                        </i>
                        MASUK
                        <span class="sr-only">
                            (current)
                        </span>
                    </a>
                </li>
                {{--
                <li>
                    <a href="{{ url('/register') }}">
                        DAFTAR UMKM
                    </a>
                </li>
                --}}
                <li class="dropdown">
                    <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">
                        <i class="icon fa-pencil">
                        </i>
                        DAFTAR
                        <span class="caret">
                        </span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation">
                            <a href="{{ url('/register/umkm') }}" role="menuitem">
                                <i class="icon fa-shopping-cart">
                                </i>
                                UMKM
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="{{ url('/register/pendamping') }}" role="menuitem">
                                <i class="icon wb-user-circle">
                                </i>
                                PENDAMPING
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            @endif
        </div>
    </div>
</nav>