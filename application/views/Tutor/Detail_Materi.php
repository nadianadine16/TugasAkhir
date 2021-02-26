<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="blog-details-inner">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="latest-blog-single blog-single-full-view">
                                    <?php foreach($materi as $m):?>
                                        <div class="blog-image">
                                        <center><video src="<?= base_url('upload/materi/'.$m["video"])?>" controls style="width:1000px; height:500px;"></video></center>
                                            <!-- <div class="blog-date">
                                                <p><span class="blog-day">20</span> May</p>
                                            </div>
                                        </div> -->
                                        <div class="blog-details blog-sig-details">
                                            <div class="details-blog-dt blog-sig-details-dt courses-info mobile-sm-d-n">
                                                <span><a href="#"><i class="fa fa-user"></i> <b>Judul Materi :</b> <?=$m["nama_materi"];?></a></span>
                                                <span><a href="#"><i class="fa fa-heart"></i> <b>Kategori Materi :</b> <?=$m["nama_kategori"];?></a></span>
                                                <span><a href="#"><i class="fa fa-comments-o"></i> <b>Nama Tutor :</b> <?= $this->session->userdata('nama');?></a></span>
                                            </div>
                                            <h1><a class="blog-ht" href="#">Deskripsi</a></h1>
                                            <p><?=$m["deskripsi"];?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?> 