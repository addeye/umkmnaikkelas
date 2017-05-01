@extends('layouts.apps.master')

@section('content')
    <!-- Page -->
  <div class="page">
    <div class="page-content">
      <div class="col-md-12">
          <!-- Panel Standard Mode -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="con wb-pencil"></i> Bidang Keahlian</h3>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" method="post" action="{{route('bidang-keahlian.update',['id'=>$data->id])}}">
              <input type="hidden" name="_method" value="PUT">
              {{ csrf_field()}}
                <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Nama Bidang Pendampingan</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama" value="{{$data->nama}}" />
                    <span class="help-block">
                      <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary" id="validateButton2">Submit</button>
                  <a href="{{route('bidang-keahlian.index')}}" class="btn btn-warning">Cancel</a>
                </div>
              </form>
            </div>
          </div>
          <!-- End Panel Standard Mode -->
        </div>
    </div>
  </div>
  <!-- End Page -->

@endsection