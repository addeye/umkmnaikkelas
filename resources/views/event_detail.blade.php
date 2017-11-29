<?php
/**
 * Created by PhpStorm.
 * User: deye
 * Date: 6/16/17
 * Time: 4:51 PM
 */
?>
@extends('layouts.portal.master')
@section('content')
    <!-- Page -->
    <div class="container-fluid">

        <div class="page-header">
            <h1 class="page-title">Event</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{route('layanan.info.event')}}">Event</a></li>
                <li class="active">{{$data->title}}</li>
            </ol>
        </div>

        <div class="page-content animsition">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 padding-5 text-right">
                                    <h4>
                                        Waktu : {{$data->start_time}} - {{$data->end_time}}
                                    </h4>
                                </div>
                                <div class="col-md-8">
                                    <h4>
                                        {{$data->deskripsi}}
                                    </h4>
                                    <img class="img-responsive" src="{{asset('uploads/event/'.$data->image)}}">
                                        <hr>
                                            {!! $data->content !!}
                                        </hr>
                                    </img>
                                </div>
                                <div class="col-md-4">
                                    <p>
                                        <strong>
                                            Tanggal :
                                        </strong>
                                        {{$data->start_date}} - {{$data->end_date}}
                                    </p>
                                    <p>
                                        <strong>
                                            Waktu :
                                        </strong>
                                        {{$data->start_time}} - {{$data->end_time}}
                                    </p>
                                    <p>
                                        <strong>
                                            Lokasi :
                                        </strong>
                                        {{$data->city}}
                                    </p>
                                    <p>
                                        <strong>
                                            Alamat :
                                        </strong>
                                        {{$data->alamat}}
                                    </p>
                                    <h4>
                                        Info
                                    </h4>
                                    <label>
                                        Status :  {{$data->status}}
                                    </label>
                                    <p>
                                        Quota : {{$data->quota}}
                                    </p>
                                    <p>
                                        Kepada : {{$data->role_level}}
                                    </p>
                                    <h4>
                                        Deskripsi
                                    </h4>
                                    <p>
                                        {{$data->description}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
