<section id="team" class="team section-bg" style="margin-top:50px">
      <div class="container">

        <div class="section-title">
          <h2>Daftar Materi</h2>        
        </div>

        <div class="row">
        <?php foreach($daftar_materi as $d):?>
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