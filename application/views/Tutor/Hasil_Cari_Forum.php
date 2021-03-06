<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <form class="form-inline" action ="<?= base_url('Tutor/Cari_Forum');?>" method="post">
                          <select class="form-control" id="id_kategori" name="id_kategori">
                            <option value="">- Pilih Kategori Forum -</option>
                                <?php foreach($kategori_forum as $kf) : ?>
                                    <option value="<?=$kf["id_kategori_materi"];?>"><?=$kf["nama_kategori"];?></option>
                                <?php endforeach;?>
                          </select>
                          <input class="btn btn-primary" type="submit" name="submit">
                        </form>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Forum</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
<center><h3>- Forum -</h3></center>
  <div class="row">
    <?php $no=1; foreach($forum as $p):?>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="courses-inner res-mg-b-30">
          <div class="course-des">
            <p><span><i class="fa fa-clock"></i></span> <b>Nama Penanya:</b> <?=$p["nama"];?></p>
            <p><span><i class="fa fa-clock"></i></span> <b>Kategori:</b> <?=$p["nama_kategori"];?></p>
            <p><span><i class="fa fa-clock"></i></span> <b>Pertanyaan:</b> <?=$p["pertanyaan"];?></p>
            <p><span><i class="fa fa-clock"></i></span> <b>Dibuat pada:</b> <?=$p["created_at"];?></p>
          </div>
          <div class="product-buttons" style="margin-left:400px;">
          <a href="<?= base_url();?>Tutor/Detail_Forum/<?=$p['id_forum'];?>" type="button" class="btn btn-primary">Lihat Forum</a>
          </div>
        </div>
      </div>
    <?php endforeach;?>
    </div>
  </div>
</div>  
</div>  
   