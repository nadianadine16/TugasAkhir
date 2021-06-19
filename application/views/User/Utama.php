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
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="<?=base_url()?>/user/index" class="logo mr-auto"><img src="<?= base_url()?>/assets_user/img/stucode.png" alt="" class="img-fluid"></a>
      <nav class="navbar navbar-expand-lg navbar-light" style="margin-right:-40px;">
      <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-family: Arial, Helvetica, sans-serif;">
          <b>Halo, <?= $this->session->userdata('nama');?></b>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= base_url();?>Login/logout"><span><i class="fa fa-sign-out" aria-hidden="true"></i></span>  Logout</a>
          </div>
        </li>
      </ul>
      </div>
      </nav>
    </div>
  </header>

<section id="team" class="team section-bg" style="background-color:white;">
    <footer id="footer">
        <div class="footer-newsletter">
        <div class="container">
        <div class="row">
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <h4>Ayo Melangkah Lebih Baik dengan Belajar</h4>
                <p>Pembelajaran model tutor sebaya saat ini menjadi trend karena dengan adanya model ini maka mahasiswa yang mengalami kesulitan tidak akan merasa canggung dalam mengajukan pertanyaan</p>
                <form action="<?=base_url('User/DaftarMateribyKategori')?>" method="post">
                    <select class="form-control" id="id_kategori_materi" name="id_kategori_materi" style="width:74%;" required>
                        <option value="" selected="true" disabled="disabled">- Anda ingin belajar apa hari ini? -</option>
                        <?php foreach($kategori_materi as $km) : ?>
                            <option value="<?=$km["id_kategori_materi"];?>"><?=$km["nama_kategori"];?></option>
                        <?php endforeach;?>
                    </select>
                    <input type="submit" value="Mulai Belajar">
                </form>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="<?= base_url()?>/assets_user/img/hero-img.png" class="img-fluid" alt="" style="margin-left:10%;">
        </div>
      </div>
            <div class="row justify-content-center">
            <div class="col-lg-6">
                
            </div>
            </div>
        </div>
        </div>
    </footer>
</section>

<section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-xl-5 col-lg-6 d-flex justify-content-center video-box align-items-stretch">
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>- Layanan yang Disediakan -</h3>
            <p>Website ini menyediakan 3 layanan utama khusus untuk kamu yang akan belajar coding.</p>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></i></div>
              <h4 class="title">Materi Langsung dari Tutornya</h4>
              <p class="description">Materi yang disajikan dibuat sendiri oleh tutor khusus untuk mahasiswa yang belajar coding pada website ini</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-group"></i></div>
              <h4 class="title">Forum Diskusi</h4>
              <p class="description">Forum merupakan media diskusi baik antar mahasiswa satu dengan lainnya maupun bersama dengan tutor</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-chat"></i></div>
              <h4 class="title">Private Chat dengan Tutor Secara Langsung</h4>
              <p class="description">Dengan website ini kamu bisa menghubungi tutor secara langsung melalui private chat yang tersedia</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

<section id="counts" class="counts">
      <div class="container">

        <div class="text-center title">
          <h3>Apa yang Kita Punya</h3>
          <!-- <p>Iusto et labore modi qui sapiente xpedita tempora et aut non ipsum consequatur illo.</p> -->
        </div>
        <div class="row counters">
          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?=$jumlah_tutor?></span>
            <p>Tutor</p>
          </div>
          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?=$jumlah_materi?></span>
            <p>Materi</p>
          </div>
          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?=$jumlah_konten?></span>
            <p>Konten</p>
          </div>
          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?=$jumlah_kategori?></span>
            <p>Kategori Materi</p>
          </div>
        </div>
      </div>
    </section>

    <section id="contact" class="contact">
      <div class="container">
        <div class="section-title">
          <h2>Contact</h2>
          <p>E-Learning dengan sistem tutor sebaya .....</p>
        </div>
        <div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6278.651006289314!2d112.61430743024357!3d-7.945365988160625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78827687d272e7%3A0x789ce9a636cd3aa2!2sPoliteknik%20Negeri%20Malang!5e0!3m2!1sid!2sid!4v1612611699040!5m2!1sid!2sid" width="100%" height="270px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <div class="row mt-5">
          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141</p>
              </div>
            </div>
          </div>
          <div class="col-lg-8 mt-5 mt-lg-0">
            <form action="<?=base_url('User/ProsesContactus')?>" method="post">
              <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_mahasiswa');?>">
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" autocomplete="off" required/>
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="kritik_saran" rows="5" data-rule="required" data-msg="Silahkan Tuliskan Kritik Saran Anda" placeholder="Kritik Saran" required></textarea>
                <div class="validate"></div>
              </div>
              <div class="text-center" style="margin-bottom:20px;"><button type="submit" class="btn" style="background-color:#49b5e7;color:#ffffff">Kirim Pesan</button></div>
            </form>
          </div>
        </div>
      </div>
    </section>