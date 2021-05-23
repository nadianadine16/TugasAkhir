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
                                <li><span class="bread-blod">Edit Profil</span></li>
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
                <center><h4>Edit Profil</h4></center>
                <?php if (validation_errors()): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?php foreach($tutor as $t2):?>
            <form action="<?=base_url('Tutor/Edit_Profil/'.$t2['id_mahasiswa'])?>" method="post" enctype="multipart/form-data">
                                                    
                                                        <input type="hidden" id="id_mahasiswa" name="id_mahasiswa" value="<?= $this->session->userdata('id_mahasiswa');?>">
                                                        <div class="form-group">
                                                            <label for="nama">Nama</label>
                                                            <input type="text" class="form-control" id="nama" name="nama" readonly="true" value="<?=$t2['nama'];?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nim">NIM</label>
                                                            <input type="text" class="form-control" id="nim" name="nim" readonly="true" value="<?=$t2['nim'];?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" readonly="true" value="<?=$t2['jenis_kelamin'];?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kategori_materi">Kategori Materi</label>
                                                            <input type="text" class="form-control" id="id_kategori_materi" name="id_kategori_materi" readonly="true" value="<?=$t2['nama_kategori'];?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jurusan">Jurusan</label>
                                                            <input type="text" class="form-control" id="jurusan" name="jurusan" readonly="true" value="<?=$t2['jurusan'];?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="prodi">Program Studi</label>
                                                            <input type="text" class="form-control" id="prodi" name="prodi" readonly="true" value="<?=$t2['prodi'];?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kelas">Kelas</label>
                                                            <input type="text" class="form-control" id="kelas" name="kelas" readonly="true" value="<?=$t2['kelas'];?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tahun_masuk">Tahun Masuk</label>
                                                            <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" readonly="true" value="<?=$t2['tahun_masuk'];?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="github">Alamat Github</label>
                                                            <input type="text" class="form-control" id="github" name="github" value="<?=$t2['github'];?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="foto">Unggah Foto Profil</label>
                                                            <input type="file" class="form-control" id="foto" name="foto">
                                                            <p style="color:#808080;">Format .jpg .png Maks 500Kb || <?=$t2['foto'];?></p>
                                                        </div>
                                                        <center><button type="submit" name="submit" class="btn btn-primary float-right">Edit</button></center>
                                                    <?php endforeach;?>
                                                </form>
            </div>
        </div>
    </div>
</div>