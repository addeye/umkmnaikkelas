<div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 row padding-bottom-10">
                                    <div class="">
                                        <a href="{{route('layanan.create.agenda')}}" class="btn btn-info col-md-12"> <span class="icon wb-pencil"></span> Ajukan Agenda</a>
                                    </div>
                                </div>
                                <div class="col-md-12 row">
                                    <div class="nav-tabs-horizontal">
                                        <ul class="nav nav-tabs" data-plugin="nav-tabs" role="tablist">
                                            <li class="" role="presentation">
                                                <a data-toggle="tab" href="#tabPopular" aria-controls="tabPopular" role="tab">Popular</a>
                                            </li>
                                            <li class="active" role="presentation">
                                                <a data-toggle="tab" href="#tabRecent" aria-controls="tabRecent" role="tab">Recent</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content padding-top-20">
                                            <div class="tab-pane " id="tabPopular" role="tabpanel">

                                            </div>
                                            <div class="tab-pane active" id="tabRecent" role="tabpanel">
                                                @foreach($recent as $row)
                                                    <div class="media media-xs">
                                                        <div class="media-left">
                                                            <img class="media-object" src="{{asset('uploads/agenda/'.$row->image)}}" alt="...">
                                                        </div>
                                                        <div class="media-body">
                                                            <a href="{{route('layanan.detail.agenda',['judul'=>$row->judul])}}">
                                                                <h5 class="media-heading">{{$row->judul}}</h5>
                                                            </a>
                                                            <p class="widget-metas">{{$row->textdate}}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
