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
                                <li><span class="bread-blod">Revisi</span></li>
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
                
                <!-- <div class="alert-wrap2 shadow-inner wrap-alert-b"> -->
                    <br><div class="alert alert-info" style="width:100%;">
                        <strong>Petunjuk Pemberian Revisi.</strong><br>
                        1. Buka file program yang akan diperiksa<br>
                        2. Klik nomor baris di sebelah kiri kode<br>
                        3. Pilih "Copy permalink" sampai link menjadi seperti <strong>https://github.com/nadianadine16/TugasAkhir.....application/views/Tutor/Data_Materi.php#L3</strong><br>
                        4. Masukkan dalam kolom revisi dibawah ini<br>
                        <strong>Catatan</strong> :<br>
                        Untuk menautkan beberapa kode yang disorot, maka lakukan klik baris kode pertama lalu tekan Ctrl + Shift dan klik sampai baris kode yang terakhir.
                    </div>
                <!-- </div> -->

                <form action="<?=base_url('Tutor/Revisi/'.$tugas['id_tugas'])?>" method="post">
                <input type="hidden" name="id_tugas" value="<?=$tugas['id_tugas'];?>">
                <input type="hidden" name="status" value="3">
                <div class="form-group">
                    <label for="revisi">Masukkan Revisi Disini</label>
                    <textarea name="revisi"></textarea>
                </div>
                <center><button type="submit" name="submit" class="btn btn-primary float-right">Kirim</button></center>
            </form>
            </div>
        </div>
    </div>
</div>