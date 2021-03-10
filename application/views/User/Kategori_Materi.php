<section id="team" class="team section-bg" style="margin-top:50px">
      <div class="container">
        <div class="section-title">
          <h2>Kategori Materi</h2>          
        </div>
        <div class="col-lg-12 pt-12 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">        
      </div>      
        <div class="row" style="margin-rop:15px;">
        <?php foreach($kategori_materi as $m):?>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
              <div class="card-body">
              <img src="<?= base_url()?>/assets_user/img/materi.png" style="width:50px;height:50px">
                <h5 class="card-title" style="font-size:20px;"><b>Kategori Materi : </b> <?=$m["nama_kategori"];?></h5>                
                <a href="<?= base_url();?>user/daftarMateri/<?=$m['id_kategori_materi'];?>" class="btn btn-primary" style="float:right">Daftar Materi</a>
              </div>
            </div>
          </div>
        <?php endforeach;?>
        </div>      
      </div>
    </section><!-- End Team Section -->