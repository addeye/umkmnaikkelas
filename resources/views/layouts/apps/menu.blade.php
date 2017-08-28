<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu">
                    <li class="site-menu-category">General</li>
                    <li class="site-menu-item has-sub {{ set_active(['dashboard'],'active open') }}">
                        <a href="javascript:void(0)" data-slug="dashboard">
                            <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                            <span class="site-menu-title">Dashboard</span>                        
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item {{ set_active(['dashboard']) }}">
                                <a class="animsition-link" href="{{route('dashboard')}}" data-slug="dashboard-v1">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Dashboard</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{route('portal')}}" data-slug="dashboard-v2">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Portal</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="site-menu-item has-sub {{ set_active(['bidang-usaha','bidang-usaha/*', 'bidang-pendampingan','bidang-pendampingan/*','bidang-keahlian','bidang-keahlian/*','provinsi','kabupaten-kota'],'active open') }}">
                        <a href="javascript:void(0)" data-slug="layout">
                            <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                            <span class="site-menu-title">Master Data</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item {{ set_active(['bidang-usaha','bidang-usaha/*'],'active') }}">
                                <a class="animsition-link" href="{{url('bidang-usaha')}}" data-slug="layout-grids">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Bidang Usaha</span>
                                </a>
                            </li>
                            <li class="site-menu-item {{ set_active(['bidang-pendampingan','bidang-pendampingan/*'],'active') }}">
                                <a class="animsition-link" href="{{url('bidang-pendampingan')}}" data-slug="layout-headers">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Bidang Pendampingan</span>
                                </a>
                            </li>
                            <li class="site-menu-item {{ set_active(['bidang-keahlian','bidang-keahlian/*'],'active') }}">
                                <a class="animsition-link" href="{{url('bidang-keahlian')}}" data-slug="layout-bordered-header">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Bidang Keahlian</span>
                                </a>
                            </li>
                            <li class="site-menu-item {{ set_active(['provinsi','provinsi/*'],'active') }}">
                                <a class="animsition-link" href="{{url('provinsi')}}" data-slug="layout-two-columns">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Data Provinsi</span>
                                </a>
                            </li>
                            <li class="site-menu-item {{ set_active(['kabupaten-kota','kabupaten-kota/*'],'active') }}">
                                <a class="animsition-link" href="{{url('kabupaten-kota')}}" data-slug="layout-boxed">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Data Kabupaten Kota</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="site-menu-item has-sub {{ set_active(['umkm','umkm/*','penghargaan-umkm','penghargaan-umkm/*'],'active open') }}">
                        <a href="javascript:void(0)" data-slug="page">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">UMKM</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">                            
                            <li class="site-menu-item {{ set_active(['umkm','umkm/*'],'active') }}">
                                <a class="animsition-link" href="{{url('umkm')}}" data-slug="page-faq">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Profil UMKM</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="javascript:void(0);" data-slug="page-register">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Produk</span>
                                </a>
                            </li>
                            <li class="site-menu-item {{ set_active(['penghargaan-umkm','penghargaan-umkm/*'],'active') }}">
                                <a class="animsition-link" href="{{route('penghargaan-umkm.index')}}" data-slug="page-login">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Penghargaan</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="site-menu-item has-sub {{ set_active(['lembaga','lembaga/*','pendamping','pendamping/*','penghargaan-pendamping','penghargaan-pendamping/*'],'active open') }}">
                        <a href="javascript:void(0)" data-slug="page">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Pendamping</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">                            
                            <li class="site-menu-item {{ set_active(['lembaga','lembaga/*'],'active') }}">
                                <a class="animsition-link" href="{{url('lembaga')}}" data-slug="page-faq">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Profil Lembaga</span>
                                </a>
                            </li>
                            <li class="site-menu-item {{ set_active(['pendamping','pendamping/*'],'active') }}">
                                <a class="animsition-link" href="{{url('pendamping')}}" data-slug="page-register">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Profil Pendamping</span>
                                </a>
                            </li>
                            <li class="site-menu-item {{ set_active(['penghargaan-pendamping','penghargaan-pendamping/*'],'active') }}">
                                <a class="animsition-link" href="{{route('penghargaan-pendamping.index')}}" data-slug="page-login">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Penghargaan</span>
                                </a>
                            </li>
                            {{-- <li class="site-menu-item">
                                <a class="animsition-link" href="#" data-slug="page-login">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Pendampingan</span>
                                </a>
                            </li> --}}
                        </ul>
                    </li>
                    <li class="site-menu-category">Feature</li>
                    <li class="site-menu-item has-sub {{set_active(['info-terkini','info-terkini/*','info-pasar','info-pasar/*','agenda','agenda/*'],'active open')}}">
                        <a href="javascript:void(0)" data-slug="uikit">
                            <i class="site-menu-icon wb-bookmark" aria-hidden="true"></i>
                            <span class="site-menu-title">Layanan</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item {{set_active(['info-pasar','info-pasar/*'],'active')}}">
                                <a class="animsition-link" href="{{route('info-pasar.list')}}" data-slug="uikit-buttons">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Info Pasar</span>
                                </a>
                            </li>
                            <li class="site-menu-item {{set_active(['info-terkini','info-terkini/*'],'active')}}">
                                <a class="animsition-link" href="{{route('info-terkini.index')}}" data-slug="uikit-colors">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Info Terkini</span>
                                </a>
                            </li>
                            <li class="site-menu-item {{set_active(['agenda','agenda/*'],'active')}}">
                                <a class="animsition-link" href="{{route('agenda.index')}}" data-slug="uikit-buttons">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Agenda</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="../uikit/dropdowns.html" data-slug="uikit-dropdowns">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Konsultasi Bisnis</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="site-menu-item has-sub {{set_active(['user','user/*','slider','slider/*'],'active open')}}">
                        <a href="javascript:void(0)" data-slug="advanced">
                            <i class="site-menu-icon wb-hammer" aria-hidden="true"></i>
                            <span class="site-menu-title">Manajemen Web</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item {{set_active(['slider','slider/*'],'active')}}">
                                <a class="animsition-link" href="{{route('slider.index')}}" data-slug="advanced-animation">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Slider Manajemen</span>
                                </a>
                            </li>                                                      
                            <li class="site-menu-item {{set_active(['user','user/*'],'active')}}">
                                <a class="animsition-link" href="{{route('user.index')}}" data-slug="advanced-toastr">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">User Manajemen</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="site-menu-item has-sub {{set_active(['laporan-user','laporan-user/*','laporan-penghargaan','laporan-penghargaan/*'],'active open')}}">
                        <a href="javascript:void(0)" data-slug="advanced">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Laporan</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item {{set_active(['laporan-user'],'active')}}">
                                <a class="animsition-link" href="{{route('laporan-user.index')}}" data-slug="advanced-animation">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Laporan User</span>
                                </a>
                            </li>
                            <li class="site-menu-item {{set_active(['laporan-user/pendamping','active'])}}">
                                <a class="animsition-link" href="{{route('laporan-user.list.pendamping')}}" data-slug="advanced-animation">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Laporan Pendamping</span>
                                </a>
                            </li>
                            <li class="site-menu-item {{set_active(['laporan-user/umkm','active'])}}">
                                <a class="animsition-link" href="{{route('laporan-user.list.umkm')}}" data-slug="advanced-animation">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Laporan UMKM</span>
                                </a>
                            </li>
                            <li class="site-menu-item {{set_active(['laporan-penghargaan/umkm','active'])}}">
                                <a class="animsition-link" href="{{route('laporan-penghargaan.list.umkm')}}" data-slug="advanced-lightbox">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Penghargaan UMKM</span>
                                </a>
                            </li>
                            <li class="site-menu-item {{set_active(['laporan-penghargaan/pendamping','active'])}}">
                                <a href="{{route('laporan-penghargaan.list.pendamping')}}" data-slug="advanced-lightbox">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Penghargaan Pendamping</span>
                                </a>
                            </li>                                                
                        </ul>
                    </li>                                       
                </ul>
            </div>
        </div>
    </div>

    <div class="site-menubar-footer">
        <a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip"
           data-original-title="Settings">
            <span class="icon wb-settings" aria-hidden="true"></span>
        </a>
        <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
            <span class="icon wb-eye-close" aria-hidden="true"></span>
        </a>
        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
            <span class="icon wb-power" aria-hidden="true"></span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
    </div>
</div>
<div class="site-gridmenu">
    <ul>
        <li>
            <a href="../apps/mailbox/mailbox.html">
                <i class="icon wb-envelope"></i>
                <span>Mailbox</span>
            </a>
        </li>
        <li>
            <a href="../apps/calendar/calendar.html">
                <i class="icon wb-calendar"></i>
                <span>Calendar</span>
            </a>
        </li>
        <li>
            <a href="../apps/contacts/contacts.html">
                <i class="icon wb-user"></i>
                <span>Contacts</span>
            </a>
        </li>
        <li>
            <a href="../apps/media/overview.html">
                <i class="icon wb-camera"></i>
                <span>Media</span>
            </a>
        </li>
        <li>
            <a href="../apps/documents/categories.html">
                <i class="icon wb-order"></i>
                <span>Documents</span>
            </a>
        </li>
        <li>
            <a href="../apps/projects/projects.html">
                <i class="icon wb-image"></i>
                <span>Project</span>
            </a>
        </li>
        <li>
            <a href="../apps/forum/forum.html">
                <i class="icon wb-chat-group"></i>
                <span>Forum</span>
            </a>
        </li>
        <li>
            <a href="../index.html">
                <i class="icon wb-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>
    </ul>
</div>