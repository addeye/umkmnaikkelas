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
                    @include('agenda_sub',['recent'=>$recent])
                </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
