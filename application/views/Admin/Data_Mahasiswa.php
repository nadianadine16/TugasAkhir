<script type="text/javascript" language="JavaScript">
    function konfirmasi()
    {
        tanya = confirm("Apakah Anda yakin akan menghapus data?");
        if (tanya == true) return true;
        else return false;
    }
 </script>
<!-- Mobile Menu end -->
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                            <li><a href="<?= base_url();?>/Admin/index" style="color:#088ccf;">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Data Mahasiswa</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <center><h1>Data <span class="table-project-n">Mahasiswa</span></h1></center>
                        </div>
                    </div>
                    <?= $this->session->flashdata('message');?>
                    <a href="<?= base_url()?>/Admin/Tambah_Data_Mahasiswa" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">Tambah Mahasiswa</span>
                    </a>
                    <a href="<?= site_url('Admin/Create') ?>" class="btn btn-primary mb-3"><i class="fa fa-upload mr-1"></i> Import Data Mahasiswa</a>
                    <a class="btn btn-danger mb-3" style="float:right" href="#" data-toggle="modal" data-target="#PrimaryModalalert"><i class="fa fa-trash-o"></i>  Hapus Mahasiswa</a>                    
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                            </div>                            
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true"   data-show-refresh="true" data-key-events="true"  data-resizable="true" data-cookie="true"
                            data-cookie-id-table="saveId"  data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="no">No</th>
                                        <th data-field="nim">Nim</th>
                                        <th data-field="nama">Nama</th>
                                        <th data-field="jenis_kelamin">Jenis Kelamin</th>
                                        <th data-field="prodi">Program Studi</th>
                                        <th data-field="tahun_angkatan">Tahun Angkatan</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($mahasiswa as $m):?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$m["nim"];?></td>
                                        <td><?=$m["nama"];?></td>
                                        <td><?=$m["jenis_kelamin"];?></td>
                                        <td><?=$m["prodi"];?></td>
                                        <td><?=$m["tahun_masuk"];?></td>
                                        <td class="datatable-ct">
                                            <a href="<?= base_url();?>Admin/Detail_Data_Mahasiswa/<?=$m['id_mahasiswa'];?>" class="pd-setting-ed"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="<?= base_url();?>Admin/Edit_Data_Mahasiswa/<?=$m['id_mahasiswa'];?>" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            <a onclick="return konfirmasi()" href="<?= base_url();?>Admin/Hapus_Data_Mahasiswa/<?=$m['id_mahasiswa'];?>" class="pd-setting-ed" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>     
                                </tbody>
                            </table>                            
                        </div>
                    </div>
                </div>
            </div>
            <div id="PrimaryModalalert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-close-area modal-close-df">
                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                        </div>
                        <div class="modal-body">
                            <h3>Hapus Mahasiswa</h3>
                            <p>Hapus mahasiswa berdasarkan tahun angkatan</p><br><br>
                            <form action="<?=base_url('Admin/Hapus_tahun_masuk')?>" method="post">
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="form-group">
                                            <label>Tahun Angkatan</label>
                                            <select class="form-control custom-select-value" name="tahun_masuk">
                                                <?php $no=1; foreach($tahun_angkatan as $ta):?>
                                                <option value="<?= $ta['tahun_masuk'];?>" selected><?php echo $ta['tahun_masuk']?></option>												
                                                <?php endforeach;?>   
                                            </select>
                                        </div>
                                    </div>
                                </div>                                                        
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                        <div class="login-horizental">
                                            <button class="btn btn-danger login-submit-cs" type="submit" style="float:right">Hapus</button>
                                        </div>
                                    </div>
                                </div>                                                        
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>