@extends('layouts.portal.master')

@section('content')
    <!-- Page -->
    <div class="container-fluid page-profile">
        <div class="page-content animsition">
            <div class="row">
                <div class="col-md-12">
                    <!-- Panel Standard Mode -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Detail Pengajuan Tahun {{$pengajuan->tahun}}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 padding-5 text-right">
                                    <h4>Tanggal : {{date('d-m-Y',strtotime($pengajuan->tanggal))}}</h4>
                                </div>
                                <div class="col-md-9">
                                    <h4>Kemajuan Usaha Per Bidang</h4>
                                    @foreach($pengajuan->pengajuan_umkm_detail as $row)
                                        <p><strong>{{$row->bidang_pendampingan->nama}}</strong> : {{$row->keterangan}}</p>
                                    @endforeach
                                    <h4>File Pendukung</h4>
                                    <ul>
                                        @foreach($pengajuan->pengajuan_umkm_files as $file)
                                        <li>{{$file->nama}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-3">
                                    <h4 class="title">Kontak Person</h4>
                                    <p>Nama : {{$pengajuan->nama}}</p>
                                    <p>No Telp : {{$pengajuan->telp}}</p>
                                    <p>Email : {{$pengajuan->email}}</p>
                                    <h4>Info</h4>
                                    <label>Status : {{$pengajuan->status}}</label>
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