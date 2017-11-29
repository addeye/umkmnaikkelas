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
                <a href="{{ route('data.pendamping.report') }}">
                    Pendamping
                </a>
            </li>
            <li class="active">
                Detail Pendamping
            </li>
        </ol>
        <div class="page-header-actions">
                  <a href="{{ route('data.pendamping.report') }}" class="btn btn-sm btn-outline btn-default btn-round">
                    <span class="text hidden-xs">Kembali</span>
                    <i class="icon wb-chevron-left" aria-hidden="true"></i>
                  </a>
                </div>
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
                                {{$data->user->name}}<br>
                                <u style="font-size: 15px;">NIP <strong>{{$data->id_pendamping}}</strong></u>
                            </div>
                            <div class="example">
                                <div class="media">
                                    <div class="media-body">
                                        <p><i class="icon fa-map-marker"></i> Dari <strong>{{$data->kota}}</strong></p>
                                        <p><i class="icon wb-time"></i> Pendamping Sejak <strong>{{$data->tahun_mulai}}</strong></p>
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
                        <ul>
                        @foreach ($data->rel_bd_pendampingan as $row)
                            <li>
                                {{$row->bidang_pendampingan->nama}}
                            </li>
                        @endforeach
                        </ul>
                        <hr>
                        <h4>Bidang Keahlian</h4>
                        <ul>
                        @foreach ($data->rel_bd_keahlian as $row)
                        <li>
                            {{$row->bidang_keahlian->nama}}
                        </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-bordered panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="icon wb-plugin"></i> Jasa Pendampingan</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Diskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->jasa_pendampingan as $row)
                            <tr>
                                <td>{{$row->title}}</td>
                                <td>{{$row->deskripsi}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
            </div>

            <div class="col-md-8">
                <div class="panel panel-bordered panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="icon wb-home"></i> UMKM</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>NIU</th>
                                <th>NAMA</th>
                                <th>Kota</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($umkm as $row)
                            <tr>
                                <td>{{$row->id_umkm}}</td>
                                <td>{{$row->nama_usaha}}</td>
                                <td>{{$row->kota}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
  </script>

    {{Html::script(asset('flexslider/demo/js/jquery.easing.js'))}}
    {{Html::script(asset('flexslider/demo/js/jquery.mousewheel.js'))}}
    {{Html::script(asset('flexslider/demo/js/demo.js'))}}


@endsection
