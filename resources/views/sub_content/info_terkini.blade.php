<ul class="list-group">
    @if(count($info_terkini))
    @foreach($info_terkini as $row)
    <li class="list-group-item">
        <div class="media">
            <div class="media-left">
                <a class="avatar avatar-online" href="javascript:void(0)">
                    @if(!$row->user->image)
                    <img alt="..." src="{{asset('remark/assets/portraits/5.jpg')}}">
                        @else
                        <img alt="..." src="{{asset('uploads/user/images/'.$row->user->image)}}">
                            @endif
                            <i>
                            </i>
                        </img>
                    </img>
                </a>
            </div>
            <div class="media-body">
                <small class="text-muted pull-right">
                    {{$row->textdate}}
                </small>
                <h4 class="media-heading">
                    {{$row->user->name}}
                </h4>
                <div>
                    {!! $row->keterangan !!}
                </div>
            </div>
        </div>
    </li>
    @endforeach
    @else
    <li class="list-group-item">
        <div class="media">
            <div class="media-body">
                <h3 class="text-center"> <span class="icon fa-ban"></span> Tidak Ada Info</h3>
            </div>
        </div>
    </li>
    @endif
</ul>