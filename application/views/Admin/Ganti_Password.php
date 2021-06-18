<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            </div>
        </div>
    </div>
</div>
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid" style="margin-top:30px;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="product-payment-inner-st">
                <center><h4>Ubah Password</h4></center>
                <?php if (validation_errors()): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo validation_errors(); ?>
                </div>
                <?php endif; ?>
                <div class="product-payment-inner-st">
                <form action="<?=base_url('Admin/Profile')?>" method="post" onsubmit="return validasi_input(this)">
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
    alert("Password minimal 8 karakter!");
    form.password_baru.focus();
    return (false);
  }  
   return (true);
}
</script>