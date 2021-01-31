<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard V.1 | Kiaalap - Kiaalap Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url()?>/assets_admin1/img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
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
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin1/css/morris<?= base_url()?>/assets_admin1/js/morris.css">
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
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="<?= base_url()?>/assets_admin1/img/logo/logo.png" alt="" /></a>
                <strong><a href="index.html"><img src="<?= base_url()?>/assets_admin1/img/logo/logosn.png" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                          <a href="index.html"> <span class="educate-icon educate-home icon-wrap"></span>
								          <span class="mini-click-non">Dashboard</span>
								          </a>
                        </li>
                        <li>
                            <a class="has-arrow" href="all-students.html" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Mahasiswa</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Students" href="all-students.html"><span class="mini-sub-pro">Data Mahasiswa</span></a></li>
                                <li><a title="Add Students" href="add-student.html"><span class="mini-sub-pro">Tambah Mahasiswa</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="all-professors.html" aria-expanded="false"><span class="educate-icon educate-student icon-wrap"></span> <span class="mini-click-non">Tutor</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Professors" href="all-professors.html"><span class="mini-sub-pro">Data Tutor</span></a></li>
                                <li><a title="Add Professor" href="add-professor.html"><span class="mini-sub-pro">Verifikasi Tutor</span></a></li>
                            </ul>
                        </li>                        
                        <li>
                            <a class="" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Kategori Materi</span></a>
                        </li>
                        <li>
                            <a class="" href="mailbox.html" aria-expanded="false"><span class="educate-icon educate-form icon-wrap"></span> <span class="mini-click-non">Kritik & Saran</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
    <header class="header">
      <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow"><a href="#" class="text-gray-500 mr-4 mr-lg-5 lead"></a><a href="index.html" class="navbar-brand font-weight-bold text-uppercase text-base">Admin E-Learning</a>
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
          
          <li class="nav-item dropdown ml-auto"><a id="userInfo" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img src="<?= base_url()?>/assets_admin/img/avatar-6.jpg" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
            <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family"><?= $this->session->userdata('nama');?></strong><small></small></a>
              <div class="dropdown-divider"></div><a href="<?= base_url();?>login/logout" class="dropdown-item">Logout</a>
            </div>
          </li>
        </ul>
      </nav>
    </header>
    </div>