<section id="team" class="team section" style="margin-top:50px; ">
  <div class="container" style="background-color:#f4fbfe; margin-top:-30px;">
    <div class="section-title">
      <h2><br>Forum Diskusi</h2>
      <p>Jika terdapat pertanyaan yang belum dibahas pada forum dapat menekan button tanya forum</p>
    </div>
      
    <div class="row">      
      <div class="col-md-5">
        <form action ="<?= base_url('user/cari');?>" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search.." name="keyword" autocomplete="off" autofocus>
            <div class="input-group-append">
              <input class="btn btn-primary" type="submit" name="submit"></button>
            </div>
          </div>
        </form>
      </div>
      <span><div><a href="<?= base_url();?>User/Tanya_Forum" class="btn btn-primary" style="margin-left:365%;">+ Tanya Forum</a></div></span>
    </div><br>

    <?php if($forum == NULL) {?>
      <center><p>Kata kunci yang Anda cari tidak ditemukan.<b> Silahkan coba lagi.</b><br><br><br></p></center>
    <?php }
    else {?>
      <div class="row" style="margin-rop:15px;">
        <?php $no=1; foreach($forum as $p):?>
          <?php $tanggal = $p["created_at"]?>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title" style="font-size:15px;"><b>Nama Penanya : </b> <?=$p["nama"];?></h5>
                <h5 class="card-title" style="font-size:15px;"><b>Kategori : </b> <?=$p["nama_kategori"];?></h5>
                <p class="card-text" style="font-size:13px;"><b>Pertanyaan : </b><?= substr($p["pertanyaan"],0,100)?></p>
                <p class="card-text" style="font-size:13px;text-align: right;"><?php echo date("d-F-Y", strtotime($tanggal));?></p>
                <a href="<?= base_url();?>user/Detail_Forum/<?=$p['id_forum'];?>" class="btn btn-primary" style="float:right">Lihat Forum</a>
              </div>
            </div><br>
          </div>
        <?php endforeach;?>
      </div>

      <!-- <div class="row">
        <div class="col">
          Tampilkan pagination
          <?php echo $pagination; ?>
        </div>
      </div> -->
    <?php } ?>
  </div>
</section>