<section id="team" class="team section-bg" style="margin-top:80px">
      <div class="container">
      <div class="section-title">
          <h2>Daftar Nama Tutor</h2>        
        </div>
        <div class="row">
        <?php foreach($nama_tutor as $n):?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
          <a href="<?=base_url()?>User/Detail_Tutor/<?=$n['id_tutor'];?>">
            <div class="member">              
              <div class="member-info">              
                <h4><?=$n['nama']?></h4><hr>
                <h5 style="font-size:17px; color:black;"> <?=$n['jurusan']?></h4>
                <h5 style="font-size:17px; color:black;"> <?=$n['prodi']?></h5>
                <span style="float:right;"><?=$n['tahun_masuk']?></span>
              </div>
            </div>
            </a>
          </div>          
          <?php endforeach;?>          
        </div>    
      </div>
</section>