@extends('layouts.portal.master')

@section('content')
    <!-- Page -->
    <div class="container-fluid">
        <div class="animsition">
            <div class="page-header">
                <h1 class="page-title">Data Pendamping</h1>
                <ol class="breadcrumb">
                  <li><a href="{{ url('/') }}">Home</a></li>
                  <li class="active">Data Pendamping</li>
                </ol>
                <div class="page-header-actions">
                  <div class="row no-space width-250">
                    <div class="col-xs-12">
                      <div class="counter">
                        <span class="counter-number font-weight-medium">{{$data->total()}}</span>
                        <div class="counter-label">Total Data</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <div class="page-content container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                        <div class="panel-body">
                            <div class="text-center padding-bottom-10">
                                <form class="form-inline" method="get">
                        <div class="form-group">
                            <label class="sr-only" for="inputUnlabelUsername">
                                Nama
                            </label>
                            <input class="form-control" name="nama" placeholder="Nama/Email" type="text" value="{{$nama_select}}">
                            </input>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="inputUnlabelPassword">
                                Lembaga
                            </label>
                            <select class="form-control" name="lembaga">
                                <option value="">Lembaga</option>
                                @foreach($lembaga as $row)
                                <option value="{{$row->id}}" {{$lembaga_select==$row->id?'selected':''}} >{{$row->nama_lembaga}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="inputUnlabelPassword">
                                Pilih Kota
                            </label>
                            <select class="form-control" name="kota">
                                <option value="">Pilih Kota</option>
                                @foreach($kota as $row)
                                <option value="{{$row->id}}" {{$kota_select==$row->id?'selected':''}} >{{$row->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="inputUnlabelPassword">
                                Bidang Pendampingan
                            </label>
                            <select class="form-control" name="bidang_pendampingan">
                                <option value="">Pilih Bidang Pendampingan</option>
                                @foreach($bidang_pendampingan as $row)
                                <option value="{{$row->id}}" {{$bidang_pendampingan_select==$row->id?'selected':''}} >{{$row->nama}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="inputUnlabelPassword">
                                Bidang Keahlian
                            </label>
                            <select class="form-control" name="bidang_keahlian">
                                <option value="">Pilih Bidang Keahlian</option>
                                @foreach($bidang_keahlian as $row)
                                <option value="{{$row->id}}" {{$bidang_keahlian_select==$row->id?'selected':''}} >{{$row->nama}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">
                                <span class="icon fa-search">
                                </span>
                                Cari
                            </button>
                        </div>
                    </form>
                            </div>
                            <div class="text-right">
                                {{$data->appends($_GET)->links()}}
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Kab/Kota</th>
                                        <th>Provinsi</th>
                                        <th>Lembaga</th>
                                        <th>Bidang Pendampingan</th>
                                        <th>Bidang Keahlian</th>
                                        <th>Link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $row)
                                        <tr>
                                        <td>{{$row->id_pendamping}}</td>
                                        <td>{{$row->nama_pendamping}}</td>
                                        <td>{{$row->kota}}</td>
                                        <td>-</td>
                                        <td>{{$row->lembaga->nama_lembaga}}</td>
                                        <td>
                                            <ul>
                                            @foreach ($row->rel_bd_pendampingan as $bd)
                                                <li>{{$bd->bidang_pendampingan->nama}}</li>
                                            @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <ul>
                                            @foreach ($row->rel_bd_keahlian as $bd)
                                                <li>{{$bd->bidang_keahlian->nama}}</li>
                                            @endforeach
                                            </ul>
                                        </td>
                                        <td><a href="{{ route('data.pendamping.reportdetil',['id'=>$row->id]) }}">Detil</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script type="text/javascript">
    $('select').select2({
    dropdownAutoWidth : true,
    // width: 'auto'
})
</script>
@endsection