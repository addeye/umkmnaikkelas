@extends('layouts.apps.master')

@section('content')
  <!-- Page -->
  <div class="page animsition">
    <div class="page-content">
      <!-- Panel Standard Mode -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-action">
                                <ul class="panel-actions">
                                    <li>
                                        <a class="btn btn-sm btn-icon btn-flat btn-default" onclick="event.preventDefault(); ConfirmDeleteData({{$pengajuan->id}});" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Delete"><i class="icon wb-close" aria-hidden="true"></i> Hapus</a>
                                        <form id="delete-formdata-{{$pengajuan->id}}" action="{{route('penghargaan-umkm.destroy',['id'=>$pengajuan->id])}}" method="POST" style="display: none;">{{ csrf_field() }}
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
                                    <h4>Kemajuan Usaha Per Bidang</h4>
                                    @foreach($pengajuan->pengajuan_umkm_detail as $row)
                                        <p><strong>{{$row->bidang_pendampingan->nama}}</strong> : {{$row->keterangan}}</p>
                                    @endforeach
                                    <h4>File Pendukung</h4>
                                    <ul>
                                        @foreach($pengajuan->pengajuan_umkm_files as $file)
                                        <li>
                                            <a href="{{route('penghargaan-umkm.getfile',['path'=>$file->path])}}"><span class="icon wb-file"></span> {{$file->nama}}</a>
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
                                    <form id="delete-form-{{$pengajuan->id}}" action="{{route('penghargaan-umkm.update',['id'=>$pengajuan->id])}}" method="post">
                                    {{ csrf_field()}}
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="form-group">
                                        <select id="select_status" name="status" class="form-control">
                                        <option value="Menunggu" {{$pengajuan->status=='Menunggu'?'selected':''}}>Menunggu</option>
                                        <option value="Lunas" {{$pengajuan->status=='Lunas'?'selected':''}}>Lunas</option>
                                        <option value="Tolak" {{$pengajuan->status=='Di Tolak'?'selected':''}}>Tolak</option>
                                    </select>
                                    </div>                                                                   
                                    </form>
                                    <a class="btn btn-sm btn-primary" onclick="event.preventDefault(); ConfirmDelete({{$pengajuan->id}});" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Update">Update</a>
                                    <h4>{!! $pengajuan->user?'<strong>Penilai :</strong> '.$pengajuan->user->name:'Belum Di Validasi' !!}</h4>
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

      function ConfirmDeleteData(id)
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
                        document.getElementById('delete-formdata-'+id).submit();
                    } else {
                        swal("Dibatalkan", "Data tidak jadi dihapus", "error");
                    }
                });
        }

      function ConfirmDelete(id)
      {
        var status = $('#select_status').val();
          var id = id;
          swal({
                  title: "Apakah Yakin?",
                  text: "Penghargaan diubah "+status,
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Iya, Rubah!",
                  cancelButtonText: "Tidak, Batalkan!",
                  closeOnConfirm: false,
                  closeOnCancel: false
              },
              function(isConfirm){
                  if (isConfirm) {
                      // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                      document.getElementById('delete-form-'+id).submit();
                  } else {
                      swal("Dibatalkan", "Status tidak jadi dirubah "+status, "error");
                  }
              });
      }

  </script>
  
@endsection