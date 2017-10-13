@extends('layouts.mail.master')

@section('title')
Layanan Apps Kirim Password Baru
@endsection

@section('content')
<div class="text-center">
	<p>Password Baru Anda</p>
	<h3>{{$pass}}</h3>
</div>
@endsection