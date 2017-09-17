@extends('layouts.portal.master')

@section('css')
<!-- Plugin -->
{{Html::style('remark/assets/vendor/formvalidation/formValidation.css')}}
{{Html::style('remark/assets/vendor/clockpicker/clockpicker.css')}}
{{Html::style('remark/assets/vendor/bootstrap-datepicker/bootstrap-datepicker.css')}}

{{Html::style('remark/assets/vendor/summernote/summernote.css')}}
{{Html::style('remark/assets/css/../fonts/font-awesome/font-awesome.css')}}
<!-- Plugin -->
@endsection

@section('content')
<!-- Page -->
<div class="container-fluid">
    <div class="page-header">
        <h1 class="page-title">Layanan</h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{route('layanan.info.agenda')}}">Agenda</a></li>
            <li class="active">Tambah</li>
        </ol>
    </div>

    <div class="page-content animsition">
        <div class="row">
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-body">
                        <form method="post" class="form-horizontal" id="exampleStandardForm" autocomplete="off" action="{{route('layanan.store.agenda')}}" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                            <div class="form-group {{ $errors->has('judul') ? ' has-error' : '' }}">
                              <label class="col-sm-3 control-label">Judul*</label>
                              <div class="col-sm-9">
                                <input type="text" name="judul" class="form-control" value="{{old('judul')}}" placeholder="Judul agenda" required>
                                <span class="help-block">
                                  <strong>{{ $errors->first('judul') }}</strong>
                              </span>
                          </div>
                      </div>

                      <div class="form-group {{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                          <label class="col-sm-3 control-label">Deskripsi *</label>
                          <div class="col-sm-9">
                            <textarea id="deskripsi" name="deskripsi" data-fv-stringlength="true" data-fv-stringlength-max="300" data-fv-stringlength-message="Isi kurang dari 300 karakter"
                            placeholder="maksimal = 300 Karakter" class="form-control" placeholder="Deskripsi singkat.." required>{{old('deskripsi')}}</textarea>
                            <span id="count" class="help-block">
                              <strong>{{ $errors->first('deskripsi') }}</strong>
                          </span>
                      </div>
                  </div>

                  <div class="form-group {{ $errors->has('keterangan') ? ' has-error' : '' }}">

                      <div class="col-sm-12">
                        <textarea data-plugin="summernote" data-plugin-options='{"toolbar":[["style", ["bold", "italic", "underline", "clear"]],["color", ["color"]],["para", ["ul", "ol", "paragraph"]]]}' name="keterangan" class="form-control" placeholder="Keterangan detailnya.." rows="5">{{old('keterangan')}}</textarea>
                        <span class="help-block">
                          <strong>{{ $errors->first('keterangan') }}</strong>
                      </span>
                  </div>
              </div>

              <div class="form-group {{ $errors->has('lokasi') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Lokasi*</label>
                  <div class="col-sm-9">
                    <select name="lokasi" class="form-control" data-plugin="select2" required="">
                      <option value="">Pilih Kabupaten/Kota</option>
                      @foreach($kabkota as $row)
                      <option value="{{$row->name}}">{{$row->name}}</option>
                      @endforeach
                  </select>
                  <span class="help-block">
                      <strong>{{ $errors->first('keterangan') }}</strong>
                  </span>
              </div>
          </div>

          <div class="form-group {{ $errors->has('tanggal_mulai') ? ' has-error' : '' }} {{ $errors->has('tanggal_selesai') ? ' has-error' : '' }}">
              <label class="col-sm-3 control-label">Tanggal*</label>
              <div class="col-sm-9">
                <div class="input-daterange" data-plugin="datepicker" data-date-format="yyyy-mm-dd">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="icon wb-calendar" aria-hidden="true"></i>
                  </span>
                  <input type="text" class="form-control" name="tanggal_mulai" required/>
              </div>
              <div class="input-group">
                <span class="input-group-addon">to</span>
                <input type="text" class="form-control" name="tanggal_selesai" />
            </div>
        </div>

        <span class="help-block">
            <strong>{{ $errors->first('tanggal_mulai') }}</strong>
            <strong>{{ $errors->first('tanggal_selesai') }}</strong>
        </span>
    </div>
