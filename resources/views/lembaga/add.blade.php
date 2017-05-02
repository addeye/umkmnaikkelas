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
              <h3 class="panel-title"><i class="con wb-plus"></i> Lembaga</h3>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" method="post" action="{{route('lembaga.store')}}" enctype="multipart/form-data">
              {!! csrf_field() !!}
                <div class="form-group {{ $errors->has('id_lembaga') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">ID Lembaga</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="id_lembaga" value="{{old('id_lembaga')}}" />
                    <span class="help-block">
                      <strong>{{ $errors->first('id_lembaga') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('nama_lembaga') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Nama Lembaga</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_lembaga" value="{{old('nama_lembaga')}}" />
                    <span class="help-block">
                      <strong>{{ $errors->first('nama_lembaga') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('legalitas') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Legalitas</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="legalitas">
                      <option value="PT" {{old('legalitas')=='PT'?'selected':''}}>PT</option>
                      <option value="Koperasi" {{old('legalitas')=='Koperasi'?'selected':''}} >Koperasi</option>
                      <option value="Yayasan" {{old('legalitas')=='Yayasan'?'selected':''}}>Yayasan</option>
                      <option value="Perkumpulan" {{old('legalitas')=='Perkumpulan'?'selected':''}}>Perkumpulan</option>
                      <option value="Perguruan Tinggi" {{old('legalitas')=='Perguruan Tinggi'?'selected':''}}>Perguruan Tinggi</option>
                      <option value="Lainnya" {{old('legalitas')=='Lainnya'?'selected':''}}>Lainnya</option>
                    </select>
                    <span class="help-block">
                      <strong>{{ $errors->first('legalitas') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Alamat</label>
                  <div class="col-sm-9">
                    <textarea name="alamat" class="form-control">{{old('alamat')}}</textarea>
                    <span class="help-block">
                      <strong>{{ $errors->first('alamat') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('kab_id') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Kabupaten/Kota</label>
                  <div class="col-sm-9">
                    <select name="kab_id" class="form-control" data-plugin="select2">
                    @foreach($kabupaten as $row)
                    <option value="{{$row->id}}" {{old('kab_id')==$row->id?'selected':''}} >{{$row->name}}</option>
                    @endforeach
                    </select>
                    <span class="help-block">
                      <strong>{{ $errors->first('kab_id') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('telp') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Telepon</label>
                  <div class="col-sm-9">
                    <input type="text" name="telp" class="form-control" value="{{old('telp')}}">
                    <span class="help-block">
                      <strong>{{ $errors->first('telp') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="text" name="email" class="form-control" value="{{old('email')}}">
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('website') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Website</label>
                  <div class="col-sm-9">
                    <input type="text" name="website" class="form-control" value="{{old('website')}}">
                    <span class="help-block">
                      <strong>{{ $errors->first('website') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('pimpinan') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Pimpinan</label>
                  <div class="col-sm-9">
                    <input type="text" name="pimpinan" class="form-control" value="{{old('pimpinan')}}">
                    <span class="help-block">
                      <strong>{{ $errors->first('pimpinan') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('layanan') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Layanan</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="layanan">{{old('layanan')}}</textarea>
                    <span class="help-block">
                      <strong>{{ $errors->first('layanan') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('foto_kantor') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Foto Kantor</label>
                  <div class="col-sm-9">
                    <input id="input-2" name="foto_kantor" type="file" class="file" multiple data-show-upload="false" data-show-caption="true">
                    <span class="help-block">
                    <strong>Jpg, max 300kb</strong>
                      <strong>{{ $errors->first('foto_kantor') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('profil_doc') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">File Document</label>
                  <div class="col-sm-9">
                    <input id="input-2" name="profil_doc" type="file" class="file" multiple data-show-upload="false" data-show-caption="true">
                    <span class="help-block">
                    <strong>Doc, max 500kb.</strong>
                      <strong>{{ $errors->first('profil_doc') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Status</label>
                  <div class="radio-custom radio-default radio-inline">
                    <input type="radio" id="inputBasicMale" name="status" />
                    <label for="inputBasicMale">Anggota ABDSI</label>
                  </div>
                  <div class="radio-custom radio-default radio-inline">
                    <input type="radio" id="inputBasicFemale" name="status" checked />
                    <label for="inputBasicFemale">Bukan Anggota</label>
                  </div>
                  <strong>{{ $errors->first('status') }}</strong>
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary" id="validateButton2">Simpan</button>
                  <a href="{{route('lembaga.index')}}" class="btn btn-warning">Cancel</a>
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