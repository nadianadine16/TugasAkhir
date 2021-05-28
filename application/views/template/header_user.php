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
<style>
.dropbtn {
  background-color: #ffffff;
  color: black;
  padding: 16px;
  font-size: 16px;
  border: none;  
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  height:200px;
  display:none;
  overflow:auto;
  /* display: none; */
  position: absolute;
  background-color: #ffffff;
  width: 300px;
  min-height:50px;
  font-size:12px;
  box-shadow: 0px 10px -14px 14px #FFF;
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropbtn:hover {
  background: #ffffff;
}

.dropbtn .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background: red;
  color: white;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ffffff;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #ffffff;}
</style>
</head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="<?=base_url()?>/user/index" class="logo mr-auto"><img src="<?= base_url()?>/assets_user/img/cjti.png" alt="" class="img-fluid"></a>
      <nav class="navbar navbar-expand-lg navbar-light" style="margin-right:-40px;">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li <?php if ($title == 'Daftar Kategori Materi'  || $title == 'Daftar Materi' || $title == 'Daftar Konten' || $title == 'Kumpulkan Tugas') echo 'class="nav-item active"';?>>
          <a class="nav-link" href="<?=base_url('User/daftar_materi/'.$this->session->userdata('id_kategori_materi'))?>" style="font-family: Arial, Helvetica, sans-serif;"><b>Materi </b><span class="sr-only">(current)</span></a>
        </li>
        <li <?php if ($title == 'Private Chat') echo 'class="nav-item active"'; ?>>
          <a class="nav-link" href="<?=base_url()?>User/Private_Chat" style="font-family: Arial, Helvetica, sans-serif;"><b>Private Chat </b><span class="sr-only">(current)</span></a>
        </li>
        <li>
          <div class="dropdown">
          <button class="dropbtn"><i class="fa fa-bell" aria-hidden="true"></i><span class="badge"><?php echo $hitung_chat ;?></span></button>
          <div class="dropdown-content">
          <?php foreach($notif_chat_user as $nc):?>        
            <a href="<?= base_url('User/change_status_chat/'.$nc['from'])?>"><b><?=$nc["nama"];?> </b><br><?=$nc['message'];?></a><hr>
            <?php endforeach;?>
          </div>
          </div>        
        </li>
        <li <?php if ($title == 'Forum' || $title == 'Chat Forum') echo 'class="nav-item active"'; ?>>
          <a class="nav-link" href="<?= base_url()?>User/Forum" style="font-family: Arial, Helvetica, sans-serif;"><b>Forum </b><span class="sr-only">(current)</span></a>
        </li>
        <li <?php if ($title == 'Daftar Tutor' || $title == 'Detail Tutor') echo 'class="nav-item active"'; ?>>
          <a class="nav-link" href="<?= base_url()?>User/SeeAllTutor" style="font-family: Arial, Helvetica, sans-serif;"><b>Tutor </b><span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-family: Arial, Helvetica, sans-serif;">
          <b>Akun</b>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= base_url();?>User/Detail_Akun/<?= $this->session->userdata('id_mahasiswa');?>">Kelola Akun</a>
            <a class="dropdown-item" href="<?= base_url();?>Login/logout">Logout</a>
          </div>
        </li>
      </ul>
      </div>
      </nav>
    </div>
  </header>