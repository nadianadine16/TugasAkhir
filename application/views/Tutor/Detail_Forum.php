<?php $no=1; foreach($detail_pertanyaan as $p):?>
  <?php $tanggal = $p["created_at"]?> 
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
                
  <?php endforeach;?>
              <div class="kotak" id="mydiv" style="height:340px;display:block;  overflow:auto;" >
              <?php if($jawaban_forum == NULL) {?>
                <center><p style="margin-top:10%;font-size:16px;">Forum ini belum ada yang menjawab. <b>Jadilah yang pertama!</b></p></center>
              <?php }
              else {?>
                <?php $no=1; foreach($jawaban as $m):?>
                  <?php $tgl = $m["send_time"];?>                  
                    <div class="chat-message">							
                      <div class="message" style="width:90%" >
                        <a class="message-author"> <?=$m["nama"];?> </a>
                        <span class="message-date"> <?php echo date("d-F-Y H:i", strtotime($tgl));?> </span>
                        <span class="message-content"><?=$m["chat"];?></span>
                      </div>
                    </div>                  
                <?php endforeach;?>
              <?php }?>
              </div>
              </div>
            </div>
          </div>
          <h4 style="padding-top:5px; color:white;">....</h4>
          <div class="row">
            <div class="col-md-12 col-sm-8 col-xs-12">
            <form action="<?=base_url('Tutor/Jawab_Forum/'.$p['id_forum'])?>" method="post" enctype="multipart/form-data">
              <?php  foreach($get_id_mahasiswa as $gid):?>
              <input type="hidden" name="id_user" value="<?=$gid['id_mahasiswa']?>">
              <?php endforeach;?>
              <input type="hidden" name="id_forum" value="<?=$p["id_forum"];?>">      
              <div class="form-group">
                <label>Jawab Forum</label>
                <textarea name="chat" id="summernoteForum"></textarea>                
              </div>              
              <span id="total-caracteres"></span>
              <button type="submit" id="submit" class="btn btn-primary float-right">Submit</button>              
            </form>            
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
  var cek = document.getElementById("summernoteForum");
  var batas_karakter = 108;
  function cek_jumlah_karakter() {
    if(cek.value.length >= batas_karakter) {      
      // alert('Anda mencapai batas maksimal karakter!');
      document.getElementById("limit_teks").innerHTML = batas_karakter+"/"+batas_karakter;
      document.getElementById("submit").disabled = true;

    }
    else{
      var jumlah_karakter = cek.value.length;
      document.getElementById("limit_teks").innerHTML = jumlah_karakter+"/"+batas_karakter;
    }
  }
</script>