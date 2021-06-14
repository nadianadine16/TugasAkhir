<!-- Static Table End -->

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
    
    <script src="<?= base_url()?>/assets/bootstrap/jquery/jquery3.js"></script>
    <script src="<?= base_url()?>/assets/bootstrap/popper/popper.js"></script>
    <script src="<?= base_url()?>/assets/bootstrap/js/bootstrap.js"></script>
    <script src="<?= base_url()?>/assets/summernote/summernote-bs4.js"></script>
    <script>
        $(document).ready(function(){
            $('#summernote').summernote({
                height: "200px",
                toolbar: [                  
                  ['font', ['bold', 'underline', 'clear']],
                  ['fontname', ['fontname']],
                  ['para', ['ul', 'ol', 'paragraph']],                  
                  ['insert', ['link']],                  
                ],
                // callbacks: {
                //     onImageUpload: function(image) {
                //         uploadImage(image[0]);
                //     },
                //     onMediaDelete : function(target) {
                //         deleteImage(target[0].src);
                //     }
                //     // .note-group-select-from-files {
                //     //   display: none;
                //     //   }
                // }
            });            
        });

    </script>
     <script>
        $(document).ready(function(){
            $('#summernoteForum').summernote({
                height: "300px",
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

    </script>
</body>

</html>