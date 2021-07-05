<style>
.info {
  background-color: #e7f3fe;
  border-left: 6px solid #2196F3;
  padding-left: 10px;
  padding-top: 20px;
  padding-bottom: 20px;
}
</style>

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
                                <li><a href="<?= base_url();?>/Tutor/Data_Materi" style="color:#088ccf;">Data Materi</a> <span class="bread-slash">/</span></li>
                                <li><a href="<?= base_url('Tutor/Detail_Materi/'.$konten['id_materi'])?>" style="color:#088ccf;">Konten</a> <span class="bread-slash">/</span></li>
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
                <div class="info">
                    <p><strong>Petunjuk Pengisian Link Video.</strong></p>
                    1. Unggah video konten Anda ke platform Youtube<br>
                    2. Klik Bagikan<br>
                    3. Salin link video dan tempel pada kolom dibawah ini<br>
                </div><br>
                <div class="form-group">
                    <label for="video">Link Video Youtube Konten</label>
                        <input type="text" class="form-control" id="video" name="video" autocomplete="off" value="<?=$konten["video"];?>" placeholder="Contoh: https://youtu.be/dJjWjg4rwh0">
                </div>
                <div class="info">
                    <p><strong>Tentang unggah file pendukung.</strong></p>
                    1. File pendukung dapat berupa jobsheet<br>
                    2. File pendukung  dapat berupa materi berupa text sebagai materi pendukung pada video
                </div><br>
                <div class="form-group">
                    <label for="file_pendukung">Unggah File Pendukung (Opsional)</label>
                        <input type="hidden" name="old_file" value="<?= $konten['file_pendukung'];?>" />
                        <input type="file" class="form-control" id="file_pendukung" name="file_pendukung">
                        <p style="color:#808080;">Format .pdf || 
                            <?php if($konten['file_pendukung'] != NULL) {?>
                            <?=$konten['file_pendukung'];?>
                            <?php } else {?>
                            <?php echo 'File pendukung belum ditambahkan'; ?>
                            <?php }?>
                        </p>
                </div>
                <div class="form-group">
                    <label for="soal">Soal Latihan (Required)</label>
                    <!-- <textarea name="soal"><?=$konten['soal'];?></textarea> -->
                    <textarea name="soal" id="summernoteSoal"><?=$konten['soal'];?></textarea>
                </div>
                <center><button type="submit" name="submit" class="btn btn-primary float-right">Edit</button></center>
            </form>
            </div>
        </div>
    </div>
</div>