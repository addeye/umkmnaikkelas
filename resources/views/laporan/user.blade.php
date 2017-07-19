@extends('layouts.apps.master')


@section('content')
<div class="page animsition">
	<div class="page-content">
		<div class="panel">
			<div class="panel-body">
				<div>Total User {{$total_user}}</div>
				<div>Total Admin {{$total_admin}}</div>
				<div>Total Calon {{$total_calon}}</div>
				<div>Total Pendamping {{$total_pendamping}}</div>
				<div>Total UMKM {{$total_umkm}}</div>
			</div>
		</div>

		<div class="panel">
			<div class="panel-body">		
			<table id="exampleTableTools" class="table table-hover dataTable table-striped width-full">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Email</th>						
						<th>Role</th>
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
            "iDisplayLength": 10,
            "aLengthMenu": [
              [5, 10, 25, 50, -1],
              [5, 10, 25, 50, "All"]
            ],
            ajax: '{{route('laporan-user.ajax')}}',
	    	"columns": [
	            { "data": "name" },
	            { "data": "email" },
	            { "data": "role.nama" },
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