@extends('layouts.mail.master')

@section('title')
Pengguna Baru {{$data->role->nama}}
@endsection

@section('content')
<div align="center">
	<h1>Pengguna Baru</h1>
	<h3>{{$data->name}}</h3>
	<p>{{$data->email}}</p>
	<p>{{$data->telp}}</p>
	<p>Sebagai {{$data->role->nama}}</p>
</div>
@endsection