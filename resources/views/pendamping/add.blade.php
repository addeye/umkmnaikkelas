@extends('layouts.apps.master')

@section('content')
    <!-- Page -->
  <div class="page">
    <div class="page-content">
      <div class="row">
        <div class="col-md-12">
          <!-- Panel Standard Mode -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="con wb-plus"></i> Pendamping</h3>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" method="post" action="{{route('bidang-usaha.store')}}">
                <div class="form-group">
                  <label class="col-sm-3 control-label">ID Pendamping</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="id_pendamping" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Pendamping</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_pendamping" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Domisili</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="alamat_domisili" rows="5" placeholder="Alamat domisili lengkap"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Gender</label>
                  <div class="col-sm-9">
                    <input type="h">
                  </div>
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary" id="validateButton2">Simpan</button>
                  <a href="{{route('pendamping.index')}}" class="btn btn-warning">Cancel</a>
                </div>
              </form>
            </div>
          </div>
          <!-- End Panel Standard Mode -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Page -->

@endsection