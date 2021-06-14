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
                                <li><a href="<?= base_url();?>/Tutor/Tugas_Mahasiswa" style="color:#088ccf;">Data Tugas Mahasiswa</a> <span class="bread-slash"></span></li>                                
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
                            <center><h1>Detail <span class="table-project-n">Revisi</span></h1></center>
                        </div>
                    </div>
            <?php foreach ($detail_revisi as $dr) :?>
                <div class="product-payment-inner-st">
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <p><?=$dr["nim"]; ?></p>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <p><?=$dr["nama"]; ?></p>
                </div>
                <div class="form-group">
                    <label for="konten">konten</label>
                    <p><?=$dr["judul"]; ?></p>
                </div> 
                <div class="form-group">
                    <label for="revisi">Revisi Tugas</label>
                    <p><?=$dr["revisi"]; ?></p>
                </div>                
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>