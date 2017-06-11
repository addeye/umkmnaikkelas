@extends('layouts.portal.master')

@section('content')
    <!-- Page -->
    <div class="container-fluid">
        <div class="page-content animsition">
            <div class="row">
                <div class="col-md-12">
                    <!-- Panel Standard Mode -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Profile</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{asset('uploads/user/images/'.$data->image)}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Panel Standard Mode -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Page -->

@endsection
