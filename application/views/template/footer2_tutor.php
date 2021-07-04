    <!-- jquery
		============================================ -->
        <script src="<?= base_url()?>/assets_admin/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?= base_url()?>/assets_admin/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?= base_url()?>/assets_admin/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?= base_url()?>/assets_admin/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?= base_url()?>/assets_admin/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?= base_url()?>/assets_admin/js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="<?= base_url()?>/assets_admin/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?= base_url()?>/assets_admin/js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?= base_url()?>/assets_admin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?= base_url()?>/assets_admin/js/scrollbar/mCustomScrollbar-active.js"></script>

    <script src="<?= base_url()?>/assets_admin/js/summernote/summernote.min.js"></script>
    <script src="<?= base_url()?>/assets_admin/js/summernote/summernote-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="<?= base_url()?>/assets_admin/js/metisMenu/metisMenu.min.js"></script>
    <script src="<?= base_url()?>/assets_admin/js/metisMenu/metisMenu-active.js"></script>
    <!-- data table JS
		============================================ -->
    <script src="<?= base_url()?>/assets_admin/js/data-table/bootstrap-table.js"></script>
    <script src="<?= base_url()?>/assets_admin/js/data-table/tableExport.js"></script>
    <script src="<?= base_url()?>/assets_admin/js/data-table/data-table-active.js"></script>
    <script src="<?= base_url()?>/assets_admin/js/data-table/bootstrap-table-editable.js"></script>
    <script src="<?= base_url()?>/assets_admin/js/data-table/bootstrap-editable.js"></script>
    <script src="<?= base_url()?>/assets_admin/js/data-table/bootstrap-table-resizable.js"></script>
    <script src="<?= base_url()?>/assets_admin/js/data-table/colResizable-1.5.source.js"></script>
    <script src="<?= base_url()?>/assets_admin/js/data-table/bootstrap-table-export.js"></script>
    <!--  editable JS
		============================================ -->
    <script src="<?= base_url()?>/assets_admin/js/editable/jquery.mockjax.js"></script>
    <script src="<?= base_url()?>/assets_admin/js/editable/mock-active.js"></script>
    <script src="<?= base_url()?>/assets_admin/js/editable/select2.js"></script>
    <script src="<?= base_url()?>/assets_admin/js/editable/moment.min.js"></script>
    <script src="<?= base_url()?>/assets_admin/js/editable/bootstrap-datetimepicker.js"></script>
    <script src="<?= base_url()?>/assets_admin/js/editable/bootstrap-editable.js"></script>
    <script src="<?= base_url()?>/assets_admin/js/editable/xediable-active.js"></script>
    <!-- Chart JS
		============================================ -->
    <script src="<?= base_url()?>/assets_admin/js/chart/jquery.peity.min.js"></script>
    <script src="<?= base_url()?>/assets_admin/js/peity/peity-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="<?= base_url()?>/assets_admin/js/tab.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?= base_url()?>/assets_admin/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?= base_url()?>/assets_admin/js/main.js"></script>
    
    <script type="text/javascript">
    $(document).ready(function() {
      setInterval(() => {
        $.ajax({
          url: "<?php echo base_url(); ?>Tutor/hitung_chat_tutor",
          method: "POST",
          data: {},
          async: false,
          dataType: 'json',
          success: function(data) {
            if(data.length >0 && data.length <10){                    
              $("#notifchat").html(data.length);                    
              var html = '';
              var i;
              for (i = 0; i < data.length; i++) {
                var originalDate = data[i].created_at;
                var formattedTime = originalDate.substr(0,10).split('-').reverse().join('-')+" "+originalDate.substr(11,5);

                var message = data[i].message;
                var hitung = message.length;
                var batasHitung1 = message.substring(0, 30);
                var batasChat = hitung > 30 ? batasHitung1+'...' : message;
                // var newDate = Date("d-m-Y", strtotime(originalDate));
                html += '<a href="<?= base_url() ?>Tutor/Change_Status_Chat_Tutor/' + data[i].from +'" style="background-color:#f4fbfe;width:100%;margin-bottom:-15px; "><div class="message-content" style="padding-top:15px;padding-bottom:15px;padding-left:15px;padding-right:15px;"><b>' + data[i].nama + '</b><br>' + batasChat + '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+formattedTime+'</div></a>';
              }
              $('#chatnot').html(html);
            }
            else if(data.length > 9){
              $("#notifchat").html("9+");                                                          
              var html = '';
              var i;
              for (i = 0; i < data.length; i++) {
                var originalDate = data[i].created_at;
                var formattedTime = originalDate.substr(0,10).split('-').reverse().join('-')+" "+originalDate.substr(11,5);   

                var message = data[i].message;
                var hitung = message.length;
                var batasHitung1 = message.substring(0, 30);
                var batasChat = hitung > 30 ? batasHitung1+'...' : message;             
                html += '<a href="<?= base_url() ?>Tutor/Change_Status_Chat_Tutor/' + data[i].from +'" style="background-color:#f4fbfe;width:88%;margin-bottom:-15px; "><div class="message-content" style="padding-top:15px;padding-bottom:15px;padding-left:15px;padding-right:15px;"><b>' + data[i].nama + '</b><br>' + data[i].message + '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+formattedTime+'</div></a>';
              }
              $('#chatnot').html(html);
            }
            else if(data.length<1){
              // $("#notifchat").html(" ");   
              var html = '';
              html = '<p style="margin-top:100px;margin-left:70px">Anda belum memiliki pesan</p>'
              $('#chatnot').html(html);
            }
              
          }
        });
      }, 1000);
    })
