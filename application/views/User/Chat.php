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
	<div class="border rounded" id="border_rounded" style="height:450px;;display:block; overflow:auto; font-size: 15px; font-family: Times, Times New Roman, Georgia, serif;">
		<?php 
		$id = $this->session->userdata('id_mahasiswa');
		foreach ($chats as $item) {
		?>
			<?php if ($item->from == $id) {?>
				<x>
 					<y class="me" style=" max-width:400px; margin-right:10px;margin-top:10px;"><?= $item->message ?></y>
				</x><br>
				<p style="font-size:11px;float:right;" class="text-secondary mr-2"><?= date('d-m-Y H:i:s',strtotime($item->created_at)) ?></p>
			<?php }else { ?>
				<x>
 					<y class="him" style=" max-width:400px; margin-left:10px; margin-top:10px;"><?= $item->message ?></y>
				</x><br>
				<p style="font-size:11px;float:left;" class="text-secondary mr-2"><?= date('d-m-Y H:i:s',strtotime($item->created_at)) ?></p>
			<?php } ?>
		<?php } ?>
	</div>
	</div>

	<form method="post" action="<?= base_url('User/Chat/'.$to) ?>" style="margin-top: 10px;margin-bottom:-50px;">
    <input type="hidden" name="from" value="<?=$this->session->userdata('id_mahasiswa');?>">    
		<div class="row">
			<div class="col-10">
				<input type="text" name="message" autofocus="true" class="form-control" placeholder="Tulis Pesan Kamu . . ." required autocomplete="off">
			</div>
			<div class="col-2">
				<button class="btn btn-block" style="background-color:#49b5e7;color:#ffffff;">Kirim</button>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
	$('#border_rounded').scrollTop($('#border_rounded')[0].scrollHeight);
</script>

</section>