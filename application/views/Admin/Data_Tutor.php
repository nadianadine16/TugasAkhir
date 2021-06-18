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
                                <li><span class="bread-blod">Data Tutor</span></li>
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
                            <center><h1>Data <span class="table-project-n">Tutor</span></h1></center>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true"   data-show-refresh="true" data-key-events="true"  data-resizable="true" data-cookie="true"
                            data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="No">No</th>
                                        <th data-field="NIM">NIM</th>
                                        <th data-field="Nama">Nama</th>
                                        <th data-field="Prodi">Prodi</th>
                                        <th data-field="Kelas">Kelas</th>
                                        <th data-field="Action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($tutor as $m):?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$m["nim"];?></td>
                                        <td><?=$m["nama"];?></td>
                                        <td><?=$m["prodi"];?></td>
                                        <td><?=$m["kelas"];?></td>
                                        <td class="datatable-ct">
                                            <a href="<?= base_url();?>Admin/Detail_Data_Tutor/<?=$m['id_tutor'];?>" class="pd-setting-ed"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a onclick="return konfirmasi()" href="<?= base_url();?>Admin/Hapus_Data_Tutor/<?=$m['id_tutor'];?>" class="pd-setting-ed" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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