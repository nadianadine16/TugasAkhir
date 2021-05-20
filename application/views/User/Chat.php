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
<!-- <a href="<?= base_url('User/Private_Chat') ?>" style="margin-left:9%">Back</a> -->
<?php foreach($nama_tujuan as $n):?>
<center><h4 style="font-size: 20px; padding-top:10px;padding-left:30px;">Tutor : <b><?=$n["nama"]?></b></h4></center>
<?php endforeach;?> 
<div class="container">	
	<div id="tmp">
	<div class="border rounded" id="border_rounded" style="height:500px;;display:block; overflow:auto; font-size: 15px; font-family: Times, Times New Roman, Georgia, serif;">
		<?php 
		$id = $this->session->userdata('id_mahasiswa');
		foreach ($chats as $item) {
		?>
			<?php if ($item->from == $id) {?>
				<x>
 					<y class="me"><?= $item->message ?></y>
				</x><br>
				<p style="font-size:11px;float:right;" class="text-secondary mr-2"><?= date('d-m-Y H:i:s',strtotime($item->created_at)) ?></p>
				<!-- <div class="me"><span  style="font-size:18px;"><?= $item->message ?></span><br>
					<span style="font-size:11px;" class="text-secondary mr-2"><?= date('d-m-Y H:i:s',strtotime($item->created_at)) ?></span>
				</div> -->
			<?php }else { ?>
				<x>
 					<y class="him"><?= $item->message ?></y>
				</x><br>
				<p style="font-size:11px;float:left;" class="text-secondary mr-2"><?= date('d-m-Y H:i:s',strtotime($item->created_at)) ?></p>
				<!-- <div class="him"><span  style="font-size:18px;"><?= $item->message ?></span><br>
					<span style="font-size:11px;" class="text-secondary ml-2"><?= date('d-m-Y H:i:s',strtotime($item->created_at)) ?></span>
				</div> -->
			<?php } ?>
		<?php } ?>
	</div>
	</div>

	<form method="post" action="<?= base_url('User/Chat/'.$to) ?>" style="margin-top: 10px;">
    <input type="hidden" name="from" value="<?=$this->session->userdata('id_mahasiswa');?>">    
		<div class="row">
			<div class="col-10">
				<input type="text" name="message" class="form-control" placeholder="Tulis Pesan Kamu">
			</div>
			<div class="col-2">
				<button class="btn btn-primary btn-block">Kirim</button>
			</div>
		</div>
	</form>
</div>

<!-- <script type="text/javascript">
	myFunction();

	function myFunction() {
	  setInterval(ajaxChat, 5000);
	}

	function ajaxChat() {
	  $.ajax({
	  	url: "<?= base_url('User/ajax/'.$to) ?>", 
	  	success: function(result){
	    $("#tmp").html(result);
	  }});
	}

</script> -->
<script type="text/javascript">
 $('#border_rounded').scrollTop($('#border_rounded')[0].scrollHeight);
</script>
</section>
