    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    

<!-- Vendor JS Files -->
<!-- <script src="<?= base_url()?>/assets_user/vendor/jquery/jquery.min.js"></script> -->
  <!-- <script src="<?= base_url()?>/assets_user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- <script src="<?= base_url()?>/assets_user/vendor/jquery.easing/jquery.easing.min.js"></script> -->
<script src="<?= base_url()?>/assets_user/vendor/php-email-form/validate.js"></script>
<script src="<?= base_url()?>/assets_user/vendor/venobox/venobox.min.js"></script>
<script src="<?= base_url()?>/assets_user/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="<?= base_url()?>/assets_user/vendor/counterup/counterup.min.js"></script>
<script src="<?= base_url()?>/assets_user/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url()?>/assets_user/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
<script src="<?= base_url()?>/assets_user/js/main.js"></script>

<!-- <script src="<?= base_url()?>/assets/bootstrap/jquery/jquery3.js"></script> -->
<!-- <script src="<?= base_url()?>/assets/bootstrap/popper/popper.js"></script> -->
<!-- <script src="<?= base_url()?>/assets/bootstrap/js/bootstrap.js"></script> -->
<!-- <script src="<?= base_url()?>/assets/summernote/summernote-bs4.js"></script> -->
<script type="text/javascript">
    $(document).ready(function() {
        setInterval(() => {
            $.ajax({
                url: "<?php echo base_url(); ?>User/hitung_chat",
                method: "POST",
                data: {

                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    if(data.length >0 && data.length <10){
                    var html = '';
                    var i;
                    $("#notifchat").html(data.length);
                    for (i = 0; i < data.length; i++) {
                        html += '<a href="<?= base_url() ?>User/Change_Status_Chat/' + data[i].from + '"> <b> ' + data[i].nama + ' </b><br>' + data[i].message +'<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + data[i].created_at + '<br>';
                    }
                    $('#list').html(html);
                    }
                    else if(data.length > 9){
                        $("#notifchat").html("9+");
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                        html += '<a href="<?= base_url() ?>User/Change_Status_Chat/' + data[i].from + '"> <b> ' + data[i].nama + ' </b><br>' + data[i].message +'<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + data[i].created_at + '<br>';
                    }
                    $('#list').html(html);
                    }
                }
            });
        }, 1000);
    })
