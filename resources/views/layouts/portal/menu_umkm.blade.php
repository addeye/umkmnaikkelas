<ul class="nav navbar-toolbar navbar-right">
    <li class="{{set_active(['/','home'],'active')}}"><a href="{{url('/')}}">Dashboard <span class="sr-only">(current)</span></a></li>

    <li class="dropdown {{set_active(['data-periode','data-periode/*'],'active')}}">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
      role="button">Pendataan <span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
        <li class="{{set_active('data-periode','data-periode/*','active')}}" role="presentation"><a href="{{route('data-periode.index')}}" role="menuitem">Data Usaha Periodik</a></li>
    </ul>
</li>
<li class="dropdown {{set_active(['informasi-terkini','informasi-agenda','informasi-agenda/*'],'active')}}">
  <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
  role="button">Layanan <span class="caret"></span></a>
  <ul class="dropdown-menu" role="menu">

    <li role="presentation"><a href="{{route('pengajuan-umkm.index')}}" role="menuitem">Penghargaan</a></li>

    <li role="presentation"><a href="javascript:void(0)" role="menuitem">Konsultasi</a></li>
    <li role="presentation" class="{{set_active(['informasi-pasar','informasi-pasar/*'],'active')}}"><a href="{{route('informasi-pasar.index')}}" role="menuitem">Informasi Pasar</a></li>
    <li role="presentation" class="{{set_active(['informasi-terkini'],'active')}}"><a href="{{route('layanan.info_terkini')}}" role="menuitem">Informasi Terkini</a></li>
    <li role="presentation" class="{{set_active(['informasi-agenda','informasi-agenda/*'],'active')}}"><a href="{{route('layanan.info.agenda')}}" role="menuitem">Informasi Agenda</a></li>
</ul>
</li>
</ul>