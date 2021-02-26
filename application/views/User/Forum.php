<section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <div><a href="<?= base_url();?>User/Tanya_Forum" class="btn-get-started scrollto">Tanya Forum</a></div>
      </div>
    </div>

    <section id="gallery" class="gallery">
      <div class="container" style="margin-top:50px">

        <div class="section-title">
          <h2>Daftar Pertanyaan</h2>
        </div>

        <div class="row no-gutters">
        <div class="card" style="margin-left: 50px">
        <?php $no=1; foreach($forum as $p):?>
        <ul class="list-group list-group-flush">
            <li class="list-group-item" style="width: 1000px;"><a href="<?= base_url();?>user/Detail_Forum/<?=$p['id_forum'];?>"><?=$p["pertanyaan"];?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$p["nama_kategori"];?></li>
        </ul>
        <?php endforeach;?>
        </div>
        </div>
      </div>
    </section>                                    
  </section>