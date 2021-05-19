<section id="team" class="team section" style="margin-top:50px;">
  <div class="container" style="background-color: #f4fbfe; margin-top: -30px;">
    <div class="section-title">
      <br><br><h2>Daftar Materi</h2>              
    </div>
    <div class="row">      
      <div class="col-md-5">
        <form action ="<?= base_url('user/carimateri');?>" method="post">
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
      <?php if($cari_materi == NULL) {?>
      <center><p style="width:100%;margin-left:100%;">Sayang sekali, materi pada kategori ini belum ada :)</p></center>
      <?php }
      else {?>
      <?php foreach($cari_materi as $d):?>
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
              <span style="float:right; margin-bottom:15px;">Tutor : <?= $d["nama"]?></span>
            </div>
          </div>
        </a>
      </div>              
      <?php endforeach;?>      
    </div>    
    <?php }?>            
  </div>        
</section>