<nav class="navbar navbar-inverse bg-blue-600 navbar-fixed-top" role="navigation">
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
                <a class="navbar-brand navbar-brand-center" href="{{ url('/home') }}">UMKM</a>
              </div>
              <div class="collapse navbar-collapse" id="example-navbar-search-overlap-collapse">
                <ul class="nav navbar-toolbar navbar-right">
                <li class="hidden-float">
                    <a class="icon wb-search collapsed" data-toggle="collapse" href="javascript:void(0)" data-target="#example-navbar-search-overlap" role="button" aria-expanded="false">
                      <span class="sr-only">Toggle Search</span>
                    </a>
                  </li>
                  <li><a href="{{ url('/login') }}">Login <span class="sr-only">(current)</span></a></li>
                  <li><a href="{{ url('/register') }}">Register</a></li>                  
                </ul>
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