<section id="team" class="team section-bg" style="margin-top:80px">
      <div class="container">
      <div class="section-title">
          <h2>Daftar Tutor</h2>        
        </div>
        <div class="row">
        <?php foreach($nama_tutor as $n):?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
          <a href="<?=base_url()?>User/Detail_Tutor/<?=$n['id_tutor'];?>">
            <div class="member">
              <div class="member-img">
                <img src="<?= base_url();?>/assets_user/img/team/team-2.jpg" class="img-fluid" alt="">               
              </div>          
              <div class="member-info">
                <h4><?=$n['nama']?></h4>
                <span><?=$n['tahun_masuk']?></span>
              </div>
            </div>
          </a>
          </div>          
          <?php endforeach;?>          
        </div>
      </div>
</section>