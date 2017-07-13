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
            <h1 class="page-title">Agenda</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{route('layanan.info.agenda')}}">Agenda</a></li>
                <li class="active">{{$data->judul}}</li>
            </ol>
        </div>

        <div class="page-content animsition">
            <div class="row">
                <div class="col-md-9">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">                                
                                <div class="col-md-9">
                                    <h4>{{$data->deskripsi}}</h4>                                  
                                    <img src="{{asset('uploads/agenda/'.$data->image)}}" class="img-responsive">
                                    <hr>
                                    <p>
                                        {{$data->keterangan}}
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <h4 class="title">{{$data->user->name}}</h4>
                                    <p><strong>Tanggal : </strong><br>{{$data->tanggal_mulai}} - {{$data->tanggal_mulai}}</p>
                                    <p><strong>Waktu : </strong><br>{{$data->jam_mulai}} - {{$data->jam_selesai}}</p>
                                    <p><strong>Lokasi : </strong><br>{{$data->lokasi}}</p>                                    
                                    <h4>Info</h4>
                                    <label>Status : {{$data->status?'Publish':'Menunggu'}}</label>

                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 row padding-bottom-10">
                                    <div class="">
                                        <a href="javascript:void(0)" class="btn btn-info col-md-12">Ajukan Agenda</a>
                                    </div>
                                </div>
                                <div class="col-md-12 row">
                                    <div class="nav-tabs-horizontal">
                                        <ul class="nav nav-tabs" data-plugin="nav-tabs" role="tablist">
                                            <li class="" role="presentation">
                                                <a data-toggle="tab" href="#tabPopular" aria-controls="tabPopular" role="tab">Popular</a>
                                            </li>
                                            <li class="active" role="presentation">
                                                <a data-toggle="tab" href="#tabRecent" aria-controls="tabRecent" role="tab">Recent</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content padding-top-20">
                                            <div class="tab-pane " id="tabPopular" role="tabpanel">

                                            </div>
                                            <div class="tab-pane active" id="tabRecent" role="tabpanel">
                                                @foreach($recent as $row)
                                                    <div class="media media-xs">
                                                        <div class="media-left">
                                                            <img class="media-object" src="{{asset('uploads/agenda/'.$row->image)}}" alt="...">
                                                        </div>
                                                        <div class="media-body">
                                                            <a href="{{route('layanan.detail.agenda',['judul'=>$row->judul])}}">
                                                                <h5 class="media-heading">{{$row->judul}}</h5>
                                                            </a>
                                                            <p class="widget-metas">{{$row->textdate}}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
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
