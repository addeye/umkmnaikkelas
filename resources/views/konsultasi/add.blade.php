@extends('layouts.portal.master')

    @section('css')
<!-- Plugin -->
{{Html::style('remark/assets/css/pages/profile.css')}}
    @endsection

    @section('content')
<!-- Page -->
<div class="container-fluid page-profile">
    <div class="page-content animsition">
        <div class="row">
            <div class="col-md-8">
                <div class="panel">
                    <div class="panel-body">
                        <h4 class="example-title">Buat Konsultasi Baru</h4>
                        <form autocomplete="off" method="post" action="{{ route('konsultasi.store') }}">
                        {{ csrf_field()}}
                            <div class="form-group {{ $errors->has('bidang_pendampingan_id') ? ' has-error' : '' }}">
                                <label class="control-label">Pilih Bidang</label>
                                <select class="form-control" name="bidang_pendampingan_id">
                                @foreach ($bidang as $row)
                                    <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                                </select>
                                <span class="help-block">
                                            <strong>{{ $errors->first('bidang_pendampingan_id') }}</strong>
                                        </span>
                            </div>
                            <div class="form-group {{ $errors->has('subject') ? ' has-error' : '' }}">
                                <label class="control-label" for="inputBasicEmail">
                                    Subject
                                </label>
                                <input autocomplete="off" class="form-control" id="inputBasicEmail" name="subject" placeholder="Subject Konsultasi.." type="text">
                                </input>
                                <span class="help-block">
                                            <strong>{{ $errors->first('subject') }}</strong>
                                        </span>
                            </div>
                            <div class="form-group {{ $errors->has('chat') ? ' has-error' : '' }}">
                                <label class="control-label" for="inputBasicEmail">
                                    Permasalahan
                                </label>
                                <textarea class="form-control" name="chat" placeholder="Permasalahan..."></textarea>
                                <span class="help-block">
                                            <strong>{{ $errors->first('chat') }}</strong>
                                        </span>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">
                                   <i class="fa fa-send"></i> Kirim Sekarang
                                </button>
                                <a href="{{ route('konsultasi.index') }}" class="btn btn-warning">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @include('konsultasi.sub_riwayat')
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')

@endsection
