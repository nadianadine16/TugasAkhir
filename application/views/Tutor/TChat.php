 <style>
x{
  list-style: none;
  margin: 0;
  padding: 0;
}

x y{
  display:inline-block;
  clear: both;
  padding: 10px;
  border-radius: 30px;
  margin-bottom: 10px;
  font-family: Helvetica, Arial, sans-serif;
}

.him{
  background: #eee;
  float: left;
  margin-left:10px;
}

.me{
  float: right;
  background: #0084ff;
  color: #fff;
  margin-right: 10px;
}

.him + .me{
  border-bottom-right-radius: 5px;
}

.me + .me{
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
}

.me:last-of-type {
  border-bottom-right-radius: 0px;
}
</style>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;">
            </div>
        </div>
    </div>
</div>

<div class="widgets-programs-area">
    <div class="container-fluid">
      <?php foreach($nama_tujuan as $n):?>
        <center><h4 style="padding-top:10px;padding-left:30px;margin-bottom:20px;">Mahasiswa : <a  href="<?= base_url();?>Tutor/Detail_Mahasiswa/<?=$n['id_mahasiswa'];?>" ><b><?=$n["nama"]?></b></a></h4><hr style="width:85%;"></center>
      <?php endforeach;?> 
      <div class="row">
        <div class="border rounded" id="border_rounded_tutor" style="margin-left:30px;;background-color:#ffffff;width:95%;height:450px;display:block; overflow:auto; font-size: 15px; font-family: Times, Times New Roman, Georgia, serif;">
      </div>
    </div>
    <div class="container-fluid" style="margin-top:10px;">
      <div class="row">
        <div class="col-md-12">
          <form accept-charset="UTF-8" method="post" action="<?= base_url('Tutor/Chat/'.$to) ?>" style="margin-top:10px;margin-bottom:-50px;">
          <input type="hidden" name="from" value="<?=$this->session->userdata('id_mahasiswa');?>"> 
            <div class="form-group-inner">
              <p style="font-size:13px;color:#808080;margin-top:10px;" id="limit_teks">0/2000</p>
              <div class="input-group custom-go-button" style="margin-left:50px;margin-top:-40px;">
              <input type="text"  name="message"  autofocus="true" class="form-control" placeholder="Tulis Pesan Kamu . . ." required autocomplete="off" onkeyup="cek_jumlah_karakter()" id="input_pesan" maxlength="2000">
              <span class="input-group-btn"><button type="submit" class="btn btn-primary" style="margin-top:-3px;margin-bottom:3px;"><i class="fa fa-paper-plane"></i> </button></span>
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
</div>

<script>
  var cek = document.getElementById("input_pesan");
  var batas_karakter = 2000;
  
  function cek_jumlah_karakter() {
    if(cek.value.length >= batas_karakter) { 
      var jumlah_karakter = cek.value.length;     
      document.getElementById("limit_teks").innerHTML = jumlah_karakter+"/"+batas_karakter;

    }
    else{      
      var jumlah_karakter = cek.value.length;
      document.getElementById("limit_teks").innerHTML = jumlah_karakter+"/"+batas_karakter;
    }
  }
</script>