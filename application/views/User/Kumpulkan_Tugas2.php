<style>
.info {
  background-color: #e7f3fe;
  border-left: 6px solid #2196F3;
  padding-left: 10px;
  padding-top: 20px;
  padding-bottom: 20px;
}
</style>

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

            <div class="info">
              <p><strong>Petunjuk Pengumpulan Link Tugas.</strong></p>
              1. Unggah tugas Anda ke dalam Github<br>
              2. Masuk pada file tugas yang telah Anda kerjakan<br>
              3. Copy link file tugas Anda tanpa menggunakan https:// seperti <strong>github.com/shevaputriw/MiniProjectRetrofit/blob/master/app/src/main/AndroidManifest.xml</strong><br>
              4. Masukkan dalam kolom dibawah ini
            </div><br>

            <div class="form-group">            
              <label for="nim"><b>Masukkan Link Github Tugas Anda</b></label>
              <input type="text" class="form-control" id="tugas" name="tugas" required autocomplete="off"><br>              
              <center><button type="submit" class="btn" id= "button" name="submit" style="background-color:#49b5e7;color:#ffffff;">Submit</button></center>                        
            </form>
        </div>      
      </div>
      <?php endforeach;?>
  </div>
</section>