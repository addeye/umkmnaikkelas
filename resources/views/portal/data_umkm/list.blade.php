@extends('layouts.portal.master')

@section('css')
    {{Html::style('remark/assets/vendor/datatables-bootstrap/dataTables.bootstrap.css')}}
    {{Html::style('remark/assets/vendor/datatables-fixedheader/dataTables.fixedHeader.css')}}
    {{Html::style('remark/assets/vendor/datatables-responsive/dataTables.responsive.css')}}
    @endsection

@section('content')
    <!-- Page -->
    <div class="container-fluid page-profile">
        <div class="page-content animsition">
            <div class="row">
                <div class="col-md-12">
                    <!-- Panel Standard Mode -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data UMKM</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                                        <thead>
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Tanggal</th>
                                            <th rowspan="2">Omset</th>
                                            <th rowspan="2">Aset</th>
                                            <th colspan="2">Pegawai</th>
                                            <th rowspan="2">Varian Produk</th>
                                            <th rowspan="2">Kapasitas Produk</th>
                                            <th rowspan="2">Aksi</th>
                                        </tr>
                                        <tr>
                                            <th>Tetap</th>
                                            <th>Tidak</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php $no=1; ?>
                                        @foreach($data as $row)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{date('d/m/Y',strtotime($row->tgl_pencatatan))}}</td>
                                                <td>Rp. {{number_format($row->omset)}}</td>
                                                <td>Rp. {{number_format($row->aset)}}</td>
                                                <td>{{$row->jml_tenagakerja_tetap}}</td>
                                                <td>{{$row->jml_tenagakerjatidak_tetap}}</td>
                                                <td>{{$row->varian_produk}}</td>
                                                <td>{{$row->kapasitas_produksi}}</td>
                                                <td class="text-nowrap">
                                                    <a href="{{route('data-periode.edit',['id'=>$row->id])}}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit"><i class="icon wb-wrench" aria-hidden="true"></i></a>
                                                    <a class="btn btn-sm btn-icon btn-flat btn-default" onclick="event.preventDefault(); ConfirmDelete({{$row->id}});" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Delete"><i class="icon wb-close" aria-hidden="true"></i></a>
                                                    <form id="delete-form-{{$row->id}}" action="{{route('data-periode.destroy',['id'=>$row->id])}}" method="POST" style="display: none;">{{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="DELETE">
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="floating" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tambah Data">
                                        <a href="{{route('data-periode.create')}}"><i class="icon wb-plus" aria-hidden="true"></i></a>
                                    </div>
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
    <script>

        function ConfirmDelete(id)
        {
            var id = id;
            swal({
                    title: "Apakah Yakin?",
                    text: "Data akan benar-benar dihapus!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Iya, Hapus!",
                    cancelButtonText: "Tidak, Batalkan!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        document.getElementById('delete-form-'+id).submit();
                    } else {
                        swal("Dibatalkan", "Data tidak jadi dihapus", "error");
                    }
                });
        }

    </script>
@endsection