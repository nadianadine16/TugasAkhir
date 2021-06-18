<style>
      .kartu {
        width: 96%;
        margin-top: 30px;
        margin-left: 20px;
            box-shadow: 0 0.25rem 0.75rem rgba(0,0,0,.03);
    transition: all .3s;
           background-color: #ffffff;
    border: solid 2px #dadada;
    /* border-top-right-radius: 10px;
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px; */
      } 
      .kartu:hover {
        background-color: #fcfcfc;
        /* border: solid 8px #4fd47e; */
        border: solid 2px #dadada;
    /* border-top-right-radius: 10px;
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px; */
      }
      .foto {
            padding: 30px 30px 30px;
    /* margin-left: 0px; */
    /* margin-top: 10px; */
      }
      tbody {
          /* padding: 30px 30px 30px;
          font-size: 20px; */
          /* margin-bottom:20px; */
    /* font-size: 20px;
    font-weight: 300; */
    /* color:white; */
}
.biodata {
    margin-top: 30px;
}
    </style>

<!-- Mobile Menu end -->
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
                                <li><a href="<?= base_url();?>/Admin/Data_Tutor" style="color:#088ccf;">Data Tutor</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Detail Tutor</span>
                                </li>
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
        <?php foreach($detail_tutor as $t):?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-24">
                <div class="profile-info-inner">
                <center><h3>Detail Tutor</h3></center>
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="foto">
                                    <?php if($t["foto"] == NULL){?>
                                        <img src="<?= base_url('upload/profil/user.png')?>" alt="" style="margin-left:-20px;width:200px;height:200px;"/>
                                    <?php } else {?>
                                        <img src="<?= base_url('upload/profil/'.$t['foto'])?>" alt="" />
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-md-8 kertas-biodata">
                                <div class="biodata">
                                    <table width="100%" style="margin-left:20px;">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td style="font-weight:bold; font-size:20px;"><?=$t["nama"];?></td>
                                                            </tr>
                                                            <tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr>
                                                            <tr>
                                                                <td class="textt">NIM</td>
                                                                <td>:</td>
                                                                <td><?=$t["nim"];?></td>
                                                            </tr>
                                                            <tr><td>&nbsp;</td></tr>
                                                            <tr>
                                                                <td class="textt">Jenis Kelamin</td>
                                                                <td>:</td>
                                                                <td><?=$t["jenis_kelamin"];?></td>
                                                            </tr>
                                                            <tr><td>&nbsp;</td></tr>
                                                            <tr>
                                                                <td class="textt">Kategori</td>
                                                                <td>:</td>
                                                                <td><?=$t["nama_kategori"];?></td>
                                                            </tr>
                                                            <tr><td>&nbsp;</td></tr>
                                                            <tr>
                                                                <td class="textt">Jurusan</td>
                                                                <td>:</td>
                                                                <td><?=$t["jurusan"];?></td>
                                                            </tr>
                                                            <tr><td>&nbsp;</td></tr>
                                                            <tr>
                                                                <td valign="top" class="textt">Program Studi</td>
                                                                <td valign="top">:</td>
                                                                <td><?=$t["prodi"];?></td>
                                                            </tr>
                                                            <tr><td>&nbsp;</td></tr>
                                                            <tr>
                                                                <td valign="top" class="textt">Kelas</td>
                                                                <td valign="top">:</td>
                                                                <td><?=$t["kelas"];?></td>
                                                            </tr>
                                                            <tr><td>&nbsp;</td></tr>
                                                            <tr>
                                                                <td valign="top" class="textt">Tahun Masuk</td>
                                                                <td valign="top">:</td>
                                                                <td><?=$t["tahun_masuk"];?></td>
                                                            </tr>
                                                            <tr><td>&nbsp;</td></tr>
                                                            <tr>
                                                                <td valign="top" class="textt">Alamat Github</td>
                                                                <td valign="top">:</td>
                                                                <?php if($t["github"] != NULL) {?>
                                                                    <td><?=$t["github"];?></td>
                                                                <?php } else {?>
                                                                    <td>Belum Ditambahkan</td>
                                                                <?php }?>
                                                            </tr>
                                                            <tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr>
                                                            <tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>