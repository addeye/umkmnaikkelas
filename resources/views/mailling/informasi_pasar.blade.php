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
    <title>Informasi Pasar</title>
</head>
<body>
{{--{{dd($data)}}--}}
<div align="center">
    <div style="background: deepskyblue; height: 100px;">
        <h1 style="padding: 10px;">Informasi Pasar</h1>
    </div>
    <div style="padding: 20px;">
        <h3>Sdr {{$data['name']}} ({{$data['email']}}) <br> Telah Menambah Informasi Pasar di LUNAS</h3>
        <p>Silahkan Di Validasi <a href="{{route('info-pasar.detail',['id'=>$data['id']])}}">Klik Disini</a></p>       
        <hr>        
    </div>
    <div align="left">
        <h4>Informasi Pasar Belum Publish</h4>
        <ul>
            @foreach($info as $row)
            <li>
            <p>{{$row['user']['name']}} | {{$row['textdate']}}</p>
            <p style="font-size: 20px; font-weight: bold;"><a href="{{route('info-pasar.detail',['id'=>$row['id']])}}">{!! $row['judul'] !!}</a></p>
            {!! $row['keterangan'] !!}
            </li>
            <hr>
            @endforeach
        </ul>
    </div>
</div>
</body>
</html>
