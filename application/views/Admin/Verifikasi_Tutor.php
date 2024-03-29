<script type="text/javascript" language="JavaScript">
 function konfirmasi()
 {
 tanya = confirm("Anda Yakin Akan Menghapus Data ?");
 if (tanya == true) return true;
 else return false;
 }</script>
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
                                <li><span class="bread-blod">Data Calon Tutor</span></li>
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
                            <center><h1>Data <span class="table-project-n">Tutor Belum Terverifikasi</span></h1></center>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true"   data-show-refresh="true" data-key-events="true"  data-resizable="true" data-cookie="true"
                            data-cookie-id-table="saveId"  data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Kategori Materi</th>
                                        <th>Prodi</th>
                                        <th>File</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($tutor as $m):?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$m["nim"];?></td>
                                        <td><?=$m["nama"];?></td>
                                        <td><?=$m["nama_kategori"];?></td>
                                        <td><?=$m["prodi"];?></td>
                                        <td><a href="<?= base_url('upload/surat_pernyataan/'.$m["surat_pernyataan"])?>" style="color:#3495eb;"><?=$m["surat_pernyataan"];?></a></td>
                                        <td class="datatable-ct">
                                        <form action ="<?= base_url();?>Admin/Status_Pendaftaran/<?=$m["id_tutor"];?>" method="post">
                                        <input type="hidden" name="id_tutor" value="<?= $m["id_tutor"];?>">
                                        <input type="hidden" name="status" value="2">
                                        <button class="btn btn-success" type="submit" name="action" value="terima"><i class="fa fa-check"></i></button>
                                        <button class="btn btn-danger" type="submit" name="action" value="tolak"><i class="fa fa-times"></i></button>
                                        </form>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>     
                                </tbody>
                            </table>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>