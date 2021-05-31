<section id="team" class="team section" style="margin-top:50px;">
  <div class="container" style="background-color: #f4fbfe; margin-top: -30px;">
    <div class="section-title">
      <br><br><h2>Daftar Materi</h2>              
    </div>
    <div class="row">      
      <div class="col-md-5" style="margin-left:71%;margin-bottom:30px;">
      <?php foreach($daftar_materi as $d):?>
        <form class="form-inline" action ="<?= base_url('User/carimateri/'.$d['id_kategori_materi']);?>" method="post">
      <?php endforeach;?> 
          <input type="text" class="form-control" placeholder="Cari Materi . . ." name="keyword" autocomplete="off" autofocus required> 
          <input class="btn" type="submit" name="submit" style="background-color:#49b5e7;color:#ffffff;">
        </form>
      </div>
    </div>
    <div class="row">
      <?php if($daftar_materi == NULL) {?>
      <center><p style="width:100%;margin-left:100%;">Sayang sekali, materi pada kategori ini belum ada :)</p></center>
      <?php }
      else {?>
      <?php foreach($daftar_materi as $d):?>
      <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
        <a href="<?= base_url();?>user/daftarKonten/<?=$d['id_materi'];?>">
          <div class="member">
            <div class="member-img">
              <img src="<?= base_url('upload/cover_materi/'.$d['cover'])?>" class="img-fluid" alt="" style="width:280px; height:150px;">               
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