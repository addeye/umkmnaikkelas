@extends('layouts.portal.master')

    @section('css')
<!-- Plugin -->
{{-- {{Html::style('remark/assets/vendor/raty/jquery.raty.css')}} --}}
    {{Html::style('remark/assets/css/pages/profile.css')}}

    {{Html::style('flexslider/demo/css/demo.css')}}
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
                                <form action="{{ route('konsultasi.select.jasa',['id'=>$order_konsultasi_id]) }}" method="post">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="jasa_pendampingan_id" value="{{$data->id}}">
                                <span><button type="submit" class="btn btn-primary">Order</button>
                                    <a href="{{ route('konsultasi.list.jasa',['order_konsultasi_id'=>$order_konsultasi_id]) }}" class="btn btn-default">Kembali</a>
                                </span>
                            </form>
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
                            <a class="avatar avatar-lg" href="javascript:void(0)">
                                @if($data->pendamping->user->image =='')
                                <img alt="..." src="{{asset('remark/assets/portraits/5.jpg')}}">
                                    @else
                                    <img alt="..." src="{{asset('uploads/user/images/'.$data->pendamping->user->image)}}">
                                        @endif
                                    </img>
                                </img>
                            </a>
                            <div class="profile-user">
                                {{$data->pendamping->user->name}}
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
                                    {{count($data->pendamping->jasa_pendampingan)}}
                                </strong>
                                <span>
                                    Jasa
                                </span>
                            </div>
                            <div class="col-xs-4">
                                <strong class="profile-stat-count">
                                    0
                                </strong>
                                <span>
                                    UMKM
                                </span>
                            </div>
                            <div class="col-xs-4">
                                <strong class="profile-stat-count">
                                    0
                                </strong>
                                <span>
                                    Kegiatan
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Widget -->
            </div>
        </div>
    </div>
</div>
<!-- End Page -->
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
  </script>

    {{Html::script(asset('flexslider/demo/js/jquery.easing.js'))}}
    {{Html::script(asset('flexslider/demo/js/jquery.mousewheel.js'))}}
    {{Html::script(asset('flexslider/demo/js/demo.js'))}}


@endsection
