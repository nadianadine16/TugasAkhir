<section id="team" class="team section-bg">
  <div class="container" style="margin-top:80px">
    <div class="section-title">
      <h2>Daftar Materi</h2>
    </div>        
    <?php foreach($daftar_konten as $d):?>
    <div class="card" style="margin-top:10px;">
    <video src="<?= base_url('upload/materi/'.$d["video"])?>" controls  style="width:500px; height:300px;margin-left:300px; margin-top:20px;"></video>
        <div class="card-body">
          <div class="card-title"><h4><?= $d["judul"]?></h4></div>      
          <p class="card-text"><?= $d["soal"]?></p>      
          <a href="<?= base_url();?>user/detailKonten/<?=$d['id_konten'];?>" class="btn btn-primary">Lihat</a>
        </div>      
      </div>
      <?php endforeach;?>
  </div>
</section><!-- End Team Section -->