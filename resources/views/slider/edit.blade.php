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
              <h3 class="panel-title"><i class="con wb-pencil"></i> Update Slider</h3>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" method="post" action="{{route('slider.update',['id'=>$data->id])}}">
              <input type="hidden" name="_method" value="PUT">
              {{ csrf_field()}}
                <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Nama Slider</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama" required value="{{$data->nama}}" />
                    <span class="help-block">
                      <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('path') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Gambar Baru</label>
                  <div class="col-sm-9">
                    <input id="input-2" name="path" type="file" class="file" data-show-upload="false" data-show-caption="true">
                    <span class="help-block">
                      <strong>{{ $errors->first('path') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('publish') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Publish</label>
                  <div class="col-sm-9">
                    <input type="checkbox" id="inputBasicOn" name="publish" data-plugin="switchery" value="Yes" {{$data->publish=='Yes'?'checked':''}} />                  
                    <label class="padding-top-3" for="inputBasicOn">{{$data->publish}}</label>
                    <span class="help-block">
                      <strong>{{ $errors->first('publish') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('publish') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Gambar Lama</label>
                  <div class="col-sm-9">
                    <img src="{{asset('uploads/slider/'.$data->path)}}" class="img-responsive">
                  </div>
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary" id="validateButton2">Submit</button>
                  <a href="{{route('slider.index')}}" class="btn btn-warning">Cancel</a>
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