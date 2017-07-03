@extends('layouts.apps.master')


@section('content')
<div class="page animsition">
	<div class="page-content">
		<div class="panel">
			<div class="panel-body">
				<div>Total Pendamping {{$total_pendamping}}</div>
		</div>

		<div class="panel">
			<div class="panel-body">		
			<table id="exampleTableTools" class="table table-hover dataTable table-striped width-full">
				<thead>
					<tr>
						<th>ID Pendamping</th>
						<th>Nama</th>	
            <th>Alamat</th>
            <th>Gender</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Pendidikan</th>
            <th>Tahun</th>
            <th>Pengalaman</th>
            <th>Sertifikat</th>
            <th>BD.Pendampingan</th>
            <th>BD.Keahlian</th>
            <th>BD.Usaha</th>
            <th>Lembaga</th>
					</tr>
				</thead>				
			</table>
			</div>
		</div>

	</div>
</div>

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

<script type="text/javascript">
// Table Tools
      // -----------
      (function() {
        $(document).ready(function() {
          var defaults = $.components.getDefaults("dataTable");

          var options = $.extend(true, {}, defaults, {          
            "aoColumnDefs": [{
              'bSortable': false,
              'aTargets': [-1]
            }],
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
              { "data": "lembaga.nama_lembaga" },
	        ],
            "sDom": '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',
            "oTableTools": {
              "sSwfPath": "{{asset('remark/assets/vendor/datatables-tabletools/swf/copy_csv_xls_pdf.swf')}}"
            }
          });

          $('#exampleTableTools').dataTable(options);
        });
      })();
</script>
@endsection