<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
<style>
.Information {
    background: #933EC5;
    font-size: 14px;
    padding: 10px 20px;
    border-radius: 3px;    
}
</style>
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
                            <div>
                                <div class="comment-details">
                                <?php foreach($materi as $m):?>
                                <a href="<?=base_url('Tutor/Tambah_Konten/'.$m['id_materi'])?>" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    <span class="text">Tambah Konten</span>
                                </a>
                                <br><br><br>
                                <?php endforeach;?>

                                <?php if($konten == NULL) {?>
                                <center><p>Anda Belum Memiliki Konten. Segera Tambahkan Konten Anda :)</p></center>
                                    <?php }
                                    else {?>
                                    <?php $no=1; $x=1; $t=1; $y=1; $z=1; foreach($konten as $k):?>
                                <div id="accordion2" style="margin-top:-15px;">
                                    <div class="panel panel-default">
                                        <div class="panel-heading accordion-head" style="background-color:#ffffff;">
                                            <h4 class="panel-title" style="color:#4682B4;">
                                                <b><a data-toggle="collapse" data-parent="#accordion2" href="#isimateri<?php echo $x; ?>">
                                                <?=$no++;?>.&nbsp;<?=$k["judul"];?></a></b>
                                                <a data-toggle="collapse" data-parent="#accordion2" href="#isimateri<?php echo $x; ?>">
                                                <i class="fa fa-chevron-down" style="float:right;"></i></a>
                                            <?php $x++;?>
                                            </h4>
                                        </div>
                                        
                                        <div id="isimateri<?php echo $t; $t++;?>" class="panel-collapse panel-ic collapse">
                                            <div class="panel-body admin-panel-content animated flash">
                                            <?php if($k["video"] != NULL){?>
                                                <?php
                                                $url = $k["video"];
                                                $match_count= preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
                                                if($match_count>0){
                                                    $id = $match[1];
                                                    $width = '400px';
                                                    $height = '300px'; ?>
                                                    <p><b>Video</b><br>                                                    
                                                    </p>
                                                    <center><iframe id="ytplayer" type="text/html" width="<?php echo $width ?>" height="<?php echo $height ?>" src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allowfullscreen></iframe></center>
                                                    <?php
                                                        } 
                                                    else { ?>
                                                        <b>Video : </b><br>Video tidak dapat ditampilkan karena link yang Anda masukkan tidak sesuai<br><br>
                                                    <?php
                                                        } 
                                                    ?>
                                                                                                    
                                                    <?php
                                                        } 
                                                        else { ?>
                                                    <p><b>Video</b><br>-</p>
                                                    <?php
                                                        } 
                                                    ?>
                                                    <?php if($k["file_pendukung"] != NULL){?>
                                                        <p><b>File Pendukung</b><br><a href="<?= base_url('upload/materi/'.$k["file_pendukung"])?>" style="color:#4682B4;"><?=$k["file_pendukung"];?></a></p>
                                                    <?php
                                                        } 
                                                    else { ?>
                                                        <p><b>File Pendukung</b><br>-</p>
                                                    <?php
                                                        } 
                                                    ?>
                                                    <?php foreach($materi as $m):?>
                                                    <p><b>Soal Latihan</b><br></p>
                                                    <div class="modal-bootstrap shadow-inner mg-tb-0 responsive-mg-b-0">                                                        
                                                        <div class="modal-area-button">                                                            
                                                            <a class="Information Information-color mg-b-10" href="#" data-toggle="modal" data-target="#InformationproModalalert<?php echo $y;?>" style="color:white;">Detail Soal</a>
                                                            <?php $y++;?>                                                            
                                                        </div>
                                                    </div>
                                                    <a onclick="return konfirmasi()" style="float:right; margin-right:20px;" href="<?= base_url('Tutor/Hapus_Konten/'.$k['id_konten'].'/'.$m['id_materi'])?>" class="pd-setting-ed" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    <a style="float:right; margin-right:5px;" href="<?= base_url('Tutor/Edit_Konten/'.$k['id_konten'].'/'.$m['id_materi'])?>" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    <?php endforeach;?>
                                            </div>
                                            <div id="InformationproModalalert<?php echo $z; $z++;?>" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">                                                        
                                                        <div class="modal-body"  style="height:400px;display:block; overflow:auto;">
                                                            <!-- <span class="educate-icon educate-info modal-check-pro"></span> -->
                                                            <h2>Soal konten <?=$k["judul"];?></h2>
                                                            <p style="float: left;margin-right: 20px;margin-bottom: 10px;border-radius: 0%;"><?=$k["soal"];?></p>
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach;?>
                                    <?php }?>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>