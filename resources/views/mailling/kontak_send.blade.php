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
    <title>Pesan Dari Pengunjung</title>
</head>
<body>
{{--{{dd($data)}}--}}
<div align="center">
    <div style="background: deepskyblue; height: 100px;">
        <h1 style="padding: 10px;">Pesan Dari Pengunjung</h1>
    </div>
    <div style="padding: 20px;">
        <table width="100%" border="0" cellpadding="10" cellspacing="0">
            <tr>
                <th align="right" valign="top">Nama</th>
                <th valign="top">:</th>
                <td>{{$data['nama']}}</td>
            </tr>
            <tr>
                <th align="right" valign="top">Email</th>
                <th valign="top">:</th>
                <td>{{$data['email']}}</td>
            </tr>
            <tr>
                <th align="right" valign="top">Telepon</th>
                <th valign="top">:</th>
                <td>{{$data['telp']}}</td>
            </tr>
            <tr>
                <th align="right" valign="top">Judul</th>
                <th valign="top">:</th>
                <td>{{$data['judul']}}</td>
            </tr>
            <tr>
                <th align="right" valign="top">Pesan</th>
                <th valign="top">:</th>
                <td>{{$data['pesan']}}</td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
