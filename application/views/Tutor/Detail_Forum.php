<?php $no=1; foreach($detail_pertanyaan as $p):?>
  <?php $tanggal = $p["created_at"]?>
<div class="col-md-12 col-sm-8 col-xs-12">
  <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
    <div id="myTabContent" class="tab-content custom-product-edit">
      <div class="row"> 
        <div class="col-md-12 col-sm-8 col-xs-12">
          <div class="review-content-section">
            <div class="chat-discussion" style="height: auto;">
            <p style="font-size:15px;"><b><?=$p["nama"];?></b></p>
            <p style="font-size:20px;"><?=$p["pertanyaan"];?></p>
            <p style="font-size:11px;">Diunggah pada: <?php echo date("d-F-Y H:i:s", strtotime($tanggal));?></p>
            <?php endforeach;?>
            <?php $no=1; foreach($jawaban as $m):?>
              <?php $tgl = $m["created_at"];?>
              <div class="chat-message">							
                <div class="message" style="width:870px">
                  <a class="message-author"> <?=$m["nama"];?> </a>
                  <span class="message-date"> <?php echo date("d-F-Y H:i:s", strtotime($tgl));?> </span>
                  <span class="message-content"><?=$m["chat"];?></span>
                </div>
              </div>
            <?php endforeach;?>
            </div>
          </div>
        </div><br><br>
        <h4 style="padding-top:50px; color:white;">....</h4>
        <h4 style="padding-top:10px; padding-left:50px">Balas Forum</h4>
        <div class="kolom-komentar" style="width:940px;margin-top:10px;">        
           <form action="<?=base_url('Tutor/Jawab_Forum/'.$p['id_forum'])?>" method="post" >
                <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_tutor');?>">
                <input type="hidden" name="id_forum" value="<?=$p["id_forum"];?>">                
              <div class="form-group" style="margin-left:75px;">
                <textarea class="form-control" name="chat" rows="5" data-rule="required" data-msg="Masukkan Jawaban Anda" placeholder="Tulis Jawaban Anda Disini . . . "></textarea>
                <div class="validate"></div>
              </div>
              <div class="text-center"><button type="submit" class="btn btn-primary">Kirim</button></div>
            </form>
        </div>
      </div>      
    </div>    
  </div>  
</div>