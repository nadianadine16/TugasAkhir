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

                <?php foreach($cek_tugas as $c):?>
                <form action="<?=base_url('User/Revisi_Tugas/'.$c['id_tugas'].'/'.$d['id_konten'])?>" method="post">
                    <input type="hidden" class="form-control" id="id_mahasiswa" name="id_mahasiswa" value="<?= $this->session->userdata('id_mahasiswa');?>">
                    <input type="hidden" class="form-control" id="id_konten" name="id_konten" value="<?= $d["id_konten"]?>">
                    <input type="hidden" class="form-control" id="id_tugas" name="id_tugas" value="<?= $c["id_tugas"]?>">
                    <input type="hidden" class="form-control" id="status" name="status" value="Diajukan">
                        <?php if($cek_tugas != NULL && $c["status"] == 'Disetujui') {?>
                            <label for="tugas"><b>Link Github Tugas Anda</b></label>
                            <?php foreach($tugas_by_id as $tbi):?>
                                <input type="text" class="form-control" id="tugas" name="tugas" value="<?= $tbi["tugas"]?>" readonly><br> 
                            <?php endforeach;?>
                            <center><p style="font-style:italic;">Jawaban Anda telah dikonfirmasi. Ayo lanjut ke materi berikutnya!</p></center>
                        <?php }
                        else if($cek_tugas != NULL && $c["status"] == 'Revisi') {?>
                            <b>Revisi Anda: </b>
                            <?php foreach($revisi_tugas as $t):?>
                                <p class="card-text"><?= $t["revisi"]?></p> 
                            <?php endforeach;?>

                            <div class="info">
                                <p><strong>Petunjuk Pengumpulan Link Tugas.</strong></p>
                                1. Unggah tugas Anda ke dalam Github<br>
                                2. Masuk pada file tugas yang telah Anda kerjakan<br>
                                3. Copy link file tugas Anda menggunakan https:// seperti <strong><a href="https://github.com/shevaputriw/MiniProjectRetrofit/blob/master/app/src/main/AndroidManifest.xml">https://github.com/shevaputriw/MiniProjectRetrofit/blob/master/app/src/main/AndroidManifest.xml</a></strong><br>
                                4. Masukkan dalam kolom dibawah ini
                            </div><br>

                            <label for="tugas"><b>Link Github Revisi Tugas Anda</b></label>
                            <input type="url" class="form-control" id="tugas" name="tugas" autocomplete="off" required><br>               
                            <center><button type="submit" class="btn" id= "button" name="submit" style="background-color:#49b5e7;color:#ffffff;">Submit</button></center>
                        <?php }
                        else if($cek_tugas != NULL && $c["status"] == 'Diajukan') {?>
                            <label for="tugas"><b>Link Github Tugas Anda</b></label>
                            <?php foreach($tugas_by_id as $tbi):?>
                                <input type="text" class="form-control" id="tugas" name="tugas" value="<?= $tbi["tugas"]?>" readonly><br> 
                            <?php endforeach;?>
                            <center><p style="font-style:italic;">Tutor sedang memeriksa jawaban Anda!</p></center>         
                        <?php }?>
                </form>
                <?php endforeach;?>
            </div>
        <?php endforeach;?>
    </div>
</section>