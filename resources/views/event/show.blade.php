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
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                @if ($event_follower)
                                    <form action="{{ route('event.diskusi') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="event_follower_id" value="{{$event_follower->id}}">
                                    <input type="hidden" name="event_id" value="{{$data->id}}">
                                    <div class="form-group row {{ $errors->has('chat') ? ' has-error' : '' }}">
                                                <div class="col-md-12">
                                                    <textarea class="form-control" name="comment" placeholder="Tulis komentar anda.." rows="3"></textarea>
                                                </div>
                                                <span class="help-block">
                                            <strong>{{ $errors->first('chat') }}</strong>
                                        </span>
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
                                    <a href="{{$row->path.$row->file_name}}">
                                        {{$row->file_name}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
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
                                            Validation
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
                                            @if ($row->validation=='No')
                                                <a onclick="event.preventDefault(); ConfirmValidasi({{$row->id}},'Yes');" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Terima"><i class="icon wb-check" aria-hidden="true"></i> Terima</a>

                                            <a onclick="event.preventDefault(); ConfirmValidasi({{$row->id}},'Out');" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Tolak"><i class="icon wb-close" aria-hidden="true"> Tolak</i></a>

                                              <form id="validasi-form-{{$row->id}}" action="{{route('event.follow.validasi',['id'=>$row->id])}}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="PUT">
                                                <input type="hidden" name="validasi" id="validasi-follower">
                                              </form>
                                              @else
                                              {{$row->validation}}
                                            @endif

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
        <!-- End Panel Standard Mode -->
    </div>
</div>
<!-- End Page -->
<input type="hidden" id="url" value="{{route('event.validasi',['id'=>$data->id])}}">
  {{ csrf_field() }}
@endsection

@section('js')

  {{Html::script(asset('remark/assets/js/plugins/responsive-tabs.js'))}}
  {{Html::script(asset('remark/assets/js/plugins/closeable-tabs.js'))}}
  {{Html::script(asset('remark/assets/js/components/tabs.js'))}}
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

        function ConfirmValidasi(id,string)
        {
            var id = id;
            $('#validasi-follower').val(string);
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
@endsection
