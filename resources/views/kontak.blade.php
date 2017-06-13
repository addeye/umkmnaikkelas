<?php
/**
 * Created by PhpStorm.
 * User: deye
 * Date: 6/13/17
 * Time: 1:24 PM
 */
?>
@extends('layouts.portal.master')

@section('css')
    <!-- Plugin -->
    {{Html::style('remark/assets/vendor/formvalidation/formValidation.css')}}
@endsection

@section('content')
    <!-- Page -->
    <div class="container-fluid">
        <div class="page-content animsition">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Hubungi Kami
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <form id="exampleStandardForm" method="post" action="{{route('layanan.kirim.kontak')}}">
                                        {{ csrf_field() }}
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="inputBasicFirstName">Nama *</label>
                                                <input type="text" class="form-control" id="inputBasicFirstName" name="nama" placeholder="Nama anda.." autocomplete="off">
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="control-label" for="inputBasicLastName">Email *</label>
                                                <input type="text" class="form-control" id="inputBasicLastName" name="email" placeholder="Email anda.." autocomplete="off">
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="control-label" for="inputBasicLastName">No Hp *</label>
                                                <input type="text" class="form-control" id="inputBasicLastName" name="telp" placeholder="No Telp.." autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label class="control-label" for="inputBasicLastName">Judul *</label>
                                                <input type="text" class="form-control" id="inputBasicLastName" name="judul" placeholder="Judul.." autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label class="control-label" for="inputBasicLastName">Pesan *</label>
                                                <textarea class="form-control" name="pesan" rows="5" placeholder="Pesan anda.."></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <button type="submit" id="validateButton2" class="btn btn-primary">Kirim</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <div>
                                        <h4><i class="icon wb-map"></i> Alamat</h4>
                                        <p><a href="https://goo.gl/maps/9bzrrHpszYk" target="_blank">Jl. Manyar Indah VIII No.6, <br>Menur Pumpungan, Sukolilo, Surabaya, <br>Jawa Timur 60118, Indonesia</a></p>
                                        <h4><i class="icon fa-phone"></i> Telepon</h4>
                                        <p>+62 31 5994015</p>
                                        <h4><i class="icon fa-globe"></i> Website</h4>
                                        <p><a href="https://peacbromo.co.id" target="_blank">peacbromo.co.id</a></p>
                                        <h4><i class="icon fa-facebook"></i> Facebook</h4>
                                        <p><a href="https://www.facebook.com/www.peacbromo.co.id" target="_blank">@www.peacbromo.co.id</a></p>
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
@section('js')
    {{Html::script(asset('remark/assets/vendor/formvalidation/formValidation.min.js'))}}
    {{Html::script(asset('remark/assets/vendor/formvalidation/framework/bootstrap.min.js'))}}

    <script type="text/javascript">
        // Example Validataion Standard Mode
        // ---------------------------------
        (function() {
            $('#exampleStandardForm').formValidation({
                framework: "bootstrap",
                button: {
                    selector: '#validateButton2',
                    disabled: 'disabled'
                },
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    nama: {
                        validators: {
                            notEmpty: {
                                message: 'Isi dengan benar'
                            }
                        }
                    },
                    pesan: {
                        validators: {
                            notEmpty: {
                                message: 'Isi dengan benar'
                            }
                        }
                    },
                    judul: {
                        validators: {
                            notEmpty: {
                                message: 'Isi dengan benar'
                            }
                        }
                    },
                    telp: {
                        validators: {
                            notEmpty: {
                                message: 'Isi dengan benar'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Email tidak boleh kosong'
                            },
                            emailAddress: {
                                message: 'Alamat email anda salah'
                            }
                        }
                    }
                }
            });
        })();
    </script>
@endsection