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
                <th>ID Lembaga</th>
                <th>Nama Lembaga</th>
                <th>Legalitas</th>
                <th>Alamat</th>
                <th>Kab/Kota</th>
                <th>Telp</th>
                <th>Email</th>
                <th>Website</th>
                <th>Pimpinan</th>
                <th>Action</th>                
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>ID Lembaga</th>
                <th>Nama Lembaga</th>
                <th>Legalitas</th>
                <th>Alamat</th>
                <th>Kab/Kota</th>
                <th>Telp</th>
                <th>Email</th>
                <th>Website</th>
                <th>Pimpinan</th>
                <th>Action</th>                
              </tr>
            </tfoot>
            <tbody>
            <?php $no=1; ?>
            @foreach($data as $row)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$row->id_lembaga}}</td>
                <td>{{$row->nama_lembaga}}</td>
                <td>{{$row->legalitas}}</td>
                <td>{{$row->alamat}}</td>
                <td>{{$row->kota}}</td>
                <td>{{$row->telp}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->website}}</td>
                <td>{{$row->pimpinan}}</td>
                <td class="text-nowrap">
                  <a href="{{route('lembaga.show',['id'=>$row->id])}}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Show"><i class="icon wb-eye" aria-hidden="true"></i></a>
                  <a href="{{route('lembaga.edit',['id'=>$row->id])}}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit"><i class="icon wb-wrench" aria-hidden="true"></i></a>
                  <a class="btn btn-sm btn-icon btn-flat btn-default" onclick="event.preventDefault(); ConfirmDelete({{$row->id}});" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Delete"><i class="icon wb-close" aria-hidden="true"></i></a>
                  <form id="delete-form-{{$row->id}}" action="{{route('lembaga.destroy',['id'=>$row->id])}}" method="POST" style="display: none;">{{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                  </form>
                </td>
              </tr>
             @endforeach                          
            </tbody>
          </table>
          <div class="floating" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tambah Data">
                <a href="{{url('lembaga/create')}}"><i class="icon wb-plus" aria-hidden="true"></i></a>
            </div>
        </div>
      </div>      
      <!-- End Panel Basic -->
    </div>
  </div>
  <!-- End Page -->
@endsection

@section('css')
  {{Html::style('remark/assets/vendor/datatables-bootstrap/dataTables.bootstrap.css')}}
  {{Html::style('remark/assets/vendor/datatables-fixedheader/dataTables.fixedHeader.css')}}
  {{Html::style('remark/assets/vendor/datatables-responsive/dataTables.responsive.css')}}
@endsection

@section('js')

  {{Html::script(asset('remark/assets/vendor/datatables/jquery.dataTables.min.js'))}}
  {{Html::script(asset('remark/assets/vendor/datatables-fixedheader/dataTables.fixedHeader.js'))}}
  {{Html::script(asset('remark/assets/vendor/datatables-bootstrap/dataTables.bootstrap.js'))}}
  {{Html::script(asset('remark/assets/vendor/datatables-responsive/dataTables.responsive.js'))}}
  {{Html::script(asset('remark/assets/vendor/datatables-tabletools/dataTables.tableTools.js'))}}
  {{Html::script(asset('remark/assets/js/components/datatables.js'))}}

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

