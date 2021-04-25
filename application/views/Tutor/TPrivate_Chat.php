<div class="courses-area" style="margin-top:30px">
  <div class="container-fluid">
    <div class="row">
      <?php $no=1; foreach($mahasiswa as $n):?>  
      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        
        <div class="courses-inner res-mg-b-30">
          <div class="courses-title">                                
            <h2><?=$n["nama"];?></h2>
          </div>          
          <div class="course-des">
            <p><span><i class="fa fa-clock"></i></span> <b>NIM:</b> <?=$n["nim"];?></p>
            <p><span><i class="fa fa-clock"></i></span> <b>Jurusan:</b> <?=$n["prodi"];?></p>
            <p><span><i class="fa fa-clock"></i></span> <b>Prodi:</b> <?=$n["jurusan"]?></p>
          </div>
          <div class="product-buttons">
            <a type="button" href="<?= base_url();?>Tutor/Chat/<?=$n['id_mahasiswa'];?>" class="btn btn-primary">Chat</a>
          </div>
        </div>
        
      </div>                  
      <?php endforeach;?>
    </div>
  </div>
</div>        