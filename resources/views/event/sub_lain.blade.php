<div class="panel">
    <div class="panel-body">
        <h4 class="example-title">
            Event Lain
        </h4>
        <div class="list-group">
          @if (count($recent) > 0)
            @foreach ($recent as $row)
              <a class="list-group-item" href="{{ route('event.show_akun',['id'=>$row->id]) }}">
                <h4 class="list-group-item-heading">
                    {{$row->title}}
                </h4>
                <p class="list-group-item-text">
                    Quota/Ikut <span class="label label-warning">{{$row->quota}}/{{count($row->event_follower)}}</span>
                </p>
            </a>
          @endforeach
          @else
          <h4><i class="icon fa-trash"></i> Belum ada riwayat</h4>
          @endif
        </div>
    </div>
</div>