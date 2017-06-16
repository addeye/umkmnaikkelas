@extends('layouts.portal.master')

@section('css')
    <!-- Plugin -->
    {{Html::style('remark/assets/vendor/formvalidation/formValidation.css')}}
    <!-- Plugin -->
@endsection

@section('content')
    <!-- Page -->
    <div class="container-fluid">
        <div class="page-header">
            <h1 class="page-title">Layanan</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{route('informasi-pasar.index')}}">Informasi Pasar</a></li>
                <li class="active">Tambah</li>
            </ol>
        </div>

        <div class="page-content animsition">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-body">
                            <form method="post" class="form-horizontal" id="exampleStandardForm" autocomplete="off" action="{{route('informasi-pasar.store')}}" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <div class="form-group {{ $errors->has('judul') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Judul *</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="judul" placeholder="Judul.." value="{{old('judul')}}" />
                                        <span class="help-block">
                                    <strong>{{ $errors->first('judul') }}</strong>
                                </span>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('keterangan') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Keterangan *</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="keterangan" placeholder="Keterangan peluang usaha" rows="4"></textarea>
                                        <span class="help-block">
                                    <strong>{{ $errors->first('keterangan') }}</strong>
                                </span>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label class="col-sm-3 control-label">Gambar Poster *</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image" accept="image/*">
                                        <span class="help-block">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <a href="{{route('informasi-pasar.index')}}" class="btn btn-warning">Kembali</a>
                                    <button type="submit" class="btn btn-primary" id="validateButton2">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="col-md-12 row">
                                @if(count($data) !=0)
                                <div class="alert alert-alt alert-warning alert-dismissible" role="alert">
                                    Informasi Pasar akan di review terlebih dahulu oleh admin.
                                </div>
                                @endif

                                <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                                    <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $row)
                                    <tr>
                                        <td>{{$row->judul}}</td>
                                        <td>{{$row->status?'Publish':'Menunggu'}}</td>
                                        <td class="text-nowrap">
                                            <a href="{{route('informasi-pasar.show',['id'=>$row->id])}}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Show"><i class="icon fa-eye" aria-hidden="true"></i></a>
                                            <a class="btn btn-sm btn-icon btn-flat btn-default" onclick="event.preventDefault(); ConfirmDelete({{$row->id}});" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Delete"><i class="icon wb-close" aria-hidden="true"></i></a>
                                            <form id="delete-form-{{$row->id}}" action="{{route('informasi-pasar.destroy',['id'=>$row->id])}}" method="POST" style="display: none;">{{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                            </form>
                                        </td>
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
@endsection

@section('js')
    {{Html::script(asset('remark/assets/vendor/formvalidation/formValidation.min.js'))}}
    {{Html::script(asset('remark/assets/vendor/formvalidation/framework/bootstrap.min.js'))}}

    <script type="text/javascript">
        // Example Validataion Standard Mode
        // ---------------------------------
        (function() {
            $('#exampleStandardForm').formValidation({
                framework: "bootstrap",
                button: {
                    selector: '#validateButton2',
                    disabled: 'disabled'
                },
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    judul: {
                        validators: {
                            notEmpty: {
                                message: 'Judul peluang usaha'
                            }
                        }
                    },
                    keterangan: {
                        validators: {
                            notEmpty: {
                                message: 'Isi dengan benar'
                            }
                        }
                    },
                    image: {
                        validators: {
                            notEmpty: {
                                message: 'Pastikan ada gambar mengenai peluang usaha anda'
                            }
                        }
                    }
                }
            });
        })();
    </script>

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