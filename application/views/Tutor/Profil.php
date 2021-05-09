<!-- Mobile Menu end -->
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
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Profil</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="width:100%;">
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Profil Anda</a></li>
                                <li><a href="#reviews"> Edit Profil</a></li>
                                <!-- <li><a href="#INFORMATION">Update Details</a></li> -->
                            </ul>
                            <?php foreach($tutor as $t):?>
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
                            
                                <div class="product-tab-list tab-pane fade" id="reviews">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <?php if (validation_errors()): ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <?php echo validation_errors(); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <form action="<?=base_url('Tutor/Edit_Profil')?>" method="post" enctype="multipart/form-data">
                                                    <?php foreach($tutor as $t2):?>
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
                                                            <p style="color:#808080;">Format .jpg .png Maks 500Kb</p>
                                                        </div>
                                                        <center><button type="submit" name="submit" class="btn btn-primary float-right">Edit</button></center>
                                                    <?php endforeach;?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input name="number" type="text" class="form-control" placeholder="First Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Last Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Address">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Date of Birth">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Department">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control" placeholder="Pincode">
                                                        </div>
                                                        <div class="file-upload-inner ts-forms">
                                                            <div class="input prepend-big-btn">
                                                                <label class="icon-right" for="prepend-big-btn">
																		<i class="fa fa-download"></i>
																	</label>
                                                                <div class="file-button">
                                                                    Browse
                                                                    <input type="file" onchange="document.getElementById('prepend-big-btn').value = this.value;">
                                                                </div>
                                                                <input type="text" id="prepend-big-btn" placeholder="no file selected">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group sm-res-mg-15 tbpf-res-mg-15">
                                                            <input type="text" class="form-control" placeholder="Description">
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control">
																<option>Select Gender</option>
																<option>Male</option>
																<option>Female</option>
															</select>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control">
																	<option>Select country</option>
																	<option>India</option>
																	<option>Pakistan</option>
																	<option>Amerika</option>
																	<option>China</option>
																	<option>Dubai</option>
																	<option>Nepal</option>
																</select>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control">
																	<option>Select state</option>
																	<option>Gujarat</option>
																	<option>Maharastra</option>
																	<option>Rajastan</option>
																	<option>Maharastra</option>
																	<option>Rajastan</option>
																	<option>Gujarat</option>
																</select>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control">
																	<option>Select city</option>
																	<option>Surat</option>
																	<option>Baroda</option>
																	<option>Navsari</option>
																	<option>Baroda</option>
																	<option>Surat</option>
																</select>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Website URL">
                                                        </div>
                                                        <input type="number" class="form-control" placeholder="Mobile no.">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress mg-t-15">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light mg-b-15">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>