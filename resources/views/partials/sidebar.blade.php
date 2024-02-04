<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    @if (Auth::user()->role == 0 || Auth::user()->role == 2)
        <a class="sidebar-brand d-flex align-items-center justify-content-center mt-3" href="/home">
            <div class="sidebar-brand-text mx-3">PPDB SMP SMPTQ Pangeran Diponegoro</div>
        </a>
    @else
        <a class="sidebar-brand d-flex align-items-center justify-content-center mt-3" href="/siswa">
            <div class="sidebar-brand-text mx-3">PPDB SMP SMPTQ Pangeran Diponegoro</div>
        </a>
    @endif


    <!-- Divider -->
    <hr class="sidebar-divider my-0 mt-3">

    @if (Auth::user()->role == 0 || Auth::user()->role == 2)
        <li class="nav-item {{ Request::is('/home') ? 'active' : '' }}">
            <a class="nav-link {{ Request::is('/home') ? 'active' : '' }}" href="/home">
                <i class="fa fa-graduation-cap"></i>
                <span>Dashboard</span></a>
        </li>
    @else
        <li class="nav-item {{ Request::is('/siswa') ? 'active' : '' }}">
            <a class="nav-link {{ Request::is('/siswa') ? 'active' : '' }}" href="/siswa">
                <i class="fa fa-graduation-cap"></i>
                <span>Dashboard</span></a>
        </li>
    @endif
    <!-- Nav Item - Dashboard -->


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">

    </div>


    <!-- Nav Item - Utilities Collapse Menu -->
    <li
        class="nav-item {{ Request::is('agen') || Request::is('agen/create') || Request::is('agen/*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa fa-user"></i>
            <span>Menu</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @if (Auth::user()->role == 0)
                    <h6 class="collapse-header">Admin:</h6>
                    <a class="collapse-item {{ Request::is('admin/create') ? 'active' : '' }}"
                        href="{{ url('/admin/create') }}">Tambah
                        Admin</a>
                    <a class="collapse-item {{ Request::is('admin') ? 'active' : '' }}" href="{{ url('/admin') }}">
                        Daftar Admin</a>
                    <a class="collapse-item {{ Request::is('admin/bin') ? 'active' : '' }}"
                        href="{{ route('admin.bin') }}">Restore
                        Admin</a>
                    <h6 class="collapse-header">Siswa:</h6>
                    <a class="collapse-item {{ Request::is('agen/create') ? 'active' : '' }}"
                        href="{{ url('/agen/create') }}">Tambah
                        Siswa</a>
                    <a class="collapse-item {{ (Request::is('agen') or Request::is('agen/[1-99999]')) ? 'active' : '' }}"
                        href="/agen">Daftar Siswa</a>
                    <a class="collapse-item {{ Request::is('agen/bin') ? 'active' : '' }}"
                        href="{{ route('agen.bin') }}">Restore
                        Siswa</a>
                @elseif (Auth::user()->role == 2)
                    <h6 class="collapse-header">Siswa:</h6>
                    <a class="collapse-item {{ Request::is('agen/create') ? 'active' : '' }}"
                        href="{{ url('/agen/create') }}">Tambah
                        Siswa</a>
                    <a class="collapse-item {{ (Request::is('agen') or Request::is('agen/[1-99999]')) ? 'active' : '' }}"
                        href="/agen">Daftar Siswa</a>
                    <a class="collapse-item {{ Request::is('agen/bin') ? 'active' : '' }}"
                        href="{{ route('agen.bin') }}">Restore
                        Siswa</a>
                @else
                    @if (empty($payment))
                        <h6 class="collapse-header">Aktivitas Siswa:</h6>
                        <a class="collapse-item" href="#" onclick="alert('Kamu belum bayar.');">Data
                            Pendaftaran</a>
                        <a class="collapse-item" href="#"
                            onclick="alert('Pengumuman belum dibuka');">Pengumuman</a>
                    @elseif ($payment->status_payment !== 2 && $payment->status !== 2)
                        <h6 class="collapse-header">Aktivitas Siswa:</h6>
                        <a class="collapse-item" href="#"
                            onclick="alert('Kamu belum menyelesaikan pembayaran.');">Data Pendaftaran</a>
                        <a class="collapse-item" href="#"
                            onclick="alert('Pengumuman belum dibuka');">Pengumuman</a>
                    @elseif (is_null(Auth::user()->datapokok))
                        <h6 class="collapse-header">Aktivitas Siswa:</h6>
                        <a class="collapse-item {{ Request::is('siswa/create') ? 'active' : '' }}"
                            href="{{ url('siswa/create') }}">Data Pendaftaran</a>
                        <a class="collapse-item" href="#"
                            onclick="alert('Pengumuman belum dibuka');">Pengumuman</a>
                    @else
                        @if ($config->pengumuman == 0)
                            <h6 class="collapse-header">Aktivitas Siswa:</h6>
                            <a class="collapse-item {{ Request::is('siswa/edit') ? 'active' : '' }}"
                                href="{{ url('siswa/edit') }}">Data Pendaftaran</a>
                            <a class="collapse-item" href="#"
                                onclick="alert('Pengumuman belum dibuka');">Pengumuman</a>
                        @elseif (!is_null(Auth::user()->datapokok) && Auth::user()->datapokok->nilai->akademik === 'Isi nilai A-E')
                            <h6 class="collapse-header">Aktivitas Siswa:</h6>
                            {{-- <a class="collapse-item {{ Request::is('siswa/create') ? 'active' : '' }}" href="{{ url('siswa/create') }}">Datapokok</a> --}}
                            <a class="collapse-item" href="#"
                                onclick="alert('Kamu belum mempunyai nilai!');">Pengumuman</a>
                        @else
                            <h6 class="collapse-header">Aktivitas Siswa:</h6>
                            {{-- <a class="collapse-item {{ Request::is('siswa/create') ? 'active' : '' }}" href="{{ url('siswa/create') }}">Datapokok</a> --}}
                            <a class="collapse-item {{ Request::is('siswa/pengumuman/' . Auth::user()->id) ? 'active' : '' }}"
                                href="{{ url('siswa/pengumuman/' . Auth::user()->id) }}">Pengumuman</a>
                        @endif
                    @endif
                    {{-- <a class="collapse-item {{ Request::is('agen') or (Request::is('agen/[1-99999]') ? 'active' : '') }}"
                        href="/agen">Daftar Siswa</a> --}}
                @endif
            </div>
        </div>


    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    {{-- <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('produk') || Request::is('katalog') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Katalog Produk</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('produk') ? 'active' : '' }}" href="/produk">Produk</a>
                <a class="collapse-item {{ Request::is('katalog') ? 'active' : '' }}" href="/katalog">Katalog</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('profil') ? 'active' : '' }}" href="/profile">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Profil</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="/helpdesk">
            <i class="fas fa-fw fa-table"></i>
            <span>CRM</span></a>
    </li> --}}

    <!-- Divider -->
    {{-- <hr class="sidebar-divider d-none d-md-block"> --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <!--<div class="sidebar-card d-none d-lg-flex">-->
    <!--    <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">-->
    <!--    <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>-->
    <!--    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>-->
    <!--</div>-->

</ul>