</script>
<script>     
    $(document).ready(function(){
        $('#summernoteForum').summernote({
            height: "200px",
            toolbar: [                          
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['para', ['ul', 'ol', 'paragraph']],                  
                ['insert', ['link', 'picture']],
            ],            
            callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                },
                onMediaDelete : function(target) {
                    deleteImage(target[0].src);
                }
            }
        });

        function uploadImage(image) {
            var data = new FormData();
            data.append("image", image);
            $.ajax({
                url: "<?php echo site_url('User/upload_image')?>",
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "POST",
                success: function(url) {
                    $('#summernoteForum').summernote("insertImage", url);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function deleteImage(src) {
            $.ajax({
                data: {src : src},
                type: "POST",
                url: "<?php echo site_url('User/delete_image')?>",
                cache: false,
                success: function(response) {
                    console.log(response);
                }
            });
        }

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        setInterval(() => {
            $.ajax({
                url: "<?php echo base_url(); ?>User/hitung_forum",
                method: "POST",
                data: {
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;             
                    if(data.length >0 && data.length <10){                           
                    $("#notifforum").html(data.length);                    
                    for (i = 0; i < data.length; i++) {
                        html += '<a href="<?=base_url()?>User/Change_Status_Jawaban/'+data[i].id_forum+'"><b>'+data[i].nama+'</b><br>'+data[i].topik+'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '+ data[i].send_time +'</a>';
                    }
                    $('#listf').html(html);
                    }
                    else if(data.length > 9){
                    $("#notifforum").html("9+");                    
                    for (i = 0; i < data.length; i++) {
                        html += '<a href="<?=base_url()?>User/Change_Status_Jawaban/'+data[i].id_forum+'"><b>'+data[i].nama+'</b><br>'+data[i].topik+'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '+ data[i].send_time +'</a>';
                    }
                    $('#listf').html(html);
                    }
                }
            });
        }, 1000);
    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        setInterval(() => {
            $.ajax({
                url: "<?php echo base_url(); ?>User/forum_dibuat",
                method: "POST",
                data: {
                },
                async: false,
                dataType: 'json',
                success: function(data) {                       
                                                                
                    var html = '';
                    var i;  
                    for (i = 1; i < data.length; i++) {
                        if(data[i].total!=0){   
                        html += '<tr><td>'+i+'</td><td>'+data[i].nama_kategori+'<span class="badge badge-light" style="background-color:red; color: white">'+data[i].total+'</span></td><td>'+data[i].topik+'</td><td>'+data[i].created_at+'</td><td><a href="<?= base_url();?>User/Change_Status_Jawaban/'+data[i].id_forum+'"><center><button class="btn btn-primary btn-sm">Lihat Forum</button></center></a></td></tr>';
                        }                                        
                        if(data[i].total==0){   
                        html += '<tr><td>'+i+'</td><td>'+data[i].nama_kategori+'</span></td><td>'+data[i].topik+'</td><td>'+data[i].created_at+'</td><td><a href="<?= base_url();?>User/Change_Status_Jawaban/'+data[i].id_forum+'"><center><button class="btn btn-primary btn-sm">Lihat Forum</button></center></a></td></tr>';
                        }                                        
                    }
                    $('#listtab').html(html);
                    
                }
            });
        }, 1000);
    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        setInterval(() => {
            $.ajax({
                url: "<?php echo base_url(); ?>User/notif1",
                method: "POST",
                data: {
                },
                async: false,
                dataType: 'json',
                success: function(data) {                       
                                                                
                    var html = '';
                    var i;  
                    for (i = 0; i < data.length; i++) {
                        if(data[i].total!=0 && data[i].foto!=null){   
                            html += '<div class="kotakSatu"><div class="card border-info mb-3"><div class="card-header"><b>'+data[i].nama+'</b><span class="badge badge-light" style="background-color:red; color: white">'+data[i].total+'</span></div><div class="card-body text-info"><div class="card-text" style="text-align:justify;width:75%;padding:5px;"><img src="<?= base_url()?>upload/profil/'+data[i].foto+'" style="width:110px;height:140px;float:left; margin:0 10px 4px 0;" /><br><b>Kategori Tutor :</b>'+data[i].nama_kategori+'<br><b>Tahun Masuk :</b> '+data[i].tahun_masuk+'</div><a href="<?= base_url();?>User/Change_Status_Chat/'+data[i].id_mahasiswa+'"style="float:right;color:#007bff; bottom: 0;right:0; padding: 15px; position: absolute;"><i class="fa fa-envelope" aria-hidden="true"></i> Chat</a></div></div>';
                        }                                        
                        if(data[i].total==0 && data[i].foto!=null){   
                            html += '<div class="kotakSatu"><div class="card border-info mb-3"><div class="card-header"><b>'+data[i].nama+'</b></div><div class="card-body text-info"><div class="card-text" style="text-align:justify;width:75%;padding:5px;"><img src="<?= base_url()?>upload/profil/'+data[i].foto+'" style="width:110px;height:140px;float:left; margin:0 10px 4px 0;" /><br><b>Kategori Tutor :</b>'+data[i].nama_kategori+'<br><b>Tahun Masuk :</b> '+data[i].tahun_masuk+'</div><a href="<?= base_url();?>User/Change_Status_Chat/'+data[i].id_mahasiswa+'"style="float:right;color:#007bff; bottom: 0;right:0; padding: 15px; position: absolute;"><i class="fa fa-envelope" aria-hidden="true"></i> Chat</a></div></div>';
                        }
                        if(data[i].total==0 && data[i].foto==null){   
                            html += '<div class="kotakSatu"><div class="card border-info mb-3"><div class="card-header"><b>'+data[i].nama+'</b></div><div class="card-body text-info"><div class="card-text" style="text-align:justify;width:75%;padding:5px;"><img src="<?= base_url()?>upload/profil/user.png" style="width:110px;height:140px;float:left; margin:0 10px 4px 0;" /><br><b>Kategori Tutor :</b>'+data[i].nama_kategori+'<br><b>Tahun Masuk :</b> '+data[i].tahun_masuk+'</div><a href="<?= base_url();?>User/Change_Status_Chat/'+data[i].id_mahasiswa+'"style="float:right;color:#007bff; bottom: 0;right:0; padding: 15px; position: absolute;"><i class="fa fa-envelope" aria-hidden="true"></i> Chat</a></div></div>';
                        }                                        
                        if(data[i].total!=0 && data[i].foto==null){   
                            html += '<div class="kotakSatu"><div class="card border-info mb-3"><div class="card-header"><b>'+data[i].nama+'</b><span class="badge badge-light" style="background-color:red; color: white">'+data[i].total+'</span></div><div class="card-body text-info"><div class="card-text" style="text-align:justify;width:75%;padding:5px;"><img src="<?= base_url()?>upload/profil/user.png" style="width:110px;height:140px;float:left; margin:0 10px 4px 0;" /><br><b>Kategori Tutor :</b>'+data[i].nama_kategori+'<br><b>Tahun Masuk :</b> '+data[i].tahun_masuk+'</div><a href="<?= base_url();?>User/Change_Status_Chat/'+data[i].id_mahasiswa+'"style="float:right;color:#007bff; bottom: 0;right:0; padding: 15px; position: absolute;"><i class="fa fa-envelope" aria-hidden="true"></i> Chat</a></div></div>';
                        }                                        
                    }
                    $('#listprichat').html(html);
                    
                }
            });
        }, 1000);
    })
</script>
</body>
</html>