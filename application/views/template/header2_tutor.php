<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=$title?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url()?>/assets_admin/img/favicon.png">
    <link href="<?= base_url()?>/assets_admin/https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/bootstrap.min.css">
    <script src="<?= base_url()?>/assets_admin/Chart.js"></script>
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/owl.theme.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/owl.transitions.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/animate.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/normalize.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/meanmenu.min.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/main.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/educate-custon-icon.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/morrisjs/morris.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/metisMenu/metisMenu-vertical.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/calendar/fullcalendar.print.min.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/editor/select2.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/editor/datetimepicker.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/editor/bootstrap-editable.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/editor/x-editor-style.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/data-table/bootstrap-editable.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/alerts.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/style.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/responsive.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/summernote/summernote.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/bootstrap/cssbootstrap.css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/summernote/summernote-bs4.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="<?= base_url()?>/assets_admin/js/vendor/modernizr-2.8.3.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    
</head>

<body>
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="<?= base_url()?>Tutor/index"><img class="main-logo" src="<?= base_url()?>/assets_admin/img/stucode.png" style="width:170px;height:50px;margin-top:10px;margin-bottom:10px;" /></a>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li>
                            <a class="" href="<?= base_url()?>Tutor/index" aria-expanded="false">
                                <span class="educate-icon educate-home icon-wrap"></span>
                                <span class="mini-click-non">Dashboard</span>
							</a>
                        </li>
                        <li>
                            <a class="" href="<?= base_url()?>Tutor/Data_Materi" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Materi</span></a>
                        </li>
                        <li>
                            <a class="" href="<?= base_url()?>Tutor/Tugas_Mahasiswa" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Tugas Mahasiswa</span></a>
                        </li>
                        <li>
                            <a class="" href="<?= base_url()?>Tutor/Private_Chat" aria-expanded="false"><span class="educate-icon educate-message icon-wrap"></span> <span class="mini-click-non">Private Chat</span></a>
                        </li>
                        <li>
                            <a class="" href="<?= base_url()?>Tutor/Forum" aria-expanded="false"><span class="educate-icon educate-interface icon-wrap"></span> <span class="mini-click-non">Forum</span></a>
                        </li>
                        <li>
                            <a class="" href="<?= base_url()?>Tutor/Kritik_Saran" aria-expanded="false"><span class="educate-icon educate-form icon-wrap"></span> <span class="mini-click-non">Kritik & Saran</span></a>
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
                    <br><br><br>
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
                                            <ul class="d-flex nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item dropdown">
                                                </li>
                                                <?php if($hitung_chat_tutor > 0 && $hitung_chat_tutor < 10) {?>
                                                <li class="nav-item dropdown" style="float:left">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-message edu-chat-pro" aria-hidden="true"></i><span class="badge badge-light" style="background-color:red"><?php echo $hitung_chat_tutor ;?></span></a>
                                                    <div role="menu" class="author-message-top dropdown-menu animated zoomIn">
                                                        <div class="message-single-top">
                                                            <center><p style="margin-top:15px;"><b>Notifikasi Pesan</b></p></center>
                                                        </div>
                                                        <ul class="message-menu" style="margin-top:-15px;">
                                                            <li>
                                                            <?php if ($hitung_chat_tutor > 0) {?>
                                                                <?php foreach($notif_chat_tutor as $nt):?>
                                                                    <a href="<?= base_url('Tutor/Change_Status_Chat_Tutor/'.$nt['from'])?>" style="background-color:#f4fbfe;width:88%;margin-bottom:-15px; ">                                                                    
                                                                        <div class="message-content" style="padding-top:15px;padding-bottom:15px;padding-left:15px;padding-right:15px;">                                                                        
                                                                            <b><?=$nt['nama'];?></b><br>
                                                                            <?=(strlen($nt['message']) > 25 ? substr($nt['message'], 0, 25)."..." : $nt['message']) ;?>                                                                            
                                                                            <br>
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= date('d-m-Y H:i',strtotime($nt['created_at'])) ?>
                                                                        </div>
                                                                    </a>
                                                                    <?php endforeach;?>
                                                                <?php } else {?>
                                                                    <center><p><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Anda belum memiliki pesan baru.</p></center>
                                                                <?php }?>
                                                            </li>                                                     
                                                        </ul>
                                                        <div class="message-view">
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php } else if ($hitung_chat_tutor >= 10) {?>
                                                    <li class="nav-item dropdown" style="float:left">
                                                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-message edu-chat-pro" aria-hidden="true"></i><span class="badge badge-light" style="background-color:red">9+</span></a>
                                                        <div role="menu" class="author-message-top dropdown-menu animated zoomIn">
                                                            <div class="message-single-top">
                                                                <center><p style="margin-top:15px;"><b>Notifikasi Pesan</b></p></center>
                                                            </div>
                                                            <ul class="message-menu" style="margin-top:-15px;">
                                                                <li>
                                                                <?php if ($hitung_chat_tutor > 0) {?>
                                                                    <?php foreach($notif_chat_tutor as $nt):?>
                                                                        <a href="<?= base_url('Tutor/Change_Status_Chat_Tutor/'.$nt['from'])?>" style="background-color:#f4fbfe;width:88%;margin-bottom:-15px; ">                                                                    
                                                                            <div class="message-content" style="padding-top:15px;padding-bottom:15px;padding-left:15px;padding-right:15px;">                                                                        
                                                                                <b><?=$nt['nama'];?></b><br>
                                                                                <?=(strlen($nt['message']) > 25 ? substr($nt['message'], 0, 25)."..." : $nt['message']) ;?>                                                                                
                                                                                <br>
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= date('d-m-Y H:i',strtotime($nt['created_at'])) ?>
                                                                            </div>
                                                                        </a>
                                                                        <?php endforeach;?>
                                                                    <?php } else {?>
                                                                        <center><p><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Anda belum memiliki pesan baru.</p></center>
                                                                    <?php }?>
                                                                </li>                                                     
                                                            </ul>
                                                            <div class="message-view">
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php } else {?>
                                                    <li class="nav-item dropdown" style="float:left">
                                                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-message edu-chat-pro" aria-hidden="true"></i></a>
                                                        <div role="menu" class="author-message-top dropdown-menu animated zoomIn">
                                                            <div class="message-single-top">
                                                                <center><p style="margin-top:15px;"><b>Notifikasi Pesan</b></p></center>
                                                            </div>
                                                            <ul class="message-menu" style="margin-top:-15px;">
                                                                <li>
                                                                <?php if ($hitung_chat_tutor > 0) {?>
                                                                    <?php foreach($notif_chat_tutor as $nt):?>
                                                                        <a href="<?= base_url('Tutor/Change_Status_Chat_Tutor/'.$nt['from'])?>" style="background-color:#f4fbfe;width:88%;margin-bottom:-15px; ">                                                                    
                                                                            <div class="message-content" style="padding-top:15px;padding-bottom:15px;padding-left:15px;padding-right:15px;">                                                                        
                                                                                <b><?=$nt['nama'];?></b><br>
                                                                                <?=(strlen($nt['message']) > 25 ? substr($nt['message'], 0, 25)."..." : $nt['message']) ;?>                                                                                
                                                                                <br>
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= date('d-m-Y H:i',strtotime($nt['created_at'])) ?>
                                                                            </div>
                                                                        </a>
                                                                        <?php endforeach;?>
                                                                    <?php } else {?>
                                                                        <center><p><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Anda belum memiliki pesan baru.</p></center>
                                                                    <?php }?>
                                                                </li>                                                     
                                                            </ul>
                                                            <div class="message-view">
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php }?>

                                                <li class="nav-item">
                                                <?php $val = $this->session->userdata('nama');?>
                                                    <a href="<?= base_url()?>/assets_admin/#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <?php foreach($foto_tutor as $ft):?>
                                                            <?php if($ft["foto"] == NULL){?>
                                                                <img src="<?= base_url('upload/profil/user.png')?>" style="width:30px;height:30px;"/>
                                                            <?php } else {?>
                                                                <img src="<?= base_url('upload/profil/'.$ft['foto'])?>" style="width:30px; height:30px;" />
                                                            <?php }?>
                                                        <?php endforeach;?>
                                                        <?php foreach($kategori_header as $kh):?>
															<span class="admin-name">Tutor <?=$kh['nama_kategori']?>, <?php echo strtok($val, " ");?></span>
                                                        <?php endforeach;?>
														<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
													</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="<?= base_url()?>Tutor/Profil/<?= $this->session->userdata('id_tutor');?>"><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>  Kelola Akun</a>
                                                        </li>
                                                        <li><a href="<?= base_url();?>Login/logout"><span><i class="fa fa-sign-out" aria-hidden="true"></i></span>  Log Out</a>
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
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                    <li>
                            <a class="" href="<?= base_url()?>Tutor/index" aria-expanded="false">
                                <span class="educate-icon educate-home icon-wrap"></span>
                                <span class="mini-click-non">Dashboard</span>
							</a>
                        </li>
                        <li>
                            <a class="" href="<?= base_url()?>Tutor/Data_Materi" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Materi</span></a>
                        </li>
                        <li>
                            <a class="" href="<?= base_url()?>Tutor/Tugas_Mahasiswa" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Tugas Mahasiswa</span></a>
                        </li>
                        <li>
                            <a class="" href="<?= base_url()?>Tutor/Private_Chat" aria-expanded="false"><span class="educate-icon educate-message icon-wrap"></span> <span class="mini-click-non">Private Chat</span></a>
                        </li>
                        <li>
                            <a class="" href="<?= base_url()?>Tutor/Forum" aria-expanded="false"><span class="educate-icon educate-interface icon-wrap"></span> <span class="mini-click-non">Forum</span></a>
                        </li>
                        <li>
                            <a class="" href="<?= base_url()?>Tutor/Kritik_Saran" aria-expanded="false"><span class="educate-icon educate-form icon-wrap"></span> <span class="mini-click-non">Kritik & Saran</span></a>
                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    