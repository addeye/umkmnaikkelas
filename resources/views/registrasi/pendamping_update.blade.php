@extends('layouts.portal.master')

@section('css')
<!-- Plugin -->
{{Html::style('remark/assets/vendor/formvalidation/formValidation.css')}}
<!-- Plugin -->
@endsection

@section('content')
    <!-- Page -->
    <div class="container-fluid page-profile">
        <div class="page-content animsition">
            <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Update Profil Pendamping
                        </div>
                    </div>
                    <div class="panel-body">
                        <form method="post" class="form-horizontal" id="exampleStandardForm" autocomplete="off" action="{{route('doupdate.pendamping',['id'=>$data->id])}}" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="PUT">
                        <div class="form-group {{ $errors->has('id_pendamping') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">ID Pendamping *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="id_pendamping" placeholder="ID Pendamping" value="{{$data->id_pendamping}}" readonly/>
                                <span class="help-block">
                                    <strong>{{ $errors->first('id_pendamping') }}</strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nama Pendamping *</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_pendamping" placeholder="Nama Pendamping" value="{{$data->nama_pendamping}}"/>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Domisili *</label>
                          <div class="col-sm-9">
                            <textarea name="alamat_domisili" class="form-control" placeholder="Alamat Domisili Lengkap">{{$data->alamat_domisili}}</textarea>
                          </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-3 control-label">Jenis Kelamin *</label>
                        <div class="radio-custom radio-default radio-inline">
                        <input type="radio" id="inputBasicMale" name="jenis_kelamin" value="L" {{$data->jenis_kelamin=='L'?'checked':''}} />
                        <label for="inputBasicMale">Pria</label>
                        </div>
                        <div class="radio-custom radio-default radio-inline">
                        <input type="radio" id="inputBasicFemale" name="jenis_kelamin" value="P" {{$data->jenis_kelamin=='P'?'checked':''}}/>
                        <label for="inputBasicFemale">Wanita</label>
                        </div>
                        </div>
                        <div class="form-group {{ $errors->has('telp') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Telepon *</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="telp" placeholder="Telepon.." value="{{$data->telp}}" />
                    <span class="help-block">
                      <strong>{{ $errors->first('telp') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Email *</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="email" placeholder="email" value="{{$data->email}}" readonly />
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Deskripsi Tentang Anda</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="deskripsi" placeholder="Deskripsi tentang anda..">{{$data->deskripsi}}</textarea>
                    <span class="help-block">
                      <strong>{{ $errors->first('deskripsi') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('pendidikan') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Pendidikan</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="pendidikan">
                      @foreach(pendidikan() as $key=>$row)
                        <option value="{{$row}}" {{$data->pendidikan==$row?'selected':''}}>{{$row}}</option>
                        @endforeach
                    </select>
                    <span class="help-block">
                      <strong>{{ $errors->first('pendidikan') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('tahun_mulai') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Tahun Mulai *</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="tahun_mulai" placeholder="Tahun Mulai Pendampingan" value="{{$data->tahun_mulai}}"/>
                        <span class="help-block">
                            <strong>{{ $errors->first('tahun_mulai') }}</strong>
                            <strong>4 Digit</strong>
                        </span>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('pengalaman') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Pengalaman</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="pengalaman" placeholder="Pengalaman Pendampingan..">{{$data->pengalaman}}</textarea>
                    <span class="help-block">
                      <strong>{{ $errors->first('pengalaman') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('sertifikat') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Sertifikat</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="sertifikat" placeholder="Sertifikat pendampingan.." value="{{$data->sertifikat}}"/>
                    <span class="help-block">
                      <strong>{{ $errors->first('sertifikat') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('bidang_pendampingan') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Bidang Pendampingan</label>
                  <div class="col-sm-9 select2-warning">
                    <select class="form-control" name="bidang_pendampingan[]" multiple data-plugin="select2">
                        @foreach($BdPendampingan as $row)
                            <option value="{{$row->id}}" {{in_array($row->id,$data->rel_bd_pendampingan->pluck('bidang_pendampingan_id')->toArray())?'selected':''}} >{{$row->nama}}</option>
                        @endforeach
                    </select>
                    <span class="help-block">
                      <strong>{{ $errors->first('bidang_pendampingan') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('bidang_keahlian') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Bidang Keahlian</label>
                  <div class="col-sm-9 select2-warning">
                    <select class="form-control" multiple data-plugin="select2" name="bidang_keahlian[]">
                        @foreach($BdKeahlian as $row)
                            <option value="{{$row->id}}" {{in_array($row->id,$data->rel_bd_keahlian->pluck('bidang_keahlian_id')->toArray())?'selected':''}} >{{$row->nama}}</option>
                        @endforeach
                    </select>
                    <span class="help-block">
                      <strong>{{ $errors->first('bidang_keahlian') }}</strong>
                    </span>
                  </div>
                </div>

                <div class="form-group {{ $errors->has('kabkota_id') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Kab/Kota Pendampingan *</label>
                  <div class="col-sm-9">
                    <select class="form-control" data-plugin="select2" name="kabkota_id">
                      @foreach(Indonesia::allCities() as $row)
                        <option value="{{$row->id}}" {{$data->kabkota_id==$row->id?'selected':''}}>{{$row->name}}</option>
                      @endforeach
                    </select>
                    <span class="help-block">
                      <strong>{{ $errors->first('kabkota_id') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('kabkota_tambahan') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Kab/Kota Tambahan</label>
                  <div class="col-sm-9 select2-warning">
                    <select class="form-control" multiple data-plugin="select2" name="kabkota_tambahan[]">
                        @foreach(Indonesia::allCities() as $row)
                            <option value="{{$row->id}}" {{in_array($row->id,$kab_tambahan_arr)?'selected':''}} >{{$row->name}}</option>
                        @endforeach
                    </select>
                    <span class="help-block">
                      <strong>{{ $errors->first('kabkota_tambahan') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('lembaga_id') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Lembaga *</label>
                  <div class="col-sm-9 select2-warning">
                    <select class="form-control" data-plugin="select2" name="lembaga_id">
                      @foreach($lembaga as $row)
                        <option value="{{$row->id}}" {{$data->lembaga_id==$row->id?'selected':''}} >{{$row->nama_lembaga}}</option>
                      @endforeach
                    </select>
                    <span class="help-block">
                      <strong>{{ $errors->first('lembaga_id') }}</strong>
                    </span>
                  </div>
                </div>
                <div class="form-group {{ $errors->has('foto_ktp') ? ' has-error' : '' }}">
                  <label class="col-sm-3 control-label">Foto KTP</label>
                  <div class="col-sm-9">
                    <input id="input-2" name="foto_ktp" type="file" class="file" data-show-upload="false" data-show-caption="true">
                    <span class="help-block">
                        <strong>Kosongi jika tidak diganti</strong>
                    <strong>Jpg, max 300kb</strong>
                      <strong>{{ $errors->first('foto_ktp') }}</strong>
                    </span>
                  </div>
                </div>
                    <div class="text-right">
                      <button type="submit" class="btn btn-primary" id="validateButton2">Update</button>
                    </div>
                      </form>
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
          icon: null,
          fields: {
              id_pendamping: {
                  validators: {
                      notEmpty: {
                          message: 'Isi dengan benar'
                      }
                  }
              },
            nama_pendamping: {
              validators: {
                notEmpty: {
                  message: 'Isi dengan benar'
                }
              }
            },
              alamat_domisili: {
                  validators: {
                      notEmpty: {
                          message: 'Isi dengan benar'
                      }
                  }
              },
              nama_pendamping: {
                  validators: {
                      notEmpty: {
                          message: 'Isi dengan benar'
                      }
                  }
              },
              jenis_kelamin: {
                  validators: {
                      notEmpty: {
                          message: 'Isi dengan benar'
                      }
                  }
              },
                  telp: {
                  validators: {
                      notEmpty: {
                          message: 'Isi dengan benar'
                      }
                  }
              },
            email: {
              validators: {
                notEmpty: {
                  message: 'Email tidak boleh kosong'
                },
                emailAddress: {
                  message: 'Alamat email anda salah'
                }
              }
            },
//              pengalaman: {
//                  validators: {
//                      notEmpty: {
//                          message: 'Isi dengan benar'
//                      }
//                  }
//              },
//              sertifikat: {
//                  validators: {
//                      notEmpty: {
//                          message: 'Isi dengan benar'
//                      }
//                  }
//              },
//              bidang_pendampingan: {
//                  validators: {
//                      notEmpty: {
//                          message: 'Isi dengan benar'
//                      }
//                  }
//              },
//              bidang_keahlian: {
//                  validators: {
//                      notEmpty: {
//                          message: 'Isi dengan benar'
//                      }
//                  }
//              },
              kabkota_id: {
                  validators: {
                      notEmpty: {
                          message: 'Isi dengan benar'
                      }
                  }
              },
              kabkota_tambahan: {
                  validators: {
                      notEmpty: {
                          message: 'Isi dengan benar'
                      }
                  }
              },
              lembaga_id: {
                  validators: {
                      notEmpty: {
                          message: 'Isi dengan benar'
                      }
                  }
              },
//            standard_content: {
//              validators: {
//                notEmpty: {
//                  message: 'The content is required and cannot be empty'
//                },
//                stringLength: {
//                  max: 500,
//                  message: 'The content must be less than 500 characters long'
//                }
//              }
//            }
          }
        });
      })();
</script>
@endsection