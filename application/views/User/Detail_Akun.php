

<section id="team" class="team section-bg" style="background-color:white; margin-top:70px">
  <div class="container">    
    <?php foreach($mahasiswa as $m):?>
    <div class="kotak" style="width: 100%; height:100%;">  
    <h4 style="font-family: cursive;"><b><?=$m['nama']?></b><span><a href="<?=base_url()?>/User/Edit_Profil/<?=$m['id_mahasiswa'];?>"><button class="btn btn-primary btn-sm" style="float:right;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit Profil</button></a></span></h4><hr><br>
    <p><b>NIM</b> : <?=$m['nim']?></h5>
    <p><b>Jenis Kelamin</b> : <?=$m['jenis_kelamin']?></h5>
    <p><b>Jurusan</b> : <?=$m['jurusan']?></h5>
    <p><b>Program Studi</b> : <?=$m['prodi']?></h5>
    <p><b>Tahun Masuk</b> : <?=$m['tahun_masuk']?></h5>
    <p><b>Github</b> : <?=$m['github']?></h5>
    </div> 
    <?php endforeach;?> 
    <hr style="margin-top: 4%;"> 

    <h5><center>Tugas Anda</center></h5><br>
    <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th><center>No</center></th>
            <th><center>Judul Konten</center></th>
            <th><center>Tugas</center></th>
            <th><center>Status</center></th>
        </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($tugas as $t):?>
        <tr>
            <td><?=$no++;?></td>
            <td><?=$t["judul"];?></td>
            <td><?=$t["tugas"];?></td>
            <td>
            <?php if($t["status"] == "Revisi"){?>
                <a href="<?= base_url();?>User/kumpulkanTugas/<?=$t['id_konten'];?>"><center><button class="btn btn-danger btn-sm" style="width:60px;align-text:center;">Revisi</button></center></a>
            <?php }
            else if ($t["status"] == "Diajukan") { ?>
            <center><button class="btn btn-primary btn-sm" disabled>Diajukan</button></center>
            <?php }
            else { ?>
            <center><button class="btn btn-success btn-sm" disabled>Disetujui</button></center>
            <?php }?>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
  </div> 
</section>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" defer></script> -->

<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>