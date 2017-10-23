@extends('layouts.portal.master')

@section('content')
<!-- Page -->
<div class="container-fluid">
    <div class="page-header animsition">
        <h1 class="page-title">
            Pendamping
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/')}}">
                    Home
                </a>
            </li>
            <li class="active">
                Pendamping
            </li>
        </ol>
    </div>
    <div class="animsition">
        <div class="page-content container-fluid">
            <div class="col-md-3 hidden-xs hidden-md hidden-sm">
                <div><ul>
                    <li><strong><a href="{{ route('data.pendamping') }}">Semua Pendamping</a></strong></li>
                    <li><strong>Bidang Pendampingan</strong>
                        <ul>
                            @foreach ($bidang_pendampingan as $row)
                            <li><a href="{{ route('data.pendamping') }}?pendampingan={{$row->id}}">{{$row->nama}} ({{$row->pendamping_rel->count()}})</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><strong>Bidang Keahlian</strong>
                        <ul>
                            @foreach ($bidang_keahlian as $row)
                            <li><a href="{{ route('data.pendamping') }}?keahlian={{$row->id}}">{{$row->nama}} ({{$row->pendamping_rel->count()}})</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul></div>
            </div>
            <div class="col-md-9 row">
                <div class="row">
                <div class="col-md-12 padding-bottom-10">
                    <form class="form-inline" method="get">
                        <div class="form-group">
                            <label class="sr-only" for="inputUnlabelUsername">
                                Nama
                            </label>
                            <input class="form-control" name="nama" placeholder="Nama/Email" type="text" value="{{$nama}}">
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
                        <div class="form-group hidden-lg">
                            <label class="sr-only" for="inputUnlabelPassword">
                                Bidang Pendampingan
                            </label>
                            <select class="form-control" name="pendampingan">
                                <option value="">Bidang Pendampingan</option>
                                @foreach($bidang_pendampingan as $row)
                                <option value="{{$row->id}}" {{$bidang_pendampingan_select==$row->id?'selected':''}} >{{$row->nama}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group hidden-lg">
                            <label class="sr-only" for="inputUnlabelPassword">
                                Bidang Keahlian
                            </label>
                            <select class="form-control" name="keahlian">
                                <option value="">Bidang Keahlian</option>
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
                <div class="col-md-12">
                    <div class="row">
                        @foreach($pendamping as $row)
                        <div class="col-lg-4 col-md-4">
                            <div class="widget">
                                <div class="widget-header white bg-cyan-600 padding-30 clearfix">
                                    <a class="avatar avatar-100 pull-left margin-right-20" href="{{route('page.pendamping.detail',['id'=>$row->id])}}">
                                        @if($row->user->image=='')
                                        <img alt="" src="{{asset('remark/assets/portraits/5.jpg')}}">
                                            @else
                                            <img alt="" src="{{asset('uploads/user/images/'.$row->user->image)}}" style="height: 100px">
                                                @endif
                                            </img>
                                        </img>
                                    </a>
                                    <div class="pull-left">
                                        <div class="font-size-15 margin-bottom-15">
                                            {{$row->nama_pendamping}}
                                        </div>
                                        <div class="font-size-15">
                                            <p class="margin-bottom-5 text-nowrap">
                                                <i aria-hidden="true" class="icon wb-user-circle margin-right-10">
                                                </i>
                                                <span class="text-break">
                                                    {{$row->rel_bd_keahlian[0]->bidang_keahlian->nama}}
                                                </span>
                                            </p>
                                            <p class="margin-bottom-5 text-nowrap">
                                                <i aria-hidden="true" class="icon wb-plugin margin-right-10">
                                                </i>
                                                <span class="text-break">
                                                    {{$row->rel_bd_pendampingan[0]->bidang_pendampingan->nama}}
                                                </span>
                                            </p>
                                            <p class="margin-bottom-5 text-nowrap">
                                                <i aria-hidden="true" class="icon fa-home margin-right-10">
                                                </i>
                                                <span class="text-break">
                                                    @if($row->kabkota_id)
                                                    {{Indonesia::findCity($row->kabkota_id)->name}}
                                                    @else
                                                    -
                                                    @endif
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content bg-white container-fluid">
                                    <div class="row no-space padding-vertical-20 padding-horizontal-30 text-center">
                                        <div class="col-xs-4">
                                            <div class="counter">
                                                <span class="counter-number cyan-600">
                                                    {{$row->totjasa}}
                                                </span>
                                                <div class="counter-label">
                                                    Jasa
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="counter">
                                                <span class="counter-number cyan-600">
                                                    {{$row->totumkm}}
                                                </span>
                                                <div class="counter-label">
                                                    UMKM
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="counter">
                                                <span class="counter-number cyan-600">
                                                    {{$row->totkegiatan}}
                                                </span>
                                                <div class="counter-label">
                                                    Kegiatan
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-md-12">
                            <div class="pagination">
                                {{$pendamping->appends($_GET)->links()}}
                            </div>
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
