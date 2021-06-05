<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cek Status</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url()?>/assets_search/assets/css/login.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="<?= base_url()?>/assets_login/img/favicon.png">
</head>
<body>
	<?php foreach($tampil as $p):?>
    <?php if($p->status== "2"){?>
		<main class="d-flex align-items-center min-vh-100 py-3 py-md-0" style="background-color:#f4fbfe;">
			<div class="container">
			<div class="card login-card">
				<div class="row no-gutters">
				<div class="col-md-5">
					<img src="<?= base_url()?>/assets_search/images/jempol.gif" alt="login" class="login-card-img">
				</div>
				<div class="col-md-7">
					<div class="card-body">
					<div class="brand-wrapper">
						<h2><b>Stucode - JTI</b></h2>
					</div>
					<h2>Congratulation</h2>
					<p class="login-card-description">Terimakasih <b><?php echo $p->nama ?></b> Anda sekarang telah menjadi tutor!</p>              			  
					</div>
					<a name="login" href="<?= base_url()?>/login/index" id="login" class="btn btn-block login-btn mb-4" type="button" style="width:300px; float:right; margin-right:50px;background-color:#49b5e7;">Continue</a>
				</div>
				</div>
			</div>
			</div>
		</main>	
	<?php
	} 
	else if ($p->status == "1"){?>
	<main class="d-flex align-items-center min-vh-100 py-3 py-md-0" style="background-color:#f4fbfe;">
			<div class="container">
			<div class="card login-card">
				<div class="row no-gutters">
				<div class="col-md-5">
					<img src="<?= base_url()?>/assets_search/images/proses.gif" alt="login" class="login-card-img">
				</div>
				<div class="col-md-7">
					<div class="card-body">
					<div class="brand-wrapper">
						<h2><b>Stucode - JTI</b></h2>
					</div>
					<h2>Harap Tunggu</h2>
					<p class="login-card-description">Mohon maaf <b><?php echo $p->nama ?></b> proses pendaftaran anda masih di proses, harap tunggu.</p>              			  
					</div>
					<a name="login" href="<?= base_url()?>/login/index" id="login" class="btn btn-block login-btn mb-4" type="button" style="width:300px; float:right; margin-right:50px;background-color:#49b5e7;">Continue</a>
				</div>
				</div>
			</div>
			</div>
		</main>		
	<?php } ?>
	<?php endforeach;?>
</body>
</html>