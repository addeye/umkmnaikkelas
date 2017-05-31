@extends('layouts.portal.master')

@section('css')
    <!-- Plugin -->
    {{Html::style('remark/assets/vendor/formvalidation/formValidation.css')}}
    {{Html::style('remark/assets/vendor/bootstrap-datepicker/bootstrap-datepicker.css')}}
    <!-- Plugin -->
@endsection

@section('content')
    <!-- Page -->
    <div class="container-fluid page-profile">
        <div class="page-content animsition">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Form Pengajuan Penghargaan UMKM Naik Kelas
                            </div>
                        </div>
                        <div class="panel-body">
                            <form method="post" class="form-horizontal" id="exampleStandardForm" autocomplete="off" action="{{route('pengajuan-umkm.store')}}" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <input type="hidden" name="umkm_id" value="{{Auth::user()->umkm->id}}">

                                <div class="form-group {{ $errors->has('tgl_pencatatan') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Tahun *</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="icon wb-calendar" aria-hidden="true"></i>
                                                </span>
                                            <input type="text" class="form-control" name="tahun" value="{{old('tahun')?old('tahun'):date('Y')}}">
                                        </div>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tahun') }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('tanggal') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Tanggal Pengajuan *</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="icon wb-calendar" aria-hidden="true"></i>
                                                </span>
                                            <input type="text" class="form-control" name="tanggal" value="{{old('tanggal')?old('tanggal'):date('Y-m-d')}}" data-plugin="datepicker" data-date-format="yyyy-mm-dd" readonly>
                                        </div>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tanggal') }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('keterangan') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Keterangan *</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="keterangan">{{old('keterangan')}}</textarea>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('keterangan') }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('keterangan') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Keterangan *</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="keterangan">{{old('keterangan')}}</textarea>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('keterangan') }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h4>Contact Person</h4>
                                </div>
                                <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Nama *</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama" value="{{old('nama')}}">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nama') }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('telp') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Telp *</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="telp" value="{{old('telp')}}">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('telp') }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Email *</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="email" value="{{old('email')}}">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <a href="{{route('pengajuan-umkm.index')}}" class="btn btn-warning">Kembali</a>
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

    {{Html::script(asset('remark/assets/vendor/bootstrap-datepicker/bootstrap-datepicker.js'))}}
    {{Html::script(asset('remark/assets/js/components/bootstrap-datepicker.js'))}}

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
                    tgl_pencatatan: {
                        validators: {
                            notEmpty: {
                                message: 'Tanggal tidak boleh kosong'
                            }
                        }
                    },
                    omset: {
                        validators: {
                            notEmpty: {
                                message: 'Isi dengan benar'
                            },
                            integer:{
                                message: 'Harus dengan angka'
                            }
                        }
                    },
                    aset: {
                        validators: {
                            notEmpty: {
                                message: 'Isi dengan benar'
                            },
                            integer:{
                                message: 'Harus dengan angka'
                            }

                        }
                    },
                    jml_tenagakerja_tetap: {
                        validators: {
                            notEmpty: {
                                message: 'Isi dengan benar'
                            },
                            integer:{
                                message: 'Harus dengan angka'
                            }
                        }
                    },
                    jml_tenagakerjatidak_tetap: {
                        validators: {
                            notEmpty: {
                                message: 'Isi dengan benar'
                            },
                            integer: {
                                message: 'Harus dengan angka'
                            }
                        }
                    },
                    varian_produk: {
                        validators: {
                            notEmpty: {
                                message: 'Wajib terisi'
                            }
                        }
                    },
                    kapasitas_produksi: {
                        validators: {
                            notEmpty: {
                                message: 'Wajib terisi'
                            }
                        }
                    }
                }
            });
        })();
    </script>
@endsection