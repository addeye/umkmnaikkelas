@extends('layouts.portal.master')

@section('content')
    <!-- Page -->
    <div class="container-fluid">
        <div class="animsition">
            <div class="page-header">
                <h1 class="page-title">DATA PENDAMPING</h1>
            </div>
            <div class="page-content container-fluid">
                <div class="row">
                    <div class="col-sm-3">

                        <div class="col-md-12">
                            <div class="widget">
                                <div class="widget-content widget-radius padding-25 bg-blue-600">
                                    <div class="counter counter-lg counter-inverse">
                                        <div class="counter-label text-uppercase">Total</div>
                                        <span class="counter-number">{{$total_pendamping}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="widget">
                                <div class="widget-content widget-radius padding-25 bg-orange-600">
                                    <div class="counter counter-lg counter-inverse">
                                        <div class="counter-label text-uppercase">Online</div>
                                        <span class="counter-number">{{0}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="widget">
                                <div class="widget-content widget-radius padding-25 bg-red-600">
                                    <div class="counter counter-lg counter-inverse">
                                        <div class="counter-label text-uppercase">SENTRA</div>
                                        <span class="counter-number">{{0}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection