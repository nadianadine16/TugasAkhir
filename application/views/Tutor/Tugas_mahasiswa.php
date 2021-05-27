<script type="text/javascript" language="JavaScript">
    function konfirmasi()
    {
        tanya = confirm("Anda Yakin Akan Menghapus Data?");
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
                                <li><a href="<?= base_url();?>/Tutor/index" style="color:#088ccf;">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Tugas Mahasiswa</span></li>
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
                            <center><h1>Data <span class="table-project-n">Tugas Mahasiswa yang Belum Diverifikasi</span></h1></center>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                            data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="id">No</th>
                                        <th data-field="nim" data-editable="true">NIM</th>
                                        <th data-field="nama_mahasiswa" data-editable="true">Nama Mahasiswa</th>
                                        <th data-field="nama_materi" data-editable="true">Judul Konten</th>
                                        <th data-field="tugas">Link Pengumpulan</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($tugas as $t):?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$t["nim"];?></td>
                                        <td><?=$t["nama"];?></td>
                                        <td><?=$t["judul"];?></td>
                                        <td><a href=http://<?=$t["tugas"];?>><?=$t["tugas"];?></td>
                                        <td class="datatable-ct">
                                            <a href="<?= base_url();?>Tutor/Verifikasi_Tugas/<?=$t['id_tugas'];?>" class="pd-setting-ed"><i class="fa fa-check" aria-hidden="true"></i></a>
                                            <!-- <a onclick="return konfirmasi()" href="<?= base_url();?>Tutor/Hapus_Tugas/<?=$t['id_tugas'];?>" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></a> -->
                                            <a href="<?= base_url();?>Tutor/Revisi/<?=$t['id_tugas'];?>" class="pd-setting-ed"><i class="fa fa-times" aria-hidden="true"></i></a>
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

<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <center><h1>Data <span class="table-project-n">Revisi Tugas Mahasiswa</span></h1></center>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                            data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="id">No</th>
                                        <th data-field="nim" data-editable="true">NIM</th>
                                        <th data-field="nama_mahasiswa" data-editable="true">Nama Mahasiswa</th>
                                        <th data-field="judul_konten" data-editable="true">Judul Konten</th>
                                        <th data-field="revisi" data-editable="true">Revisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($revisi_tugas as $rt):?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$rt["nim"];?></td>
                                        <td><?=$rt["nama"];?></td>
                                        <td><?=$rt["judul"];?></td>
                                        <td><?=$rt["revisi"];?></td>
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

<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <center><h1>Data <span class="table-project-n">Tugas Mahasiswa yang Telah Diverifikasi</span></h1></center>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                            data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="id">No</th>
                                        <th data-field="nim" data-editable="true">NIM</th>
                                        <th data-field="nama_mahasiswa" data-editable="true">Nama Mahasiswa</th>
                                        <th data-field="nama_materi" data-editable="true">Judul Konten</th>
                                        <th data-field="tugas" data-editable="true">Link Pengumpulan</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($tugasverif as $tv):?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$tv["nim"];?></td>
                                        <td><?=$tv["nama"];?></td>
                                        <td><?=$tv["judul"];?></td>
                                        <td><?=$tv["tugas"];?></td>
                                        <td class="datatable-ct">
                                            <a onclick="return konfirmasi()" href="<?= base_url();?>Tutor/Hapus_Tugas/<?=$tv['id_tugas'];?>" class="pd-setting-ed" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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