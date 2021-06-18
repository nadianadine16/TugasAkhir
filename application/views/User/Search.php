<section id="team" class="team section" style="margin-top:50px; ">
  <div class="container" style="background-color:#f4fbfe; margin-top:-10px;">
    <div class="section-title">
      <h2><br>- &nbsp;Forum Diskusi&nbsp;  -</h2>
      <p>Kamu bisa membuat forum disini. <b>Mahasiswa lain akan membantu memecahkan masalah kamu.</b></p>
    </div><br><br>
      
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-left:25%;">
        <form class="form-inline" action ="<?= base_url('User/cari');?>" method="post">
          <select class="form-control" id="id_kategori_materi" name="id_kategori_materi">
          <option value="" selected="true" disabled="disabled">- Pilih Kategori Forum -</option>
          <?php foreach($hasil_cari_kategori as $hc) : ?>
            <option value="" selected="true" disabled="disabled"><?=$hc["nama_kategori"];?></option>
            <?php endforeach;?>
                <?php foreach($kategori_forum as $kf) : ?>
                    <option value="<?=$kf["id_kategori_materi"];?>"><?=$kf["nama_kategori"];?></option>
                <?php endforeach;?>
          </select>&nbsp;
          <input type="text" class="form-control" value="<?=$hasil_cari?>" name="keyword" autocomplete="off">
          &nbsp;
          <input class="btn" style="background-color:#49b5e7;color:#ffffff;" type="submit" name="submit">
        </form>
        <center><p style="margin-top:10px;margin-bottom:0px;">atau</p>
        <a href="<?= base_url();?>User/Tanya_Forum" class="btn" style="margin-top:10px;margin-bottom:10px;margin-left:-5px;background-color:#49b5e7;color:#ffffff;"><span> <i class="fa fa-plus"></i></span> Buat Forum</a>
      </div>
      
    </div>
    <br>

    <?php if($forum == NULL) {?>
      <center><p><br><br>Kata kunci yang Anda cari tidak ditemukan.<b> Silahkan coba lagi.</b><br><br><br></p></center>
    <?php }
    else {?>
      <div class="row" style="margin-rop:15px;">
        <?php $no=1; foreach($forum as $p):?>
          <?php $tanggal = $p["created_at"]?>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
              <div class="card-body">
                <p class="card-text" style="font-size:22px;"><?=(strlen($p['topik']) > 35 ? substr($p['topik'], 0, 35)."..." : $p['topik']) ;?></p>
                <h5 class="card-title" style="font-size:16px;"><b>Nama Penanya : </b> <?=$p["nama"];?></h5>
                <h5 class="card-title" style="font-size:16px;"><b>Kategori : </b> <?=$p["nama_kategori"];?></h5>
                
                <p class="card-text" style="font-size:13px;text-align: right;"><?php echo date("d-F-Y", strtotime($tanggal));?></p>
                <a href="<?= base_url();?>user/change_status_jawaban/<?=$p['id_forum'];?>" class="btn btn-sm" style="float:right;background-color:#49b5e7;color:#ffffff;">Lihat Forum</a>
              </div>
            </div><br>
          </div>
        <?php endforeach;?>
      </div>
    <?php } ?>
  </div>
</section>