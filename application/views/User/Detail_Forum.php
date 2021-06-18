<section id="gallery" class="gallery">
  <div class="container" style="margin-top:30px;background-color: #f4fbfe;">
    <div class="section-title">
        <h2><br>- Forum Diskusi -</h2>
    </div>
    <?php foreach($detail_pertanyaan as $p):?>
      <?php $tgl = $p["created_at"];?>      
        <p><b><?= $p["nama"];?></b> pada <?php echo date("d-F-Y", strtotime($tgl));?></p>
        <p><b>Kategori</b> : <?= $p["nama_kategori"];?></p>
        <p><b>Pertanyaan</b> : <?=$p["pertanyaan"];?>      
    <?php endforeach;?>
    <hr>
    <div class ="kotak" id= "kotak"style="margin-top:20px ; height:500px; display:block;  overflow:auto;">
    <?php if($jawaban_forum == NULL) {?>
      <center><p style="font-size:16px;"><br><br><br><br><br><br><br><br>Forum ini belum ada yang menjawab. <b>Jadilah yang pertama!</b><br><br><br><br><br></p></center>
    <?php }
    else {?>
      <?php foreach($jawaban as $m):?>
        <?php $tanggal = $m["send_time"]?>        
          <div class="card border-secondary mb-2" style="max-width: 80%;margin-left:100px;">
            <div class="card-header"><b><?=$m["nama"]?></b></div>
            <div class="card-body text-secondary">
              <p class="card-text"><?=$m["chat"]?></p>          
              <p class="card-text" style="font-size:12px; text-align: right; "><?php echo date("d-F-Y h:i", strtotime($tanggal));?></p>
            </div>
          </div>        
        <?php endforeach;?>
      <?php }?>
    </div><br><br>
    <div class="row">
            <div class="col-md-12 col-sm-8 col-xs-12">
            <form action="<?=base_url('User/Jawab_Forum/'.$p['id_forum'])?>" method="post" enctype="multipart/form-data">              
              <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_mahasiswa');?>">              
              <input type="hidden" name="id_forum" value="<?=$p["id_forum"];?>">      
              <div class="form-group">
                <label>Jawab Forum</label>
                <textarea name="chat" id="summernoteForum"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>              
            </form>    
      </div>
    </section>

<script type="text/javascript">
  $('#kotak').scrollTop($('#kotak')[0].scrollHeight);
</script>
<script>
  var cek = document.getElementById("input_pesan");
  var batas_karakter = 4000;
  function cek_jumlah_karakter() {
    if(cek.value.length >= batas_karakter) {
      alert('Anda mencapai batas maksimal karakter!');
      document.getElementById("limit_teks").innerHTML = batas_karakter+"/"+batas_karakter;

    }
    else{
      var jumlah_karakter = cek.value.length;
      document.getElementById("limit_teks").innerHTML = jumlah_karakter+"/"+batas_karakter;
    }
  }
</script>