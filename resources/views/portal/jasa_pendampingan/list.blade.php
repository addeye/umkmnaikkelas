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
                            <h3 class="panel-title">List Jasa Pendampingan</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Diskon</th>
                                            <th>Netto</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Diskon</th>
                                            <th>Netto</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($data as $row)
                                            <tr>
                                                <td>{{$row->id}}</td>
                                                <td>{{$row->title}}</td>
                                                <td>{{$row->deskripsi}}</td>
                                                <td>{{$row->harga}}</td>
                                                <td>{{$row->diskon}}</td>
                                                <td>{{$row->netto}}</td>
                                                <td class="text-nowrap">
                                                    <a href="{{route('jasa-pendampingan.edit',['id'=>$row->id])}}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit"><i class="icon wb-wrench" aria-hidden="true"></i></a>
                                                    <a class="btn btn-sm btn-icon btn-flat btn-default" onclick="event.preventDefault(); ConfirmDelete({{$row->id}});" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Delete"><i class="icon wb-close" aria-hidden="true"></i></a>
                                                    <form id="delete-form-{{$row->id}}" action="{{route('jasa-pendampingan.destroy',['id'=>$row->id])}}" method="POST" style="display: none;">{{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="DELETE">
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="floating" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tambah Data">
                                        <a href="{{route('jasa-pendampingan.create')}}"><i class="icon wb-plus" aria-hidden="true"></i></a>
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