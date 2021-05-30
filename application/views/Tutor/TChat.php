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

<section id="team" class="team section-bg" style="margin-top:30px">
	<?php foreach($nama_tujuan as $n):?>
		<center><h4 style="font-size: 20px; padding-top:10px;padding-left:30px;margin-bottom:20px;">Mahasiswa : <b><?=$n["nama"]?></b></h4><hr style="width:85%;"></center>
	<?php endforeach;?> 
	<div class="container">	
		<div id="tmp">
		<div class="border rounded" id="border_rounded" style="background-color:#ffffff;width:100%;height:500px;;display:block; overflow:auto; font-size: 15px; font-family: Times, Times New Roman, Georgia, serif;">
				<?php 
				$id = $this->session->userdata('id_mahasiswa');
				foreach ($chats as $item) {
				?>
					<?php if ($item->from == $id) {?>
						<x>
							<y class="me"><?= $item->message ?></y>
						</x><br>
						<p style="font-size:11px;float:right;" class="text-secondary mr-2"><?= date('d-m-Y H:i:s',strtotime($item->created_at)) ?></p>
					<?php }else { ?>
						<x>
							<y class="him"><?= $item->message ?></y>
						</x><br>
						<p style="font-size:11px;float:left;" class="text-secondary mr-2"><?= date('d-m-Y H:i:s',strtotime($item->created_at)) ?></p>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
		
		<form method="post" action="<?= base_url('Tutor/Chat/'.$to) ?>" style="margin-top:20px;width:90%;margin-left:16px;">
			<input type="hidden" name="from" value="<?=$this->session->userdata('id_mahasiswa');?>">    
			<div class="row">
				<div class="col-10">
					<input type="text" name="message" class="form-control" placeholder="Tulis Pesan Kamu" autocomplete="off">
					<!-- <span><input class="btn btn-primary" type="submit" name="submit"></span> -->
				</div>
				<div class="col-2">
				<button class="btn btn-primary btn-block" style="width:7%;float:right;margin-right:-85px;margin-top:-38px;">Kirim</button>
				<!-- <input class="btn btn-primary" type="submit" name="submit"> -->
				</div>
			</div>
		</form>
	</div>
</section>

<script type="text/javascript">
	var objDiv = document.getElementById("border_rounded");
	objDiv.scrollTop = objDiv.scrollHeight;
</script> 