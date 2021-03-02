<section id="gallery" class="gallery">
      <div class="container" style="margin-top:50px">

        <div class="row no-gutters">
        <div class="card" style="margin-left: 50px">
        <?php $no=1; foreach($detail_forum as $df):?>
        <ul class="list-group list-group-flush">
            <li class="list-group-item" style="width: 1000px;"><?=$df["id_forum"];?>.&nbsp;<?=$df["pertanyaan"];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$df["nama_kategori"];?></li>
        </ul>
        <?php endforeach;?>
        </div>
        </div>

        <br><br>JAWABAN Teman
        <div class="row no-gutters">
        <div class="card" style="margin-left: 50px">
       
        <ul class="list-group list-group-flush">
        <?php $no=1; foreach($jawaban_forum as $jf):?>
            <li class="list-group-item" style="width: 1000px;"><?=$jf["nama"];?><br><?=$jf["chat"];?></li>
            <?php endforeach;?>
        </ul>
       
        </div>
        </div>

      </div>
    </section>