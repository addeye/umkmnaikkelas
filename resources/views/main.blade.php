@extends('layouts.portal.master')

@section('css')
<style type="text/css">
  .row {
    margin-right: 0px;
    margin-left: 0px;
  }
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
   display: block;
   max-width: 100%;
   height: 400px !important;
 }
</style>
@endsection

@section('content')
<!-- Quick Menu -->
<div class="container-fluid">
  <div class="row">
    <!-- Example Captions -->
    <div class="carousel slide" id="exampleCarouselCaptions" data-ride="carousel">
      <ol class="carousel-indicators carousel-indicators-fillin">
        <li class="active" data-slide-to="0" data-target="#exampleCarouselCaptions"></li>
        <li class="" data-slide-to="1" data-target="#exampleCarouselCaptions"></li>
        <li class="" data-slide-to="2" data-target="#exampleCarouselCaptions"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="width-full" src="{{url('remark/assets/photos/placeholder.png')}}" alt="..." />
          <div class="carousel-caption">
            <h3>First Slide Label</h3>
            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
          </div>
        </div>
        <div class="item">
          <img class="width-full" src="{{url('remark/assets/photos/placeholder.png')}}" alt="..." />
          <div class="carousel-caption">
            <h3>Second Slide Label</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>
        <div class="item">
          <img class="width-full" src="{{url('remark/assets/photos/placeholder.png')}}" alt="..." />
          <div class="carousel-caption">
            <h3>Third Slide Label</h3>
            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
          </div>
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
<div class="padding-20"></div>
<div class="row">
  <ul class="nav-quick nav-quick-lg row">
    <li class="col-sm-2 col-xs-4">
      <a href="javascript:void(0)">
        <i class="icon wb-settings" aria-hidden="true"></i> Settings
      </a>
    </li>
    <li class="col-sm-2 col-xs-4">
      <a href="javascript:void(0)">
        <i class="icon wb-user" aria-hidden="true"></i> User list
        <span class="label label-success">8</span>
      </a>
    </li>
    <li class="col-sm-2 col-xs-4">
      <a href="javascript:void(0)">
        <i class="icon wb-wrench" aria-hidden="true"></i> Admin tools
      </a>
    </li>
    <li class="col-sm-2 col-xs-4">
      <a href="javascript:void(0)">
        <i class="icon wb-upload" aria-hidden="true"></i> Upload
        <span class="label label-danger">13</span>
      </a>
    </li>
    <li class="col-sm-2 col-xs-4">
      <a href="javascript:void(0)">
        <i class="icon wb-lock" aria-hidden="true"></i> Lock
      </a>
    </li>
    <li class="col-sm-2 col-xs-4">
      <a href="javascript:void(0)">
        <i class="icon wb-search" aria-hidden="true"></i> Search
      </a>
    </li>
  </ul>
</div>                              
</div>
<!-- End Quick Menu -->
@endsection
