@extends('layouts.apps.master')

@section('content')
    <!-- Page -->
  <div class="page animsition">
    <div class="page-content">
      <div class="col-md-12">
          <!-- Panel Standard Mode -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="con wb-pencil"></i> Bidang Usaha</h3>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" method="post" action="{{route('bidang-usaha.update',['id'=>$data->id])}}">
              <input type="hidden" name="_method" value="PUT">
              {{ csrf_field()}}
                <div class="form-group {{ $errors->has('id_lembaga') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">ID Lembaga</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="id_lembaga" />
                    <span class="help-block">
                      <strong>{{ $errors->first('id_lembaga') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('nama_lembaga') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Nama Lembaga</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_lembaga" />
                    <span class="help-block">
                      <strong>{{ $errors->first('nama_lembaga') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('legalitas') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Legalitas</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="legalitas">
                      <option value="PT">PT</option>
                      <option value="Koperasi">Koperasi</option>
                      <option value="Yayasan">Yayasan</option>
                      <option value="Perkumpulan">Perkumpulan</option>
                      <option value="Perguruan Tinggi">Perguruan Tinggi</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                    <span class="help-block">
                      <strong>{{ $errors->first('legalitas') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Alamat</label>
                  <div class="col-sm-9">
                    <textarea name="alamat" class="form-control"></textarea>
                    <span class="help-block">
                      <strong>{{ $errors->first('alamat') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('kab_id') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Kabupaten/Kota</label>
                  <div class="col-sm-9">
                    <select name="kab_id" class="form-control" data-plugin="select2">
                    </select>
                    <span class="help-block">
                      <strong>{{ $errors->first('kab_id') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('telp') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Telepon</label>
                  <div class="col-sm-9">
                    <input type="text" name="telp" class="form-control">
                    <span class="help-block">
                      <strong>{{ $errors->first('telp') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="text" name="email" class="form-control">
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('website') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Website</label>
                  <div class="col-sm-9">
                    <input type="text" name="website" class="form-control">
                    <span class="help-block">
                      <strong>{{ $errors->first('website') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('pimpinan') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Pimpinan</label>
                  <div class="col-sm-9">
                    <input type="text" name="pimpinan" class="form-control">
                    <span class="help-block">
                      <strong>{{ $errors->first('pimpinan') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('layanan') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Layanan</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="layanan"></textarea>
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
                      <strong>{{ $errors->first('foto_kantor') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('profil_doc') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">File Document</label>
                  <div class="col-sm-9">
                    <input id="input-2" name="profil_doc" type="file" class="file" multiple data-show-upload="false" data-show-caption="true">
                    <span class="help-block">
                      <strong>{{ $errors->first('profil_doc') }}</strong>
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
  <!-- End Page -->

@endsection