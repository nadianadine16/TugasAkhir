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
        <textarea class="form-control" name="pertanyaan" required rows="5" data-rule="required" data-msg="Masukkan Pertanyaan Anda" placeholder="Tulis Pertanyaan Anda Disini . . . " style="width:93%;" id="input_pesan" onkeyup="cek_jumlah_karakter()"></textarea>
        <p style="margin-top:-16px;margin-left:-16px;font-size:13px;color:#808080;float:right;" id="limit_teks">0/2000</p>
        <div class="validate"></div>
      </div>
      <div class="col-1">
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
<script>
  var cek = document.getElementById("input_pesan");
  var batas_karakter = 2000;
  function cek_jumlah_karakter() {
    if(cek.value.length >= batas_karakter) {
      alert('Anda mencapai batas maksimal karakter!');
      document.getElementById("limit_teks").innerHTML = batas_karakter+"/"+batas_karakter;

    }
    else{
      var jumlah_karakter = cek.value.length;
      document.getElementById("limit_teks").innerHTML = jumlah_karakter+"/"+batas_karakter;
    }
  }
</script>