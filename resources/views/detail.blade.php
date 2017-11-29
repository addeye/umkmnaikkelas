@extends('layouts.portal.master')

@section('content')
    <!-- Page -->
    <div class="container-fluid">
        <div class="animsition">
            <div class="page-header">
                <h1 class="page-title">Data UMKM</h1>
                <ol class="breadcrumb">
                  <li><a href="{{ url('/') }}">Home</a></li>
                  <li class="active">Data UMKM</li>
                </ol>
                <div class="page-header-actions">
                  <div class="row no-space width-250 hidden-xs">
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
                                Skala Usaha
                            </label>
                            <select class="form-control" name="kota">
                                <option value="">Pilih Skala</option>
                                <option value="Mikro" {{$skala_usaha_select=='Mikro'?'selected':''}} >Mikro</option>
                                <option value="Kecil" {{$skala_usaha_select=='Kecil'?'selected':''}} >Kecil</option>
                                <option value="Menengah" {{$skala_usaha_select=='Menengah'?'selected':''}} >Menengah</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="inputUnlabelPassword">
                                Bidang Usaha
                            </label>
                            <select class="form-control" name="kota">
                                <option value="">Pilih Bidang Usaha</option>
                                @foreach($bidang_usaha as $row)
                                <option value="{{$row->id}}" {{$bidang_usaha_select==$row->id?'selected':''}} >{{$row->nama}}
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
                                        <th>NIU</th>
                                        <th>Nama</th>
                                        <th>Kab/Kota</th>
                                        <th>Skala Usaha</th>
                                        <th>Bidang Usaha</th>
                                        <th>Produk</th>
                                        <th>Link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $row)
                                        <tr>
                                        <td>{{$row->id_umkm}}</td>
                                        <td>{{$row->nama_usaha}}</td>
                                        <td>{{$row->kota}}</td>
                                        <td>{{$row->skala_usaha}}</td>
                                        <td>{{$row->bidang_usaha->nama}}</td>
                                        <td>{{$row->produk}}</td>
                                        <td><a href="">Detil</a></td>
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