<section id="hero" class="d-flex align-items-center">
    <div class="container">
    <div class="section-title">
      <h2>Tanyakan Pada Forum</h2>
    </div> 
        <div class="col-lg-12 mt-5 mt-lg-0">
            <form action="<?=base_url('User/Tanya_Forum')?>" method="post" >
                <input type="hidden" name="id_mahasiswa" value="<?= $this->session->userdata('id_mahasiswa');?>">
                <div class="form-group">
                            <label for="status">Kategori Materi yang Dipilih</label>
                            <select class="form-control" id="id_kategori_materi" name="id_kategori_materi">
                                <?php foreach($KategoriMateri as $k) : ?>
                                    <option value="<?=$k["id_kategori_materi"];?>"><?=$k["nama_kategori"];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
              <div class="form-group">
                <textarea class="form-control" name="pertanyaan" required rows="5" data-rule="required" data-msg="Masukkan Pertanyaan Anda" placeholder="Tulis Pertanyaan Anda Disini . . . "></textarea>
                <div class="validate"></div>
              </div>
              <div class="text-center"><button type="submit" class="btn btn-primary">Kirim</button></div>
            </form>

          </div>

        </div>

      </div>
    </section>