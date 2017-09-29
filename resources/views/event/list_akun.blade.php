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
                Semua Event
            </li>
        </ol>
    </div>
    <div class="page-content animsition">
        <div class="row">
            <div class="col-md-12">
                <!-- Panel Standard Mode -->
                @if (count($event) > 0)
                @foreach ($event as $key=>$row)
                    <div class="alert alert-alt alert-warning">
                        <div class="media media">
                    <div class="media-left">
                      <a href="javascript:void(0)">
                        <img class="media-object" src="{{ asset('uploads/event/'.$row->image) }}" alt="...">
                      </a>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading">{{$row->title}}</h4>
                      {{$row->description}}
                      <p><i class="icon wb-users"></i> Quota Peserta : {{$row->quota}}</p>
                      <p><i class="icon wb-map"></i> Lokasi : {{$row->city}}</p>
                      <p class="margin-top-10">
                        <a href="{{ route('event.show_akun',['id'=>$row->id]) }}" data-toggle="tooltip" data-original-title="Selengkapnya"><i class="icon wb-dropright"></i> Selengkapnya</a>
                        @if(!in_array($row->id, $event_id->toArray()))
                        <a onclick="event.preventDefault(); ConfirmDelete({{$row->id}});" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Ikut Event"><i class="icon wb-bookmark" aria-hidden="true"></i> Ikut Event</a>
                        <form id="delete-form-{{$row->id}}" action="{{route('event.follower',['id'=>$row->id])}}" method="POST" style="display: none;">{{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        </form>
                            @else
                            <a href="javascript:void" style="color: red;"><i class="icon wb-bookmark"></i> Mengikuti</a>
                        @endif


                      </p>
                      <p class="text-right"><i class="icon wb-user-add"></i> Telah Diikuti : {{count($row->event_follower)}}</p>
                    </div>
                  </div>
                    </div>
                @endforeach

            @endif>
                <!-- End Panel Standard Mode -->
            </div>
        </div>
    </div>
</div>
<!-- End Page -->
@endsection

