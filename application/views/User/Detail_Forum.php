<section id="gallery" class="gallery">
  <div class="container" style="margin-top:30px;background-color: #f4fbfe;">
    <div class="section-title">
        <h2><br>- Forum Diskusi -</h2>
    </div>
    <?php foreach($detail_pertanyaan as $p):?>
      <?php $tgl = $p["created_at"];?>
      <?php if($p["link_tanya"] && $p["gambar_tanya"] != NULL) {?>
        <p><b><?= $p["nama"];?></b> pada <?php echo date("d-F-Y", strtotime($tgl));?></p>
        <p><b>Kategori</b> : <?= $p["nama_kategori"];?></p>
        <p><b>Pertanyaan</b> : <?=$p["pertanyaan"];?> (<a href=http://<?=$p["link_tanya"];?>><?=$p["link_tanya"]?></a>)</p>
        <center><a href="<?= base_url('upload/gambar_tanya/'.$p["gambar_tanya"])?>"><img src="<?= base_url('upload/gambar_tanya/'.$p['gambar_tanya'])?>" style="height: 40%; width: 40%;"></a></center>
      <?php }
      else if($p["link_tanya"] != NULL && $p["gambar_tanya"] == NULL) {?>
        <p><b><?= $p["nama"];?></b> pada <?php echo date("d-F-Y", strtotime($tgl));?></p>
        <p><b>Kategori</b> : <?= $p["nama_kategori"];?></p>
        <p><b>Pertanyaan</b> : <?=$p["pertanyaan"];?> (<a href=http://<?=$p["link_tanya"];?>><?=$p["link_tanya"]?></a>)</p>
      <?php }
      else if($p["link_tanya"] == NULL && $p["gambar_tanya"] != NULL) {?>
        <p><b><?= $p["nama"];?></b> pada <?php echo date("d-F-Y", strtotime($tgl));?></p>
        <p><b>Kategori</b> : <?= $p["nama_kategori"];?></p>
        <p><b>Pertanyaan</b> : <?=$p["pertanyaan"];?></p>
        <center><a href="<?= base_url('upload/gambar_tanya/'.$p["gambar_tanya"])?>"><img src="<?= base_url('upload/gambar_tanya/'.$p['gambar_tanya'])?>" style="height: 40%; width: 40%;"></a></center>
      <?php }
      else  {?>
        <p><b><?= $p["nama"];?></b> pada <?php echo date("d-F-Y", strtotime($tgl));?></p>
        <p><b>Kategori</b> : <?= $p["nama_kategori"];?></p>
        <p><b>Pertanyaan</b> : <?=$p["pertanyaan"];?>
      <?php }?>
    <?php endforeach;?>
    <hr>
    <div class ="kotak" id= "kotak"style="margin-top:20px ; height:500px; display:block;  overflow:auto;">
    <?php if($jawaban_forum == NULL) {?>
      <center><p style="font-size:16px;"><br><br><br><br><br><br><br><br>Forum ini belum ada yang menjawab. <b>Jadilah yang pertama!</b><br><br><br><br><br></p></center>
    <?php }
    else {?>
      <?php foreach($jawaban as $m):?>
        <?php $tanggal = $m["created_at"]?>
        <?php if($m["link_jawab"] && $m["gambar_jawab"] != NULL) {?>
          <div class="card border-secondary mb-2" style="max-width: 80%;margin-left:100px;">
            <div class="card-header"><b><?=$m["nama"]?></b></div>
            <div class="card-body text-secondary">
              <p class="card-text"><?=$m["chat"]?></p> 
              <p class="card-text"><b>Referensi</b> : <a href=<?=$m["link_jawab"];?>><?=$m["link_jawab"]?></a></p>          
              <center><a href="<?= base_url('upload/gambar_jawab/'.$m["gambar_jawab"])?>"><img src="<?= base_url('upload/gambar_jawab/'.$m['gambar_jawab'])?>" style="height: 40%; width: 40%;"></a></center>
              <p class="card-text" style="font-size:12px; text-align: right; "><?php echo date("d-F-Y h:i", strtotime($tanggal));?></p>
            </div>
          </div>
        <?php }
        else if($m["link_jawab"] != NULL && $m["gambar_jawab"] == NULL) {?>
          <div class="card border-secondary mb-2" style="max-width: 80%;margin-left:100px;">
            <div class="card-header"><b><?=$m["nama"]?></b></div>
            <div class="card-body text-secondary">
              <p class="card-text"><?=$m["chat"]?></p> 
              <p class="card-text"><b>Referensi</b> : <a href=<?=$m["link_jawab"];?>><?=$m["link_jawab"]?></a></p>          
              <p class="card-text" style="font-size:12px; text-align: right; "><?php echo date("d-F-Y h:i", strtotime($tanggal));?></p>
            </div>
          </div>
        <?php }
        else if($m["link_jawab"] == NULL && $m["gambar_jawab"] != NULL) {?>
          <div class="card border-secondary mb-2" style="max-width: 80%;margin-left:100px;">
            <div class="card-header"><b><?=$m["nama"]?></b></div>
            <div class="card-body text-secondary">
              <p class="card-text"><?=$m["chat"]?></p>       
              <center><a href="<?= base_url('upload/gambar_jawab/'.$m["gambar_jawab"])?>"><img src="<?= base_url('upload/gambar_jawab/'.$m['gambar_jawab'])?>" style="height: 40%; width: 40%;"></a></center>
              <p class="card-text" style="font-size:12px; text-align: right; "><?php echo date("d-F-Y h:i", strtotime($tanggal));?></p>
            </div>
          </div>
        <?php }
        else {?>
          <div class="card border-secondary mb-2" style="max-width: 80%;margin-left:100px;">
            <div class="card-header"><b><?=$m["nama"]?></b></div>
            <div class="card-body text-secondary">
              <p class="card-text"><?=$m["chat"]?></p>          
              <p class="card-text" style="font-size:12px; text-align: right; "><?php echo date("d-F-Y h:i", strtotime($tanggal));?></p>
            </div>
          </div>
        <?php }?>
        <?php endforeach;?>
      <?php }?>
    </div>
    <h5 style="margin-left:45%;"><b><br>Balas Forum </b></h5>
    <div class="kolom-komentar" style="width:100%;margin-top:10px;margin-left:-30px;">        
           <form action="<?=base_url('User/Jawab_Forum/'.$p['id_forum'])?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_mahasiswa');?>">
              <input type="hidden" name="id_forum" value="<?=$p["id_forum"];?>">
              <input type="hidden" name="status" value="<?=$p["id_forum"];?>">
              
              <div class="form-group" style="width:79%; margin-left:130px;">
                <textarea class="form-control" name="chat" required rows="5" data-rule="required" data-msg="Masukkan Pertanyaan Anda" placeholder="Tulis Balasan Anda Disini . . . " autofocus="true"style="width:91%;" id="input_pesan" onkeyup="cek_jumlah_karakter()"></textarea>
                <p style="margin-top:-16px;margin-left:-16px;font-size:13px;color:#808080;float:right;" id="limit_teks"></p>
                <div class="validate"></div>
              </div>
              <div class="form-group" style="width:79%; margin-left:130px;">
                <label for="link_jawab" style="float:left;"><b>Link Referensi (Opsional)</b></label>
                <input type="text" class="form-control" id="link_jawab" name="link_jawab" autocomplete="off" placeholder="Contoh: https://codingjti.com/">
              </div>
              <div class="form-group" style="width:79%; margin-left:130px;">
                <label for="gambar_jawab" style="float:left;"><b>Unggah Gambar (Opsional)</b></label>
                <input type="file" class="form-control" id="gambar_jawab" name="gambar_jawab">
                <p style="color:#808080;float:left;">Format .jpg .png</p>
              </div><br>
              <center><button type="submit" class="btn" style="margin-left:4%;margin-bottom:20px;background-color:#49b5e7;color:#ffffff;">Kirim</button></div>
            </form>
        </div>
      </div>
    </section>

<script type="text/javascript">
  $('#kotak').scrollTop($('#kotak')[0].scrollHeight);
</script>
<script>
  var cek = document.getElementById("input_pesan");
  var batas_karakter = 2000;
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