<section id="team" class="team section-bg" style="background-color:white; margin-top:70px">
  <div class="container">    
    <?php foreach($detail as $n):?>
    <div class="kotak" style="width: 100%; height:100%;">  
    <h4 style="font-family: cursive;"><b><center><?=$n['nama']?></center></b></h4><hr><br>
    <?php if($n["foto"] == NULL){?>
        <img src="<?= base_url('upload/user.png')?>" class="img-fluid" alt="" style="width:300%;height:300%;">
    <?php } else {?>
        <img src="<?= base_url('upload/'.$n['foto'])?>" class="img-fluid" alt="" style="width:300px; height:300px;">
    <?php }?>                           
    <span><h5 style="font-size:17px; color:black;margin-left:30%; margin-top:-27%;" ><b>Jurusan</b> : <?=$n['jurusan']?></h4></span>
    <h5 style="font-size:17px; color:black;margin-left:30%; margin-top:2%;"><b>Program Studi</b> : <?=$n['prodi']?></h5>
    <h5 style="font-size:17px; color:black;margin-left:30%; margin-top:2%;"><b>Jenis Kelamin</b> : <?=$n['jenis_kelamin']?></h5>
    <h5 style="font-size:17px; color:black;;margin-left:30%; margin-top:2%;"><b>Tahun Masuk</b> : <?=$n['tahun_masuk']?></h5>
    <h5 style="font-size:17px; color:black;;margin-left:30%; margin-top:2%;"><b>Github</b> : <?=$n['github']?></h5>
    <h5 style="font-size:17px; color:black;;margin-left:30%; margin-top:2%;"><b>Kategori Tutor</b> : <?=$n['nama_kategori']?></h5>
    </div> 
    <?php endforeach;?> <hr style="margin-top: 17%;"> 
  </div> 
</section>

<div class="container"> 
<h4 style="font-family: cursive; margin-top:-50px;"><b><center>Daftar Materi Tutor</center></b></h4><br>
<table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th><center>No</center></th>
            <th><center>Nama Materi</center></th>
        </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($materi as $m):?>
        <tr>
            <td style="width:5%;"><center><?=$no++;?></center></td>
            <td><a href="<?= base_url();?>user/daftarKonten/<?=$m['id_materi'];?>"><?=$m["nama_materi"];?></a></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
</div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" defer></script>
<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>
<br>