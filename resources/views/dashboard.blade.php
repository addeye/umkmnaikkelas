@extends('layouts.portal.master')

    @section('css')
<!-- Plugin -->
{{-- {{Html::style('remark/assets/vendor/raty/jquery.raty.css')}} --}}
    {{Html::style('remark/assets/css/pages/profile.css')}}
    @endsection

    @section('content')
<!-- Page -->
<div class="container-fluid page-profile">
    <div class="page-content animsition">
        <div class="row">
            @if(Auth::user()->role_id == ROLE_CALON)
            <div class="col-md-12">
                <div class="bg-warning well">
                    <strong>
                        Silahkan klik "Daftar Sebagai" Untuk melengkapi profil anda ! atau
                        <a data-target="#exampleModalWarning" data-toggle="modal" href="javascript:void(0)">
                            KLIK DISINI
                        </a>
                    </strong>
                </div>
            </div>
            @endif

            @if(Auth::user()->role_id == ROLE_PENDAMPING && Auth::user()->pendamping->validasi ==1)
            <div class="col-md-12 row">
                <div class="bg-info well">
                    <strong>
                        Terimakasih, Data pendamping anda akan divalidasi oleh admin. segera konfirmasi ke
                        <span style="color: yellow;">
                            lunas@umkmnaikkelas.com
                        </span>
                    </strong>
                    <p>Jika Telah Melakukan</p>
                    <ul>
                        <li>Pasang <strong>FOTO PROFIL</strong> anda. Berada di menu Setting Akun dipojok kanan</li>
                        <li>Menyertakan <strong>FOTO SCAN KTP</strong> di tombol Lihat Profil -> Edit Profil </li>
                    </ul>
                </div>
            </div>
            @endif
        </div>
        <div class="row">
            @if (count($event) > 0)
                @foreach ($event as $key=>$row)
                    <div class="alert alert-alt alert-warning">
                        <div class="media media">
                    <div class="media-left">
                      <a href="javascript:void(0)">
                        <img class="media-object" src="{{ asset('uploads/event/'.$row->image) }}" alt="...">
                      </a>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading">{{$row->title}}</h4>
                      {{$row->description}}
                      <p><i class="icon wb-users"></i> Quota Peserta : {{$row->quota}}</p>
                      <p><i class="icon wb-map"></i> Lokasi : {{$row->city}}</p>
                      <p class="margin-top-10">

                        @if (Auth::user()->role_id==ROLE_UMKM)
                            <a href="{{ route('event.show_akun_umkm',['id'=>$row->id]) }}" data-toggle="tooltip" data-original-title="Selengkapnya"><i class="icon wb-dropright"></i> Selengkapnya</a>
                            @else
                            <a href="{{ route('event.show_akun',['id'=>$row->id]) }}" data-toggle="tooltip" data-original-title="Selengkapnya"><i class="icon wb-dropright"></i> Selengkapnya</a>
                        @endif

                        @if(!in_array($row->id, $event_id->toArray()))
                        <a onclick="event.preventDefault(); ConfirmDelete({{$row->id}});" href="javascript:void(0)" role="menuitem" data-toggle="tooltip" data-original-title="Ikut Event"><i class="icon wb-bookmark" aria-hidden="true"></i> Ikut Event</a>
                        <form id="delete-form-{{$row->id}}" action="{{route('event.follower',['id'=>$row->id])}}" method="POST" style="display: none;">{{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        </form>
                            @else
                            <a href="javascript:void" style="color: red;"><i class="icon wb-bookmark"></i> Mengikuti</a>
                        @endif


                      </p>
                      <p class="text-right"><i class="icon wb-user-add"></i> Telah Diikuti : {{count($row->event_follower)}}</p>
                    </div>
                  </div>
                    </div>
                @endforeach

            @endif

            <div class="col-md-3">
                <!-- Page Widget -->
                <div class="widget widget-shadow text-center">
                    <div class="widget-header">
                        <div class="widget-header-content">
                            <a class="avatar avatar-lg" href="javascript:void(0)">
                                @if(!Auth::user()->image)
                                <img alt="..." src="{{asset('remark/assets/portraits/5.jpg')}}">
                                    @else
                                    <img alt="..." src="{{asset('uploads/user/images/'.Auth::user()->image)}}">
                                        @endif
                                    </img>
                                </img>
                            </a>
                            <div class="profile-user">
                                {{Auth::user()->name}}
                            </div>
                            <div class="example">

                                @if (Auth::user()->role_id == ROLE_PENDAMPING)

                                <div class="rating rating-lg" data-number="5" data-plugin="rating" data-read-only="true" data-score="{{rating(Auth::user()->pendamping->rating)}}">
                                </div>

                                @elseif(Auth::user()->role_id == ROLE_UMKM)

                                <div class="rating rating-lg" data-number="5" data-plugin="rating" data-read-only="true" data-score="{{Auth::user()->umkm->rating}}">
                                </div>

                                @endif

                            </div>
                            <div class="profile-job">
                                @if(Auth::user()->role_id == ROLE_CALON)
                                <i class="icon wb-pencil">
                                </i>
                                <a data-target="#exampleModalWarning" data-toggle="modal" href="javascript:void(0)">
                                    Daftar Sebagai
                                </a>
                                @elseif(Auth::user()->role_id == ROLE_PENDAMPING)
                                <label>
                                    Pendamping
                                </label>
                                @elseif(Auth::user()->role_id == ROLE_UMKM)
                                    UMKM
                                    @endif
                            </div>
                            <button class="btn btn-primary" id="btn-profil" type="button">
                                Lihat Profil
                            </button>
                        </div>
                    </div>
                    <div class="widget-footer">
                        @include('sub_content.widget_footer')
                    </div>
                </div>
                <!-- End Page Widget -->
            </div>
            <div class="col-md-9">

                @if (Auth::user()->role_id == ROLE_UMKM)
                <div class="row">
                    <div class="col-md-12">
                        <form role="search" method="get" action="{{ route('data.pendamping') }}">
                    <div class="form-group">
                        <div class="input-group">
                            <input id="cari" class="form-control" name="nama" placeholder="Cari Nama/Email Pendamping Untuk Konsultasi..." type="text" autofocus>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                        <i aria-hidden="true" class="icon wb-search">
                                        </i>
                                    </button>
                                </span>
                            </input>
                        </div>
                    </div>
                </form>
                    </div>
                </div>

                @endif
                <!-- Panel -->
                <div class="panel">
                    <div class="panel-body">
                        <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
                            <li class="active" role="presentation">
                                <a aria-controls="infoterkini" data-toggle="tab" href="#infoterkini" role="tab">
                                    Info Terkini
                                    <span class="badge badge-danger">
                                        {{count($info_terkini)}}
                                    </span>
                                </a>
                            </li>

                            @if(Auth::user()->role_id == ROLE_PENDAMPING)
                            <li role="presentation">
                                <a aria-controls="inforole" data-toggle="tab" href="#inforole" role="tab">
                                    Info Pendamping
                                </a>
                            </li>
                            @elseif(Auth::user()->role_id == ROLE_UMKM)
                            <li role="presentation">
                                <a aria-controls="inforole" data-toggle="tab" href="#inforole" role="tab">
                                    Info UMKM
                                </a>
                            </li>
                            @endif
                            <li role="presentation">
                                <a aria-controls="messages" data-toggle="tab" href="#messages" role="tab">
                                    Agenda
                                </a>
                            </li>
                            @if (Auth::user()->role_id != ROLE_CALON)
                                <li role="presentation">
                                <a aria-controls="order" data-toggle="tab" href="#order" role="tab">
                                    Order Konsultasi
                                </a>
                            </li>
                            @endif

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="infoterkini" role="tabpanel">
                                @include('sub_content.info_terkini')
                            </div>
                            @if(Auth::user()->role_id == ROLE_PENDAMPING)
                            <div class="tab-pane" id="inforole" role="tabpanel">
                                    @include('sub_content.info_pendamping')
                            </div>
                            @elseif(Auth::user()->role_id == ROLE_UMKM)
                            <div class="tab-pane" id="inforole" role="tabpanel">
                                    @include('sub_content.info_umkm')
                            </div>
                            @endif
                            <div class="tab-pane" id="messages" role="tabpanel">
                                @include('sub_content.info_agenda')
                            </div>
                            @if (Auth::user()->role_id != ROLE_CALON)
                            <div class="tab-pane" id="order" role="tabpanel">
                                @include('sub_content.order_konsultasi')
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- End Panel -->
            </div>
        </div>
    </div>
</div>
<!-- End Page -->
<input id="url" type="hidden" value="{{route('profil.show')}}">
    @endsection

@section('modal')
    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="exampleModalWarning" class="modal fade modal-warning" id="exampleModalWarning" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">
                            ×
                        </span>
                    </button>
                    <h4 class="modal-title">
                        LINK PENDAFTARAN !
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="example-grid">
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    Silahkan klik di bawah ini untuk memilih mendaftar sebagai apa !
                                </p>
                            </div>
                            <div class="col-md-6">
                                <span class="">
                                    <div class="widget widget-radius widget-shadow">
                                        <a href="{{route('daftar.pendamping')}}">
                                            <div class="widget-header bg-green-600 padding-30 white text-center">
                                                <i aria-hidden="true" class="icon fa-user-secret" style="font-size: 57px; color: white;">
                                                </i>
                                                <h4 class="text-center white">
                                                    PENDAMPING
                                                </h4>
                                            </div>
                                        </a>
                                    </div>
                                </span>
                            </div>
                            <div class="col-md-6">
                                <div class="widget widget-radius widget-shadow">
                                    <a href="{{route('daftar.umkm')}}">
                                        <div class="widget-header bg-blue-600 padding-30 white text-center">
                                            <i aria-hidden="true" class="icon fa-money" style="font-size: 57px; color: white;">
                                            </i>
                                            <h4 class="text-center white">
                                                UMKM
                                            </h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="exampleModalWarning" class="modal fade modal-warning" id="ModalProfil" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">
                            ×
                        </span>
                    </button>
                    <h4 class="modal-title">
                        Detail Profil Anda
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="example-grid">
                        <div id="content-profil">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</input>
@endsection

@section('js')
{{Html::script(asset('remark/assets/vendor/raty/jquery.raty.js'))}}
{{Html::script(asset('remark/assets/js/components/raty.js'))}}
<script>
    var url = $('#url').val();
    $('#btn-profil').click(function ()
    {
        $.ajax({
            url : url,
            type : 'GET'
        })
        .success(function (response) {
            $('#content-profil').html(response);
            $('#ModalProfil').modal('show');
        })

    });
</script>

    <script>

  function ConfirmDelete(id)
  {
      var id = id;
  swal({
  title: "Apakah Yakin?",
  text: "Anda akan mengikuti Event!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Iya, Event!",
  cancelButtonText: "Tidak, Batalkan!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    // swal("Deleted!", "Your imaginary file has been deleted.", "success");
    document.getElementById('delete-form-'+id).submit();
  } else {
    swal("Dibatalkan", "Event tidak jadi diikuti", "error");
  }
});
  }

</script>
@endsection