</script>
    <script>
        $(document).ready(function(){
            $('#summernote').summernote({
                height: "200px",
                toolbar: [                  
                  ['font', ['bold', 'underline', 'clear']],
                  ['fontname', ['fontname']],
                  ['para', ['ul', 'ol', 'paragraph']],                  
                  ['insert', ['link']],                  
                ]
            });            
        });

    </script>
     <!-- <script>
        $(document).ready(function(){
            $('#summernoteForum').summernote({
                height: "200px",
                toolbar: [                  
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
                    url: "<?php echo site_url('Tutor/upload_image')?>",
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
                    url: "<?php echo site_url('Tutor/delete_image')?>",
                    cache: false,
                    success: function(response) {
                        console.log(response);
                    }
                });
            }

        });
    </script> -->
    <script type="text/javascript">
    $(document).ready(function() {
        setInterval(() => {
            $.ajax({
                url: "<?php echo base_url(); ?>Tutor/notif2",
                method: "POST",
                data: {
                },
                async: false,
                dataType: 'json',
                success: function(data) {                    
                      var html = '';
                      var i;                      
                      for (i = 0; i < data.length; i++) {
                        if (data[i].strength != 0) {                        
                          html += '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="width:99%;"><br><div class="courses-inner res-mg-b-30"><div class="courses-title"><h2>'+data[i].nama+'&nbsp;&nbsp;<span class="badge badge-light" style="background-color:red; color:white;">'+data[i].strength+'</span></h2></div><div class="course-des"><p><b>NIM:</b> '+data[i].nim+'</p><p><b>Jurusan:</b>'+data[i].jurusan+'</p><p><b>Prodi:</b>'+data[i].prodi+'</p><a type="button" href="<?= base_url();?>Tutor/change_status_chat_tutor/'+data[i].id_mahasiswa+'" class="btn btn-primary" style="float:right;margin-top:-6%;">Chat</a></div></div></div>  ';                
                        }
                        if (data[i].strength == 0) {                        
                          html += '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="width:99%;"><br><div class="courses-inner res-mg-b-30"><div class="courses-title"><h2>'+data[i].nama+'&nbsp;&nbsp;</h2></div><div class="course-des"><p><b>NIM:</b> '+data[i].nim+'</p><p><b>Jurusan:</b>'+data[i].jurusan+'</p><p><b>Prodi:</b>'+data[i].prodi+'</p><a type="button" href="<?= base_url();?>Tutor/change_status_chat_tutor/'+data[i].id_mahasiswa+'" class="btn btn-primary" style="float:right;margin-top:-6%;">Chat</a></div></div></div>  ';                
                        }
                      }
                      $('#list2').html(html);                    
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
                $.post("<?php echo base_url(); ?>Tutor/bacaChatTutor",{
                    id_user : id_user
                }).done(function(data){
                    $('#border_rounded_tutor').html(data);
                    $('#border_rounded_tutor').scrollTop($('#border_rounded_tutor')[0].scrollHeight);
                });                
            }, 1000);
        }
    })
</script>
<script>     
    $(document).ready(function(){
        $('#summernoteSoal').summernote({
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
                url: "<?php echo site_url('Tutor/upload_image')?>",
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "POST",
                success: function(url) {
                    $('#summernoteSoal').summernote("insertImage", url);
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
                url: "<?php echo site_url('Tutor/delete_image')?>",
                cache: false,
                success: function(response) {
                    console.log(response);
                }
            });
        }

    });
</script>
</body>
