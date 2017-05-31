<?php
/**
 * Created by PhpStorm.
 * User: deye
 * Date: 5/13/17
 * Time: 12:52 PM
 */
?>

<div class="row">
    @if(Auth::user()->image)
        <div class="col-xs-12 col-md-12">
            <div class="widget-header bg-green-800 white padding-15 clearfix">
                <a class="avatar avatar-lg pull-left margin-right-20" href="javascript:void(0)">
                    <img src="{{asset('uploads/user/images/'.Auth::user()->image)}}" alt="">
                </a>
                <div class="font-size-18">{{Auth::user()->name}}</div>
                <div class="grey-300 font-size-14">
                    @if(Auth::user()->role_id == ROLE_CALON)
                        <i class="icon wb-pencil"></i> <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalWarning">Daftar Sebagai</a>
                    @elseif(Auth::user()->role_id == ROLE_PENDAMPING)
                        <label>Pendamping</label>
                    @elseif(Auth::user()->role_id == ROLE_UMKM)
                        UMKM
                    @endif
                </div>
            </div>
        </div>
    @endif
    <div class="col-md-6">
            <div class="padding-top-10">
                <table class="table table-bordered">
                    <tr>
                        <th>ID Pendamping <a href="{{route('update.pendamping',['id'=>Auth::user()->pendamping->id])}}"><span class="icon fa-pencil"></span> Edit Profil</a></th>
                        <td>{{$data->id_pendamping}}</td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{$data->nama_pendamping}}</td>
                    </tr>
                    <tr>
                        <th>Alamat Domisili</th>
                        <td>{{$data->alamat_domisili}}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{$data->jenis_kelamin=='L'?'Laki-laki':'Perempuan'}}</td>
                    </tr>
                    <tr>
                        <th>Telepon</th>
                        <td>{{$data->telp}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$data->email}}</td>
                    </tr>
                    <tr>
                        <th>Pendidikan</th>
                        <td>{{$data->pendidikan}}</td>
                    </tr>
                    <tr>
                        <th>Tahun Mulai Pendampingan</th>
                        <td>{{$data->tahun_mulai}}</td>
                    </tr>
                    <tr>
                        <th>Pengalaman</th>
                        <td>{{$data->pengalaman}}</td>
                    </tr>
                    <tr>
                        <th>Sertifikat</th>
                        <td>{{$data->sertifikat}}</td>
                    </tr>
                    <tr>
                        <th>Bidang Pendampingan</th>
                        <td>{{$data->bidang_pendampingan}}</td>
                    </tr>
                    <tr>
                        <th>Bidang Keahlian</th>
                        <td>{{$data->bidang_keahlian}}</td>
                    </tr>
                    <tr>
                        <th>Bidang Usaha</th>
                        <td>{{$data->bidang_usaha}}</td>
                    </tr>
                    <tr>
                        <th>Kabupaten/Kota Pendampingan</th>
                        <td>
                            @if($data->kabkota_id)
                                {{Indonesia::findCity($data->kabkota_id)->name}}
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Kabupaten/Kota Tambahan</th>
                        <td>
                            @if(count($kabkota_tambahan_arr)>1)
                                <ol>
                                    @foreach($kabkota_tambahan_arr as $row)
                                        <li>{{Indonesia::findCity($row)->name}}</li>
                                    @endforeach
                                </ol>
                            @else
                                Tidak ada
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Lembaga</th>
                        <td>{{$data->lembaga?$data->lembaga->nama_lembaga:'Lainnya'}}</td>
                    </tr>
                </table>
            </div>
        </div>
    <div class="col-md-6">
        <div class="col-xs-6 col-md-12">
            <div class="widget widget-shadow">
                <div class="widget-header bg-orange-600 white text-center">
                    <img class="img-responsive" src="{{asset('uploads/pendamping/images/'.$data->foto_ktp)}}" alt="">
                </div>
            </div>
        </div>
    </div>

</div>
