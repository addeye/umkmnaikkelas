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
        <div class="page-header animsition">
            <h1 class="page-title">Layanan</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class="active">Info Pendamping</li>
            </ol>
        </div>

        <div class="page-content animsition">
            <div class="row">
                <div class="col-md-12">
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
                                    <ul class="list-group list-group-dividered list-group-full">
                                        @if(count($info_terkini))
                                            @foreach($info_terkini as $row)
                                                <li class="list-group-item contact-name">
                                                    <div class="media">
                                                        <div class="media-body">
                                                            <div>
                                                                <span class="icon fa-bullhorn">
                                                                </span>
                                                                {{$row->textdate}}
                                                            </div>
                                                            {!! $row->keterangan !!}
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

@section('js')
    <script>
        jQuery.expr[':'].Contains = function(a, i, m) {
            return jQuery(a).text().toUpperCase()
                .indexOf(m[3].toUpperCase()) >= 0;
        };
        jQuery.expr[':'].contains = function(a, i, m) {
            return jQuery(a).text().toUpperCase()
                .indexOf(m[3].toUpperCase()) >= 0;
        };

        $('.sSearch').keyup(function(){
            $('.contact-name').hide();
            var txt = $('.sSearch').val();
            $('.contact-name').each(function(){
                if($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1){
                    $(this).show();
                }
            });
        });
    </script>
    @endsection