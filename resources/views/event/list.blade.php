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
                <th>Event</th>
                <th>Publish</th>
                <th>Status</th>
                <th>Kepada</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $no = 1;?>
            @foreach($data as $row)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$row->title}}</td>
                <td>{{$row->publish}}</td>
                <td>{{$row->status}}</td>
                <td>{{$row->role_level}}</td>
                <td class="text-nowrap">
                  <a href="{{route('event.show',['id'=>$row->id])}}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Show"><i class="icon wb-eye" aria-hidden="true"></i></a>
                </td>
                </td>
              </tr>
             @endforeach
            </tbody>
          </table>
          <div class="floating" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tambah Data">
                <a href="{{url('event/create')}}"><i class="icon wb-plus" aria-hidden="true"></i></a>
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
@endsection
