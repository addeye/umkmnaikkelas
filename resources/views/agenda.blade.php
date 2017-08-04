<?php
/**
 * Created by PhpStorm.
 * User: deye
 * Date: 6/15/17
 * Time: 1:13 PM
 */
?>
@extends('layouts.portal.master')

@section('content')
    <!-- Page -->
    <div class="container-fluid">
        <div class="page-content animsition">
            <div class="row">
                <div class="col-md-9">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Agenda
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control sSearch" placeholder="Cari keyword tertentu...">
                                            <span class="input-group-btn">
                                                <button type="button" id="inpSearch" class="btn btn-primary"><i class="icon wb-search" aria-hidden="true"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    {{--<ul class="list-group list-group-dividered list-group-full">--}}
                                    @foreach($data as $row)
                                                <div class="media media-lg">
                                                    <div class="media-left">
                                                    @if($row->image)
                                                    <img class="media-object" src="{{asset('uploads/agenda/'.$row->image)}}" alt="...">
                                                    @else
                                                        <img class="media-object" src="{{asset('remark/assets/photos/placeholder.png')}}" alt="...">
                                                    @endif
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="avatar avatar-sm pull-left margin-right-10 margin-top-5 tooltip-success" data-toggle="tooltip"
                                                             data-placement="top" data-original-title="{{$row->user->name}}" title="">
                                                             @if($row->user->image)
                                                             <img src="{{asset('uploads/user/images/'.$row->user->image)}}" alt="">
                                                             @else
                                                            <img src="{{asset('remark/assets/portraits/3.jpg')}}" alt="">
                                                            @endif
                                                        </div>
                                                        <a href="{{route('layanan.detail.agenda',['judul'=>$row->judul])}}">
                                                            <h4 class="media-heading">{{$row->judul}}</h4>
                                                        </a>
                                                        <p class="widget-metas">{{$row->textdate}}</p>
                                                        {{$row->deskripsi}}
                                                    </div>
                                                    <div class="widget-actions pull-right">
                                                        <a href="javascript:void(0)">
                                                            <i class="icon fa-clock-o"></i>
                                                            <span>{{$row->tanggal_mulai.' '.$row->jam_mulai}} </span>
                                                        </a>
                                                        <a href="javascript:void(0)">
                                                            <i class="icon fa-map-marker"></i>
                                                            <span>{{$row->lokasi}}</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <hr>
                                                @endforeach

                                    {{--</ul>--}}
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
@endsection
