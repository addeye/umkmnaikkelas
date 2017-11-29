@extends('layouts.portal.master')

@section('content')
<!-- Page -->
<div class="container-fluid">
    <div class="page-header">
        <h1 class="page-title">
            Event
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/')}}">
                    Home
                </a>
            </li>
            <li class="active">
                {{$data->title}}
            </li>
        </ol>
    </div>
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <!-- Panel Standard Mode -->
                <div class="panel" id="chat">
            <div class="panel-heading">
              <h3 class="panel-title">
                <i class="icon wb-chat-text" aria-hidden="true"></i> {{$data->title}}
              </h3>
              <div class="panel-actions">
                @if (Auth::user()->role_id==ROLE_UMKM)
                  <a href="{{ route('event.show_akun_umkm',['id'=>$data->id]) }}" class="btn btn-default"><i class="icon wb-chevron-left"></i> Kembali</a>
                @else
                  <a href="{{ route('event.show_akun',['id'=>$data->id]) }}" class="btn btn-default"><i class="icon wb-chevron-left"></i> Kembali</a>
                @endif
              </div>
            </div>
            <div class="panel-body">
              <div class="height-300" data-plugin="scrollable">
                    <div data-role="container">
                      <div data-role="content">
                        <input id="event_id" type="hidden" value="{{$data->id}}">
                                    <input id="event_follower_id" type="hidden" value="{{$check_follow->id}}">
                                    <chat-messages-event :messages="messages"></chat-messages-event>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="panel-footer">
                                        <chat-form-event
                                            v-on:messagesentevent="addMessage"
                                        ></chat-form-event>
                                    </div>
          </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page -->
<script src="{{ asset('js/app.js') }}"></script>
@endsection

@section('js')

@endsection


