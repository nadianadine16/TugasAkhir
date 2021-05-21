<style>
    .container1 {
    overflow: hidden;
    }

    .filterDiv {
    
    display: none;
    }

    .show {
    display: block;
    }
    ul > li{
        display:inline-block;
        color:blue;
    }
    .filter{
        background-color: Transparent;
        background-repeat:no-repeat;
        border: none;
        cursor:pointer;
        overflow: hidden;
        outline:none;    
    }
    [aria-expanded="false"] > .expanded, [aria-expanded="true"] > .collapsed {
		display: none;
	}
</style>

<section id="portfolio" class="portfolio" style="margin-top:50px">
    <div class="container">
        <div class="section-title">
        <?php foreach($materi as $d):?>
            <center><h2><?=$d["nama_materi"];?></h2></center>
            <center><p style="margin-top:-10px; margin-bottom:20px;">Tutor : <span><a href="<?=base_url()?>User/Detail_Tutor/<?=$d['id_tutor'];?>"><?=$d["nama"];?></span></a></p></center>
                <img src="<?= base_url('upload/cover_materi/'.$d['cover'])?>" style="height: 50%; width: 50%;">
            <?php endforeach;?>
        </div>                        
        <div id="golongan">
            <center><ul>
                <li> <button class="filter" onclick="filterSelection('cars')">Content &nbsp;&nbsp;|</li>
                <li> <button class="filter" onclick="filterSelection('animals')">Overview</li>              
            </ul></center>
        </div>        
        <div class="container1">
            <div class="filterDiv cars">
            <!-- ACCORDION START -->
            <?php if($konten == NULL) {?>
                <center><p>Sayang sekali, sepertinya Tutor belum menambahkan konten :)</p></center>
            <?php } else { ?>
                <?php $no=1; $x=1; $t=1; $jumlahTugas=-1; foreach($konten as $k):?> <!-- Start dari -1 agar mendapat jumlah lebih 1 dari total yang didapat -->
                <?php if ($count>$jumlahTugas) { ?>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" style="background-color:white; border:0.5px solid #4682B4;">
                            <a class="card-link" data-toggle="collapse" href="#menuone<?php echo $x; ?>" aria-expanded="false" aria-controls="menuone" style= "color:#0350ad;"> <?php $x++;?>
                                <span class="collapsed"><i class="fa fa-plus"></i></span> 
                                <span class="expanded"><i class="fa fa-minus"></i></span> 
                                <?=$no++;?>.&nbsp;<?=$k["judul"];?>
                            </a>
                        </div>
                        <div id="menuone<?php echo $t; $t++;?>" class="collapse">
                            <div class="card-body">
                                <?php if($k["video"] != NULL){?>
                                    <?php
                                    $url = $k["video"];
                                    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
                                    $id = $match[1];
                                    $width = '400px';
                                    $height = '300px'; ?>
                                    <p><b>Video</b><br>                                    
                                    </p>
                                    <center><iframe id="ytplayer" type="text/html" width="<?php echo $width ?>" height="<?php echo $height ?>" src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allowfullscreen></iframe></center>
                                    <?php
                                        } 
                                        else { ?>
                                    <p><b>Video</b><br>-</p>
                                    <?php
                                        } 
                                    ?>
                                    <?php if($k["file_pendukung"] != NULL){?>
                                        <p><b>File Pendukung</b><br><a href="<?= base_url('upload/materi/'.$k["file_pendukung"])?>"><?=$k["file_pendukung"];?></a></p>
                                    <?php
                                        } 
                                    else { ?>
                                        <p><b>File Pendukung</b><br>-</p>
                                    <?php
                                        } 
                                    ?>
                                    <?php foreach($materi as $m):?>
                                    <p><b>Soal Latihan</b><br><?=$k["soal"];?></p>
                                    <a href="<?= base_url();?>user/kumpulkanTugas/<?=$k['id_konten'];?>"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Kumpulkan Tugas Disini</a>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } else { ?>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" style="background-color:white; border:0.5px solid #4682B4;">
                            <a class="card-link" data-toggle="collapse" href="#menuone<?php echo $x; ?>" aria-expanded="false" aria-controls="menuone" style= "color:#82868c;"> <?php $x++;?>
                                <span class="collapsed"><i class="fa fa-plus"></i></span> 
                                <span class="expanded"><i class="fa fa-minus"></i></span> 
                                <?=$no++;?>.&nbsp;<?=$k["judul"];?>
                            </a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            <?php $jumlahTugas++; ?>
            <?php endforeach;?>
            <?php } ?>
            </div>    
            <!-- ACCORDION END -->
            <div class="filterDiv animals">            
                <hr>
                <h5><b>Nama materi</b></h5>
                <?php foreach($materi as $p):?>
                <p><?=$p["nama_materi"]?></p>
                <?php endforeach;?>
                <hr>
                <h5><b>Deskripsi</b></h5>
                <?php foreach($materi as $p):?>
                <p><?=$p["deskripsi"]?></p>
                <?php endforeach;?>
                <hr>
                <h5><b>Requirement</b></h5>
                <?php foreach($materi as $p):?>
                <p><?=$p["requirement"]?></p>
                <?php endforeach;?>
                <hr>
            </div>
        </div>
    </div>    
</section>

<script>
  filterSelection("cars")
  function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("filterDiv");
    if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
      w3RemoveClass(x[i], "show");
      if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
    }
  }

  function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
    }
  }

  function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      while (arr1.indexOf(arr2[i]) > -1) {
        arr1.splice(arr1.indexOf(arr2[i]), 1);     
      }
    }
    element.className = arr1.join(" ");
  }

  var btnContainer = document.getElementById("golongan");
  var btns = btnContainer.getElementsByClassName("filter");
  for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function(){
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace(" active", "");
      this.className += " active";
    });
  }
</script>