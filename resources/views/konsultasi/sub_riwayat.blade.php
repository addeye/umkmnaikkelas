<div class="panel">
    <div class="panel-body">
        <h4 class="example-title">
            Riwayat Konsultasi
        </h4>
        <div class="list-group">
          @if (count($riwayat) > 0)
            @foreach ($riwayat as $row)
            @if (Auth::user()->role_id == ROLE_UMKM)
            <a class="list-group-item" href="{{ route('konsultasi.show',['id'=>$row->id]) }}">
                <h4 class="list-group-item-heading">
                    {{$row->subject}}
                </h4>
                <p class="list-group-item-text">
                    Status <span class="label label-warning">{{$row->status}}</span>
                    @if ($row->status == 'Tolak' OR $row->status== 'Tutup')
                      {{date('d/m/Y',strtotime($row->updated_at))}}
                    @endif
                </p>
                <p>Pendamping : {{$row->jasa_pendampingan->pendamping->nama_pendamping}} - {{$row->bidang_pendampingan->nama}}</p>
            </a>
            @else
              <a class="list-group-item" href="{{ route('konsultasi-pendamping.show',['id'=>$row->id]) }}">
                <h4 class="list-group-item-heading">
                    {{$row->subject}}
                </h4>
                <p class="list-group-item-text">
                    Status <span class="label label-warning">{{$row->status}}</span>
                </p>
                <p>UMKM : {{$row->umkm->nama_usaha}} - {{$row->umkm->kota}}</p>
            </a>
            @endif
          @endforeach
          @else
          <h4><i class="icon fa-trash"></i> Belum ada riwayat</h4>
          @endif
        </div>
    </div>
</div>