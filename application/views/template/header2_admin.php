<!doctype html>
<html class="no-js" lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=$title?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url()?>/assets_admin1/<?= base_url()?>/assets_admin1/img/favicon.ico">
    <!-- Google Fonts
    ============================================ -->
    <link href="<?= base_url()?>/assets_admin1/https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
    ============================================ -->
    <script src="<?= base_url()?>/assets_admin1/Chart.js"></script>
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/bootstrap.min.css">
    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/font-awesome.min.css">
    <!-- owl.carousel CSS
    ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/owl.theme.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/owl.transitions.css">
    <!-- animate CSS
    ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/animate.css">
    <!-- normalize CSS
    ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/normalize.css">
    <!-- meanmenu icon CSS
    ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/meanmenu.min.css">
    <!-- main CSS
    ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/main.css">
    <!-- educate icon CSS
    ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/educate-custon-icon.css">
    <!-- morrisjs CSS
    ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
    ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
    ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
    ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/calendar/fullcalendar.print.min.css">
    <!-- x-editor CSS
    ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/editor/select2.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/editor/datetimepicker.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/editor/bootstrap-editable.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/editor/x-editor-style.css">
    <!-- normalize CSS
    ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/data-table/bootstrap-editable.css">
    <!-- style CSS
    ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/style.css">
    <!-- responsive CSS
    ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/responsive.css">
    <!-- modernizr JS
    ============================================ -->
    <script src="<?= base_url()?>/assets_admin1/js/vendor/modernizr-2.8.3.min.js"></script>
  </head>

  <body>
    <div class="left-sidebar-pro">
      <nav id="sidebar" class="">

        <!-- header menampilkan logo coding jti -->
        <div class="sidebar-header">
          <a href="<?= base_url()?>Admin/index"><img class="main-logo" src="<?= base_url()?>/assets_admin1/img/logo/cjti.png" style="width:170px;height:50px;margin-top:10px;margin-bottom:10px;" /></a>
        </div>

        <!-- sidebar -->
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
          <nav class="sidebar-nav left-sidebar-menu-pro">
            <ul class="metismenu" id="menu1">
              <li>
                <a class="mini-click-non" href="<?= base_url()?>admin/index">
                  <span class="educate-icon educate-home icon-wrap"></span>
                  <span class="mini-click-non">Dashboard</span>
                </a>
              </li>
            <li>
              <a class="mini-click-non" href="<?= base_url()?>admin/data_mahasiswa">
                <span class="educate-icon educate-student icon-wrap"></span>
                <span class="mini-click-non">Mahasiswa</span>
              </a>
            </li>
            <li>
              <a class="has-arrow" href="all-professors.html" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Tutor</span></a>
              <ul class="submenu-angle" aria-expanded="false">
                <li><a title="All Professors" href="<?= base_url();?>admin/data_tutor"><span class="mini-sub-pro">Data Tutor</span></a></li>
                <li><a title="Add Professor" href="<?= base_url();?>admin/data_tutor_belum_verifikasi"><span class="mini-sub-pro">Verifikasi Tutor</span></a></li>
              </ul>
            </li>
            <li>
              <a class="mini-click-non" href="<?= base_url()?>admin/data_kategori_materi">
                <span class="educate-icon educate-library icon-wrap"></span>
                <span class="mini-click-non">Kategori Materi</span>
              </a>
            </li>
              <li>
                <a class="" href="<?= base_url();?>admin/data_kritik_saran" aria-expanded="false"><span class="educate-icon educate-form icon-wrap"></span> <span class="mini-click-non">Kritik & Saran</span></a>
              </li>
              <li>
                <a class="" href="<?= base_url();?>admin/Forum" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Forum</span></a>
              </li>
            </ul>
          </nav>
        </div>
      </nav>
    </div>

      <div class="all-content-wrapper">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="logo-pro">
                          <a href="<?= base_url()?>/assets_admin1/index.html"><img class="main-logo" src="<?= base_url()?>/assets_admin1/img/logo/logo.png" alt="" /></a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="header-advance-area">
              <div class="header-top-area">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="header-top-wraper">
                                  <div class="row">
                                      <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                          <div class="menu-switcher-pro">
                                              <!-- <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                            <i class="educate-icon educate-nav"></i>
                          </button> -->
                                          </div>
                                      </div>
                                      <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                          <div class="header-top-menu tabl-d-n">
                                              <ul class="nav navbar-nav mai-top-nav">
                                              </ul>
                                          </div>
                                      </div>
                                      <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                          <div class="header-right-info">
                                              <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                  <li class="nav-item dropdown">
                                                  </li>
                                                  <li class="nav-item">
                                                      <a href="<?= base_url()?>/assets_admin1/#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <img src="<?= base_url()?>/assets_admin1/img/product/admin.png" style="width:30px; height:30px;" />
                                                        <span class="admin-name">Halo Admin, <?= $this->session->userdata('nama');?></span>
                                                        <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                      </a>
                                                      <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                          <li><a href="<?= base_url()?>/admin/profile"><span class="edu-icon edu-user-rounded author-log-ic"></span>Ubah Password</a>
                                                          </li>
                                                          <li><a href="<?= base_url();?>login/logout"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                          </li>
                                                      </ul>
                                                  </li>
                                              </ul>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>  