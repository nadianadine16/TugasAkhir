<?php $no=1; foreach($detail_pertanyaan as $p):?>
  <?php $tanggal = $p["created_at"]?>
  <?php if($p["link_tanya"] && $p["gambar_tanya"] != NULL) {?>
    <div class="col-md-12 col-sm-8 col-xs-12">
    <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
      <div id="myTabContent" class="tab-content custom-product-edit">
        <div class="row"> 
          <div class="col-md-12 col-sm-8 col-xs-12">
            <div class="review-content-section">
              <div class="chat-discussion" style="height: auto;">
              <p style="font-size:18px;"><b><?=$p["nama"];?></b></p>
              <p style="font-size:15px;"><?=$p["pertanyaan"];?> (<a href=http://<?=$p["link_tanya"];?>><?=$p["link_tanya"]?></a>)</p>
              <center><a href="<?= base_url('upload/gambar_tanya/'.$p["gambar_tanya"])?>"><img src="<?= base_url('upload/gambar_tanya/'.$p['gambar_tanya'])?>" style="height: 40%; width: 40%;"></a></center>
              <p style="font-size:11px;">Diunggah pada: <?php echo date("d-F-Y H:i", strtotime($tanggal));?></p>
              <hr>
  <?php }
  else if($p["link_tanya"] != NULL && $p["gambar_tanya"] == NULL) {?>
    <div class="col-md-12 col-sm-8 col-xs-12">
    <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
      <div id="myTabContent" class="tab-content custom-product-edit">
        <div class="row"> 
          <div class="col-md-12 col-sm-8 col-xs-12">
            <div class="review-content-section">
              <div class="chat-discussion" style="height: auto;">
              <p style="font-size:18px;"><b><?=$p["nama"];?></b></p>
              <p style="font-size:15px;"><?=$p["pertanyaan"];?> (<a href=http://<?=$p["link_tanya"];?>><?=$p["link_tanya"]?></a>)</p>
              <p style="font-size:11px;">Diunggah pada: <?php echo date("d-F-Y H:i", strtotime($tanggal));?></p>
  <?php }
  else if($p["link_tanya"] == NULL && $p["gambar_tanya"] != NULL) {?>
    <div class="col-md-12 col-sm-8 col-xs-12">
    <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
      <div id="myTabContent" class="tab-content custom-product-edit">
        <div class="row"> 
          <div class="col-md-12 col-sm-8 col-xs-12">
            <div class="review-content-section">
              <div class="chat-discussion" style="height: auto;">
              <p style="font-size:18px;"><b><?=$p["nama"];?></b></p>
              <p style="font-size:15px;"><?=$p["pertanyaan"];?></p>
              <center><a href="<?= base_url('upload/gambar_tanya/'.$p["gambar_tanya"])?>"><img src="<?= base_url('upload/gambar_tanya/'.$p['gambar_tanya'])?>" style="height: 40%; width: 40%;"></a></center>
              <p style="font-size:11px;">Diunggah pada: <?php echo date("d-F-Y H:i", strtotime($tanggal));?></p>
              
  <?php }
  else {?> 
    <div class="col-md-12 col-sm-8 col-xs-12">
    <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
      <div id="myTabContent" class="tab-content custom-product-edit">
        <div class="row"> 
          <div class="col-md-12 col-sm-8 col-xs-12">
            <div class="review-content-section">
              <div class="chat-discussion" style="height: auto;">
              <p style="font-size:18px;"><b><?=$p["nama"];?></b></p>
              <p style="font-size:15px;"><?=$p["pertanyaan"];?></p>
              <p style="font-size:11px;">Diunggah pada: <?php echo date("d-F-Y H:i", strtotime($tanggal));?></p>
              
  <?php }?>
  <?php endforeach;?>
              <div class="kotak" id="mydiv" style="height:340px;display:block;  overflow:auto;" >
              <?php if($jawaban_forum == NULL) {?>
                <center><p style="margin-top:10%;font-size:16px;">Forum ini belum ada yang menjawab. <b>Jadilah yang pertama!</b></p></center>
              <?php }
              else {?>
                <?php $no=1; foreach($jawaban as $m):?>
                  <?php $tgl = $m["created_at"];?>
                  <?php if($m["link_jawab"] && $m["gambar_jawab"] != NULL) {?>
                    <div class="chat-message">							
                      <div class="message" style="width:90%" >
                        <a class="message-author"> <?=$m["nama"];?> </a>
                        <span class="message-date"> <?php echo date("d-F-Y H:i:s", strtotime($tgl));?> </span>
                        <span class="message-content"><?=$m["chat"];?> (<a href="<?=$m["link_jawab"];?>"><?=$m["link_jawab"]?></a>)</span>
                        <center><a href="<?= base_url('upload/gambar_jawab/'.$m["gambar_jawab"])?>"><img src="<?= base_url('upload/gambar_jawab/'.$m['gambar_jawab'])?>" style="height: 40%; width: 40%;"></a></center>
                      </div>
                    </div>
                  <?php }
                  else if($m["link_jawab"] != NULL && $m["gambar_jawab"] == NULL) {?>
                    <div class="chat-message">							
                      <div class="message" style="width:90%" >
                        <a class="message-author"> <?=$m["nama"];?> </a>
                        <span class="message-date"> <?php echo date("d-F-Y H:i", strtotime($tgl));?> </span>
                        <span class="message-content"><?=$m["chat"];?> (<a href="<?=$m["link_jawab"];?>"><?=$m["link_jawab"]?></a>)</span>
                      </div>
                    </div>
                  <?php }
                  else if($m["link_jawab"] == NULL && $m["gambar_jawab"] != NULL) {?>
                    <div class="chat-message">							
                      <div class="message" style="width:90%" >
                        <a class="message-author"> <?=$m["nama"];?> </a>
                        <span class="message-date"> <?php echo date("d-F-Y H:i", strtotime($tgl));?> </span>
                        <span class="message-content"><?=$m["chat"];?></span>
                        <center><a href="<?= base_url('upload/gambar_jawab/'.$m["gambar_jawab"])?>"><img src="<?= base_url('upload/gambar_jawab/'.$m['gambar_jawab'])?>" style="height: 40%; width: 40%;"></a></center>
                      </div>
                    </div>
                  <?php }
                  else {?>
                    <div class="chat-message">							
                      <div class="message" style="width:90%" >
                        <a class="message-author"> <?=$m["nama"];?> </a>
                        <span class="message-date"> <?php echo date("d-F-Y H:i", strtotime($tgl));?> </span>
                        <span class="message-content"><?=$m["chat"];?></span>
                      </div>
                    </div>
                  <?php }?>
                <?php endforeach;?>
              <?php }?>
              </div>
              </div>
            </div>
          </div>
          <h4 style="padding-top:5px; color:white;">....</h4>
          <div class="row">
          <div class="col-md-12 col-sm-8 col-xs-12">
            <center><h4>Balas Forum</h4>
            <div class="kolom-komentar" style="width:88%;margin-top:10px;">        
              <form action="<?=base_url('Tutor/Jawab_Forum/'.$p['id_forum'])?>" method="post" enctype="multipart/form-data">
                  <?php  foreach($get_id_mahasiswa as $gid):?>
                    <input type="hidden" name="id_user" value="<?=$gid['id_mahasiswa']?>">
                  <?php endforeach;?>
                  <input type="hidden" name="id_forum" value="<?=$p["id_forum"];?>">                
                  <div class="form-group">
                    <textarea class="form-control" name="chat" rows="5" data-rule="required" data-msg="Masukkan Jawaban Anda" placeholder="Tulis Balasan Anda Disini . . . " autofocus="true" required style="width:93%;float:left;margin-top:-50px;" id="input_pesan" onkeyup="cek_jumlah_karakter()"></textarea>
                    <div class="validate"></div>
                  </div>
                  <div class="form-group">
                    <p style="margin-top:60px;margin-left:-16px;font-size:13px;color:#808080;" id="limit_teks"></p>
                  </div>
                  <div class="form-group">
                    <label for="link_jawab" style="float:left;"><br>Link Referensi (Opsional)</label>
                    <input type="text" class="form-control" id="link_jawab" name="link_jawab" autocomplete="off" placeholder="Contoh: https://codingjti.com/">
                  </div>
                  <div class="form-group">
                    <label for="gambar_jawab" style="float:left;">Unggah Gambar (Opsional)</label>
                    <input type="file" class="form-control" id="gambar_jawab" name="gambar_jawab">
                    <p style="color:#808080;float:left;">Format .jpg .png</p>
                  </div><br>
                  <div class="text-center"><button type="submit" class="btn btn-primary">Kirim</button></div>
                </form>
            </div>
            </div>
          </div>
        </div>      
      </div>    
    </div>  
  </div>
<script type="text/javascript">
 var objDiv = document.getElementById("mydiv");
	objDiv.scrollTop = objDiv.scrollHeight;
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