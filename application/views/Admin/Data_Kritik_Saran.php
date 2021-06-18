<script type="text/javascript" language="JavaScript">
    function konfirmasi()
    {
        tanya = confirm("Apakah Anda yakin akan menghapus data?");
        if (tanya == true) return true;
        else return false;
    }
 </script>

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
                                <li><span class="bread-blod">Kritik & Saran</span></li>
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
                            <center><h1>Kritik dan Saran</span></h1></center>
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
                                        <th data-field="no">No</th>
                                        <th data-field="nim">NIM</th>
                                        <th data-field="nama">Nama</th>
                                        <th data-field="subject">Subject</th>
                                        <th data-field="kritik_saran">Kritik Saran</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($kritik_saran as $k):?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$k["nim"];?></td>
                                        <td><?=$k["nama"];?></td>
                                        <td><?=$k["subject"];?></td>
                                        <td><?=$k["kritik_saran"];?></td>
                                        <td>
                                        <a onclick="return konfirmasi()" href="<?= base_url();?>admin/hapus_kritik_saran/<?=$k['id_kritiksaran'];?>" class="pd-setting-ed" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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