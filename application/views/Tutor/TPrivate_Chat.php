<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <form class="form-inline" action ="<?= base_url('Tutor/carichat');?>" method="post">
                          <input type="text" class="form-control" placeholder="Cari Mahasiswa.." name="keyword" autocomplete="off" autofocus required> 
                          <input class="btn btn-primary" type="submit" name="submit">
                        </form>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Private Chat</span></li>
                            </ul>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>        
    </div>
</div>

<center><h3>Private Chat</h3></center>
<div class="container-fluid">   
<div class="courses-area" style="margin-top:30px">
  <div class="container-fluid">
    <div class="row">
      <?php $no=1; foreach($mahasiswa as $n):?>  
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="width:99%;"><br>
          <div class="courses-inner res-mg-b-30">
            <div class="courses-title">                                
              <h2><?=$n["nama"];?></h2>
            </div>          
            <div class="course-des">
              <p><b>NIM:</b> <?=$n["nim"];?></p>
              <p><b>Jurusan:</b> <?=$n["prodi"];?></p>
              <p><b>Prodi:</b> <?=$n["jurusan"]?></p>
              <a type="button" href="<?= base_url();?>Tutor/Chat/<?=$n['id_mahasiswa'];?>" class="btn btn-primary" style="float:right;margin-top:-6%;">Chat</a>
            </div>
          </div>
        </div>                  
      <?php endforeach;?>
    </div>
    <div class="row">
        <div class="col">
    
            <?php echo $pagination; ?>
        </div>
    </div>
  </div>
</div>         