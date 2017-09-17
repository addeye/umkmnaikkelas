@extends('layouts.portal.master')

@section('css')
    {{Html::style('remark/assets/vendor/datatables-bootstrap/dataTables.bootstrap.css')}}
    {{Html::style('remark/assets/vendor/datatables-fixedheader/dataTables.fixedHeader.css')}}
    {{Html::style('remark/assets/vendor/datatables-responsive/dataTables.responsive.css')}}
<!-- Plugin -->
{{Html::style('remark/assets/vendor/jquery-selective/jquery-selective.css')}}
<!-- Page -->
{{Html::style('remark/assets/css/apps/projects.css')}}
    @endsection

@section('content')
<!-- Page -->
<div class="container-fluid animsition">
    <div class="page-header">
        <h1 class="page-title">
            Pilih Jasa Pendampingan
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/')}}">
                    Home
                </a>
            </li>
            <li class="active">
                Jasa Pendampingan
            </li>
        </ol>
        <div class="page-header-actions">
            {{-- <form>
          <div class="input-search input-search-dark">
            <i class="input-search-icon wb-search" aria-hidden="true"></i>
            <input type="text" class="form-control" name="" placeholder="Search...">
          </div>
        </form> --}}
        </div>

    </div>
    <div class="app-projects page-content">
        <div class="projects-sort">
            <span class="projects-sort-label">
                Sorted by :
            </span>
            <div class="inline-block dropdown">
                <span aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" id="projects-menu" role="button">
                    Harga
                    <i aria-hidden="true" class="icon wb-chevron-down-mini">
                    </i>
                </span>
                <ul aria-labelledby="projects-menu" class="dropdown-menu" role="menu">
                    <li role="presentation">
                        <a href="javascript:void(0)" role="menuitem" tabindex="-1">
                            Termurah
                        </a>
                    </li>
                    <li class="active" role="presentation">
                        <a href="javascript:void(0)" role="menuitem" tabindex="-1">
                            Termahal
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="projects-wrap">
            <ul class="blocks blocks-100 blocks-xlg-5 blocks-md-4 blocks-sm-3 blocks-xs-2">
                @foreach ($data as $row)
                <li>
                    <div class="panel">
                        <figure class="overlay overlay-hover animation-hover">
                            @if (count($row->image) > 0)
                            <img class="caption-figure" src="{{ asset($row->image[0]->path.'/thumbs/'.$row->image[0]->file_name) }}">
                            @else
                                <img class="caption-figure" src="{{ asset('remark/assets/photos/placeholder.png') }}">
                                @endif
                                    <figcaption class="overlay-panel overlay-background overlay-fade text-center vertical-align">
                                        <a href="{{ route('konsultasi.show.jasa',['jasa_id'=>$row->id, 'order_konsultasi_id'=>$order_konsultasi_id]) }}" class="btn btn-outline btn-default project-button" type="button">
                                            View Jasa
                                        </a>
                                    </figcaption>
                                </img>
                            </img>
                        </figure>
                        <div class="time pull-right">
                            <i class="icon wb-tag"></i> {{$row->diskon}}% | Rp. {{ number_format($row->harga, 2) }}
                        </div>
                        <div>
                            {{$row->title}}
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        {{-- <nav>
            <ul class="pagination pagination-no-border">
                <li class="disabled">
                    <a aria-label="Previous" href="javascript:void(0)">
                        <span aria-hidden="true">
                            «
                        </span>
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:void(0)">
                        1
                        <span class="sr-only">
                            (current)
                        </span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        2
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        3
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        4
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        5
                    </a>
                </li>
                <li>
                    <a aria-label="Next" href="javascript:void(0)">
                        <span aria-hidden="true">
                            »
                        </span>
                    </a>
                </li>
            </ul>
        </nav> --}}
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
    {{Html::script(asset('remark/assets/vendor/jquery-selective/jquery-selective.min.js'))}}
    {{Html::script(asset('remark/assets/js/apps/app.js'))}}
    {{Html::script(asset('remark/assets/js/apps/projects.js'))}}
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
