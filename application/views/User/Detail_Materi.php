<section id="team" class="team section-bg">
  <div class="container" style="margin-top:80px">
    <div class="section-title">
      <h2>Detail Materi</h2>
    </div>        
    <?php foreach($detail_materi as $d):?>
    <div class="card" style="margin-top:10px;">
    <div class="card-title" style="margin-top:20px; font-size:40px;"><center><h4 style="font-size:40px; color:black"><?= $d["judul"]?></h4></center></div>   
        <div class="card-body">
        <?php if($d["video"] != NULL){?>
        <p><b>Video</b><br><a href="<?= base_url('upload/materi/'.$d["video"])?>"><?=$d["video"];?></a></p>
        <?php
        } 
        else { ?>
        <p><b>Video</b><br>-</p>
        <?php
        } 
        ?>             
          <b>Nama Pengajar: </b><br>
          <p class="card-text"><?= $d["nama"]?></p>      
          <b>Deskripsi Materi: </b><br>
          <p class="card-text"><?= $d["deskripsi"]?></p>      
          <b>Soal: </b><br>
          <p class="card-text"><?= $d["soal"]?></p>      
          <a href="<?= base_url();?>user/kumpulkanTugas/<?=$d['id_konten'];?>" class="btn btn-primary">Kumpulkan Tugas</a>
        </div>      
      </div>
      <?php endforeach;?>
  </div>
</section><!-- End Team Section -->