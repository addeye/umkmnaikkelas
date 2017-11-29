@extends('layouts.portal.master')

@section('content')
    <!-- Page -->
    <div class="container-fluid">
        <div class="animsition">
            <div class="page-header">
                <h1 class="page-title">Data UMKM</h1>
                <ol class="breadcrumb">
                  <li><a href="{{ url('/') }}">Home</a></li>
                  <li><a href="{{ route('page.umkm') }}">Data UMKM</a></li>
                  <li class="active">{{$data->nama_usaha}}</li>
                </ol>
                <div class="page-header-actions">
                  <a href="{{ route('page.umkm') }}" class="btn btn-sm btn-outline btn-default btn-round">
                    <span class="text hidden-xs">Kembali</span>
                    <i class="icon wb-chevron-left" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            <div class="page-content container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                        <tr>
                                            <th>NIU (Nomor Induk UMKM)</th>
                                            <td>{{$data->id_umkm}}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Usaha</th>
                                            <td>{{$data->nama_usaha}}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Pemilik</th>
                                            <td>{{$data->nama_pemilik}}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>{{$data->alamat}}</td>
                                        </tr>
                                        <tr>
                                            <th>Kabupaten Kota</th>
                                            <td>{{$data->kota}}</td>
                                        </tr>
                                        <tr>
                                            <th>Kecamatan</th>
                                            <td>{{$data->kecamatan}}</td>
                                        </tr>
                                        <tr>
                                            <th>Badan Hukum</th>
                                            <td>{{$data->badan_hukum}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tahun Mulai Usaha</th>
                                            <td>{{$data->tahun_mulai}}</td>
                                        </tr>
                                        <tr>
                                            <th>Skala Usaha</th>
                                            <td>{{$data->skala_usaha}}</td>
                                        </tr>
                                        <tr>
                                            <th>Bidang Usaha</th>
                                            <td>{{$data->bidang_usaha->nama}}</td>
                                        </tr>
                                        <tr>
                                            <th>Produk</th>
                                            <td>{{$data->produk}}</td>
                                        </tr>
                                        <tr>
                                            <th>Sentra UMKM</th>
                                            <td>{{$data->sentra_umkm}}</td>
                                        </tr>
                                    </table>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection