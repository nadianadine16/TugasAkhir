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

<section id="team" class="team section-bg" style="margin-top:50px">
<?php foreach($nama_tujuan as $n):?>
<center><h4 style="font-size: 20px; padding-top:10px;padding-left:30px;">Tutor : <b><?=$n["nama"]?></b></h4></center>
<?php endforeach;?> 
<div class="container">	
	<div id="tmp">
	<div class="border rounded" id="border_rounded_user" style="height:450px;;display:block; overflow:auto; font-size: 15px; font-family: Times, Times New Roman, Georgia, serif;">		
	</div>
	</div>

	<form method="post" action="<?= base_url('User/Chat/'.$to) ?>" style="margin-top: 10px;margin-bottom:-50px;" id="balas">
    <input type="hidden" name="from" value="<?=$this->session->userdata('id_mahasiswa');?>">    
		<div class="row">
			<div class="col-10">
				<input type="text" name="message" autofocus="true" class="form-control" placeholder="Tulis Pesan Kamu . . ." required autocomplete="off" onkeyup="cek_jumlah_karakter()" id="input_pesan" style="width:98%;"  maxlength="2000">
			</div>
			<div class="col-1">
				<p style="margin-top:8px;margin-left:-35px;font-size:13px;color:#808080;" id="limit_teks">0/2000</p>
			</div>
			<div class="col-1">
				<button class="btn btn-block" style="background-color:#49b5e7;color:#ffffff;width:200%;margin-left:-60px;">Kirim</button>
			</div>
		</div>
	</form>
</div>
</section>


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