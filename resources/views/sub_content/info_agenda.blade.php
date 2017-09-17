<ul class="list-group">
    @if(!$agenda)
    <li class="list-group-item">
        <div class="media">
            <div class="media-body">
                <h3 class="text-center"> <span class="icon fa-ban"></span> Tidak Ada Agenda</h3>
            </div>
        </div>
    </li>
    @else
    @foreach($agenda as $row)
    <li class="list-group-item contact-name">
        <div class="media media-xs">
            <div class="media-left">
                @if($row->image)
                <img alt="..." class="media-object" src="{{asset('uploads/agenda/'.$row->image)}}">
                    @else
                    <img alt="..." class="media-object" src="{{asset('remark/assets/photos/placeholder.png')}}">
                        @endif
                    </img>
                </img>
            </div>
            <div class="media-body">
                <div class="avatar avatar-sm pull-left margin-right-10 margin-top-5 tooltip-success" data-original-title="{{$row->user->name}}" data-placement="top" data-toggle="tooltip" title="">
                    <img alt="" src="{{asset('uploads/user/images/'.$row->user->image)}}">
                    </img>
                </div>
                <a href="{{url('informasi-agenda/'.$row->judul)}}">
                    <h4 class="media-heading">
                        {{$row->judul}}
                    </h4>
                </a>
                <p class="widget-metas">
                    {{$row->textdate}}
                </p>
                {{$row->deskripsi}}
            </div>
            <div class="widget-actions pull-right">
                <a href="javascript:void(0)">
                    <i class="icon fa-clock-o">
                    </i>
                    <span>
                        {{$row->tanggal_mulai}} {{$row->jam_mulai}}
                    </span>
                </a>
                <a href="javascript:void(0)">
                    <i class="icon fa-map-marker">
                    </i>
                    <span>
                        {{$row->lokasi}}
                    </span>
                </a>
            </div>
        </div>
    </li>
    @endforeach
@endif
</ul>