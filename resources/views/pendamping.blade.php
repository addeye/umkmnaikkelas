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
                    <div class="col-md-12 padding-10">
                        <form method="get">
                            <input type="hidden" name="cari" value="true">
                            <div class="form-group row">
                                <div class="col-md-3 col-xs-12 padding-top-10">
                                    <select class="form-control" name="lembaga" data-plugin="select2">
                                        <option value="">Pilih Lembaga</option>
                                        @foreach($lembaga as $row)
                                            <option value="{{$row->id}}" {{$lembaga_id==$row->id?'selected':''}} >{{$row->nama_lembaga}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 col-xs-12 padding-top-10">
                                    <select class="form-control" name="kota" data-plugin="select2">
                                        <option value="">Pilih Kota</option>
                                        @foreach($kota as $row)
                                            <option value="{{$row->id}}" {{$kabkota_id==$row->id?'selected':''}} >{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 col-xs-12 padding-top-10">
                                    <select class="form-control" name="bidang_pendampingan" data-plugin="select2">
                                        <option value="">Bidang Pendampingan</option>
                                        @foreach($bidang_pendampingan as $row)
                                            <option value="{{$row->nama}}" {{$bidang_pendampingan_id==$row->nama?'selected':''}} >{{$row->nama}}</option>
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
                            @foreach($pendamping as $row)
                            <div class="col-md-3">
                                <div class="widget">
                                    <div class="widget-header white bg-cyan-600 padding-30 clearfix">
                                        <a class="avatar avatar-100 pull-left margin-right-20" href="javascript:void(0)">
                                            @if($row->user->image=='')
                                            <img src="{{asset('remark/assets/portraits/5.jpg')}}" alt="">
                                                @else
                                                <img style="height: 100px" src="{{asset('uploads/user/images/'.$row->user->image)}}" alt="">
                                            @endif
                                        </a>
                                        <div class="pull-left">
                                            <div class="font-size-20 margin-bottom-15">{{$row->nama_pendamping}}</div>
                                            <p class="margin-bottom-5 text-nowrap"><i class="icon wb-envelope margin-right-10" aria-hidden="true"></i>
                                                <span class="text-break">{{$row->email}}</span>
                                            </p>
                                            <p class="margin-bottom-5 text-nowrap"><i class="icon fa-phone margin-right-10" aria-hidden="true"></i>
                                                <span class="text-break">{{$row->telp}}</span>
                                            </p>
                                            <p class="margin-bottom-5 text-nowrap"><i class="icon fa-home margin-right-10" aria-hidden="true"></i>
                                                <span class="text-break">{{$row->lembaga->nama_lembaga}}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="widget-content bg-white container-fluid">
                                        <div class="row no-space padding-vertical-20 padding-horizontal-30 text-center">
                                            <div class="col-xs-4">
                                                <div class="counter">
                                                    <span class="counter-number cyan-600">{{count($row->jasa_pendampingan)}}</span>
                                                    <div class="counter-label">Jasa</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="counter">
                                                    <span class="counter-number cyan-600">0</span>
                                                    <div class="counter-label">UMKM</div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="counter">
                                                    <span class="counter-number cyan-600">0</span>
                                                    <div class="counter-label">Kegiatan</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                        </div>
                    </div>
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
                                        <div class="counter-label text-uppercase">Lainnya</div>
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