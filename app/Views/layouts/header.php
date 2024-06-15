<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
  <title><?= isset($title) ? $title . " - " : "" ?> Vehicle Aproval Tambang</title>



  <!-- Fonts and icons -->
  <link rel="icon" type="image/x-icon" href="<?=base_url('assets/img/favicon.png')?>">
  <script src="<?= base_url('assets/js/plugin/webfont/webfont.min.js') ?>"></script>
  <script>
    WebFont.load({
      google: { families: ["Public Sans:300,400,500,600,700"] },
      custom: {
        families: [
          "Font Awesome 5 Solid",
          "Font Awesome 5 Regular",
          "Font Awesome 5 Brands",
          "simple-line-icons",
        ],
        urls: ['<?= base_url('assets/css/fonts.min.css') ?>'],
      },
      active: function () {
        sessionStorage.fonts = true;
      },
    });
  </script>



  <!-- CSS Files -->
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/plugins.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/kaiadmin.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
</head>

<body>

  <div class="wrapper">

    <?php
    if (session()->has("user_id")): ?>
      <?= $this->include('layouts/sidebar') ?>
      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <img src="<?= base_url('assets/img/logo.png') ?>" alt="navbar brand" class="navbar-brand"
                  height="20" />
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
          <!-- Navbar Header -->
          <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
            <div class="container-fluid">
              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li class="nav-item topbar-icon dropdown hidden-caret">
                  <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <span class="notification">4</span>
                  </a>
                  <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                    <li>
                      <div class="dropdown-title">
                        You have 4 new notification
                      </div>
                    </li>
                    <li>
                      <div class="notif-scroll scrollbar-outer">
                        <div class="notif-center">
                          <a href="#">
                            <div class="notif-icon notif-primary">
                              <i class="fa fa-user-plus"></i>
                            </div>
                            <div class="notif-content">
                              <span class="block"> New user registered </span>
                              <span class="time">5 minutes ago</span>
                            </div>
                          </a>
                          <a href="#">
                            <div class="notif-icon notif-success">
                              <i class="fa fa-comment"></i>
                            </div>
                            <div class="notif-content">
                              <span class="block">
                                Rahmad commented on Admin
                              </span>
                              <span class="time">12 minutes ago</span>
                            </div>
                          </a>
                          <a href="#">
                            <div class="notif-img">
                              <img src="<?= base_url('assets/img/profile2.jpg') ?>" alt="Img Profile" />
                            </div>
                            <div class="notif-content">
                              <span class="block">
                                Reza send messages to you
                              </span>
                              <span class="time">12 minutes ago</span>
                            </div>
                          </a>
                          <a href="#">
                            <div class="notif-icon notif-danger">
                              <i class="fa fa-heart"></i>
                            </div>
                            <div class="notif-content">
                              <span class="block"> Farrah liked Admin </span>
                              <span class="time">17 minutes ago</span>
                            </div>
                          </a>
                        </div>
                      </div>
                    </li>
                    <li>
                      <a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i>
                      </a>
                    </li>
                  </ul>
                </li>


                <li class="nav-item topbar-user dropdown">
                  <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                    <span class="profile-username ms-0">
                      <span class="op-7">Hai,</span>
                      <span class="fw-bold"><?= session()->get("name") ?></span>
                    </span>

                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div class="u-text">
                            <h4><?= session()->get("name") ?> (<?= session()->get("username") ?>)</h4>
                            <p class="text-muted"><?= session()->get("role") ?></p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('logout') ?>"
                          onclick="return confirm('Logout?');">Logout</a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>


        <div class="container">
          <div class="page-inner">
            <?php
    endif;
    ?>