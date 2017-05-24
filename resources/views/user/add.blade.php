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
              <h3 class="panel-title"><i class="con wb-plus"></i> User Lunas</h3>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" method="post" action="{{route('user.store')}}">
                {{ csrf_field()}}

                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Nama Lengkap</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" value="{{old('name')}}"/>
                    <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Alamat Email</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="email" value="{{old('email')}}" />
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('telp') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Telepon</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="telp" value="{{old('telp')}}"/>
                    <span class="help-block">
                      <strong>{{ $errors->first('telp') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('role_id') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Level</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="role_id">
                      @foreach($role as $r)
                      <option value="{{$r->id}}" {{old('role_id')==$r->id?'selected':''}}>{{$r->nama}}</option>
                        @endforeach
                    </select>
                    <span class="help-block">
                      <strong>{{ $errors->first('role_id') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Password</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="password" value="{{old('password')}}"/>
                    <span class="help-block">
                      <strong>* Default password = "password"</strong>
                    </span>
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="text-right">
                  <button type="submit" class="btn btn-primary" id="validateButton2">Simpan</button>
                  <a href="{{route('user.index')}}" class="btn btn-warning">Cancel</a>
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