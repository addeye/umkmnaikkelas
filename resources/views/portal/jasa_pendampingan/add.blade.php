@extends('layouts.portal.master')

@section('css')
    <!-- Plugin -->
    {{Html::style('remark/assets/vendor/formvalidation/formValidation.css')}}
    <!-- Plugin -->
@endsection

@section('content')
    <!-- Page -->
    <div class="container-fluid">
        <div class="page-content animsition">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Form Tambah Jasa Pendampingan
                            </div>
                        </div>
                        <div class="panel-body">
                            <form method="post" class="form-horizontal" id="exampleStandardForm" autocomplete="off" action="{{route('jasa-pendampingan.store')}}" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <input type="hidden" name="pendamping_id" value="{{Auth::user()->pendamping->id}}">
                                <input type="hidden" name="lembaga_id" value="{{Auth::user()->pendamping->lembaga_id}}">
                                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Title *</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title" placeholder="Title.." value="{{old('title')}}" />
                                        <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('bidang_pendampingan') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Bidang Pendampingan</label>
                                    <div class="col-sm-9 select2-warning">
                                        <select class="form-control" name="bidang_pendampingan[]" multiple data-plugin="select2">
                                            @foreach($bidang_pendampingan as $row)
                                                <option value="{{$row->nama}}" {{in_array($row->nama,old('bidang_pendampingan')?old('bidang_pendampingan'):[])?'selected':''}} >{{$row->nama}}</option>
                                            @endforeach
                                        </select>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('bidang_pendampingan') }}</strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('bidang_keahlian') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Bidang Keahlian</label>
                                    <div class="col-sm-9 select2-warning">
                                        <select class="form-control" multiple data-plugin="select2" name="bidang_keahlian[]">
                                            @foreach($bidang_keahlian as $row)
                                                <option value="{{$row->nama}}" {{in_array($row->nama,old('bidang_keahlian')?old('bidang_keahlian'):[])?'selected':''}} >{{$row->nama}}</option>
                                            @endforeach
                                        </select>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('bidang_keahlian') }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Deskripsi *</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="deskripsi" placeholder="Deskripsi jasa"></textarea>
                                        <span class="help-block">
                                    <strong>{{ $errors->first('deskripsi') }}</strong>
                                </span>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('harga') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Harga *</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="harga" placeholder="Angka" value="{{old('harga')}}" />
                                        <span class="help-block">
                                    <strong>{{ $errors->first('harga') }}</strong>
                                </span>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('diskon') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Diskon</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-icon">
                                            <input class="form-control" name="diskon" type="text">
                                            <span class="input-group-addon">
                                            %
                                            </span>
                                        </div>
                                        <span class="help-block">
                                    <strong>{{ $errors->first('diskon') }}</strong>
                                </span>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <a href="{{route('jasa-pendampingan.index')}}" class="btn btn-warning">Kembali</a>
                                    <button type="submit" class="btn btn-primary" id="validateButton2">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{Html::script(asset('remark/assets/vendor/formvalidation/formValidation.min.js'))}}
    {{Html::script(asset('remark/assets/vendor/formvalidation/framework/bootstrap.min.js'))}}

    <script type="text/javascript">
        // Example Validataion Standard Mode
        // ---------------------------------
        (function() {
            $('#exampleStandardForm').formValidation({
                framework: "bootstrap",
                button: {
                    selector: '#validateButton2',
                    disabled: 'disabled'
                },
                icon: null,
                fields: {
                    title: {
                        validators: {
                            notEmpty: {
                                message: 'Judul yang akan tampil di jasa pendampingan anda'
                            }
                        }
                    },
                    bidang_pendampingan: {
                        validators: {
                            notEmpty: {
                                message: 'Isi dengan benar'
                            }
                        }
                    },
                    bidang_keahlian: {
                        validators: {
                            notEmpty: {
                                message: 'Isi dengan benar'
                            }
                        }
                    },
                    deskripsi: {
                        validators: {
                            notEmpty: {
                                message: 'Diskripsi singkat mengenai jasa pendampingan anda'
                            }
                        }
                    },
                    harga: {
                        validators: {
                            notEmpty: {
                                message: 'Harga yang akan tampil di jasa pendampingan anda'
                            },
                            integer: {
                                message: 'Isi dengan angka untuk harga jasa pendampingan'
                            }
                        }
                    },
                    diskon: {
                        validators: {
                            notEmpty: {
                                message: 'Potongan harga pada jasa pendampingan anda'
                            },
                            integer: {
                                message: 'Isi dengan angka untuk diskon jasa pendampingan'
                            }
                        }
                    }
                }
            });
        })();
    </script>
@endsection