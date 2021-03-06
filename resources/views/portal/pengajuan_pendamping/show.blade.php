@extends('layouts.portal.master')

@section('content')
    <!-- Page -->
    <div class="container-fluid">
        <div class="page-content animsition">
            <div class="row">
                <div class="col-md-12">
                    <!-- Panel Standard Mode -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-action">
                                <ul class="panel-actions">
                                    <li><a class="btn btn-sm btn-icon btn-flat btn-default" href="{{route('pengajuan-pendamping.edit',['id'=>$pengajuan->id])}}" data-toggle="tooltip" data-original-title="Edit"><span class="icon wb-edit"></span> Edit</a></li>
                                    <li>
                                        <a class="btn btn-sm btn-icon btn-flat btn-default" onclick="event.preventDefault(); ConfirmDelete({{$pengajuan->id}});" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Delete"><i class="icon wb-close" aria-hidden="true"></i> Hapus</a>
                                        <form id="delete-form-{{$pengajuan->id}}" action="{{route('pengajuan-pendamping.destroy',['id'=>$pengajuan->id])}}" method="POST" style="display: none;">{{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="panel-title">Detail Pengajuan Tahun {{$pengajuan->tahun}}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 padding-5 text-right">
                                    <h4>Tanggal : {{date('d-m-Y',strtotime($pengajuan->tanggal))}}</h4>
                                </div>
                                <div class="col-md-9">
                                    <h4>Kemajuan Usaha Per Bidang Pendampingan</h4>
                                    @foreach($pengajuan->ppb_pendampingan as $row)
                                        <p><strong>{{$row->bidang_pendampingan->nama}}</strong> : {{$row->keterangan}}</p>
                                    @endforeach
                                    <h4>Kemajuan Usaha Per Bidang Keahlian</h4>
                                    @foreach($pengajuan->ppb_keahlian as $row)
                                        <p><strong>{{$row->bidang_keahlian->nama}}</strong> : {{$row->keterangan}}</p>
                                    @endforeach
                                    <h4>File Pendukung</h4>
                                    <ul>
                                        @foreach($pengajuan->ppb_files as $file)
                                        <li>
                                            <a href="{{route('pengajuan-pendamping.getfile',['path'=>$file->path])}}"><span class="icon wb-file"></span> {{$file->nama}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-3">
                                    <h4 class="title">Kontak Person</h4>
                                    <p><strong>Nama : </strong>{{$pengajuan->nama}}</p>
                                    <p><strong>No Telp : </strong>{{$pengajuan->telp}}</p>
                                    <p><strong>Email : </strong>{{$pengajuan->email}}</p>
                                    <p><strong>Keterangan Tambahan :</strong> {{$pengajuan->keterangan}}</p>
                                    <h4>Info</h4>
                                    <label>Status : {{$pengajuan->status}}</label>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Panel Standard Mode -->
                </div>
            </div>
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