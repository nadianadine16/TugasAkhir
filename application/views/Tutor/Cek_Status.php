<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cek Status</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url()?>/assets_search/assets/css/login.css">
</head>
<body style="background-color:#eddfd8">
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="<?= base_url()?>/assets_search/assets/images/gambar1.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">                
                <h2><b>E-Learning</b></h2>
              </div>
              <p class="login-card-description">Masukan NIM Anda untuk mengecek status pendaftaran.</p>
              <form action="<?= base_url('tutor/cari');?>" method="post">
                  <div class="form-group">
                    <label for="email" class="sr-only">NIM</label>
                    <input id="search" type="text" placeholder="Masukan NIM" name="keyword" autocomplete="off" class="form-control" style="width:155%;"/>                    
                  </div>                  
              <button name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" style="width:155%;">Cek Status</button>
              </form>                
            </div>
          </div>
        </div>
      </div>      
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
