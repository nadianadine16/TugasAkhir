<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;">
            </div>
        </div>
    </div>
</div>

<div class="widgets-programs-area">
    <div class="container-fluid">
        <center><h3>- Dashboard Tutor -</h3><br></center>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">    
                <div class="charts-single-pro responsive-mg-b-30">
                    <div class="alert-title">
                        <h2><center>5 Konten Paling Favorit</center></h2>            
                    </div>
                    <div id="bar1-chart">
                        <canvas id="myChart"></canvas>
                        <?php
                            $nama_konten= "";
                            $jumlah=null;
                            foreach ($hitung_konten as $h)
                            {
                                $na=$h->judul;
                                $nama_konten .= "'$na'". ", ";
                                $j=$h->hasil;
                                $jumlah .= "$j". ", ";
                            }
                            ?>
                    </div>
                </div>            
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">    
                <div class="charts-single-pro responsive-mg-b-30">
                    <div class="alert-title">
                        <h2><center>5 Konten Paling Favorit</center></h2>            
                    </div>
                    <div id="bar1-chart">
                        <canvas id="myChart2"></canvas>
                        <?php
                            $nama_konten= "";
                            $jumlah=null;
                            foreach ($hitung_konten as $h)
                            {
                                $na=$h->judul;
                                $nama_konten .= "'$na'". ", ";
                                $j=$h->hasil;
                                $jumlah .= "$j". ", ";
                            }
                            ?>
                    </div>
                </div>            
            </div>    
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="margin-top:30px;">
                <div class="hpanel widget-int-shape responsive-mg-b-30">
                    <div class="panel-body">
                        <div class="stats-title pull-left">
                            <h4>Materi</h4>
                        </div>
                        <div class="stats-icon pull-right">
                            <i class="educate-icon educate-data-table icon-wrap"></i>
                        </div>
                        <div class="m-t-xl widget-cl-1">
                            <h1 class="text-success">Total : <?=$materi?></h1>
                            <small>
                                Materi merupakan judul dari topik yang akan dibahas, didalamnya terdapat banyak konten.
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
                            <i class="educate-icon educate-interface icon-wrap"></i>
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
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" style="margin-top:30px;">
                <div class="hpanel widget-int-shape responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <div class="panel-body">
                        <div class="stats-title pull-left">
                            <h4>Konten</h4>
                        </div>
                        <div class="stats-icon pull-right">
                            <i class="educate-icon educate-data-table"></i>
                        </div>
                        <div class="m-t-xl widget-cl-3">
                            <h1 class="text-warning">Total : <?=$konten?></h1>
                            <small>
                                Konten merupakan detailmateri yang diberikan secara lebih rinci berupa video dan soal latihan evaluasi mahasiswa.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    Chart.defaults.global.legend.display = false;
    var ctx = document.getElementById('myChart').getContext('2d');
    var barchart4 = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: [<?php echo $nama_konten?>],
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
    var ctx2 = document.getElementById('myChart2').getContext('2d');
    var barchart42 = new Chart(ctx2, {
		type: 'bar',
		data: {
			labels: [<?php echo $nama_konten?>],
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