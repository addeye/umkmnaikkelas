@extends('layouts.apps.master')

@section('content')
    <!-- Page -->
  <div class="page">
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
                <th>Nama</th>
                <th>Action</th>                
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Action</th>                
              </tr>
            </tfoot>
            <tbody>
            <?php $no=1; ?>
            @foreach($data as $row)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$row->nama}}</td>
                <td class="text-nowrap">
              		<button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit"><i class="icon wb-wrench" aria-hidden="true"></i></button>                   
                    <a class="btn btn-sm btn-icon btn-flat btn-default" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Delete"><i class="icon wb-close" aria-hidden="true"></i></a>

                        <form id="logout-form" action="{{url('#')}}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                </td>
              </tr>
             @endforeach                          
            </tbody>
          </table>
          <div class="floating" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tambah Data">
                <a href="{{url('bidang-usaha/create')}}"><i class="icon wb-plus" aria-hidden="true"></i></a>
            </div>
        </div>
      </div>      
      <!-- End Panel Basic -->
    </div>
  </div>
  <!-- End Page -->

@endsection
