<section id="team" class="team section-bg" style="margin-top:50px">
      <div class="container">

        <div class="section-title">
          <h2>Chat Tutor - Mahasiswa</h2>        
        </div>
        <div class="row">
        <?php foreach($nama_tutor as $n):?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
          <a href="<?= base_url();?>user/Chat/<?=$n['id_mahasiswa'];?>">
            <div class="member">
              <div class="member-img">
                <img src="<?= base_url()?>/assets_user/img/tutor.png" class="img-fluid" alt="">               
              </div>
              <div class="member-info">
                <h4><center><?=$n["nama"];?></center></h4>                                                
              </div>
            </div>
          </a>
          </div>          
        <?php endforeach;?>
        </div>
      </div>
    </section><!-- End Team Section -->