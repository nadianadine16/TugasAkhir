<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                            </div>
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
<div class="row" style="margin-left:12px;">      
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="breadcome-heading">
        <form action ="<?= base_url('Tutor/carichat');?>" method="post" class="sr-input-func">
                <input type="text" placeholder="Search..." class="search-int form-control">
                <a href="#"><i class="fa fa-search"></i></a>
            </form>
        </div>
    </div>
  <!-- <div class="col-md-5">
    <form action ="<?= base_url('Tutor/carichat');?>" method="post">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Search.." name="keyword" autocomplete="off" autofocus>
      <div class="input-group-append">
        <input class="btn btn-primary" type="submit" name="submit"></button>
      </div>
    </div>
    </form>
  </div>       -->
<div class="courses-area" style="margin-top:30px">
  <div class="container-fluid">
    <div class="row">
      <?php $no=1; foreach($hasilsearch as $hs):?>  
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="width:100%;"><br>
          <div class="courses-inner res-mg-b-30">
            <div class="courses-title">                                
              <h2><?=$hs["nama"];?></h2>
            </div>          
            <div class="course-des">
              <p><b>NIM:</b> <?=$hs["nim"];?></p>
              <p><b>Jurusan:</b> <?=$hs["prodi"];?></p>
              <p><b>Prodi:</b> <?=$hs["jurusan"]?></p>
              <a type="button" href="<?= base_url();?>Tutor/Chat/<?=$hs['id_mahasiswa'];?>" class="btn btn-primary" style="float:right;margin-top:-6%;">Chat</a>
            </div>
          </div>
        </div>                  
      <?php endforeach;?>
    </div>    
  </div>
</div>        