<section id="gallery" class="gallery">
      <div class="container" style="margin-top:50px">

        <div class="section-title">
          <h2>Daftar Kategori Materi</h2>
          <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>

        <div class="row no-gutters">
        <div class="card" style="margin-left: 50px">
        <?php $no=1; foreach($kategori_materi as $m):?>
        <ul class="list-group list-group-flush">
            <li class="list-group-item" style="width: 1000px;"><a href="<?= base_url();?>user/daftarMateri/<?=$m['id_kategori_materi'];?>"><?=$m["nama_kategori"];?></a></li>
            <!-- <a href="#" class="btn btn-primary" type="submit">Pilih</a> -->
        </ul>
        <?php endforeach;?>
        </div>
        </div>

      </div>
    </section><!-- End Gallery Section -->                                         