</div>

<div class="form-group {{ $errors->has('jam_mulai') ? ' has-error' : '' }} {{ $errors->has('jam_selesai') ? ' has-error' : '' }}">
  <label class="col-sm-3 control-label">Waktu</label>
  <div class="col-sm-9">
    <div class="input-daterange">
        <div class="input-group">
            <span class="input-group-addon">
              <i class="icon wb-time" aria-hidden="true"></i>
          </span>
          <input type="text" class="form-control" name="jam_mulai" data-plugin="clockpicker" data-autoclose="true" required/>
      </div>
      <div class="input-group">
          <span class="input-group-addon">to</span>
          <input type="text" class="form-control" name="jam_selesai" data-plugin="clockpicker" data-autoclose="true"/>
      </div>
  </div>
  <span class="help-block">
      <strong>{{ $errors->first('jam_mulai') }}</strong>
      <strong>{{ $errors->first('jam_selesai') }}</strong>
  </span>
</div>
</div>

<div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
  <label class="col-sm-3 control-label">Gambar</label>
  <div class="col-sm-9">
    <input type="file" name="image" id="input-1" class="file" data-show-upload="false" data-show-caption="true">
    <span class="help-block">
      <strong>{{ $errors->first('image') }}</strong>
  </span>
</div>
</div>

<div class="text-right">
    <a href="{{route('layanan.info.agenda')}}" class="btn btn-warning">Kembali</a>
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
                    Informasi Agenda akan di review terlebih dahulu oleh admin.
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
                                <a href="{{route('layanan.detail.agenda',['id'=>$row->judul])}}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Show"><i class="icon fa-eye" aria-hidden="true"></i></a>
                                <a class="btn btn-sm btn-icon btn-flat btn-default" onclick="event.preventDefault(); ConfirmDelete({{$row->id}});" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Delete"><i class="icon wb-close" aria-hidden="true"></i></a>
                                <form id="delete-form-{{$row->id}}" action="{{route('layanan.destroy.agenda',['id'=>$row->id])}}" method="POST" style="display: none;">{{ csrf_field() }}
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

{{Html::script(asset('remark/assets/vendor/clockpicker/bootstrap-clockpicker.min.js'))}}
{{Html::script(asset('remark/assets/js/components/clockpicker.js'))}}

{{Html::script(asset('remark/assets/vendor/bootstrap-datepicker/bootstrap-datepicker.js'))}}
{{Html::script(asset('remark/assets/js/components/bootstrap-datepicker.js'))}}

{{Html::script(asset('remark/assets/vendor/summernote/summernote.min.js'))}}
{{Html::script(asset('remark/assets/js/components/summernote.js'))}}

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
                                message: 'Judul agenda anda'
                            }
                        }
                    },
                    deskripsi: {
                        validators: {
                            notEmpty: {
                                message: 'Isi dengan benar'
                            }
                        }
                    },
                    lokasi: {
                        validators: {
                            notEmpty: {
                                message: 'Silahkana pilih kota'
                            }
                        }
                    },
                    tanggal_mulai: {
                        validators: {
                            notEmpty: {
                                message: 'Silahkana masukkan tanggal'
                            }
                        }
                    },
                    jam_mulai: {
                        validators: {
                            notEmpty: {
                                message: 'Silahkana masukkan jam'
                            }
                        }
                    },
                    image: {
                        validators: {
                            notEmpty: {
                                message: 'Pastikan ada gambar mengenai agenda anda'
                            }
                        }
                    }
                }
            });
        })();
    </script>

    <script>
        $("textarea[maxlength]").on("propertychange input", function() {
            if (this.value.length > this.maxlength) {
                this.value = this.value.substring(0, this.maxlength);
            }
        });

        document.getElementById('deskripsi').onkeyup = function () {

            document.getElementById('count').innerHTML = "Kurang : " + (300 - this.value.length) + " Karakter";
      };

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