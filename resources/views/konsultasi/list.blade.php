@extends('layouts.portal.master')

@section('css')
    {{Html::style('remark/assets/vendor/datatables-bootstrap/dataTables.bootstrap.css')}}
    {{Html::style('remark/assets/vendor/datatables-fixedheader/dataTables.fixedHeader.css')}}
    {{Html::style('remark/assets/vendor/datatables-responsive/dataTables.responsive.css')}}
    @endsection

@section('content')
<!-- Page -->
<div class="container-fluid">
    <div class="page-header">
        <h1 class="page-title">
            Konsultasi
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/')}}">
                    Home
                </a>
            </li>
            <li class="active">
                Order Konsultasi
            </li>
        </ol>
    </div>
    <div class="page-content animsition">
        <div class="row">
            <div class="col-md-12">
                <!-- Panel Standard Mode -->
                <div class="panel">
                    <div class="panel-body">
                        @if (Auth::user()->role_id == ROLE_UMKM)
                            <div class="pull-right padding-right-10 padding-bottom-10"><a href="{{ route('konsultasi.create') }}"><i class="icon fa-plus"></i>  Buat Order Baru</a></div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                                    <thead>
                                        <tr>
                                            <th>
                                                ID
                                            </th>
                                            <th>
                                                Subject
                                            </th>
                                            <th>
                                                Dibuat
                                            </th>
                                            <th>
                                                Terakhir
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $row)
                                        <tr>
                                            <td>
                                                @if (Auth::user()->role_id == ROLE_PENDAMPING)
                                                    <a href="{{ route('konsultasi-pendamping.show',['id'=>$row->id]) }}">
                                                    #{{$row->code}}
                                                </a>
                                                @else
                                                    <a href="{{ route('konsultasi.show',['id'=>$row->id]) }}">
                                                    #{{$row->code}}
                                                </a>
                                                @endif

                                            </td>
                                            <td>
                                                {{$row->subject}}
                                                <br>
                                                @if ($row->jasa_pendampingan_id == '')
                                                    <a href="{{ route('konsultasi.list.jasa',['order_konsultasi_id'=>$row->id]) }}">Cari Jasa</a>
                                                @endif
                                            </td>
                                            <td>
                                                {{date('d/m/Y h:i',strtotime($row->created_at))}}
                                            </td>
                                            <td>
                                                04/08/2017 16:00
                                            </td>
                                            <td>
                                                <span class="label label-round label-warning">
                                                    {{$row->status}}
                                                </span>
                                            </td>
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
@endsection

@section('js')

    {{Html::script(asset('remark/assets/vendor/datatables/jquery.dataTables.min.js'))}}
    {{Html::script(asset('remark/assets/vendor/datatables-fixedheader/dataTables.fixedHeader.js'))}}
    {{Html::script(asset('remark/assets/vendor/datatables-bootstrap/dataTables.bootstrap.js'))}}
    {{Html::script(asset('remark/assets/vendor/datatables-responsive/dataTables.responsive.js'))}}
    {{Html::script(asset('remark/assets/vendor/datatables-tabletools/dataTables.tableTools.js'))}}

    {{Html::script(asset('remark/assets/js/components/datatables.js'))}}
@endsection
