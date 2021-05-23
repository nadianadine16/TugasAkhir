<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Edit Mahasiswa</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="product-payment-inner-st">
                <center><h4>Edit Data Mahasiswa</h4></center>
                <?php if (validation_errors()): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo validation_errors(); ?>
                </div>
                <?php endif; ?>
                <div class="product-payment-inner-st">
                <form action="<?=base_url('admin/edit_data_mahasiswa/'.$mahasiswa['id_mahasiswa'])?>" method="post" onsubmit="return validasi_input(this)">
                <input type="hidden" name="id_mahasiswa" value="<?=$mahasiswa['id_mahasiswa'];?>">
                <div class="form-group">
                    <label for="nim">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="<?=$mahasiswa['nim'];?>">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?=$mahasiswa['nama'];?>">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                        <?php foreach($jenis_kelamin as $jk) : ?>
                            <option value="<?=($jk)?>" selected><?=($jk)?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Jurusan</label>
                    <input type="text" class="form-control" id="jurusan" name="jurusan" readonly value="<?=$mahasiswa['jurusan'];?>">
                </div> 
                <div class="form-group">
                    <label for="status">Prodi</label>
                    <select class="form-control" id="prodi" name="prodi">
                        <?php foreach($prodi as $p) : ?>
                            <option value="<?=($p)?>" selected><?=($p)?></option>
                        <?php endforeach;?>
                    </select>
                </div>  
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas"value="<?=$mahasiswa['kelas'];?>">
                </div>
                <div class="form-group">
                    <label for="tahun_masuk">Tahun Masuk</label>
                        <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" value="<?=$mahasiswa['tahun_masuk'];?>">
                </div>
                <div class="form-group">
                    <label for="github">Alamat Github</label>
                        <input type="text" class="form-control" id="github" name="github" value="<?=$mahasiswa['github'];?>">
                </div>
                <center><button type="submit" name="submit" class="btn btn-primary float-right">Edit</button></center>
            </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function validasi_input(form){
  var mincar = 10;
  if (form.nim.value.length > mincar){
    alert("NIM Maksimal 10 karakter!");
    form.nim.focus();
    return (false);
  }
  else{
    if (form.nim.value != ""){
        var x = (form.nim.value);
        var status = true;
        var list = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        for (i=0; i<=x.length-1; i++){
            if (x[i] in list) cek = true;
            else cek = false;
        status = status && cek;
        }
        if (status == false){
            alert("NIM harus angka");
            form.nim.focus();
            return false;
        }
    }    
  }
   return (true);
}
</script>