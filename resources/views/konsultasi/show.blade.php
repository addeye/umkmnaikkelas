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
    <div class="page-header">
        <h1 class="page-title">
            Layanan
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/')}}">
                    Home
                </a>
            </li>
            <li>
                @if (Auth::user()->role_id == ROLE_PENDAMPING)
                <a href="{{route('konsultasi-pendamping.index')}}">
                    Order Konsultasi
                </a>
                    @else
                    <a href="{{route('konsultasi.index')}}">
                    Order Konsultasi
                </a>
                @endif

            </li>
            <li class="active">
                {{$data->subject}}
            </li>
        </ol>
    </div>
    <div class="page-content animsition">
        <div class="row">
            <div class="col-md-8">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-action">
                            <span class="label label-danger">{{$data->status=='Tutup'?'Ditutup Oleh : '.$data->closed_by:''}}</span>
                        </div>
                        <h3 class="panel-title">
                        #{{$data->code}} - {{$data->subject}}
                        <span class="label label-warning">
                            Status : {{$data->status}} <br>
                        </span>
                    </h3>

                    @if (Auth::user()->role_id==ROLE_PENDAMPING)
                        <span class="padding-30"><a href="{{ url('profil-umkm/'.$data->umkm_id) }}"><i class="icon wb-eye"></i> Lihat Profil UMKM : {{$data->umkm->nama_usaha}}</a></span>
                    @endif
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            @if ($data->status == 'Proses')
                                <div class="col-md-12">
                        <a href="#tambah_komentar"><i class="icon fa-plus"></i> Tambah Komentar</a>
                        <a onclick="event.preventDefault(); ConfirmDelete({{$data->id}});" href="javascript:void(0)"><i class="icon fa-close" data-toggle="tooltip" data-original-title="Tutp konsultasi"></i> Tutup Konsultasi</a>
                        @if (Auth::user()->role_id == ROLE_PENDAMPING)

                        <form id="delete-form-{{$data->id}}" action="{{route('konsultasi-pendamping.update',['id'=>$data->id])}}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            <input type="hidden" name="role_name" value="Pendamping">
                            <input type="hidden" name="_method" value="PUT">
                        </form>

                        @else

                        <form id="delete-form-{{$data->id}}" action="{{route('konsultasi.update',['id'=>$data->id])}}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            <input type="hidden" name="role_name" value="Umkm">
                            <input type="hidden" name="_method" value="PUT">
                        </form>

                        @endif

                        </div>
                            @endif

                            <div class="col-md-12">
                                <ul class="list-group list-group-dividered list-group-full">
                                        @foreach($data->order_chat as $row)
                                        <li class="list-group-item">
                                            <div class="media comment">
                                                <div class="media-left">
                                                    <a class="avatar avatar-online" href="javascript:void(0)">
                                                        <img alt="..." src="{{asset('uploads/user/images/'.$row->user->image)}}">
                                                            <i>
                                                            </i>
                                                        </img>
                                                    </a>
                                                </div>
                                                <div class="media-body comment-body">
                                                    <a class="comment-author">
                                                        {{$row->user->name}}
                                                    </a>
                                                    <div class="comment-meta">
                                                        <span class="date">
                                                            {{$row->textdate}}
                                                        </span>
                                                    </div>
                                                    <div class="comment-content">
                                                        <p>
                                                            {{$row->chat}}
                                                        </p>
                                                        @if (count($row->order_chat_file) > 0)
                                                            <div class="profile-brief">
                                                                @foreach ($row->order_chat_file as $row)
                                                                    @if ($row->file_type == 'image')
                                                                        <a href="{{ asset($row->path.$row->file_name) }}">
                                                                            <img class="img-responsive profile-uploaded" src="{{ asset($row->path.'thumbs/'.$row->file_name) }}">
                                                                        </a>
                                                                    @else
                                                                    <p><a href="{{ asset($row->path.$row->file_name) }}"><i class="icon fa-file"></i> {{$row->file_name}}</a></p>
                                                                    @endif

                                                                @endforeach
                                                          </div>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @if ($data->status == 'Proses')

                                        @if (Auth::user()->role_id == ROLE_UMKM)
                                            <form action="{{route('konsultasi.store.chat')}}" method="post" enctype="multipart/form-data">
                                        @else
                                            <form action="{{route('konsultasi-pendamping.store')}}" method="post" enctype="multipart/form-data">
                                        @endif
                                        {{csrf_field()}}
                                        <input name="order_konsultasi_id" type="hidden" value="{{$data->id}}">
                                            <div class="form-group row {{ $errors->has('chat') ? ' has-error' : '' }}">
                                                <div class="col-md-12">
                                                    <textarea class="form-control" name="chat" placeholder="Tulis komentar anda.." rows="3"></textarea>
                                                </div>
                                                <span class="help-block">
                                            <strong>{{ $errors->first('chat') }}</strong>
                                        </span>
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

                                <div class="form-group" id="tambah_komentar">
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
                                            <div class="form-group row">
                                                <div class="col-md-12 text-right">
                                                    <button type="submit" class="btn btn-primary">
                                                        Kirim
                                                    </button>
                                                </div>
                                            </div>
                                    </form>
                                    @endif

                                    @if (Auth::user()->role_id == ROLE_PENDAMPING && $data->status == 'Menunggu')
                                    <a href="{{ route('konsultasi.terima',['id'=>$data->id]) }}" onclick="return confirm('Apakah anda yakin?')" class="btn btn-success"><i class="icon fa-check"></i> Terima</a>
                                    <a href="{{ route('konsultasi.tolak',['id'=>$data->id]) }}" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger"><i class="icon fa-ban"></i> Tolak</a>
                                    @endif

                            </div>
                        </div>
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

    <script>

    function ConfirmDelete(id)
    {
        var id = id;
  swal({
  title: "Apakah Yakin?",
  text: "Konsultasi akan benar-benar Ditutup!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Iya, Tutup!",
  cancelButtonText: "Tidak, Batalkan!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    // swal("Deleted!", "Your imaginary file has been deleted.", "success");
      document.getElementById('delete-form-'+id).submit();
  } else {
    swal("Dibatalkan", "Konsultasi tidak jadi ditutup", "error");
  }
});
  }

</script>
@endsection
