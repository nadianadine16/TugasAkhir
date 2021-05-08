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
            <div class="member-img" style="height:200px;">
              <?php if($n["foto"] == NULL){?>
                <center><img src="<?= base_url('upload/user.png')?>" class="img-fluid" alt="" style="width:70%;height:70%;"></center>
              <?php } else {?>
                <center><img src="<?= base_url('upload/'.$n['foto'])?>" class="img-fluid" alt="" style="width:70%;height:70%;"></center>
              <?php }?>
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