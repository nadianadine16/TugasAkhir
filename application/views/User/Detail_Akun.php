<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<section id="about" class="about">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" style="margin-top:20px;">
            <?php foreach($mahasiswa as $m):?>
                <div class="kotak" style="width: 100%; height:100%;">  
                    <h4><b><?=$m['nama']?></b><span><a href="<?=base_url()?>/User/Edit_Profil/<?=$m['id_mahasiswa'];?>">
                    <button class="btn btn-sm" style="background-color:#49b5e7;color:#ffffff;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  </button></a></span></h4><hr style="width:180%;"><br>
                    <p><b>NIM</b> : <?=$m['nim']?></h5>
                    <p><b>Jenis Kelamin</b> : <?=$m['jenis_kelamin']?></h5>
                    <p><b>Jurusan</b> : <?=$m['jurusan']?></h5>
                    <p><b>Program Studi</b> : <?=$m['prodi']?></h5>
                    <p><b>Tahun Masuk</b> : <?=$m['tahun_masuk']?></h5>
                    <p><b>Github</b> : <?=$m['github']?></h5>
                </div> 
            <?php endforeach;?>
            </div>
        </div>
    </div>
</section>

<section id="team" class="team section" style="background-color: #f4fbfe; margin-top:-70px;">
  <div class="container" >
        <div class="section-title">
        <h4><b>Tugas Anda</b></h4>              
        </div>
        <div class="row"> 
            <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0" style="border-width:3px;">
                <thead>
                    <tr>
                        <th><center>No</center></th>
                        <th style="width:300px;"><center>Judul Konten</center></th>
                        <th style="width:700px;"><center>Tugas</center></th>
                        <th><center>Status</center></th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($tugas as $t):?>
                    <tr>
                        <td><?=$no++;?></td>
                        <td><?=$t["judul"];?></td>
                        <td><?=(strlen($t['tugas']) > 70 ? substr($t['tugas'], 0, 70)."..." : $t['tugas']) ;?></td>
                        <td>
                        <?php if($t["status"] == "Revisi"){?>
                            <a href="<?= base_url();?>User/KumpulkanTugas/<?=$t['id_konten'];?>"><center><button class="btn btn-danger btn-sm" style="width:60px;align-text:center;">Revisi</button></center></a>
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
    </div>        
</section>

<section id="team" class="team section">
  <div class="container" >
    <div class="section-title">
        <h4><b>Forum yang Anda Buat</b></h4>              
    </div>
    <div class="row"> 
        <table id="tabel-data2" class="table table-striped table-bordered" width="100%" cellspacing="0" style="border-width:3px;">
            <thead>
                <tr>
                    <th><center>No</center></th>
                    <th style="width:150px;"><center>Kategori Forum</center></th>
                    <th style="width:500px;"><center>Topik Forum</center></th>
                    <th style="width:150px;"><center>Dibuat pada</center></th>
                    <th style="width:100px;"><center>Aksi</center></th>
                </tr>
            </thead>
            <tbody id="listtab">
            </tbody>
        </table>
    </div>              
  </div>        
</section>

<script type="text/javascript">
    $(document).ready(function() {
            $.ajax({
                url: "<?php echo base_url(); ?>User/forum_dibuat",
                method: "POST",
                data: {
                },
                async: false,
                dataType: 'json',
                success: function(data) {                                                            
                    var html = '';
                    var i;  
                    for (i = 0; i < data.length; i++) {
                        if(data[i].total!=0){   
                            var oDate = data[i].created_at;
                            var Ftime = oDate.substr(0,10).split('-').reverse().join('-')+" "+oDate.substr(11,5);
                            var topik = data[i].topik;
                            var hitung = topik.length;
                            var batas1 = topik.substring(0, 40);
                            var batas = hitung > 40 ? batas1+'...' : topik;
                            html += '<tr><td>'+(i+1)+'</td><td>'+data[i].nama_kategori+'</td><td>'+ batas +'    <span class="badge badge-light" style="background-color:red; color: white">'+data[i].total+'</span></td><td>'+Ftime+'</td><td><a href="<?= base_url();?>User/Change_Status_Jawaban/'+data[i].id_forum+'"><center><button class="btn btn-primary btn-sm">Lihat Forum</button></center></a></td></tr>';
                        }                                        
                        if(data[i].total==0){   
                            var oDate = data[i].created_at;
                            var Ftime = oDate.substr(0,10).split('-').reverse().join('-')+" "+oDate.substr(11,5);
                            var topik = data[i].topik;
                            var hitung = topik.length;
                            var batas1 = topik.substring(0, 40);
                            var batas = hitung > 40 ? batas1+'...' : topik;
                            html += '<tr><td>'+(i+1)+'</td><td>'+data[i].nama_kategori+'</span></td><td>'+batas+'</td><td>'+Ftime+'</td><td><a href="<?= base_url();?>User/Change_Status_Jawaban/'+data[i].id_forum+'"><center><button class="btn btn-primary btn-sm">Lihat Forum</button></center></a></td></tr>';
                        }                                        
                    }
                    $('#listtab').html(html);
                    $('#tabel-data2').DataTable();
                }
            });
    })
</script>

<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js" defer></script>