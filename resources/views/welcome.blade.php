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
    top: 149px;
    padding: 3px 5px;
    background: rgba(10, 10, 10, 0.46);
}

a:focus, a:hover {
     /*color: #23527c;*/
     text-decoration: none;
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
        <div class="carousel slide" data-ride="carousel" id="exampleCarouselCaptions">
            <ol class="carousel-indicators carousel-indicators-fillin">
                @foreach($slider as $key => $row)
                <li class="{{$key==0?'active':''}}" data-slide-to="{{$key}}" data-target="#slide{{$key}}">
                </li>
                @endforeach
            </ol>
            <div class="carousel-inner" role="listbox">
                @foreach($slider as $key => $row)
                <div class="item {{$key==0?'active':''}}" id="slide{{$key}}">
                    <img alt="..." class="width-full" src="{{asset('uploads/slider/'.$row->path)}}"/>
                </div>
                @endforeach
            </div>
            <a class="left carousel-control" data-slide="prev" href="#exampleCarouselCaptions" role="button">
                <span aria-hidden="true" class="icon wb-chevron-left">
                </span>
                <span class="sr-only">
                    Previous
                </span>
            </a>
            <a class="right carousel-control" data-slide="next" href="#exampleCarouselCaptions" role="button">
                <span aria-hidden="true" class="icon wb-chevron-right">
                </span>
                <span class="sr-only">
                    Next
                </span>
            </a>
        </div>
        @endif
    </div>
    <!-- End Example Captions -->
    <!-- Panel More Examples -->
    <div class="row">
        <div class="padding-top-20">
            <div class="col-md-12 col-xs-12 row">
                <form role="search" method="get" action="{{ route('data.pendamping') }}">
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" name="nama" placeholder="Cari Nama/Email Pendamping..." type="text" autofocus>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                        <i aria-hidden="true" class="icon wb-search">
                                        </i>
                                    </button>
                                </span>
                            </input>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-12 red-tiles" style="padding: 0px 2.5px;">
            <div class="col-md-12 col-xs-12 col-sm-12 col-tiles">
                <div class="tiles-title bg-brown-800">
                    <h2>
                        <i class="icon wb-user-circle">
                        </i>
                        Cari Pendampingan Bisnis
                    </h2>
                </div>
            </div>
            @foreach ($bidang_pendampingan as $row)
            <div class="col-md-3 col-xs-6 col-tiles">
                <a href="{{ route('data.pendamping') }}?pendampingan={{$row->id}}">
                    <div class="widget-content widget-radius padding-30 bg-red-800">
                        <div class="counter counter-lg">
                            <div class="counter-label text-uppercase white">
                                {{$row->nama}}
                            </div>
                            <div class="counter-number-group white">
                                <span class="counter-number">
                                    {{$row->pendamping_rel->count()}}
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="col-md-12 red-tiles" style="padding: 0px 2.5px;">
            <div class="col-md-12 col-xs-12 col-sm-12 col-tiles">
                <div class="tiles-title bg-grey-800">
                    <h2>
                        <i class="icon wb-plugin">
                        </i>
                        Cari Ahlinya
                    </h2>
                </div>
            </div>
            @foreach ($bidang_keahlian as $row)
            <div class="col-md-3 col-xs-6 col-tiles">
                <a href="{{ route('data.pendamping') }}?keahlian={{$row->id}}">
                    <div class="widget-content widget-radius padding-30 bg-orange-800">
                        <div class="counter counter-lg">
                            <div class="counter-label text-uppercase white">
                                {{$row->nama}}
                            </div>
                            <div class="counter-number-group white">
                                <span class="counter-number">
                                    {{$row->pendamping_rel->count()}}
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="col-md-12 green-tiles" style="padding: 0px;padding-left: 2.5px;">
            <div class="col-md-12 col-xs-12 col-sm-12 col-tiles">
                <div class="tiles-title bg-blue-grey-600">
                    <h2>
                        <i class="icon wb-pie-chart">
                        </i>
                        Manajemen
                    </h2>
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
                        <h4 class="tile-cap bg-blue-800">
                            UMKM
                        </h4>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-xs-6 col-tiles">
                <a id="{{route('page.pendamping')}}" href="">
                    <div class="tile" style="background:url('{{asset('images/box/pelaksana-mitra.jpg')}}') no-repeat center center;background-size: cover;">
                        <h4 class="tile-cap bg-blue-800">
                            PENDAMPING
                        </h4>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-xs-6 col-tiles">
                <a href="{{route('page.pendamping')}}">
                    <div class="tile" style="background:url('{{asset('images/box/forum.jpg')}}') no-repeat center center;background-size: cover;">
                        <h4 class="tile-cap bg-blue-800">
                            EVENT
                        </h4>
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
                                <div class="widget-content padding-20 bg-blue-grey-800 white height-full">
                                    <a class="avatar pull-left margin-right-20" href="javascript:void(0)">
                                        @if(!$row->user->image)
                                        <img alt="..." src="{{asset('remark/assets/portraits/5.jpg')}}">
                                            @else
                                            <img alt="..." src="{{asset('uploads/user/images/'.$row->user->image)}}">
                                                @endif
                                            </img>
                                        </img>
                                    </a>
                                    <div style="overflow:hidden;">
                                        <small class="pull-right grey-200">
                                            {{$row->textdate}}
                                        </small>
                                        <div class="font-size-18">
                                            {{$row->user->name}}
                                        </div>
                                        <div class="grey-200 font-size-14 margin-bottom-10">
                                            Team Lunas
                                        </div>
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
    <div class="padding-10">
    </div>
</div>
@endsection
