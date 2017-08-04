@extends('layouts.portal.master')

@section('content')
    <!-- Page -->
    <div class="container-fluid">
        <div class="page-header animsition">
            <h1 class="page-title">Pendamping</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{route('page.pendamping')}}">Pendamping</a></li>
                <li class="active">Detail Pendamping</li>
            </ol>
        </div>
        <div class="animsition">            
            <div class="page-content container-fluid">
                <div class="row">
                <div class="col-md-12">
                    <!-- Panel Standard Mode -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="con wb-minus"></i> Detail Pendamping</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <img class="img-thumbnail" src="{{asset('uploads/user/images/'.$data->user->image)}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>ID Pendamping</th>
                                            <td>{{$data->id_pendamping}}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <td>{{$data->nama_pendamping}}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat Domisili</th>
                                            <td>{{$data->alamat_domisili}}</td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <td>{{$data->jenis_kelamin=='L'?'Laki-laki':'Perempuan'}}</td>
                                        </tr>
                                        {{-- <tr>
                                            <th>Telepon</th>
                                            <td>{{$data->telp}}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{$data->email}}</td>
                                        </tr> --}}
                                        <tr>
                                            <th>Pendidikan</th>
                                            <td>{{$data->pendidikan}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tahun Mulai Pendampingan</th>
                                            <td>{{$data->tahun_mulai}}</td>
                                        </tr>
                                        <tr>
                                            <th>Pengalaman</th>
                                            <td>{{$data->pengalaman}}</td>
                                        </tr>
                                        <tr>
                                            <th>Sertifikat</th>
                                            <td>{{$data->sertifikat}}</td>
                                        </tr>
                                        <tr>
                                            <th>Bidang Pendampingan</th>
                                            <td>{{$data->bidang_pendampingan}}</td>
                                        </tr>
                                        <tr>
                                            <th>Bidang Keahlian</th>
                                            <td>{{$data->bidang_keahlian}}</td>
                                        </tr>
                                        <tr>
                                            <th>Bidang Usaha</th>
                                            <td>{{$data->bidang_usaha}}</td>
                                        </tr>
                                        <tr>
                                            <th>Kabupaten/Kota Pendampingan</th>
                                            <td>
                                                @if($data->kabkota_id)
                                                {{Indonesia::findCity($data->kabkota_id)->name}}
                                                    @else
                                                    -
                                                    @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Kabupaten/Kota Tambahan</th>
                                            <td>
                                                @if(count($kabkota_tambahan_arr)>1)
                                                <ol>
                                                    @foreach($kabkota_tambahan_arr as $row)
                                                        <li>{{Indonesia::findCity($row)->name}}</li>
                                                    @endforeach
                                                </ol>
                                                    @else
                                                Tidak ada
                                                    @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Lembaga</th>
                                            <td>{{$data->lembaga?$data->lembaga->nama_lembaga:'Lainnya'}}</td>
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
    </div>
@endsection