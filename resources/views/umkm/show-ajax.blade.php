<div class="row">
    <div class="col-md-4">
        @if($data->path_ktp)
        <div class="col-md-12">
            <img class="img-thumbnail" src="{{asset('uploads/umkm/images/'.$data->path_ktp)}}">
        </div>
        @endif
        @if($data->path_npwp)
        <div class="col-md-12">
            <img class="img-thumbnail" src="{{asset('uploads/umkm/images/'.$data->path_npwp)}}">
        </div>
            @endif
    </div>
    <div class="col-md-8">
        <table class="table table-bordered">
            <tr>
                <th>NIU (Nomor Induk UMKM)</th>
                <td>{{$data->id_umkm}}</td>
            </tr>
            <tr>
                <th>Nama Usaha <br><a href="{{route('update.umkm',['id'=>Auth::user()->umkm->id])}}"><span class="icon fa-pencil"></span> Edit Profil</a></th>
                <td>{{$data->nama_usaha}}</td>
            </tr>
            <tr>
                <th>Nama Pemilik</th>
                <td>{{$data->nama_pemilik}}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{$data->alamat}}</td>
            </tr>
            <tr>
                <th>Kabupaten Kota</th>
                <td>{{$data->kota}}</td>
            </tr>
            <tr>
                <th>Kecamatan</th>
                <td>{{$data->kecamatan}}</td>
            </tr>
            <tr>
                <th>No KTP</th>
                <td>{{$data->no_ktp}}</td>
            </tr>
            <tr>
                <th>No NPWP</th>
                <td>{{$data->no_npwp}}</td>
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
                <th>Badan Hukum</th>
                <td>{{$data->badan_hukum}}</td>
            </tr>
            <tr>
                <th>Tahun Mulai Usaha</th>
                <td>{{$data->tahun_mulai}}</td>
            </tr>
            <tr>
                <th>Skala Usaha</th>
                <td>{{$data->skala_usaha}}</td>
            </tr>
            <tr>
                <th>Bidang Usaha</th>
                <td>{{$data->bidang_usaha->nama}}</td>
            </tr>
            <tr>
                <th>Produk</th>
                <td>{{$data->produk}}</td>
            </tr>
            <tr>
                <th>Komunitas Asosiasi</th>
                <td>{{$data->komuitas_asosiasi}}</td>
            </tr>
            <tr>
                <th>Website</th>
                <td>{{$data->website}}</td>
            </tr>
            <tr>
                <th>Facebook</th>
                <td>{{$data->facebook}}</td>
            </tr>
            <tr>
                <th>Twitter</th>
                <td>{{$data->twitter}}</td>
            </tr>
            <tr>
                <th>Whatsapp</th>
                <td>{{$data->whatsapp}}</td>
            </tr>
            <tr>
                <th>Instagram</th>
                <td>{{$data->instagram}}</td>
            </tr>
            <tr>
                <th>Online</th>
                <td>{{$data->online}}</td>
            </tr>
            <tr>
                <th>Sentra UMKM</th>
                <td>{{$data->sentra_umkm}}</td>
            </tr>
        </table>
    </div>
</div>