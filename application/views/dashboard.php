
   <?php
		
		foreach($kendaraanactive as $dataactive){
            $nopol[] = $dataactive->nopol;
			$nama_jenis[] = $dataactive->nama_jenis;
            $jml[] = $dataactive->jml;
        }

?>

<div class="table-responsive">
    <aside class="right-side">
                <!-- Content Header (Page header) -->
            

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php
                                         echo $jumlahkendaraan[0]->jumlahkendaraan;
                                        ?>
                                    </h3>
                                    <p>
                                        JUMLAH KENDARAAN
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-truck"></i>
                                </div>
                                <a  class="small-box-footer">
                                    &nbsp;
                                </a> 
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3> 
                                        <?php
                                         echo $jumlahchasis[0]->jumlahchasis;
                                        ?><sup style="font-size: 20px"></sup>
                                    </h3>
                                    <p>
                                        JUMLAH CHASIS
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a  class="small-box-footer">
                                    &nbsp;
                                </a> 
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                       <?php
                                         echo $jumlahdriverk[0]->jumlahdriverk;
                                        ?>
                                    </h3>
                                    <p>
                                        DRIVER KENDARAAN KECIL
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a  class="small-box-footer">
                                    &nbsp;
                                </a> 
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        <?php
                                         echo $jumlahdriverb[0]->jumlahdriverb;
                                        ?>
                                    </h3>
                                    <p>
                                        DRIVER KENDARAAN BESAR
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a  class="small-box-footer">
                                    &nbsp;
                                </a> 
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->

                    <!-- top row -->
                    <div class="row">
                        <div class="col-xs-12 connectedSortable">
                            
                        </div><!-- /.col -->
                    </div>
                    </section><!-- /.content -->
    </aside><!-- /.right-side -->
    
    <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        STATISTIK
                        <small>RIWAYAT TUJUAN PERJALANAN PADA SURAT JALAN</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Blank page</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- interactive chart -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <h3 class="box-title">Interactive Area Chart</h3>
                                    <div class="box-tools pull-right">
                                        Real time
                                        <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                                            <button type="button" class="btn btn-default btn-xs active" data-toggle="on">On</button>                                            
                                            <button type="button" class="btn btn-default btn-xs" data-toggle="off">Off</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-body">
                                     
                                 
                                </div><!-- /.box-body-->
                            </div><!-- /.box -->

                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Line chart -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <h3 class="box-title">Bar Chart</h3>
                                </div>
                                <div class="box-body">
                               <!--      <canvas id="bar-chart" style="height: 211px;" height="211"></canvas> -->
                                </div><!-- /.box-body-->
                            </div><!-- /.box -->

                            <!-- Area chart -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <h3 class="box-title">Full Width Area Chart</h3>
                                </div>
                                <div class="box-body">
                               <!--      <canvas id="radar-chart" style="height: 211px;" height="211"></canvas> -->
                                </div><!-- /.box-body-->
                            </div><!-- /.box -->

                        </div><!-- /.col -->

                        <div class="col-md-6">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <h3 class="box-title">Line Chart</h3>
                                </div>
                                <div class="box-body">
                             <!--   <canvas id="line-chart" style="height: 211px;" height="211"></canvas> -->
                                </div>
                            </div>

                    
                            <div class="box box-primary">
                                <div class="box-header">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <h3 class="box-title">Donut Chart</h3>
                                </div>
                                <div class="box-body">
                                   <!--  <canvas id="doughnut-chart" style="height: 211px;" height="211"></canvas> -->
                                </div>
                            </div>
                        </div>
                    </div><!-- /.row -->
                </section><!-- /.content -->

            </aside>
