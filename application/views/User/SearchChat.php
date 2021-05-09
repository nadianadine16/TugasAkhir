<section id="team" class="team section-bg" style="margin-top:50px">
      <div class="container">

        <div class="section-title">
          <h2>Chat Tutor - Mahasiswa</h2>        
        </div>
        <div class="row">      
      <div class="col-md-3">
        <form action ="<?= base_url('user/cariChat');?>" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search.." name="keyword" autocomplete="off" autofocus>
            <div class="input-group-append">
              <input class="btn btn-primary" type="submit" name="submit"></button>
            </div>
          </div>
        </form>
      </div>
      </div>
        <div class="row">
        <?php foreach($caritutor as $n):?>
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