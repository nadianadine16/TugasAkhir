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
                                <li><span class="bread-blod">Ganti Password</span></li>
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
                <form action="<?=base_url('Admin/profile')?>" method="post">
                <input type="hidden" name="id_admin" value="<?= $this->session->userdata('id_admin');?>">
                <div class="form-group">
                    <label for="nama_kategori">Password Lama</label>
                        <input type="text" class="form-control" id="password_lama" name="password_lama" >
                </div>
                <div class="form-group">
                    <label for="nama_kategori">Password Baru</label>
                        <input type="password" class="form-control" id="password_baru" name="password_baru">
                </div>
                <!-- <div class="form-group">
                    <label for="nama_kategori">Konfirmasi Password </label>
                        <input type="text" class="form-control" id="password_baru" name="konfirmasi_password">
                </div> -->
                <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
            </form>
            </div>
        </div>
    </div>
</div>