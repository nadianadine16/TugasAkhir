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
                                <li><span class="bread-blod">Tambah Materi</span></li>
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
                <center><h4>Tambah Materi</h4></center>
                <?php if (validation_errors()): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo validation_errors(); ?>
                </div>
            <?php endif; ?>
                <form action="<?= base_url('Tutor/Tambah_Materi')?>" method="post" enctype="multipart/form-data" >
                <input type="hidden" class="form-control" id="id_tutor" name="id_tutor" value="<?= $this->session->userdata('id_tutor');?>">
                <input type="hidden" class="form-control" id="id_kategori_materi" name="id_kategori_materi" value="<?= $this->session->userdata('id_kategori_materi');?>">
                <div class="form-group">
                    <label for="nama_materi">Judul Materi</label>
                        <input type="text" class="form-control" id="nama_materi" name="nama_materi" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Singkat</label>
                    <textarea name="deskripsi"></textarea>
                </div>
                <div class="form-group">
                    <label for="requirement">Hal yang Dibutuhkan</label>
                    <textarea name="requirement"></textarea>
                </div>
                <div class="form-group">
                    <label for="cover">Unggah Gambar</label>
                        <input type="file" class="form-control" id="cover" name="cover">
                        <p style="color:#808080;">Format .jpg .png</p>
                </div>
                <center><button type="submit" name="submit" class="btn btn-primary float-right">Tambah</button></center>
            </form>
            </div>
        </div>
    </div>
</div>