<section id="hero" class="d-flex align-items-center">
      <div class="container">
        <div class="section-title">
          <h1>Contact</h1>
          <p>E-Learning dengan sistem tutor sebaya .....</p>
        </div>
        <div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6278.651006289314!2d112.61430743024357!3d-7.945365988160625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78827687d272e7%3A0x789ce9a636cd3aa2!2sPoliteknik%20Negeri%20Malang!5e0!3m2!1sid!2sid!4v1612611699040!5m2!1sid!2sid" width="100%" height="270px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <div class="row mt-5">
          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141</p>
              </div>
            </div>
          </div>
          <div class="col-lg-8 mt-5 mt-lg-0">
            <form action="<?=base_url('user/prosesContactus')?>" method="post" >
            <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_mahasiswa');?>">
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="kritik_saran" rows="5" data-rule="required" data-msg="Silahkan Tuliskan Kritik Saran Anda" placeholder="Kritik Saran"></textarea>
                <div class="validate"></div>
              </div>
              <div class="text-center" style="margin-bottom:20px;"><button type="submit" class="btn btn-primary">Kirim Pesan</button></div>
            </form>
          </div>
        </div>
      </div>
    </section>