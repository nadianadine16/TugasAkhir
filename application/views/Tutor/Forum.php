<section id="hero" class="d-flex align-items-center">
<section id="gallery" class="gallery">
      <div class="container" style="margin-top:50px">

        <div class="section-title">
          <h2>Daftar Pertanyaan</h2>
        </div>

        <div class="row no-gutters">
        <div class="card" style="margin-left: 50px">
        <?php $no=1; foreach($forum as $p):?>
        <ul class="list-group list-group-flush">
            <li class="list-group-item" style="width: 1000px;"><a href="<?= base_url();?>Tutor/Detail_Forum/<?=$p['id_forum'];?>"><?=$p["pertanyaan"];?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$p["nama_kategori"];?></li>
        </ul>
        <?php endforeach;?>
        </div>
        </div>

      </div>
    </section>                                     
  </section>