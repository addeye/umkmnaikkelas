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
                                    <li><a class="btn btn-sm btn-icon btn-flat btn-default" href="{{route('agenda.edit',['id'=>$data->id])}}" data-toggle="tooltip" data-original-title="Edit"><span class="icon wb-edit"></span> Edit</a></li>
                                    <li>
                                        <a class="btn btn-sm btn-icon btn-flat btn-default" onclick="event.preventDefault(); ConfirmDelete({{$data->id}});" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Delete"><i class="icon wb-close" aria-hidden="true"></i> Hapus</a>
                                        <form id="delete-form-{{$data->id}}" action="{{route('agenda.destroy',['id'=>$data->id])}}" method="POST" style="display: none;">{{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="panel-title">{{$data->judul}}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 padding-5 text-right">
                                    <h4>Waktu : {{$data->jam_mulai}} - {{$data->jam_selesai}}</h4>
                                </div>
                                <div class="col-md-9">
                                    <h4>{{$data->deskripsi}}</h4>                                  
                                    <img src="{{asset('uploads/agenda/'.$data->image)}}" class="img-responsive">
                                    <hr>
                                    <p>
                                        {{$data->keterangan}}
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <h4 class="title">{{$data->user->name}}</h4>
                                    <p><strong>Tanggal : </strong>{{$data->tanggal_mulai}} - {{$data->tanggal_mulai}}</p>
                                    <p><strong>Waktu : </strong>{{$data->jam_mulai}} - {{$data->jam_selesai}}</p>
                                    <p><strong>Lokasi : </strong>{{$data->lokasi}}</p>                                    
                                    <h4>Info</h4>
                                    <label>Status : {{$data->status?'Publish':'Menunggu'}}</label>

                                </div>
                            </div>
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

    </script>
    @endsection

