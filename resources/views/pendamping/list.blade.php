@extends('layouts.apps.master')

@section('content')
  <!-- Page -->
  <div class="page animsition">
    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title"></h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
            <tr>
              <th>No</th>
              <th>ID Pendamping</th>
              <th>Nama</th>
              <th>Gender</th>
              <th>Telepon</th>
              <th>Email</th>
              <th>Pendidikan</th>
              <th>Lembaga</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
              <th>No</th>
              <th>ID Pendamping</th>
              <th>Nama</th>
              <th>Gender</th>
              <th>Telepon</th>
              <th>Email</th>
              <th>Pendidikan</th>
              <th>Lembaga</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
            <?php $no=1; ?>
            @foreach($data as $row)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$row->id_pendamping}}</td>
                <td>{{$row->nama_pendamping}}</td>
                <td>{{$row->jenis_kelamin}}</td>
                <td>{{$row->telp}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->pendidikan}}</td>
                <td>{{$row->lembaga->nama_lembaga}}</td>
                <td class="text-nowrap">
                  <a href="{{route('pendamping.show',['id'=>$row->id])}}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Show"><i class="icon wb-eye" aria-hidden="true"></i></a>
                  <a href="{{route('pendamping.edit',['id'=>$row->id])}}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit"><i class="icon wb-wrench" aria-hidden="true"></i></a>
                  <a class="btn btn-sm btn-icon btn-flat btn-default" onclick="event.preventDefault(); ConfirmDelete();" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Delete"><i class="icon wb-close" aria-hidden="true"></i></a>
                  <form id="delete-form" action="{{route('pendamping.destroy',['id'=>$row->id])}}" method="POST" style="display: none;">{{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                  </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <div class="floating" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tambah Data">
            <a href="{{url('pendamping/create')}}"><i class="icon wb-plus" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
      <!-- End Panel Basic -->
    </div>
  </div>
  <!-- End Page -->
@endsection

@section('js')
  <script>

      function ConfirmDelete()
      {
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
                      document.getElementById('delete-form').submit();
                  } else {
                      swal("Dibatalkan", "Data tidak jadi dihapus", "error");
                  }
              });
      }

  </script>
@endsection
