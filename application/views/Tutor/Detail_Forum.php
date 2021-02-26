<section id="gallery" class="gallery">
      <div class="container" style="margin-top:50px">

        <div class="row no-gutters">
        <div class="card" style="margin-left: 50px">
        <?php $no=1; foreach($detail_pertanyaan as $p):?>
        <ul class="list-group list-group-flush">
            <li class="list-group-item" style="width: 1000px;"><?=$p["id_forum"];?>.&nbsp;<?=$p["pertanyaan"];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$p["nama_kategori"];?></li>
        </ul>
        <?php endforeach;?>
        </div>
        </div>

        <br><br>JAWABAN Teman
        <div class="row no-gutters">
        <div class="card" style="margin-left: 50px">
       
        <ul class="list-group list-group-flush">
        <?php $no=1; foreach($jawaban as $m):?>
            <li class="list-group-item" style="width: 1000px;"><?=$m["nama"];?><br><?=$m["chat"];?></li>
            <?php endforeach;?>
        </ul>
       
        </div>
        </div>

<br><br>JAWAB FORUM
        <form action="<?=base_url('Tutor/Jawab_Forum/'.$p['id_forum'])?>" method="post" >
                <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_tutor');?>">
                <input type="hidden" name="id_forum" value="<?=$p["id_forum"];?>">
                
              <div class="form-group">
                <textarea class="form-control" name="chat" rows="5" data-rule="required" data-msg="Masukkan Jawaban Anda" placeholder="Tulis Jawaban Anda Disini . . . "></textarea>
                <div class="validate"></div>
              </div>
              <div class="text-center"><button type="submit" class="btn btn-primary">Kirim</button></div>
            </form>

      </div>
    </section>