<section id="team" class="team section" style="margin-top:50px;">
  <div class="container" style="background-color: #f4fbfe; margin-top: -30px; width:75%;">
    <div class="section-title">
      <br><br><h2>Chat Bersama Tutor</h2>              
    </div>
    <div class="row">      
      <div class="col-md-5" style="margin-bottom:30px;">
      <form action ="<?= base_url('User/CariChat');?>" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari Tutor. . ." name="keyword" autocomplete="off">
            <div class="input-group-append">
              <input class="btn" type="submit" name="submit" style="background-color:#49b5e7;color:#ffffff;"></button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="kotak" style="width:97%; margin-left:10px;margin-right:10px;">
        <?php foreach($nama_tutor as $n):?>
        <div class="kotakSatu">    
          <div class="card border-info mb-3">
            <div class="card-header">
            <?php if($n["total"] == 0){?>
            <b><?=$n["nama"]?></b>        
            <?php
            } 
            else { ?>          
            <b><?=$n["nama"]?></b>
            <span class="badge badge-light" style="background-color:red; color: white"><?=$n["total"];?></span>             
            <?php
              } 
              ?>
            </div>        
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
              <a href="<?= base_url();?>User/Change_Status_Chat/<?=$n['id_mahasiswa'];?>"style="float:right;color:#007bff; bottom: 0;right:0; padding: 15px; position: absolute;"><i class="fa fa-envelope" aria-hidden="true"></i> Chat</a>
            </div>      
        </div>
        <?php endforeach;?>
  </div>      
  <div class="row">
    <div class="col">
        <?php echo $pagination; ?>
    </div>
  </div>  
</section>