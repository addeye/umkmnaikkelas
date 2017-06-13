@extends('layouts.portal.master')

@section('content')
    <!-- Page -->
    <div class="container-fluid">
        <div class="animsition">
            <div class="page-header">
                <h1 class="page-title">Profil UMKM LUNAS</h1>
            </div>
            <div class="page-content container-fluid">
                <div class="row">
                <div class="col-sm-3">                    
                    <div class="col-md-12">
                      <div class="widget">
                        <div class="widget-content widget-radius padding-25 bg-blue-600">
                          <div class="counter counter-lg counter-inverse">
                            <div class="counter-label text-uppercase">Total</div>
                            <span class="counter-number">{{$total_umkm}}</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="widget">
                        <div class="widget-content widget-radius padding-25 bg-orange-600">
                          <div class="counter counter-lg counter-inverse">
                            <div class="counter-label text-uppercase">Online</div>
                            <span class="counter-number">{{$online}}</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="widget">
                        <div class="widget-content widget-radius padding-25 bg-red-600">
                          <div class="counter counter-lg counter-inverse">
                            <div class="counter-label text-uppercase">SENTRA</div>
                            <span class="counter-number">{{$sentra_umkm}}</span>
                          </div>
                        </div>
                      </div>
                    </div>

                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-sm-6">
                          <!-- Widget -->
                          <div class="widget">
                            <div class="widget-content padding-30 bg-blue-600">
                              <div class="widget-watermark darker font-size-60 margin-15"><i class="icon wb-clipboard" aria-hidden="true"></i></div>
                              <div class="counter counter-md counter-inverse text-left">
                                <div class="counter-number-group">
                                  <span class="counter-number">{{$pertanian}}</span>
                                  <span class="counter-number-related text-capitalize">Usaha</span>
                                </div>
                                <div class="counter-label text-capitalize">Pertanian, Peternakan, Kehutanan, Perikanan</div>
                              </div>
                            </div>
                          </div>
                          <!-- End Widget -->
                        </div>

                        <div class="col-sm-6">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-content padding-30 bg-orange-600">
                                    <div class="widget-watermark darker font-size-60 margin-15"><i class="icon wb-clipboard" aria-hidden="true"></i></div>
                                    <div class="counter counter-md counter-inverse text-left">
                                        <div class="counter-number-group">
                                            <span class="counter-number">{{$perdagangan}}</span>
                                            <span class="counter-number-related text-capitalize">Usaha</span>
                                        </div>
                                        <div class="counter-label text-capitalize">Perdagangan, Hotel dan Restoran</div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Widget -->
                        </div>

                        <div class="col-sm-6">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-content padding-30 bg-red-600">
                                    <div class="widget-watermark darker font-size-60 margin-15"><i class="icon wb-clipboard" aria-hidden="true"></i></div>
                                    <div class="counter counter-md counter-inverse text-left">
                                        <div class="counter-number-group">
                                            <span class="counter-number">{{$pengangkutan}}</span>
                                            <span class="counter-number-related text-capitalize">Usaha</span>
                                        </div>
                                        <div class="counter-label text-capitalize">Pengangkutan & Komunikasi</div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Widget -->
                        </div>

                        <div class="col-sm-6">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-content padding-30 bg-green-600">
                                    <div class="widget-watermark darker font-size-60 margin-15"><i class="icon wb-clipboard" aria-hidden="true"></i></div>
                                    <div class="counter counter-md counter-inverse text-left">
                                        <div class="counter-number-group">
                                            <span class="counter-number">{{$listrik}}</span>
                                            <span class="counter-number-related text-capitalize">Usaha</span>
                                        </div>
                                        <div class="counter-label text-capitalize">Listrik, Gas, Air</div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Widget -->
                        </div>

                        <div class="col-sm-6">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-content padding-30 bg-blue-600">
                                    <div class="widget-watermark darker font-size-60 margin-15"><i class="icon wb-clipboard" aria-hidden="true"></i></div>
                                    <div class="counter counter-md counter-inverse text-left">
                                        <div class="counter-number-group">
                                            <span class="counter-number">{{$industri}}</span>
                                            <span class="counter-number-related text-capitalize">Usaha</span>
                                        </div>
                                        <div class="counter-label text-capitalize">Indusri Pengolahan</div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Widget -->
                        </div>

                        <div class="col-sm-6">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-content padding-30 bg-orange-600">
                                    <div class="widget-watermark darker font-size-60 margin-15"><i class="icon wb-clipboard" aria-hidden="true"></i></div>
                                    <div class="counter counter-md counter-inverse text-left">
                                        <div class="counter-number-group">
                                            <span class="counter-number">{{$bangunan}}</span>
                                            <span class="counter-number-related text-capitalize">Usaha</span>
                                        </div>
                                        <div class="counter-label text-capitalize">Bangunan</div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Widget -->
                        </div>

                        <div class="col-sm-6">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-content padding-30 bg-blue-600">
                                    <div class="widget-watermark darker font-size-60 margin-15"><i class="icon wb-clipboard" aria-hidden="true"></i></div>
                                    <div class="counter counter-md counter-inverse text-left">
                                        <div class="counter-number-group">
                                            <span class="counter-number">{{$pertambangan}}</span>
                                            <span class="counter-number-related text-capitalize">Usaha</span>
                                        </div>
                                        <div class="counter-label text-capitalize">Pertambangan</div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Widget -->
                        </div>

                        <div class="col-sm-6">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-content padding-30 bg-red-600">
                                    <div class="widget-watermark darker font-size-60 margin-15"><i class="icon wb-clipboard" aria-hidden="true"></i></div>
                                    <div class="counter counter-md counter-inverse text-left">
                                        <div class="counter-number-group">
                                            <span class="counter-number">{{$jasa_swasta}}</span>
                                            <span class="counter-number-related text-capitalize">Usaha</span>
                                        </div>
                                        <div class="counter-label text-capitalize">Jasa Swasta</div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Widget -->
                        </div>

                        <div class="col-sm-6">
                            <!-- Widget -->
                            <div class="widget">
                                <div class="widget-content padding-30 bg-orange-600">
                                    <div class="widget-watermark darker font-size-60 margin-15"><i class="icon wb-clipboard" aria-hidden="true"></i></div>
                                    <div class="counter counter-md counter-inverse text-left">
                                        <div class="counter-number-group">
                                            <span class="counter-number">{{$jasa_lainnya}}</span>
                                            <span class="counter-number-related text-capitalize">Usaha</span>
                                        </div>
                                        <div class="counter-label text-capitalize">Jasa Lainnya</div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Widget -->
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection