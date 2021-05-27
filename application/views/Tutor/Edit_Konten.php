<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="<?= base_url();?>/Tutor/index" style="color:#088ccf;">Home</a> <span class="bread-slash">/</span></li>
                                <li><a href="<?= base_url();?>/Tutor/data_materi" style="color:#088ccf;">Data Materi</a> <span class="bread-slash">/</span></li>
                                <li><a href="<?= base_url('Tutor/Detail_materi/'.$konten['id_materi'])?>" style="color:#088ccf;">Konten</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Edit Konten</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                <center><h4>Edit Konten</h4></center>
                <?php if (validation_errors()): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo validation_errors(); ?>
                </div>
            <?php endif; ?>
                <form action="<?= base_url('Tutor/Edit_Konten/'.$konten['id_konten'].'/'.$konten['id_materi'])?>" method="post" enctype="multipart/form-data" >
                <input type="hidden" class="form-control" id="id_materi" name="id_materi" value="<?=$konten["id_materi"];?>">
                <input type="hidden" name="id_konten" value="<?=$konten['id_konten'];?>">
                <div class="form-group">
                    <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" autocomplete="off" value="<?=$konten["judul"];?>">
                </div>
                <div class="form-group">
                    <label for="video">Link Video</label>
                        <input type="text" class="form-control" id="video" name="video" autocomplete="off" value="<?=$konten["video"];?>">
                </div>
                <div class="form-group">
                    <label for="file_pendukung">Unggah File Pendukung</label>
                        <input type="hidden" name="old_file" value="<?= $konten['file_pendukung'];?>" />
                        <input type="file" class="form-control" id="file_pendukung" name="file_pendukung">
                        <p style="color:#808080;">Format .pdf || <?=$konten['file_pendukung'];?></p>
                </div>
                <div class="form-group">
                    <label for="soal">Soal Latihan</label>
                    <textarea name="soal"><?=$konten['soal'];?></textarea>
                </div>
                <center><button type="submit" name="submit" class="btn btn-primary float-right">Edit</button></center>
            </form>
            </div>
        </div>
    </div>
</div>