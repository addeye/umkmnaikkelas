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
                                    <li><a class="btn btn-sm btn-icon btn-flat btn-default" href="{{route('broadcast.edit',['id'=>$data->id])}}" data-toggle="tooltip" data-original-title="Edit"><span class="icon wb-edit"></span> Edit</a></li>
                                    <li><a class="btn btn-sm btn-icon btn-flat btn-default" href="{{route('broadcast.index')}}" data-toggle="tooltip" data-original-title="Kembali"><span class="icon wb-reply"></span> Kembali</a></li>
                                    {{-- <li>
                                        <a class="btn btn-sm btn-icon btn-flat btn-default" onclick="event.preventDefault(); ConfirmDelete({{$data->id}});" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Delete"><i class="icon wb-close" aria-hidden="true"></i> Hapus</a>
                                        <form id="delete-form-{{$data->id}}" action="{{route('broadcast.destroy',['id'=>$data->id])}}" method="POST" style="display: none;">{{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                        </form>
                                    </li> --}}
                                </ul>
                            </div>
                            <h3 class="panel-title">{{$data->subject}}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="padding-top-20">
                                        <p><strong>Subject</strong> : {{$data->subject}}</p>
                                        <p><strong>Kepada</strong> : Semua {{$data->role_level}}</p>
                                        <hr>
                                      {!! $data->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            @if ($data->send == 0)
                                <a class="btn btn-success" onclick="event.preventDefault(); ConfirmDelete({{$data->id}});" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Kirim"><i class="icon wb-envelope" aria-hidden="true"></i> Kirim</a>
                                        <form id="send-form-{{$data->id}}" action="{{route('broadcast.send',['id'=>$data->id])}}" method="POST" style="display: none;">{{ csrf_field() }}
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="send" value="1">
                                        </form>
                                        @else
                                <button class="btn btn-success" disabled><i class="icon wb-envelope" aria-hidden="true"></i> Terkirim</button>
                            @endif

                        </div>
                    </div>
                    <!-- End Panel Standard Mode -->
    </div>
  </div>
  <!-- End Page -->
@endsection

@section('js')
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


        function ConfirmDelete(id)
        {
            var id = id;
            swal({
                    title: "Apakah Yakin?",
                    text: "Broadcast akan proses dikirim!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Iya, Kirim!",
                    cancelButtonText: "Tidak, Batalkan!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        document.getElementById('send-form-'+id).submit();
                    } else {
                        swal("Dibatalkan", "Broadcast tidak jadi dikirim", "error");
                    }
                });
        }

    </script>
    @endsection

