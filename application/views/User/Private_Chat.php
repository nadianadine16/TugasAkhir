<section id="team" class="team section" style="margin-top:50px;">
  <div class="container" style="background-color: #f4fbfe; margin-top: -30px; width:75%;">
    <div class="section-title">
      <br><br><h2>Chat Bersama Tutor</h2>              
    </div>
    <div class="row">      
      <div class="col-md-5" style="margin-bottom:30px;">
      <form action ="<?= base_url('User/CariChat');?>" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari Tutor. . ." name="keyword" autocomplete="off" required>
            <div class="input-group-append">
              <input class="btn" type="submit" name="submit" style="background-color:#49b5e7;color:#ffffff;"></button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="kotak" style="width:97%; margin-left:10px;margin-right:10px;" id="listprichat">        
  </div>      
  <div class="row">
    <div class="col">
        <?php echo $pagination; ?>
    </div>
  </div>  
</section>