</div>

    

           <script src="<?= base_url() ?>assets/js/Chart.min.js"></script>

           <script>
    
                new Chart(document.getElementById("bar-chart"), {
                    type: 'bar',
                    height: 50,
                    data: {
                      // labels: <?php echo json_encode($nama_nilai);?>,
                      labels: <?php echo "[]";?>,
                      datasets: [
                        {
						  label: 'Porsentase',
                          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                          barPercentage: 1,
                            barThickness: 6,
                            maxBarThickness: 8,
                            minBarLength: 0,
                          // data: <?php echo json_encode($nama_rata);?>//
                          data: <?php echo "[]";?>
                        },
						{
						  label: 'Jumlah',
                          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                          barPercentage: 1,
                            barThickness: 6,
                            maxBarThickness: 8,
                            minBarLength: 0,
                          data: <?php echo "[]";?>
                          // data: <?php echo json_encode($jmltest);?>//
                        }
                      ]
                    },
                    options: {
                      legend: { display: false },
                      title: {
                        display: true,
                        text: 'STATISTIK RIWAYAT TUJUAN SURAT JALAN'
                      },
                      scales: {
                            xAxes: [{
                                ticks: {
                                    min: 0, // Edit the value according to what you need,
                                    stepSize: 5
                                }
                            }],
                            yAxes: [{
                                display: true,
                                ticks: {
                                    beginAtZero: true,
                                    steps: 5,
                                    stepValue: 1,
                                    min:0
                                }
                            }]
                      }
                    }
                });

                new Chart(document.getElementById("line-chart"), {
                    type: 'bar',
                    height: 50,
                    data: {
                      // labels: <?php echo json_encode($nama_u);?>,
                      labels: <?php echo "[]";?>,
                      datasets: [
                        {
                          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                          barPercentage: 1,
                            barThickness: 6,
                            maxBarThickness: 8,
                            minBarLength: 0,
                          // data: <?php echo json_encode($jmlinspeksi);?> //
                            data: <?php echo "[]";?>
                        }
                      ]
                    },
                    options: {
                      legend: { display: false },
                      title: {
                        display: true,
                        text: 'STATISTIK RIWAYAT JUMLAH PERJALANAN DRIVER'
                      },
                      scales: {
                            xAxes: [{
                                ticks: {
                                    min: 0, // Edit the value according to what you need,
                                    stepSize: 5
                                }
                            }],
                            yAxes: [{
                                display: true,
                                ticks: {
                                    beginAtZero: true,
                                    steps: 5,
                                    stepValue: 1,
                                    min:0
                                }
                            }]
                      }
                    }
                });

                new Chart(document.getElementById("radar-chart"), {
                    type: 'radar',
                    height: 50,
                    data: {
                      //labels: <?php echo json_encode($nama_mlevel);?>,
                      labels: ["NORMAL","RUSAK BERAT","RUSAK RINGAN"],

                      datasets: [
                        {
                          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                          barPercentage: 1,
                            barThickness: 6,
                            maxBarThickness: 8,
                            minBarLength: 0,
                           data: <?php echo json_encode($jumlah);?>
                        }
                      ]
                    },
                    options: {
                      legend: { display: false },
                      title: {
                        display: true,
                        text: 'STATISTIK KONDISI KENDARAAN'
                      },
                      scales: {
                            xAxes: [{
                                ticks: {
                                    min: 0, // Edit the value according to what you need,
                                    stepSize: 5
                                }
                            }],
                            yAxes: [{
                                display: true,
                                ticks: {
                                    beginAtZero: true,
                                    steps: 5,
                                    stepValue: 1,
                                    min:0
                                }
                            }]
                      }
                    }
                });

                new Chart(document.getElementById("doughnut-chart"), {
                    type: 'doughnut',
                    height: 50,
                    data: {
              //        labels: <?php echo json_encode($nama_keterangan);?>,
                      labels: ["MORMAL","RUSAK BERAT","RUSAK RINGAN"],  
                      datasets: [
                        {
                          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                          barPercentage: 1,
                            barThickness: 6,
                            maxBarThickness: 8,
                            minBarLength: 0,
                          data: <?php echo json_encode($jml);?>
                        }
                      ]
                    },
                    options: {
                      legend: { display: false },
                      title: {
                        display: true,
                        text: 'STATISTIK KONDISI KENDARAAN'
                      },
                      scales: {
                            xAxes: [{
                                ticks: {
                                    min: 0, // Edit the value according to what you need,
                                    stepSize: 5
                                }
                            }],
                            yAxes: [{
                                display: true,
                                ticks: {
                                    beginAtZero: true,
                                    steps: 5,
                                    stepValue: 1,
                                    min:0
                                }
                            }]
                      }
                    }
                });
                
            </script>
