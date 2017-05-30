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
                                      <a href="javascript:void(0)" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Profile</a>
                                  </li>
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
                          {{--<li class="dropdown">--}}
                              {{--<a data-toggle="dropdown" href="javascript:void(0)" title="Notifications" aria-expanded="false"--}}
                                 {{--data-animation="slide-bottom" role="button">--}}
                                  {{--<i class="icon wb-bell" aria-hidden="true"></i>--}}
                                  {{--<span class="badge badge-danger up">5</span>--}}
                              {{--</a>--}}
                              {{--<ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">--}}
                                  {{--<li class="dropdown-menu-header" role="presentation">--}}
                                      {{--<h5>NOTIFICATIONS</h5>--}}
                                      {{--<span class="label label-round label-danger">New 5</span>--}}
                                  {{--</li>--}}

                                  {{--<li class="list-group" role="presentation">--}}
                                      {{--<div data-role="container">--}}
                                          {{--<div data-role="content">--}}
                                              {{--<a class="list-group-item" href="javascript:void(0)" role="menuitem">--}}
                                                  {{--<div class="media">--}}
                                                      {{--<div class="media-left padding-right-10">--}}
                                                          {{--<i class="icon wb-order bg-red-600 white icon-circle" aria-hidden="true"></i>--}}
                                                      {{--</div>--}}
                                                      {{--<div class="media-body">--}}
                                                          {{--<h6 class="media-heading">A new order has been placed</h6>--}}
                                                          {{--<time class="media-meta" datetime="2015-06-12T20:50:48+08:00">5 hours ago</time>--}}
                                                      {{--</div>--}}
                                                  {{--</div>--}}
                                              {{--</a>--}}
                                              {{--<a class="list-group-item" href="javascript:void(0)" role="menuitem">--}}
                                                  {{--<div class="media">--}}
                                                      {{--<div class="media-left padding-right-10">--}}
                                                          {{--<i class="icon wb-user bg-green-600 white icon-circle" aria-hidden="true"></i>--}}
                                                      {{--</div>--}}
                                                      {{--<div class="media-body">--}}
                                                          {{--<h6 class="media-heading">Completed the task</h6>--}}
                                                          {{--<time class="media-meta" datetime="2015-06-11T18:29:20+08:00">2 days ago</time>--}}
                                                      {{--</div>--}}
                                                  {{--</div>--}}
                                              {{--</a>--}}
                                              {{--<a class="list-group-item" href="javascript:void(0)" role="menuitem">--}}
                                                  {{--<div class="media">--}}
                                                      {{--<div class="media-left padding-right-10">--}}
                                                          {{--<i class="icon wb-settings bg-red-600 white icon-circle" aria-hidden="true"></i>--}}
                                                      {{--</div>--}}
                                                      {{--<div class="media-body">--}}
                                                          {{--<h6 class="media-heading">Settings updated</h6>--}}
                                                          {{--<time class="media-meta" datetime="2015-06-11T14:05:00+08:00">2 days ago</time>--}}
                                                      {{--</div>--}}
                                                  {{--</div>--}}
                                              {{--</a>--}}
                                              {{--<a class="list-group-item" href="javascript:void(0)" role="menuitem">--}}
                                                  {{--<div class="media">--}}
                                                      {{--<div class="media-left padding-right-10">--}}
                                                          {{--<i class="icon wb-calendar bg-blue-600 white icon-circle" aria-hidden="true"></i>--}}
                                                      {{--</div>--}}
                                                      {{--<div class="media-body">--}}
                                                          {{--<h6 class="media-heading">Event started</h6>--}}
                                                          {{--<time class="media-meta" datetime="2015-06-10T13:50:18+08:00">3 days ago</time>--}}
                                                      {{--</div>--}}
                                                  {{--</div>--}}
                                              {{--</a>--}}
                                              {{--<a class="list-group-item" href="javascript:void(0)" role="menuitem">--}}
                                                  {{--<div class="media">--}}
                                                      {{--<div class="media-left padding-right-10">--}}
                                                          {{--<i class="icon wb-chat bg-orange-600 white icon-circle" aria-hidden="true"></i>--}}
                                                      {{--</div>--}}
                                                      {{--<div class="media-body">--}}
                                                          {{--<h6 class="media-heading">Message received</h6>--}}
                                                          {{--<time class="media-meta" datetime="2015-06-10T12:34:48+08:00">3 days ago</time>--}}
                                                      {{--</div>--}}
                                                  {{--</div>--}}
                                              {{--</a>--}}
                                          {{--</div>--}}
                                      {{--</div>--}}
                                  {{--</li>--}}
                                  {{--<li class="dropdown-menu-footer" role="presentation">--}}
                                      {{--<a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">--}}
                                          {{--<i class="icon wb-settings" aria-hidden="true"></i>--}}
                                      {{--</a>--}}
                                      {{--<a href="javascript:void(0)" role="menuitem">--}}
                                          {{--All notifications--}}
                                      {{--</a>--}}
                                  {{--</li>--}}
                              {{--</ul>--}}
                          {{--</li>--}}



                          {{--<li class="dropdown">--}}
                              {{--<a data-toggle="dropdown" href="javascript:void(0)" title="Messages" aria-expanded="false"--}}
                                 {{--data-animation="slide-bottom" role="button">--}}
                                  {{--<i class="icon wb-envelope" aria-hidden="true"></i>--}}
                                  {{--<span class="badge badge-info up">3</span>--}}
                              {{--</a>--}}
                              {{--<ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">--}}
                                  {{--<li class="dropdown-menu-header" role="presentation">--}}
                                      {{--<h5>MESSAGES</h5>--}}
                                      {{--<span class="label label-round label-info">New 3</span>--}}
                                  {{--</li>--}}

                                  {{--<li class="list-group" role="presentation">--}}
                                      {{--<div data-role="container">--}}
                                          {{--<div data-role="content">--}}
                                              {{--<a class="list-group-item" href="javascript:void(0)" role="menuitem">--}}
                                                  {{--<div class="media">--}}
                                                      {{--<div class="media-left padding-right-10">--}}
                                  {{--<span class="avatar avatar-sm avatar-online">--}}
                                    {{--<img src="../../assets/portraits/2.jpg" alt="..." />--}}
                                    {{--<i></i>--}}
                                  {{--</span>--}}
                                                      {{--</div>--}}
                                                      {{--<div class="media-body">--}}
                                                          {{--<h6 class="media-heading">Mary Adams</h6>--}}
                                                          {{--<div class="media-meta">--}}
                                                              {{--<time datetime="2015-06-17T20:22:05+08:00">30 minutes ago</time>--}}
                                                          {{--</div>--}}
                                                          {{--<div class="media-detail">Anyways, i would like just do it</div>--}}
                                                      {{--</div>--}}
                                                  {{--</div>--}}
                                              {{--</a>--}}
                                              {{--<a class="list-group-item" href="javascript:void(0)" role="menuitem">--}}
                                                  {{--<div class="media">--}}
                                                      {{--<div class="media-left padding-right-10">--}}
                                  {{--<span class="avatar avatar-sm avatar-off">--}}
                                    {{--<img src="../../assets/portraits/3.jpg" alt="..." />--}}
                                    {{--<i></i>--}}
                                  {{--</span>--}}
                                                      {{--</div>--}}
                                                      {{--<div class="media-body">--}}
                                                          {{--<h6 class="media-heading">Caleb Richards</h6>--}}
                                                          {{--<div class="media-meta">--}}
                                                              {{--<time datetime="2015-06-17T12:30:30+08:00">12 hours ago</time>--}}
                                                          {{--</div>--}}
                                                          {{--<div class="media-detail">I checheck the document. But there seems</div>--}}
                                                      {{--</div>--}}
                                                  {{--</div>--}}
                                              {{--</a>--}}
                                              {{--<a class="list-group-item" href="javascript:void(0)" role="menuitem">--}}
                                                  {{--<div class="media">--}}
                                                      {{--<div class="media-left padding-right-10">--}}
                                  {{--<span class="avatar avatar-sm avatar-busy">--}}
                                    {{--<img src="../../assets/portraits/4.jpg" alt="..." />--}}
                                    {{--<i></i>--}}
                                  {{--</span>--}}
                                                      {{--</div>--}}
                                                      {{--<div class="media-body">--}}
                                                          {{--<h6 class="media-heading">June Lane</h6>--}}
                                                          {{--<div class="media-meta">--}}
                                                              {{--<time datetime="2015-06-16T18:38:40+08:00">2 days ago</time>--}}
                                                          {{--</div>--}}
                                                          {{--<div class="media-detail">Lorem ipsum Id consectetur et minim</div>--}}
                                                      {{--</div>--}}
                                                  {{--</div>--}}
                                              {{--</a>--}}
                                              {{--<a class="list-group-item" href="javascript:void(0)" role="menuitem">--}}
                                                  {{--<div class="media">--}}
                                                      {{--<div class="media-left padding-right-10">--}}
                                  {{--<span class="avatar avatar-sm avatar-away">--}}
                                    {{--<img src="../../assets/portraits/5.jpg" alt="..." />--}}
                                    {{--<i></i>--}}
                                  {{--</span>--}}
                                                      {{--</div>--}}
                                                      {{--<div class="media-body">--}}
                                                          {{--<h6 class="media-heading">Edward Fletcher</h6>--}}
                                                          {{--<div class="media-meta">--}}
                                                              {{--<time datetime="2015-06-15T20:34:48+08:00">3 days ago</time>--}}
                                                          {{--</div>--}}
                                                          {{--<div class="media-detail">Dolor et irure cupidatat commodo nostrud nostrud.</div>--}}
                                                      {{--</div>--}}
                                                  {{--</div>--}}
                                              {{--</a>--}}
                                          {{--</div>--}}
                                      {{--</div>--}}
                                  {{--</li>--}}
                                  {{--<li class="dropdown-menu-footer" role="presentation">--}}
                                      {{--<a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">--}}
                                          {{--<i class="icon wb-settings" aria-hidden="true"></i>--}}
                                      {{--</a>--}}
                                      {{--<a href="javascript:void(0)" role="menuitem">--}}
                                          {{--See all messages--}}
                                      {{--</a>--}}
                                  {{--</li>--}}
                              {{--</ul>--}}
                          {{--</li>--}}
                      </ul>
                      <ul class="nav navbar-toolbar navbar-right">
                          <li class="{{set_active(['/','home'],'active')}}"><a href="{{url('/')}}">Dashboard <span class="sr-only">(current)</span></a></li>
                          @if(Auth::user()->role_id==ROLE_PENDAMPING)
                          <li class="dropdown {{set_active(['lembaga-pendamping','jasa-pendampingan','jasa-pendampingan/*'],'active')}}">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
                                 role="button">Pendampingan <span class="caret"></span></a>
                              <ul class="dropdown-menu" role="menu">
                                  <li class="{{set_active('lembaga-pendamping','active')}}" role="presentation"><a href="{{route('lembaga.pendamping')}}" role="menuitem">Lembaga</a></li>
                                  <li class="{{set_active(['jasa-pendampingan','jasa-pendampinga/*'],'active')}}" role="presentation"><a href="{{route('jasa-pendampingan.index')}}" role="menuitem">Jasa Pendampingan</a></li>
                              </ul>
                          </li>
                          @endif

                          @if(Auth::user()->role_id==ROLE_UMKM)
                              <li class="dropdown {{set_active(['data-periode','data-periode/*'],'active')}}">
                                  <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
                                     role="button">Pendataan <span class="caret"></span></a>
                                  <ul class="dropdown-menu" role="menu">
                                      <li class="{{set_active('data-periode','data-periode/*','active')}}" role="presentation"><a href="{{route('data-periode.index')}}" role="menuitem">Data Periode</a></li>
                                  </ul>
                              </li>
                          @endif


                          <li class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
                                 role="button">Layanan <span class="caret"></span></a>
                              <ul class="dropdown-menu" role="menu">
                                  @if(Auth::user()->role_id==ROLE_UMKM)
                                  <li role="presentation"><a href="{{route('pengajuan-umkm.index')}}" role="menuitem">Penghargaan</a></li>
                                  @endif
                                  <li role="presentation"><a href="javascript:void(0)" role="menuitem">Konsultasi</a></li>
                                  <li role="presentation"><a href="javascript:void(0)" role="menuitem">Informasi Pasar</a></li>
                                  <li role="presentation"><a href="javascript:void(0)" role="menuitem">Informasi Terkini</a></li>
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