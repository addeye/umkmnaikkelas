<ul class="nav navbar-toolbar navbar-right">
    <li class="{{set_active(['/','home'],'active')}}">
        <a href="{{url('/')}}">
            Dashboard
            <span class="sr-only">
                (current)
            </span>
        </a>
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
            <li class="{{set_active(['informasi-agenda','informasi-agenda/*'],'active')}}" role="presentation">
                <a href="{{route('layanan.info.agenda')}}" role="menuitem">
                    Agenda
                </a>
            </li>
            <li class="{{set_active(['informasi-pasar','informasi-pasar/*'],'active')}}" role="presentation">
                <a href="{{route('informasi-pasar.index')}}" role="menuitem">
                    Informasi Pasar
                </a>
            </li>
        </ul>
    </li>
</ul>