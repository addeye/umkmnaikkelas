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
            <h1 class="page-title">Layanan</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{route('informasi-pasar.index')}}">Infromasi Pasar</a></li>
                <li class="active">{{$data->judul}}</li>
            </ol>
        </div>

        <div class="page-content animsition">
            <div class="row">
                <div class="col-md-9">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="media media-lg">
                                        <div class="media-left">
                                            <a class="avatar" href="javascript:void(0)">
                                                <img class="img-responsive" src="{{asset('uploads/user/images/'.$data->user->image)}}" alt="...">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"><span>{{$data->user->name}}</span>
                                            </h4>
                                            <small>{{$data->created_at}}</small>
                                            <div class="profile-brief">
                                                <div class="media">
                                                    <a class="media-left">
                                                        <img class="media-object" src="{{asset('uploads/informasi_pasar/'.$data->image)}}" alt="...">
                                                    </a>
                                                    <div class="media-body padding-left-20">
                                                        <h4 class="media-heading">{{$data->judul}}</h4>
                                                        <p>{{$data->keterangan}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="list-group list-group-dividered list-group-full">
                                            @foreach($data->comment as $row)
                                            <li class="list-group-item padding-left-50">
                                                <div class="media comment">
                                                    <div class="media-left">
                                                        <a class="avatar avatar-online" href="javascript:void(0)">
                                                            <img src="{{asset('uploads/user/images/'.$row->user->image)}}" alt="...">
                                                            <i></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body comment-body">
                                                        <a class="comment-author">{{$row->user->name}}</a>
                                                        <div class="comment-meta">
                                                            <span class="date">{{$row->textdate}}</span>
                                                        </div>
                                                        <div class="comment-content">
                                                            <p>{{$row->komentar}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <form method="post" action="{{route('informasi-comment.store')}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="informasi_pasar_id" value="{{$data->id}}">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <textarea class="form-control" name="komentar" placeholder="Tulis komentar anda.." rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12 text-right">
                                                    <button class="btn btn-primary">Kirim</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
