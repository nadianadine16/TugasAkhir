<section id="hero" class="team section" style="background-color:white;">
      <div class="container">
        <!-- <div class="section-title"> -->
          <center><h3><b>Edit Profil</b></h3></center>
        

        <div class="row mt-5" style="margin-top:-100px;">
          <div class="col-lg-8 mt-5 mt-lg-0" style="margin-left:60px">
            <form action="<?=base_url('user/prosesEditProfile')?>" method="post" >
            <input type="hidden" name="id_mahasiswa" value="<?= $this->session->userdata('id_mahasiswa');?>">
              <div class="form-group">
                <label><b>NIM</b></label>
                <input type="text" class="form-control" readonly="true" name="nim" id="subject" value="<?= $this->session->userdata('nim');?>" style="width:1000px;"/>
              </div>
              <div class="form-group">
                <label><b>Nama</b></label>
                <input type="text" class="form-control" readonly="true" name="nama" id="subject" value="<?= $this->session->userdata('nama');?>" style="width:1000px;"/>                
              </div>
              <div class="form-group">
                <label><b>Jenis Kelamin</b></label>
                <input type="text" class="form-control" readonly="true" name="jenis_kelamin" id="jenis_kelamin" value="<?= $this->session->userdata('jenis_kelamin');?>" style="width:1000px;"/>                
              </div>
              <div class="form-group">
                <label><b>Jurusan</b></label>
                <input type="text" class="form-control" readonly="true" name="jurusan" id="subject" value="<?= $this->session->userdata('jurusan');?>" style="width:1000px;"/>
              </div>
              <div class="form-group">
                <label><b>Prodi</b></label>
                <input type="text" class="form-control" readonly="true" name="prodi" id="subject" value="<?= $this->session->userdata('prodi');?>" style="width:1000px;"/>                
              </div>
              <div class="form-group">
                <label><b>Kelas</b></label>
                <input type="text" class="form-control" readonly="true" name="kelas" id="subject" value="<?= $this->session->userdata('kelas');?>" style="width:1000px;"/>                
              </div>
              <div class="form-group">
                <label><b>Tahun Masuk</b></label>
                <input type="text" class="form-control" readonly="true" name="tahun_masuk" id="subject" value="<?= $this->session->userdata('tahun_masuk');?>" style="width:1000px;"/>                
              </div>
              <div class="form-group">
                <label><b>Alamat Github</b></label>
                <input type="text" class="form-control" name="github" id="github" value="<?= $this->session->userdata('github');?>" style="width:1000px;" required/>                
              </div>
              <div class="text-center">
                <center><button type="submit" class="btn" style="margin-left:35%;background-color:#49b5e7;color:#ffffff;">Edit</button></center>
              </div><br><br>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->