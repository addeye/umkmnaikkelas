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
              <h3 class="panel-title"><i class="con wb-plus"></i> PROFIL UMKM</h3>
            </div>
            <div class="panel-body ">
              {!! Form::open(['route' => 'umkm.store','files'=>true,'class' => 'form-horizontal']) !!}
              <div class="form-group">
                <label class="col-sm-3 control-label">Nama Usaha *</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="nama_usaha" placeholder="Nama Usaha" value="{{old('nama_usaha')}}" />
                  <span class="help-block">
                      <strong>{{ $errors->first('nama_usaha') }}</strong>
                    </span>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Nama Pemilik *</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="nama_pemilik" placeholder="Nama Pemilik" value="{{old('nama_pemilik')}}" />
                  <span class="help-block">
                      <strong>{{ $errors->first('nama_pemilik') }}</strong>
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
              <div class="form-group {{ $errors->has('skala_usaha') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Skala Usaha *</label>
                <div class="col-sm-9 select2-warning">
                  <select class="form-control" data-plugin="select2" name="skala_usaha">
                    @foreach(skala_usaha() as $row)
                      <option value="{{$row}}">{{$row}}</option>
                    @endforeach
                  </select>
                  <span class="help-block">
                      <strong>{{ $errors->first('skala_usaha') }}</strong>
                    </span>
                </div>
              </div>
              <div class="form-group {{ $errors->has('bidang_usaha') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Bidang Usaha *</label>
                <div class="col-sm-9 select2-warning">
                  <select class="form-control" data-plugin="select2" name="bidang_usaha">
                    @foreach($bidang_usaha as $row)
                      <option value="{{$row->id}}">{{$row->nama}}</option>
                    @endforeach
                  </select>
                  <span class="help-block">
                      <strong>{{ $errors->first('bidang_usaha') }}</strong>
                    </span>
                </div>
              </div>
              <div class="form-group {{ $errors->has('komunitas_asosiasi') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Komunitas Asosiasi</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="komunitas_asosiasi" placeholder="Komunitas asosiasi" value="{{old('komunitas_asosiasi')}}" />
                  <span class="help-block">
                      <strong>{{ $errors->first('komunitas_asosiasi') }}</strong>
                    </span>
                </div>
              </div>
              <div class="form-group {{ $errors->has('omset') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Omset</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control rupiah" name="omset" placeholder="Omset.." value="{{old('omset')}}" />
                  <span class="help-block">
                      <strong>{{ $errors->first('omset') }}</strong>
                    </span>
                </div>
              </div>
              <div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Alamat</label>
                <div class="col-sm-9">
                  <textarea name="alamat" class="form-control" placeholder="Alamat usaha">{{old('alamat')}}</textarea>
                  <span class="help-block">
                      <strong>{{ $errors->first('alamat') }}</strong>
                    </span>
                </div>
              </div>
              <div class="form-group {{ $errors->has('kabkota_id') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Kabupaten/Kota *</label>
                <div class="col-sm-9 select2-warning">
                  <select id="kabkota" class="form-control" data-plugin="select2" name="kabkota_id">
                    <option value="">Pilih Kota</option>
                    @foreach($kabkota as $row)
                      <option value="{{$row->id}}" >{{$row->name}}</option>
                    @endforeach
                  </select>
                  <span class="help-block">
                      <strong>{{ $errors->first('kabkota_id') }}</strong>
                    </span>
                </div>
              </div>
              <div class="form-group {{ $errors->has('kecamatan_id') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Kecamatan *</label>
                <div class="col-sm-9 select2-warning">
                  <select class="form-control" data-plugin="select2" name="kecamatan_id">
                    @foreach($bidang_usaha as $row)
                      <option value="{{$row->id}}" {{old('kecamatan_id')==$row->id?'selected':''}}>{{$row->nama}}</option>
                    @endforeach
                  </select>
                  <span class="help-block">
                      <strong>{{ $errors->first('kecamatan_id') }}</strong>
                    </span>
                </div>
              </div>
              <div class="form-group {{ $errors->has('no_ktp') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">No KTP</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="no_ktp" placeholder="No KTP" value="{{old('no_ktp')}}" />
                  <span class="help-block">
                      <strong>{{ $errors->first('no_ktp') }}</strong>
                    </span>
                </div>
              </div>
              <div class="form-group {{ $errors->has('path_ktp') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Foto KTP</label>
                <div class="col-sm-9">
                  <input id="input-2" name="path_ktp" type="file" class="file" data-show-upload="false" data-show-caption="true">
                  <span class="help-block">
                    <strong>Jpg, max 300kb</strong>
                      <strong>{{ $errors->first('path_ktp') }}</strong>
                    </span>
                </div>
              </div>
              <div class="form-group {{ $errors->has('no_npwp') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">No NPWP</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="no_npwp" placeholder="No NPWP" value="{{old('no_npwp')}}" />
                  <span class="help-block">
                      <strong>{{ $errors->first('no_npwp') }}</strong>
                    </span>
                </div>
              </div>
              <div class="form-group {{ $errors->has('path_npwp') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Foto KTP</label>
                <div class="col-sm-9">
                  <input id="input-2" name="path_npwp" type="file" class="file" data-show-upload="false" data-show-caption="true">
                  <span class="help-block">
                    <strong>Jpg, max 300kb</strong>
                      <strong>{{ $errors->first('path_npwp') }}</strong>
                    </span>
                </div>
              </div>
              <div class="form-group {{ $errors->has('telp') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Telepon</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="telp" placeholder="Telepon" value="{{old('telp')}}" />
                  <span class="help-block">
                      <strong>{{ $errors->first('telp') }}</strong>
                    </span>
                </div>
              </div>
              <div class="form-group {{ $errors->has('website') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Website</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="website" placeholder="Alamat Website" value="{{old('website')}}" />
                  <span class="help-block">
                      <strong>{{ $errors->first('website') }}</strong>
                    </span>
                </div>
              </div>
              <div class="form-group {{ $errors->has('facebook') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Facebook</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="facebook" placeholder="Facebook" value="{{old('facebook')}}" />
                  <span class="help-block">
                      <strong>{{ $errors->first('facebook') }}</strong>
                    </span>
                </div>
              </div>
              <div class="form-group {{ $errors->has('instagram') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Instagram</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="instagram" placeholder="Instagram" value="{{old('instagram')}}" />
                  <span class="help-block">
                      <strong>{{ $errors->first('instagram') }}</strong>
                    </span>
                </div>
              </div>
              <div class="form-group {{ $errors->has('online') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Online</label>
                <div class="radio-custom radio-default radio-inline">
                  <input type="radio" id="inputBasicMale" name="online" value="Ya" {{old('online')=='Ya'?'checked':''}} />
                  <label for="inputBasicMale">Ya</label>
                </div>
                <div class="radio-custom radio-default radio-inline">
                  <input type="radio" id="inputBasicFemale" name="online" value="Tidak" {{old('online')=='Tidak'?'checked':''}}/>
                  <label for="inputBasicFemale">Tidak</label>
                </div>
              </div>
              <div class="form-group {{ $errors->has('jml_tenaga_kerja') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Jumlah Tenaga Kerja</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="jml_tenaga_kerja" placeholder="Jumlah tenaga kerja" value="{{old('jml_tenaga_kerja')}}" />
                  <span class="help-block">
                      <strong>{{ $errors->first('jml_tenaga_kerja') }}</strong>
                    </span>
                </div>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary" id="validateButton2">Simpan</button>
                <a href="{{route('umkm.index')}}" class="btn btn-warning">Cancel</a>
              </div>
              {!! Form::close() !!}
            </div>
          </div>
          <!-- End Panel Standard Mode -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Page -->

@endsection

@section('js')
  <script>
    $(document).ready(function () {
        $('.rupiah').priceFormat({
            prefix: 'Rp. ',
            centsSeparator: ',',
            thousandsSeparator: '.'
        });
        
        $('#kabkota').change(function () {
            alert('deye');
        })
    })
  </script>
  @endsection
