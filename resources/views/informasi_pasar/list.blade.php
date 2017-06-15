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
                                Infromasi Pasar
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
                                                <span>1 menit lalu</span>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <i class="icon fa-comment"></i>
                                                <span>253</span>
                                            </a>
                                        </div>
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
                                                <div class="media media-xs">
                                                    <div class="media-left">
                                                        <img class="media-object" src="{{asset('remark/assets/photos/placeholder.png')}}" alt="...">
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="javascript:void(0)">
                                                            <h4 class="media-heading">Media Heading</h4>
                                                        </a>
                                                        <p class="widget-metas">Jan 16, 2015</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tabRecent" role="tabpanel">
                                                Negant parvos fructu nostram mutans supplicii ac dissentias, maius tibi licebit
                                                ruinae philosophia. Salutatus repellere titillaret expetendum
                                                ipsi. Cupiditates intellegam exercitumque privatio concederetur,
                                                sempiternum, verbis malint dissensio nullas noctesque earumque.
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
