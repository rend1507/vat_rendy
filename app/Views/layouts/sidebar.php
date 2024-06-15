<?php
if (session()->has('user_id')):
    ?>
    <!-- Sidebar -->
    <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
                <a href="<?= base_url('/') ?>" class="logo">
                    <img src="<?= base_url('assets/img/logo.png')?>" alt="navbar brand" class="navbar-brand" height="20" />
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
                                <div class="collapse <?= is_active_route('admin/vehicles') ? 'show' : '' ?>" id="kendaraan">
                                    <ul class="nav nav-collapse">
                                        <li class="<?= is_active_route('admin/vehicles', true) ? 'active' : '' ?>">
                                            <a href="<?= base_url('admin/vehicles') ?>">
                                                <span class="sub-item"></span>
                                                Daftar Kendaraan
                                            </a>
                                        </li>
                                        <li class="<?= is_active_route('admin/vehicles/tambah') ? 'active' : '' ?>">
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

                            <li class="nav-item <?= is_active_route('approver/approvals') ? 'active' : '' ?>">
                                <a href="<?= base_url('approver/approvals') ?>">
                                    <i class="fas fa-check"></i>
                                    <p>Daftar Approvals</p>
                                    <!-- <span class="badge badge-success">4</span> -->
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