@extends('layouts.apps.master')

@section('content')
<!-- Page -->
<div class="page animsition">
    <div class="page-content">
        <!-- Panel Standard Mode -->
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="panel-action">
                    <ul class="panel-actions">
                        <li>
                            <a class="btn btn-sm btn-icon btn-flat btn-default" data-original-title="Edit" data-toggle="tooltip" href="{{route('event.edit',['id'=>$data->id])}}">
                                <span class="icon wb-edit">
                                </span>
                                Edit
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-sm btn-icon btn-flat btn-default" data-original-title="Delete" data-toggle="tooltip" href="javascript:void(0)" onclick="event.preventDefault(); ConfirmDelete({{$data->id}});" role="menuitem">
                                <i aria-hidden="true" class="icon wb-close">
                                </i>
                                Hapus
                            </a>
                            <form action="{{route('event.destroy',['id'=>$data->id])}}" id="delete-form-{{$data->id}}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="DELETE">
                                </input>
                            </form>
                        </li>
                    </ul>
                </div>
                <h3 class="panel-title">
                    {{$data->title}}
                </h3>
            </div>
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
                                        Status Open : <input type="checkbox" id="inputBasicOn" name="inputiCheckBasicCheckboxes" data-plugin="switchery"
                                {{$data->status=='Open'?'checked':''}} />
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
                                </div>
                                <div class="col-md-12 padding-top-10">
                                    <h4>Diskusi</h4>
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
                                @if ($event_follower)
                                    <form action="{{ route('event.diskusi') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="event_follower_id" value="{{$event_follower->id}}">
                                    <input type="hidden" name="event_id" value="{{$data->id}}">
                                    <div class="form-group row {{ $errors->has('chat') ? ' has-error' : '' }}">
                                                <div class="col-md-12">
                                                    <textarea class="form-control" name="comment" placeholder="Tulis komentar anda.." rows="3"></textarea>
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
                                @endif
                            </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="exampleTabsLineTwo" role="tabpanel">
                            <div class="text-right">
                                <a href="{{ route('event.file',['id'=>$data->id]) }}">
                                    <i class="icon wb-plus">
                                    </i>
                                    Tambah File
                                </a>
                            </div>
                            <ul>
                                @foreach ($data->event_file as $row)
                                <li>
                                    <a href="{{ asset($row->path.$row->file_name) }}">
                                        {{$row->file_name}}
                                    </a>
                                    &nbsp;

                                    <a class="red-800" onclick="event.preventDefault(); ConfirmDeleteFile({{$row->id}});" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Hapus"><i class="icon wb-trash" aria-hidden="true"></i></a>

                                            <form id="delete-form-file-{{$row->id}}" action="{{route('event.delete.file',['id'=>$row->id])}}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                              </form>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-pane" id="exampleTabsLineThree" role="tabpanel">
                            <div class="padding-5">
                                <a href="{{ route('event.invite',['id'=>$data->id]) }}" class="btn btn-primary"><i class="icon wb-plus"></i> Invite Akun</a>

                                <a onclick="event.preventDefault(); ConfirmAction('Terima');" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Terima Semua" class="btn btn-success"><i class="icon wb-check" aria-hidden="true"></i> Terima Semua</a>

                                <a onclick="event.preventDefault(); ConfirmAction('Tolak');" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Tolak Semua" class="btn btn-danger"><i class="icon wb-close" aria-hidden="true"></i> Tolak Semua</a>

                                <form id="invite-action" action="{{route('event.follow.validasi.all')}}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="event_id" value="{{$data->id}}">
                                                <input type="hidden" id="status" name="status">
                                              </form>
                            </div>
                            <div class="tables-responsive">
                                <table class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
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
                                            Kab/Kota
                                        </th>
                                        <th>
                                            Jenis Akun
                                        </th>
                                        <th>
                                            Validation
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;?>
                                    @foreach ($data->event_follower as $row)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>
                                            {{$row->user->name}}
                                        </td>
                                        <td>
                                            {{$row->user->email}}
                                        </td>
                                        <td>
                                            {{$row->user->telp}}
                                        </td>
                                        @if ($row->user->role_id==ROLE_UMKM)
                                            <td>{{$row->user->umkm->kota}}</td>
                                            @elseif($row->user->role_id==ROLE_PENDAMPING)
                                            <td>{{$row->user->pendamping?$row->user->pendamping->kota:''}}</td>
                                            @else
                                            <td>-</td>
                                        @endif
                                        <td>{{$row->user->role->nama}}</td>
                                        <td>
                                            @if ($row->validation=='No')
                                                <a onclick="event.preventDefault(); ConfirmValidasi({{$row->id}},'Yes');" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Terima"><i class="icon wb-check" aria-hidden="true"></i> Terima</a>

                                            <a onclick="event.preventDefault(); ConfirmValidasi({{$row->id}},'Out');" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Tolak"><i class="icon wb-close" aria-hidden="true"></i> Tolak</a>

                                              <form id="validasi-form-{{$row->id}}" action="{{route('event.follow.validasi',['id'=>$row->id])}}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="PUT">
                                                <input type="hidden" name="validasi">
                                              </form>
                                              @else
                                              {{$row->validation}}

                                               <a class="red-800" onclick="event.preventDefault(); ConfirmDeleteFollower({{$row->id}});" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Hapus"><i class="icon wb-trash" aria-hidden="true"></i></a>

                                            <form id="delete-form-follower-{{$row->id}}" action="{{route('event.delete.follower',['id'=>$row->id])}}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                              </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Panel Standard Mode -->
    </div>
