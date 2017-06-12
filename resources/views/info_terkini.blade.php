<?php
/**
 * Created by PhpStorm.
 * User: deye
 * Date: 6/12/17
 * Time: 3:16 PM
 */
?>

@extends('layouts.portal.master')

@section('content')
    <!-- Page -->
    <div class="container-fluid">
        <div class="page-content animsition">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Info Terkini
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="" placeholder="Cari keyword tertentu...">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-primary"><i class="icon wb-search" aria-hidden="true"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <ul class="list-group list-group-dividered list-group-full">
                                        @if(count($info_terkini))
                                            @foreach($info_terkini as $row)
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a class="avatar avatar-online" href="javascript:void(0)">
                                                                <img src="{{asset('remark/assets/portraits/16.jpg')}}" alt="...">
                                                                <i></i>
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <small class="text-muted pull-right">{{$row->created_at}}</small>
                                                            <h4 class="media-heading">{{$row->user->name}}</h4>
                                                            <div>{{$row->keterangan}}</div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @else
                                            <h3>Belum Ada Info</h3>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection