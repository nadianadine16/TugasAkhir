<head>
<title><?=$title?></title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
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
                        <!-- <div class="form-group">
                            <label for="nim">NIM</label>
                                <input type="text" class="id_mahasiswa" id="nim" name="id_mahasiswa">
                        </div>   -->
                        <div class="form-group">
                            <label for="nim">NIM</label><br>
                            <select class="myselect" style="width:500px;" id="id_mahasiswa" name="id_mahasiswa">
                            <!-- <select class="form-control" id="id_mahasiswa" name="id_mahasiswa"> -->
                                <?php foreach($mahasiswa as $m) : ?>
                                    <option value="<?=$m["id_mahasiswa"];?>"><?=$m["nim"];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Kategori Materi yang Dipilih</label>
                            <select class="form-control" id="id_kategori_materi" name="id_kategori_materi">
                                <?php foreach($KategoriMateri as $k) : ?>
                                    <option value="<?=$k["id_kategori_materi"];?>"><?=$k["nama_kategori"];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="video">Unggah Surat Pernyataan</label>
                                <input type="file" class="form-control" id="file" name="file">
                                <p style="color:#808080;">Format .pdf</p>
                        </div>
                        <input type="hidden" name="status" value="1">
                        <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
        </div>
    </div>
</div>
<script type="text/javascript">
      $(".myselect").select2();
</script>