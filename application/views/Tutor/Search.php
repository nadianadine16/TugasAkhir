<div class="payment-cart-pro mg-b-30" style="margin-top:50px;">
  <div class="container-fluid">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="breadcome-heading">
        <form action ="<?= base_url('tutor/cari');?>" method="post" role="search" class="sr-input-func">
          <input type="text" placeholder="Search..." class="search-int form-control" name="keyword" autocomplete="off">
            <a href="#"><i class="fa fa-search"></i></a>
        </form>
      </div>
    </div> 
  </div><br>
  <div class="row">
    <?php $no=1; foreach($forum as $p):?>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="courses-inner res-mg-b-30">
          <div class="course-des">
            <p><span><i class="fa fa-clock"></i></span> <b>Nama Penanya:</b> <?=$p["nama"];?></p>
            <p><span><i class="fa fa-clock"></i></span> <b>Pertanyaan:</b> <?=$p["pertanyaan"];?></p>
            <p><span><i class="fa fa-clock"></i></span> <b>Dibuat pada:</b> <?=$p["created_at"];?></p>
          </div>
          <div class="product-buttons">
          <a href="<?= base_url();?>Tutor/Detail_Forum/<?=$p['id_forum'];?>" type="button" class="btn btn-primary">Lihat Forum</a>
          </div>
        </div>
      </div>
    <?php endforeach;?>
    </div>
  </div>  
</div>  