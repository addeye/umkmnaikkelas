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

        <div class="page-header">
            <h1 class="page-title">Layanan</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class="active">Informasi Pasar</li>
            </ol>
        </div>

        <div class="page-content animsition">
            <div class="row">
                <div class="col-md-9">
                    <div class="panel">
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
                                    @foreach($data as $row)
                                    <div class="media media-lg">
                                        <div class="media-left">
                                            <img class="media-object" src="{{asset('uploads/informasi_pasar/'.$row->image)}}" alt="...">
                                        </div>
                                        <div class="media-body">
                                            <div class="avatar avatar-sm pull-left margin-right-10 margin-top-5 tooltip-success" data-toggle="tooltip"
                                                 data-placement="top" data-original-title="{{$row->user->name}}" title="">
                                                <img src="{{asset('uploads/user/images/'.$row->user->image)}}" alt="">
                                            </div>
                                            <a href="{{route('informasi-pasar.show',['id'=>$row->id])}}">
                                                <h4 class="media-heading">{{$row->judul}}</h4>
                                            </a>
                                            <p class="widget-metas">{{$row->created_at}}</p>
                                            {!! $row->keterangan !!}
                                        </div>
                                        <div class="widget-actions pull-right">
                                            <a href="javascript:void(0)">
                                                <i class="icon fa-clock-o"></i>
                                                <span>{{$row->textdate}}</span>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <i class="icon fa-comment"></i>
                                                <span>{{$row->comment->count()}}</span>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
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
                                        <a href="{{route('informasi-pasar.create')}}" class="btn btn-info col-md-12">Tambahkan Informasi</a>
                                    </div>
                                </div>
                                <div class="col-md-12 row">
                                    <div class="nav-tabs-horizontal">
                                        <ul class="nav nav-tabs" data-plugin="nav-tabs" role="tablist">
                                            <li class="active" role="presentation">
                                                <a data-toggle="tab" href="#tabPopular" aria-controls="tabPopular" role="tab">Popular</a>
                                            </li>
                                            <li role="presentation">
                                                <a data-toggle="tab" href="#tabRecent" aria-controls="tabRecent" role="tab">Recent</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content padding-top-20">
                                            <div class="tab-pane active" id="tabPopular" role="tabpanel">

                                            </div>
                                            <div class="tab-pane" id="tabRecent" role="tabpanel">
                                                @foreach($recent as $row)
                                                <div class="media media-xs">
                                                    <div class="media-left">
                                                        <img class="media-object" src="{{asset('uploads/informasi_pasar/'.$row->image)}}" alt="...">
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="{{route('informasi-pasar.show',['id'=>$row->id])}}">
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
@endsection
