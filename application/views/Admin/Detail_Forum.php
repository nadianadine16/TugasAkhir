<?php $no=1; foreach($detail_forum as $p):?>
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
            <div class="kotak" id="mydiv" style="height:420px;display:block;  overflow:auto;" >
            <?php $no=1; foreach($jawaban_forum as $m):?>
              <?php $tgl = $m["created_at"];?>
              <div class="chat-message">							
                <div class="message" style="width:870px;" >
                  <a class="message-author"> <?=$m["nama"];?> </a>
                  <span class="message-date"> <?php echo date("d-F-Y H:i:s", strtotime($tgl));?> </span>
                  <span class="message-content"><?=$m["chat"];?></span>
                </div>
              </div>
            <?php endforeach;?>
            </div>
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