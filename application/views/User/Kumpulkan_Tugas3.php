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
                <form action="<?=base_url('user/revisi_tugas/'.$c['id_tugas'].'/'.$d['id_konten'])?>" method="post">
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
                            <?php foreach($tugas as $t):?>
                                <p class="card-text"><?= $t["revisi"]?></p> 
                            <?php endforeach;?>
                            <label for="tugas"><b>Link Github Revisi Tugas Anda</b></label>
                            <input type="text" class="form-control" id="tugas" name="tugas" autocomplete="off"><br>               
                            <center><button type="submit" class="btn btn-primary" id= "button" name="submit" class="btn btn-primary float-right">Submit</button></center>
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