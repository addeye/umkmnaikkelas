@extends('layouts.portal.master')

@section('css')
    <!-- Plugin -->
    {{Html::style('remark/assets/vendor/formvalidation/formValidation.css')}}
    {{Html::style('remark/assets/vendor/bootstrap-datepicker/bootstrap-datepicker.css')}}

    <!-- Plugin -->
    {{Html::style('remark/assets/vendor/jquery-wizard/jquery-wizard.css')}}
    {{Html::style('remark/assets/vendor/formvalidation/formValidation.css')}}
    <!-- Plugin -->
@endsection

@section('content')
    <!-- Page -->
    <div class="container-fluid page-profile">
        <div class="page-content animsition">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel" id="exampleWizardForm">
                        <div class="panel-heading">
                            <h3 class="panel-title">Pengajuan Penghargaan UMKM Naik Kelas</h3>
                        </div>
                        <div class="panel-body">
                            <!-- Steps -->
                            <div class="steps steps-sm row" data-plugin="matchHeight" data-by-row="true" role="tablist">
                                <div class="step col-md-4 current" data-target="#exampleAccount" role="tab">
                                    <span class="step-number">1</span>
                                    <div class="step-desc">
                                        <span class="step-title">Data Pengajuan Penghargaan</span>
                                        <p>Pastikan tanggal dan tahun harus benar</p>
                                    </div>
                                </div>

                                <div class="step col-md-4" data-target="#exampleBilling" role="tab">
                                    <span class="step-number">2</span>
                                    <div class="step-desc">
                                        <span class="step-title">Permasalahan</span>
                                        <p>Jelaskan Permaslahan boleh lebih dari satu bidang</p>
                                    </div>
                                </div>

                                <div class="step col-md-4" data-target="#exampleGetting" role="tab">
                                    <span class="step-number">3</span>
                                    <div class="step-desc">
                                        <span class="step-title">Dokumen Pendukung</span>
                                        <p>Upload dokumen pendukung Kemajauna Usaha anda</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Steps -->

                            <!-- Wizard Content -->
                            <div class="wizard-content">
                                <div class="wizard-pane active" id="exampleAccount" role="tabpanel">
                                    <form id="exampleAccountForm">
                                        <div class="form-group">
                                            <label class="control-label" for="inputUserName">Tahun</label>
                                            <input type="text" class="form-control" id="inputUserName" value="{{date('Y')}}" name="tahun" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputUserName">Tanggal</label>
                                            <input type="text" class="form-control" id="inputUserName" name="tanggal" value="{{date('Y-m-d')}}" data-plugin="datepicker" data-date-format="yyyy-mm-dd" required="required" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputUserName">Info Kontak</label>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputUserName">Nama</label>
                                            <input type="text" class="form-control" id="inputUserName" name="nama" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputUserName">Telepon</label>
                                            <input type="text" class="form-control" id="inputUserName" name="telp" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputUserName">Email</label>
                                            <input type="email" class="form-control" id="inputUserName" name="email" required="required">
                                        </div>
                                    </form>
                                </div>

                                <div class="wizard-pane" id="exampleBilling" role="tabpanel">
                                    <form id="exampleBillingForm">
                                        <p>Jelaskan apa kemajuan usaha anda. Minimal satu bidang. Boleh lebih dari satu</p>
                                        <div class="form-group">
                                            <label class="control-label" for="inputCardNumber">Bidang Pendampingan</label>
                                            <select class="form-control" id="bidang" data-plugin="select2">
                                                <option value=""></option>
                                                @foreach($bidang_pendampingan as $row)
                                                    <option value="{{$row->id}}">{{$row->nama}}</option>
                                                    @endforeach
                                            </select>
                                            <button class="btn btn-primary btn-xs btn-bidang"><span class="glyphicon glyphicon-plus"></span> Pilih Bidang</button>
                                            <span class="help-block">Pilih bidang untuk menjelaskan kemajuan usaha anda</span>
                                        </div>
                                        <div id="inputan-bidang"></div>
                                    </form>
                                </div>

                                <div class="wizard-pane" id="exampleGetting" role="tabpanel">
                                    <div class="text-center margin-vertical-20">
                                        <i class="icon wb-check font-size-40" aria-hidden="true"></i>
                                        <h4>We got your order. Your product will be shipping soon.</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- End Wizard Content -->

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

    {{Html::script(asset('remark/assets/vendor/jquery-wizard/jquery-wizard.js'))}}
    {{Html::script(asset('remark/assets/js/components/jquery-wizard.js'))}}

    <script type="text/javascript">

        // Example Wizard Form
        // -------------------
        (function() {
            // set up formvalidation
            $('#exampleAccountForm').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    tahun: {
                        validators: {
                            notEmpty: {
                                message: 'Tahun tidak boleh kosong'
                            },
                            stringLength: {
                                min: 4,
                                max: 4,
                                message: '4 Digit'
                            },
                            integer : {
                                message: 'Isi dengan angka'
                            }
                        }
                    },
                    tanggal: {
                        validators: {
                            notEmpty: {
                                message: 'Tanggal harus terisi'
                            }
                        }
                    },
                    nama: {
                        validators: {
                            notEmpty: {
                                message: 'Nama harus terisi'
                            }
                        }
                    },
                    telp: {
                        validators: {
                            notEmpty: {
                                message: 'Telp harus terisi'
                            },
                            regexp: {
                                message: 'No telp harus berupa digit angka, spaces, -, (, ), + dan .',
                                regexp: /^[0-9\s\-()+\.]+$/
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Email harus terisi'
                            },
                            emailAddress : {
                                message : 'Email anda harus benar'
                            }
                        }
                    }
                }
            });

            $("#exampleBillingForm").formValidation({
                framework: 'bootstrap',
                fields: {
                    bidang1: {
                        validators: {
                            notEmpty: {
                                message: 'Harus Terisi'
                            }
                        }
                    },
                    bidang2: {
                        validators: {
                            notEmpty: {
                                message: 'Harus Terisi'
                            }
                        }
                    }
                }
            });


            // init the wizard
            var defaults = $.components.getDefaults("wizard");
            var options = $.extend(true, {}, defaults, {
                buttonsAppendTo: '.panel-body'
            });

            var wizard = $("#exampleWizardForm").wizard(options).data(
                'wizard');

            // setup validator
            // http://formvalidation.io/api/#is-valid
            wizard.get("#exampleAccount").setValidator(function() {
                var fv = $("#exampleAccountForm").data('formValidation');
                fv.validate();

                if (!fv.isValid()) {
                    return false;
                }

                return true;
            });

            wizard.get("#exampleBilling").setValidator(function() {
                var fv = $("#exampleBillingForm").data('formValidation');
                fv.validate();

                if (!fv.isValid()) {
                    return false;
                }

                return true;
            });
        })();
        // Example Validataion Standard Mode
        // ---------------------------------
        (function() {
            $('.btn-bidang').click(function () {
                var label = $('#bidang option:selected').text();
                var id = $('#bidang').val();
                var html ='<div class="form-group"><label class="control-label">'+label+'</label><textarea class="form-control" name="bidang'+id+'" required="required"></textarea></div>';
                $('#inputan-bidang').append(html);
            })
        })();
    </script>
@endsection