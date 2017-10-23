@extends('layouts.mail.master')

@section('title')
Notification
@endsection

@section('content')
<div class="text-center">
	<h3>Order Konsultasi Baru</h3>
	<p><strong>Dari : </strong> {{$data->umkm->nama_pemilik}}</p>
	<p><strong>Kepada : </strong> {{$pendamping->nama_pendamping}}</p>
	<p><strong>{{$data->textdate}}</strong></p>
</div>
@endsection