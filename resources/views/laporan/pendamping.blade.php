@extends('layouts.apps.master')


@section('content')
<div class="page animsition">
	<div class="page-content">
    <div class="panel">
      <div class="panel-body">    
      <div class="table-responsive">
        <table id="example" class="table table-hover dataTable table-striped width-full">
        <thead>
          <tr>
            <th>ID Pendampingan</th>
            <th>Nama</th> 
            <th>Alamat</th>
            <th>Gender</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Pendidikan</th>
            <th>Tahun</th>
            <th>Pengalaman</th>
            <th>Sertifikat</th>
            <th>Bidang Pendampingan</th>
            <th>Bidang Keahlian</th>
            <th>Bidang Usaha</th>
            <th>Provinsi</th>
            <th>Kota</th>            
            <th>Lembaga</th>
          </tr>
        </thead>        
      </table>   
      </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('css')
  {{Html::style('remark/assets/vendor/datatables-bootstrap/dataTables.bootstrap.css')}}
  <link href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" rel="stylesheet">
  {{-- {{Html::style('remark/assets/vendor/datatables-fixedheader/dataTables.fixedHeader.css')}} --}}
  {{-- {{Html::style('remark/assets/vendor/datatables-responsive/dataTables.responsive.css')}} --}}
@endsection

@section('js')
  {{Html::script(asset('remark/assets/vendor/datatables/jquery.dataTables.min.js'))}}
  {{-- {{Html::script(asset('remark/assets/vendor/datatables-fixedheader/dataTables.fixedHeader.js'))}} --}}
  {{Html::script(asset('remark/assets/vendor/datatables-bootstrap/dataTables.bootstrap.js'))}}
  {{-- {{Html::script(asset('remark/assets/vendor/datatables-responsive/dataTables.responsive.js'))}} --}}
  {{Html::script(asset('remark/assets/vendor/datatables-tabletools/dataTables.tableTools.js'))}}
  {{Html::script(asset('remark/assets/js/components/datatables.js'))}}
  <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
  <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
  <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
  <script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>

<script type="text/javascript">

$('#example').DataTable( {
        ajax: '{{route('laporan-user.ajax.pendamping')}}',
        "columns": [
              { "data": "id_pendamping" },
              { "data": "nama_pendamping" },
              { "data": "alamat_domisili" },
              { "data": "jenis_kelamin" },
              { "data": "telp" },
              { "data": "email" },
              { "data": "pendidikan" },
              { "data": "tahun_mulai" },
              { "data": "pengalaman" },
              { "data": "sertifikat" },
              { "data": "bidang_pendampingan" },
              { "data": "bidang_keahlian" },
              { "data": "bidang_usaha" },              
              { "data": "provinsi" },
              { "data": "kabkota" },
              { "data": "nama_lembaga" },
          ],
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