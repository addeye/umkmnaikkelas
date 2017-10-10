@extends('layouts.apps.master')

@section('content')
    <!-- Page -->
  <div class="page animsition">
    <div class="page-content">
        <!-- Panel Standard Mode -->
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="panel-action">
                                <ul class="panel-actions">
                                    <li><a class="btn btn-sm btn-icon btn-flat btn-default" href="{{route('page_static.edit',['id'=>$data->id])}}" data-toggle="tooltip" data-original-title="Edit"><span class="icon wb-edit"></span> Edit</a></li>
                                    <li>
                                        <a class="btn btn-sm btn-icon btn-flat btn-default" onclick="event.preventDefault(); ConfirmDelete({{$data->id}});" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Delete"><i class="icon wb-close" aria-hidden="true"></i> Hapus</a>
                                        <form id="delete-form-{{$data->id}}" action="{{route('page_static.destroy',['id'=>$data->id])}}" method="POST" style="display: none;">{{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="panel-title">{{$data->title}}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="padding-top-20">
                                      {!! $data->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Panel Standard Mode -->
    </div>
  </div>
  <!-- End Page -->
@endsection

@section('js')
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

