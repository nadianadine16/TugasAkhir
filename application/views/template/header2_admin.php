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
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="<?= base_url()?>/assets_admin1/http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="<?= base_url()?>/assets_admin1/index.html"><img class="main-logo" src="<?= base_url()?>/assets_admin1/img/logo/logo.png" alt="" /></a>
                <strong><a href="<?= base_url()?>/assets_admin1/index.html"><img src="<?= base_url()?>/assets_admin1/img/logo/logosn.png" alt="" /></a></strong>
            </div>
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
                            <a class="has-arrow" href="all-students.html" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Mahasiswa</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Students" href="<?= base_url();?>admin/data_mahasiswa"><span class="mini-sub-pro">Data Mahasiswa</span></a></li>
                                <li><a title="Add Students" href="<?= base_url()?>admin/tambah_data_mahasiswa"><span class="mini-sub-pro">Tambah Mahasiswa</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="all-professors.html" aria-expanded="false"><span class="educate-icon educate-student icon-wrap"></span> <span class="mini-click-non">Tutor</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Professors" href="<?= base_url();?>admin/data_tutor"><span class="mini-sub-pro">Data Tutor</span></a></li>
                                <li><a title="Add Professor" href="#"><span class="mini-sub-pro">Verifikasi Tutor</span></a></li>
                            </ul>
                        </li>                        
                        <li>
                            <a class="has-arrow" href="" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Kategori Materi</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Professors" href="<?= base_url();?>admin/data_kategori_materi"><span class="mini-sub-pro">Data Kategori Materi</span></a></li>
                                <li><a title="Add Professor" href="<?= base_url();?>admin/tambah_kategori_materi"><span class="mini-sub-pro">Tambah Kategori Materi</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="" href="mailbox.html" aria-expanded="false"><span class="educate-icon educate-form icon-wrap"></span> <span class="mini-click-non">Kritik & Saran</span></a>
                        </li>
                        <li>
                            <a class="" href="mailbox.html" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Forum</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
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
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="educate-icon educate-nav"></i>
												</button>
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
															<img src="<?= base_url()?>/assets_admin1/img/product/pro4.jpg" alt="" />
															<span class="admin-name"><?= $this->session->userdata('nama');?></span>
															<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="<?= base_url()?>/assets_admin1/#"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</a>
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
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" data-target="#Charts" href="<?= base_url()?>/assets_admin1/#">Home <span class="admin-project-icon edu-icon"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="<?= base_url()?>/assets_admin1/index.html">Dashboard v.1</a></li>
                                                <li><a href="<?= base_url()?>/assets_admin1/index-1.html">Dashboard v.2</a></li>
                                                <li><a href="<?= base_url()?>/assets_admin1/index-3.html">Dashboard v.3</a></li>
                                                <li><a href="<?= base_url()?>/assets_admin1/analytics.html">Analytics</a></li>
                                                <li><a href="<?= base_url()?>/assets_admin1/widgets.html">Widgets</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="<?= base_url()?>/assets_admin1/events.html">Event</a></li>
                                        <li><a data-toggle="collapse" data-target="#demoevent" href="<?= base_url()?>/assets_admin1/#">Professors <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demoevent" class="collapse dropdown-header-top">
                                                <li><a href="<?= base_url()?>/assets_admin1/all-professors.html">All Professors</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/add-professor.html">Add Professor</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/edit-professor.html">Edit Professor</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/professor-profile.html">Professor Profile</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demopro" href="<?= base_url()?>/assets_admin1/#">Students <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demopro" class="collapse dropdown-header-top">
                                                <li><a href="<?= base_url()?>/assets_admin1/all-students.html">All Students</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/add-student.html">Add Student</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/edit-student.html">Edit Student</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/student-profile.html">Student Profile</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#democrou" href="<?= base_url()?>/assets_admin1/#">Courses <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="democrou" class="collapse dropdown-header-top">
                                                <li><a href="<?= base_url()?>/assets_admin1/all-courses.html">All Courses</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/add-course.html">Add Course</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/edit-course.html">Edit Course</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/course-profile.html">Courses Info</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/course-payment.html">Courses Payment</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demolibra" href="<?= base_url()?>/assets_admin1/#">Library <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demolibra" class="collapse dropdown-header-top">
                                                <li><a href="<?= base_url()?>/assets_admin1/library-assets.html">Library Assets</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/add-library-assets.html">Add Library Asset</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/edit-library-assets.html">Edit Library Asset</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demodepart" href="<?= base_url()?>/assets_admin1/#">Departments <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demodepart" class="collapse dropdown-header-top">
                                                <li><a href="<?= base_url()?>/assets_admin1/departments.html">Departments List</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/add-department.html">Add Departments</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/edit-department.html">Edit Departments</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demomi" href="<?= base_url()?>/assets_admin1/#">Mailbox <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demomi" class="collapse dropdown-header-top">
                                                <li><a href="<?= base_url()?>/assets_admin1/mailbox.html">Inbox</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/mailbox-view.html">View Mail</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/mailbox-compose.html">Compose Mail</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="<?= base_url()?>/assets_admin1/#">Interface <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                                <li><a href="<?= base_url()?>/assets_admin1/google-map.html">Google Map</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/data-maps.html">Data Maps</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/pdf-viewer.html">Pdf Viewer</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/x-editable.html">X-Editable</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/code-editor.html">Code Editor</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/tree-view.html">Tree View</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/preloader.html">Preloader</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/images-cropper.html">Images Cropper</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Chartsmob" href="<?= base_url()?>/assets_admin1/#">Charts <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Chartsmob" class="collapse dropdown-header-top">
                                                <li><a href="<?= base_url()?>/assets_admin1/bar-charts.html">Bar Charts</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/line-charts.html">Line Charts</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/area-charts.html">Area Charts</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/rounded-chart.html">Rounded Charts</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/c3.html">C3 Charts</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/sparkline.html">Sparkline Charts</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/peity.html">Peity Charts</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Tablesmob" href="<?= base_url()?>/assets_admin1/#">Tables <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Tablesmob" class="collapse dropdown-header-top">
                                                <li><a href="<?= base_url()?>/assets_admin1/static-table.html">Static Table</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/data-table.html">Data Table</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#formsmob" href="<?= base_url()?>/assets_admin1/#">Forms <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="formsmob" class="collapse dropdown-header-top">
                                                <li><a href="<?= base_url()?>/assets_admin1/basic-form-element.html">Basic Form Elements</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/advance-form-element.html">Advanced Form Elements</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/password-meter.html">Password Meter</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/multi-upload.html">Multi Upload</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/tinymc.html">Text Editor</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/dual-list-box.html">Dual List Box</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Appviewsmob" href="<?= base_url()?>/assets_admin1/#">App views <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Appviewsmob" class="collapse dropdown-header-top">
                                                <li><a href="<?= base_url()?>/assets_admin1/basic-form-element.html">Basic Form Elements</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/advance-form-element.html">Advanced Form Elements</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/password-meter.html">Password Meter</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/multi-upload.html">Multi Upload</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/tinymc.html">Text Editor</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/dual-list-box.html">Dual List Box</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Pagemob" href="<?= base_url()?>/assets_admin1/#">Pages <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Pagemob" class="collapse dropdown-header-top">
                                                <li><a href="<?= base_url()?>/assets_admin1/login.html">Login</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/register.html">Register</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/lock.html">Lock</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/password-recovery.html">Password Recovery</a>
                                                </li>
                                                <li><a href="<?= base_url()?>/assets_admin1/404.html">404 Page</a></li>
                                                <li><a href="<?= base_url()?>/assets_admin1/500.html">500 Page</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>