<?php
/**
 * Created by PhpStorm.
 * User: deye
 * Date: 6/16/17
 * Time: 4:51 PM
 */
?>
@extends('layouts.portal.master')
@section('content')
    <!-- Page -->
    <div class="container-fluid">

        <div class="page-header">
            <h1 class="page-title">Event</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                {{-- <li><a href="{{route('event.all')}}">Event</a></li> --}}
                <li class="active">{{$data->title}}</li>
            </ol>
        </div>

        <div class="page-content animsition">
            <div class="row">
                <div class="col-md-9">
                    <div class="panel">
                        <div class="panel-body">
                <div class="nav-tabs-horizontal">
                    <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
                        <li class="active" role="presentation">
                            <a aria-controls="exampleTabsLineOne" data-toggle="tab" href="#exampleTabsLineOne" role="tab">
                                <i aria-hidden="true" class="icon wb-info-circle">
                                </i>
                                Event
                            </a>
                        </li>
                        <li role="presentation">
                            <a aria-controls="exampleTabsLineTwo" data-toggle="tab" href="#exampleTabsLineTwo" role="tab">
                                <i aria-hidden="true" class="icon wb-file">
                                </i>
                                File Pendukung
                            </a>
                        </li>
                        <li role="presentation">
                            <a aria-controls="exampleTabsLineThree" data-toggle="tab" href="#exampleTabsLineThree" role="tab">
                                <i aria-hidden="true" class="icon wb-users">
                                </i>
                                Peserta
                                <span class="badge badge-danger">{{count($data->event_follower)}}</span>
                            </a>
                        </li>
                        <li class="dropdown" role="presentation">
                            <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="caret">
                                </span>
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="active" role="presentation">
                                    <a aria-controls="exampleTabsLineOne" data-toggle="tab" href="#exampleTabsLineOne" role="tab">
                                        Event
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a aria-controls="exampleTabsLineTwo" data-toggle="tab" href="#exampleTabsLineTwo" role="tab">
                                        File Pendukung
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a aria-controls="exampleTabsLineThree" data-toggle="tab" href="#exampleTabsLineThree" role="tab">
                                        Peserta
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="tab-content padding-top-20">
                        <div class="tab-pane active" id="exampleTabsLineOne" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12 padding-5 text-right">
                                    <h4>
                                        Waktu : {{$data->start_time}} - {{$data->end_time}}
                                    </h4>
                                </div>
                                <div class="col-md-8">
                                    <h4>
                                        {{$data->deskripsi}}
                                    </h4>
                                    <img class="img-responsive" src="{{asset('uploads/event/'.$data->image)}}">
                                        <hr>
                                            {!! $data->content !!}
                                        </hr>
                                    </img>
                                </div>
                                <div class="col-md-4">
                                    <p>
                                        <strong>
                                            Tanggal :
                                        </strong>
                                        {{$data->start_date}} - {{$data->end_date}}
                                    </p>
                                    <p>
                                        <strong>
                                            Waktu :
                                        </strong>
                                        {{$data->start_time}} - {{$data->end_time}}
                                    </p>
                                    <p>
                                        <strong>
                                            Lokasi :
                                        </strong>
                                        {{$data->city}}
                                    </p>
                                    <p>
                                        <strong>
                                            Alamat :
                                        </strong>
                                        {{$data->alamat}}
                                    </p>
                                    <h4>
                                        Info
                                    </h4>
                                    <label>
                                        Status : {{$data->status}}
                                    </label>
                                    <p>
                                        Quota : {{$data->quota}}
                                    </p>
                                    <p>
                                        Kepada : {{$data->role_level}}
                                    </p>
                                    <h4>
                                        Deskripsi
                                    </h4>
                                    <p>
                                        {{$data->description}}
                                    </p>
                                    @if (count($check_follow) == 0)
                                        <p>
                                        <a class="btn btn-success" onclick="event.preventDefault(); ConfirmDelete({{$data->id}});" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Ikut Event"><i class="icon wb-bookmark" aria-hidden="true"></i> Ikut Event</a>

                                        @if (Auth::user()->role_id==ROLE_PENDAMPING)
                                            <form id="delete-form-{{$data->id}}" action="{{route('event.follower',['id'=>$data->id])}}" method="POST" style="display: none;">
                                                @else
                                            <form id="delete-form-{{$data->id}}" action="{{route('event.follower_umkm',['id'=>$data->id])}}" method="POST" style="display: none;">
                                        @endif

                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        </form>
                                    </p>
                                    @else
                                    <p class="btn btn-danger disabled"> <i class="icon wb-bookmark" aria-hidden="true"></i> Telah diikuti</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 row">
                                <h4><i class="icon wb-chat-group"></i> Diskusi</h4>
                                @if (count($check_follow) > 0 AND $check_follow->validation=='Yes')
                                    <ul class="list-group list-group-dividered list-group-full">
                                    @foreach($data->event_discuss as $row)
                                    <li class="list-group-item">
                                        <div class="media comment">
                                            <div class="media-left">
                                                <a class="avatar avatar-online" href="javascript:void(0)">
                                                    <img alt="..." src="{{asset('uploads/user/images/'.$row->event_follower->user->image)}}">
                                                        <i>
                                                        </i>
                                                    </img>
                                                </a>
                                            </div>
                                            <div class="media-body comment-body">
                                                <a class="comment-author">
                                                    {{$row->event_follower->user->name}}
                                                </a>
                                                <div class="comment-meta">
                                                    <span class="date">
                                                        {{$row->textdate}}
                                                    </span>
                                                </div>
                                                <div class="comment-content">
                                                    <p>
                                                        {{$row->comment}}
                                                    </p>
                                                    @if (count($row->event_discuss_file) > 0)
                                                            <div class="profile-brief">
                                                                @foreach ($row->event_discuss_file as $row)
                                                                    @if ($row->type == 'image')
                                                                        <a href="{{ asset($row->path.$row->file_name) }}">
                                                                            <img class="img-responsive profile-uploaded" src="{{ asset($row->path.'thumbs/'.$row->file_name) }}">
                                                                        </a>
                                                                    @else
                                                                    <p class="padding-top-10"><a href="{{ asset($row->path.$row->file_name) }}">
                                                                        <i class="icon wb-file"></i> {{$row->file_name}}</a></p>
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
                                @if (Auth::user()->role_id==ROLE_PENDAMPING)
                                    <form action="{{ route('event.akun.diskusi') }}" method="post" enctype="multipart/form-data">
                                        @else
                                    <form action="{{ route('event.akun.diskusi_umkm') }}" method="post" enctype="multipart/form-data">
                                @endif

                                    {{ csrf_field() }}
                                    <input type="hidden" name="event_follower_id" value="{{$check_follow->id}}">
                                    <input type="hidden" name="event_id" value="{{$data->id}}">
                                    <div class="form-group row {{ $errors->has('comment') ? ' has-error' : '' }}">
                                                <div class="col-md-12">
                                                    <textarea class="form-control" name="comment" placeholder="Tulis komentar anda.." rows="3">{{old('comment')}}</textarea>
                                                </div>
                                                <span class="help-block">
                                            <strong>{{ $errors->first('comment') }}</strong>
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
                                    <div class="form-group row">
                                                <div class="col-md-12 text-right">
                                                    <button type="submit" class="btn btn-primary">
                                                        Kirim
                                                    </button>
                                                </div>
                                            </div>
                                    </form>
                                @else
                                <h3><i class="icon fa-ban"></i> Belum ada validasi</h3>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane" id="exampleTabsLineTwo" role="tabpanel">
                            @if (count($check_follow) > 0 AND $check_follow->validation=='Yes')
                            <ul>
                                @foreach ($data->event_file as $row)
                                <li>
                                    <a href="{{ asset($row->path.$row->file_name) }}">
                                        {{$row->file_name}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                                @else
                                <h3><i class="icon fa-ban"></i> Belum ada validasi</h3>
                            @endif

                        </div>
                        <div class="tab-pane" id="exampleTabsLineThree" role="tabpanel">
                            <div class="tables-responsive">
                                <table class="table">
                                    <tr>
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            No Telp
                                        </th>
                                        <th>
                                            Validasi
                                        </th>
                                    </tr>
                                    @foreach ($data->event_follower as $row)
                                    <tr>
                                        <td>
                                            {{$row->user->name}}
                                        </td>
                                        <td>
                                            {{$row->user->email}}
                                        </td>
                                        <td>
                                            {{$row->user->telp}}
                                        </td>
                                        <td>
                                            {{$row->validation}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        </div>
                    </div>
            <div class="col-md-3">
                @include('event.sub_lain',['recent'=>$recent])
            </div>
        </div>

            </div>
        </div>
    </div>
@endsection

@section('css')
{!! Html::style(asset('jquery-filer/css/jquery.filer.css')) !!}
    {!! Html::style(asset('jquery-filer/css/themes/jquery.filer-dragdropbox-theme.css')) !!}
@endsection


@section('js')
  {{Html::script(asset('remark/assets/js/plugins/responsive-tabs.js'))}}
  {{Html::script(asset('remark/assets/js/plugins/closeable-tabs.js'))}}
  {{Html::script(asset('remark/assets/js/components/tabs.js'))}}

  {!! HTML::script(asset('jquery-filer/js/jquery.filer.min.js')) !!}

    <script type="text/javascript">
    setup_file_uploader('#filer_one', ['jpg', 'jpeg', 'png', 'gif'], "Only Images are allowed to be uploaded.", "Choose Images to upload.", "Choose Image",1);

        setup_file_uploader('#filer_two', ['docx', 'doc', 'pdf','xls'], "Only Documents are allowed to be uploaded.", "Choose Documents to Upload.", "Choose Docs",3);

        function setup_file_uploader(ids, file_ext,filetype_error,caption_feedback,caption_btn,size) {
            $(ids).filer({
                limit: 8,
                maxSize: size,
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


    <script>

  function ConfirmDelete(id)
  {
      var id = id;
  swal({
  title: "Apakah Yakin?",
  text: "Anda akan mengikuti Event!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Iya, Event!",
  cancelButtonText: "Tidak, Batalkan!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    // swal("Deleted!", "Your imaginary file has been deleted.", "success");
    document.getElementById('delete-form-'+id).submit();
  } else {
    swal("Dibatalkan", "Event tidak jadi diikuti", "error");
  }
});
  }

</script>

@endsection
