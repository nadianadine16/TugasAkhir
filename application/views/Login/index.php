<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$title?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/orionicons.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?= base_url()?>/assets_admin/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?= base_url()?>/assets_admin/img/favicon.png?3">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page-holder d-flex align-items-center">
      <div class="container">
        <div class="row align-items-center py-5">
          <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
            <div class="pr-lg-5"><img src="<?= base_url()?>/assets_admin/img/study.png" alt="" class="img-fluid"></div>
          </div>
          <div class="col-lg-5 px-lg-4">
            <h1 class="text-base text-primary text-uppercase mb-4">E-Learning</h1>
            <h2 class="mb-4">Jurusan Teknologi Informasi</h2>
            <p class="text-muted">Belajar menyenangkan dengan metode tutor sebaya</p>
            <form id="loginForm" action="<?= base_url();?>login/prosesLogin" class="mt-4" method="post">
              <div class="form-group mb-4">
                <input type="text" name="uname1" placeholder="Username" class="form-control border-0 shadow form-control-lg" autocomplete="off">
              </div>
              <div class="form-group mb-4">
                <input type="password" name="pwd1" placeholder="Password" class="form-control border-0 shadow form-control-lg text-violet" autocomplete="off">
              </div>
              <button type="submit" class="btn btn-primary shadow px-5" style="width:250px; margin-left:100px;">Log in</button>
            </form>
            <a href="<?= base_url();?>Tutor/Daftar_Tutor" class="btn btn-primary shadow px-5" style="width:250px; margin-left:100px; margin-top:10px;">Daftar Tutor</a>
            <a href="<?= base_url();?>Tutor/Cek_Status_Pendaftaran" class="btn btn-primary shadow" style="width:250px; margin-left:100px; margin-top:10px; margin-bottom:10px">Cek Status Pendaftaran</a>
            <div class="alert alert-info" role="alert">
              <?php
              if(isset($pesan)) {
                echo $pesan;
              }
              else {
                echo "Masukkan Username Dan Password Anda";
                }
              ?>
            </div>
          </div>
        </div>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)                 -->
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="<?= base_url()?>/assets_admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url()?>/assets_admin/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?= base_url()?>/assets_admin/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>/assets_admin/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?= base_url()?>/assets_admin/vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="<?= base_url()?>/assets_admin/js/front.js"></script>
  </body>
</html>