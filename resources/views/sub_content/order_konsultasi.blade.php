@if (Auth::user()->role_id == ROLE_UMKM)
    <div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">
            Order Konsultasi Terakhir
        </h3>
        <div class="panel-actions">
            <a href="{{ route('konsultasi.create') }}" aria-hidden="true" class="panel-action">
                <i class="fa fa-plus">
                </i>
                Buat Baru
            </a>
        </div>
    </div>
    <div class="panel-body">
        <div id="tblist" class="table-responsive">
            <table class="table border">
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Subject
                    </th>
                    <th>
                        Dibuat
                    </th>
                    <th>
                        Terakhir
                    </th>
                    <th>
                        Status
                    </th>
                </tr>
                @foreach ($order as $row)
                    <tr>
                    <td>
                        #{{$row->code}}
                    </td>
                    <td>
                        <a href="{{ route('konsultasi.show',['id'=>$row->id]) }}">
                            {{$row->subject}}
                        </a>
                    </td>
                    <td>
                        {{date('d/m/Y h:i', strtotime($row->created_at))}}
                    </td>
                    <td>
                        04/08/2017 16:00
                    </td>
                    <td>
                        <span class="label label-round label-warning">
                            {{$row->status}}
                        </span>
                    </td>
                </tr>
                @endforeach

            </table>
            <p class="padding-5 pull-right"><a href="{{ route('konsultasi.index') }}">Selengkapnya</a></p>
        </div>
    </div>
</div>
@endif


@if (Auth::user()->role_id == ROLE_PENDAMPING)
    <div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">
            Order Konsultasi Menunggu
        </h3>
    </div>
    <div class="panel-body">
        <div id="tblist" class="table-responsive">
            <table class="table border">
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Subject
                    </th>
                    <th>
                        Dibuat
                    </th>
                    <th>
                        Status
                    </th>
                </tr>
                @foreach ($order_konsultasi as $row)
                    <tr>
                    <td>
                        #{{$row->code}}
                    </td>
                    <td>
                        <a href="{{ route('konsultasi-pendamping.show',['id'=>$row->id]) }}">
                            {{$row->subject}}
                        </a>
                    </td>
                    <td>
                        {{date('d/m/Y h:i', strtotime($row->created_at))}}
                    </td>
                    <td>
                        <span class="label label-round label-warning">
                            {{$row->status}}
                        </span>
                    </td>
                </tr>
                @endforeach
            </table>
            <p class="padding-5 pull-right"><a href="{{ route('konsultasi-pendamping.index') }}">Selengkapnya</a></p>
        </div>
    </div>
</div>
@endif

