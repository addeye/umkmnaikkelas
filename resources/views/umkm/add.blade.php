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
                <label class="col-sm-3 control-label">NIU *</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="id_umkm" placeholder="Nomor Induk UMKM" value="{{old('id_umkm')}}" required/>
                  <span class="help-block">
                      <strong>{{ $errors->first('id_umkm') }}</strong>
                    </span>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Nama Usaha *</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="nama_usaha" placeholder="Nama Usaha" value="{{old('nama_usaha')}}" required/>
                  <span class="help-block">
                      <strong>{{ $errors->first('nama_usaha') }}</strong>
                    </span>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Nama Pemilik Usaha*</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="nama_pemilik" placeholder="Nama Pemilik" value="{{old('nama_pemilik')}}" required/>
                  <span class="help-block">
                      <strong>{{ $errors->first('nama_pemilik') }}</strong>
                    </span>
                </div>
              </div>

              <div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Alamat *</label>
                <div class="col-sm-9">
                  <textarea name="alamat" class="form-control" placeholder="Alamat usaha" required>{{old('alamat')}}</textarea>
                  <span class="help-block">
                      <strong>{{ $errors->first('alamat') }}</strong>
                    </span>
                </div>
              </div>
              <div class="form-group {{ $errors->has('kabkota_id') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Kabupaten/Kota *</label>
                <div class="col-sm-9 select2-warning">
                  <select id="kabkota" class="form-control" data-plugin="select2" name="kabkota_id" required>
                    <option value="">Pilih Kota</option>
                    @foreach($kabkota as $row)
                      <option value="{{$row->id}}" {{old('kabkota_id')==$row->id?'selected':''}} >{{$row->name}}</option>
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
                  <select id="kecamatan" class="form-control" data-plugin="select2" name="kecamatan_id" required>
                    <option value="">Pilih Kecamatan</option>
                  </select>
                  <span class="help-block">
                      <strong>{{ $errors->first('kecamatan_id') }}</strong>
                    </span>
                </div>
              </div>

              <div class="form-group {{ $errors->has('no_ktp') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">No KTP *</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="no_ktp" placeholder="No KTP" value="{{old('no_ktp')}}" required/>
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
                <label class="col-sm-3 control-label">Foto NPWP</label>
                <div class="col-sm-9">
                  <input id="input-2" name="path_npwp" type="file" class="file" data-show-upload="false" data-show-caption="true">
                  <span class="help-block">
                    <strong>Jpg, max 300kb</strong>
                      <strong>{{ $errors->first('path_npwp') }}</strong>
                    </span>
                </div>
              </div>

              <div class="form-group {{ $errors->has('telp') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Telepon *</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="telp" placeholder="Telepon" value="{{old('telp')}}" required/>
                  <span class="help-block">
                      <strong>{{ $errors->first('telp') }}</strong>
                    </span>
                </div>
              </div>

              <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Email *</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="email" placeholder="Email" value="{{old('email')}}" required/>
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                </div>
              </div>

              <div class="form-group {{ $errors->has('badan_hukum') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Badan Hukum</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="badan_hukum" placeholder="Badan Hukum" value="{{old('badan_hukum')}}"/>
                  <span class="help-block">
                      <strong>{{ $errors->first('badan_hukum') }}</strong>
                    </span>
                </div>
              </div>

              <div class="form-group {{ $errors->has('tahun_mulai') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Tahun Mulai Usaha *</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="tahun_mulai" placeholder="Tahun Mulai" value="{{old('tahun_mulai')}}" required/>
                  <span class="help-block">
                      <strong>{{ $errors->first('tahun_mulai') }}</strong>
                    </span>
                </div>
              </div>

              <div class="form-group {{ $errors->has('skala_usaha') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Skala Usaha *</label>
                <div class="col-sm-9 select2-warning">
                  <select class="form-control" data-plugin="select2" name="skala_usaha" required>
                    @foreach(skala_usaha() as $row)
                      <option value="{{$row}}">{{$row}}</option>
                    @endforeach
                  </select>
                  <span class="help-block">
                      <strong>{{ $errors->first('skala_usaha') }}</strong>
                    </span>
                </div>
              </div>
              <div class="form-group {{ $errors->has('bidang_usaha_id') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Bidang Usaha *</label>
                <div class="col-sm-9 select2-warning">
                  <select class="form-control" data-plugin="select2" name="bidang_usaha_id" required>
                    @foreach($bidang_usaha as $row)
                      <option value="{{$row->id}}">{{$row->nama}}</option>
                    @endforeach
                  </select>
                  <span class="help-block">
                      <strong>{{ $errors->first('bidang_usaha_id') }}</strong>
                    </span>
                </div>
              </div>

              <div class="form-group {{ $errors->has('produk') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Produk</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="produk" placeholder="Produk.." value="{{old('produk')}}" />
                  <span class="help-block">
                      <strong>{{ $errors->first('produk') }}</strong>
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
              <div class="form-group {{ $errors->has('twitter') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Twitter</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="twitter" placeholder="Twitter" value="{{old('twitter')}}" />
                  <span class="help-block">
                      <strong>{{ $errors->first('twitter') }}</strong>
                    </span>
                </div>
              </div>
              <div class="form-group {{ $errors->has('whatsapp') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">WhatsApp</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="whatsapp" placeholder="WhatsApp" value="{{old('whatsapp')}}" />
                  <span class="help-block">
                      <strong>{{ $errors->first('whatsapp') }}</strong>
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
                <label class="col-sm-3 control-label">Online *</label>
                <div class="radio-custom radio-default radio-inline">
                  <input type="radio" id="inputBasicMale" name="online" value="Ya" {{old('online')=='Ya'?'checked':''}} required/>
                  <label for="inputBasicMale">Ya</label>
                </div>
                <div class="radio-custom radio-default radio-inline">
                  <input type="radio" id="inputBasicFemale" name="online" value="Tidak" {{old('online')=='Tidak'?'checked':''}} required/>
                  <label for="inputBasicFemale">Tidak</label>
                </div>
              </div>
              <div class="form-group {{ $errors->has('sentra_umkm') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Sentra UMKM*</label>
                <div class="radio-custom radio-default radio-inline">
                  <input type="radio" id="inputBasicMale" name="sentra_umkm" value="Ya" {{old('sentra_umkm')=='Ya'?'checked':''}} required/>
                  <label for="inputBasicMale">Ya</label>
                </div>
                <div class="radio-custom radio-default radio-inline">
                  <input type="radio" id="inputBasicFemale" name="sentra_umkm" value="Tidak" {{old('sentra_umkm')=='Tidak'?'checked':''}} required/>
                  <label for="inputBasicFemale">Tidak</label>
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

  <input type="hidden" id="urlkec" value="{{url('filter')}}">
  <input type="hidden" id="oldkec" value="{{old('kecamatan_id')}}">

@endsection

@section('js')
  <script>
      var urlkec  = $('#urlkec').val();
      var valkab = $('#kabkota').val();
      var oldkec = $("#oldkec").val();

      if(valkab != '')
      {
          kecamatan_ajax(urlkec,valkab,oldkec);
      }
    $(document).ready(function () {
//        $('.rupiah').priceFormat({
//            prefix: 'Rp. ',
//            centsSeparator: ',',
//            thousandsSeparator: '.'
//        });


        $('#kabkota').change(function () {
            kecamatan_ajax(urlkec,this.value,oldkec);
        })
    })

    function kecamatan_ajax(urlkec,id,old) {
        $.ajax({
            url : urlkec+'/'+id+'/kecamatan/'+old,
            type : 'GET',
        })
            .success(function (response) {
                $('#kecamatan').html(response);
            })
    }
  </script>
  @endsection
