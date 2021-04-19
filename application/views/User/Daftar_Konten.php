<style>
.container1 {
  overflow: hidden;
}

.filterDiv {
  
  display: none; /* Hidden by default */
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

</style>
<section id="portfolio" class="portfolio" style="margin-top:50px">
      <div class="container">
        <div class="section-title">
          <h2> Content</h2>                    
          <iframe width="560" height="315" src="https://www.youtube.com/embed/foSpp6QJ-cA?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>                        
          <div id="golongan">
            <center><ul>
              <li> <button class="filter" onclick="filterSelection('cars')">Content &nbsp;&nbsp;|</li>
              <li> <button class="filter" onclick="filterSelection('animals')">Overview</li>              
            </ul></center>
            <!-- <p class="btn active" onclick="filterSelection('all')"> Show all</p>
            <p class="btn" onclick="filterSelection('cars')"> Cars</p>
            <p class="btn" onclick="filterSelection('animals')"> Animals</p>
            <p class="btn" onclick="filterSelection('fruits')"> Fruits</p>
            <p class="btn" onclick="filterSelection('colors')"> Colors</p> -->
          </div>        
          <!-- The filterable elements. Note that some have multiple class names (this can be used if they belong to multiple categories) -->
          <div class="container1">
          
            <div class="filterDiv cars">
            <?php foreach($daftar_konten as $d):?>
              <div class="card">
                <h5 class="card-header"><?=$d["judul"]?></h5>
                <div class="card-body">                
                  <center><iframe width="400" height="260" src="<?=$d["video"]?>" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br></center>                
                    <?php if($d["file_pendukung"] != NULL){?>
                    <p><b>File Pendukung</b><br><a href="<?= base_url('upload/materi/'.$d["file_pendukung"])?>"><?=$d["file_pendukung"];?></a></p>
                    <?php
                    } 
                    else { ?>
                    <p><b>File Pendukung</b><br>-</p>
                    <?php
                    } 
                    ?>
                  <a href="<?= base_url();?>user/kumpulkanTugas/<?=$d['id_konten'];?>"><i class="fa fa-plus" aria-hidden="true"></i> Latihan Soal</a>
                </div>
              </div>
              <?php endforeach;?>
            </div>                      
            <div class="filterDiv animals">            
            <center><h2><b>Tentang Materi</b></h2></center><br><br>
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
            </div>
                    
            
          </div>
        </div>    
    </section><!-- End Portfolio Section -->

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

// Add active class to the current button (highlight it)
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
