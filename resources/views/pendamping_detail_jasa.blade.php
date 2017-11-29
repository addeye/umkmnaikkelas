@extends('layouts.portal.master')

    @section('css')
<!-- Plugin -->
{{-- {{Html::style('remark/assets/vendor/raty/jquery.raty.css')}} --}}
    {{Html::style('remark/assets/css/pages/profile.css')}}

    {{-- {{Html::style('flexslider/demo/css/demo.css')}} --}}
    {{Html::style('flexslider/flexslider.css')}}
    @endsection

    @section('content')
<!-- Page -->
<div class="container-fluid page-profile">
    <div class="page-content animsition">
        <div class="row">
            <div class="col-md-8">
                <!-- Panel -->
                <div class="panel">
                    <div class="panel-heading">
                      <h1 class="panel-title">{{$data->title}} | <span class="label label-warning">Rp. {{number_format($data->netto, 2)}} </span>
                        <span class="panel-desc">{{$data->deskripsi}}</span>
                        <span class="badge badge-default"><i class="icon wb-tag"></i> {{$data->diskon}}%</span>
                        <span class="badge badge-default">Rp. {{ number_format($data->harga, 2) }}</span>
                      </h1>
                      <div class="visible-lg-* padding-left-30">
                            @if (Auth::check())
                                @if (Auth::user()->role_id == ROLE_UMKM)
                                    <a href="{{ route('konsultasi.select.jasa_id',['id'=>$data->id]) }}" class="btn btn-primary">Order</a>
                                @endif

                                @else

                                <button class="btn btn-primary" data-target="#exampleFormModal" data-toggle="modal"
                  type="button">Order</button>
                            @endif

                            <a href="{{route('page.pendamping.detail',['id'=>$data->pendamping->id])}}" class="btn btn-default">Lihat Lainnya</a>
                            </div>
                    </div>
                    <div class="panel-body">
                        <!-- Place somewhere in the <body> of your page -->
                        @if (count($images) > 0)
                            <div id="slider" class="flexslider">
                          <ul class="slides">
                            @foreach($images as $row)
                                <li>
                              <img class="thumbnail" src="{{ asset($row->path.$row->file_name) }}" />
                            </li>
                            @endforeach
                            <!-- items mirrored twice, total of 12 -->
                          </ul>
                        </div>
                        <div id="carousel" class="flexslider">
                          <ul class="slides">
                            @foreach ($images as $el)
                                <li>
                              <img src="{{ asset($el->path.'thumbs/'.$el->file_name) }}" />
                            </li>
                            @endforeach
                            <!-- items mirrored twice, total of 12 -->
                          </ul>
                        </div>
                        @endif

                        {{-- tab --}}
                        <h1>{{$data->title}}</h1>
                        <p>{{$data->deskripsi}}</p>
                        <p> <strong>Bidang :</strong>
                            @foreach ($data->jasa_rel_bidang_pendampingan as $row)
                                {{$row->bidang_pendampingan->nama}}/
                            @endforeach
                        </p>
                        <p>
                           <strong>Keahlian :</strong>
                            @foreach ($data->jasa_rel_bidang_keahlian as $row)
                                {{$row->bidang_keahlian->nama}}/
                            @endforeach
                        </p>

                        <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
                            <li class="active" role="presentation">
                                <a aria-controls="diskripsi" data-toggle="tab" href="#diskripsi" role="tab">
                                    Diskripsi
                                </a>
                            </li>
                            <li role="presentation">
                                <a aria-controls="file" data-toggle="tab" href="#file" role="tab">
                                    File Pendukung<span class="badge badge-info">
                                        {{count($files)}}
                                    </span>
                                </a>
                            </li>
                            <li role="presentation">
                                <a aria-controls="komentar" data-toggle="tab" href="#komentar" role="tab">
                                    Komentar <span class="badge badge-info">
                                        0
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="diskripsi" role="tabpanel">
                                <div class="panel">
                                    <div class="panel-body">
                                      {!! $data->keterangan !!}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="file" role="tabpanel">
                                <div class="panel">
                                    <div class="panel-body">
                                        @foreach ($files as $file)
                                    <p><a href="{{ asset($file->path.$file->file_name) }}">{{$file->file_name}}</a></p>
                                @endforeach
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="komentar" role="tabpanel">
                                <div class="panel">
                                    <div class="panel-body">
                                        <h4>Belum ada komentar</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Panel -->
            </div>
            <div class="col-md-4">
                <!-- Page Widget -->
                <div class="widget widget-shadow text-center">
                    <div class="widget-header">
                        <div class="widget-header-content">
                            <a class="avatar avatar-lg" href="{{route('page.pendamping.detail',['id'=>$data->pendamping->id])}}">
                                @if($data->pendamping->user->image =='')
                                <img alt="..." src="{{asset('remark/assets/portraits/5.jpg')}}">
                                    @else
                                    <img alt="..." src="{{asset('uploads/user/images/'.$data->pendamping->user->image)}}">
                                        @endif
                                    </img>
                                </img>
                            </a>
                            <div class="profile-user">
                                <a href="{{route('page.pendamping.detail',['id'=>$data->pendamping->id])}}">{{$data->pendamping->user->name}}</a>
                            </div>
                            <div class="example">
                                <div class="rating rating-lg" data-number="5" data-plugin="rating" data-read-only="true" data-score="2">
                                </div>
                            </div>
                            <div class="example">
                                <div class="media">
                                    <div class="media-body">
                                        <p><i class="icon fa-map-marker"></i> Dari <strong>{{$data->pendamping->kota}}</strong></p>
                                        <p><i class="icon fa-user"></i> Member sejak <strong>{{date('Y',strtotime($data->pendamping->created_at))}}</strong></p>
                                    </div>
                                </div>
                            </div>
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
                <div class="panel">
                    <div class="panel-body">
                        <h4>Deskripsi</h4>
                        <p>{{$data->pendamping->deskripsi}}</p>
                        <hr>
                        <h4>Pengalaman</h4>
                        <p>{{$data->pendamping->pengalaman}}</p>
                        <hr>
                        <h4>Bidang Pendampingan</h4>
                        @foreach ($data->pendamping->rel_bd_pendampingan as $row)
                            <span class="badge badge-md badge-danger">{{$row->bidang_pendampingan->nama}}</span>
                        @endforeach
                        <hr>
                        <h4>Bidang Keahlian</h4>
                        @foreach ($data->pendamping->rel_bd_keahlian as $row)
                            <span class="badge badge-md badge-warning">{{$row->bidang_keahlian->nama}}</span>
                        @endforeach
                    </div>
                </div>
                <!-- End Page Widget -->
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
              <small>Anda Harus Sebagai UMKM jika ingin order Jasa Ini</small>
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
              <p><a style="color: #f16f35;font-weight: bold;" href="{{url('register/pendamping')}}">Daftar Pendamping</a></p>
            </div>
          </form>
        </div>
      </div>

    @endsection

@section('js')
{{Html::script(asset('remark/assets/vendor/raty/jquery.raty.js'))}}
{{Html::script(asset('remark/assets/js/components/raty.js'))}}


{{Html::script(asset('flexslider/jquery.flexslider.js'))}}

<script type="text/javascript">
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
            $('#alert').html('Periksa Lagi Email dan Password Anda');
        }

        if(response.status === 'sukses')
        {
            window.location.replace("{{ route('konsultasi.select.jasa_id',['id'=>$data->id]) }}");
        }
    });
    // event.preventDefault();
});

  </script>

    {{Html::script(asset('flexslider/demo/js/jquery.easing.js'))}}
    {{Html::script(asset('flexslider/demo/js/jquery.mousewheel.js'))}}
    {{Html::script(asset('flexslider/demo/js/demo.js'))}}


@endsection
