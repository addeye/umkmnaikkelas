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
              <h3 class="panel-title"><i class="con wb-plus"></i> Tambah Info UMKM</h3>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" method="post" action="{{route('info-terkini.store')}}">
                {{ csrf_field()}}
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="level" value="Umkm">
                <div class="form-group {{ $errors->has('keterangan') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Keterangan</label>
                  <div class="col-sm-9">
                    <textarea data-plugin="summernote" data-plugin-options='{"toolbar":[["style", ["bold", "italic", "underline", "clear"]],["color", ["color"]],["para", ["ul", "ol", "paragraph"]]]}' name="keterangan" class="form-control">{{old('keterangan')}}</textarea>
                    <span class="help-block">
                      <strong>{{ $errors->first('keterangan') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group ">
                  <label class="col-sm-3 control-label">Publish Info </label>
                  <div class="col-sm-9">
                    <input type="checkbox" name="publish" value="Ya" checked>
                  </div>
                </div>

                <div class="text-right">
                  <button type="submit" class="btn btn-primary" id="validateButton2">Simpan</button>
                  <a href="{{route('info.umkm')}}" class="btn btn-warning">Cancel</a>
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
{{Html::style('remark/assets/vendor/summernote/summernote.css')}}
{{Html::style('remark/assets/css/../fonts/font-awesome/font-awesome.css')}}
@endsection

@section('js')
{{Html::script(asset('remark/assets/vendor/summernote/summernote.min.js'))}}
{{Html::script(asset('remark/assets/js/components/summernote.js'))}}
@endsection
