<section id="hero" class="d-flex align-items-center">
<!-- <section id="contact" class="contact"> -->
      <div class="container">

        <div class="section-title">
          <h1>My Profile</h1>
          <p></p>
        </div>

        <div class="row mt-5">
          <div class="col-lg-8 mt-5 mt-lg-0" style="margin-left:60px">

            <form action="<?=base_url('user/prosesEditProfile')?>" method="post" >
            <input type="hidden" name="id_mahasiswa" value="<?= $this->session->userdata('id_mahasiswa');?>">
              <div class="form-group">
                <label>Nim</label>
                <input type="text" class="form-control" readonly="true" name="nim" id="subject" value="<?= $this->session->userdata('nim');?>" style="width:1000px;"/>
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" readonly="true" name="nama" id="subject" value="<?= $this->session->userdata('nama');?>" style="width:1000px;"/>                
              </div>
              <div class="form-group">
                <label>Jurusan</label>
                <input type="text" class="form-control" readonly="true" name="jurusan" id="subject" value="<?= $this->session->userdata('jurusan');?>" style="width:1000px;"/>
              </div>
              <div class="form-group">
                <label>Prodi</label>
                <input type="text" class="form-control" readonly="true" name="prodi" id="subject" value="<?= $this->session->userdata('prodi');?>" style="width:1000px;"/>                
              </div>
              <div class="form-group">
                <label>Kelas</label>
                <input type="text" class="form-control" readonly="true" name="kelas" id="subject" value="<?= $this->session->userdata('kelas');?>" style="width:1000px;"/>                
              </div>
              <div class="form-group">
                <label>Tahun Masuk</label>
                <input type="text" class="form-control" readonly="true" name="tahun_masuk" id="subject" value="<?= $this->session->userdata('tahun_masuk');?>" style="width:1000px;"/>                
              </div>
              <div class="form-group">
                <label>Github</label>
                <input type="text" class="form-control" name="github" id="subject" value="<?= $this->session->userdata('github');?>" style="width:1000px;"/>                
              </div>
              <div class="text-center"><button type="submit" class="btn btn-primary" style="margin-left:882px;">Edit</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->