@extends('layouts.apps.master')

@section('content')
    <!-- Page -->
  <div class="page">
    <div class="page-content">
      <h2>Selamat Datang {{Auth::user()->name}}</h2>
      <p>Ini adalah Halaman Administrator</p>
    </div>
  </div>
  <!-- End Page -->
@endsection
