@extends('layouts.portal.master')

@section('css')
{{Html::style('croppie/croppie.css')}}

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style type="text/css">
        body{
            background-color: #f5f5f5;
        }
        .panel{
            background-color: #fff;
        }
        .panel-heading {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
            font-size: 16px !important;
            /*color: inherit !important;*/
            /*color: #595959!important;*/
        }

        .content-wrapper{
            padding: 18px 15px;
            color: #787878;
            border-top:1px solid rgba(0,0,0,0.06);
        }

        .panel-heading a:hover{
            text-decoration: underline;
        }

        .content-wrapper:first-of-type{
            border-top:0;
        }
        
        i.material-icons{
            float: right;
            margin-left: 5px;
            font-size: 18px;
        }

        .profile-details{
            margin-top: 25px;
            margin-left: 15px;
        }

        .u-detail-content{
            margin-top: 1px;
        }

        .profile-content .row{
            margin-top: 20px;
        }

        .profile-content .row:first-of-type{
            margin-top: 0;
        }

        .change-option{
            /*display: none;*/
            margin-left: 5px;
            margin-right: 5px;
            position: relative;
            top: auto;
            /*bottom: 10px;*/
            background-color: rgba(0,0,0,0.6);
            color: #fff;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .image-crop-wrapper{
            position: fixed;
            z-index: 9999999999999999;
            top: 50%;
            left: 50%;
            transform: translate(-50% ,-50%);
            display: none;
            background-color: #fff;
            width: auto;
            height: auto;
            padding:40px 60px;

        }

        body.image-crop:before{
            background-color: rgba(0,0,0,0.4);
            content: '';
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 9999999999;
        }
    </style>
@endsection

@section('content')
    <!-- Page -->
    <div class="container-fluid">
        <div class="page-content animsition">
            <div class="row">
                <div class="col-md-12">
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
                                            <div class="profile-userpic">
                                            {!! Form::open(['url'=>route('profile.foto.update'), 'method'=>'post','class' => 'simpanfoto', 'files'=>'true']) !!}
                                                <input type="hidden" name="cropped"  value="">
                                                <input type="hidden" name="user_id" value="{{ $data->id }}">
                                                <div class="img-overlay">
                                                    <img src="{{ $data->image == null ? url(asset('images/default-user.jpg')) : url(asset('uploads/user/images')).'/'.$data->image }}" class="img-responsive" alt="">
                                                    <a href="javascript:void(0)" class="pp pull-right" title="Change profile picture"><i class="icon wb-image"> Ganti</i></a>
                                                    <input type="file" name="profile_picture" accept="image/*" class="profile_picture" style="display: none;">
                                                </div>
                                            {!! Form::close() !!}
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
                                               <form method="post" action="{{route('profile.update')}}">
                                                   {{ csrf_field() }}
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
        </div>
    </div>
    <!-- End Page -->

@endsection

@section('modal')
    <meta name="_token" content="{!! csrf_token() !!}" />
    <div class="image-crop-wrapper">
        <!-- <img src="" class="image-crop-content"> -->
        <div class="image-cropper">
            
        </div>
        <div class="pull-right">
            <button type="button" class="btn btn-default btn-cancel">Cancel</button>
            <button type="button" class="btn btn-success btn-submit">Save</button>
        </div>
    </div>
@endsection

@section('js')
{{Html::script(asset('croppie/croppie.js'))}}
    <script>
    $(document).ready(function(){

      $uploadCrop = $('.image-cropper').croppie({
                enableExif: true,
                viewport: {
                    width: 200,
                    height: 200,
                    // type: 'circle'
                },
                boundary: {
                    width: 350,
                    height: 350
                }
            });

      $('.profile-userpic').on('click', '.pp', function(){
                $('input[name="profile_picture"]').click();
            });

        $(".profile_picture").change(function(){
                $('.image-crop-wrapper').show();
                $('body').addClass('image-crop');
                readURL(this);
                $uploadCrop.croppie('bind');
            });

            $('.btn-cancel').click(function(){
                $('.image-crop-wrapper').hide();
                $('body').removeClass('image-crop');
            });

            $('.btn-submit').click(function(){
                $uploadCrop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function (resp) {
                    $('input[name="cropped"]').val(resp);
                    $('.simpanfoto').submit();
                });
            });

    });

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

      function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                    
                reader.onload = function (e) {
                    // $('.image-crop-content').attr('src', e.target.result);
                    $uploadCrop.croppie('bind', e.target.result);   
                }
                    
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
