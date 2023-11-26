<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <?php if(Auth::user()->role == 0): ?>
        <a class="sidebar-brand d-flex align-items-center justify-content-center mt-3" href="/home">
            <div class="sidebar-brand-text mx-3">PPDB SMP SMPTQ Pangeran Diponegoro</div>
        </a>
    <?php else: ?>
        <a class="sidebar-brand d-flex align-items-center justify-content-center mt-3" href="/siswa">
            <div class="sidebar-brand-text mx-3">PPDB SMP SMPTQ Pangeran Diponegoro</div>
        </a>
    <?php endif; ?>


    <!-- Divider -->
    <hr class="sidebar-divider my-0 mt-3">

    <?php if(Auth::user()->role == 0): ?>
        <li class="nav-item <?php echo e(Request::is('/home') ? 'active' : ''); ?>">
            <a class="nav-link <?php echo e(Request::is('/home') ? 'active' : ''); ?>" href="/home">
                <i class="fa fa-graduation-cap"></i>
                <span>Dashboard</span></a>
        </li>
    <?php else: ?>
        <li class="nav-item <?php echo e(Request::is('/siswa') ? 'active' : ''); ?>">
            <a class="nav-link <?php echo e(Request::is('/siswa') ? 'active' : ''); ?>" href="/siswa">
                <i class="fa fa-graduation-cap"></i>
                <span>Dashboard</span></a>
        </li>
    <?php endif; ?>
    <!-- Nav Item - Dashboard -->


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">

    </div>


    <!-- Nav Item - Utilities Collapse Menu -->
    <li
        class="nav-item <?php echo e(Request::is('agen') || Request::is('agen/create') || Request::is('agen/*') ? 'active' : ''); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa fa-user"></i>
            <span>Menu</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php if(Auth::user()->role == 0): ?>
                    <h6 class="collapse-header">Fitur Admin:</h6>
                    <a class="collapse-item <?php echo e(Request::is('agen/create') ? 'active' : ''); ?>"
                        href="<?php echo e(url('/agen/create')); ?>">Tambah
                        Siswa</a>
                    <a class="collapse-item <?php echo e((Request::is('agen') or Request::is('agen/[1-99999]')) ? 'active' : ''); ?>"
                        href="/agen">Daftar Siswa</a>
                    <a class="collapse-item <?php echo e(Request::is('agen/bin') ? 'active' : ''); ?>"
                        href="<?php echo e(route('agen.bin')); ?>">Restore
                        Siswa</a>
                <?php else: ?>
                    <?php if(empty($payment)): ?>
                        <h6 class="collapse-header">Aktivitas Siswa:</h6>
                        <a class="collapse-item" href="#" onclick="alert('Kamu belum bayar.');">Data
                            Pendaftaran</a>
                        <a class="collapse-item" href="#"
                            onclick="alert('Pengumuman belum dibuka');">Pengumuman</a>
                    <?php elseif($payment->status_payment !== 2 && $payment->status !== 2): ?>
                        <h6 class="collapse-header">Aktivitas Siswa:</h6>
                        <a class="collapse-item" href="#"
                            onclick="alert('Kamu belum menyelesaikan pembayaran.');">Data Pendaftaran</a>
                        <a class="collapse-item" href="#"
                            onclick="alert('Pengumuman belum dibuka');">Pengumuman</a>
                    <?php elseif(is_null(Auth::user()->datapokok)): ?>
                        <h6 class="collapse-header">Aktivitas Siswa:</h6>
                        <a class="collapse-item <?php echo e(Request::is('siswa/create') ? 'active' : ''); ?>"
                            href="<?php echo e(url('siswa/create')); ?>">Data Pendaftaran</a>
                        <a class="collapse-item" href="#"
                            onclick="alert('Pengumuman belum dibuka');">Pengumuman</a>
                    <?php else: ?>
                        <?php if($config->pengumuman == 0): ?>
                            <h6 class="collapse-header">Aktivitas Siswa:</h6>
                            <a class="collapse-item <?php echo e(Request::is('siswa/edit') ? 'active' : ''); ?>"
                                href="<?php echo e(url('siswa/edit')); ?>">Data Pendaftaran</a>
                            <a class="collapse-item" href="#"
                                onclick="alert('Pengumuman belum dibuka');">Pengumuman</a>
                        <?php elseif(!is_null(Auth::user()->datapokok) && Auth::user()->datapokok->nilai->akademik === 'Isi nilai A-E'): ?>
                            <h6 class="collapse-header">Aktivitas Siswa:</h6>
                            
                            <a class="collapse-item" href="#"
                                onclick="alert('Kamu belum mempunyai nilai!');">Pengumuman</a>
                        <?php else: ?>
                            <h6 class="collapse-header">Aktivitas Siswa:</h6>
                            
                            <a class="collapse-item <?php echo e(Request::is('siswa/pengumuman/' . Auth::user()->id) ? 'active' : ''); ?>"
                                href="<?php echo e(url('siswa/pengumuman/' . Auth::user()->id)); ?>">Pengumuman</a>
                        <?php endif; ?>
                    <?php endif; ?>
                    
                <?php endif; ?>
            </div>
        </div>


    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    

    <!-- Nav Item - Pages Collapse Menu -->
    

    <!-- Divider -->
    

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle" ></button>
    </div>

    <!-- Sidebar Message -->
    <!--<div class="sidebar-card d-none d-lg-flex">-->
    <!--    <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">-->
    <!--    <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>-->
    <!--    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>-->
    <!--</div>-->

</ul>

<?php /**PATH D:\ppdb\resources\views/partials/sidebar.blade.php ENDPATH**/ ?>