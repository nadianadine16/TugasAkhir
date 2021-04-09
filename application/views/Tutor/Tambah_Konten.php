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
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Tambah Konten</span></li>
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
                <center><h4>Tambah Konten</h4></center>
                <?php if (validation_errors()): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?php foreach($materi as $m):?>
                <form action="<?= base_url('Tutor/Tambah_Konten/'.$m['id_materi'])?>" method="post" enctype="multipart/form-data" >
                <input type="hidden" class="form-control" id="id_materi" name="id_materi">
                <div class="form-group">
                    <label for="nama_materi">Nama Materi</label>
                        <input type="text" class="form-control" id="nama_materi" name="nama_materi" disabled value="<?=$m["nama_materi"];?>">
                        <input type="hidden" class="form-control" id="id_materi" name="id_materi" value="<?=$m["id_materi"];?>">
                </div>
            <?php endforeach;?>
                <div class="form-group">
                    <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" autocomplete="off">
                </div>
                <!-- <div class="form-group">
                    <label for="video">Unggah Video</label>
                        <input type="file" class="form-control" id="video" name="video">
                        <p style="color:#808080;">Format .mp4</p>
                </div> -->
                <div class="form-group">
                    <label for="video">Link Video</label>
                        <input type="text" class="form-control" id="video" name="video" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="file_pendukung">Unggah File Pendukung</label>
                        <input type="file" class="form-control" id="file_pendukung" name="file_pendukung">
                        <p style="color:#808080;">Format .pdf</p>
                </div>
                <div class="form-group">
                    <label for="soal">Soal Latihan</label>
                    <textarea name="soal"></textarea>
                </div>
                <center><button type="submit" name="submit" class="btn btn-primary float-right">Tambah</button></center>
            </form>
            </div>
        </div>
    </div>
</div>