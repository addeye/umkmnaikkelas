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
            <h1 class="page-title">Event</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class="active">Event</li>
            </ol>
        </div>
        <div class="page-content animsition">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Event
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
                                    @foreach ($data as $row)
                                        <div class="col-md-6 col-xs-12 masonry-item">
                                            <a href="{{ route('layanan.info.event_detail',['id'=>$row->id]) }}">
                                                <!-- Widget -->
                                      <div class="widget widget-cover cover">
                                        <img class="cover-image" src="{{ asset('uploads/event/'.$row->image) }}" alt="...">
                                        <span class="widget-time">{{date('d/m/Y',strtotime($row->start_date))}}</span>
                                        <div class="widget-category">{{$row->role_level}}</div>
                                        <h3 class="widget-title">{{$row->title}}</h3>
                                      </div>
                                      <!-- End Widget -->
                                            </a>
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
@endsection
