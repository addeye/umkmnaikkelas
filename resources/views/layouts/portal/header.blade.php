<nav class="navbar navbar-inverse bg-white navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle hamburger hamburger-close collapsed" data-target="#example-navbar-search-overlap-collapse" data-toggle="collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
      <button type="button" class="navbar-toggle collapsed" data-target="#example-navbar-search-overlap" data-toggle="collapse" aria-expanded="false">
        <span class="sr-only">Toggle Search</span>
        <i class="icon wb-search" aria-hidden="true"></i>
      </button>
      <a class="navbar-brand navbar-brand-center" href="{{ url('/') }}">
        <img src="{{url('images/logo-small.png')}}">
      </a>
    </div>
    <div class="collapse navbar-collapse" id="example-navbar-search-overlap-collapse">
      @if(Auth::user())
      <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
        <li class="dropdown">
          <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
            <span class="avatar avatar-online">
              @if(!Auth::user()->image)
              <img src="{{asset('remark/assets/portraits/5.jpg')}}" alt="...">
              @else
              <img src="{{asset('uploads/user/images/'.Auth::user()->image)}}" alt="...">
              @endif
              <i></i>
            </span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li role="presentation">
              <a href="{{route('profile',['id'=>md5(Auth::user()->id)])}}" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Profile</a>
            </li>
            <li class="divider" role="presentation"></li>
            <li role="presentation">
              <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="javascript:void(0)" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </li>
          </ul>
        </li>
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
        <li><a href="{{ url('/login') }}"><i class="icon fa-sign-in"></i> MASUK <span class="sr-only">(current)</span></a></li>
        {{-- <li><a href="{{ url('/register') }}">DAFTAR UMKM</a></li> --}}
        <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
      role="button"><i class="icon fa-pencil"></i> DAFTAR <span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
        <li role="presentation"><a href="{{ url('/register/umkm') }}" role="menuitem"><i class="icon fa-shopping-cart"></i> UMKM</a></li>
        <li role="presentation"><a href="{{ url('/register/pendamping') }}" role="menuitem"><i class="icon wb-user-circle"></i> PENDAMPING</a></li>
    </ul>
</li>
      </ul>
      @endif
    </div>
  </div>
</nav>