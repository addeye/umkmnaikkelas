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
                <div class="col-md-12">
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

                                                <div class="media media-lg">
                                                    <div class="media-left">
                                                        <img class="media-object" src="{{asset('remark/assets/photos/placeholder.png')}}" alt="...">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="avatar avatar-sm pull-left margin-right-10 margin-top-5 tooltip-success" data-toggle="tooltip"
                                                             data-placement="top" data-original-title="Mokhamad Ariadi" title="">
                                                            <img src="{{asset('remark/assets/portraits/3.jpg')}}" alt="">
                                                        </div>
                                                        <a href="javascript:void(0)">
                                                            <h4 class="media-heading">Media Heading</h4>
                                                        </a>
                                                        <p class="widget-metas">Jan 16, 2015</p>
                                                        Filio levitatibus graecos discenda videntur, falli instituendarum vester dedocendi
                                                        partus quis videri honoris. Maximeque splendore sint dixit
                                                        Tantopere praeclarorum nimis.
                                                    </div>
                                                    <div class="widget-actions pull-right">
                                                        <a href="javascript:void(0)">
                                                            <i class="icon fa-clock-o"></i>
                                                            <span>27/01/2017 03:00</span>
                                                        </a>
                                                        <a href="javascript:void(0)">
                                                            <i class="icon fa-map-marker"></i>
                                                            <span>Kota Surabaya</span>
                                                        </a>
                                                        <a href="javascript:void(0)">
                                                            <i class="icon wb-users"></i>
                                                            <span>253 Peserta</span>
                                                        </a>
                                                    </div>
                                                </div>

                                    {{--</ul>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
