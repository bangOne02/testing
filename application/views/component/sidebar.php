<aside class="main-sidebar">
  <section class="sidebar"> 
    <?php
          $username = $this->session->userdata('username');
    ?>
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/img2/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo strtoupper($username); ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> ONLINE</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <ul class="sidebar-menu" data-widget="tree">
        
        <?php
          $admin_name = $this->session->userdata('admin_name');
          if ($admin_name == 'userkendaraan')
          { ?>
              <li class="header">MENU UTAMA</li>
             
              <li>
                <a href="<?php echo base_url('Kendaraan/requestKendaraan'); ?>">
                  <i class="fa fa-files-o"></i><span>LIST PERMINTAAN</span>
                  <span class="pull-right-container">
                    <span class="label label-primary pull-right">REQ</span>
                  </span>
                </a>
              </li><li>
                <a href="<?php echo base_url('Kendaraan/jadwalKeberangkatan'); ?>">
                  <i class="fa fa-files-o"></i><span>JADWAL KENDARAAN</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
              </li>
              <li class="header">KELUAR APLIKASI</li>
              <li>
                <a href="<?php echo base_url('Login/logout/') ?>">
                  <i class="fa fa-sign-out"></i><span>LOG OUT</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
              </li>
          <?php  
          } else if ($admin_name == 'accounting' or $admin_name == 'checker1' or $admin_name == 'checker2' or $admin_name == 'adminbiaya')
          { ?>
              <li class="header" style="color: #898989;">MENU UTAMA</li>
              <li>
                <a href="<?php echo base_url('Dashboard'); ?>">
                  <i class="fa fa-dashboard"></i><span>&nbsp;MENU DASHBOARD</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
              </li>
              <?php
              if ($admin_name == 'adminbiaya')
              { ?>
                  <li>
                    <a href="<?php echo base_url('SuratJalan/biaya/') ?>">
                      <i class="fa fa-money"></i><span>&nbsp;MENU BIAYA</span>
                      <span class="pull-right-container">
                        <small class="label pull-right bg-green">$</small>
                      </span>
                    </a>
                  </li>
                 <!-- <li>
                    <a href="<?php echo base_url('SuratJalan/biayaCrab/') ?>">
                      <i class="fa fa-money"></i><span>&nbsp;MENU BIAYA CRAB</span>
                      <span class="pull-right-container">
                        <small class="label pull-right bg-green">$</small>
                      </span>
                    </a>
                  </li> -->
              <?php
              } else
              { ?>
                  <li>
                    <a href="<?php echo base_url('SuratJalan/biayaKecil/') ?>">
                      <i class="fa fa-money"></i><span>&nbsp;KENDARAAN KECIL</span>
                      <span class="pull-right-container">
                        <small class="label pull-right bg-green">$</small>
                      </span>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo base_url('SuratJalan/biayaBesar/') ?>">
                      <i class="fa fa-money"></i><span>&nbsp;KENDARAAN BESAR</span>
                      <span class="pull-right-container">
                        <small class="label pull-right bg-green">$</small>
                      </span>
                    </a>
                  </li>
              <?php  
              }
              ?> 
              <li>
                    <a href="<?php echo base_url('Users/gantiPassword/') ?>">
                      <i class="fa fa-money"></i><span>&nbsp;GANTI PASSWORD</span>
                      <span class="pull-right-container">
                        <small class="label pull-right bg-green"></small>
                      </span>
                    </a>
              </li>
              <li class="header">MENU LAPORAN</li>
              <li>
                <a href="<?php echo base_url('Laporan'); ?>">
                  <i class="fa fa-files-o"></i><span>&nbsp;FORM MOBILISASI</span>
                  <span class="pull-right-container">
                    <span class="label label-primary pull-right">0</span>
                  </span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('Laporan/biaya'); ?>">
                  <i class="fa fa-files-o"></i><span>&nbsp;REPORT BIAYA-BIAYA</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
              </li>
              
              <li class="header">KELUAR APLIKASI</li>
              <li>
                <a href="<?php echo base_url('Login/logout/') ?>" >
                  <i class="fa fa-sign-out"></i><span>&nbsp;LOG OUT</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
              </li>
          <?php
          } else if ($admin_name == 'admin')
          { ?>
              <li class="header">MAIN NAVIGATION</li>
              <li>
                <a href="<?php echo base_url('Dashboard'); ?>">
                  <i class="fa fa-dashboard"></i><span>&nbsp;MENU DASHBOARD</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
              </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-edit"></i><span>&nbsp;FORM MOBILISASI</span>
                  <span class="pull-right-container">
                    <span class="label label-primary pull-right">4</span>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url('SuratJalan'); ?>"><i class="fa fa-circle-o"></i> CREATED FORM</a></li>
                  <li><a href="<?php echo base_url('SuratJalan/suratJalanNew'); ?>"><i class="fa fa-circle-o"></i> FORM NEW</a></li>
                  <li><a href="<?php echo base_url('SuratJalan/suratJalanProses'); ?>"><i class="fa fa-circle-o"></i> FORM PROCES</a></li>
                  <li><a href="<?php echo base_url('SuratJalan/history'); ?>"><i class="fa fa-circle-o"></i> HISTORICAL FORM</a></li>
                </ul>
              </li>
              <li>
                <a href="<?php echo base_url('SuratJalan/biaya/') ?>">
                  <i class="fa fa-money"></i><span>&nbsp;MENU BIAYA</span>
                  <span class="pull-right-container">
                    <small class="label pull-right bg-green">$</small>
                  </span>
                </a>
              </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-pie-chart"></i><span>&nbsp;SCHEDULING</span>
                  <span class="pull-right-container">
                    <span class="label label-primary pull-right">2</span>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url('Kendaraan/requestKendaraan'); ?>"><i class="fa fa-circle-o"></i>LIST PERMINTAAN</a></li>
                  <li><a href="<?php echo base_url('Kendaraan/jadwalKeberangkatan'); ?>"><i class="fa fa-circle-o"></i>JADWAL KENDARAAN</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-laptop"></i><span>&nbsp;DATA MASTER</span>
                  <span class="pull-right-container">
                    <span class="label label-primary pull-right">9</span>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url('Kendaraan/dataJenis'); ?>"><i class="fa fa-circle-o"></i>JENIS KENDARAAN</a></li>
                  <li><a href="<?php echo base_url('Kendaraan/dataOperasional'); ?>"><i class="fa fa-circle-o"></i>MOBIL OPERASIONAL</a></li>
                  <li><a href="<?php echo base_url('Kendaraan'); ?>"><i class="fa fa-circle-o"></i>MASTER KENDARAAN</a></li>
                  <li><a href="<?php echo base_url('Diagram/dataChasis'); ?>"><i class="fa fa-circle-o"></i>MASTER CHASIS</a></li>
                  <li><a href="<?php echo base_url('Diagram/dataContainer'); ?>"><i class="fa fa-circle-o"></i>MASTER CONTAINER</a></li>
                  <li><a href="<?php echo base_url('Diagram/dataPlant'); ?>"><i class="fa fa-circle-o"></i>LIST DATA PLANT</a></li>
                  <li><a href="<?php echo base_url('Diagram/dataDepo'); ?>"><i class="fa fa-circle-o"></i>LIST DATA DEPO</a></li>
                  <li><a href="<?php echo base_url('Diagram/dataPelabuhan'); ?>"><i class="fa fa-circle-o"></i>LIST DATA PELABUHAN</a></li>
                  <li><a href="<?php echo base_url('Diagram/dataSopir'); ?>"><i class="fa fa-circle-o"></i>DATA DRIVER</a></li>
                </ul>
              </li>
              <li>
                <a href="<?php echo base_url('Kendaraan/histCont'); ?>">
                  <i class="fa fa-book"></i><span>&nbsp;HISTORY CONTAINER</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
              </li>
              <li class="header">MENU LAPORAN</li>
              <li>
                <a href="<?php echo base_url('Laporan'); ?>">
                  <i class="fa fa-files-o"></i><span>&nbsp;FORM MOBILISASI</span>
                  <span class="pull-right-container">
                    <span class="label label-primary pull-right">0</span>
                  </span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('Laporan/biaya'); ?>">
                  <i class="fa fa-files-o"></i><span>&nbsp;REPORT BIAYA-BIAYA</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
              </li>
              
              <li class="header">KELUAR APLIKASI</li>
              <li>
                    <a href="<?php echo base_url('Users/gantiPassword/') ?>">
                      <i class="fa fa-money"></i><span>&nbsp;GANTI PASSWORD</span>
                      <span class="pull-right-container">
                        <small class="label pull-right bg-green"></small>
                      </span>
                    </a>
              </li>
              <li>
                <a href="<?php echo base_url('Login/logout/') ?>">
                  <i class="fa fa-sign-out"></i><span>&nbsp;LOG OUT</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
              </li>
          <?php   
          } else 
          {?>
              <li class="header">MAIN NAVIGATION</li>
              <li>
                <a href="<?php echo base_url('Dashboard'); ?>">
                  <i class="fa fa-dashboard"></i><span>&nbsp;MENU DASHBOARD</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
              </li>
              <li class="treeview" class="active">
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-edit"></i><span>&nbsp;FORM MOBILISASI</span>
                    <span class="pull-right-container">
                      <span class="label label-primary pull-right">3</span>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <?php
                    if ($admin_name == 'adminsecurity')
                    {
                    ?>
                      <li><a href="<?php echo base_url('SuratJalan/suratJalanRev'); ?>"><i class="fa fa-circle-o"></i>REVISI FORM</a></li>
                      <!-- <li><a href="<?php echo base_url('SuratJalan/history'); ?>"><i class="fa fa-circle-o"></i>REVISI KEDATANGAN</a></li> -->
                    <?php
                    } else
                    { ?>
                      <li><a href="<?php echo base_url('SuratJalan/suratJalanNew'); ?>"><i class="fa fa-circle-o"></i> KEBERANGKATAN</a></li>
                      <li><a href="<?php echo base_url('SuratJalan/suratJalanProses'); ?>"><i class="fa fa-circle-o"></i> KEDATANGAN</a></li>
                      <li><a href="<?php echo base_url('SuratJalan/history'); ?>"><i class="fa fa-circle-o"></i> HISTORICAL FORM</a></li>
                    <?php
                    }
                    ?>
                  </ul>
                </li>
              </li>
              <?php
              if ($admin_name != 'adminsecurity')
              {
              ?>
              <li>
                <a href="<?php echo base_url('Proses/index/?proces=1'); ?>">
                  <i class="fa fa-sign-out"></i><span>&nbsp;SCAN BERANGKAT</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('Proses/index/?proces=2'); ?>">
                  <i class="fa fa-sign-out"></i><span>&nbsp;SCAN DATANG</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
              </li>
             
              <li>
                <a href="<?php echo base_url('Kendaraan/histCont'); ?>">
                  <i class="fa fa-book"></i><span>&nbsp;HISTORY CONTAINER</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
              </li>
              <li class="header">MENU LAPORAN</li>
              <li>
                <a href="<?php echo base_url('Laporan'); ?>">
                  <i class="fa fa-files-o"></i><span>&nbsp;FORM MOBILISASI</span>
                  <span class="pull-right-container">
                    <span class="label label-primary pull-right">0</span>
                  </span>
                </a>
              </li>
             
              <?php
              }
              ?>
              <li class="header">KELUAR APLIKASI</li>
              <li>
                    <a href="<?php echo base_url('Users/gantiPassword/') ?>">
                      <i class="fa fa-money"></i><span>&nbsp;GANTI PASSWORD</span>
                      <span class="pull-right-container">
                        <small class="label pull-right bg-green"></small>
                      </span>
                    </a>
              </li>
              <li>
                <a href="<?php echo base_url('Login/logout/') ?>">
                  <i class="fa fa-sign-out"></i><span>&nbsp;LOG OUT</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
              </li>
          <?php 
          }
        ?>
      
    </ul>
  </section>
</aside>