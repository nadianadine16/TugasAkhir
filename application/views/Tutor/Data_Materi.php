<script type="text/javascript" language="JavaScript">
    function konfirmasi()
    {
        tanya = confirm("Anda Yakin Akan Menghapus Data ?");
        if (tanya == true) return true;
            else return false;
    }
 </script>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <form class="form-inline" action="<?= base_url('Tutor/Cari_Materi');?>" method="post">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Cari Materi . . ." aria-label="Search" name="keyword">
                                    <input class="btn btn-primary" type="submit" name="submit">
                                </form>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Data Materi</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="courses-area">
    <div class="container-fluid">
    <center><h3>- Materi Anda -</h3><br></center>
        <div class="row">
            <?php foreach($materi as $m):?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="courses-inner res-mg-b-30" style="height:350px; margin-bottom:30px;">
                        <div class="courses-title">
                        <video src="<?= base_url('upload/materi/'.$m["video"])?>" controls style="width:220px; height:200px;"></video>
                            <h2><?=$m["nama_materi"];?></h2>
                        </div>
                        <div class="course-des">
                        <p><span><i class="fa fa-clock"></i></span> <b>Kategori Materi :</b> <?=$m["nama_kategori"];?></p>
                        </div>
                        <center><div class="product-buttons" style="margin-bottom:10px;">
                            <a href="<?= base_url();?>Tutor/Detail_Materi/<?=$m['id_materi'];?>"><button type="button" class="button-default cart-btn">Lihat</button></a>
                            <a href="<?= base_url();?>Tutor/Edit_Materi/<?=$m['id_materi'];?>"><button type="button" class="button-default cart-btn">Edit</button></a>
                            <a onclick="return konfirmasi()" href="<?= base_url();?>Tutor/Hapus_Materi/<?=$m['id_materi'];?>"><button type="button" class="button-danger cart-btn">Hapus</button></a>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>            
    </div>
</div>