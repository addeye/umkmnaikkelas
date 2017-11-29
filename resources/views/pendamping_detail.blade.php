@extends('layouts.portal.master')

    @section('css')
<!-- Plugin -->
{{-- {{Html::style('remark/assets/vendor/raty/jquery.raty.css')}} --}}
    {{Html::style('remark/assets/css/pages/profile.css')}}

    {{-- {{Html::style('flexslider/demo/css/demo.css')}} --}}
    {{Html::style('flexslider/flexslider.css')}}

    {{Html::style('remark/assets/vendor/jquery-selective/jquery-selective.css')}}
<!-- Page -->
    {{Html::style('remark/assets/css/apps/projects.css')}}
    @endsection

    @section('content')
<!-- Page -->
<div class="container-fluid page-profile">
    <div class="page-header animsition">
        <h1 class="page-title">
            Pendamping
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/')}}">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('data.pendamping') }}">
                    Pendamping
                </a>
            </li>
            <li class="active">
                Detail Pendamping
            </li>
        </ol>
    </div>
    <div class="page-content animsition">
        <div class="row">
            <div class="col-md-4">
                <!-- Page Widget -->
                <div class="widget widget-shadow text-center">
                    <div class="widget-header">
                        <div class="widget-header-content">
                            <a class="avatar avatar-lg" href="javascript:void(0)">
                                @if($data->user->image =='')
                                <img alt="..." src="{{asset('remark/assets/portraits/5.jpg')}}">
                                    @else
                                    <img alt="..." src="{{asset('uploads/user/images/'.$data->user->image)}}">
                                        @endif
                                    </img>
                                </img>
                            </a>
                            <div class="profile-user">
                                {{$data->user->name}}
                            </div>
                            <div class="example">
                                <div class="rating rating-lg" data-number="5" data-plugin="rating" data-read-only="true" data-score="{{rating($data->rating)}}">
                                </div>
                            </div>
                            <div class="example">
                                <div class="media">
                                    <div class="media-body">
                                        <p><i class="icon fa-map-marker"></i> Dari <strong>{{$data->kota}}</strong></p>
                                        <p><i class="icon fa-user"></i> Member sejak <strong>{{date('Y',strtotime($data->created_at))}}</strong></p>
                                    </div>
                                </div>
                            </div>
                            <button id="{{Auth::check()?'islogin':'isnotlogin'}}" type="button" class="btn btn-success padding-horizontal-40 btn-contact-me"><i class="icon wb-envelope"></i> Contact Me</button>
                        </div>
                    </div>
                    <div class="widget-footer">
                        <div class="row no-space">
                            <div class="col-xs-4">
                                <strong class="profile-stat-count">
                                    {{count($jasa)}}
                                </strong>
                                <span>
                                    Jasa
                                </span>
                            </div>
                            <div class="col-xs-4">
                                <strong class="profile-stat-count">
                                    {{count($umkm)}}
                                </strong>
                                <span>
                                    UMKM
                                </span>
                            </div>
                            <div class="col-xs-4">
                                <strong class="profile-stat-count">
                                    {{count($kegiatan)}}
                                </strong>
                                <span>
                                    Kegiatan
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Widget -->
                <div class="panel">
                    <div class="panel-body">
                        <h4>Deskripsi</h4>
                        <p>{{$data->deskripsi}}</p>
                        <hr>
                        <h4>Lembaga</h4>
                        <p>{{$data->lembaga->nama_lembaga}}</p>
                        <hr>
                        <h4>Pengalaman</h4>
                        <p>{{$data->pengalaman}}</p>
                        <hr>
                        <h4>Bidang Pendampingan</h4>
                        @foreach ($data->rel_bd_pendampingan as $row)
                            <span class="badge badge-md badge-danger">{{$row->bidang_pendampingan->nama}}</span>
                        @endforeach
                        <hr>
                        <h4>Bidang Keahlian</h4>
                        @foreach ($data->rel_bd_keahlian as $row)
                            <span class="badge badge-md badge-warning">{{$row->bidang_keahlian->nama}}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-bordered panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="icon wb-plugin"></i> Jasa Pendampingan</h3>
            </div>
            <div class="panel-body">
                <div class="projects-wrap">
            <ul class="blocks blocks-100 blocks-xlg-5 blocks-md-4 blocks-sm-3 blocks-xs-2">
                @foreach ($jasa as $row)
                <li>
                    <div class="panel">
                        <figure class="overlay overlay-hover animation-hover">
                            @if (count($row->image))
                            <img class="caption-figure" src="{{ asset($row->image[0]->path.'/thumbs/'.$row->image[0]->file_name) }}">
                                @else
                                <img class="caption-figure" src="{{ asset('remark/assets/photos/placeholder.png') }}">
                                    @endif
                                    <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                                        <a href="{{ route('data.pendamping.jasa',['id'=>$row->id]) }}" class="btn btn-outline btn-default project-button" type="button">
                                            View Jasa
                                        </a>
                                    </figcaption>
                                </img>
                            </img>
                        </figure>
                        <div class="time pull-right">
                            <i class="icon wb-tag"></i> {{$row->diskon}}% | Rp. {{ number_format($row->harga, 2) }}
                        </div>
                        <div>
                            {{$row->title}}
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
            </div>
          </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page -->
    @endsection

    @section('modal')

    <div class="modal fade" id="exampleFormModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
                  role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <form class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="exampleFormModalLabel">Login Sebagai UMKM</h4>
                          <small>Anda Harus Sebagai UMKM jika ingin kirim pesan</small>
                        </div>
                        <div class="modal-body">
                          <form id="formlogin">
                            <span id="alert" style="color: red;"></span>
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                              <label class="sr-only" for="inputEmail">Email</label>
                              <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="{{old('email')}}" required>
                            </div>
                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                              <label class="sr-only" for="inputPassword">Password</label>
                              <input type="password" class="form-control" id="inputPassword" name="password"
                              placeholder="Password" required>
                            </div>
                            <div class="form-group clearfix">
                              <div class="checkbox-custom checkbox-inline pull-left">
                                <input type="checkbox" id="inputCheckbox" name="remember">
                                <label for="inputCheckbox">Ingatkan Saya</label>
                              </div>
                              <a class="pull-right" href="{{ route('password.request') }}">Lupa password?</a>
                            </div>
                            <button type="button" class="btn btn-primary btn-block btn-login">Masuk</button>
                          </form>
                          <p>Tidak punya akun ? Silahkan</p>
                          <p><a style="color: #f16f35;font-weight: bold;" href="{{url('register/umkm')}}">Daftar UMKM</a></p>
                        </div>
                      </form>
                    </div>
                  </div>

        <div class="modal fade" id="message" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
                  role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                      <form class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="exampleFormModalLabel">Contact Me</h4>
                          <small>Kirim pesan kepada penamping untuk lebih lengkapnya</small>
                        </div>
                        <div class="modal-body">

                        </div>
                      </form>
                    </div>
                  </div>

    @endsection

