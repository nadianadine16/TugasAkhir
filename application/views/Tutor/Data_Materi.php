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
                            <div class="breadcome-heading">
                                <form action ="<?= base_url('Tutor/Cari_Materi');?>" method="post">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Cari Materi . . . " name="keyword" autocomplete="off">
                                        <div class="input-group-append">
                                        <input class="btn btn-primary" type="submit" name="submit" placeholder="dddd"></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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

<div class="sparkline13-hd">
    <div class="main-sparkline13-hd">
        <center><h1>Data <span class="table-project-n">Materi Tutor<br></span></h1></center><br>
    </div>
    </div>
        <?php foreach($materi as $m):?>
            <div class="courses-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="courses-inner res-mg-b-30">
                                <div class="courses-title">
                                    <video src="<?= base_url('upload/materi/'.$m["video"])?>" controls style="width:220px; height:200px;"></video>
                                <h2><?=$m["nama_materi"];?></h2>
                            </div>
                            <div class="course-des">
                                <p><span><i class="fa fa-clock"></i></span> <b>Kategori Materi :</b> <?=$m["nama_kategori"];?></p>
                            </div>
                            <div class="product-buttons" style="float:right">
                                <a href="<?= base_url();?>Tutor/Detail_Materi/<?=$m['id_materi'];?>" class="pd-setting-ed"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="<?= base_url();?>Tutor/Hapus_Materi/<?=$m['id_materi'];?>" class="pd-setting-ed"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </div><br>
                        </div>
                    </div>
                    <?php endforeach;?> 