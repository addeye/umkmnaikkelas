@extends('layouts.portal.master')

    @section('css')
<!-- Plugin -->
{{-- {{Html::style('remark/assets/vendor/raty/jquery.raty.css')}} --}}
    {{Html::style('remark/assets/css/pages/profile.css')}}

    {{-- {{Html::style('flexslider/demo/css/demo.css')}} --}}
    {{Html::style('flexslider/flexslider.css')}}

    {{Html::style('remark/assets/vendor/jquery-selective/jquery-selective.css')}}
<!-- Page -->
{{Html::style('remark/assets/css/apps/projects.css')}}
    @endsection

    @section('content')
<!-- Page -->
<div class="container-fluid page-profile">
    <div class="page-content animsition">
        <div class="row">
            <div class="col-md-4">
                <!-- Page Widget -->
                <div class="widget widget-shadow text-center">
                    <div class="widget-header">
                        <div class="widget-header-content">
                            <a class="avatar avatar-lg" href="javascript:void(0)">
                                @if($data->user->image =='')
                                <img alt="..." src="{{asset('remark/assets/portraits/5.jpg')}}">
                                    @else
                                    <img alt="..." src="{{asset('uploads/user/images/'.$data->user->image)}}">
                                        @endif
                                    </img>
                                </img>
                            </a>
                            <div class="profile-user">
                                {{$data->user->name}}
                                <br>
                                    <u style="font-size: 15px;">
                                        NIP
                                        <strong>
                                            {{$data->id_pendamping}}
                                        </strong>
                                    </u>
                                </br>
                            </div>
                            <div class="example">
                                <div class="media">
                                    <div class="media-body">
                                        <p>
                                            <i class="icon fa-map-marker">
                                            </i>
                                            Dari
                                            <strong>
                                                {{$data->kota}}
                                            </strong>
                                        </p>
                                        <p>
                                            <i class="icon wb-time">
                                            </i>
                                            Pendamping Sejak
                                            <strong>
                                                {{$data->tahun_mulai}}
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Widget -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="icon wb-image">
                            </i>
                            Scan Foto KTP
                        </h3>
                    </div>
                    <div class="panel-body">
                        <img alt="" class="center-block img-responsive" src="{{asset('uploads/pendamping/images/'.$data->foto_ktp)}}">
                        </img>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-bordered panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="icon wb-plugin">
                            </i>
                            Profil Pendamping
                        </h3>
                        <ul class="panel-actions">
                            <li>
                                <a href="{{route('update.pendamping',['id'=>Auth::user()->pendamping->id])}}">
                                    <span class="icon fa-pencil">
                                    </span>
                                    Edit Profil
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>
                                            ID Pendamping
                                        </th>
                                        <td>
                                            {{$data->id_pendamping}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Nama Lengkap
                                        </th>
                                        <td>
                                            {{$data->nama_pendamping}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Alamat Domisili
                                        </th>
                                        <td>
                                            {{$data->alamat_domisili}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Jenis Kelamin
                                        </th>
                                        <td>
                                            {{$data->jenis_kelamin=='L'?'Laki-laki':'Perempuan'}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Telepon
                                        </th>
                                        <td>
                                            {{$data->telp}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Email
                                        </th>
                                        <td>
                                            {{$data->email}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Deskripsi
                                        </th>
                                        <td>
                                            {{$data->deskripsi}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Pendidikan
                                        </th>
                                        <td>
                                            {{$data->pendidikan}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Tahun Mulai Pendampingan
                                        </th>
                                        <td>
                                            {{$data->tahun_mulai}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Pengalaman
                                        </th>
                                        <td>
                                            {{$data->pengalaman}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Sertifikat
                                        </th>
                                        <td>
                                            {{$data->sertifikat}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Bidang Pendampingan
                                        </th>
                                        <td>
                                            <ul>
                                                @foreach ($data->rel_bd_pendampingan as $row)
                                                <li>
                                                    {{$row->bidang_pendampingan->nama}}
                                                </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Bidang Keahlian
                                        </th>
                                        <td>
                                            <ul>
                                                @foreach ($data->rel_bd_keahlian as $row)
                                                <li>
                                                    {{$row->bidang_keahlian->nama}}
                                                </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Kabupaten/Kota Pendampingan
                                        </th>
                                        <td>
                                            @if($data->kabkota_id)
                                                {{Indonesia::findCity($data->kabkota_id)->name}}
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Lembaga
                                        </th>
                                        <td>
                                            {{$data->lembaga?$data->lembaga->nama_lembaga:'Lainnya'}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page -->
@endsection