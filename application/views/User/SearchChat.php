<section id="team" class="team" style="margin-top:50px">  
  <div class="section-title">
    <br><h2><center><b>Chat Bersama Tutor</b></center></h2>            
  </div>
  <div class="col-md-3" style="margin-left:66%;margin-top: 0px;">
    <form action ="<?= base_url('user/cariChat');?>" method="post">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari Tutor. . ." name="keyword" autocomplete="off" autofocus>
        <div class="input-group-append">
          <input class="btn" type="submit" name="submit" style="background-color:#49b5e7;color:#ffffff;"></button>
        </div>
      </div>
    </form>
  </div>
  <div class="kotak" style="width:80%; height:600px; margin-top:18%;position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
    <?php if($nama_tutor == NULL) {?>
      <div class="kotak2" style="background-color: #f4fbfe; width:100%; height:12%; margin-top:10%;">
      <center><p><br>Tutor yang Anda cari tidak ditemukan.<b> Silahkan coba lagi.</b><br></p></center>
    <?php } 
    else {?>
      <?php foreach($nama_tutor as $n):?>
        <div class="kotakSatu">    
          <div class="card border-info mb-3">
            <div class="card-header"><b><?=$n["nama"]?></b></div>        
            <div class="card-body text-info">    
            <?php if($n["foto"] == NULL){?>    
              <div class="card-text" style="text-align:justify;padding:5px;">
              <img src="<?= base_url('upload/profil/user.png')?>" style="width:110px;height:140px;float:left; margin:0 10px 4px 0;" />
              <br><b>Kategori Tutor :</b> <?=$n["nama_kategori"]?><br>
              <b>Tahun Masuk :</b> <?=$n["tahun_masuk"]?>
              </div>
              <?php } else {?>
              <div class="card-text" style="text-align:justify;width:75%;padding:5px;">
              <img src="<?= base_url('upload/profil/'.$n['foto'])?>" style="width:110px;height:140px;float:left; margin:0 10px 4px 0;" />
              <br><b>Kategori Tutor :</b> <?=$n["nama_kategori"]?><br>
              <b>Tahun Masuk :</b> <?=$n["tahun_masuk"]?>
              </div>
              <?php }?>
              <a href="<?= base_url();?>user/Chat/<?=$n['id_mahasiswa'];?>"style="float:right;color:#007bff; bottom: 0;right:0; padding: 15px; position: absolute;"><i class="fa fa-envelope" aria-hidden="true"></i> Chat</a>
            </div>      
        </div>
      <?php endforeach;?>
    <?php }?>
  </div>
    <!-- <div class="row">
        <div class="col">
            <?php echo $pagination; ?>
        </div>
    </div>
  </div> -->
    </section>