<?php
if (session()->has('user_id')):
    ?>
    <!-- Sidebar -->
    <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
                <a href="<?= base_url('/') ?>" class="logo">
                    <img src="<?= base_url('assets/img/kaiadmin/logo_light.svg')?>" alt="navbar brand" class="navbar-brand" height="20" />
                </a>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="gg-menu-right"></i>
                    </button>
                    <button class="btn btn-toggle sidenav-toggler">
                        <i class="gg-menu-left"></i>
                    </button>
                </div>
                <button class="topbar-toggler more">
                    <i class="gg-more-vertical-alt"></i>
                </button>
            </div>
            <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <ul class="nav nav-secondary">
                    <?php
                    switch (session()->get('role')):
                        case 'admin':
                            ?>
                            <li class="nav-item <?= is_active_route('admin/') ? 'active' : '' ?>">
                                <a href="<?= base_url('admin/') ?>">
                                    <i class="fas fa-home"></i>
                                    <p>Beranda</p>
                                </a>
                            </li>
                            <li class="nav-item submenu <?= is_active_route('admin/vehicles') ? 'active' : '' ?>">
                                <a data-bs-toggle="collapse" href="#kendaraan">
                                    <i class="fas fa-layer-group"></i>
                                    <p>Kendaraan</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse " id="kendaraan">
                                    <ul class="nav nav-collapse">
                                        <li>
                                            <a href="<?= base_url('admin/vehicles') ?>">
                                                <span class="sub-item"></span>
                                                Daftar Kendaraan
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('admin/vehicles/tambah') ?>">
                                                <span class="sub-item"></span>
                                                Tambah Kendaraan
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <?php
                            break;
                        case 'approver':
                            ?>

                            <li class="nav-item <?= is_active_route('approver/') ? 'active' : '' ?>">
                                <a href="<?= base_url('approver/') ?>">
                                    <i class="fas fa-home"></i>
                                    <p>Beranda</p>
                                    <!-- <span class="badge badge-success">4</span> -->
                                </a>
                            </li>

                            <li class="nav-item <?= is_active_route('approver/laporan') ? 'active' : '' ?>">
                                <a href="<?= base_url('approver/laporan') ?>">
                                    <i class="fas fa-file"></i>
                                    <p>Laporan</p>
                                </a>
                            </li>
                            <?php
                            break;
                        default:
                            ?>
                            <?php
                            break;
                    endswitch;
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Sidebar -->

    <?php
endif;
?>