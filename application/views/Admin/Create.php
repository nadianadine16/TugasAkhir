<style>
.info{
background-color: #e7f3fe;
border-left: 6px solid #2196F3;
padding-left: 10px;
padding-top: 20px;
padding-bottom: 20px;
}
</style>
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="<?= base_url();?>/Admin/index" style="color:#088ccf;">Home</a> <span class="bread-slash">/</span></li>
                                <li><a href="<?= base_url();?>/Admin/Data_Mahasiswa" style="color:#088ccf;">Data Mahasiswa</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Import Data Mahasiswa</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                <center><h4>Import Data Mahasiswa</h4></center>
                <?php if (validation_errors()): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo validation_errors(); ?>
                </div>
                <?php endif; ?>                          
                    <div class="info">
                    <p><strong>Petunjuk Import File Excel.</strong></p>
                    1. Download Template File Excel di bawah<br>
                    2. Isikan Seluruh Data Mahasiswa yang akan di Import Sesuai Template<br>
                    3. Upload File Excel<br>
                    </div><br>  

                    <label class="col-form-label text-md-left">Template Import Excel :</label><br>    
                    <a href="<?= base_url('assets_admin/File/Template.xlsx')?>"><button type="button" class="btn btn-primary"><i class="fa fa-download edu-avatar" aria-hidden="true"></i>  Download </button></a><br><br>
                    

                    <form method="POST" action="<?= site_url('Admin/excel') ?>" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                        <label class="col-form-label text-md-left">Upload File</label> 
                                            <input type="file" class="form-control" name="file" accept=".xls, .xlsx">
                                            <div class="mt-1">
                                                <span class="text-secondary"style="color:#808080;">Format File: .xls, xlsx <br>Maks. 2 MB</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <div class="form-group mb-0">
                                <button type="submit" name="import" class="btn btn-primary"><i class="fa fa-upload mr-1"></i> Import</button> 
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>