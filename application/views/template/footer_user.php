    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    </body>
</html>
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

<!-- <script src="<?= base_url()?>/assets/bootstrap/jquery/jquery3.js"></script>
<script src="<?= base_url()?>/assets/bootstrap/popper/popper.js"></script>
<script src="<?= base_url()?>/assets/bootstrap/js/bootstrap.js"></script>
<script src="<?= base_url()?>/assets/summernote/summernote-bs4.js"></script> -->
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
                    var html1 = '';
                    var i;
                    $("#notifchat").html(data.length);
                    for (i = 0; i < data.length; i++) {
                        html1 += '<a href="<?= base_url() ?>User/Change_Status_Chat/' + data[i].from + '"> <b> ' + data[i].nama + ' </b><br>' + data[i].message +'<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + data[i].created_at + '<br>';
                    }
                    $('#list').html(html);
                    }
                    else if(data.hitung > 9){
                        $("#notifchat").html("9+");
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
