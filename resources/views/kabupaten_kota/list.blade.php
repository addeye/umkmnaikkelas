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
                <th>ID</th>
                <th>Nama</th>                           
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Nama</th>                            
              </tr>
            </tfoot>
            <tbody>
            <?php $no=1; ?>
            @foreach($data as $row)
              <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>                
              </tr>
             @endforeach                          
            </tbody>
          </table>
          <div style="display: none;" class="floating" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tambah Data">
                <a href="{{url('bidang-usaha/create')}}"><i class="icon wb-plus" aria-hidden="true"></i></a>
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
