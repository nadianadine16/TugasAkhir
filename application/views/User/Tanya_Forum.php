<section id="gallery" class="gallery">
  <div class="container" style="margin-top:30px;background-color: #f4fbfe;">
    <div class="section-title">
      <h2><br>Buat Forum</h2>
    </div>

    <form action="<?=base_url('User/Tanya_Forum')?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id_mahasiswa" value="<?= $this->session->userdata('id_mahasiswa');?>">
      <?php if (validation_errors()): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo validation_errors(); ?>
        </div>
      <?php endif; ?>
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
        <label for="topik" style="float:left;"><b>Masukkan Topik Forum</b></label>
        <input type="text" class="form-control" id="topik" name="topik" autocomplete="off" placeholder="Contoh: Datatables di CodeIgniter">
      </div>
      <div class="form-group">
        <label for="pertanyaan"><b>Pertanyaan</b></label>
        <textarea class="form-control" id="summernoteForum" name="pertanyaan"></textarea>        
      </div>
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