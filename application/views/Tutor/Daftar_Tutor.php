<head>
    <title><?=$title?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url()?>/assets_admin/img/favicon.png">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</head>
<div class="single-pro-review-area mt-t-30 mg-b-15" style="background-color:#f4fbfe;">
    <div class="container-fluid" style="height:100%;">
    <center><h3 style="margin-top:50px;">Daftar Tutor Stucode - JTI</h3></center><br>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <h5> Silahkan download file surat pernyataan berikut terlebih dahulu :</h5>
                    <a href="<?= base_url('assets_admin/File/SURAT PERNYATAAN KESANGGUPAN.pdf')?>"><button type="button" class="btn btn-primary"><i class="fa fa-download edu-avatar" aria-hidden="true"></i>  Download </button></a><br><br>
                    <?php if (validation_errors()): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?=base_url('Tutor/Tambah_Tutor')?>" method="post" enctype="multipart/form-data">                        
                        <div class="form-group">
                            <label for="nama">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="status">Kategori Materi yang Dipilih</label>
                            <select class="form-control" id="id_kategori_materi" name="id_kategori_materi" required>
                                <?php foreach($KategoriMateri as $k) : ?>
                                    <option value="<?=$k["id_kategori_materi"];?>"><?=$k["nama_kategori"];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="surat_pernyataan">Unggah Surat Pernyataan</label>
                            <input type="file" class="form-control" id="surat_pernyataan" name="surat_pernyataan">
                            <p style="color:#808080;">Format nama : NIM_Nama_Surat Pernyataan.pdf</p>
                        </div>
                        <input type="hidden" name="status" value="1">
                        <center><button type="submit" name="submit" class="btn btn-primary float-right">Daftar</button></center>
                    </form>
                </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(".myselect").select2();
</script>