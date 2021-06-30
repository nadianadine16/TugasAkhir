<section id="hero" class="team section" style="background-color:white;">
      <div class="container">
        <!-- <div class="section-title"> -->
          <center><h3><b>Edit Profil</b></h3></center>
        

        <div class="row mt-5" style="margin-top:-100px;">
          <div class="col-lg-8 mt-5 mt-lg-0" style="margin-left:60px">
          <?php foreach($profil_mhs as $pm):?>
            <form action="<?=base_url('User/ProsesEditProfile')?>" method="post" onsubmit="return validasi_input(this)">
            <input type="hidden" name="id_mahasiswa" value="<?= $this->session->userdata('id_mahasiswa');?>">
              <div class="form-group">
                <label><b>NIM</b></label>
                <input type="text" class="form-control" readonly="true" name="nim" id="subject" value="<?=$pm['nim']?>" style="width:1000px;"/>
              </div>
              <div class="form-group">
                <label><b>Nama</b></label>
                <input type="text" class="form-control" readonly="true" name="nama" id="subject" value="<?=$pm['nama']?>" style="width:1000px;"/>                
              </div>
              <div class="form-group">
                <label><b>Jenis Kelamin</b></label>
                <input type="text" class="form-control" readonly="true" name="jenis_kelamin" id="jenis_kelamin" value="<?=$pm['jenis_kelamin']?>" style="width:1000px;"/>                
              </div>
              <div class="form-group">
                <label><b>Jurusan</b></label>
                <input type="text" class="form-control" readonly="true" name="jurusan" id="subject" value="<?=$pm['jurusan']?>" style="width:1000px;"/>
              </div>
              <div class="form-group">
                <label><b>Prodi</b></label>
                <input type="text" class="form-control" readonly="true" name="prodi" id="subject" value="<?=$pm['prodi']?>" style="width:1000px;"/>                
              </div>
              <div class="form-group">
                <label><b>Tahun Masuk</b></label>
                <input type="text" class="form-control" readonly="true" name="tahun_masuk" id="subject" value="<?=$pm['tahun_masuk']?>" style="width:1000px;"/>                
              </div>
              <div class="form-group">
                <label><b>Password</b></label>
                <input type="text" class="form-control" name="password" id="password" value="<?=$pm['password']?>" style="width:1000px;" required autocomplete="off"/>                
              </div>
              <div class="form-group">
                <label><b>Alamat Github</b></label>
                <input type="url" class="form-control" name="github" id="github" value="<?=$pm['github']?>" style="width:1000px;" required autocomplete="off"/>                
              </div>
              <div class="text-center">
                <center><button type="submit" class="btn" style="margin-left:35%;background-color:#49b5e7;color:#ffffff;">Edit</button></center>
              </div><br><br>
            </form>
          <?php endforeach;?>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
<script type="text/javascript">
function validasi_input(form){
  var mincar = 8;
  var maxchar = 16;
  if (form.password.value.length < mincar){
    alert("Password minimal 8 karakter!");
    form.password.focus();
    return (false);
  }  
  else if (form.password.value.length > maxchar){
    alert("Password maksimal 16 karakter!");
    form.password.focus();
    return (false);
  }  
   return (true);
}
</script>