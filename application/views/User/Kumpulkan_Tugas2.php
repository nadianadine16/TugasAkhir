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
            <b>Nama Pengajar: </b><br>
            <p class="card-text"><?= $d["nama"]?></p>      
            <b>Soal: </b><br>
            <p class="card-text"><?= $d["soal"]?></p>                
            <form action="<?=base_url('user/tambah_tugas/'.$d['id_konten'])?>" method="post">
            <input type="hidden" class="form-control" id="id_mahasiswa" name="id_mahasiswa" value="<?= $this->session->userdata('id_mahasiswa');?>">
            <input type="hidden" class="form-control" id="id_materi" name="id_konten" value="<?= $d["id_konten"]?>">            
            <div class="form-group">            
              <label for="nim"><b>Masukkan Link Github Tugas Anda</b></label>
              <input type="text" class="form-control" id="tugas" name="tugas"><br>              
              <center><button type="submit" class="btn btn-primary" id= "button" name="submit" class="btn btn-primary float-right">Submit</button></center>                        
            </form>
        </div>      
      </div>
      <?php endforeach;?>
  </div>
</section><!-- End Team Section -->