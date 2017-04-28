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
                <a class="navbar-brand navbar-brand-center" href="{{ url('/home') }}">
                  <img src="{{url('images/logo-small.png')}}">
                </a>
              </div>
              <div class="collapse navbar-collapse" id="example-navbar-search-overlap-collapse">
                  @if(Auth::user())                  
                  <ul class="nav navbar-toolbar navbar-right">                
                    <li class="dropdown">
                    <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                      {{Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu" role="menu">    
                      <li role="presentation">
                        <a href="javascript:void(0)" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Settings</a>
                      </li>
                      <li class="divider" role="presentation"></li>
                      <li role="presentation">                    
                        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="javascript:void(0)" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        </li>
                    </ul>
                  </li>
                  </ul>
                  @else
                  <ul class="nav navbar-toolbar navbar-right">
                  <li class="hidden-float">
                      <a class="icon wb-search collapsed" data-toggle="collapse" href="javascript:void(0)" data-target="#example-navbar-search-overlap" role="button" aria-expanded="false">
                        <span class="sr-only">Toggle Search</span>
                      </a>
                    </li>
                    <li><a href="{{ url('/login') }}">MASUK <span class="sr-only">(current)</span></a></li>
                    <li><a href="{{ url('/register') }}">DAFTAR</a></li>               
                  </ul>
                  @endif
              </div>
              <div class="navbar-search-overlap collapse" id="example-navbar-search-overlap" aria-expanded="false" style="height: 0px;">
                <form role="search">
                  <div class="form-group">
                    <div class="input-search">
                      <i class="input-search-icon wb-search" aria-hidden="true"></i>
                      <input type="text" class="form-control" placeholder="Search">
                      <button type="button" class="input-search-close icon wb-close collapsed" data-target="#example-navbar-search-overlap" data-toggle="collapse" aria-label="Close" aria-expanded="false"></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </nav>