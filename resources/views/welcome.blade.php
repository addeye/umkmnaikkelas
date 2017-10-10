@extends('layouts.portal.master')

@section('css')
<style>
    .example {
        position: relative;
        padding: 50px 15px 15px 50px;
        background-color: #f3f7fa;
        border: 1px solid #eee;
    }

    .example-reverse {
        padding: 50px 50px 15px 15px;
    }

    .example-bottom {
        padding: 15px 15px 50px 50px;
    }

    .example-bottom-reverse {
        padding: 15px 50px 50px 15px;
    }

</style>
{{Html::style('css/metro.css')}}
{{Html::style('css/custom.css')}}
<style>
 .carousel-inner > .item > img,
 .carousel-inner > .item > a > img {
     display: block;
     max-width: 100%;
     height: 400px !important;
 }
 .col-tiles {
    padding: 2.5px;
}
.tiles-title {
    text-align: center;
}
.tiles-title h2 {
    font-size: 22px;
    color: #fff;
    line-height: 70px;
}
input {
    float: none !important;
}
.slick-item {
    padding: 5px;
}
.slick-slider {
    margin-bottom: 0px !important;
}

.sub-cap {
    position: absolute;
    color: #fff;
    text-align: left;
    font-size: 14px;
    top: 145px;
    padding: 3px 5px;
    background: rgba(10, 10, 10, 0.46);
}

 @media screen and (max-width: 768px) {
     .carousel-inner > .item > img, .carousel-inner > .item > a > img {
         display: block;
         max-width: 100%;
         height: 284px !important;
     }
 }

 @media screen and (max-width: 480px) {
     .carousel-inner > .item > img, .carousel-inner > .item > a > img {
         display: block;
         max-width: 100%;
         height: 184px !important;
     }
 }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <!-- Example Captions -->
        @if(count($slider) !=0)
        <div class="carousel slide" id="exampleCarouselCaptions" data-ride="carousel">
            <ol class="carousel-indicators carousel-indicators-fillin">
            @foreach($slider as $key => $row)
                <li class="{{$key==0?'active':''}}" data-slide-to="{{$key}}" data-target="#slide{{$key}}"></li>
            @endforeach
            </ol>
            <div class="carousel-inner" role="listbox">
            @foreach($slider as $key => $row)
                <div id="slide{{$key}}" class="item {{$key==0?'active':''}}">
                    <img class="width-full" src="{{asset('uploads/slider/'.$row->path)}}" alt="..." />
                </div>
            @endforeach
            </div>
            <a class="left carousel-control" href="#exampleCarouselCaptions" role="button"
            data-slide="prev">
            <span class="icon wb-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#exampleCarouselCaptions" role="button"
        data-slide="next">
        <span class="icon wb-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>
    @endif
</div>
<!-- End Example Captions -->
<!-- Panel More Examples -->
<div class="row">
<div class="col-md-12 red-tiles" style="padding: 0px 2.5px;">
                <div class="col-md-12 col-xs-12 col-sm-12 col-tiles">
                  <div class="tiles-title bg-red-800">
                    <h2>LAYANAN</h2>
                  </div>
                </div>
                <div class="col-md-6 col-xs-6 col-tiles">
                   <a href="{{route('layanan.info_terkini')}}">
                     <div class="tile" style="background:url('{{asset('images/box/informasi-business.jpg')}}') no-repeat center center;background-size: cover;">
                       <h4 class="tile-cap cap-red">Info Terkini</h4>
                       <p class="sub-cap">Info Terkini dari kami</p>
                    </div>
                   </a>
                </div>
                <div class="col-md-6 col-xs-6 col-tiles">
                    <a target="_blank" href="http://fokus-umkm.com/">
                        <div class="tile" style="background:url('{{asset('images/box/berita-artikel.jpg')}}') no-repeat center center;background-size: cover;">
                            <h4 class="tile-cap bg-orange-800">Berita & Artikel</h4>
                            <p class="sub-cap">Seputar UMKM</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xs-6 col-tiles">
                    <a href="{{route('layanan.info.agenda')}}">
                        <div class="tile" style="background:url('{{asset('images/box/agenda.jpg')}}') no-repeat center center;background-size: cover;">
                            <h4 class="tile-cap bg-orange-800">Agenda</h4>
                            <p class="sub-cap">Info Kegiatan</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xs-6 col-tiles">
                    <a href="{{route('layanan.info.kontak')}}">
                        <div class="tile" style="background:url('{{asset('images/box/service.jpg')}}') no-repeat center center;background-size: cover;">
                            <h4 class="tile-cap bg-orange-800">Hubungi Kami</h4>
                            <p class="sub-cap">Kontak dan Saran</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-12 green-tiles" style="padding: 0px;padding-left: 2.5px;">
                <div class="col-md-12 col-xs-12 col-sm-12 col-tiles">
                  <div class="tiles-title bg-light-green-800">
                    <h2>MANAJEMEN</h2>
                  </div>
                </div>
                @foreach ($page_static as $row)
                   <div class="col-md-4 col-xs-6 col-tiles">
                    <a href="{{ url('page/'.$row->slug) }}">
                   <div class="tile" style="background:url('{{asset('images/box/sasaran.jpg')}}') no-repeat center center;background-size: cover;">
                       <h4 class="tile-cap bg-light-green-800">{{$row->title}}</h4>
                       <p class="sub-cap">{{$row->topic}}</p>
                    </div>
                    </a>
                </div>
                @endforeach

                <div class="col-md-4 col-xs-6 col-tiles">
                   <a href="{{route('page.umkm')}}">
                   <div class="tile" style="background:url('{{asset('images/box/pendampingan.jpg')}}') no-repeat center center;background-size: cover;">
                       <h4 class="tile-cap bg-blue-800">Manajemen UMKM</h4>
                       <p class="sub-cap">Data, Profil</p>
                    </div>
                    </a>
                </div>
                <div class="col-md-4 col-xs-6 col-tiles">
                   <a href="{{route('page.pendamping')}}">
                   <div class="tile" style="background:url('{{asset('images/box/pelaksana-mitra.jpg')}}') no-repeat center center;background-size: cover;">
                       <h4 class="tile-cap bg-blue-800">Manajemen Pendamping</h4>
                       <p class="sub-cap">Data, Profil</p>
                    </div>
                    </a>
                </div>
            </div>

            <div class="col-md-12 col-xs-12" style="padding: 0px 2.5px;">
                  <div class="slider" id="exampleAutoplay">
                  @foreach($info_terkini as $row)
                      <div class="slick-item">
                          <div class="row">
                              <div class="col-md-12 col-xs-12">
                                  <div class="widget widget-shadow">
                                      <div class="widget-content padding-20 bg-green-500 white height-full">
                                          <a class="avatar pull-left margin-right-20" href="javascript:void(0)">
                                              @if(!$row->user->image)
                                              <img src="{{asset('remark/assets/portraits/5.jpg')}}" alt="...">
                                              @else
                                              <img src="{{asset('uploads/user/images/'.$row->user->image)}}" alt="...">
                                              @endif
                                          </a>
                                          <div style="overflow:hidden;">
                                              <small class="pull-right grey-200">{{$row->textdate}}</small>
                                              <div class="font-size-18">{{$row->user->name}}</div>
                                              <div class="grey-200 font-size-14 margin-bottom-10">Team Lunas</div>
                                              <blockquote class="cover-quote font-size-16 white">
                                                  {!! $row->keterangan !!}
                                              </blockquote>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      @endforeach

                  </div>
              <!-- End Example Autoplay -->
            </div>
          </div>
          <div class="padding-10"></div>
</div>

@endsection
