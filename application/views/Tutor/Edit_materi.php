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
                                <li><span class="bread-blod">Edit Kategori Materi</span></li>
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
                <center><h4>Edit Materi</h4></center>
                <?php if (validation_errors()): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo validation_errors(); ?>
                </div>
            <?php endif; ?>
                <form action="<?=base_url('Tutor/Edit_Materi/'.$materi['id_materi'])?>" method="post" enctype="multipart/form-data" >
                <input type="hidden" name="id_materi" value="<?=$materi['id_materi'];?>">
                <input type="hidden" class="form-control" id="id_tutor" name="id_tutor" value="<?= $this->session->userdata('id_tutor');?>">
                <input type="hidden" class="form-control" id="id_kategori_materi" name="id_kategori_materi" value="<?= $this->session->userdata('id_kategori_materi');?>">
                <div class="form-group">
                    <label for="nama_materi">Judul Materi</label>
                        <input type="text" class="form-control" id="nama_materi" name="nama_materi" value="<?=$materi['nama_materi'];?>">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi"><?=$materi['deskripsi'];?></textarea>
                </div>
                <div class="form-group">
                    <label for="requirement">Hal yang Di Butuhkan</label>
                    <textarea name="requirement"><?=$materi['requirement'];?></textarea>
                </div>
                <div class="form-group">
                    <label for="cover">Unggah Gambar</label>
                        <input type="hidden" name="old_image" value="<?= $materi['cover'];?>" />
                        <input type="file" class="form-control" id="cover" name="cover" >
                        <p style="color:#808080;">Format .jpg .png || Cover: <?=$materi['cover'];?></p>
                </div>
                <center><button type="submit" name="submit" class="btn btn-primary float-right">Edit</button></center>
            </form>
            </div>
        </div>
    </div>
</div>