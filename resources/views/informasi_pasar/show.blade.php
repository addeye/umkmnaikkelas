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
                <li class="active">Judulnya...</li>
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
                                                <img class="img-responsive" src="{{asset('remark/assets/portraits/5.jpg')}}" alt="...">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">Terrance Arnold
                                                <span>posted a new blog</span>
                                            </h4>
                                            <small>active 14 minutes ago</small>
                                            <div class="profile-brief">
                                                <div class="media">
                                                    <a class="media-left">
                                                        <img class="media-object" src="{{asset('remark/assets/photos/placeholder.png')}}" alt="...">
                                                    </a>
                                                    <div class="media-body padding-left-20">
                                                        <h4 class="media-heading">Getting Started</h4>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                            elit. Integer nec odio. Praesent libero. Sed
                                                            cursus ante dapibus diam. Sed nisi. Nulla quis
                                                            sem at nibh elementum imperdiet. Duis sagittis
                                                            ipsum. Praesent mauris.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="list-group list-group-dividered list-group-full">
                                            <li class="list-group-item padding-left-50">
                                                <div class="media comment">
                                                    <div class="media-left">
                                                        <a class="avatar avatar-online" href="javascript:void(0)">
                                                            <img src="{{asset('remark/assets/portraits/6.jpg')}}" alt="...">
                                                            <i></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body comment-body">
                                                        <a class="comment-author">Crystal Bates</a>
                                                        <div class="comment-meta">
                                                            <span class="date">Just now</span>
                                                        </div>
                                                        <div class="comment-content">
                                                            <p>Tantas earum numeris, scribi innumerabiles quietae clariora.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Tulis komen anda.." rows="3"></textarea>
                                            <button class="btn btn-primary">Kirim</button>
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
