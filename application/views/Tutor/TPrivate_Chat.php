<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <form class="form-inline" action ="<?= base_url('Tutor/CariChat');?>" method="post">
                          <input type="text" class="form-control" placeholder="Cari Mahasiswa.." name="keyword" autocomplete="off" required> 
                          <input class="btn btn-primary" type="submit" name="submit">
                        </form>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                              <li><a href="<?= base_url();?>/Tutor/index" style="color:#088ccf;">Home</a> <span class="bread-slash">/</span></li>
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
      <div id="list2"></div>
    </div>
    <div class="row">
        <div class="col">    
            <?php echo $pagination; ?>
        </div>
    </div>
  </div>
</div>         