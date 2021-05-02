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
                                <li><span class="bread-blod">Detail Tutor</span></li>
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
                            <center><h1>Detail <span class="table-project-n">Tutor</span></h1></center>
                        </div>
                    </div>
            <?php foreach ($detail_tutor as $d) :?>
                <div class="product-payment-inner-st">                
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <p><?=($d['nim']); ?></p>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <p><?=($d['nama']); ?></p>
                </div>
                <div class="form-group">
                    <label for="nim">Kategori yang Diajar</label>
                    <p><?=($d['nama_kategori']); ?></p>
                </div>
                <div class="form-group">
                    <label for="status">Jurusan</label>
                    <p><?=($d['jurusan']); ?></p>
                </div> 
                <div class="form-group">
                    <label for="status">Prodi</label>
                    <p><?=($d['prodi']); ?></p>
                </div>  
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <p><?=($d['kelas']); ?></p>
                </div>                
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>