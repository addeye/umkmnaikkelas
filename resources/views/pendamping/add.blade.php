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
              <h3 class="panel-title"><i class="con wb-plus"></i> Pendamping</h3>
            </div>
            <div class="panel-body ">
              <form class="form-horizontal" method="post" action="{{route('pendamping.store')}}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-group {{ $errors->has('id_pendamping') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">ID Pendamping *</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="id_pendamping" placeholder="ID Pendamping" value="{{old('id_pendamping')}}" />
                    <span class="help-block">
                      <strong>{{ $errors->first('id_pendamping') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('nama_pendamping') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Nama Pendamping *</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_pendamping" placeholder="Nama pendamping" value="{{old('nama_pendamping')}}" />
                    <span class="help-block">
                      <strong>{{ $errors->first('nama_pendamping') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('alamat_domisili') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Domisili *</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="alamat_domisili" rows="5" placeholder="Alamat domisili lengkap">{{old('alamat_domisili')}}</textarea>
                    <span class="help-block">
                      <strong>{{ $errors->first('alamat_domisili') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Jenis Kelamin *</label>
                  <div class="radio-custom radio-default radio-inline">
                    <input type="radio" id="inputBasicMale" name="jenis_kelamin" value="Pria" {{old('jenis_kelamin')=='Pria'?'checked':''}} />
                    <label for="inputBasicMale">Pria</label>
                  </div>
                  <div class="radio-custom radio-default radio-inline">
                    <input type="radio" id="inputBasicFemale" name="jenis_kelamin" value="Wanita" {{old('jenis_kelamin')=='Wanita'?'checked':''}}/>
                    <label for="inputBasicFemale">Wanita</label>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('telp') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Telepon *</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="telp" placeholder="Telepon.." value="{{old('telp')}}" />
                    <span class="help-block">
                      <strong>{{ $errors->first('telp') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Email *</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="email" placeholder="email" value="{{old('email')}}" />
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('pendidikan') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Pendidikan</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="pendidikan">
                      @foreach(pendidikan() as $key=>$row)
                        <option value="{{$row}}">{{$row}}</option>
                        @endforeach
                    </select>
                    <span class="help-block">
                      <strong>{{ $errors->first('pendidikan') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('pengalaman') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Pengalaman</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="pengalaman" placeholder="Pengalaman Pendampingan..">{{old('pengalaman')}}</textarea>
                    <span class="help-block">
                      <strong>{{ $errors->first('pengalaman') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('sertifikat') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Sertifikat</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="sertifikat" placeholder="Sertifikat pendampingan.." value="{{old('sertifikat')}}"/>
                    <span class="help-block">
                      <strong>{{ $errors->first('sertifikat') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('bidang_pendampingan') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Bidang Pendampingan</label>
                  <div class="col-sm-9 select2-warning">
                    <select class="form-control" name="bidang_pendampingan[]" multiple data-plugin="select2">
                      @foreach($BdPendampingan as $row)
                        <option value="{{$row->nama}}">{{$row->nama}}</option>
                        @endforeach
                    </select>
                    <span class="help-block">
                      <strong>{{ $errors->first('bidang_pendampingan') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('bidang_keahlian') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Bidang Keahlian</label>
                  <div class="col-sm-9 select2-warning">
                    <select class="form-control" multiple data-plugin="select2" name="bidang_keahlian[]">
                      @foreach($BdKeahlian as $row)
                        <option value="{{$row->nama}}">{{$row->nama}}</option>
                      @endforeach
                    </select>
                    <span class="help-block">
                      <strong>{{ $errors->first('bidang_keahlian') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('kabkota_id') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Kab/Kota Pendampingan</label>
                  <div class="col-sm-9">
                    <select class="form-control" data-plugin="select2" name="kabkota_id">
                      @foreach(Indonesia::allCities() as $row)
                        <option value="{{$row->id}}">{{$row->name}}</option>
                      @endforeach
                    </select>
                    <span class="help-block">
                      <strong>{{ $errors->first('kabkota_id') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('bidang_keahlian') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Kab/Kota Tambahan</label>
                  <div class="col-sm-9 select2-warning">
                    <select class="form-control" multiple data-plugin="select2" name="kabkota_tambahan[]">
                      @foreach(Indonesia::allCities() as $row)
                        <option value="{{$row->id}}">{{$row->name}}</option>
                      @endforeach
                    </select>
                    <span class="help-block">
                      <strong>{{ $errors->first('bidang_keahlian') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('lembaga_id') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Lembaga *</label>
                  <div class="col-sm-9 select2-warning">
                    <select class="form-control" data-plugin="select2" name="lembaga_id">
                      @foreach($lembaga as $row)
                        <option value="{{$row->id}}">{{$row->nama_lembaga}}</option>
                      @endforeach
                    </select>
                    <span class="help-block">
                      <strong>{{ $errors->first('lembaga_id') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('foto_ktp') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Foto KTP</label>
                  <div class="col-sm-9">
                    <input id="input-2" name="foto_ktp" type="file" class="file" data-show-upload="false" data-show-caption="true">
                    <span class="help-block">
                    <strong>Jpg, max 300kb</strong>
                      <strong>{{ $errors->first('foto_ktp') }}</strong>
                    </span>
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