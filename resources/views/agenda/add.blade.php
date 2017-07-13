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
              <h3 class="panel-title"><i class="con wb-plus"></i> Agenda</h3>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" method="post" action="{{route('agenda.store')}}" enctype="multipart/form-data">
                {{ csrf_field()}}
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                <div class="form-group {{ $errors->has('judul') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Judul*</label>
                  <div class="col-sm-9">
                    <input type="text" name="judul" class="form-control" value="{{old('judul')}}" placeholder="Judul agenda" required>
                    <span class="help-block">
                      <strong>{{ $errors->first('judul') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Deskripsi *</label>
                  <div class="col-sm-9">
                    <textarea name="deskripsi" class="form-control" placeholder="Deskripsi" required>{{old('deskripsi')}}</textarea>
                    <span class="help-block">
                      <strong>{{ $errors->first('deskripsi') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('keterangan') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Keterangan</label>
                  <div class="col-sm-9">
                    <textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="5">{{old('keterangan')}}</textarea>
                    <span class="help-block">
                      <strong>{{ $errors->first('keterangan') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('lokasi') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Lokasi*</label>
                  <div class="col-sm-9">
                    <select name="lokasi" class="form-control" data-plugin="select2" required="">
                      <option value="">Pilih Kabupaten/Kota</option>
                      @foreach($kabkota as $row)
                      <option value="{{$row->name}}">{{$row->name}}</option>
                      @endforeach
                    </select>
                    <span class="help-block">
                      <strong>{{ $errors->first('keterangan') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('lokasi') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Tanggal*</label>
                  <div class="col-sm-9">
                    <div class="input-daterange" data-plugin="datepicker" data-date-format="yyyy-mm-dd">
                          <div class="input-group">
                            <span class="input-group-addon">
                              <i class="icon wb-calendar" aria-hidden="true"></i>
                            </span>
                            <input type="text" class="form-control" name="tanggal_mulai" required/>
                          </div>
                          <div class="input-group">
                            <span class="input-group-addon">to</span>
                            <input type="text" class="form-control" name="tanggal_selesai" />
                          </div>
                      </div>

                      <span class="help-block">
                        <strong>{{ $errors->first('keterangan') }}</strong>
                      </span>                    
                  </div>
                </div>

                <div class="form-group {{ $errors->has('jam_mulai') ? ' has-error' : '' }} {{ $errors->has('jam_selesai') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Waktu</label>
                  <div class="col-sm-9">
                    <div class="input-daterange">
                        <div class="input-group">
                            <span class="input-group-addon">
                              <i class="icon wb-time" aria-hidden="true"></i>
                            </span>
                            <input type="text" class="form-control" name="jam_mulai" data-plugin="clockpicker" data-autoclose="true"/>
                        </div>
                        <div class="input-group">
                          <span class="input-group-addon">to</span>
                          <input type="text" class="form-control" name="jam_selesai" data-plugin="clockpicker" data-autoclose="true"/>
                        </div>
                      </div>
                    <span class="help-block">
                      <strong>{{ $errors->first('jam_mulai') }}</strong>
                      <strong>{{ $errors->first('jam_selesai') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Gambar</label>
                  <div class="col-sm-9">
                    <input type="file" name="image" id="input-1" class="file" data-show-upload="false" data-show-caption="true">
                    <span class="help-block">
                      <strong>{{ $errors->first('image') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group ">
                  <label class="col-sm-3 control-label">Status</label>
                  <div class="col-sm-9">
                    <div class="pull-left margin-right-20">
                      <input type="checkbox" id="inputBasicOn" name="status" data-plugin="switchery" value="1" checked/>
                    </div>
                    <label class="padding-top-3" for="inputBasicOn">Publish</label>
                  </div>
                </div>

                <div class="text-right">
                  <button type="submit" class="btn btn-primary" id="validateButton2">Simpan</button>
                  <a href="{{route('agenda.index')}}" class="btn btn-warning">Cancel</a>
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

@section('css')
{{Html::style('remark/assets/vendor/clockpicker/clockpicker.css')}}
{{Html::style('remark/assets/vendor/bootstrap-datepicker/bootstrap-datepicker.css')}}
@endsection

@section('js')
{{Html::script(asset('remark/assets/vendor/clockpicker/bootstrap-clockpicker.min.js'))}}
{{Html::script(asset('remark/assets/js/components/clockpicker.js'))}}

{{Html::script(asset('remark/assets/vendor/bootstrap-datepicker/bootstrap-datepicker.js'))}}
    {{Html::script(asset('remark/assets/js/components/bootstrap-datepicker.js'))}}
@endsection
