
<div class="awal" style="margin-top:10px">
<div class="container">	
<a href="<?= base_url('Tutor/Private_Chat') ?>" style="margin-left:3%;">Back</a>
<?php foreach($nama_tujuan as $n):?>
<h4 style="font-size: 20px; font-family: Times, Times New Roman, Georgia, serif; padding-top:10px; margin-left:3%;"><b>Chat with : </b> <?=$n["nama"]?></h4>
</div>
<hr>
<?php endforeach;?> 
<div class="container">	
	<div id="tmp">
	<div class="border rounded" id="mydiv" style="height:380px;display:block; overflow:auto; font-family: Times, Times New Roman, Georgia, serif;margin-left:2%;">	
		<?php 
		$id = $this->session->userdata('id_mahasiswa');
		foreach ($chats as $item) {
		?>
			<?php if ($item->from == $id) {?>
				<div class="text-right"><span class="mr-2 text-primary" style="font-size:18px;"><?= $item->message ?></span><br>
					<span style="font-size:11px;" class="text-secondary mr-2"><?= date('d-m-Y H:i:s',strtotime($item->created_at)) ?></span>
				</div>
			<?php }else { ?>
				<div class="text-left"><span class="ml-2" style="font-size:18px;"><?= $item->message ?></span><br>
					<span style="font-size:11px;" class="text-secondary ml-2"><?= date('d-m-Y H:i:s',strtotime($item->created_at)) ?></span>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
	</div><hr>

	<form method="post" action="<?= base_url('Tutor/Chat/'.$to) ?>" style="margin-top:20px;width:90%;margin-left:50px">
    <input type="hidden" name="from" value="<?=$this->session->userdata('id_mahasiswa');?>">    
		<div class="row">
			<div class="col-10">
				<input type="text" name="message" class="form-control" placeholder="Tulis Pesan Kamu">
			</div>
			<div class="col-2">
				<button class="btn btn-primary btn-block" style="width:80px;">Kirim</button>
			</div>
		</div>
	</form>
</div>
<script type="text/javascript">
 var objDiv = document.getElementById("mydiv");
	objDiv.scrollTop = objDiv.scrollHeight;
</script> 
<!-- <script type="text/javascript">
	myFunction();

	function myFunction() {
	  setInterval(ajaxChat, 5000);
	}

	function ajaxChat() {
	  $.ajax({
	  	url: "<?= base_url('Tutor/ajax/'.$to) ?>", 
	  	success: function(result){
	    $("#tmp").html(result);
	  }});
	}

</script>-->
