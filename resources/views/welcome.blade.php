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
    background-color: #00000080;
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
        <div class="carousel slide" id="exampleCarouselCaptions" data-ride="carousel">
            <ol class="carousel-indicators carousel-indicators-fillin">
                <li class="active" data-slide-to="0" data-target="#exampleCarouselCaptions"></li>                
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img class="width-full" src="{{asset('images/slider/lunas1.jpg')}}" alt="..." />
                    {{--<div class="carousel-caption">--}}
                        {{--<h3>UMKM NAIK KELAS</h3>--}}
                        {{--<p>Platform Untuk Menigkatkan Kualitas Pendamping & UMKM agar Naik Kelas</p>--}}
                    {{--</div>--}}
                </div>
                <div class="item">
                    <img class="width-full" src="{{asset('images/slider/lunas2.jpg')}}" alt="..." />
                    {{--<div class="carousel-caption">--}}
                        {{--<h3>UMKM NAIK KELAS</h3>--}}
                        {{--<p>Platform Untuk Menigkatkan Kualitas Pendamping & UMKM agar Naik Kelas</p>--}}
                    {{--</div>--}}
                </div>
                <div class="item">
                    <img class="width-full" src="{{asset('images/slider/lunas3.jpg')}}" alt="..." />
                    {{--<div class="carousel-caption">--}}
                        {{--<h3>UMKM NAIK KELAS</h3>--}}
                        {{--<p>Platform Untuk Menigkatkan Kualitas Pendamping & UMKM agar Naik Kelas</p>--}}
                    {{--</div>--}}
                </div>
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
</div>        
<!-- End Example Captions -->
<!-- Panel More Examples -->
<div class="row">
<div class="col-md-3 orange-tiles" style="padding: 0px;padding-right: 2.5px;">
                <div class="col-md-12 col-xs-12 col-sm-12 col-tiles">
                  <div class="tiles-title bg-blue-800">
                    <h2>MANAJEMEN</h2>
                  </div>
                </div>
                <div class="col-md-12 col-xs-6 col-tiles">
                   <a href="javascript:void(0);">
                   <div class="tile" style="background:url('{{asset('images/box/umkm.jpg')}}') no-repeat center center;background-size: cover;">
                       <h4 class="tile-cap bg-blue-800">UMKM</h4>
                       <p class="sub-cap">Pendaftaran, Data, Produk</p>
                    </div>
                    </a>
                </div>
                <div class="col-md-12 col-xs-6 col-tiles">
                   <a href="javascript:void()">
                   <div class="tile" style="background:url('{{asset('images/box/pendampingan.jpg')}}') no-repeat center center;background-size: cover;">
                       <h4 class="tile-cap bg-blue-800">Pendampingan</h4>
                       <p class="sub-cap">Pendafatran, Data, Sertifikasi</p>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-md-9 green-tiles" style="padding: 0px;padding-left: 2.5px;">
                <div class="col-md-12 col-xs-12 col-sm-12 col-tiles">
                  <div class="tiles-title bg-light-green-800">
                    <h2>PROGRAM</h2>
                  </div>
                </div>
                <div class="col-md-4 col-xs-6 col-tiles">
                    <a href="javascript:void()">
                   <div class="tile" style="background:url('{{asset('images/box/latar-belakang.jpg')}}') no-repeat center center;background-size: cover;">
                       <h4 class="tile-cap bg-light-green-800">Latar Belakang</h4>
                       <p class="sub-cap">Latar Belakang, Goal dan Strategi</p>
                    </div>
                    </a>
                </div>
                <div class="col-md-4 col-xs-6 col-tiles">
                   <a href="javascript:void()">
                     <div class="tile" style="background:url('{{asset('images/box/sasaran.jpg')}}') no-repeat center center;background-size: cover;">
                       <h4 class="tile-cap bg-light-green-800">Sasaran dan KPI</h4>
                       <p class="sub-cap">Galeri UMKM Yang Tergabung</p>
                    </div>
                   </a>
                </div>
                <div class="col-md-4 col-xs-6 col-tiles">
                  <a href="javascript:void()">
                   <div class="tile" style="background:url('{{asset('images/box/procedur-umkm.jpg')}}') no-repeat center center;background-size: cover;">
                       <h4 class="tile-cap bg-light-green-800">Prosedur bagi UMKM</h4>
                       <p class="sub-cap">Galeri Karya UMKM di RKB</p>
                    </div>
                  </a>
                </div>
                <div class="col-md-4 col-xs-6 col-tiles">
                   <a href="javascript:void()">
                     <div class="tile" style="background:url('{{asset('images/box/procedur-pendamping.jpg')}}') no-repeat center center;background-size: cover;">
                       <h4 class="tile-cap bg-light-green-800">Prosedur bagi Pendamping UMKM</h4>
                       <p class="sub-cap">Informasi Mengenai RKB</p>
                    </div>
                   </a>
                </div>
                <div class="col-md-8 col-xs-12 col-tiles">
                   <a href="javascript:void()">
                     <div class="tile" style="background:url('{{asset('images/box/pelaksana-mitra.jpg')}}') no-repeat center center;background-size: cover;">
                     <h4 class="tile-cap bg-light-green-800">Pelaksana dan Mitra</h4>
                       <p class="sub-cap">Daftar Lokasi TEmpat RKKB</p>
                    </div>
                   </a>
                </div>            
            </div>            
            <div class="col-md-6 red-tiles" style="padding: 0px 2.5px;">
                <div class="col-md-12 col-xs-12 col-sm-12 col-tiles">
                  <div class="tiles-title" style="background-image: url('http://www.rkb.id/assets/images/home/infoumum_title.jpg');">
                    <h2>LAYANAN</h2>
                  </div>
                </div>
                <div class="col-md-4 col-xs-6 col-tiles">
                   <a href="javascript:void()">
                     <div class="tile" style="background:url('{{asset('images/box/konsultasi-bisnis.jpg')}}') no-repeat center center;background-size: cover;">
                       <h4 class="tile-cap cap-red">Konsultasi Bisnis</h4>
                       <p class="sub-cap">Konsultai untuk pelaku usaha</p>
                    </div>
                   </a>
                </div>
                <div class="col-md-4 col-xs-6 col-tiles">
                   <a href="javascript:void()">
                     <div class="tile" style="background:url('{{asset('images/box/informasi-business.jpg')}}') no-repeat center center;background-size: cover;">
                       <h4 class="tile-cap cap-red">Informasi Terkini</h4>
                       <p class="sub-cap">Informasi terkini</p>
                    </div>
                   </a>
                </div>
                <div class="col-md-4 col-xs-12 col-tiles">
                   <div class="tile" style="background:url('{{asset('images/box/informasi-pasar.jpg')}}') no-repeat center center;background-size: cover;">
                       <h4 class="tile-cap cap-red">Informasi Pasar</h4>
                       <p class="sub-cap">Informasi Pasar</p>
                    </div>
                </div>            
            </div>
            <div class="col-md-6 red-tiles" style="padding: 0px 2.5px;">
                <div class="col-md-12 col-xs-12 col-sm-12 col-tiles">
                  <div class="tiles-title bg-orange-800">
                    <h2>INFORMASI</h2>
                  </div>
                </div>
                <div class="col-md-3 col-xs-6 col-tiles">
                   <a href="javascript:void()">
                     <div class="tile" style="background:url('{{asset('images/box/berita-artikel.jpg')}}') no-repeat center center;background-size: cover;">>
                       <h4 class="tile-cap bg-orange-800">Berita & Artikel</h4>
                       <p class="sub-cap">Seputar UMKM</p>
                    </div>
                   </a>
                </div>
                <div class="col-md-3 col-xs-6 col-tiles">
                   <a href="javascript:void()">
                     <div class="tile" style="background:url('{{asset('images/box/agenda.jpg')}}') no-repeat center center;background-size: cover;">>
                       <h4 class="tile-cap bg-orange-800">Agenda</h4>
                       <p class="sub-cap">Agenda</p>
                    </div>
                   </a>
                </div>
                <div class="col-md-3 col-xs-6 col-tiles">
                   <div class="tile" style="background:url('{{asset('images/box/forum.jpg')}}') no-repeat center center;background-size: cover;">>
                       <h4 class="tile-cap bg-orange-800">Forum</h4>
                       <p class="sub-cap">Forum Naik Kelas</p>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6 col-tiles">
                   <div class="tile" style="background:url('{{asset('images/box/service.jpg')}}') no-repeat center center;background-size: cover;">>
                       <h4 class="tile-cap bg-orange-800">Hubungi Kami</h4>
                       <p class="sub-cap">Kritik, Saran, Dan Ucapan Salam</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xs-12" style="padding: 0px 2.5px;">                       
                  <div class="slider" id="exampleAutoplay">
                  @for($a=1; $a<10; $a++)
                  <div class="slick-item">
                      <div class="row">
                          <div class="col-md-12 col-xs-12">
                          <div class="widget widget-shadow">
                            <div class="widget-content padding-20 bg-green-500 white height-full">
                              <a class="avatar pull-left margin-right-20" href="javascript:void(0)">
                                <img src="{{url('remark/assets/portraits/15.jpg')}}" alt="">
                              </a>
                              <div style="overflow:hidden;">
                                <small class="pull-right grey-200">Kemarin, 13:48</small>
                                <div class="font-size-18">Imam</div>
                                <div class="grey-200 font-size-14 margin-bottom-10">Konsultan</div>
                                <blockquote class="cover-quote font-size-16 white">Aplikasi lunas sangat membantu dalam menangani kenaikan kelas bagi UMKM. 
                                  </blockquote>
                              </div>
                            </div>
                        </div>
                      </div>
                      </div>
                    </div>
                  @endfor
                  </div>            
              <!-- End Example Autoplay -->
            </div>
          </div>
    @if(!Auth::user())
            <div class="floating" data-toggle="tooltip" data-placement="left" title="" data-original-title="MASUK | DAFTAR">
                <a href="{{url('login')}}"><i class="icon wb-settings" aria-hidden="true"></i></a>
            </div>
    @endif
          <div class="padding-10"></div>
@endsection
