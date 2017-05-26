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
                    <div class="col-sm-12">

                        <div class="col-md-3">
                            <div class="widget">
                                <div class="widget-content widget-radius padding-25 bg-orange-600">
                                    <div class="counter counter-lg counter-inverse">
                                        <div class="counter-label text-uppercase">Total</div>
                                        <span class="counter-number">{{$total_pendamping}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="widget">
                                <div class="widget-content widget-radius padding-25 bg-green-600">
                                    <div class="counter counter-lg counter-inverse">
                                        <div class="counter-label text-uppercase">Kelembagaan</div>
                                        <span class="counter-number">{{$total_kelembagaan}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="widget">
                                <div class="widget-content widget-radius padding-25 bg-red-600">
                                    <div class="counter counter-lg counter-inverse">
                                        <div class="counter-label text-uppercase">SDM</div>
                                        <span class="counter-number">{{$total_sdm}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="widget">
                                <div class="widget-content widget-radius padding-25 bg-blue-600">
                                    <div class="counter counter-lg counter-inverse">
                                        <div class="counter-label text-uppercase">Produksi</div>
                                        <span class="counter-number">{{$total_produksi}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="widget">
                                <div class="widget-content widget-radius padding-25 bg-grey-600">
                                    <div class="counter counter-lg counter-inverse">
                                        <div class="counter-label text-uppercase">Pembiayaan</div>
                                        <span class="counter-number">{{$total_pembiayaan}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="widget">
                                <div class="widget-content widget-radius padding-25 bg-red-600">
                                    <div class="counter counter-lg counter-inverse">
                                        <div class="counter-label text-uppercase">Pemasaran</div>
                                        <span class="counter-number">{{$total_pemasaran}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="widget">
                                <div class="widget-content widget-radius padding-25 bg-green-600">
                                    <div class="counter counter-lg counter-inverse">
                                        <div class="counter-label text-uppercase">IT & Kerjasama</div>
                                        <span class="counter-number">{{$total_it}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="widget">
                                <div class="widget-content widget-radius padding-25 bg-orange-600">
                                    <div class="counter counter-lg counter-inverse">
                                        <div class="counter-label text-uppercase">Bidang Pendampingan Lainnya</div>
                                        <span class="counter-number">{{$total_lainnya}}</span>
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