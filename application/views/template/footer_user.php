<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    
<script src="<?= base_url()?>/assets_user/vendor/php-email-form/validate.js"></script>
<script src="<?= base_url()?>/assets_user/vendor/venobox/venobox.min.js"></script>
<script src="<?= base_url()?>/assets_user/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="<?= base_url()?>/assets_user/vendor/counterup/counterup.min.js"></script>
<script src="<?= base_url()?>/assets_user/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url()?>/assets_user/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?= base_url()?>/assets_user/js/main.js"></script>


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
                url: "<?php echo base_url(); ?>User/hitung_chat",
                method: "POST",
                data: {

                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    if(data.length >0 && data.length <10){                    
                    $("#notifchat").html(data.length);                    
                    for (i = 0; i < data.length; i++) {
                        var originalDate = data[i].created_at;
                        var formattedTime = originalDate.substr(0,10).split('-').reverse().join('-')+" "+originalDate.substr(11,5);
                        var message = data[i].message;
                        var hitung = message.length;
                        var batasHitung1 = message.substring(0, 30);
                        var batasChat = hitung > 30 ? batasHitung1+'...' : message;
                        html += '<a href="<?= base_url() ?>User/Change_Status_Chat/' + data[i].from + '"> <b> ' + data[i].nama + ' </b><br>' + batasChat +'<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + formattedTime + '<br>';
                    }
                    $('#list').html(html);                    
                    }
                    else if(data.length > 9){
                        $("#notifchat").html("9+");                                                
                        for (i = 0; i < data.length; i++) {
                            var originalDate = data[i].created_at;
                            var formattedTime = originalDate.substr(0,10).split('-').reverse().join('-')+" "+originalDate.substr(11,5);
                            var message = data[i].message;
                            var hitung = message.length;
                            var batasHitung1 = message.substring(0, 30);
                            var batasChat = hitung > 30 ? batasHitung1+'...' : message;
                            html += '<a href="<?= base_url() ?>User/Change_Status_Chat/' + data[i].from + '"> <b> ' + data[i].nama + ' </b><br>' + batasChat +'<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + formattedTime + '<br>';
                    }
                    $('#list').html(html);                    
                    }                    
                    else if(data.length<=0){
                    var html = '';
                    html = '<center><p style="margin-top:100px;">Anda belum memiliki pesan</p></center>'
                    $('#list').html(html);
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
                        var oDate = data[i].send_time;
                        var Ftime = oDate.substr(0,10).split('-').reverse().join('-')+" "+oDate.substr(11,5);
                        var topik = data[i].topik;
                        var hitung = topik.length;
                        var batas1 = topik.substring(0, 30);
                        var batas = hitung > 30 ? batas1+'...' : topik;
                        html += '<a href="<?=base_url()?>User/Change_Status_Jawaban/'+data[i].id_forum+'"><b>'+data[i].nama+'</b><br>'+batas+'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '+ Ftime +'</a>';
                    }
                    $('#listf').html(html);
                    }
                    else if(data.length > 9){
                    $("#notifforum").html("9+");                    
                    for (i = 0; i < data.length; i++) {
                        var oDate = data[i].send_time;
                        var Ftime = oDate.substr(0,10).split('-').reverse().join('-')+" "+oDate.substr(11,5);
                        var topik = data[i].topik;
                        var hitung = topik.length;
                        var batas1 = topik.substring(0, 30);
                        var batas = hitung > 30 ? batas1+'...' : topik;
                        html += '<a href="<?=base_url()?>User/Change_Status_Jawaban/'+data[i].id_forum+'"><b>'+data[i].nama+'</b><br>'+batas+'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '+ Ftime +'</a>';
                    }
                    $('#listf').html(html);
                    }
                    else if(data.length <= 0){                    
                    var html = '';
                    html = '<center><p style="margin-top:100px;">Belum ada notifikasi</p></center>'
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
                            html += '<div class="kotakSatu"><div class="card border-info mb-3"><div class="card-header"><b>'+data[i].nama+'    </b><span class="badge badge-light" style="background-color:red; color: white">'+data[i].total+'</span></div><div class="card-body text-info"><div class="card-text" style="text-align:justify;width:75%;padding:5px;"><img src="<?= base_url()?>upload/profil/'+data[i].foto+'" style="width:110px;height:140px;float:left; margin:0 10px 4px 0;" /><br><b>Kategori Tutor :</b>'+data[i].nama_kategori+'<br><b>Tahun Masuk :</b> '+data[i].tahun_masuk+'</div><a href="<?= base_url();?>User/Change_Status_Chat/'+data[i].id_mahasiswa+'"style="float:right;color:#007bff; bottom: 0;right:0; padding: 15px; position: absolute;"><i class="fa fa-envelope" aria-hidden="true"></i> Chat</a></div></div>';
                        }                                        
                        if(data[i].total==0 && data[i].foto!=null){   
                            html += '<div class="kotakSatu"><div class="card border-info mb-3"><div class="card-header"><b>'+data[i].nama+'    </b></div><div class="card-body text-info"><div class="card-text" style="text-align:justify;width:75%;padding:5px;"><img src="<?= base_url()?>upload/profil/'+data[i].foto+'" style="width:110px;height:140px;float:left; margin:0 10px 4px 0;" /><br><b>Kategori Tutor :</b>'+data[i].nama_kategori+'<br><b>Tahun Masuk :</b> '+data[i].tahun_masuk+'</div><a href="<?= base_url();?>User/Change_Status_Chat/'+data[i].id_mahasiswa+'"style="float:right;color:#007bff; bottom: 0;right:0; padding: 15px; position: absolute;"><i class="fa fa-envelope" aria-hidden="true"></i> Chat</a></div></div>';
                        }
                        if(data[i].total==0 && data[i].foto==null){   
                            html += '<div class="kotakSatu"><div class="card border-info mb-3"><div class="card-header"><b>'+data[i].nama+'    </b></div><div class="card-body text-info"><div class="card-text" style="text-align:justify;width:75%;padding:5px;"><img src="<?= base_url()?>upload/profil/user.png" style="width:110px;height:140px;float:left; margin:0 10px 4px 0;" /><br><b>Kategori Tutor :</b>'+data[i].nama_kategori+'<br><b>Tahun Masuk :</b> '+data[i].tahun_masuk+'</div><a href="<?= base_url();?>User/Change_Status_Chat/'+data[i].id_mahasiswa+'"style="float:right;color:#007bff; bottom: 0;right:0; padding: 15px; position: absolute;"><i class="fa fa-envelope" aria-hidden="true"></i> Chat</a></div></div>';
                        }                                        
                        if(data[i].total!=0 && data[i].foto==null){   
                            html += '<div class="kotakSatu"><div class="card border-info mb-3"><div class="card-header"><b>'+data[i].nama+'    </b><span class="badge badge-light" style="background-color:red; color: white">'+data[i].total+'</span></div><div class="card-body text-info"><div class="card-text" style="text-align:justify;width:75%;padding:5px;"><img src="<?= base_url()?>upload/profil/user.png" style="width:110px;height:140px;float:left; margin:0 10px 4px 0;" /><br><b>Kategori Tutor :</b>'+data[i].nama_kategori+'<br><b>Tahun Masuk :</b> '+data[i].tahun_masuk+'</div><a href="<?= base_url();?>User/Change_Status_Chat/'+data[i].id_mahasiswa+'"style="float:right;color:#007bff; bottom: 0;right:0; padding: 15px; position: absolute;"><i class="fa fa-envelope" aria-hidden="true"></i> Chat</a></div></div>';
                        }                                        
                    }
                    $('#listprichat').html(html);
                }
            });
        }, 1000);
    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var location = window.location.pathname;
        var id_user = location.substring(location.lastIndexOf('/')+1);
        var baseUri = location.substring(location.lastIndexOf('/'));
        var arrayPath = window.location.pathname.split('/');
        if(arrayPath[3]=="Chat") {
            setInterval(() => {
                $.post("<?php echo base_url(); ?>User/bacaChat",{
                    id_user : id_user
                }).done(function(data){
                    $('#border_rounded_user').html(data);
                    $('#border_rounded_user').scrollTop($('#border_rounded_user')[0].scrollHeight);
                });                
            }, 1000);
        }
    })
</script>
</body>
</html>