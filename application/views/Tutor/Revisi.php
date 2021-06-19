<style>
.info {
  background-color: #e7f3fe;
  border-left: 6px solid #2196F3;
  padding-left: 10px;
  padding-top: 20px;
  padding-bottom: 20px;
}
</style>

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
                                <li><a href="<?= base_url();?>/Tutor/Tugas_Mahasiswa" style="color:#088ccf;">Tugas Mahasiswa</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Tambah Revisi</span></li>
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
                <center><h4>Masukkan Revisi Tugas</h4></center>
                <?php if (validation_errors()): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo validation_errors(); ?>
                </div>
                <?php endif; ?>
                <div class="info">
                    <p><strong>Petunjuk Pemberian Revisi.</strong></p><br>
                    1. Buka file program yang akan diperiksa<br>
                    2. Klik nomor baris di sebelah kiri kode<br>
                    3. Pilih "Copy permalink" sampai link menjadi seperti <strong>https://github.com/nadianadine16/TugasAkhir.....application/views/Tutor/Data_Materi.php#L3</strong><br>
                    4. Masukkan dalam kolom revisi dibawah ini<br><br>
                    <strong>Catatan</strong> :<br>
                    Untuk menautkan beberapa kode yang disorot, maka lakukan klik baris kode pertama lalu tekan Ctrl + Shift dan klik sampai baris kode yang terakhir.
                </div><br>
                <form action="<?=base_url('Tutor/Revisi/'.$tugas['id_tugas'])?>" method="post">                
                <input type="hidden" name="id_tugas" value="<?=$tugas['id_tugas'];?>">
                <input type="hidden" name="status" value="3">
                <div class="form-group">
                    <label>Revisi : </label>
                    <textarea name="revisi" id="summernote"></textarea>
                </div>
                <center><button type="submit" class="btn btn-primary float-right">Kirim</button></center> 
            </form>
            </div>
        </div>
    </div>
</div>