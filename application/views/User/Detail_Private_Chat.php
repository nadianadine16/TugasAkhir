<style>
ul{
  list-style: none;
  margin: 0;
  padding: 0;
}

ul li{
  display:inline-block;
  clear: both;
  padding: 20px;
  border-radius: 30px;
  margin-bottom: 2px;
  font-family: Helvetica, Arial, sans-serif;
}

.him{
  background: #eee;
  float: left;
}

.me{
  float: right;
  background: #0084ff;
  color: #fff;
}

.him + .me{
  border-bottom-right-radius: 5px;
}

.me + .me{
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
}

.me:last-of-type {
  border-bottom-right-radius: 30px;
}
</style>

<section id="gallery" class="gallery">
  <div class="keseluruhan" style="width:100%; height: 597px; position:fixed;">
    <div class="tempat_nama" style="margin-top:50px; border-style:solid; height:50px; width:93%; margin-left:40px;">
    <?php foreach($nama_tujuan as $n):?>
      <h1 style="font-size : 20px;color:#223440; font-family: Times, Times New Roman, Georgia, serif; padding-top:10px;padding-left:30px"> <?=$n['nama'];?></h1>
    <?php endforeach;?> 
    </div>
    <div id="tmp">
    <div class="tempat-chat" id="tempat-chat" style="background-color:#e6f3fa; border-style:solid; width:93%; height:430px; margin-top:10px; margin-left:40px;  display:block;  overflow:auto;">
    <?php 
		$id = $this->session->userdata('id_mahasiswa');
		foreach ($chat as $m) {
		?>
			<?php if ($m->send_by == $id) {?>
        <div class="me"><span  style="font-size:15px;"><?= $m->isi_pesan ?></span><br>
					<span style="font-size:11px;" class="text-secondary mr-2"><?= date('d-m-Y H:i:s',strtotime($m->time)) ?></span>
				</div>				
			<?php }else { ?>
        <div class="him"><span  style="font-size:15px;" ><?= $m->isi_pesan ?></span><br>
					<span style="font-size:11px;" class="text-secondary ml-2"><?= date('d-m-Y H:i:s',strtotime($m->time)) ?></span>
				</div>
				
			<?php } ?>
		<?php } ?>
    </div>
    </div>
    <div class = "bawah" style="width:93%; height:30px;margin-left:40px;margin-top:10px">
      <form action="<?=base_url('User/Detail_Private_Chat/'.$send_to)?>" method="post" >              
      <input type="hidden" name="send_by" value="<?=$this->session->userdata('id_mahasiswa');?>">        
        <div class="row">
          <div class="col-11">
            <input type="text" name="isi_pesan" class="form-control" placeholder="Tulis Pesan Kamu" autocomplete="off">
          </div>
          <div class="col-1">
            <button class="btn btn-primary btn-block">Kirimmmmmmmmmm</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<script type="text/javascript">
 $('#tempat-chat').scrollTop($('#tempat-chat')[0].scrollHeight);
</script>