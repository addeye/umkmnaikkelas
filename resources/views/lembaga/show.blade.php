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
                            <h3 class="panel-title"><i class="con wb-minus"></i> Detail Lembaga</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <img class="img-thumbnail" src="{{asset('uploads/lembaga/images/'.$data->foto_kantor)}}">
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Nama File</th>
                                                <th>Path</th>
                                            </tr>
                                            <tr>
                                                <td>File Document</td>
                                                <td>{{$data->profil_doc}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>ID Lembaga</th>
                                            <td>{{$data->id_lembaga}}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Lembaga</th>
                                            <td>{{$data->nama_lembaga}}</td>
                                        </tr>
                                        <tr>
                                            <th>Legalitas</th>
                                            <td>{{$data->legalitas}}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>{{$data->alamat}}</td>
                                        </tr>
                                        <tr>
                                            <th>Kabupaten/Kota</th>
                                            <td>{{Indonesia::findCity($data->kab_id)->name}}</td>
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
                                            <th>Website</th>
                                            <td>{{$data->website}}</td>
                                        </tr>
                                        <tr>
                                            <th>Pimpinan</th>
                                            <td>{{$data->pimpinan}}</td>
                                        </tr>
                                        <tr>
                                            <th>Layanan</th>
                                            <td>{{$data->layanan}}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>{{$data->status}}</td>
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