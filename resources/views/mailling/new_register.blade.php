<?php
/**
 * Created by PhpStorm.
 * User: deye
 * Date: 6/13/17
 * Time: 2:26 PM
 */
?>
<html>
<head>
    <title>Pendaftar Baru</title>
</head>
<body>
{{--{{dd($data)}}--}}
<div align="center">
    <div style="background: deepskyblue; height: 100px;">
        <h1 style="padding: 10px;">Pendaftar Baru</h1>
    </div>
    <div style="padding: 20px;">
        <h3>Terimakasih {{$data->name}} ({{$data->email}}) <br> Telah Mendaftar di LUNAS</h3>
        <p>Silahkan memilih untuk menjadi Pendamping atau UMKM</p>
        <p>Link Sebagai pendamping <a href="http://umkmnaikkelas.com/daftar-pendamping">klik disini</a></p>
        <br>
        <p>Link Sebagai UMKM <a href="http://umkmnaikkelas.com/daftar-umkm">klik disini</a></p>
        <hr>        
    </div>
    <div align="left">
        <h4>Info Terkini</h4>
        <ul>
            @foreach($info as $row)
            <li>
            <p>{{$row['user']['name']}} | {{$row['textdate']}}</p>
            {!! $row['keterangan'] !!}
            </li>
            <hr>
            @endforeach
        </ul>
    </div>
</div>
</body>
</html>