</div>
<!-- End Page -->
<input type="hidden" id="url" value="{{route('event.validasi',['id'=>$data->id])}}">
  {{ csrf_field() }}
@endsection

@section('css')
{!! Html::style(asset('jquery-filer/css/jquery.filer.css')) !!}
    {!! Html::style(asset('jquery-filer/css/themes/jquery.filer-dragdropbox-theme.css')) !!}
    {{Html::style('remark/assets/vendor/datatables-bootstrap/dataTables.bootstrap.css')}}
  {{Html::style('remark/assets/vendor/datatables-fixedheader/dataTables.fixedHeader.css')}}
  {{Html::style('remark/assets/vendor/datatables-responsive/dataTables.responsive.css')}}

  <link href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" rel="stylesheet">
@endsection

@section('js')

    {{Html::script(asset('remark/assets/vendor/datatables/jquery.dataTables.min.js'))}}
  {{Html::script(asset('remark/assets/vendor/datatables-fixedheader/dataTables.fixedHeader.js'))}}
  {{Html::script(asset('remark/assets/vendor/datatables-bootstrap/dataTables.bootstrap.js'))}}
  {{Html::script(asset('remark/assets/vendor/datatables-responsive/dataTables.responsive.js'))}}
  {{Html::script(asset('remark/assets/vendor/datatables-tabletools/dataTables.tableTools.js'))}}
  {{Html::script(asset('remark/assets/js/components/datatables.js'))}}

  <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
  <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
  <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
  <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>

  {{Html::script(asset('remark/assets/js/plugins/responsive-tabs.js'))}}
  {{Html::script(asset('remark/assets/js/plugins/closeable-tabs.js'))}}
  {{Html::script(asset('remark/assets/js/components/tabs.js'))}}
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

<script>
    function ConfirmDelete(id)
        {
            var id = id;
            swal({
                    title: "Apakah Yakin?",
                    text: "Data akan benar-benar dihapus!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Iya, Hapus!",
                    cancelButtonText: "Tidak, Batalkan!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        document.getElementById('delete-form-'+id).submit();
                    } else {
                        swal("Dibatalkan", "Data tidak jadi dihapus", "error");
                    }
                });
        }

        function ConfirmDeleteFollower(id)
        {
            var id = id;
            swal({
                    title: "Apakah Yakin?",
                    text: "Data akan benar-benar dihapus!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Iya, Hapus!",
                    cancelButtonText: "Tidak, Batalkan!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        document.getElementById('delete-form-follower-'+id).submit();
                    } else {
                        swal("Dibatalkan", "Data tidak jadi dihapus", "error");
                    }
                });
        }

        function ConfirmDeleteFile(id)
        {
            var id = id;
            swal({
                    title: "Apakah Yakin?",
                    text: "Data akan benar-benar dihapus!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Iya, Hapus!",
                    cancelButtonText: "Tidak, Batalkan!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        document.getElementById('delete-form-file-'+id).submit();
                    } else {
                        swal("Dibatalkan", "Data tidak jadi dihapus", "error");
                    }
                });
        }

        function ConfirmValidasi(id,string)
        {
            console.log(string);
            var id = id;
            $('input[name=validasi]').val(string);
            swal({
                    title: "Apakah Yakin?",
                    text: "User akan ganti validasi!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Iya, Validasi!",
                    cancelButtonText: "Tidak, Batalkan!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        document.getElementById('validasi-form-'+id).submit();
                    } else {
                        swal("Dibatalkan", "Data tidak jadi divalidasi", "error");
                    }
                });
        }

        function ConfirmAction(string)
        {
            console.log(string);
            $('#status').val(string);
            swal({
                    title: "Apakah Yakin?",
                    text: "Semua akan di "+string,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Iya, "+string,
                    cancelButtonText: "Tidak, Batalkan!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        document.getElementById('invite-action').submit();
                    } else {
                        swal("Dibatalkan", "Data tidak jadi di "+string, "error");
                    }
                });
        }
</script>

<script type="text/javascript">
var url = $('#url').val();
var token = $('input[name=_token]').val();
  $("#inputBasicOn").click(function() {
    // console.log(this.checked);
    if(this.checked) {
        validasi('Open');
    }
    else
    {
      validasi('Closed');
    }
});

  function validasi(val)
  {
    $.ajax({
        method: "PUT",
        url: url,
        data: { _token:token,status: val }
      })
        .done(function( msg ) {
            console.log(msg);
            alert(msg);
        });
  }
</script>

<script type="text/javascript">

$('#example').DataTable( {
         dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ]
    } );
</script>
@endsection
