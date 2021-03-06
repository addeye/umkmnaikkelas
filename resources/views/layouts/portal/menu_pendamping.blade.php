@if (Auth::user()->pendamping)
  <ul class="nav navbar-toolbar navbar-right">
    <li class="{{set_active(['/','home'],'active')}}"><a href="{{url('/')}}">Dashboard <span class="sr-only">(current)</span></a></li>
    <li class="{{set_active(['profil'],'active')}}"><a href="{{url('/profil')}}">Profil</a></li>
    <li class="dropdown {{set_active(['lembaga-pendamping','jasa-pendampingan','jasa-pendampingan/*'],'active')}}">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
      role="button">Pendampingan <span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
        <li class="{{set_active('lembaga-pendamping','active')}}" role="presentation"><a href="{{route('lembaga.pendamping')}}" role="menuitem">Lembaga</a></li>
        <li class="{{set_active(['jasa-pendampingan','jasa-pendampinga/*'],'active')}}" role="presentation"><a href="{{route('jasa-pendampingan.index')}}" role="menuitem">Jasa Pendampingan</a></li>
    </ul>
</li>

<li class="dropdown {{set_active(['informasi-terkini','informasi-agenda','informasi-agenda/*'],'active')}}">
  <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
  role="button">Layanan <span class="caret"></span></a>
  <ul class="dropdown-menu" role="menu">
    <li role="presentation" class="{{set_active(['informasi-terkini'],'active')}}"><a href="{{route('layanan.info_terkini')}}" role="menuitem">Informasi Terkini</a></li>

    <li role="presentation" class="{{set_active(['informasi-pendamping'],'active')}}"><a href="{{route('layanan.info_pendamping')}}" role="menuitem">Informasi Pendamping</a></li>
    <li role="presentation"><a href="{{ route('konsultasi-pendamping.index') }}" role="menuitem">Order Konsultasi</a></li>
    <li role="presentation"><a href="{{ route('event.all') }}" role="menuitem">Event</a></li>
    <li role="presentation"><a href="{{route('pengajuan-pendamping.index')}}" role="menuitem">Penghargaan</a></li>
</ul>
</li>
</ul>

@else

  <ul class="nav navbar-toolbar navbar-right">
    <li class="{{set_active(['/','home'],'active')}}"><a href="{{url('/')}}">Dashboard <span class="sr-only">(current)</span></a></li>
</ul>

@endif