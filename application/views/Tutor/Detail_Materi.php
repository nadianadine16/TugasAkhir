<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
<script type="text/javascript" language="JavaScript">
    function konfirmasi()
    {
        tanya = confirm("Anda Yakin Akan Menghapus Data ?");
        if (tanya == true) return true;
            else return false;
    }
 </script>
<div class="blog-details-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="blog-details-inner">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="latest-blog-single blog-single-full-view">
                                <div class="blog-details blog-sig-details">
                                <?php foreach($materi as $m):?>
                                    <h1><a class="blog-ht" href="#"><?=$m['nama_materi'];?></a></h1>
                                    <p><?=$m["deskripsi"];?></p>
                                    <?php endforeach;?> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="comment-head">
                                <h3><b>Requirement</b></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="user-comment">
                                <div class="comment-details">
                                    <?php foreach($materi as $m):?>
                                    <p><?=$m["requirement"];?></span></p>
                                    <?php endforeach;?> 
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="comment-head">
                                <h3><b>Hal yang Dipelajari</b></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="user-comment">
                                <div class="comment-details">
                                    <?php foreach($materi as $m):?>
                                    <p><?=$m["isi"];?></span></p>
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                     
                    <div class="row">
                        <div class="coment-area">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="admin-pro-accordion-wrap shadow-inner">
                                    <div class="alert-title">
                                    <br><h2>Kontenmu</h2>
                                    <a href="<?=base_url('Tutor/Tambah_Konten/'.$m['id_materi'])?>" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fa fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah Konten</span>
                                    </a>
                                    <?php endforeach;?>
                                    </div><br>
                                    <?php $no=1; foreach($konten as $k):?>
                                        <div class="card" style="width:200%;">
                                            <div class="card-header"><?=$no++;?>.&nbsp;<?=$k["judul"];?></div>
                                            <div class="card-main">
                                                <div class="main-description">
                                                <?php if($k["video"] != NULL){?>
                                                <p><b>Video</b><br><a href="<?= base_url('upload/materi/'.$k["video"])?>"><?=$k["video"];?></a></p>
                                                <?php
                                                    } 
                                                    else { ?>
                                                <p><b>Video</b><br>-</p>
                                                <?php
                                                    } 
                                                ?>
                                                <?php if($k["file_pendukung"] != NULL){?>
                                                    <p><b>File Pendukung</b><br><a href="<?= base_url('upload/materi/'.$k["file_pendukung"])?>"><?=$k["file_pendukung"];?></a></p>
                                                <?php
                                                    } 
                                                else { ?>
                                                    <p><b>File Pendukung</b><br>-</p>
                                                <?php
                                                    } 
                                                ?>
                                                <p><b>Soal Latihan</b><br><?=$k["soal"];?></p>
                                                <a style="float:right; margin-right:20px;" href="<?= base_url();?>Tutor/Hapus_Konten/<?=$k['id_konten'];?>" class="pd-setting-ed" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                <a style="float:right; margin-right:5px;" href="<?= base_url();?>Tutor/Edit_Konten/<?=$k['id_konten'];?>" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;?>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>