<head>
	<meta charset="UTF-8">
	<title>Hasil Cek Status</title>
	<link href="<?= base_url()?>/assets_search/css/berhasil.css" rel="stylesheet" />
</head>
<body>
	<img src="<?= base_url()?>/assets_search/images/jempol.gif" >
	<h2 class=congratulation> Congratulation</h2>
	<?php foreach($cekPendaftaranBerhasil as $p) { ?>
	<p>Terimakasih <?php echo $p->nama ?> telah mendaftar sebagai tutor sebaya </p>
	<br>
	<?php } ?>
	<a href="<?= base_url()?>/login/index" type="submit" class="btn btn-success">Continue</a>
</body>
</html>