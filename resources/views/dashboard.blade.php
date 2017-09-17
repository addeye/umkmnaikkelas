@extends('layouts.portal.master')

    @section('css')
<!-- Plugin -->
{{Html::style('remark/assets/vendor/raty/jquery.raty.css')}}
    {{Html::style('remark/assets/css/pages/profile.css')}}
    @endsection

    @section('content')
<!-- Page -->
<div class="container-fluid page-profile">
    <div class="page-content animsition">
        <div class="row">
            @if(Auth::user()->role_id == ROLE_CALON)
            <div class="col-md-12">
                <div class="bg-warning well">
                    <strong>
                        Silahkan klik "Daftar Sebagai" Untuk melengkapi profil anda ! atau
                        <a data-target="#exampleModalWarning" data-toggle="modal" href="javascript:void(0)">
                            KLIK DISINI
                        </a>
                    </strong>
                </div>
            </div>
            @endif

            @if(Auth::user()->role_id == ROLE_PENDAMPING && Auth::user()->pendamping->validasi ==1)
            <div class="col-md-12">
                <div class="bg-info well">
                    <strong>
                        Terimakasih, Data pendamping anda akan divalidasi oleh admin. segera konfirmasi ke
                        <span style="color: yellow;">
                            umkmnaikkelas@gmail.com
                        </span>
                        atau
                        <span style="color: yellow;">
                            0812 3525 0065
                        </span>
                    </strong>
                </div>
            </div>
            @endif
            <div class="col-md-3">
                <!-- Page Widget -->
                <div class="widget widget-shadow text-center">
                    <div class="widget-header">
                        <div class="widget-header-content">
                            <a class="avatar avatar-lg" href="javascript:void(0)">
                                @if(!Auth::user()->image)
                                <img alt="..." src="{{asset('remark/assets/portraits/5.jpg')}}">
                                    @else
                                    <img alt="..." src="{{asset('uploads/user/images/'.Auth::user()->image)}}">
                                        @endif
                                    </img>
                                </img>
                            </a>
                            <div class="profile-user">
                                {{Auth::user()->name}}
                            </div>
                            <div class="example">
                                <div class="rating rating-lg" data-number="5" data-plugin="rating" data-read-only="true" data-score="2">
                                </div>
                            </div>
                            <div class="profile-job">
                                @if(Auth::user()->role_id == ROLE_CALON)
                                <i class="icon wb-pencil">
                                </i>
                                <a data-target="#exampleModalWarning" data-toggle="modal" href="javascript:void(0)">
                                    Daftar Sebagai
                                </a>
                                @elseif(Auth::user()->role_id == ROLE_PENDAMPING)
                                <label>
                                    Pendamping
                                </label>
                                @elseif(Auth::user()->role_id == ROLE_UMKM)
                                    UMKM
                                    @endif
                            </div>
                            <button class="btn btn-primary" id="btn-profil" type="button">
                                Lihat Profil
                            </button>
                        </div>
                    </div>
                    <div class="widget-footer">
                        @include('sub_content.widget_footer')
                    </div>
                </div>
                <!-- End Page Widget -->
            </div>
            <div class="col-md-9">
                <!-- Panel -->
                <div class="panel">
                    <div class="panel-body">
                        <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
                            <li class="active" role="presentation">
                                <a aria-controls="infoterkini" data-toggle="tab" href="#infoterkini" role="tab">
                                    Info Terkini
                                    <span class="badge badge-danger">
                                        {{count($info_terkini)}}
                                    </span>
                                </a>
                            </li>
                            <li role="presentation">
                                <a aria-controls="inforole" data-toggle="tab" href="#inforole" role="tab">
                                    @if(Auth::user()->role_id == ROLE_PENDAMPING)
                                    Info Pendamping
                                @elseif(Auth::user()->role_id == ROLE_UMKM)
                                    Info UMKM
                                @endif
                                </a>
                            </li>
                            <li role="presentation">
                                <a aria-controls="messages" data-toggle="tab" href="#messages" role="tab">
                                    Agenda
                                </a>
                            </li>
                            <li role="presentation">
                                <a aria-controls="order" data-toggle="tab" href="#order" role="tab">
                                    Order Konsultasi
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="infoterkini" role="tabpanel">
                                @include('sub_content.info_terkini')
                            </div>
                            <div class="tab-pane" id="inforole" role="tabpanel">
                                @if(Auth::user()->role_id == ROLE_PENDAMPING)
                                    @include('sub_content.info_pendamping')
                                @elseif(Auth::user()->role_id == ROLE_UMKM)
                                    @include('sub_content.info_umkm')
                                @endif
                            </div>
                            <div class="tab-pane" id="messages" role="tabpanel">
                                @include('sub_content.info_agenda')
                            </div>
                            <div class="tab-pane" id="order" role="tabpanel">
                                @include('sub_content.order_konsultasi')
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Panel -->
            </div>
        </div>
    </div>
</div>
<!-- End Page -->
<input id="url" type="hidden" value="{{route('profil.show')}}">
    @endsection

@section('modal')
    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="exampleModalWarning" class="modal fade modal-warning" id="exampleModalWarning" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">
                            ×
                        </span>
                    </button>
                    <h4 class="modal-title">
                        LINK PENDAFTARAN !
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="example-grid">
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    Silahkan klik di bawah ini untuk memilih mendaftar sebagai apa !
                                </p>
                            </div>
                            <div class="col-md-6">
                                <span class="">
                                    <div class="widget widget-radius widget-shadow">
                                        <a href="{{route('daftar.pendamping')}}">
                                            <div class="widget-header bg-green-600 padding-30 white text-center">
                                                <i aria-hidden="true" class="icon fa-user-secret" style="font-size: 57px; color: white;">
                                                </i>
                                                <h4 class="text-center white">
                                                    PENDAMPING
                                                </h4>
                                            </div>
                                        </a>
                                    </div>
                                </span>
                            </div>
                            <div class="col-md-6">
                                <div class="widget widget-radius widget-shadow">
                                    <a href="{{route('daftar.umkm')}}">
                                        <div class="widget-header bg-blue-600 padding-30 white text-center">
                                            <i aria-hidden="true" class="icon fa-money" style="font-size: 57px; color: white;">
                                            </i>
                                            <h4 class="text-center white">
                                                UMKM
                                            </h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="exampleModalWarning" class="modal fade modal-warning" id="ModalProfil" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">
                            ×
                        </span>
                    </button>
                    <h4 class="modal-title">
                        Detail Profil Anda
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="example-grid">
                        <div id="content-profil">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</input>
@endsection

@section('js')
{{Html::script(asset('remark/assets/vendor/raty/jquery.raty.js'))}}
{{Html::script(asset('remark/assets/js/components/raty.js'))}}
<script>
    var url = $('#url').val();
    $('#btn-profil').click(function ()
    {
        $.ajax({
            url : url,
            type : 'GET'
        })
        .success(function (response) {
            $('#content-profil').html(response);
            $('#ModalProfil').modal('show');
        })

    });
</script>
@endsection
