<section id="team" class="team section-bg" style="background-color:white; margin-top:70px">
  <div class="container">    
    <?php foreach($detail as $n):?>
    <div class="kotak" style="width: 100%; height:100%;background-color:white;">  
    <h4 style="font-family: cursive;"><b><center><?=$n['nama']?></center></b></h4><hr><br>
    <h5 style="font-size:17px; color:black;"><center> <?=$n['jurusan']?></center></h4>
    <h5 style="font-size:17px; color:black;"><center> <?=$n['prodi']?></center></h5>
    <h5 style="font-size:17px; color:black;"><center> <?=$n['tahun_masuk']?></center></h5>
    </div>
    <?php endforeach;?>  
  </div>
</section>
<!-- <section id="team" class="team section-bg" style="margin-top:80px">
      <div class="container">
      <div class="section-title">
          <h2>Daftar Nama Tutor</h2>        
        </div>
        <div class="row">
        <?php foreach($detail as $n):?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">          
            <div class="member">              
              <div class="member-info">              
                <h4><?=$n['nama']?></h4><hr>
                <h5 style="font-size:17px; color:black;"> <?=$n['jurusan']?></h4>
                <h5 style="font-size:17px; color:black;"> <?=$n['prodi']?></h5>
                <h5 style="font-size:17px; color:black;"> <?=$n['tahun_masuk']?></h5>
                <span style="float:right;"><?=$n['tahun_masuk']?></span>
              </div>
            </div>            
          </div>          
          <?php endforeach;?>          
        </div>    
      </div>
</section> -->