@section('js')
{{Html::script(asset('remark/assets/vendor/raty/jquery.raty.js'))}}
{{Html::script(asset('remark/assets/js/components/raty.js'))}}


{{Html::script(asset('flexslider/jquery.flexslider.js'))}}

{{Html::script(asset('remark/assets/vendor/jquery-selective/jquery-selective.min.js'))}}
    {{Html::script(asset('remark/assets/js/apps/app.js'))}}
    {{Html::script(asset('remark/assets/js/apps/projects.js'))}}

<script type="text/javascript">

    $('.btn-contact-me').click(function(){
        var status = this.id;
        if(status=='islogin')
        {
            $('#message').modal('show');
        }
        else
        {
            $('#exampleFormModal').modal('show');
        }
    });

    $( ".btn-login" ).click(function() {
    console.log( $( "form" ).serializeArray() );
    data = $( "form" ).serializeArray();
    $.ajax({
        url: "{{ route('login.ajax') }}",
        method: 'POST',
        dataType:'json',
        data: data
    })
    .done(function(response){
        console.log(response);
        if(response.status === 'gagal')
        {
            $('#alert').html(response.message);
        }

        if(response.status === 'sukses')
        {
            $('#exampleFormModal').modal('hide');
            $('#message').modal('show');
        }
    });
    // event.preventDefault();
});

    $(window).load(function(){
      $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 150,
        itemMargin: 2,
        asNavFor: '#slider'
      });

      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>

    {{Html::script(asset('flexslider/demo/js/jquery.easing.js'))}}
    {{Html::script(asset('flexslider/demo/js/jquery.mousewheel.js'))}}
    {{Html::script(asset('flexslider/demo/js/demo.js'))}}


@endsection
