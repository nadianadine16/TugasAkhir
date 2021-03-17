<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?=$title?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url()?>/assets_user/img/favicon.png" rel="icon">
  <link href="<?= base_url()?>/assets_user/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url()?>/assets/style.css" type="text/css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/profile.css" type="text/css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url()?>/assets_user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url()?>/assets_user/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url()?>/assets_user/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url()?>/assets_user/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url()?>/assets_user/vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
  <link href="<?= base_url()?>/assets_user/vendor/owl.carousel.min.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="<?= base_url()?>/assets_user/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="<?=base_url()?>/user/index" class="logo mr-auto"><img src="<?= base_url()?>/assets_user/img/logo.png" alt="" class="img-fluid"></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li <?php if ($title == 'Dashboard User') echo 'class="active"'; ?>>
          <a href="<?=base_url()?>User/index">Home</a></li>
          <li <?php if ($title == 'Daftar Kategori Materi'  || $title == 'Daftar Materi' || $title == 'Detail Materi' || $title == 'Kumpulkan Tugas') echo 'class="active"';?>><a href="<?=base_url()?>User/kategoriMateri">Materi</a></li>
          <li><a href="#">Private Chat</a></li>
          <li <?php if ($title == 'Forum' || $title == 'Chat Forum') echo 'class="active"'; ?>><a href="<?= base_url()?>User/Forum">Forum</a></li>
          <li <?php if ($title == 'Contact Us') echo 'class="active"'; ?>><a href="<?= base_url()?>User/contactus">Contact Us</a></li>
          <li class="drop-down"><a>Akun</a>
            <ul>
              <li><a href="<?= base_url();?>User/profile">Edit Profil</a></li>
              <li><a href="<?= base_url();?>Login/logout">Logout</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </header>