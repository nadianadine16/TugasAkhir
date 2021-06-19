<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<section id="about" class="about">
    <div class="container" style="margin-top:80px;">
    <center><h2><b>- Profil Tutor -</b></h2></center><hr>
    </div>
</section>
<section id="about" class="about">
    <div class="container">
        <div class="row" style="margin-top:-90px;">
            <?php foreach($detail as $n):?>
                <div class="col-xl-5 col-lg-6 d-flex justify-content-center">
                    <?php if($n["foto"] == NULL){?>
                        <img src="<?= base_url('upload/profil/user.png')?>" class="img-fluid" alt="" style="width:100%;height:100%;">
                    <?php } else {?>
                        <img src="<?= base_url('upload/profil/'.$n['foto'])?>" class="img-fluid" alt="">
                    <?php }?> 
                </div>

                <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                    <h3><?=$n['nama']?></h3>
                    <p>Tutor Kategori <?=$n['nama_kategori']?></p>

                    <div class="icon-box">
                        <h4 class="title" style="margin-left:0px;"> Jurusan/Program Studi :</h4>
                        <p class="description" style="margin-left:0px;"><?=$n['jurusan']?>/<?=$n['prodi']?></p>
                    </div>

                    <div class="icon-box">
                        <h4 class="title" style="margin-left:0px;"> Jenis Kelamin/Tahun Masuk :</h4>
                        <p class="description" style="margin-left:0px;"><?=$n['jenis_kelamin']?>/<?=$n['tahun_masuk']?></p>
                    </div>

                    <div class="icon-box">
                        <h4 class="title" style="margin-left:0px;"> Alamat Github :</h4>
                        <p class="description" style="margin-left:0px;"><?=$n['github']?></p>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</section>

<section id="team" class="team section" style="background-color: #f4fbfe;">
  <div class="container" >
    <div class="section-title">
      <h4><b>Materi Tutor</b></h4>              
    </div>
    <div class="row"> 
    <table id="tabel-materi" class="table table-striped table-bordered" width="100%" cellspacing="0" style="border-width:3px;">
    <thead>
        <tr>
            <th><center>No</center></th>
            <th><center>Nama Materi yang Diunggah</center></th>
            <th><center>Aksi</center></th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($materi as $m):?>
        <tr>
            <td><center><?=$no++;?></center></td>
            <td style="width:1000px;"><?=$m["nama_materi"];?></a></td>
            <td><a href="<?= base_url();?>User/DaftarKonten/<?=$m['id_materi'];?>"><center><button class="btn btn-primary btn-sm">Lihat Materi</button></center></a></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
    </div>              
  </div>        
</section>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js" defer></script>

<script>
    $(document).ready(function(){
        $('#tabel-materi').DataTable();
    });
</script>