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
                                Masukkan Data Periode
                            </div>
                        </div>
                        <div class="panel-body">
                            <form method="post" class="form-horizontal" id="exampleStandardForm" autocomplete="off" action="{{route('data-periode.store')}}" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <input type="hidden" name="umkm_id" value="{{Auth::user()->umkm->id}}">
                                <div class="form-group {{ $errors->has('tgl_pencatatan') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Tanggal Pencatatan *</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                  <i class="icon wb-calendar" aria-hidden="true"></i>
                                                </span>
                                            <input type="text" class="form-control" name="tgl_pencatatan" value="{{old('tgl_pencatatan')?old('tgl_pencatatan'):date('Y-m-d')}}" data-plugin="datepicker" data-date-format="yyyy-mm-dd">
                                        </div>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tgl_pencatatan') }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('omset') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Omset *</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                  Rp.
                                                </span>
                                            <input type="text" class="form-control" name="omset" value="{{old('omset')}}" />
                                        </div>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('omset') }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('aset') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Aset *</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                  Rp.
                                                </span>
                                        <input type="text" class="form-control" name="aset" value="{{old('aset')}}" />
                                        </div>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('aset') }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('jml_tenagakerja_tetap') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Jumlah Tenaga Kerja Tetap *</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="jml_tenagakerja_tetap" value="{{old('jml_tenagakerja_tetap')}}" />
                                        <span class="help-block">
                                            <strong>{{ $errors->first('jml_tenagakerja_tetap') }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('jml_tenagakerjatidak_tetap') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Jumlah Tenaga Kerja Tidak Tetap *</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="jml_tenagakerjatidak_tetap" value="{{old('jml_tenagakerjatidak_tetap')}}" />
                                        <span class="help-block">
                                            <strong>{{ $errors->first('jml_tenagakerjatidak_tetap') }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('varian_produk') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Varian Produk *</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="varian_produk">{{old('varian_produk')}}</textarea>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('varian_produk') }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('kapasitas_produksi') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Kapasitas Produksi *</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="kapasitas_produksi">{{old('kapasitas_produksi')}}</textarea>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('kapasitas_produksi') }}</strong>
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