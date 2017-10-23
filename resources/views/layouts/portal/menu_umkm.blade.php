@if (Auth::user()->umkm)
<ul class="nav navbar-toolbar navbar-right">
    <li class="{{set_active(['/','home'],'active')}}">
        <a href="{{url('/')}}">
            Dashboard
            <span class="sr-only">
                (current)
            </span>
        </a>
    </li>
    <li class="dropdown {{set_active(['data-periode','data-periode/*'],'active')}}">
        <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">
            Pendataan
            <span class="caret">
            </span>
        </a>
        <ul class="dropdown-menu" role="menu">
            <li class="{{set_active('data-periode','data-periode/*','active')}}" role="presentation">
                <a href="{{route('data-periode.index')}}" role="menuitem">
                    Data Usaha Periodik
                </a>
            </li>
        </ul>
    </li>
    <li class="dropdown {{set_active(['informasi-terkini','informasi-agenda','informasi-agenda/*'],'active')}}">
        <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">
            Layanan
            <span class="caret">
            </span>
        </a>
        <ul class="dropdown-menu" role="menu">
            <li class="{{set_active(['informasi-terkini'],'active')}}" role="presentation">
                <a href="{{route('layanan.info_terkini')}}" role="menuitem">
                    Informasi Terkini
                </a>
            </li>
            <li role="presentation" class="{{set_active(['informasi-umkm'],'active')}}"><a href="{{route('layanan.info_umkm')}}" role="menuitem">Informasi UMKM</a></li>
            <li role="presentation"><a href="{{ route('konsultasi.index') }}" role="menuitem">Order Konsultasi</a></li>
            <li role="presentation"><a href="{{ route('event.all_umkm') }}" role="menuitem">Event</a></li>
            <li role="presentation">
                <a href="{{route('pengajuan-umkm.index')}}" role="menuitem">
                    Penghargaan
                </a>
            </li>
        </ul>
    </li>
</ul>
    @else
    <ul class="nav navbar-toolbar navbar-right">
    <li class="{{set_active(['/','home'],'active')}}">
        <a href="{{url('/')}}">
            Dashboard
            <span class="sr-only">
                (current)
            </span>
        </a>
    </li>

</ul>
@endif