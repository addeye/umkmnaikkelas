@extends('layouts.portal.master')

@section('content')
    <!-- Page -->
    <div class="container-fluid">
        <div class="page-content animsition">
            <div class="row">
                <div class="col-md-12">
                    <!-- Panel Standard Mode -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Pengajuan Tahun {{$pengajuan->tahun}}</h3>
                        </div>
                        <form method="post" action="{{route('pengajuan-umkm.update',['id'=>$pengajuan->id])}}">
                        <div class="panel-body">

                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="PUT">
                            <div class="row">
                                <div class="col-md-12 padding-5 text-right">
                                    <h4>Tanggal : {{date('d-m-Y',strtotime($pengajuan->tanggal))}}</h4>
                                </div>
                                <div class="col-md-9">
                                    <h4>Kemajuan Usaha Per Bidang</h4>
                                    @foreach($pengajuan->pengajuan_umkm_detail as $row)
                                        <p class="form-control-static"><strong>{{$row->bidang_pendampingan->nama}}</strong></p>
                                        <textarea rows="4" name="keterangan_bidang[]" class="form-control">{{$row->keterangan}}</textarea>
                                        <input type="hidden" name="detail_id[]" value="{{$row->id}}">
                                    @endforeach
                                </div>
                                <div class="col-md-3">
                                    <h4 class="title">Kontak Person</h4>
                                    <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
                                        <p class="form-control-static">Nama :</p>
                                        <input name="nama" type="text" class="form-control" value="{{$pengajuan->nama}}">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nama') }}</strong>
                                        </span>
                                    </div>
                                    <div class="form-group {{ $errors->has('telp') ? ' has-error' : '' }}">
                                        <p class="form-control-static">No Telp</p>
                                        <input name="telp" type="text" class="form-control" value="{{$pengajuan->telp}}">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('telp') }}</strong>
                                        </span>
                                    </div>
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <p class="form-control-static">Email</p>
                                        <input name="email" type="text" class="form-control" value="{{$pengajuan->email}}">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    </div>
                                    <div class="form-group {{ $errors->has('ketarangan') ? ' has-error' : '' }}">
                                        <p class="form-control-static">Keterangan Tambahan</p>
                                        <textarea rows="4" name="keterangan" class="form-control">{{$pengajuan->keterangan}}</textarea>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('keterangan') }}</strong>
                                        </span>
                                    </div>
                                    <h4>Info</h4>
                                    <label>Status : {{$pengajuan->status}}</label>
                                </div>
                            </div>

                        </div>
                        <div class="panel-footer">
                            <div class="text-right">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{route('pengajuan-umkm.show',['id'=>$pengajuan->id])}}" class="btn btn-warning">Batal</a>
                            </div>
                        </div>
                        </form>
                    </div>
                    <!-- End Panel Standard Mode -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Page -->
@endsection