<head>
<title><?=$title?></title>
</head>
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
    <h3 style="margin-top:50px;">Daftar Tutor E-Learning</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                <h5> Silahkan download file surat pernyataan berikut terlebih dahulu :</h5>
                <a href="<?= base_url('assets_tutor/pdf/Surat_Pernyataan.pdf')?>">Download File</a><br><br>
                <form action="<?=base_url('Tutor/Tambah_Tutor')?>" method="post">
                <div class="form-group">
                    <label for="nim">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim">
                </div>  
                <div class="form-group">
                    <label for="status">Kategori Materi yang Dipilih</label>
                    <select class="form-control" id="id_kategori_materi" name="id_kategori_materi">
                        <?php foreach($KategoriMateri as $k) : ?>
                            <option value="<?=$k["id_kategori_materi"];?>"><?=$k["nama_kategori"];?></option>
                        <?php endforeach;?>
                    </select>
                </div>  
                <!-- <div id="formz">
                    <label for="file_buku">Upload Surat Pernyataan</label>
                    <input type="file" class="form-control" id="file" name="file">
                    <p>Format .pdf</p>
                </div> -->
                <input type="hidden" name="status" value="1">
                <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
            </form>
            </div>
        </div>
    </div>
</div>