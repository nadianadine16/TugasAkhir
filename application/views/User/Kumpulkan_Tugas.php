<section id="team" class="team section-bg">
  <div class="container" style="margin-top:70px">
    <div class="section-title">
      <h2>Kumpulkan Tugas</h2>
    </div>        
    <?php foreach($detail_materi as $d):?>
    <div class="card" style="margin-top:-15px;">    
        <div class="card-body">
            <b>Nama Materi: </b><br>
            <p class="card-text"><?= $d["nama_materi"]?></p>      
            <b>Nama Tutor: </b><br>
            <p class="card-text"><?= $d["nama"]?></p>      
            <b>Soal: </b><br>
            <p class="card-text"><?= $d["soal"]?></p> 

            <form action="<?=base_url('user/tambah_tugas/'.$d['id_konten'])?>" method="post">
            <input type="hidden" class="form-control" id="id_mahasiswa" name="id_mahasiswa" value="<?= $this->session->userdata('id_mahasiswa');?>">
            <input type="hidden" class="form-control" id="id_materi" name="id_konten" value="<?= $d["id_konten"]?>">
            
            <?php foreach($tampil as $p):?>
              <?php if($p["status"]== "1"){?>
              <div class="form-group">            
                <label for="nim"><b>Link Github Tugas Anda</b></label>
                <input type="text" class="form-control" id="tugas" name="tugas" value="<?= $p["tugas"]?>" readonly>
                <p style="font-size:15px"><i>&nbsp;Jawaban anda sedang diperiksa!<i></p>
            </div>
            <button type="submit" class="btn btn-primary" disabled id= "button" name="submit"class="btn btn-primary float-right">Submit</button>
            <?php
              } 
              else if ($p["status"] == "2"){?>
              <div class="form-group">            
                <label for="nim"><b>Link Github Tugas Anda</b></label>
                <input type="text" class="form-control" id="tugas" name="tugas" value="<?= $p["tugas"]?>">                
                <button type="submit" class="btn btn-primary" id= "button" name="submit"disabled class="btn btn-primary float-right">Submit</button>
            </div>              
            <?php
              }?>
            <?php endforeach;?>
            
            </form>
        </div>      
      </div>
      <?php endforeach;?>
  </div>
</section><!-- End Team Section -->