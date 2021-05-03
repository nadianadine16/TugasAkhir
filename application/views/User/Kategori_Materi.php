<section id="team" class="team section" style="margin-top:50px;">
      <div class="container" style="background-color: white; margin-top: -30px;">
        <div class="section-title">
          <br><br><h2>Kategori Materi</h2>        
        </div>
        <div class="row">                
        <!-- <div class="dropdown" style="margin-left:70px">
            <button class="btn btn-primary dropdown-toggle" style="width:1000px;" type="button" data-toggle="dropdown">Dropdown Example
            </button>
            <ul class="dropdown-menu" style="width:1000px;">            
            <input class="form-control" id="myInput" type="text" placeholder="Search..">            
            <?php foreach($kategori_materi as $k):?>
            <li><a href="<?= base_url();?>user/daftarMateri/<?=$k['id_kategori_materi'];?>"><?= $k["nama_kategori"]?></a></li>            
            <?php endforeach;?>
            </ul>
        </div> -->
        <?php foreach($kategori_materi as $k):?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
          <a href="<?= base_url();?>user/daftarMateri/<?=$k['id_kategori_materi'];?>">
            <div class="member">
              <div class="member-img">
                <img src="<?= base_url('assets_user/img/kategori.png')?>" class="img-fluid" alt="">               
              </div>
              <div class="member-info">
                <h4><?= $k["nama_kategori"]?></h4>                                                
              </div>
            </div>
          </a>
          </div>          
          <?php endforeach;?>
        </div>        
      </div>
    </section>
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  /* Style the input field */
  #myInput {
    padding: 20px;
    margin-top: -6px;
    border: 0;
    border-radius: 0;
    background: #f1f1f1;
  }
  </style>
  <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".dropdown-menu li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>