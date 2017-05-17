    @extends('layouts.portal.master')

    @section('css')
    <!-- Plugin -->
    {{Html::style('remark/assets/vendor/raty/jquery.raty.css')}}
    {{Html::style('remark/assets/css/pages/profile.css')}}
    <style>
        body {
            padding-top: 66px;
            background: #c7c8cc;
        }
    </style>
    @endsection

    @section('content')
    <!-- Page -->
    <div class="container-fluid page-profile">
        <div class="page-content animsition">
            <div class="row">
                <div class="col-md-3">
                    <!-- Page Widget -->
                    <div class="widget widget-shadow text-center">
                        <div class="widget-header">
                            <div class="widget-header-content">
                                <a class="avatar avatar-lg" href="javascript:void(0)">
                                    @if(!Auth::user()->image)
                                    <img src="{{asset('remark/assets/portraits/5.jpg')}}" alt="...">
                                        @else
                                        <img src="{{asset('uploads/user/images/'.Auth::user()->image)}}" alt="...">
                                        @endif

                                </a>
                                <div class="profile-user">{{Auth::user()->name}}</div>
                                <div class="example">
                                    <div class="rating rating-lg" data-score="2" data-number="5" data-read-only="true" data-plugin="rating"></div>
                                </div>
                                <div class="profile-job">
                                        @if(Auth::user()->role_id == ROLE_CALON)
                                        <i class="icon wb-pencil"></i> <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalWarning">Daftar Sebagai</a>
                                            @elseif(Auth::user()->role_id == ROLE_PENDAMPING)
                                        <label>Pendamping</label>
                                            @elseif(Auth::user()->role_id == ROLE_UMKM)
                                    UMKM
                                            @endif

                                </div>
                                <div class="profile-social">
                                    <a class="icon bd-twitter" href="javascript:void(0)"></a>
                                    <a class="icon bd-facebook" href="javascript:void(0)"></a>
                                </div>
                                <button id="btn-profil" type="button" class="btn btn-primary">Lihat Profil</button>
                            </div>
                        </div>
                        <div class="widget-footer">
                            <div class="row no-space">
                                <div class="col-xs-4">
                                    <strong class="profile-stat-count">260</strong>
                                    <span>UMKM</span>
                                </div>
                                <div class="col-xs-4">
                                    <strong class="profile-stat-count">180</strong>
                                    <span>Pengikut</span>
                                </div>
                                <div class="col-xs-4">
                                    <strong class="profile-stat-count">2000</strong>
                                    <span>Tweets</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Page Widget -->
                </div>
                <div class="col-md-5 col-xs-12 masonry-item">
                    <!-- Panel Twitter Feed -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Info Terkini</h3>
                        </div>
                        <div class="panel-body">
                            <div class="" data-plugin="">
                                <ul class="list-group list-group-dividered list-group-full">
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <a class="avatar avatar-online" href="javascript:void(0)">
                                                    <img src="{{asset('remark/assets/portraits/16.jpg')}}" alt="...">
                                                    <i></i>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <small class="text-muted pull-right">Just now</small>
                                                <h4 class="media-heading">@Ramon Dunn</h4>
                                                <div>Lorem ipsum Veniam aliquip culpa laboris minim tempor labore
                                                    commodo officia veniam non in in in.</div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a class="avatar avatar-busy" href="javascript:void(0)">
                                                        <img src="{{asset('remark/assets/portraits/16.jpg')}}" alt="...">
                                                        <i></i>
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <small class="text-muted pull-right">38 minutes ago</small>
                                                    <h4 class="media-heading">@Scott Sanders</h4>
                                                    <div>Lorem ipsum Laborum sit laborum cillum proident dolore culpa
                                                        reprehenderit qui enim labore do mollit in.</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a class="avatar avatar-online" href="javascript:void(0)">
                                                            <img src="{{asset('remark/assets/portraits/16.jpg')}}" alt="...">
                                                            <i></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <small class="text-muted pull-right">2 hours ago</small>
                                                        <h4 class="media-heading">@Nina Wells</h4>
                                                        <div>Lorem ipsum Culpa mollit ex mollit magna dolore dolore dolore
                                                            tempor velit magna enim ad dolore dolore dolore.</div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <span class="text-info">Selengkapnya</span>
                                    </div>
                                </div>
                                <!-- End Panel Last comments -->
                            </div>
                            <div class="col-md-4 col-xs-12 masonry-item">
                                <!-- Panel Followers -->
                                <div class="panel" id="followers">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <i class="icon wb-check" aria-hidden="true"></i> UMKM <small>Permintaan Pendampingan</small>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="" data-plugin="">
                                            <ul class="list-group list-group-dividered list-group-full">
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a class="avatar avatar-online" href="javascript:void(0)">
                                                                <img src="{{asset('remark/assets/portraits/9.jpg')}}" alt="">
                                                                <i></i>
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="pull-right">
                                                                <button type="button" class="btn btn-outline btn-default btn-sm">Follow</button>
                                                            </div>
                                                            <div><a class="name" href="javascript:void(0)">Willard Wood</a></div>
                                                            <small>@heavybutterfly920</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a class="avatar avatar-away" href="javascript:void(0)">
                                                                <img src="{{asset('remark/assets/portraits/9.jpg')}}" alt="">
                                                                <i></i>
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="pull-right">
                                                                <button type="button" class="btn btn-success btn-default btn-sm"><i class="icon wb-check" aria-hidden="true"></i>Following</button>
                                                            </div>
                                                            <div><a class="name" href="javascript:void(0)">Ronnie Ellis</a></div>
                                                            <small>@kingronnie24</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a class="avatar avatar-busy" href="javascript:void(0)">
                                                                <img src="{{asset('remark/assets/portraits/9.jpg')}}" alt="">
                                                                <i></i>
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="pull-right">
                                                                <button type="button" class="btn btn-outline btn-default btn-sm">Follow</button>
                                                            </div>
                                                            <div><a class="name" href="javascript:void(0)">Gwendolyn Wheeler</a></div>
                                                            <small>@perttygirl66</small>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <span class="text-info">Selengkapnya</span>
                                    </div>
                                </div>
                                <!-- End Panel Followers -->
                            </div>
                            <div class="col-md-9 col-md-offset-3 col-xs-12 masonry-item">
                                <!-- Panel Last threads -->
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="panel-title-icon icon wb-chat-group" aria-hidden="true"></i> Forum</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul class="list-group list-group-dividered list-group-full">
                                            <li class="list-group-item">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a class="avatar avatar-online" href="javascript:void(0)">
                                                            <img src="{{asset('remark/assets/portraits/15.jpg')}}" alt="">
                                                            <i></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <small class="pull-right">20 hours ago</small>
                                                        <h4 class="media-heading">Indoctum legendum legimus. Faciam mei</h4>
                                                        <small>started by <a href="javascript:void(0)" title="">Crystal Bates</a>                        in <a class="label label-outline label-default" href="javascript:void(0)"
                                                           title="">Best Practices</a></small>
                                                       </div>
                                                   </div>
                                               </li>
                                               <li class="list-group-item">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a class="avatar avatar-away" href="javascript:void(0)">
                                                            <img src="{{asset('remark/assets/portraits/15.jpg')}}" alt="">
                                                            <i></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <small class="pull-right">20 hours ago</small>
                                                        <h4 class="media-heading">Armatum volunt, medium iudex ponderum</h4>
                                                        <small>started by <a href="javascript:void(0)" title="">Ramon Dunn</a> in <a class="label label-outline label-default" href="javascript:void(0)"
                                                            title="">Announcements</a></small>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a class="avatar avatar-busy" href="javascript:void(0)">
                                                                <img src="{{asset('remark/assets/portraits/15.jpg')}}" alt="">
                                                                <i></i>
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <small class="pull-right">20 hours ago</small>
                                                            <h4 class="media-heading">Minuit conectitur intellegaturque doloribus mei</h4>
                                                            <small>started by <a href="javascript:void(0)" title="">Scott Sanders</a>                        in <a class="label label-outline label-default" href="javascript:void(0)"                                                                                                                                                 title="">Bug Reporting</a></small>
                                                        </div>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Panel Last threads -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Page -->

                    <input type="hidden" id="url" value="{{route('profil.show')}}">
                    @endsection

                    @section('modal')

                    <!-- Modal -->
                    <div class="modal fade modal-warning" id="exampleModalWarning" aria-hidden="true"
                    aria-labelledby="exampleModalWarning" role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title">LINK PENDAFTARAN !</h4>
                            </div>
                            <div class="modal-body">
                                <div class="example-grid">
                                    <div class="row">
                                    <div class="col-md-12"> 
                                    <p>Silahkan klik di bawah ini untuk memilih mendaftar sebagai apa !</p>
                                    </div>
                                        <div class="col-md-6">
                                            <span class="">
                                                <div class="widget widget-radius widget-shadow">
                                                    <a href="{{route('daftar.pendamping')}}">
                                                        <div class="widget-header bg-green-600 padding-30 white text-center">
                                                      
                                                        <i class="icon fa-user-secret" aria-hidden="true" style="font-size: 57px; color: white;"></i>
                                                <h4 class="text-center white">PENDAMPING</h4>
                                                </div>  
                                                
                                                    </a>
                                            </div>
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="widget widget-radius widget-shadow">
                                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom"
                  data-trigger="click" data-original-title="Click to tooltip" title="Belum Tersedia">
                                                <div class="widget-header bg-blue-600 padding-30 white text-center">       
                                                    <i class="icon fa-money" aria-hidden="true" style="font-size: 57px; color: white;"></i>
                                            <h4 class="text-center white">UMKM</h4>
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
                    <div class="modal fade modal-warning" id="ModalProfil" aria-hidden="true"
                         aria-labelledby="exampleModalWarning" role="dialog" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title">Detail Profil Anda</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="example-grid">
                                        <div id="content-profil"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
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