@extends('layouts.mail.master')

@section('title')
Layanan Lupa Password
@endsection

@section('content')
<div class="text-center">
	<p>Password Baru Anda</p>
	<h3>Silahkan <a href="{{ url('reset-password/'.md5($data->id)) }}">Klik Disini</a></h3>
	<p>jika tidak berhasil link diatas kunjungi ini <a href="{{ url('reset-password/'.md5($data->id)) }}">{{ url('reset-password/'.md5($data->id)) }}</a></p>
</div>
@endsection