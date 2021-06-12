<section id="team" class="team section" style="margin-top:70px">
  <div class="container" style="background-color: #f4fbfe; margin-top: -30px;">
    <div class="section-title">
      <h2><br>Daftar Tutor</h2>        
    </div>

    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <form class="form-inline" action ="<?= base_url('User/Cari_Tutor');?>" method="post">
          <select class="form-control" id="id_kategori_materi" name="id_kategori_materi">
          <?php foreach($hasil_cari_kategori as $hc) : ?>
            <option value="" selected="true" disabled="disabled"><?=$hc["nama_kategori"];?></option>
            <?php endforeach;?>
                <?php foreach($kategori_tutor as $kt) : ?>
                    <option value="<?=$kt["id_kategori_materi"];?>"><?=$kt["nama_kategori"];?></option>
                <?php endforeach;?>
          </select>&nbsp;
          <input type="text" class="form-control" value="<?=$hasil_cari?>" name="keyword" autocomplete="off">
          &nbsp;
          <input class="btn" type="submit" name="submit" style="background-color:#49b5e7;color:#ffffff;">
        </form>
      </div>
    </div>

    <div class="row">
      <?php if($nama_tutor == NULL) {?>
        <center><br><br><br><p style="margin-left:60%;width:100%;">Sayang sekali, tutor yang Anda cari tidak ditemukan. <b>Silahkan coba lagi.<br><br><br></b></center>
      <?php }
      else {?>
          <?php foreach($nama_tutor as $n):?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" style="margin-top:50px;">
          <a href="<?=base_url()?>User/Detail_Tutor/<?=$n['id_tutor'];?>">
            <div class="member">
              <div class="member-img" style="height:200px;">
              <?php if($n["foto"] == NULL){?>
                <center><img src="<?= base_url('upload/profil/user.png')?>" class="img-fluid" alt="" style="width:70%;height:70%;"></center>
              <?php } else {?>
                <center><img src="<?= base_url('upload/profil/'.$n['foto'])?>" class="img-fluid" alt="" style="width:70%;height:70%;"></center>
              <?php }?>            
              </div>          
              <div class="member-info">
                <h4><?=$n['nama']?></h4>
                <span><?=$n['nama_kategori']?> | <?=$n['tahun_masuk']?> </span>
              </div>
            </div>
          </a>
          </div>          
        <?php endforeach;?>  
      <?php }?>         
    </div>
  </div>
</section>