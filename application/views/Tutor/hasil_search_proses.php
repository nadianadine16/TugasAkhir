<head>
	<meta charset="UTF-8">
	<title>Hasil Cek Status</title>
	<link href="<?= base_url()?>/assets_search/css/berhasil.css" rel="stylesheet" />
</head>
<body>
	<img src="<?= base_url()?>/assets_search/images/proses.gif" class="proses">
	<h2 class=congratulation> Harap Tunggu</h2>
	<?php foreach($cekPendaftaranProses as $p) { ?>
	<p>Mohon maaf <?php echo $p->nama ?> proses pendaftaran anda masih di proses, Harap Tunggu. </p>
	<br>
	<?php } ?>
	<a href="<?= base_url()?>/login/index" type="submit">Continue</a>
</body>
</html>