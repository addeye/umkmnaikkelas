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
    <div class="container-fluid">
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
                                <div class="step col-md-3 current" data-target="#exampleAccount" role="tab">
                                    <span class="step-number">1</span>
                                    <div class="step-desc">
                                        <span class="step-title">Data Pengajuan</span>
                                        <p>Pastikan tanggal dan tahun harus benar</p>
                                    </div>
                                </div>

                                <div class="step col-md-3" data-target="#exampleBilling1" role="tab">
                                    <span class="step-number">2</span>
                                    <div class="step-desc">
                                        <span class="step-title">Bidang Pendampingan</span>
                                        <p>Informasi Kemajuan Usaha</p>
                                    </div>
                                </div>

                                <div class="step col-md-3" data-target="#exampleBilling2" role="tab">
                                    <span class="step-number">3</span>
                                    <div class="step-desc">
                                        <span class="step-title">Bidang Keahlian</span>
                                        <p>Informasi Kemajuan Usaha</p>
                                    </div>
                                </div>

                                <div class="step col-md-3" data-target="#exampleGetting" role="tab">
                                    <span class="step-number">4</span>
                                    <div class="step-desc">
                                        <span class="step-title">Dokumen Pendukung</span>
                                        <p>Upload Dokumen</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Steps -->

                            <!-- Wizard Content -->
                            <div class="wizard-content">
                                <form id="form-pengajuan" action="{{route('pengajuan-pendamping.store')}}" method="post" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                <div class="wizard-pane active" id="exampleAccount" role="tabpanel">
                                    <div id="exampleAccountForm">
                                        <div class="form-group">
                                            <label class="control-label" for="inputUserName">Tanggal</label>
                                            <input type="text" class="form-control" id="inputUserName" name="tanggal" value="{{date('Y-m-d')}}" data-plugin="datepicker" data-date-format="yyyy-mm-dd" required="required" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputUserName">Kontak Person yang bisa dihubungi</label>
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
                                    </div>
                                </div>

                                <div class="wizard-pane" id="exampleBilling1" role="tabpanel">
                                    <div id="exampleBillingForm1">
                                        <p>Jelaskan apa kemajuan usaha anda. Minimal satu bidang pendampingan. Boleh lebih dari satu</p>
                                        <div class="form-group">
                                            <h2 class="title">Wajib</h2><small>Wajib dilengkapi</small>
                                        </div>
                                        <div class="form-group">
                                            <label>Pilih Bidang Pendampingan</label>
                                            <select class="form-control" name="bidang_pendampingan[]" data-plugin="select2" required="required">
                                                <option value="">Bidang Pendampingan *</option>
                                                @foreach($bidang_pendampingan as $row)
                                                    <option value="{{$row->id}}">{{$row->nama}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan *</label>
                                            <textarea name="keterangan_pendampingan[]" class="form-control" placeholder="Jelaskan Kemajuan Usaha Anda" required="required"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="title">
                                                <h2>Opsional</h2><small>Tidak wajib dilengkapi</small>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tambah Bidang Pendampingan</label>
                                            <select class="form-control" id="bidang" data-plugin="select2">
                                                <option value="">Bidang Pendampingan</option>
                                                @foreach($bidang_pendampingan as $row)
                                                    <option value="{{$row->id}}">{{$row->nama}}</option>
                                                @endforeach
                                            </select>
                                            <button type="button" class="btn btn-primary btn-xs btn-bidang"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
                                        </div>
                                        <div id="inputan-bidang"></div>
                                    </div>
                                </div>

                                <div class="wizard-pane" id="exampleBilling2" role="tabpanel">
                                    <div id="exampleBillingForm2">
                                        <p>Jelaskan apa kemajuan usaha anda. Minimal satu bidang keahlian. Boleh lebih dari satu</p>
                                        <div class="form-group">
                                            <h2 class="title">Wajib</h2><small>Wajib dilengkapi</small>
                                        </div>
                                        <div class="form-group">
                                            <label>Pilih Bidang Keahlian</label>
                                            <select class="form-control" name="bidang_keahlian[]" data-plugin="select2" required="required">
                                                <option value="">Bidang Keahlian *</option>
                                                @foreach($bidang_keahlian as $row)
                                                    <option value="{{$row->id}}">{{$row->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan *</label>
                                            <textarea name="keterangan_keahlian[]" class="form-control" placeholder="Jelaskan Kemajuan Usaha Anda" required="required"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="title">
                                                <h2>Opsional</h2><small>Tidak wajib dilengkapi</small>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tambah Bidang Keahlian</label>
                                            <select class="form-control" id="bidang-keahlian" data-plugin="select2">
                                                <option value="">Bidang Keahlian</option>
                                                @foreach($bidang_keahlian as $row)
                                                    <option value="{{$row->id}}">{{$row->nama}}</option>
                                                @endforeach
                                            </select>
                                            <button type="button" class="btn btn-primary btn-xs btn-bidang-keahlian"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
                                        </div>
                                        <div id="inputan-bidang-keahlian"></div>
                                    </div>
                                </div>

                                <div class="wizard-pane" id="exampleGetting" role="tabpanel">
                                    <div id="documentForm">
                                        <div class="form-group">
                                            <label>Upload Document</label>
                                            <input id="input-ficons-3" name="images[]" multiple type="file" class="file-loading" required="required">
                                            <span class="help-block text-info">
                                                <strong>Silahkan Klik UPLOAD Untuk menggungga file.</strong>
                                            </span>
                                            <div id="tempFile"></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan Tambahan</label>
                                            <textarea name="keterangan_pengajuan" class="form-control" placeholder="Keterangan tambahan..." required="required"></textarea>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <!-- End Wizard Content -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="token" value="{!! csrf_token() !!}">
@endsection

@section('js')
    {{Html::script(asset('remark/assets/vendor/formvalidation/formValidation.min.js'))}}
    {{Html::script(asset('remark/assets/vendor/formvalidation/framework/bootstrap.min.js'))}}

    {{Html::script(asset('remark/assets/vendor/bootstrap-datepicker/bootstrap-datepicker.js'))}}
    {{Html::script(asset('remark/assets/js/components/bootstrap-datepicker.js'))}}

    {{Html::script(asset('remark/assets/vendor/jquery-wizard/jquery-wizard.js'))}}
    {{Html::script(asset('remark/assets/js/components/jquery-wizard.js'))}}

    <script>
        var _token = $('#token').val();
        $("#input-ficons-3").fileinput({
            uploadUrl: "{{route('pengajuan.upload')}}",
            uploadExtraData : {_token:_token},
            previewFileIcon: '<i class="fa fa-file"></i>',
            allowedPreviewTypes: ['image', 'text'], // allow only preview of image & text files
            allowedFileExtensions: ["docx", "pdf"],
            previewFileIconSettings: {
                'docx': '<i class="fa fa-file-word-o text-primary"></i>',
                'doc': '<i class="fa fa-file-word-o text-primary"></i>',
                'xlsx': '<i class="fa fa-file-excel-o text-success"></i>',
                'pptx': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
                'pdf': '<i class="fa fa-file-pdf-o text-danger"></i>',
                'zip': '<i class="fa fa-file-archive-o text-muted"></i>',
            }
        }).on('fileuploaded', function(event, data, previewId, index) {
            var form = data.form, files = data.files, extra = data.extra,
                response = data.response, reader = data.reader;
            console.log(response);
            $('#tempFile').append('<input type="hidden" name="path_image[]" value="'+response+'">') });
    </script>

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

            $("#exampleBillingForm1").formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    bidang_pendampingan: {
                        validators: {
                            notEmpty: {
                                message: 'Harus Terisi'
                            }
                        }
                    },
                    keterangan_pendampingan: {
                        validators: {
                            notEmpty: {
                                message: 'Harus Terisi'
                            }
                        }
                    }
                }
            });

            $("#exampleBillingForm2").formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    bidang_keahlian: {
                        validators: {
                            notEmpty: {
                                message: 'Harus Terisi'
                            }
                        }
                    },
                    keterangan_keahlian: {
                        validators: {
                            notEmpty: {
                                message: 'Harus Terisi'
                            }
                        }
                    }
                }
            });



            $("#documentForm").formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    keterangan_pengajuan: {
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
            wizard.get("#exampleAccount").setValidator(function()
            {
                var fv = $("#exampleAccountForm").data('formValidation');
                fv.validate();

                if (!fv.isValid()) {
                    return false;
                }

                return true;
            });

            wizard.get("#exampleBilling1").setValidator(function()
            {
                var fv = $("#exampleBillingForm1").data('formValidation');
                fv.validate();

                if (!fv.isValid())
                {
                    return false;
                }

                return true;
            });

            wizard.get("#exampleBilling2").setValidator(function()
            {
                var fv = $("#exampleBillingForm2").data('formValidation');
                fv.validate();

                if (!fv.isValid())
                {
                    return false;
                }

                return true;
            });

            wizard.get("#exampleGetting").setValidator(function()
            {
                var fv = $("#documentForm").data('formValidation');
                fv.validate();

                if (!fv.isValid()) {
                    return false;
                }
                $('#form-pengajuan').submit();
                return true;
            });
        })();
        // Example Validataion Standard Mode
        // ---------------------------------
        (function() {
            $('.btn-bidang').click(function () {
                var label = $('#bidang option:selected').text();
                var id = $('#bidang').val();
                var html ='<div class="form-group"><input type="hidden" name="bidang_pendampingan[]" value="'+id+'"><label class="control-label">'+label+'</label><textarea class="form-control" name="keterangan_pendampingan[]" required="required"></textarea></div>';
                $('#inputan-bidang').append(html);
            });

            $('.btn-bidang-keahlian').click(function () {
                var label = $('#bidang-keahlian option:selected').text();
                var id = $('#bidang-keahlian').val();
                var html ='<div class="form-group"><input type="hidden" name="bidang_keahlian[]" value="'+id+'"><label class="control-label">'+label+'</label><textarea class="form-control" name="keterangan_keahlian[]" required="required"></textarea></div>';
                $('#inputan-bidang-keahlian').append(html);
            });
        })();
    </script>
@endsection