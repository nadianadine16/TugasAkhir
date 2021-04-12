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
                <img src="<?= base_url()?>/assets_user/img/team/team-1.jpg" class="img-fluid" alt="">               
              </div>
              <div class="member-info">
                <h4><?= $d["nama_materi"]?></h4>
                <h4><?= $d["nama_kategori"]?></h4>
                <hr>
                <span style="float:right"><?= $d["nama"]?></span>
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
        <a href="<?=base_url()?>User/SeeAllTutor"><center>See All Tutor</center></a>
      </div>
</section><!-- End Team Section -->    
