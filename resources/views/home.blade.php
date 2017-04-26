@extends('layouts.apps.master')

@section('content')
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">Navbars</h1>
            <ol class="breadcrumb">
                <li><a href="../index.html">Home</a></li>
                <li class="active">Structure</li>
            </ol>
            <div class="page-header-actions">
                <form>
                    <div class="input-search input-search-dark">
                        <i class="input-search-icon wb-search" aria-hidden="true"></i>
                        <input type="text" class="form-control" name="" placeholder="Search...">
                    </div>
                </form>
            </div>
        </div>
        <div class="page-content">
            <!-- Example Default -->
            <div class="example-wrap">
                <h4 class="example-title">Default</h4>
                <p>Navbars are responsive meta components that serve as navigation headers
                    for your application or site. They begin collapsed (and are toggleable)
                    in mobile views and become horizontal as the available viewport width
                    increases.</p>
                <p>Justified navbar nav links are currently not supported.</p>
                <div class="example">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle hamburger hamburger-close collapsed"
                                        data-target="#example-navbar-default-collapse" data-toggle="collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="hamburger-bar"></span>
                                </button>
                                <button type="button" class="navbar-toggle collapsed" data-target="#example-navbar-default-search"
                                        data-toggle="collapse">
                                    <span class="sr-only">Toggle Search</span>
                                    <i class="icon wb-search" aria-hidden="true"></i>
                                </button>
                                <a class="navbar-brand" href="javascript:void(0)">Brand</a>
                            </div>
                            <ul class="nav navbar-nav hidden-float">
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="icon wb-grid-4" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="hidden-xs">
                                    <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                                        <span class="sr-only">Toggle fullscreen</span>
                                    </a>
                                </li>
                                <li class="hidden-float">
                                    <a class="icon wb-search" data-toggle="collapse" href="#example-navbar-default-search"
                                       role="button">
                                        <span class="sr-only">Toggle Search</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="collapse navbar-collapse navbar-collapse-group" id="example-navbar-default-collapse">
                                <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                                    <li class="dropdown">
                                        <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                      <span class="avatar avatar-online">
                        <img src="../../assets/portraits/5.jpg" alt="...">
                        <i></i>
                      </span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li role="presentation">
                                                <a href="javascript:void(0)" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Profile</a>
                                            </li>
                                            <li role="presentation">
                                                <a href="javascript:void(0)" role="menuitem"><i class="icon wb-payment" aria-hidden="true"></i> Billing</a>
                                            </li>
                                            <li role="presentation">
                                                <a href="javascript:void(0)" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Settings</a>
                                            </li>
                                            <li class="divider" role="presentation"></li>
                                            <li role="presentation">
                                                <a href="javascript:void(0)" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" href="javascript:void(0)" title="Notifications" aria-expanded="false"
                                           data-animation="slide-bottom" role="button">
                                            <i class="icon wb-bell" aria-hidden="true"></i>
                                            <span class="badge badge-danger up">5</span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                                            <li class="dropdown-menu-header" role="presentation">
                                                <h5>NOTIFICATIONS</h5>
                                                <span class="label label-round label-danger">New 5</span>
                                            </li>

                                            <li class="list-group" role="presentation">
                                                <div data-role="container">
                                                    <div data-role="content">
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                                                    <i class="icon wb-order bg-red-600 white icon-circle" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">A new order has been placed</h6>
                                                                    <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">5 hours ago</time>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                                                    <i class="icon wb-user bg-green-600 white icon-circle" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Completed the task</h6>
                                                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">2 days ago</time>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                                                    <i class="icon wb-settings bg-red-600 white icon-circle" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Settings updated</h6>
                                                                    <time class="media-meta" datetime="2015-06-11T14:05:00+08:00">2 days ago</time>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                                                    <i class="icon wb-calendar bg-blue-600 white icon-circle" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Event started</h6>
                                                                    <time class="media-meta" datetime="2015-06-10T13:50:18+08:00">3 days ago</time>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                                                    <i class="icon wb-chat bg-orange-600 white icon-circle" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Message received</h6>
                                                                    <time class="media-meta" datetime="2015-06-10T12:34:48+08:00">3 days ago</time>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="dropdown-menu-footer" role="presentation">
                                                <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                                    <i class="icon wb-settings" aria-hidden="true"></i>
                                                </a>
                                                <a href="javascript:void(0)" role="menuitem">
                                                    All notifications
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" href="javascript:void(0)" title="Messages" aria-expanded="false"
                                           data-animation="slide-bottom" role="button">
                                            <i class="icon wb-envelope" aria-hidden="true"></i>
                                            <span class="badge badge-info up">3</span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                                            <li class="dropdown-menu-header" role="presentation">
                                                <h5>MESSAGES</h5>
                                                <span class="label label-round label-info">New 3</span>
                                            </li>

                                            <li class="list-group" role="presentation">
                                                <div data-role="container">
                                                    <div data-role="content">
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                  <span class="avatar avatar-sm avatar-online">
                                    <img src="../../assets/portraits/2.jpg" alt="..." />
                                    <i></i>
                                  </span>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Mary Adams</h6>
                                                                    <div class="media-meta">
                                                                        <time datetime="2015-06-17T20:22:05+08:00">30 minutes ago</time>
                                                                    </div>
                                                                    <div class="media-detail">Anyways, i would like just do it</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                  <span class="avatar avatar-sm avatar-off">
                                    <img src="../../assets/portraits/3.jpg" alt="..." />
                                    <i></i>
                                  </span>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Caleb Richards</h6>
                                                                    <div class="media-meta">
                                                                        <time datetime="2015-06-17T12:30:30+08:00">12 hours ago</time>
                                                                    </div>
                                                                    <div class="media-detail">I checheck the document. But there seems</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                  <span class="avatar avatar-sm avatar-busy">
                                    <img src="../../assets/portraits/4.jpg" alt="..." />
                                    <i></i>
                                  </span>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">June Lane</h6>
                                                                    <div class="media-meta">
                                                                        <time datetime="2015-06-16T18:38:40+08:00">2 days ago</time>
                                                                    </div>
                                                                    <div class="media-detail">Lorem ipsum Id consectetur et minim</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                  <span class="avatar avatar-sm avatar-away">
                                    <img src="../../assets/portraits/5.jpg" alt="..." />
                                    <i></i>
                                  </span>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Edward Fletcher</h6>
                                                                    <div class="media-meta">
                                                                        <time datetime="2015-06-15T20:34:48+08:00">3 days ago</time>
                                                                    </div>
                                                                    <div class="media-detail">Dolor et irure cupidatat commodo nostrud nostrud.</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="dropdown-menu-footer" role="presentation">
                                                <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                                    <i class="icon wb-settings" aria-hidden="true"></i>
                                                </a>
                                                <a href="javascript:void(0)" role="menuitem">
                                                    See all messages
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="nav navbar-toolbar navbar-right">
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
                                           role="button">Dropdown <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li role="presentation"><a href="javascript:void(0)" role="menuitem">Action</a></li>
                                            <li role="presentation"><a href="javascript:void(0)" role="menuitem">Another action</a></li>
                                            <li role="presentation"><a href="javascript:void(0)" role="menuitem">Something else here</a></li>
                                            <li class="divider" role="presentation"></li>
                                            <li role="presentation"><a href="javascript:void(0)" role="menuitem">Separated link</a></li>
                                            <li class="divider" role="presentation"></li>
                                            <li role="presentation"><a href="javascript:void(0)" role="menuitem">One more separated link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div class="collapse navbar-search-overlap" id="example-navbar-default-search">
                                <form role="search">
                                    <div class="form-group">
                                        <div class="input-search">
                                            <i class="input-search-icon wb-search" aria-hidden="true"></i>
                                            <input type="text" class="form-control" name="site-search" placeholder="Search...">
                                            <button type="button" class="input-search-close icon wb-close" data-target="#example-navbar-default-search"
                                                    data-toggle="collapse" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- End Example Default -->

            <!-- Example Inverse -->
            <div class="example-wrap">
                <h4 class="example-title">Inverse</h4>
                <div class="example">
                    <nav class="navbar navbar-inverse" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle hamburger hamburger-close collapsed"
                                        data-target="#example-navbar-inverse-collapse" data-toggle="collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="hamburger-bar"></span>
                                </button>
                                <button type="button" class="navbar-toggle collapsed" data-target="#example-navbar-inverse-search"
                                        data-toggle="collapse">
                                    <span class="sr-only">Toggle Search</span>
                                    <i class="icon wb-search" aria-hidden="true"></i>
                                </button>
                                <a class="navbar-brand" href="javascript:void(0)">Brand</a>
                            </div>
                            <ul class="nav navbar-nav hidden-float">
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="icon wb-grid-4" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="hidden-xs">
                                    <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                                        <span class="sr-only">Toggle fullscreen</span>
                                    </a>
                                </li>
                                <li class="hidden-float">
                                    <a class="icon wb-search" data-toggle="collapse" href="#example-navbar-inverse-search"
                                       role="button">
                                        <span class="sr-only">Toggle Search</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="collapse navbar-collapse navbar-collapse-group" id="example-navbar-inverse-collapse">
                                <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                                    <li class="dropdown">
                                        <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                      <span class="avatar avatar-online">
                        <img src="{{url('remark/assets/portraits/5.jpg')}}" alt="...">
                        <i></i>
                      </span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li role="presentation">
                                                <a href="javascript:void(0)" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Profile</a>
                                            </li>
                                            <li role="presentation">
                                                <a href="javascript:void(0)" role="menuitem"><i class="icon wb-payment" aria-hidden="true"></i> Billing</a>
                                            </li>
                                            <li role="presentation">
                                                <a href="javascript:void(0)" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Settings</a>
                                            </li>
                                            <li class="divider" role="presentation"></li>
                                            <li role="presentation">
                                                <a href="javascript:void(0)" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" href="javascript:void(0)" title="Notifications" aria-expanded="false"
                                           data-animation="slide-bottom" role="button">
                                            <i class="icon wb-bell" aria-hidden="true"></i>
                                            <span class="badge badge-danger up">5</span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                                            <li class="dropdown-menu-header" role="presentation">
                                                <h5>NOTIFICATIONS</h5>
                                                <span class="label label-round label-danger">New 5</span>
                                            </li>

                                            <li class="list-group" role="presentation">
                                                <div data-role="container">
                                                    <div data-role="content">
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                                                    <i class="icon wb-order bg-red-600 white icon-circle" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">A new order has been placed</h6>
                                                                    <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">5 hours ago</time>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                                                    <i class="icon wb-user bg-green-600 white icon-circle" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Completed the task</h6>
                                                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">2 days ago</time>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                                                    <i class="icon wb-settings bg-red-600 white icon-circle" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Settings updated</h6>
                                                                    <time class="media-meta" datetime="2015-06-11T14:05:00+08:00">2 days ago</time>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                                                    <i class="icon wb-calendar bg-blue-600 white icon-circle" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Event started</h6>
                                                                    <time class="media-meta" datetime="2015-06-10T13:50:18+08:00">3 days ago</time>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                                                    <i class="icon wb-chat bg-orange-600 white icon-circle" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Message received</h6>
                                                                    <time class="media-meta" datetime="2015-06-10T12:34:48+08:00">3 days ago</time>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="dropdown-menu-footer" role="presentation">
                                                <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                                    <i class="icon wb-settings" aria-hidden="true"></i>
                                                </a>
                                                <a href="javascript:void(0)" role="menuitem">
                                                    All notifications
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" href="javascript:void(0)" title="Messages" aria-expanded="false"
                                           data-animation="slide-bottom" role="button">
                                            <i class="icon wb-envelope" aria-hidden="true"></i>
                                            <span class="badge badge-info up">3</span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                                            <li class="dropdown-menu-header" role="presentation">
                                                <h5>MESSAGES</h5>
                                                <span class="label label-round label-info">New 3</span>
                                            </li>

                                            <li class="list-group" role="presentation">
                                                <div data-role="container">
                                                    <div data-role="content">
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                  <span class="avatar avatar-sm avatar-online">
                                    <img src="{{url('remark/assets/portraits/2.jpg')}}" alt="..." />
                                    <i></i>
                                  </span>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Mary Adams</h6>
                                                                    <div class="media-meta">
                                                                        <time datetime="2015-06-17T20:22:05+08:00">30 minutes ago</time>
                                                                    </div>
                                                                    <div class="media-detail">Anyways, i would like just do it</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                  <span class="avatar avatar-sm avatar-off">
                                    <img src="{{url('remark/assets/portraits/3.jpg')}}" alt="..." />
                                    <i></i>
                                  </span>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Caleb Richards</h6>
                                                                    <div class="media-meta">
                                                                        <time datetime="2015-06-17T12:30:30+08:00">12 hours ago</time>
                                                                    </div>
                                                                    <div class="media-detail">I checheck the document. But there seems</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                  <span class="avatar avatar-sm avatar-busy">
                                    <img src="{{url('remark/assets/portraits/4.jpg')}}" alt="..." />
                                    <i></i>
                                  </span>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">June Lane</h6>
                                                                    <div class="media-meta">
                                                                        <time datetime="2015-06-16T18:38:40+08:00">2 days ago</time>
                                                                    </div>
                                                                    <div class="media-detail">Lorem ipsum Id consectetur et minim</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                  <span class="avatar avatar-sm avatar-away">
                                    <img src="{{url('remark/assets/portraits/5.jpg')}}" alt="..." />
                                    <i></i>
                                  </span>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Edward Fletcher</h6>
                                                                    <div class="media-meta">
                                                                        <time datetime="2015-06-15T20:34:48+08:00">3 days ago</time>
                                                                    </div>
                                                                    <div class="media-detail">Dolor et irure cupidatat commodo nostrud nostrud.</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="dropdown-menu-footer" role="presentation">
                                                <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                                    <i class="icon wb-settings" aria-hidden="true"></i>
                                                </a>
                                                <a href="javascript:void(0)" role="menuitem">
                                                    See all messages
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="nav navbar-toolbar navbar-right">
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
                                           role="button">Dropdown <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li role="presentation"><a href="javascript:void(0)" role="menuitem">Action</a></li>
                                            <li role="presentation"><a href="javascript:void(0)" role="menuitem">Another action</a></li>
                                            <li role="presentation"><a href="javascript:void(0)" role="menuitem">Something else here</a></li>
                                            <li class="divider" role="presentation"></li>
                                            <li role="presentation"><a href="javascript:void(0)" role="menuitem">Separated link</a></li>
                                            <li class="divider" role="presentation"></li>
                                            <li role="presentation"><a href="javascript:void(0)" role="menuitem">One more separated link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div class="collapse navbar-search-overlap" id="example-navbar-inverse-search">
                                <form role="search">
                                    <div class="form-group">
                                        <div class="input-search">
                                            <i class="input-search-icon wb-search" aria-hidden="true"></i>
                                            <input type="text" class="form-control" name="site-search" placeholder="Search...">
                                            <button type="button" class="input-search-close icon wb-close" data-target="#example-navbar-inverse-search"
                                                    data-toggle="collapse" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- End Example Inverse -->

            <!-- Example Toolbar -->
            <div class="example-wrap">
                <h4 class="example-title">Toolbar</h4>
                <p>Navbars are responsive meta components that serve as navigation headers
                    for your application or site. They begin collapsed (and are toggleable)
                    in mobile views and become horizontal as the available viewport width
                    increases.</p>
                <p>Justified navbar nav links are currently not supported.</p>
                <div class="example">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-target="#example-navbar-toolbar-1"
                                        data-toggle="collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <i class="icon wb-more-horizontal" aria-hidden="true"></i>
                                </button>
                                <button type="button" class="navbar-toggle collapsed" data-target="#example-navbar-search-1"
                                        data-toggle="collapse">
                                    <span class="sr-only">Toggle Search</span>
                                    <i class="icon wb-search" aria-hidden="true"></i>
                                </button>
                                <a class="navbar-brand" href="javascript:void(0)">Brand</a>
                            </div>
                            <div class="collapse navbar-search navbar-left" id="example-navbar-search-1">
                                <form class="navbar-form" role="search">
                                    <div class="input-search">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <button type="button" class="input-search-btn">
                                            <i class="icon wb-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="collapse navbar-collapse navbar-collapse-group" id="example-navbar-toolbar-1">
                                <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                                    <li class="dropdown">
                                        <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                      <span class="avatar avatar-online">
                        <img src="{{url('remark/assets/portraits/5.jpg')}}" alt="...">
                        <i></i>
                      </span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li role="presentation">
                                                <a href="javascript:void(0)" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Profile</a>
                                            </li>
                                            <li role="presentation">
                                                <a href="javascript:void(0)" role="menuitem"><i class="icon wb-payment" aria-hidden="true"></i> Billing</a>
                                            </li>
                                            <li role="presentation">
                                                <a href="javascript:void(0)" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Settings</a>
                                            </li>
                                            <li class="divider" role="presentation"></li>
                                            <li role="presentation">
                                                <a href="javascript:void(0)" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" href="javascript:void(0)" title="Notifications" aria-expanded="false"
                                           data-animation="slide-bottom" role="button">
                                            <i class="icon wb-bell" aria-hidden="true"></i>
                                            <span class="badge badge-danger up">5</span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                                            <li class="dropdown-menu-header" role="presentation">
                                                <h5>NOTIFICATIONS</h5>
                                                <span class="label label-round label-danger">New 5</span>
                                            </li>

                                            <li class="list-group" role="presentation">
                                                <div data-role="container">
                                                    <div data-role="content">
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                                                    <i class="icon wb-order bg-red-600 white icon-circle" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">A new order has been placed</h6>
                                                                    <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">5 hours ago</time>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                                                    <i class="icon wb-user bg-green-600 white icon-circle" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Completed the task</h6>
                                                                    <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">2 days ago</time>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                                                    <i class="icon wb-settings bg-red-600 white icon-circle" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Settings updated</h6>
                                                                    <time class="media-meta" datetime="2015-06-11T14:05:00+08:00">2 days ago</time>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                                                    <i class="icon wb-calendar bg-blue-600 white icon-circle" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Event started</h6>
                                                                    <time class="media-meta" datetime="2015-06-10T13:50:18+08:00">3 days ago</time>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                                                    <i class="icon wb-chat bg-orange-600 white icon-circle" aria-hidden="true"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Message received</h6>
                                                                    <time class="media-meta" datetime="2015-06-10T12:34:48+08:00">3 days ago</time>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="dropdown-menu-footer" role="presentation">
                                                <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                                    <i class="icon wb-settings" aria-hidden="true"></i>
                                                </a>
                                                <a href="javascript:void(0)" role="menuitem">
                                                    All notifications
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" href="javascript:void(0)" title="Messages" aria-expanded="false"
                                           data-animation="slide-bottom" role="button">
                                            <i class="icon wb-envelope" aria-hidden="true"></i>
                                            <span class="badge badge-info up">3</span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                                            <li class="dropdown-menu-header" role="presentation">
                                                <h5>MESSAGES</h5>
                                                <span class="label label-round label-info">New 3</span>
                                            </li>

                                            <li class="list-group" role="presentation">
                                                <div data-role="container">
                                                    <div data-role="content">
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                  <span class="avatar avatar-sm avatar-online">
                                    <img src="../../assets/portraits/2.jpg" alt="..." />
                                    <i></i>
                                  </span>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Mary Adams</h6>
                                                                    <div class="media-meta">
                                                                        <time datetime="2015-06-17T20:22:05+08:00">30 minutes ago</time>
                                                                    </div>
                                                                    <div class="media-detail">Anyways, i would like just do it</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                  <span class="avatar avatar-sm avatar-off">
                                    <img src="../../assets/portraits/3.jpg" alt="..." />
                                    <i></i>
                                  </span>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Caleb Richards</h6>
                                                                    <div class="media-meta">
                                                                        <time datetime="2015-06-17T12:30:30+08:00">12 hours ago</time>
                                                                    </div>
                                                                    <div class="media-detail">I checheck the document. But there seems</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                  <span class="avatar avatar-sm avatar-busy">
                                    <img src="../../assets/portraits/4.jpg" alt="..." />
                                    <i></i>
                                  </span>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">June Lane</h6>
                                                                    <div class="media-meta">
                                                                        <time datetime="2015-06-16T18:38:40+08:00">2 days ago</time>
                                                                    </div>
                                                                    <div class="media-detail">Lorem ipsum Id consectetur et minim</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                            <div class="media">
                                                                <div class="media-left padding-right-10">
                                  <span class="avatar avatar-sm avatar-away">
                                    <img src="../../assets/portraits/5.jpg" alt="..." />
                                    <i></i>
                                  </span>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading">Edward Fletcher</h6>
                                                                    <div class="media-meta">
                                                                        <time datetime="2015-06-15T20:34:48+08:00">3 days ago</time>
                                                                    </div>
                                                                    <div class="media-detail">Dolor et irure cupidatat commodo nostrud nostrud.</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="dropdown-menu-footer" role="presentation">
                                                <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                                    <i class="icon wb-settings" aria-hidden="true"></i>
                                                </a>
                                                <a href="javascript:void(0)" role="menuitem">
                                                    See all messages
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="nav navbar-toolbar navbar-right">
                                    <li class="active"><a href="javascript:void(0)">Link <span class="sr-only">(current)</span></a></li>
                                    <li><a href="javascript:void(0)">Link</a></li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
                                           role="button">Dropdown <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li role="presentation"><a href="javascript:void(0)" role="menuitem">Action</a></li>
                                            <li role="presentation"><a href="javascript:void(0)" role="menuitem">Another action</a></li>
                                            <li role="presentation"><a href="javascript:void(0)" role="menuitem">Something else here</a></li>
                                            <li class="divider" role="presentation"></li>
                                            <li role="presentation"><a href="javascript:void(0)" role="menuitem">Separated link</a></li>
                                            <li class="divider" role="presentation"></li>
                                            <li role="presentation"><a href="javascript:void(0)" role="menuitem">One more separated link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- End Example Toolbar -->

            <!-- Example Brand Image -->
            <div class="example-wrap">
                <h4 class="example-title">Brand Image</h4>
                <p>Replace the navbar brand with your own image by swapping the text for an
                    <code>&lt;img&gt;</code>. Since the <code>.navbar-brand</code> has its
                    own padding and height, you may need to override some CSS depending on
                    your image.</p>
                <div class="example">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="javascript:void(0)">
                                    <img src="../../assets/portraits/1.jpg" alt="Brand" height="20">
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- End Example Brand Image -->

            <!-- Example Brand Center -->
            <div class="example-wrap">
                <h4 class="example-title">Brand Center</h4>
                <p>Add the <code>.navbar-brand-center</code> class to brand elements to center
                    the brand in the navbar for mobile views.</p>
                <div class="example">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a class="navbar-brand navbar-brand-center" href="javascript:void(0)">
                                    Brand
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- End Example Brand Center -->

            <!-- Example Search -->
            <div class="example-wrap">
                <h4 class="example-title">Search</h4>
                <div class="example">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-target="#example-navbar-search"
                                        data-toggle="collapse">
                                    <span class="sr-only">Toggle Search</span>
                                    <i class="icon wb-search" aria-hidden="true"></i>
                                </button>
                                <a class="navbar-brand" href="javascript:void(0)">Brand</a>
                            </div>
                            <div class="collapse navbar-search navbar-left" id="example-navbar-search">
                                <form class="navbar-form" role="search">
                                    <div class="input-search">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <button type="button" class="input-search-btn">
                                            <i class="icon wb-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- End Example Search -->

            <!-- Example Search Overlap -->
            <div class="example-wrap">
                <h4 class="example-title">Search Overlap</h4>
                <div class="example">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle hamburger hamburger-close collapsed"
                                        data-target="#example-navbar-search-overlap-collapse" data-toggle="collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="hamburger-bar"></span>
                                </button>
                                <button type="button" class="navbar-toggle collapsed" data-target="#example-navbar-search-overlap"
                                        data-toggle="collapse">
                                    <span class="sr-only">Toggle Search</span>
                                    <i class="icon wb-search" aria-hidden="true"></i>
                                </button>
                                <a class="navbar-brand" href="javascript:void(0)">Brand</a>
                            </div>
                            <div class="collapse navbar-collapse" id="example-navbar-search-overlap-collapse">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="javascript:void(0)">Link <span class="sr-only">(current)</span></a></li>
                                    <li><a href="javascript:void(0)">Link</a></li>
                                    <li class="hidden-float">
                                        <a class="icon wb-search" data-toggle="collapse" href="javascript:void(0)" data-target="#example-navbar-search-overlap"
                                           role="button">
                                            <span class="sr-only">Toggle Search</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="collapse navbar-search-overlap" id="example-navbar-search-overlap">
                                <form role="search">
                                    <div class="form-group">
                                        <div class="input-search">
                                            <i class="input-search-icon wb-search" aria-hidden="true"></i>
                                            <input type="text" class="form-control" placeholder="Search">
                                            <button type="button" class="input-search-close icon wb-close" data-target="#example-navbar-search-overlap"
                                                    data-toggle="collapse" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- End Example Search Overlap -->

            <!-- Example Buttons -->
            <div class="example-wrap">
                <h4 class="example-title">Buttons</h4>
                <p>Add the <code>.navbar-btn</code> class to <code>&lt;button&gt;</code> elements
                    not residing in a <code>&lt;form&gt;</code> to vertically center them
                    in the navbar.</p>
                <div class="example">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle hamburger hamburger-close collapsed"
                                        data-target="#example-navbar-collapse-3" data-toggle="collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="hamburger-bar"></span>
                                </button>
                                <a class="navbar-brand" href="javascript:void(0)">Brand</a>
                            </div>
                            <div class="collapse navbar-collapse" id="example-navbar-collapse-3">
                                <button type="submit" class="btn btn-primary navbar-right navbar-btn">Sign in</button>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- End Example Buttons -->

            <!-- Example Text -->
            <div class="example-wrap">
                <h4 class="example-title">Text</h4>
                <p>Wrap strings of text in an element with <code>.navbar-text</code>, usually
                    on a <code>&lt;p&gt;</code> tag for proper leading and color.</p>
                <div class="example">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle hamburger hamburger-close collapsed"
                                        data-target="#example-navbar-collapse-4" data-toggle="collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="hamburger-bar"></span>
                                </button>
                                <a class="navbar-brand" href="javascript:void(0)">Brand</a>
                            </div>
                            <div class="collapse navbar-collapse" id="example-navbar-collapse-4">
                                <p class="navbar-text">Signed in as Mark Otto</p>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- End Example Text -->

            <!-- Example Non Nav Links -->
            <div class="example-wrap">
                <h4 class="example-title">Non-Nav Links</h4>
                <p>For folks using standard links that are not within the regular navbar navigation
                    component, use the <code>.navbar-link</code> class to add the proper
                    colors for the default and inverse navbar options.</p>
                <div class="example">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle hamburger hamburger-close collapsed"
                                        data-target="#example-navbar-collapse-5" data-toggle="collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="hamburger-bar"></span>
                                </button>
                                <a class="navbar-brand" href="javascript:void(0)">Brand</a>
                            </div>
                            <div class="collapse navbar-collapse" id="example-navbar-collapse-5">
                                <p class="navbar-text navbar-right">Signed in as <a class="navbar-link" href="javascript:void(0)">Mark Otto</a></p>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- End Example Non Nav Links -->

            <!-- Example Mega Navbar -->
            <div class="example-wrap">
                <h4 class="example-title">Mega Navbar</h4>
                <div class="example">
                    <div class="navbar navbar-default navbar-mega">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle hamburger hamburger-close collapsed"
                                        data-toggle="collapse" data-target="#navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="hamburger-bar"></span>
                                </button>
                                <a class="navbar-brand" href="javascript:void(0)">Mega Menu</a>
                            </div>
                            <div class="navbar-collapse collapse" id="navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <!-- Classic List -->
                                    <li class="dropdown dropdown-mega"><a class="dropdown-toggle" data-toggle="dropdown" href="#">List<b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <!-- Content Container To Add Padding -->
                                                <div class="mega-content">
                                                    <div class="row">
                                                        <div class="col-xs-6 col-md-3 mega-menu">
                                                            <h5>Section Title</h5>
                                                            <ul class="list-icons">
                                                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>List
                                                                    Item</li>
                                                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>List
                                                                    Item</li>
                                                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>List
                                                                    Item</li>
                                                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>List
                                                                    Item</li>
                                                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>List
                                                                    Item</li>
                                                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>List
                                                                    Item</li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-xs-6 col-md-3 mega-menu">
                                                            <h5>Links Title</h5>
                                                            <ul class="list-icons">
                                                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                                                    <a
                                                                            href="javascript:void(0)"> Link Item </a>
                                                                </li>
                                                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                                                    <a
                                                                            href="javascript:void(0)"> Link Item </a>
                                                                </li>
                                                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                                                    <a
                                                                            href="javascript:void(0)"> Link Item </a>
                                                                </li>
                                                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                                                    <a
                                                                            href="javascript:void(0)"> Link Item </a>
                                                                </li>
                                                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                                                    <a
                                                                            href="javascript:void(0)"> Link Item </a>
                                                                </li>
                                                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                                                    <a
                                                                            href="javascript:void(0)"> Link Item </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-xs-6 col-md-3 mega-menu">
                                                            <h5>Section Title</h5>
                                                            <ul class="list-icons">
                                                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>List
                                                                    Item</li>
                                                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>List
                                                                    Item</li>
                                                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>List
                                                                    Item</li>
                                                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>List
                                                                    Item</li>
                                                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>List
                                                                    Item</li>
                                                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>List
                                                                    Item</li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-xs-6 col-md-3 mega-menu">
                                                            <h5>Section Title</h5>
                                                            <ul class="list-icons">
                                                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>List
                                                                    Item</li>
                                                                <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>List
                                                                    Item</li>
                                                                <li>
                                                                    <ul class="list-icons">
                                                                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                                                            <a
                                                                                    href="javascript:void(0)"> Link Item </a>
                                                                        </li>
                                                                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                                                            <a
                                                                                    href="javascript:void(0)"> Link Item </a>
                                                                        </li>
                                                                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                                                                            <a
                                                                                    href="javascript:void(0)"> Link Item </a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- Accordion Demo -->
                                    <li class="dropdown dropdown-mega"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Accordion<b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <div class="mega-content">
                                                    <!-- Accordion -->
                                                    <div class="panel-group" id="exampleMegaAccordion" aria-multiselectable="true"
                                                         role="tablist">
                                                        <div class="panel">
                                                            <div class="panel-heading" id="exampleMegaAccordionHeadingOne" role="tab">
                                                                <a class="panel-title" data-toggle="collapse" href="#exampleMegaCollapseOne" data-parent="#exampleMegaAccordion"
                                                                   aria-expanded="true" aria-controls="exampleMegaCollapseOne">
                                                                    Collapsible Group Item #1
                                                                </a>
                                                            </div>
                                                            <div class="panel-collapse collapse in" id="exampleMegaCollapseOne" aria-labelledby="exampleMegaAccordionHeadingOne"
                                                                 role="tabpanel">
                                                                <div class="panel-body">
                                                                    De moveat laudatur vestra parum doloribus labitur sentire partes, eripuit praesenti
                                                                    congressus ostendit alienae, voluptati ornateque
                                                                    accusamus clamat reperietur convicia albucius,
                                                                    veniat quocirca vivendi aristotele errorem epicurus.
                                                                    Suppetet. Aeternum animadversionis, turbent cn
                                                                    partem porrecta c putamus diceret decore. Vero
                                                                    itaque incursione.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel">
                                                            <div class="panel-heading" id="exampleMegaAccordionHeadingTwo" role="tab">
                                                                <a class="panel-title collapsed" data-toggle="collapse" href="#exampleMegaCollapseTwo"
                                                                   data-parent="#exampleMegaAccordion" aria-expanded="false"
                                                                   aria-controls="exampleMegaCollapseTwo">
                                                                    Collapsible Group Item #2
                                                                </a>
                                                            </div>
                                                            <div class="panel-collapse collapse" id="exampleMegaCollapseTwo" aria-labelledby="exampleMegaAccordionHeadingTwo"
                                                                 role="tabpanel">
                                                                <div class="panel-body">
                                                                    Praestabiliorem. Pellat excruciant legantur ullum leniter vacare foris voluptate
                                                                    loco ignavi, credo videretur multoque choro fatemur
                                                                    mortis animus adoptionem, bello statuat expediunt
                                                                    naturales frequenter terminari nomine, stabilitas
                                                                    privatio initia paranda contineri abhorreant,
                                                                    percipi dixerit incurreret deorsum imitarentur
                                                                    tenetur antiopam latinam haec.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="panel">
                                                            <div class="panel-heading" id="exampleMegaAccordionHeadingThree" role="tab">
                                                                <a class="panel-title collapsed" data-toggle="collapse" href="#exampleMegaCollapseThree"
                                                                   data-parent="#exampleMegaAccordion" aria-expanded="false"
                                                                   aria-controls="exampleMegaCollapseThree">
                                                                    Collapsible Group Item #3
                                                                </a>
                                                            </div>
                                                            <div class="panel-collapse collapse" id="exampleMegaCollapseThree" aria-labelledby="exampleMegaAccordionHeadingThree"
                                                                 role="tabpanel">
                                                                <div class="panel-body">
                                                                    Horum, antiquitate perciperet d conspectum locus obruamus animumque perspici probabis
                                                                    suscipere. Desiderat magnum, contenta poena desiderant
                                                                    concederetur menandri damna disputandum corporum
                                                                    equidem cyrenaicisque. Defuturum ultimum ista
                                                                    ignaviamque iudicant feci incursione, reprimique
                                                                    fruenda utamur tu faciam complexiones eo, habeo
                                                                    ortum iucundo artes.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Accordion -->
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- Classic Dropdown -->
                                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Classic<b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a tabindex="-1" href="javascript:void(0)"> Action </a></li>
                                            <li><a tabindex="-1" href="javascript:void(0)"> Another action </a></li>
                                            <li><a tabindex="-1" href="javascript:void(0)"> Something else here </a></li>
                                            <li class="divider" role="presentation"></li>
                                            <li><a tabindex="-1" href="javascript:void(0)"> Separated link </a></li>
                                        </ul>
                                    </li>
                                    <!-- Pictures -->
                                    <li class="dropdown dropdown-fw dropdown-mega"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Pictures<b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <div class="mega-content">
                                                    <div class="row">
                                                        <div class="col-xs-6 col-sm-3">
                                                            <a class="thumbnail" href="javascript:void(0)">
                                                                <img alt="..." src="../../assets/photos/placeholder.png">
                                                            </a>
                                                        </div>
                                                        <div class="col-xs-6 col-sm-3">
                                                            <a class="thumbnail" href="javascript:void(0)">
                                                                <img alt="..." src="../../assets/photos/placeholder.png">
                                                            </a>
                                                        </div>
                                                        <div class="col-xs-6 col-sm-3">
                                                            <a class="thumbnail" href="javascript:void(0)">
                                                                <img alt="..." src="../../assets/photos/placeholder.png">
                                                            </a>
                                                        </div>
                                                        <div class="col-xs-6 col-sm-3">
                                                            <a class="thumbnail" href="javascript:void(0)">
                                                                <img alt="..." src="../../assets/photos/placeholder.png">
                                                            </a>
                                                        </div>
                                                        <div class="col-xs-6 col-sm-3">
                                                            <a class="thumbnail" href="javascript:void(0)">
                                                                <img alt="..." src="../../assets/photos/placeholder.png">
                                                            </a>
                                                        </div>
                                                        <div class="col-xs-6 col-sm-3">
                                                            <a class="thumbnail" href="javascript:void(0)">
                                                                <img alt="..." src="../../assets/photos/placeholder.png">
                                                            </a>
                                                        </div>
                                                        <div class="col-xs-6 col-sm-3">
                                                            <a class="thumbnail" href="javascript:void(0)">
                                                                <img alt="..." src="../../assets/photos/placeholder.png">
                                                            </a>
                                                        </div>
                                                        <div class="col-xs-6 col-sm-3">
                                                            <a class="thumbnail" href="javascript:void(0)">
                                                                <img alt="..." src="../../assets/photos/placeholder.png">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Example Mega Navbar -->

            <!-- Example Mega Navbar -->
            <div class="example-wrap">
                <h4 class="example-title">More Components</h4>
                <div class="example">
                    <nav class="navbar navbar-default navbar-mega">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle hamburger hamburger-close collapsed"
                                        data-toggle="collapse" data-target="#navbar-collapse-2">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="hamburger-bar"></span>
                                </button>
                                <a class="navbar-brand" href="javascript:void(0)">Mega Menu</a>
                            </div>
                            <div class="navbar-collapse collapse" id="navbar-collapse-2">
                                <ul class="nav navbar-nav">
                                    <!-- Media Example -->
                                    <li class="dropdown dropdown-mega"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Media<b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <div class="mega-content">
                                                    <ul class="media-list">
                                                        <li class="media">
                                                            <div class="media-left">
                                                                <a class="avatar avatar-lg" href="javascript:void(0)">
                                                                    <img src="../../assets/portraits/2.jpg" alt="...">
                                                                </a>
                                                            </div>
                                                            <div class="media-body">
                                                                <h4 class="media-heading">Media Heading</h4>
                                                                Lorem ipsum In laboris ullamco cupidatat commodo eiusmod laboris do cupidatat irure
                                                                in anim Excepteur eiusmod eiusmod nostrud dolor
                                                                dolore laboris deserunt sed irure laborum ex occaecat
                                                                reprehenderit sit esse veniam minim veniam cupidatat
                                                                voluptate sunt ullamco dolore et ex commodo in.
                                                            </div>
                                                        </li>
                                                        <li class="media">
                                                            <div class="media-left">
                                                                <a class="avatar avatar-lg" href="javascript:void(0)">
                                                                    <img src="../../assets/portraits/3.jpg" alt="...">
                                                                </a>
                                                            </div>
                                                            <div class="media-body">
                                                                <h4 class="media-heading">Nested Media Heading</h4>
                                                                Lorem ipsum Laborum deserunt culpa mollit sunt in nostrud aliquip sed magna consequat
                                                                fugiat eiusmod do consectetur est irure consectetur
                                                                dolore velit tempor adipisicing occaecat eu ea
                                                                esse cillum nostrud amet in commodo laborum Ut
                                                                exercitation consectetur dolore.
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- Tables -->
                                    <li class="dropdown dropdown-fw dropdown-mega"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Tables<b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <div class="mega-content table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>First Name</th>
                                                            <th>Last Name</th>
                                                            <th>Username</th>
                                                            <th>First Name</th>
                                                            <th>Last Name</th>
                                                            <th>Username</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                            <td>@mdo</td>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                            <td>@mdo</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Jacob</td>
                                                            <td>Thornton</td>
                                                            <td>@fat</td>
                                                            <td>Jacob</td>
                                                            <td>Thornton</td>
                                                            <td>@fat</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td colspan="2">Larry the Bird</td>
                                                            <td>@twitter</td>
                                                            <td colspan="2">Larry the Bird</td>
                                                            <td>@twitter</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- Thumbnails Demo -->
                                    <li class="dropdown dropdown-mega"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Thumbnails<b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <div class="mega-content">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="thumbnail">
                                                                <img class="width-full" src="../../assets/photos/placeholder.png" alt="...">
                                                                <div class="caption">
                                                                    <h4>Thumbnail Label</h4>
                                                                    <p>Lorem ipsum Dolore nulla mollit consectetur enim
                                                                        est adipisicing dolor exercitation.</p>
                                                                    <p><a class="btn btn-primary" href="javascript:void(0)"
                                                                          role="button">Button</a><a class="btn btn-default"
                                                                                                     href="javascript:void(0)" role="button">Button</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="thumbnail">
                                                                <img class="width-full" src="../../assets/photos/placeholder.png" alt="...">
                                                                <div class="caption">
                                                                    <h4>Thumbnail Label</h4>
                                                                    <p>Lorem ipsum Minim in in Ut officia cupidatat
                                                                        sed elit do cillum in dolore aliquip.</p>
                                                                    <p><a class="btn btn-primary" href="javascript:void(0)"
                                                                          role="button">Button</a><a class="btn btn-default"
                                                                                                     href="javascript:void(0)" role="button">Button</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="thumbnail">
                                                                <img class="width-full" src="../../assets/photos/placeholder.png" alt="...">
                                                                <div class="caption">
                                                                    <h4>Thumbnail Label</h4>
                                                                    <p>Lorem ipsum Labore laborum nisi ex et ullamco
                                                                        in anim enim minim anim id in sed dolor.</p>
                                                                    <p><a class="btn btn-primary" href="javascript:void(0)"
                                                                          role="button">Button</a><a class="btn btn-default"
                                                                                                     href="javascript:void(0)" role="button">Button</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <!-- Forms -->
                                    <li class="dropdown dropdown-mega"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Forms<b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <div class="mega-content">
                                                    <form action="send.php">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="inputName" placeholder="Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="password" class="form-control" id="inputEmail" placeholder="Email">
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea class="form-control" placeholder="Write your message.."></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-success">Send</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- End Example Mega Navbar -->

            <!-- Example Mega Navbar -->
            <div class="example-wrap">
                <h4 class="example-title">Grid Example</h4>
                <div class="example">
                    <nav class="navbar navbar-default navbar-mega">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle hamburger hamburger-close collapsed"
                                        data-toggle="collapse" data-target="#navbar-collapse-grid">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="hamburger-bar"></span>
                                </button>
                                <a class="navbar-brand" href="javascript:void(0)">Mega Menu</a>
                            </div>
                            <div class="navbar-collapse collapse" id="navbar-collapse-grid">
                                <ul class="nav navbar-nav">
                                    <!-- Grid 12 Menu -->
                                    <li class="dropdown dropdown-fw dropdown-mega"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Grid<b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="example-grid">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="example-col">.col-sm-12</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="example-col">.col-sm-6</div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="example-col">.col-sm-6</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="example-col">.col-sm-4</div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="example-col">.col-sm-4</div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="example-col">.col-sm-4</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="example-col">.col-sm-3</div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="example-col">.col-sm-3</div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="example-col">.col-sm-3</div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="example-col">.col-sm-3</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="example-col">.col-sm-3</div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="example-col">.col-sm-3</div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="example-col">.col-sm-3</div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="example-col">.col-sm-3</div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="example-col">.col-sm-3</div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="example-col">.col-sm-3</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="example-col">.col-sm-1</div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="example-col">.col-sm-1</div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="example-col">.col-sm-1</div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="example-col">.col-sm-1</div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="example-col">.col-sm-1</div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="example-col">.col-sm-1</div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="example-col">.col-sm-1</div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="example-col">.col-sm-1</div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="example-col">.col-sm-1</div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="example-col">.col-sm-1</div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="example-col">.col-sm-1</div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="example-col">.col-sm-1</div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- With Offsets -->
                                    <li class="dropdown dropdown-fw dropdown-mega"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Offset<b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="example-grid">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="example-col">.col-md-4</div>
                                                    </div>
                                                    <div class="col-md-4 col-md-offset-4">
                                                        <div class="example-col">.col-md-4 .col-md-offset-4</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 col-md-offset-3">
                                                        <div class="example-col">.col-md-3 .col-md-offset-3</div>
                                                    </div>
                                                    <div class="col-md-3 col-md-offset-3">
                                                        <div class="example-col">.col-md-3 .col-md-offset-3</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-md-offset-3">
                                                        <div class="example-col">.col-md-6 .col-md-offset-3</div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- Aside Menu -->
                                    <li class="dropdown dropdown-fw dropdown-mega"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Aside<b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="example-grid">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="example-col">3</div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <div class="example-col">9</div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- Nesting Menu -->
                                    <li class="dropdown dropdown-fw dropdown-mega"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Nesting<b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="example-grid">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="example-col">12</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="example-col">12
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="example-col">4</div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="example-col">4</div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="example-col">4</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- End Example Mega Navbar -->

            <!-- Panel -->
            <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Example Fixed To Top -->
                            <div class="example-wrap">
                                <h4>Fixed To Top</h4>
                                <p>Add <code>.navbar-fixed-top</code> and include a <code>.container</code>                  or <code>.container-fluid</code> to center and pad navbar content.</p>
                                <div class="example example-well height-400">
                                    <img class="img-responsive center" src="{{url('remark/assets/example-images/navbar/fixed-to-top.png')}}"
                                         alt="...">
                                </div>
                            </div>
                            <!-- End Example Fixed To Top -->
                        </div>

                        <div class="col-sm-6">
                            <!-- Example Fixed To Bottom -->
                            <div class="example-wrap">
                                <h4>Fixed To Bottom</h4>
                                <p>Add <code>.navbar-fixed-bottom</code> and include a <code>.container</code>                  or <code>.container-fluid</code> to center and pad navbar content.</p>
                                <div class="example example-well height-400">
                                    <img class="img-responsive center" src="{{url('remark/assets/example-images/navbar/fixed-to-bottom.png')}}"
                                         alt="...">
                                </div>
                            </div>
                            <!-- End Example Fixed To Bottom -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <h4>Scrollspy</h4>
                            <div class="example">
                                <nav class="navbar navbar-inverse margin-bottom-0" id="navbar-example" role="navigation">
                                    <div class="container-fluid">
                                        <div class="navbar-header">
                                            <button type="button" class="navbar-toggle hamburger hamburger-close collapsed"
                                                    data-target="#example-navbar-collapse-6" data-toggle="collapse">
                                                <span class="sr-only">Toggle navigation</span>
                                                <span class="hamburger-bar"></span>
                                            </button>
                                            <a class="navbar-brand" href="javascript:void(0)">ScrollSpy</a>
                                        </div>
                                        <div class="collapse navbar-collapse" id="example-navbar-collapse-6">
                                            <ul class="nav navbar-nav">
                                                <li class="active"><a href="#home">Home</a></li>
                                                <li><a href="#link">Link</a></li>
                                                <li class="dropdown">
                                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
                                                       role="button">Dropdown <span class="caret"></span></a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#action">Action</a></li>
                                                        <li><a href="#another-action">Another action</a></li>
                                                        <li class="divider" role="presentation"></li>
                                                        <li><a href="#something-else-here">Something else here</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                                <div class="scrollspy-example" data-offset="0" data-target="#navbar-example" data-spy="scroll">
                                    <h4 id="home">Home</h4>
                                    <p>Ad leggings keytar, brunch id art party dolor labore. Pitchfork
                                        yr enim lo-fi before they sold out qui. Tumblr farm-to-table
                                        bicycle rights whatever. Anim keffiyeh carles cardigan. Velit
                                        seitan mcsweeney's photo booth 3 wolf moon irure. Cosby sweater
                                        lomo jean shorts, williamsburg hoodie minim qui you probably
                                        haven't heard of them et cardigan trust fund culpa biodiesel
                                        wes anderson aesthetic. Nihil tattooed accusamus, cred irony
                                        biodiesel keffiyeh artisan ullamco consequat.</p>
                                    <h4 id="link">Link</h4>
                                    <p>Ad leggings keytar, brunch id art party dolor labore. Pitchfork
                                        yr enim lo-fi before they sold out qui. Tumblr farm-to-table
                                        bicycle rights whatever. Anim keffiyeh carles cardigan. Velit
                                        seitan mcsweeney's photo booth 3 wolf moon irure. Cosby sweater
                                        lomo jean shorts, williamsburg hoodie minim qui you probably
                                        haven't heard of them et cardigan trust fund culpa biodiesel
                                        wes anderson aesthetic. Nihil tattooed accusamus, cred irony
                                        biodiesel keffiyeh artisan ullamco consequat.</p>
                                    <h4 id="action">Action</h4>
                                    <p>Ad leggings keytar, brunch id art party dolor labore. Pitchfork
                                        yr enim lo-fi before they sold out qui. Tumblr farm-to-table
                                        bicycle rights whatever. Anim keffiyeh carles cardigan. Velit
                                        seitan mcsweeney's photo booth 3 wolf moon irure. Cosby sweater
                                        lomo jean shorts, williamsburg hoodie minim qui you probably
                                        haven't heard of them et cardigan trust fund culpa biodiesel
                                        wes anderson aesthetic. Nihil tattooed accusamus, cred irony
                                        biodiesel keffiyeh artisan ullamco consequat.</p>
                                    <h4 id="another-action">Another Action</h4>
                                    <p>Ad leggings keytar, brunch id art party dolor labore. Pitchfork
                                        yr enim lo-fi before they sold out qui. Tumblr farm-to-table
                                        bicycle rights whatever. Anim keffiyeh carles cardigan. Velit
                                        seitan mcsweeney's photo booth 3 wolf moon irure. Cosby sweater
                                        lomo jean shorts, williamsburg hoodie minim qui you probably
                                        haven't heard of them et cardigan trust fund culpa biodiesel
                                        wes anderson aesthetic. Nihil tattooed accusamus, cred irony
                                        biodiesel keffiyeh artisan ullamco consequat.</p>
                                    <h4 id="something-else-here">Something Else Here</h4>
                                    <p>Ad leggings keytar, brunch id art party dolor labore. Pitchfork
                                        yr enim lo-fi before they sold out qui. Tumblr farm-to-table
                                        bicycle rights whatever. Anim keffiyeh carles cardigan. Velit
                                        seitan mcsweeney's photo booth 3 wolf moon irure. Cosby sweater
                                        lomo jean shorts, williamsburg hoodie minim qui you probably
                                        haven't heard of them et cardigan trust fund culpa biodiesel
                                        wes anderson aesthetic. Nihil tattooed accusamus, cred irony
                                        biodiesel keffiyeh artisan ullamco consequat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Panel -->

            <h4>Colors</h4>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="example">
                            <nav class="navbar navbar-default" role="navigation">
                                <div class="container-fluid">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle hamburger hamburger-close collapsed">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="hamburger-bar"></span>
                                        </button>
                                        <a class="navbar-brand" href="javascript:void(0)">Brand</a>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="example">
                            <nav class="navbar navbar-inverse bg-blue-grey-700" role="navigation">
                                <div class="container-fluid">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle hamburger hamburger-close collapsed">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="hamburger-bar"></span>
                                        </button>
                                        <a class="navbar-brand" href="javascript:void(0)">Brand</a>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="example">
                            <nav class="navbar navbar-inverse bg-blue-600" role="navigation">
                                <div class="container-fluid">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle hamburger hamburger-close collapsed">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="hamburger-bar"></span>
                                        </button>
                                        <a class="navbar-brand" href="javascript:void(0)">Brand</a>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="example">
                            <nav class="navbar navbar-inverse bg-teal-600" role="navigation">
                                <div class="container-fluid">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle hamburger hamburger-close collapsed">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="hamburger-bar"></span>
                                        </button>
                                        <a class="navbar-brand" href="javascript:void(0)">Brand</a>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection