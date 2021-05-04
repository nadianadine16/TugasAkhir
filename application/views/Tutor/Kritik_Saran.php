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
                                <li><span class="bread-blod">Kritik & Saran</span></li>
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
                <center><h4>Kritik dan Saran</h4></center>
                <?php if (validation_errors()): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo validation_errors(); ?>
                </div>
            <?php endif; ?>
                <form action="<?= base_url('Tutor/Kritik_Saran')?>" method="post">
                <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $this->session->userdata('id_tutor');?>">
                <div class="form-group">
                    <label for="subject">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="kritik_saran">Kritik dan Saran</label>
                    <textarea name="kritik_saran"></textarea>
                </div>
                <center><button type="submit" name="submit" class="btn btn-primary float-right">Kirim</button></center>
            </form>
            </div>
        </div>
    </div>
</div>