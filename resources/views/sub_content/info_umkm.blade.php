<ul class="list-group">
    @if(count($info_umkm))
    @foreach($info_umkm as $row)
    <li class="list-group-item">
        <div class="media">
            <div class="media-body">
                <div>
                    <span class="icon fa-bullhorn">
                    </span>
                    {{$row->textdate}}
                </div>
                {!! $row->keterangan !!}
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