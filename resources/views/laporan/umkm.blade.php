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
            <th>ID UMKM</th>
            <th>Nama Usaha</th>
            <th>Nama Pemilik</th>
            <th>Alamat</th>
            <th>Provinsi</th>
            <th>Kabupaten/Kota</th>
            <th>Kecamatan</th>
            <th>No KTP</th>
            <th>No NPWP</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Badan Hukum</th>
            <th>Tahun Mulai</th>
            <th>Skala Usaha</th>
            <th>Bidang Usaha</th>
            <th>Komunitas Asosiasi</th>
            <th>Website</th>
            <th>Facebook</th>
            <th>Twitter</th>
            <th>Whatsapp</th>
            <th>Instagram</th>
            <th>Online</th>
            <th>Sentra UMKM</th>
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
        ajax: '{{route('laporan-user.ajax.umkm')}}',
        "columns": [
              { "data": "id_umkm" },
              { "data": "nama_usaha" },
              { "data": "nama_pemilik" },
              { "data": "alamat" },
              { "data": "provinsi" },
              { "data": "kota" },
              { "data": "kecamatan" },
              { "data": "no_ktp" },
              { "data": "no_npwp" },
              { "data": "telp" },
              { "data": "email" },
              { "data": "badan_hukum" },
              { "data": "tahun_mulai" },
              { "data": "skala_usaha" },
              { "data": "bidang_usaha.nama" },
              { "data": "komunitas_asosiasi" },
              { "data": "website" },
              { "data": "facebook" },
              { "data": "twitter" },
              { "data": "whatsapp" },
              { "data": "instagram" },
              { "data": "online" },
              { "data": "sentra_umkm" },
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