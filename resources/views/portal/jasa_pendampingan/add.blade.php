@extends('layouts.portal.master')

@section('css')
    <!-- Plugin -->
    {{Html::style('remark/assets/vendor/formvalidation/formValidation.css')}}
    {{Html::style('remark/assets/vendor/summernote/summernote.css')}}
    {{Html::style('remark/assets/css/../fonts/font-awesome/font-awesome.css')}}

    {!! HTML::style(asset('jquery-filer/css/jquery.filer.css')) !!}
    {!! HTML::style(asset('jquery-filer/css/themes/jquery.filer-dragdropbox-theme.css')) !!}
    <!-- Plugin -->
    <style type="text/css">
    .form-group{
        margin-left: 0!important;
        margin-right: 0!important;
    }

    .form-group.row-fluid.note-group-select-from-files {
    display: none;
}

</style>
@endsection

@section('content')
    <!-- Page -->
    <div class="container-fluid">
        <div class="page-header animsition">
            <h1 class="page-title">Pendampingan</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('/jasa-pendampingan')}}">Jasa Pendampingan</a></li>
                <li class="active">Tambah Data</li>
            </ol>
        </div>
        <div class="page-content animsition">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Jasa Pendampingan
                            </div>
                        </div>
                        <div class="panel-body">
                            <form method="post" class="form" id="exampleStandardForm" autocomplete="off" action="{{route('jasa-pendampingan.store')}}" enctype="multipart/form-data">
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
                                                <option value="{{$row->id}}" {{in_array($row->id,old('bidang_pendampingan')?old('bidang_pendampingan'):[])?'selected':''}} >{{$row->nama}}</option>
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
                                                <option value="{{$row->id}}" {{in_array($row->id,old('bidang_keahlian')?old('bidang_keahlian'):[])?'selected':''}} >{{$row->nama}}</option>
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
                                        <textarea id="deskripsi" data-fv-stringlength="true" data-fv-stringlength-max="300" data-fv-stringlength-message="Isi kurang dari 300 karakter"
                            placeholder="maksimal = 300 Karakter" class="form-control" name="deskripsi" placeholder="Deskripsi jasa"></textarea>
                                        <span id="count" class="help-block">
                                            <strong>{{ $errors->first('deskripsi') }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('keterangan') ? ' has-error' : '' }}">
                                <label class="col-sm-3 control-label">Keterangan *</label>
                                      <div class="col-sm-9">
                                        <textarea data-plugin="summernote" data-plugin-options='{"toolbar":[["style", ["bold", "italic", "underline", "clear"]],["color", ["color"]],["para", ["ul", "ol", "paragraph"]]]}' name="keterangan" class="form-control" placeholder="Keterangan detailnya.." rows="5">{{old('keterangan')}}</textarea>
                                        <span class="help-block">
                                          <strong>{{ $errors->first('keterangan') }}</strong>
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

                                <div class="form-group">
                                    {!! Form::label('images', 'Gambar Pendukung', ['class'=>'control-label col-sm-3']) !!}
                                    <div class="col-md-9">
                                        <div class="input">
                                    {!! Form::file('images[]', array('multiple'=>true, 'class'=>'btn', 'id'=>'filer_one', 'accept'=>'image/*')) !!}
                                    <div class="error-input">
                                        @foreach($errors->get('images') as $message)
                                        {{ $message }}
                                        @endforeach
                                    </div>
                                </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('images', 'File Pendukung', ['class'=>'control-label col-sm-3']) !!}
                                    <div class="col-md-9">
                                        <div class="input">
                                    {!! Form::file('docs[]', array('multiple'=>true, 'class'=>'btn', 'id'=>'filer_two')) !!}
                                    <div class="error-input">
                                        @foreach($errors->get('images') as $message)
                                        {{ $message }}
                                        @endforeach
                                    </div>
                                </div>
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

    {{Html::script(asset('remark/assets/vendor/summernote/summernote.min.js'))}}
    {{Html::script(asset('remark/assets/js/components/summernote.js'))}}

    {!! HTML::script(asset('jquery-filer/js/jquery.filer.min.js')) !!}
    {{-- {!! HTML::script(asset('js/jqueryajax.js')) !!} --}}

    <script type="text/javascript">
        setup_file_uploader('#filer_one', ['jpg', 'jpeg', 'png', 'gif'], "Only Images are allowed to be uploaded.", "Choose Images to upload.", "Choose Image");

        setup_file_uploader('#filer_two', ['docx', 'doc', 'pdf','xls'], "Only Documents are allowed to be uploaded.", "Choose Documents to Upload.", "Choose Docs");

        function setup_file_uploader(ids, file_ext,filetype_error,caption_feedback,caption_btn) {
            $(ids).filer({
                limit: 8,
                maxSize: 50,
                extensions: file_ext,
                showThumbs: true,
                templates: {
                    box: '<ul class="jFiler-items-list jFiler-items-grid"></ul>',
                    item: '<li class="jFiler-item">\
                    <div class="jFiler-item-container">\
                        <div class="jFiler-item-inner">\
                            <div class="jFiler-item-thumb">\
                                <div class="jFiler-item-status"></div>\
                                <div class="jFiler-item-thumb-overlay">\
                                    <div class="jFiler-item-info">\
                                        <div style="display:table-cell;vertical-align: middle;">\
                                            <span class="jFiler-item-title"><b title="@{{fi-name}}">@{{fi-name}}</b></span>\
                                            <span class="jFiler-item-others">@{{fi-size2}}</span>\
                                        </div>\
                                    </div>\
                                </div>\
                                @{{fi-image}}\
                            </div>\
                            <div class="jFiler-item-assets jFiler-row">\
                                <ul class="list-inline pull-left">\
                                    <li>@{{fi-progressBar}}</li>\
                                </ul>\
                                <ul class="list-inline pull-right">\
                                    <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                </ul>\
                            </div>\
                        </div>\
                    </div>\
                </li>',
                itemAppend: '<li class="jFiler-item">\
                <div class="jFiler-item-container">\
                    <div class="jFiler-item-inner">\
                        <div class="jFiler-item-thumb">\
                            <div class="jFiler-item-status"></div>\
                            <div class="jFiler-item-thumb-overlay">\
                                <div class="jFiler-item-info">\
                                    <div style="display:table-cell;vertical-align: middle;">\
                                        <span class="jFiler-item-title"><b title="@{{fi-name}}">@{{fi-name}}</b></span>\
                                        <span class="jFiler-item-others">@{{fi-size2}}</span>\
                                    </div>\
                                </div>\
                            </div>\
                            @{{fi-image}}\
                        </div>\
                        <div class="jFiler-item-assets jFiler-row">\
                            <ul class="list-inline pull-left">\
                                <li><span class="jFiler-item-others">@{{fi-icon}}</span></li>\
                            </ul>\
                            <ul class="list-inline pull-right">\
                                <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                            </ul>\
                        </div>\
                    </div>\
                </div>\
            </li>',
            progressBar: '<div class="bar"></div>',
            itemAppendToEnd: false,
            canvasImage: true,
            removeConfirmation: true,
            _selectors: {
                list: '.jFiler-items-list',
                item: '.jFiler-item',
                progressBar: '.bar',
                remove: '.jFiler-item-trash-action'
            }
        },
        dragDrop: {
            dragEnter: null,
            dragLeave: null,
            drop: null,
            dragContainer: null,
        },
        addMore: true,
        allowDuplicates: false,
        files: null,
        clipBoardPaste: true,
        excludeName: null,
        beforeRender: null,
        afterRender: null,
        beforeShow: null,
        beforeSelect: null,
        onSelect: null,
        afterShow: null,
        onEmpty: null,
        options: null,
        dialogs: {
            alert: function(text) {
                return alert(text);
            },
            confirm: function (text, callback) {
                confirm(text) ? callback() : null;
            }
        },
        captions: {
            button: caption_btn,
            feedback: caption_feedback,
            feedback2: "files were chosen",
            drop: "Drop file here to Upload",
            removeConfirmation: "Are you sure you want to remove this file?",
            errors: {
                filesLimit: "Only @{{fi-limit}} files are allowed to be uploaded.",
                filesType: filetype_error,
                filesSize: "@{{fi-name}} is too large! Please upload file up to @{{fi-maxSize}} MB.",
                filesSizeAll: "Files you've choosed are too large! Please upload files up to @{{fi-maxSize}} MB."
            }
        }
    });
}

        $("textarea[maxlength]").on("propertychange input", function() {
            if (this.value.length > this.maxlength) {
                this.value = this.value.substring(0, this.maxlength);
            }
        });

        document.getElementById('deskripsi').onkeyup = function () {

            document.getElementById('count').innerHTML = "Kurang : " + (300 - this.value.length) + " Karakter";
      };
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