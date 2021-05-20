<section id="team" class="team" style="margin-top:50px">  
  <div class="judul">
    <h2 style="font-family: cursive;font-size:30px;"><center><b>Chat Tutor - Mahasiswa</b></center></h2>            
  </div>
  <div class="col-md-3" style="margin-left:9%;margin-top: 30px;">
        <form action ="<?= base_url('user/cariChat');?>" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search.." name="keyword" autocomplete="off" autofocus>
            <div class="input-group-append">
              <input class="btn btn-primary" type="submit" name="submit"></button>
            </div>
          </div>
        </form>
      </div>
  <div class="kotak" style="width:80%; height:600px; margin-top:15%;position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
  <?php foreach($caritutor as $n):?>
    <div class="kotakSatu">    
      <div class="card border-info mb-3">
        <div class="card-header"><b><?=$n["nama"]?></b></div>        
        <div class="card-body text-info">    
        <?php if($n["foto"] == NULL){?>    
          <div class="card-text" style="text-align:justify;padding:8px;">
          <img src="<?= base_url('upload/user.png')?>" style="width:110px;height:120px;float:left; margin:0 8px 4px 0;" />
          <b>Kategori yang Diajar :</b> <?=$n["nama_kategori"]?><br>
          <b>Tahun Masuk :</b> <?=$n["tahun_masuk"]?>
          </div>
          <?php } else {?>
          <div class="card-text" style="text-align:justify;width:75%;padding:8px;">
          <img src="<?= base_url('upload/'.$n['foto'])?>" style="width:110px;height:120px;float:left; margin:0 8px 4px 0;" />
          <b>Kategori yang Diajar :</b> <?=$n["nama_kategori"]?><br>
          <b>Tahun Masuk :</b> <?=$n["tahun_masuk"]?>
          </div>
          <?php }?>
          <a href="<?= base_url();?>user/Chat/<?=$n['id_mahasiswa'];?>"style="float:right;color:#007bff; bottom: 0;right:0; padding: 15px; position: absolute;"><i class="fa fa-envelope" aria-hidden="true"></i> Message</a>
        </div>      
    </div>
    <?php endforeach;?>
    </div>    
  </div>
    </section>