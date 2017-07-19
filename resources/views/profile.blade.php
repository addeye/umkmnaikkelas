@extends('layouts.apps.master')

@section('content')
  <!-- Page -->
  <div class="page animsition">
    <div class="page-content">
      <!-- Panel Standard Mode -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Informasi Akun & Ganti Password</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <img class="image img-responsive" src="{{asset('uploads/user/images/'.$data->image)}}">
                                        </div>
                                        <div class="panel-footer">
                                            <div class="btn btn-success btn-xs btn-ganti-foto"><span class="icon wb-user-circle"></span> Ganti Foto Profile</div>
                                            <div class="upload-profile padding-10" style="display: none;">
                                                <form action="{{route('user-profile.foto.update')}}" method="post" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <input type="file" name="image">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-success btn-xs">Ganti Foto</button>
                                                        <button type="button" class="btn btn-warning btn-xs btn-batal-foto">Batal</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <div class="panel-action">
                                                <ul class="panel-actions">
                                                    <li><a class="btn btn-sm btn-icon btn-flat btn-default btn-edit-profile" href="javascript:void(0);" data-toggle="tooltip" data-original-title="Edit"><span class="icon wb-edit"></span> Edit</a></li>
                                                </ul>
                                            </div>
                                            <h3 class="panel-title">Infromasi Akun</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="view-akun">
                                                <div class="form-group">
                                                    <label class="form-control-static">Nama : </label>
                                                    <label class="form-control-static">{{$data->name}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-static">Email : </label>
                                                    <label class="form-control-static">{{$data->email}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-static">No Telp : </label>
                                                    <label class="form-control-static">{{$data->telp}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-static">Status : </label>
                                                    <label class="form-control-static">{{$data->status}}</label>
                                                </div>
                                            </div>
                                            <div class="edit-akun" style="display: none;">
                                               <form method="post" action="{{route('user-profile.update',['id'=>md5($data->id)])}}">
                                                   {{ csrf_field() }}
                                                   <input type="hidden" name="_method" value="PUT">
                                                   <div class="form-group">
                                                       <label class="form-control-static">Nama : </label>
                                                       <input type="text" name="name" value="{{$data->name}}" class="form-control">
                                                   </div>
                                                   <div class="form-group">
                                                       <label class="form-control-static">No Telp : </label>
                                                       <input type="text" name="telp" value="{{$data->telp}}" class="form-control">
                                                   </div>
                                                   <div class="form-group">
                                                       <label class="form-control-static">Ganti Password</label>
                                                       <input type="password" name="password" class="form-control">
                                                       <span class="help-block">Kosongi Jika Tidak Diganti</span>
                                                   </div>
                                                   <div class="form-group">
                                                       <div class="pull-right">
                                                           <button type="submit" class="btn btn-success">Simpan</button>
                                                           <button type="button" class="btn btn-warning btn-batal">Batal</button>
                                                       </div>
                                                   </div>
                                               </form>
                                            </div>
                                        </div>
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
        function editprofile() {
            $('.view-akun').hide();
            $('.edit-akun').show();
        }
        function viewprofile() {
            $('.view-akun').show();
            $('.edit-akun').hide();
        }

        $('.btn-ganti-foto').click(function () {
            $('.upload-profile ').show();
            $('.btn-ganti-foto').hide();
        });

        $('.btn-batal-foto').click(function () {
            $('.upload-profile ').hide();
            $('.btn-ganti-foto').show();
        })

        $('.btn-edit-profile').click(function () {
            editprofile();
        })

        $('.btn-batal').click(function () {
            viewprofile();
        })
    </script>
@endsection
