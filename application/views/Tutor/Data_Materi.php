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
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Data Materi</span></li>
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
                            <center><h1>Data <span class="table-project-n">Materi Tutor</span></h1></center>
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
                                        <th data-field="nama_materi" data-editable="true">Judul Materi</th>
                                        <th data-field="kategori_materi" data-editable="true">Kategori Materi</th>
                                        <th data-field="deskripsi" data-editable="true">Deskripsi</th>
                                        <th data-field="video" data-editable="true">Video</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($materi as $m):?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$m["nama_materi"];?></td>
                                        <td><?=$m["nama_kategori"];?></td>
                                        <td><?=$m["deskripsi"];?></td>
                                        <td><?=$m["video"];?></td>
                                        <!-- <td>
                                        <video width="400px" height="350px" controls>
                                            <source src="<?= base_url('upload/materi/'.$m["video"])?>" type="video/mp4">
                                        </video>
                                        </td> -->
                                        <td class="datatable-ct">
                                            <a href="<?= base_url();?>Tutor/Edit_Materi/<?=$m['id_materi'];?>" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            <a onclick="return konfirmasi()" href="<?= base_url();?>Tutor/Hapus_Materi/<?=$m['id_materi'];?>" class="pd-setting-ed" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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