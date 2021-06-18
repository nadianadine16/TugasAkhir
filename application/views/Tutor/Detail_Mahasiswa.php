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
                                <li><a href="<?= base_url();?>/Admin/index" style="color:#088ccf;">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Detail Mahasiswa</span></li>
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
            <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <center><h1>Detail <span class="table-project-n">Mahasiswa</span></h1></center>
                        </div>
                    </div>
            <?php foreach ($mahasiswa as $m) :?>
                <div class="product-payment-inner-st">
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <p><?=($m['nim']); ?></p>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <p><?=($m['nama']); ?></p>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <p><?=($m['jenis_kelamin']); ?></p>
                </div>
                <div class="form-group">
                    <label for="status">Jurusan</label>
                    <p><?=($m['jurusan']); ?></p>
                </div> 
                <div class="form-group">
                    <label for="status">Prodi</label>
                    <p><?=($m['prodi']); ?></p>
                </div>  
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <p><?=($m['kelas']); ?></p>
                </div>
                <div class="form-group">
                    <label for="tahun_masuk">Tahun Masuk</label>
                    <p><?=($m['tahun_masuk']); ?></p>
                </div>
                <div class="form-group">
                    <label for="github">Alamat Github</label>
                    <?php if($m['github'] != NULL) {?>
                        <p><?=($m['github']); ?></p>
                    <?php }
                    else {?>
                        <p>-</p>
                    <?php }?>                    
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>