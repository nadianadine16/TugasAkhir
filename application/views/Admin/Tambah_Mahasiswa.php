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
                                <li><span class="bread-blod">Tambah Mahasiswa</span></li>
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
                <form action="<?=base_url('Admin/tambah_data_mahasiswa')?>" method="post">
                <div class="form-group">
                    <label for="nim">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="form-group">
                    <label for="status">Jurusan</label>
                    <select class="form-control" id="jurusan" name="jurusan">
                        <?php foreach($jurusan as $a) : ?>
                            <option value="<?=($a)?>" selected><?=($a)?></option>
                        <?php endforeach;?>
                    </select>
                </div>  
                <div class="form-group">
                    <label for="status">Prodi</label>
                    <select class="form-control" id="prodi" name="prodi">
                        <?php foreach($prodi as $p) : ?>
                            <option value="<?=($p)?>" selected><?=($p)?></option>
                        <?php endforeach;?>
                    </select>
                </div>  
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas">
                </div>
                <div class="form-group">
                    <label for="tahun_masuk">Tahun Masuk</label>
                        <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk">
                </div>
                <div class="form-group">
                    <label for="github">Github</label>
                        <input type="text" class="form-control" id="github" name="github">
                </div>
                <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
            </form>
            </div>
        </div>
    </div>
</div>