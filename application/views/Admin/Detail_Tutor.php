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
                    <?php foreach($detail_tutor as $t):?>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="profile-info-inner">
                                                <div class="profile-img">
                                                    <?php if($t["foto"] == NULL){?>
                                                        <img src="<?= base_url('upload/user.png')?>" alt="" style="margin-left:-20px;width:200px;height:200px;"/>
                                                    <?php } else {?>
                                                        <img src="<?= base_url('upload/'.$t['foto'])?>" alt="" style="margin-left:-20px;width:200px;height:200px;"/>
                                                    <?php }?>
                                                    <span><p style="margin-left:20%; margin-top:-19%;"><b>Nama</b> : <?=$t["nama"];?></p></span>
                                                    <span><p style="margin-left:20%; margin-top:1%;"><b>NIM</b> : <?=$t["nim"];?></p></span>
                                                    <span><p style="margin-left:20%; margin-top:1%;"><b>Jenis Kelamin</b> : <?=$t["jenis_kelamin"];?></p></span>
                                                    <span><p style="margin-left:20%; margin-top:1%;"><b>Kategori Materi</b> : <?=$t["nama_kategori"];?></p></span>
                                                    <span><p style="margin-left:20%; margin-top:1%;"><b>Jurusan</b> : <?=$t["jurusan"];?></p></span>
                                                    <span><p style="margin-left:20%; margin-top:1%;"><b>Program Studi</b> : <?=$t["prodi"];?></p></span>
                                                    <span><p style="margin-left:20%; margin-top:1%;"><b>Kelas</b> : <?=$t["kelas"];?></p></span>
                                                    <span><p style="margin-left:20%; margin-top:1%;"><b>Tahun Masuk</b> : <?=$t["tahun_masuk"];?></p></span>
                                                    <span><p style="margin-left:20%; margin-top:1%;"><b>Alamat Github</b> : <?=$t["github"];?></p></span>
                                                    <?php endforeach;?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        </div>
    </div>
</div>