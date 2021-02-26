<script type="text/javascript" language="JavaScript">
 function konfirmasi()
 {
 tanya = confirm("Anda Yakin Akan Menghapus Data ?");
 if (tanya == true) return true;
 else return false;
 }</script>
<!-- Mobile Menu end -->
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="breadcome-heading">
                            <form role="search" class="sr-input-func">
                                <input type="text" placeholder="Cari Materi ..." class="search-int form-control">
                                <a href="<?= base_url('Tutor/Cari_Materi');?>"><i class="fa fa-search"></i></a>
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
                            <div class="product-buttons">
                            <a href="<?= base_url();?>Tutor/Detail_Materi/<?=$m['id_materi'];?>" class="pd-setting-ed"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?> 