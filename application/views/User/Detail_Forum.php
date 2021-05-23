<section id="gallery" class="gallery">

  <div class="container" style="margin-top:30px;background-color: #f4fbfe;">
  <h2><b><center><br>Forum Diskusi</center></b></h2><br>
    <?php $no=1; foreach($detail_pertanyaan as $p):?>
      <?php $tgl = $p["created_at"];?>
      <p><b><?= $p["nama"];?></b> pada <?php echo date("d-F-Y", strtotime($tgl));?></p>
      <p><b>Kategori</b> : <?= $p["nama_kategori"];?></p>
    <p><b>Pertanyaan</b> : <?=$p["pertanyaan"];?></p>
    <?php endforeach;?>
    <hr>
    <div class ="kotak" id= "kotak"style="margin-top:20px ; height:700px;; display:block;  overflow:auto;">
    <?php if($jawaban_forum == NULL) {?>
              <center><p style="margin-top:10%;font-size:16px;">Forum ini belum ada yang menjawab. <b>Jadilah yang pertama!</b></p></center>
            <?php }
            else {?>
    <?php foreach($jawaban as $m):?>
      <?php $tanggal = $m["created_at"]?>
      <div class="card border-secondary mb-2" style="max-width: 80%;margin-left:100px;">
        <div class="card-header"><b><?=$m["nama"]?></b></div>
        <div class="card-body text-secondary">
          <p class="card-text"><?=$m["chat"]?></p>          
          <p class="card-text" style="font-size:12px; text-align: right; "><?php echo date("d-F-Y h:i:s", strtotime($tanggal));?></p>
        </div>
      </div>
      <?php endforeach;?>
      <?php }?>
    </div>
    <h5 style="margin-left:45%;"><b><br>Balas Forum </b></h5>
    <div class="kolom-komentar" style="width:100%;margin-top:10px;margin-left:-30px;">        
           <form action="<?=base_url('User/Jawab_Forum/'.$p['id_forum'])?>" method="post" >
              <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_mahasiswa');?>">
              <input type="hidden" name="id_forum" value="<?=$p["id_forum"];?>">
              <div class="form-group" style="width:880px; margin-left:130px;">
                <textarea class="form-control" name="chat" required rows="5" data-rule="required" data-msg="Masukkan Pertanyaan Anda" placeholder="Tulis Pertanyaan Anda Disini . . . "></textarea>
                <div class="validate"></div>
              </div>
              <center><button type="submit" class="btn btn-primary" style="margin-left:4%;margin-bottom:20px;">Kirim</button></div>
            </form>
        </div>
      </div>
    </section>
  <script type="text/javascript">
 $('#kotak').scrollTop($('#kotak')[0].scrollHeight);
</script>