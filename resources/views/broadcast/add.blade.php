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
              <h3 class="panel-title"><i class="con wb-plus"></i> Broadcast Email</h3>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" method="post" action="{{route('broadcast.store')}}" enctype="multipart/form-data">
                {{ csrf_field()}}
                <div class="form-group {{ $errors->has('subject') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Subject*</label>
                  <div class="col-sm-9">
                    <input type="text" name="subject" class="form-control" value="{{old('judul')}}" placeholder="subject email" required>
                    <span class="help-block">
                      <strong>{{ $errors->first('subject') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('role_level') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Level*</label>
                  <div class="col-sm-9">
                    <select name="role_level" class="form-control" id="">
                      <option value="Pendamping">Pendamping</option>
                      <option value="Umkm">UMKM</option>
                    </select>
                    <span class="help-block">
                      <strong>{{ $errors->first('role_level') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Keterangan</label>
                  <div class="col-sm-9">
                    <textarea name="content" class="form-control" data-plugin="summernote" data-plugin-options='{"toolbar":[["style", ["bold", "italic", "underline", "clear"]],["color", ["color"]],["para", ["ul", "ol", "paragraph"]]]}' placeholder="Isi Halaman" rows="5">{{old('content')}}</textarea>
                    <span class="help-block">
                      <strong>{{ $errors->first('content') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="text-right">
                  <button type="submit" class="btn btn-primary" id="validateButton2">Simpan</button>
                  <a href="{{route('broadcast.index')}}" class="btn btn-warning">Cancel</a>
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