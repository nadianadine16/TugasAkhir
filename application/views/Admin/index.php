<br>
<div class="widgets-programs-area">
    <div class="container-fluid">
        <center><h3 style="margin-top:7px;">- Dashboard Admin -</h3><br></center>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="charts-single-pro responsive-mg-b-30">
                    <div class="alert-title">
                        <h2><center>5 Mahasiswa Paling Aktif Login</center></h2>            
                    </div>
                    <div id="bar1-chart">
                        <canvas id="myChart"></canvas>
                        <?php
                            $nama_mahasiswa= "";
                            $jumlah=null;
                            foreach ($hasil as $item)
                            {
                                $n=$item->nama;
                                $nama_mahasiswa .= "'$n'". ", ";
                                $jum=$item->hitung;
                                $jumlah .= "$jum". ", ";
                            }
                            ?>
                    </div>
                </div>
            </div>  
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="charts-single-pro responsive-mg-b-30">
                    <div class="alert-title">
                        <h2><center>5 Tutor Paling Aktif Login</center></h2>            
                    </div>
                    <div id="bar1-chart">
                        <canvas id="myChartTutor"></canvas>
                        <?php
                            $nama_tutor= "";
                            $jumlah_tutor=null;
                            foreach ($hasil_tutor as $h)
                            {
                                $na=$h->nama;
                                $nama_tutor .= "'$na'". ", ";
                                $j=$h->hasilTutor;
                                $jumlah_tutor .= "$j". ", ";
                            }
                            ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="margin-top:30px;">
                <div class="hpanel widget-int-shape responsive-mg-b-30">
                    <div class="panel-body">
                        <div class="stats-title pull-left">
                            <h4>Mahasiswa</h4>
                        </div>
                        <div class="stats-icon pull-right">
                            <i class="educate-icon educate-student icon-wrap"></i>
                        </div>
                        <div class="m-t-xl widget-cl-1">
                            <h1 class="text-success">Total : <?=$mahasiswa?></h1>
                            <small>
                                Terdiri dari seluruh mahasiswa Jurusan Teknologi Informasi Politeknik Negeri Malang.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="margin-top:30px;">
                <div class="hpanel widget-int-shape responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <div class="panel-body">
                        <div class="stats-title pull-left">
                            <h4>Tutor</h4>
                        </div>
                        <div class="stats-icon pull-right">
                            <i class="educate-icon educate-professor"></i>
                        </div>
                        <div class="m-t-xl widget-cl-3">
                            <h1 class="text-warning">Total : <?=$tutor?></h1>
                            <small>
                                Mahasiswa yang menjadikan diri sebagai pemberi materi sekaligus pengajar dalam aplikasi.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="margin-top:30px;">
                <div class="hpanel widget-int-shape res-tablet-mg-t-30 dk-res-t-pro-30">
                    <div class="panel-body">
                        <div class="stats-title pull-left">
                            <h4>Kategori Materi</h4>
                        </div>
                        <div class="stats-icon pull-right">
                            <i class="educate-icon educate-data-table icon-wrap"></i>
                        </div>
                        <div class="m-t-xl widget-cl-4">
                            <h1 class="text-danger">Total : <?=$kategori_materi?></h1>
                            <small>
                                Jenis materi yang akan di bahas oleh setiap tutor yang telah terdaftar dalam aplikasi.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="margin-top:30px;">
                <div class="hpanel widget-int-shape res-tablet-mg-t-30 dk-res-t-pro-30">
                    <div class="panel-body">
                        <div class="stats-title pull-left">
                            <h4>Kritik dan Saran</h4>
                        </div>
                        <div class="stats-icon pull-right">
                            <i class="educate-icon educate-message icon-wrap"></i>
                        </div>
                        <div class="m-t-xl widget-cl-4">
                            <h1 class="text-danger">Total : <?=$kritik_saran?></h1>
                            <small>
                                Pesan untuk meningkatkan kinerja layanan aplikasi yang dikirimkan oleh mahasiswa dan tutor.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="margin-top:30px;">
                <div class="hpanel widget-int-shape res-tablet-mg-t-30 dk-res-t-pro-30">
                    <div class="panel-body">
                        <div class="stats-title pull-left">
                            <h4>Forum</h4>
                        </div>
                        <div class="stats-icon pull-right">
                            <i class="educate-icon educate-course icon-wrap"></i>
                        </div>
                        <div class="m-t-xl widget-cl-4">
                            <h1 class="text-danger">Total : <?=$forum?></h1>
                            <small>
                                Forum merupakan media diskusi baik antar mahasiswa satu dengan lainnya maupun tutor.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br>
    
<script>
Chart.defaults.global.legend.display = false;
    var ctx = document.getElementById('myChart').getContext('2d');
    var barchart4 = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: [<?php echo $nama_mahasiswa?>],
			datasets: [{
                label: 'Dataset 1',
				data: [<?php echo $jumlah?>],
				borderWidth: 1,
				yAxisID: "y-axis-1",
                backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
				],
				borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],            				
            }]
		},
		options: {
			responsive: true,
			title:{
				// display:true,
				// text:"Bar Chart Multi Axis"
			},
			tooltips: {
                callbacks: {
                    label: function(tooltipItem) {
                            return tooltipItem.yLabel;
                    }
                }
				// mode: 'index',
				// intersect: false
			},
			scales: {
                xAxes: [{
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        display: false                    
                    }
                }],
				yAxes: [{  
                    gridLines: {
                        display: false
                    },    
                    ticks: {
                        beginAtZero:true,
					},                    
					type: "linear",
					display: true,
					position: "left",
					id: "y-axis-1",				
				}],
			}
		}
	});    
</script>
<script>
Chart.defaults.global.legend.display = false;
    var ctx = document.getElementById('myChartTutor').getContext('2d');
    var barchart4 = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: [<?php echo $nama_tutor?>],
			datasets: [{
                label: 'Dataset 1',
				data: [<?php echo $jumlah_tutor?>],
				borderWidth: 1,
				yAxisID: "y-axis-1",
                backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
				],
				borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],            				
            }]
		},
		options: {
			responsive: true,
			title:{
				// display:true,
				// text:"Bar Chart Multi Axis"
			},
			tooltips: {
                callbacks: {
                    label: function(tooltipItem) {
                            return tooltipItem.yLabel;
                    }
                }
				// mode: 'index',
				// intersect: false
			},
			scales: {
                xAxes: [{
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        display: false                    
                    }
                }],
				yAxes: [{  
                    gridLines: {
                        display: false
                    },    
                    ticks: {
                        beginAtZero:true,
					},                    
					type: "linear",
					display: true,
					position: "left",
					id: "y-axis-1",				
				}],
			}
		}
	});    
</script>
