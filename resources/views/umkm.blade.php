@extends('layouts.portal.master')

@section('content')
    <!-- Page -->
    <div class="container-fluid">
        <div class="animsition">
            <div class="page-header">
                <h1 class="page-title">Data UMKM LUNAS</h1>
            </div>
            <div class="page-content container-fluid">
                <div class="row">
                    <div class="col-md-12 padding-10">
                        <form method="get">
                            <input type="hidden" name="cari" value="true">
                            <div class="form-group row">
                                <div class="col-md-3 col-xs-6 padding-top-10">
                                    <input type="text" class="form-control" placeholder="Nama UMKM" name="nama_umkm" value="{{$nama_umkm}}">
                                </div>
                                <div class="col-md-4 col-xs-6 padding-top-10">
                                    <select class="form-control" name="kota" data-plugin="select2">
                                        <option value="">Pilih Kota</option>
                                        @foreach($kota as $row)
                                            <option value="{{$row->id}}" {{$kota_id==$row->id?'selected':''}} >{{$row->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 col-xs-12 padding-top-10">
                                    <select class="form-control" name="kategori" data-plugin="select2">
                                        <option value="">Pilih Kategori</option>
                                        @foreach($bidang_usaha as $row)
                                            <option value="{{$row->id}}" {{$bidang_usaha_id==$row->id?'selected':''}} >{{$row->nama}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1 col-xs-12 padding-top-10">
                                    <button type="submit" class="btn btn-primary col-xs-12"><span class="icon fa-search"></span> Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            @foreach($umkm as $row)
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img src="{{asset('images/logo.png')}}" alt="...">
                                        <div class="caption padding-10">
                                            <p class="text-center font-size-20"><strong>{{$row->nama_usaha}}</strong></p>
                                            <p class="text-center"><i class="icon fa-map-marker"></i> {{$row->kota}}</p>
                                            <p class="text-center"><i class="icon fa-diamond"></i> {{$row->bidang_usaha->nama}}</p>
                                            <p class="text-center"><i class="icon fa-dropbox"></i> Produk 0</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                    </div>
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