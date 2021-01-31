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
                                <li><span class="bread-blod">Detail</span></li>
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
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="margin-left:23px;width:1000px">
                        <div class="profile-info-inner">
                            <div class="profile-details-hr">
                            <?php foreach ($mahasiswa as $m) :?>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Nim</b><br /> <?=($m['nim']); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Nama</b><br /> <?=($m['nama']); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Jurusan</b><br /> <?=($m['jurusan']); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Prodi</b><br /> <?=($m['prodi']); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="address-hr">
                                            <p><b>Github</b><br /><?=($m['github']); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="address-hr">
                                        <p><b>Kelas</b><br /><?=($m['kelas']); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="address-hr">
                                          
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="address-hr">
                                        <p><b>Tahun Masuk</b><br /><?=($m['tahun_masuk']); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>