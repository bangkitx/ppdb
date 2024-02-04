<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        

        <!-- Nav Item - Messages -->
        

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo e(Auth::user()->name); ?></span>
                <img class="img-profile rounded-circle" src="<?php echo e(asset(Auth::user()->avatar)); ?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <?php if(Auth::user()->role == 0 || Auth::user()->role == 2): ?>
                    <a class="dropdown-item" href="/profile">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profil
                    </a>
                    <a class="dropdown-item" href="/config">
                        <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                        Pengaturan
                    </a>
                <?php else: ?>
                    <a class="dropdown-item" href="/profile">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profil
                    </a>
                <?php endif; ?>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Keluar
                </a>
            </div>
        </li>

    </ul>

</nav>

<script>
    function fixAspect(img) {
        var $img = $(img),
            width = $img.width(),
            height = $img.height(),
            tallAndNarrow = width / height < 1;
        if (tallAndNarrow) {
            $img.addClass('tallAndNarrow');
        }
        $img.addClass('loaded');
    }
</script>
<!-- End of Topbar -->
<?php /**PATH C:\laragon\www\ppdb\resources\views/partials/navbar.blade.php ENDPATH**/ ?>