@extends('layouts.apps.master')

@section('content')
    <!-- Page -->
  <div class="page">
    <div class="page-content">
      <div class="col-md-12">
          <!-- Panel Standard Mode -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Standard Mode</h3>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" method="post" action="{{route('bidang-usaha.edit')}}">
              <input type="hided" name="_method" value="PUT">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Full name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="standard_fullName" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="standard_email" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Content</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="standard_content" rows="5"></textarea>
                  </div>
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary" id="validateButton2">Submit</button>
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