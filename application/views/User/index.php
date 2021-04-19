<section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Let's Study and sharing</h1>
          <h2>Pembelajaran model tutor sebaya saat ini menjadi trend karena dengan adanya model ini maka mahasiswa yang mengalami kesulitan tidak akan merasa canggung dalam mengajukan pertanyaan</h2>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="<?= base_url()?>/assets_user/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>
</section><!-- End Hero -->

<section id="portfolio" class="portfolio">
  <div class="row">
    <div class="col-lg-12 d-flex justify-content-center">
      <ul id="portfolio-flters">
      <?php foreach($kategori_materi as $m):?>
        <li style="color:black"><a href="<?= base_url();?>user/daftarMateribyKategori/<?=$m['id_kategori_materi'];?>"><?=$m["nama_kategori"];?></a></li>        
        <?php endforeach;?>
      </ul>
    </div>
  </div>
</section><!-- End Hero -->

<!-- ======= Counts Section ======= -->
<section id="counts" class="counts">
      <div class="container">

        <div class="text-center title">
          <h3>Apa yang Kita Punya</h3>
          <p>Iusto et labore modi qui sapiente xpedita tempora et aut non ipsum consequatur illo.</p>
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
            <span data-toggle="counter-up"><?=$forum?></span>
            <p>Kategori Materi</p>
          </div>
        </div>
      </div>
    </section><!-- End Counts Section -->

<section id="team" class="team section-bg">
  <div class="container">
    <div class="section-title">
      <h2>Daftar Materi</h2>        
    </div>
    <div class="row">
    <?php foreach($daftar_materi_limit as $d):?>
      <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
      <a href="<?= base_url();?>user/daftarKonten/<?=$d['id_materi'];?>">
        <div class="member">
          <div class="member-img">
            <img src="<?= base_url('upload/cover_materi/'.$d['cover'])?>" class="img-fluid" alt="">               
          </div>
          <div class="member-info">
            <h4><?= $d["nama_materi"]?></h4>
            <p style="color:black;">Kategori : <?= $d["nama_kategori"]?></p>
            <hr>
            <span style="float:right; margin-bottom: 13px;">Tutor : <?= $d["nama"]?></span>
          </div>
        </div>
      </a>
      </div>          
    <?php endforeach;?>
    </div>
  </div>
</section><!-- End Team Section -->

<section id="team" class="team section-bg" style="background-color:white;">
      <div class="container">
      <div class="section-title">
          <h2>Daftar Tutor</h2>        
        </div>
        <div class="row">
        <?php foreach($nama_tutor as $n):?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
          <a href="<?=base_url()?>User/Detail_Tutor/<?=$n['id_tutor'];?>">
            <div class="member">              
              <div class="member-info">
                <h4><?=$n['nama']?></h4>
                <span><?=$n['tahun_masuk']?></span>
              </div>
            </div>
          </a>
          </div>          
          <?php endforeach;?>          
        </div>
        <a href="<?=base_url()?>User/SeeAllTutor"><center>Lihat Semua Tutor</center></a>
      </div>
</section><!-- End Team Section -->    
