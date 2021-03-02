<section id="gallery" class="gallery">

  <div class="container" style="margin-top:50px">
  <h1 style="color:#3c5466"><b><center>Forum Diskusi</center></b></h1>
    <?php $no=1; foreach($detail_pertanyaan as $p):?>
    <h5 style="margin-left:60px"><b>Pertanyaan : <?=$p["pertanyaan"];?> </b></h5>
    <?php endforeach;?>
    <hr>
    <div class ="kotak" style="margin-top:20px">
    <?php foreach($jawaban as $m):?>
      <div class="card border-secondary mb-2" style="max-width: 80%;margin-left:100px;">
        <div class="card-header"><b><?=$m["nama"]?></b></div>
        <div class="card-body text-secondary">
          <p class="card-text"><?=$m["chat"]?></p>
          <p class="card-text" style="font-size:12px; text-align: right; "><?=$m["created_at"]?></p>
        </div>
      </div>
      <?php endforeach;?>
    </div>
    <h5 style="margin-left:60px; margin-top:40px;"><b>Balas Forum </b></h5>
    <div class="kolom-komentar" style="width:1000px;margin-top:10px;">        
           <form action="<?=base_url('User/Jawab_Forum/'.$p['id_forum'])?>" method="post" >
              <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_mahasiswa');?>">
              <input type="hidden" name="id_forum" value="<?=$p["id_forum"];?>">
              <div class="form-group" style="margin-left:75px;">
                <textarea class="form-control" name="chat" rows="5" data-rule="required" data-msg="Masukkan Jawaban Anda" placeholder="Tulis Jawaban Anda Disini . . . "></textarea>
                <div class="validate"></div>
              </div>
              <div class="text-center"><button type="submit" class="btn btn-primary" style="float:right">Kirim</button></div>
            </form>
        </div>
      </div>
    </section>