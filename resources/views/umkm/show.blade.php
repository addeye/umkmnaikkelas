@extends('layouts.apps.master')

@section('content')
    <!-- Page -->
    <div class="page animsition">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <!-- Panel Standard Mode -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="con wb-minus"></i> Detail UMKM</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <img class="img-thumbnail" src="{{asset('uploads/umkm/images/'.$data->path_ktp)}}">
                                    </div>
                                    <div class="col-md-12">
                                        <img class="img-thumbnail" src="{{asset('uploads/umkm/images/'.$data->path_ktp)}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-bordered">
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
                                            <th>No KTP</th>
                                            <td>{{$data->no_ktp}}</td>
                                        </tr>
                                        <tr>
                                            <th>No NPWP</th>
                                            <td>{{$data->no_npwp}}</td>
                                        </tr>
                                        <tr>
                                            <th>Telepon</th>
                                            <td>{{$data->telp}}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{$data->email}}</td>
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
                                            <th>Komunitas Asosiasi</th>
                                            <td>{{$data->komuitas_asosiasi}}</td>
                                        </tr>
                                        <tr>
                                            <th>Website</th>
                                            <td>{{$data->website}}</td>
                                        </tr>
                                        <tr>
                                            <th>Facebook</th>
                                            <td>{{$data->facebook}}</td>
                                        </tr>
                                        <tr>
                                            <th>Twitter</th>
                                            <td>{{$data->twitter}}</td>
                                        </tr>
                                        <tr>
                                            <th>Whatsapp</th>
                                            <td>{{$data->whatsapp}}</td>
                                        </tr>
                                        <tr>
                                            <th>Instagram</th>
                                            <td>{{$data->instagram}}</td>
                                        </tr>
                                        <tr>
                                            <th>Online</th>
                                            <td>{{$data->online}}</td>
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
                    <!-- End Panel Standard Mode -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Page -->

@endsection