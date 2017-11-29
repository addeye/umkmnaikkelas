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
              <h3 class="panel-title"><i class="con wb-plus"></i> Event</h3>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" method="post" action="{{route('event.store')}}" enctype="multipart/form-data">
                {{ csrf_field()}}

                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Judul*</label>
                  <div class="col-sm-9">
                    <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="Judul agenda" required>
                    <span class="help-block">
                      <strong>{{ $errors->first('title') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Deskripsi *</label>
                  <div class="col-sm-9">
                    <textarea name="description" class="form-control" placeholder="Deskripsi singkat.." required>{{old('description')}}</textarea>
                    <span class="help-block">
                      <strong>{{ $errors->first('description') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Keterangan</label>
                  <div class="col-sm-9">
                    <textarea name="content" class="form-control" data-plugin="summernote" data-plugin-options='{"toolbar":[["style", ["bold", "italic", "underline", "clear"]],["color", ["color"]],["para", ["ul", "ol", "paragraph"]]]}' placeholder="Keterangan" rows="5">{{old('content')}}</textarea>
                    <span class="help-block">
                      <strong>{{ $errors->first('content') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Lokasi*</label>
                  <div class="col-sm-9">
                    <select name="city" class="form-control" data-plugin="select2" required>
                      <option value="">Pilih Kabupaten/Kota</option>
                      @foreach($kabkota as $row)
                      <option value="{{$row->name}}">{{$row->name}}</option>
                      @endforeach
                    </select>
                    <span class="help-block">
                      <strong>{{ $errors->first('city') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Alamat *</label>
                  <div class="col-sm-9">
                    <textarea name="alamat" class="form-control" placeholder="Alamat.." required>{{old('alamat')}}</textarea>
                    <span class="help-block">
                      <strong>{{ $errors->first('alamat') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('start_date') ? ' has-error' : '' }} {{ $errors->has('end_date') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Tanggal*</label>
                  <div class="col-sm-9">
                    <div class="input-daterange" data-plugin="datepicker" data-date-format="yyyy-mm-dd">
                          <div class="input-group">
                            <span class="input-group-addon">
                              <i class="icon wb-calendar" aria-hidden="true"></i>
                            </span>
                            <input type="text" class="form-control" name="start_date" value="{{old('start_date')}}" required/>
                          </div>
                          <div class="input-group">
                            <span class="input-group-addon">to</span>
                            <input type="text" class="form-control" value="{{old('end_date')}}" name="end_date" />
                          </div>
                      </div>

                      <span class="help-block">
                        <strong>{{ $errors->first('start_date') }}</strong>
                        <strong>{{ $errors->first('end_date') }}</strong>
                      </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('start_time') ? ' has-error' : '' }} {{ $errors->has('end_time') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Waktu</label>
                  <div class="col-sm-9">
                    <div class="input-daterange">
                        <div class="input-group">
                            <span class="input-group-addon">
                              <i class="icon wb-time" aria-hidden="true"></i>
                            </span>
                            <input type="text" class="form-control" name="start_time" value="{{old('start_time')}}" data-plugin="clockpicker" data-autoclose="true"/>
                        </div>
                        <div class="input-group">
                          <span class="input-group-addon">to</span>
                          <input type="text" class="form-control" name="end_time" value="{{old('end_time')}}" data-plugin="clockpicker" data-autoclose="true"/>
                        </div>
                      </div>
                    <span class="help-block">
                      <strong>{{ $errors->first('start_time') }}</strong>
                      <strong>{{ $errors->first('end_time') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Gambar Poster</label>
                  <div class="col-sm-9">
                    <input type="file" name="image" id="input-1" class="file" data-show-upload="false" data-show-caption="true">
                    <span class="help-block">
                      <strong>{{ $errors->first('image') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group ">
                  <label class="col-sm-3 control-label">Publish</label>
                  <div class="col-sm-3">
                    <div class="pull-left margin-right-20">
                      <input type="checkbox" id="inputBasicOn" name="publish" data-plugin="switchery" value="Yes" checked/>
                    </div>
                  </div>
                  <label class="col-sm-3 control-label">Show Frontpage</label>
                  <div class="col-sm-3">
                    <div class="pull-left margin-right-20">
                      <input type="checkbox" id="show_front" name="show_front" data-plugin="switchery" value="Yes" checked/>
                    </div>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('quota') ? ' has-error' : '' }} {{ $errors->has('role_level') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Quota * / Level</label>
                  <div class="col-md-9 row">
                    <div class="col-sm-3">
                    <input type="text" name="quota" class="form-control" value="{{old('quota')}}" placeholder="Jumlah" required>
                    <span class="help-block">
                      <strong>{{ $errors->first('quota') }}</strong>
                    </span>
                  </div>
                  <div class="col-sm-9">
                    <select name="role_level" class="form-control">
                      <option value="Semua">Semua</option>
                      <option value="Pendamping">Pendamping</option>
                      <option value="Umkm">Umkm</option>
                    </select>
                    <span class="help-block">
                      <strong>{{ $errors->first('role_level') }}</strong>
                    </span>
                  </div>
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
{{Html::style('remark/assets/vendor/summernote/summernote.css')}}
{{Html::style('remark/assets/css/../fonts/font-awesome/font-awesome.css')}}
@endsection

@section('js')
{{Html::script(asset('remark/assets/vendor/clockpicker/bootstrap-clockpicker.min.js'))}}
{{Html::script(asset('remark/assets/js/components/clockpicker.js'))}}

{{Html::script(asset('remark/assets/vendor/bootstrap-datepicker/bootstrap-datepicker.js'))}}
    {{Html::script(asset('remark/assets/js/components/bootstrap-datepicker.js'))}}

    {{Html::script(asset('remark/assets/vendor/summernote/summernote.min.js'))}}
{{Html::script(asset('remark/assets/js/components/summernote.js'))}}
@endsection