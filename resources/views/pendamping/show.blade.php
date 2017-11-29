@extends('layouts.apps.master')

@section('content')
    <!-- Page -->
    <div class="page animsition">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <!-- Panel Standard Mode -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="con wb-minus"></i> Detail Pendamping</h3>
                            <div class="panel-actions">
                                <div class="pull-left margin-right-20">
                                <input type="checkbox" id="inputBasicOn" name="inputiCheckBasicCheckboxes" data-plugin="switchery"
                                {{$data->validasi?'':'checked'}} />
                                </div>
                              <label class="padding-top-3" for="inputBasicOn">Validasi</label>
                              </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                    @if($data->foto_ktp)
                                        <img class="img-thumbnail" src="{{asset('uploads/pendamping/images/'.$data->foto_ktp)}}">
                                        @else
                                        <div class="padding-top-20">
                                            <span class="text-center">Tidak Ada Scan KTP</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        @if($data->user->image)
                                        <img class="img-thumbnail" src="{{asset('uploads/user/images/'.$data->user->image)}}">
                                        @else
                                        <div class="padding-top-20">
                                            <span class="text-center">Tidak Ada Foto Profil</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>ID Pendamping</th>
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
                                            <th>Deskripsi</th>
                                            <td>{{$data->deskripsi}}</td>
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
                                            <td>
                                                <ul>
                                                    @foreach ($data->rel_bd_pendampingan as $row)
                                                    <li>{{$row->bidang_pendampingan->nama}}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Bidang Keahlian</th>
                                            <td>
                                                <ul>
                                                    @foreach ($data->rel_bd_keahlian as $row)
                                                    <li>{{$row->bidang_keahlian->nama}}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
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
                                <div class="col-md-12">
                                <h4><span class="icon wb-list" ></span> Jasa Pendampingan</h4>
                                    <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Diskon</th>
                                            <th>Netto</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no = 1;?>
                                        @foreach($jasapendampingan as $row)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$row->title}}</td>
                                                <td>{{$row->deskripsi}}</td>
                                                <td>Rp. {{ number_format($row->harga, 2) }}</td>
                                                <td>{{$row->diskon}}%</td>
                                                <td>Rp. {{number_format($row->netto,2)}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Panel Standard Mode -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Page -->

    <input type="hidden" id="url" value="{{route('pendamping.validasi',['id'=>$data->id])}}">
  {{ csrf_field() }}

@endsection

@section('js')
<script type="text/javascript">
var url = $('#url').val();
var token = $('input[name=_token]').val();
  $("#inputBasicOn").change(function() {
    if(this.checked) {
        validasi(0);
    }
    else
    {
      validasi(1);
    }
});

  function validasi(val)
  {
    $.ajax({
        method: "PUT",
        url: url,
        data: { _token:token,status: val }
      })
        .done(function( msg ) {
            console.log(msg);
            alert(msg);
        });
  }
</script>
@endsection