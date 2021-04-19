<div class="keseluruhan" style="width:100%; height: 597px; position:fixed;">
  <div class="tempat_nama" style="margin-top:50px; border-style:solid; height:50px; width:80%; margin-left:40px;">
    <?php foreach($nama_tujuan as $n):?>
      <h1 style="font-size : 20px;color:#223440; font-family: Times, Times New Roman, Georgia, serif; padding-top:10px;padding-left:30px"> <?=$n['nama'];?></h1>
    <?php endforeach;?> 
  </div>
  <div class="tempat-chat" id="tempat-chat" style="background-color:#e6f3fa; border-style:solid; width:80%; height:400px; margin-top:10px; margin-left:40px;  display:block;  overflow:auto;">
    <?php 
		$id = $this->session->userdata('id_tutor');
		foreach ($chat as $m) {
		?>
			<?php if ($m->send_by == $id) {?>
        <div class="text-left"><span class="ml-2" style="font-size:15px;"><?= $m->isi_pesan ?></span><br>
					<span style="font-size:11px;" class="text-secondary ml-2"><?= date('d-m-Y H:i:s',strtotime($m->time)) ?></span>
				
				</div>
			<?php }else { ?>
				<div class="text-right"><span class="mr-2 text-primary" style="font-size:15px;"><?= $m->isi_pesan ?></span><br>
					<span style="font-size:11px;" class="text-secondary mr-2"><?= date('d-m-Y H:i:s',strtotime($m->time)) ?></span>
				</div>
			<?php } ?>
		<?php } ?>
    </div>
    <div class = "bawah" style="width:80%; height:30px;margin-left:40px;margin-top:10px">
      <form action="<?=base_url('Tutor/Detail_Private_Chat/'.$send_to)?>" method="post" >              
      <input type="hidden" name="send_by" value="<?=$this->session->userdata('id_tutor');?>">         
        <div class="row">
          <div class="col-9">
            <input type="text" name="isi_pesan" class="form-control" placeholder="Tulis Pesan Kamu" autocomplete="off">
          </div>
          <div class="col-1">
            <button class="btn btn-primary btn-block">Kirim</button>
          </div>
        </div>
      </form>
    </div>
</div>
<script type="text/javascript">
 $('#tempat-chat').scrollTop($('#tempat-chat')[0].scrollHeight);
</script>