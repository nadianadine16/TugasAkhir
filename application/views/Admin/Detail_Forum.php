<section id="gallery" class="gallery">
      <div class="container" style="margin-top:50px">

        <div class="row no-gutters">
        <div class="card" style="margin-left: 50px">
        <?php $no=1; foreach($detail_forum as $df):?>
        <ul class="list-group list-group-flush">
            <li class="list-group-item" style="width: 1000px;"><b>Pertanyaan : </b> <?=$df["pertanyaan"];?></li>
            <li class="list-group-item" style="width: 1000px;"><b>Kategori : </b><?=$df["nama_kategori"];?></li>
        </ul>
        <?php endforeach;?>
        </div>
        </div>

        <br><br><b style="margin-left: 50px">Jawaban Teman</b>
        <div class="row no-gutters">
        <div class="card" style="margin-left: 50px">
       
        <ul class="list-group list-group-flush">
        <?php $no=1; foreach($jawaban_forum as $jf):?>
            <li class="list-group-item" style="width: 1000px;"><?=$jf["nama"];?><br><?=$jf["chat"];?></li>
            <?php endforeach;?>
            <div class="kotak" id="mydiv" style="height:400px;display:block;  overflow:auto;" >
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
        <!-- <h4 style="padding-top:5px; color:white;">....</h4>
        <h4 style="padding-top:1px; padding-left:50px">Balas Forum</h4>
        <div class="kolom-komentar" style="width:940px;margin-top:10px;">        
           <form action="<?=base_url('Tutor/Jawab_Forum/'.$p['id_forum'])?>" method="post" >
                <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_tutor');?>">
                <input type="hidden" name="id_forum" value="<?=$p["id_forum"];?>">                
              <div class="form-group" style="margin-left:75px;">
                <input class="form-control" name="chat" rows="5" data-rule="required" data-msg="Masukkan Jawaban Anda" placeholder="Tulis Jawaban Anda Disini . . . "></input>
                <div class="validate"></div>
              </div>
              <div class="text-center"><button type="submit" class="btn btn-primary">Kirim</button></div>
            </form>
        </div> -->
      </div>      
    </div>    
  </div>  
</div>
<script type="text/javascript">
 var objDiv = document.getElementById("mydiv");
	objDiv.scrollTop = objDiv.scrollHeight;
</script>