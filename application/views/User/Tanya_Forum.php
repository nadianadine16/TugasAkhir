<section id="gallery" class="gallery">
  <div class="container" style="margin-top:30px;background-color: #f4fbfe;">
    <div class="section-title">
      <h2><br>Buat Forum</h2>
    </div>

    <form action="<?=base_url('User/Tanya_Forum')?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id_mahasiswa" value="<?= $this->session->userdata('id_mahasiswa');?>">
      <div class="form-group">
        <label for="id_kategori_materi"><b>Kategori Forum</b></label>
        <select class="form-control" id="id_kategori_materi" name="id_kategori_materi" required>
          <option value="" selected="true" disabled="disabled">- Pilih Kategori Forum -</option>
          <?php foreach($KategoriMateri as $k) : ?>
            <option value="<?=$k["id_kategori_materi"];?>"><?=$k["nama_kategori"];?></option>
          <?php endforeach;?>
        </select>
      </div>
      <div class="form-group">
      <label for="pertanyaan"><b>Pertanyaan</b></label>
        <textarea class="form-control" name="pertanyaan" required rows="5" data-rule="required" data-msg="Masukkan Pertanyaan Anda" placeholder="Tulis Pertanyaan Anda Disini . . . "></textarea>
        <div class="validate"></div>
      </div>
      <div class="form-group">
        <label for="link_tanya" style="float:left;"><b>Link Referensi (Opsional)</b></label>
        <input type="text" class="form-control" id="link_tanya" name="link_tanya" autocomplete="off" placeholder="Contoh: https://codingjti.com/">
      </div>
      <div class="form-group">
        <label for="gambar_tanya" style="float:left;"><b>Unggah Gambar (Opsional)</b></label>
        <input type="file" class="form-control" id="gambar_tanya" name="gambar_tanya">
        <p style="color:#808080;float:left;">Format .jpg .png</p>
      </div><br>
      <div class="text-center">
        <button type="submit" class="btn" style="background-color:#49b5e7;color:#ffffff;">Kirim</button>
      </div><br>
    </form>
  </div>
</section>

    <!-- <form action="<?=base_url('User/Tanya_Forum')?>" method="post" enctype="multipart/form-data">
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
              <label for="link">Pertanyaan</label>
                <textarea class="form-control" name="pertanyaan" required rows="5" data-rule="required" data-msg="Masukkan Pertanyaan Anda" placeholder="Tulis Pertanyaan Anda Disini . . . "></textarea>
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <label for="link">Link</label>
                <input type="text"  id="link_tanya" name="link_tanya" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="cover">Unggah Gambar</label>
                <input type="file" class="form-control" id="gambar_tanya" name="gambar_tanya">
                <p style="color:#808080;">Format .jpg .png</p>
              </div>
              <div class="text-center"><button type="submit" class="btn" style="background-color:#49b5e7;color:#ffffff;">Kirim</button></div>
            </form> -->