@extends('layouts.portal.master')

@section('css')
    <!-- Plugin -->
    {{Html::style('remark/assets/vendor/formvalidation/formValidation.css')}}
    {{Html::style('remark/assets/vendor/summernote/summernote.css')}}
    {{Html::style('remark/assets/css/../fonts/font-awesome/font-awesome.css')}}

    {{Html::style('remark/assets/vendor/magnific-popup/magnific-popup.css')}}
    <!-- Plugin -->
    <style type="text/css">
    .form-group{
        margin-left: 0!important;
        margin-right: 0!important;
    }

</style>
    <!-- Plugin -->

    <!-- Inline -->
  <style>
    .lightbox-block {
      max-width: 600px;
      padding: 15px 20px;
      margin: 40px auto;
      overflow: auto;
      background: #fff;
      border-radius: 3px;
    }

    .form-group.row-fluid.note-group-select-from-files {
    display: none;
}
  </style>

@endsection

@section('content')
    <!-- Page -->
    <div class="container-fluid">
        <div class="page-header animsition">
            <h1 class="page-title">Pendampingan</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('/jasa-pendampingan')}}">Jasa Pendampingan</a></li>
                <li class="active">Show Data</li>
            </ol>
        </div>
        <div class="page-content animsition">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="nav-tabs-horizontal">
                              <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
                                <li class="active" role="presentation"><a data-toggle="tab" href="#exampleTabsLineOne" aria-controls="exampleTabsLineOne" role="tab" aria-expanded="true">Show</a></li>
                                <li role="presentation" class=""><a data-toggle="tab" href="#exampleTabsLineTwo" aria-controls="exampleTabsLineTwo" role="tab" aria-expanded="false">Images</a></li>
                                <li role="presentation"><a data-toggle="tab" href="#exampleTabsLineThree" aria-controls="exampleTabsLineThree" role="tab">Files</a></li>
                              </ul>
                  <div class="tab-content padding-top-20">
                    <div class="tab-pane active" id="exampleTabsLineOne" role="tabpanel">
                        <div class="col-md-6">
                            <div class="tables-responsive">
                            <table class="table">
                                <tr>
                                    <th>Judul</th>
                                    <td>{{$data->title}}</td>
                                </tr>
                                <tr>
                                    <th>Bidang Pendampingan</th>
                                    <td>
                                      <ul>
                                      @foreach ($data->jasa_rel_bidang_pendampingan as $row)
                                        <li>{{$row->bidang_pendampingan->nama}}</li>
                                      @endforeach
                                      </ul>

                                    </td>
                                </tr>
                                <tr>
                                    <th>Bidang Keahlian</th>
                                    <td>
                                      <ul>
                                      @foreach ($data->jasa_rel_bidang_keahlian as $row)
                                        <li>{{$row->bidang_keahlian->nama}}</li>
                                      @endforeach
                                      </ul>

                                    </td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{$data->deskripsi}}</td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>Rp. {{number_format($data->harga,2)}}</td>
                                </tr>
                                <tr>
                                    <th>Diskon</th>
                                    <td>{{$data->diskon}}%</td>
                                </tr>
                                <tr>
                                    <th>Netto</th>
                                    <td>Rp. {{number_format($data->netto,2)}}</td>
                                </tr>
                            </table>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Keterangan</h4>
                            {!! $data->keterangan !!}
                        </div>
                        <a href="{{ route('jasa-pendampingan.index') }}"><i class="icon wb-reply"></i> Kembali</a>
                    </div>
                    <div class="tab-pane" id="exampleTabsLineTwo" role="tabpanel">
                      <div class="example" id="exampleZoomGallery">
                            @foreach ($image as $row)
                                <div class="col-xs-3">
                                    <a class="inline-block" href="{{ asset($row->path.'/'.$row->file_name) }}" title="{{$row->file_name}}"
                          data-source="{{ url($row->path.'/'.$row->file_name) }}">
                            <img class="img-responsive" src="{{ asset($row->path.'/thumbs/'.$row->file_name) }}" width="200" />
                          </a>
                                </div>
                            @endforeach
                    </div>
                    </div>
                    <div class="tab-pane" id="exampleTabsLineThree" role="tabpanel">
                      @foreach ($file as $row)
                          <div class="col-xs-2">
                                    <a class="inline-block" href="{{ url($row->path.'/'.$row->file_name) }}" title="{{$row->file_name}}" data-source="{{ url($row->path.'/'.$row->file_name) }}">
                            <img class="img-responsive" src="{{ asset('images/help/document.jpg') }}" width="100" />
                          </a>
                          <p>{{$row->file_name}}</p>
                                </div>
                      @endforeach
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
    {{Html::script(asset('remark/assets/vendor/formvalidation/formValidation.min.js'))}}
    {{Html::script(asset('remark/assets/vendor/formvalidation/framework/bootstrap.min.js'))}}\
    {{Html::script(asset('remark/assets/vendor/summernote/summernote.min.js'))}}
    {{Html::script(asset('remark/assets/js/components/summernote.js'))}}

    {{Html::script(asset('remark/assets/vendor/magnific-popup/jquery.magnific-popup.js'))}}
    {{Html::script(asset('remark/assets/js/components/magnific-popup.js'))}}

    <script type="text/javascript">
        $(document).ready(function(){
            $('#exampleZoomGallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
          verticalFit: true,
          titleSrc: function(item) {
            return item.el.attr('title') +
              ' &middot; <a class="image-source-link" href="' + item.el
              .attr('data-source') +
              '" target="_blank"><i class="icon wb-download"></i> Download</a>';
          }
        },
        gallery: {
          enabled: true
        },
        zoom: {
          enabled: true,
          duration: 300, // don't foget to change the duration also in CSS
          opener: function(element) {
            return element.find('img');
          }
        }
      });
        });
    </script>


@endsection