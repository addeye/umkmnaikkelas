@extends('layouts.apps.master')

@section('content')
    <!-- Page -->
  <div class="page animsition">
    <div class="page-content">
      <div class="row">
        <div class="col-md-12">
          <!-- Panel Standard Mode -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="con wb-plus"></i> Bidang Usaha</h3>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" method="post" action="{{route('bidang-usaha.store')}}">
                {{ csrf_field()}}
                <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Nama Bidang Usaha</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama" />
                    <span class="help-block">
                      <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary" id="validateButton2">Simpan</button>
                  <a href="{{route('bidang-usaha.index')}}" class="btn btn-warning">Cancel</a>
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