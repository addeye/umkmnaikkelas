@extends('layouts.portal.master')

@section('content')
    <!-- Page -->
    <div class="container-fluid">
        <div class="animsition">
            <div class="page-header">
                <h1 class="page-title">Statistics Widgets</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.html">Home</a></li>
                    <li><a href="javascript:void(0)">Widgets</a></li>
                    <li class="active">Statistics</li>
                </ol>
                <div class="page-header-actions">
                    <button type="button" class="btn btn-sm btn-outline btn-default btn-round">
                        <span class="text hidden-xs">Settings</span>
                        <i class="icon wb-chevron-right" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="page-content container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="widget">
                                    <div class="widget-content widget-radius padding-25 bg-white">
                                        <div class="counter counter-lg">
                                            <span class="counter-number">60</span>
                                            <div class="counter-label text-uppercase">counters</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="widget">
                                    <div class="widget-content widget-radius padding-25 bg-white">
                                        <div class="counter counter-lg">
                                            <div class="counter-number-group">
                                                <span class="counter-number-related">-</span>
                                                <span class="counter-number">120</span>
                                            </div>
                                            <div class="counter-label text-uppercase">points</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="widget">
                                    <div class="widget-content widget-radius padding-25 bg-blue-600">
                                        <div class="counter counter-lg counter-inverse">
                                            <div class="counter-label text-uppercase">score</div>
                                            <span class="counter-number">220</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="widget">
                                    <div class="widget-content widget-radius padding-25 bg-purple-600">
                                        <div class="counter counter-lg counter-inverse">
                                            <div class="counter-label text-uppercase">earn</div>
                                            <div class="counter-number-group">
                                                <span class="counter-number-related">-</span>
                                                <span class="counter-number">90</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <!-- Widget -->
                        <div class="widget widget-radius" style="overflow: hidden;">
                            <div class="widget-content container-fluid">
                                <div class="row no-space">
                                    <div class="col-sm-6">
                                        <div class="counter counter-md vertical-align bg-white height-300">
                                            <div class="counter-icon padding-30 green-600" style="position:absolute;top:0;left:0;">
                                                <i class="icon wb-stats-bars" aria-hidden="true"></i>
                                            </div>
                                            <div class="counter-number-group font-size-30 vertical-align-middle">
                                                <span class="counter-icon green-600 margin-right-10"><i class="wb-graph-up"></i></span>
                                                <span class="counter-number">9</span>
                                                <span class="counter-number-related">%</span>
                                                <div class="font-size-20 margin-top-3">More sales</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="vertical-align text-center bg-red-700 white padding-30 height-300">
                                            <div class="vertical-align-middle font-size-40">
                                                <p>AS</p>
                                                <p>Tshirt</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget -->
                    </div>

                    <div class="clearfix visible-lg-block"></div>

                    <div class="col-lg-6 col-md-12">
                        <!-- Widget -->
                        <div class="widget">
                            <div class="widget-content widget-radius padding-30 bg-white container-fluid">
                                <div class="row no-space">
                                    <div class="col-sm-6">
                                        <div class="counter counter-lg text-left padding-left-20">
                                            <span class="counter-number">286</span>
                                            <div class="counter-label text-uppercase">Online Players</div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="counter counter-lg text-left padding-left-20">
                                            <span class="counter-number">286</span>
                                            <div class="counter-label text-uppercase">Online Players</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget -->
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <!-- Widget -->
                        <div class="widget">
                            <div class="widget-content widget-radius padding-30 bg-white">
                                <div class="counter counter-lg">
                                    <div class="counter-label text-uppercase">bounce rate</div>
                                    <div class="counter-number-group">
                  <span class="counter-icon margin-right-10 green-600">
                    <i class="wb-stats-bars"></i>
                  </span>
                                        <span class="counter-number">2.8</span>
                                        <span class="counter-number-related">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget -->
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <!-- Widget -->
                        <div class="widget">
                            <div class="widget-content widget-radius padding-30 bg-white">
                                <div class="counter counter-lg">
                                    <div class="counter-label text-uppercase">bounce rate</div>
                                    <div class="counter-number-group">
                                        <span class="counter-number">4.5</span>
                                        <span class="counter-number-related">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget -->
                    </div>

                    <div class="clearfix visible-lg-block"></div>

                    <div class="col-lg-6 col-md-12">
                        <!-- Widget -->
                        <div class="widget widget-radius">
                            <div class="widget-content container-fluid">
                                <div class="row no-space">
                                    <div class="col-sm-4">
                                        <div class="counter counter-lg counter-inverse bg-blue-600 vertical-align height-150">
                                            <div class="vertical-align-middle">
                                                <div class="counter-icon margin-bottom-5"><i class="icon wb-image" aria-hidden="true"></i></div>
                                                <span class="counter-number">1,286</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="counter counter-lg counter-inverse bg-red-600 vertical-align height-150">
                                            <div class="vertical-align-middle">
                                                <div class="counter-icon margin-bottom-5"><i class="icon wb-video" aria-hidden="true"></i></div>
                                                <span class="counter-number">620</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="counter counter-lg counter-inverse bg-purple-600 vertical-align height-150">
                                            <div class="vertical-align-middle">
                                                <div class="counter-icon margin-bottom-5"><i class="icon wb-envelope" aria-hidden="true"></i></div>
                                                <span class="counter-number">2,860</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget -->
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <!-- Widget -->
                        <div class="widget">
                            <div class="widget-content padding-20 bg-white">
                                <div class="counter counter-lg">
                                    <div class="counter-label text-uppercase font-size-16">we have</div>
                                    <div class="counter-number-group">
                                        <span class="counter-number">300</span>
                                        <span class="counter-number-related">+</span>
                                    </div>
                                    <div class="counter-label text-uppercase font-size-16">followers</div>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget -->
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <!-- Widget -->
                        <div class="widget">
                            <div class="widget-content padding-20 bg-blue-600 white">
                                <div class="counter counter-lg counter-inverse">
                                    <div class="counter-label text-uppercase font-size-16">we have</div>
                                    <div class="counter-number-group">
                                        <span class="counter-number">365</span>
                                        <span class="counter-icon margin-left-10"><i class="icon wb-image" aria-hidden="true"></i></span>
                                    </div>
                                    <div class="counter-label text-uppercase font-size-16">pictures</div>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget -->
                    </div>

                    <div class="clearfix visible-lg-block"></div>

                    <div class="col-lg-8 col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Widget -->
                                <div class="widget">
                                    <div class="widget-content widget-radius padding-30 bg-white clearfix">
                                        <div class="pull-left white">
                                            <i class="icon icon-circle icon-2x wb-clipboard bg-red-600" aria-hidden="true"></i>
                                        </div>
                                        <div class="counter counter-md counter text-right pull-right">
                                            <div class="counter-number-group">
                                                <span class="counter-number">25</span>
                                                <span class="counter-number-related text-capitalize">projects</span>
                                            </div>
                                            <div class="counter-label text-capitalize font-size-16">in design</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Widget -->
                            </div>

                            <div class="col-md-6">
                                <!-- Widget -->
                                <div class="widget">
                                    <div class="widget-content widget-radius padding-30 bg-white clearfix">
                                        <div class="counter counter-md pull-left text-left">
                                            <div class="counter-number-group">
                                                <span class="counter-number">42</span>
                                                <span class="counter-number-related text-capitalize">people</span>
                                            </div>
                                            <div class="counter-label text-capitalize font-size-16">in room</div>
                                        </div>
                                        <div class="pull-right white">
                                            <i class="icon icon-circle icon-2x wb-users bg-blue-600" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Widget -->
                            </div>

                            <div class="col-md-6">
                                <!-- Widget -->
                                <div class="widget">
                                    <div class="widget-content padding-30 bg-white widget-radius">
                                        <div class="counter counter-md text-left">
                                            <div class="counter-label text-uppercase margin-bottom-5">new visitors</div>
                                            <div class="counter-number-group margin-bottom-10">
                                                <span class="counter-number-related">V</span>
                                                <span class="counter-number">12,657</span>
                                            </div>
                                            <div class="counter-label">
                                                <div class="progress progress-xs margin-bottom-10">
                                                    <div class="progress-bar progress-bar-info bg-blue-600" aria-valuenow="70.3" aria-valuemin="0"
                                                         aria-valuemax="100" style="width: 70.3%" role="progressbar">
                                                        <span class="sr-only">70.3%</span>
                                                    </div>
                                                </div>
                                                <div class="counter counter-sm text-left">
                                                    <div class="counter-number-group">
                                                        <span class="counter-icon blue-600 margin-right-5"><i class="wb-graph-up"></i></span>
                                                        <span class="counter-number">38%</span>
                                                        <span class="counter-number-related">more than last month</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Widget -->
                            </div>

                            <div class="col-md-6">
                                <!-- Widget -->
                                <div class="widget">
                                    <div class="widget-content padding-30 bg-white widget-radius">
                                        <div class="counter counter-md text-left">
                                            <div class="counter-label text-uppercase margin-bottom-5">NEW ORDERS</div>
                                            <div class="counter-number-group margin-bottom-10">
                                                <span class="counter-number-related">O</span>
                                                <span class="counter-number">2,381</span>
                                            </div>
                                            <div class="counter-label">
                                                <div class="progress progress-xs margin-bottom-5">
                                                    <div class="progress-bar progress-bar-info bg-red-600" aria-valuenow="20.3" aria-valuemin="0"
                                                         aria-valuemax="100" style="width: 20.3%" role="progressbar">
                                                        <span class="sr-only">20.3%</span>
                                                    </div>
                                                </div>
                                                <div class="counter counter-sm text-left">
                                                    <div class="counter-number-group">
                                                        <span class="counter-icon red-600 margin-right-5"><i class="wb-graph-down"></i></span>
                                                        <span class="counter-number">14%</span>
                                                        <span class="counter-number-related">less than last month</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Widget -->
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6">
                        <!-- Widget -->
                        <div class="widget">
                            <div class="widget-content padding-30 bg-green-600 widget-radius height-350">
                                <div class="counter counter-lg counter-inverse">
                                    <div class="counter-label">
                                        <div class="font-size-30">2015</div>
                                        <div class="font-size-14">Total Expenses</div>
                                    </div>
                                    <div class="counter-number-group text-center" style="width:100%;position:absolute;bottom:30px;left:0;">
                                        <span class="counter-number">356</span>
                                        <span class="counter-number-related font-size-30">$</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget -->
                    </div>

                    <div class="col-lg-2 col-sm-6">
                        <!-- Widget -->
                        <div class="widget">
                            <div class="widget-content padding-30 bg-orange-600 text-center widget-radius vertical-align height-350">
                                <div class="counter counter-lg counter-inverse vertical-align-middle">
                                    <span class="counter-number">7.3</span>
                                    <div class="counter-label text-capitalize">IMDB Rating</div>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget -->
                    </div>

                    <div class="clearfix visible-lg-block"></div>

                    <div class="col-sm-6">
                        <!-- Widget -->
                        <div class="widget">
                            <div class="widget-content padding-30 bg-blue-600">
                                <div class="widget-watermark darker font-size-60 margin-15"><i class="icon wb-clipboard" aria-hidden="true"></i></div>
                                <div class="counter counter-md counter-inverse text-left">
                                    <div class="counter-number-group">
                                        <span class="counter-number">25</span>
                                        <span class="counter-number-related text-capitalize">projects</span>
                                    </div>
                                    <div class="counter-label text-capitalize">in design</div>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget -->
                    </div>

                    <div class="col-sm-6">
                        <!-- Widget -->
                        <div class="widget">
                            <div class="widget-content padding-30 bg-red-600">
                                <div class="widget-watermark darker font-size-60 margin-15"><i class="icon wb-users" aria-hidden="true"></i></div>
                                <div class="counter counter-md counter-inverse text-left">
                                    <div class="counter-number-group">
                                        <span class="counter-number">42</span>
                                        <span class="counter-number-related text-capitalize">pepele</span>
                                    </div>
                                    <div class="counter-label text-capitalize">in room</div>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget -->
                    </div>

                    <div class="col-sm-6">
                        <!-- Widget -->
                        <div class="widget">
                            <div class="widget-content padding-30 bg-green-600">
                                <div class="widget-watermark darker font-size-60 margin-15"><i class="icon wb-musical" aria-hidden="true"></i></div>
                                <div class="counter counter-md counter-inverse text-left">
                                    <div class="counter-number-group">
                                        <span class="counter-number">661</span>
                                        <span class="counter-number-related text-capitalize">songs</span>
                                    </div>
                                    <div class="counter-label text-capitalize">in album</div>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget -->
                    </div>

                    <div class="col-sm-6">
                        <!-- Widget  -->
                        <div class="widget">
                            <div class="widget-content padding-30 bg-purple-600">
                                <div class="widget-watermark lighter font-size-60 margin-15"><i class="icon wb-image" aria-hidden="true"></i></div>
                                <div class="counter counter-md counter-inverse text-left">
                                    <div class="counter-number-wrap font-size-30">
                                        <span class="counter-number">1025</span>
                                        <span class="counter-number-related text-capitalize">photos</span>
                                    </div>
                                    <div class="counter-label text-capitalize">in family</div>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection