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
                <center><h4>Halaman Ganti Password</h4></center>
                <?php if (validation_errors()): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo validation_errors(); ?>
                </div>
                <?php endif; ?>
                <div class="product-payment-inner-st">
                <form action="<?=base_url('Admin/profile')?>" method="post" onsubmit="return validasi_input(this)">
                <input type="hidden" name="id_admin" value="<?= $this->session->userdata('id_admin');?>">
                <div class="form-group">
                    <label for="nama_kategori">Password Lama</label>
                        <input type="password" class="form-control" id="password_lama" name="password_lama" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="nama_kategori">Password Baru</label>
                        <input type="password" class="form-control" id="password_baru" name="password_baru" autocomplete="off">
                </div>
                <center><button type="submit" name="submit" class="btn btn-primary float-right">Simpan</button></center>
            </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function validasi_input(form){
  var mincar = 8;
  if (form.password_baru.value.length < mincar){
    alert("Password Minimal 8 karakter!");
    form.password_baru.focus();
    return (false);
  }  
   return (true);
}
</script>