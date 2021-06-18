<?php $no=1; foreach($detail_pertanyaan as $p):?>
  <?php $tanggal = $p["created_at"]?> 
    <div class="col-md-12 col-sm-8 col-xs-12">
    <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
      <div id="myTabContent" class="tab-content custom-product-edit">
        <div class="row"> 
          <div class="col-md-12 col-sm-8 col-xs-12">
            <div class="review-content-section">
              <div class="chat-discussion" style="height: auto;">
              <p style="font-size:23px;"><b><?=$p["topik"];?></b></p>
              <p style="font-size:15px;"><?=$p["pertanyaan"];?></p>
              <br>
              <p style="font-size:15px;">Oleh: <b><a  href="<?= base_url();?>Tutor/Detail_Mahasiswa/<?=$p['id_mahasiswa'];?>" ><?=$p["nama"];?></a></b> diunggah pada <?php echo date("d-F-Y H:i", strtotime($tanggal));?></p><br>
                
  <?php endforeach;?>
              <div class="kotak" id="mydiv" style="height:500px;display:block;overflow:auto;" >
              <?php if($jawaban_forum == NULL) {?>
                <center><p style="margin-top:20%;font-size:16px;">Forum ini <b>belum</b> ada yang menjawab.</p></center>
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
        </div>      
      </div>    
    </div>  
  </div>