@extends('layouts.apps.master')

@section('content')
<!-- Page -->
<div class="page animsition">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <!-- Panel Standard Mode -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="con wb-plus">
                            </i>
                            Event File
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('event.dofile',['id'=>$data->id])}}" class="form-horizontal" enctype="multipart/form-data" method="post">
                            {{ csrf_field()}}
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
                                <button class="btn btn-primary" id="validateButton2" type="submit">
                                    Simpan
                                </button>
                                <a class="btn btn-warning" href="{{route('event.show',['id'=>$data->id])}}">
                                    Nanti Saja
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Panel Standard Mode -->
            </div>
        </div>
    </div>
</div>
<!-- End Page -->
@endsection

@section('css')
{!! Html::style(asset('jquery-filer/css/jquery.filer.css')) !!}
    {!! Html::style(asset('jquery-filer/css/themes/jquery.filer-dragdropbox-theme.css')) !!}
@endsection

@section('js')

{!! HTML::script(asset('jquery-filer/js/jquery.filer.min.js')) !!}
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
</script>
@endsection
