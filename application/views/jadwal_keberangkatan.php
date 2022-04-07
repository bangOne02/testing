
<div class="col-md-12">
	
          <div class="nav-tabs-custom">
          	<div class="box-header with-border" style="height: 39px;background-color: #222d32;">
			    <div class="box-tools pull-right">
			    	
		        </div>
			</div>
			<div class="box box-primary panel-hidden box-solid" style="display: block;">
      <div class="box-header" style="height: 39px;background: white;color: black;">
              <div class="table-wrapper" style="display: flex;margin-left: 0px;border: inset;align-items: center;position: initial;">
                    <span class="date-label" style="
    font-family: 'FontAwesome';margin-top: 1px;">&nbsp;&nbsp;&nbsp;TANGGAL &nbsp; </span><input autocomplete="off" class="date" data-date-format="dd-mm-yyyy" type="date" id="tanggal" style="height: initial;margin-top: 2px;margin-bottom: 2px;" />
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <button type="button" id="btn-tgl" data-toggle="modal" style="padding: 0px 14px;">SUBMIT</button> 						            
              </div>
        </div> 

				<div class="table-responsive" style="border: 0px;">
       


					<table width="100%" id="table_1_berangkat" class="table table-bordered display nowrap table-striped dataTable" style="width: 100%">
        
					<tbody>
              <div class="calendar">

  <div class="timeline" style="
    white-space: nowrap;
    background-color: #87ceeb;
    padding-left: 12px;
    padding-right: 12px;
    border: inset;
    top: 59px;
    left: 0px;
    position: absolute;
    /* width: 100px; */
    height: 1337px; 
    ">
    <div class="spacer"></div>
    <div class="time-marker" style="font-weight: bold;color: white;">5 AM</div>
    <div class="time-marker" style="font-weight: bold;color: white;">6 AM</div>
    <div class="time-marker" style="font-weight: bold;color: white;">7 AM</div>
    <div class="time-marker" style="font-weight: bold;color: white;">8 AM</div>
    <div class="time-marker" style="font-weight: bold;color: white;">9 AM</div>
    <div class="time-marker" style="font-weight: bold;color: white;">10 AM</div>
    <div class="time-marker" style="font-weight: bold;color: white;">11 AM</div>
    <div class="time-marker" style="font-weight: bold;color: white;">12 AM</div>
    <div class="time-marker" style="font-weight: bold;color: white;">1 PM</div>
    <div class="time-marker" style="font-weight: bold;color: white;">2 PM</div>
    <div class="time-marker" style="font-weight: bold;color: white;">3 PM</div>
    <div class="time-marker" style="font-weight: bold;color: white;">4 PM</div>
    <div class="time-marker" style="font-weight: bold;color: white;">5 PM</div>
    <div class="time-marker" style="font-weight: bold;color: white;">6 PM</div>
    <div class="time-marker" style="font-weight: bold;color: white;">7 PM</div>
    <div class="time-marker" style="font-weight: bold;color: white;">8 PM</div>
    <div class="time-marker" style="font-weight: bold;color: white;">9 PM</div>
    <div class="time-marker" style="font-weight: bold;color: white;">10 PM</div>
  </div>
  <div class="days" style="
    padding-left: 37px;
">

    <div class="day mon" >
      <div class="date" style="
    background-color: skyblue;
    /* border: 23px; */
    border: inset;
    align-items: center;
    justify-content: center;
">
        <p class="date-num"  style="white-space: nowrap;color: azure;"><center style="
    font-weight: bold;
    font-size: initial;
    color: azure;
">&nbsp;&nbsp;KENDARAAN01<br><?php echo $kendaraan1->nopol; ?>&nbsp;&nbsp;</center></p>
      </div>
      <div class="events" style="border: inset;">


          <?php 
            foreach ($kend1 as $row) { 
                $staty = 0;
                foreach ($conf as $row2) { 
                  if ($row->start >= $row2->value )
                  {
                    $start = $row2->stats;
                  }
            
                  if ($row2->value >= $row->finish && $staty == 0)
                  {
                      $finish = $row2->stats;
                      $staty = 1;
                  }
                } 
                ?>

                <div class="event start-<?php echo $start; ?> end-<?php echo $finish; ?> securities" style="
                <?php
                    if ($row->proses == 0)
                    {
                      echo "background-color: #81ff81;";
                    } else if ($row->proses == 1)
                    {
                      echo "background-color: #fdff91;";
                    } else if ($row->proses == 2)
                    {
                      echo "background-color: #ffaf9d;";
                    } else
                    {
                      echo "background-color: #ffffff;";
                    }
                  ?>
                ">

                  <p class="title" style="font-size: 10px;padding-bottom: 0px;
                  padding-left: 5px;
                  padding-top: 3px;
                  font-weight: 600;
                  padding-right: 5px;white-space: nowrap;
                  <?php
                    if ($row->proses == 0)
                    {
                      echo "background-color: #81ff81;";
                    } else if ($row->proses == 1)
                    {
                      echo "background-color: #fdff91;";
                    } else if ($row->proses == 2)
                    {
                      echo "background-color: #ffaf9d;";
                    } else
                    {
                      echo "background-color: #ffffff;";
                    }
                  ?>
                  ">
                      <?php
                          echo "USER : ".strtoupper($row->user);
                          echo "<br>";
                          echo "DRIVER : ".strtoupper($row->nama_mdriver)." / NO HP. ".strtoupper($row->no_hp);
                          echo "<br>";
                          echo "KEPERLUAN : ".strtoupper($row->keterangan);
                          echo "<br>";
                          echo "EXTENSION : ".strtoupper($row->ext);


                      ?>
                  </p>
                </div>
          <?php      
            } 
          ?>
     
      </div>
    
    </div>


    <div class="day mon">
      <div class="date" style="
    background-color: skyblue;
    /* border: 23px; */
    border: inset;
    align-items: center;
    justify-content: center;
">
<p class="date-num"  style="white-space: nowrap;color: azure;"><center style="
    font-weight: bold;
    font-size: initial;
    color: azure;
">&nbsp;&nbsp;KENDARAAN02<br><?php echo $kendaraan2->nopol; ?>&nbsp;&nbsp;</center></p>
      </div>
      <div class="events" style="border: inset;">


          <?php 
            foreach ($kend2 as $row) { 
                $staty = 0;
                foreach ($conf as $row2) { 
                  if ($row->start >= $row2->value )
                  {
                    $start = $row2->stats;
                  }
            
                  if ($row2->value >= $row->finish && $staty == 0)
                  {
                      $finish = $row2->stats;
                      $staty = 1;
                  }
                } 
                ?>

                <div class="event start-<?php echo $start; ?> end-<?php echo $finish; ?> securities" style="
                <?php
                    if ($row->proses == 0)
                    {
                      echo "background-color: #81ff81;";
                    } else if ($row->proses == 1)
                    {
                      echo "background-color: #fdff91;";
                    } else if ($row->proses == 2)
                    {
                      echo "background-color: #ffaf9d;";
                    } else
                    {
                      echo "background-color: #ffffff;";
                    }
                  ?>
                ">
                <p class="title" style="font-size: 10px;padding-bottom: 0px;
                  padding-left: 5px;
                  padding-top: 3px;
                  font-weight: 600;
                  padding-right: 5px;white-space: nowrap;
                  <?php
                    if ($row->proses == 0)
                    {
                      echo "background-color: #81ff81;";
                    } else if ($row->proses == 1)
                    {
                      echo "background-color: #fdff91;";
                    } else if ($row->proses == 2)
                    {
                      echo "background-color: #ffaf9d;";
                    } else
                    {
                      echo "background-color: #ffffff;";
                    }
                  ?>
                  ">
                      <?php
                          echo "USER : ".strtoupper($row->user);
                          echo "<br>";
                          echo "DRIVER : ".strtoupper($row->nama_mdriver)." / NO HP. ".strtoupper($row->no_hp);
                          echo "<br>";
                          echo "KEPERLUAN : ".strtoupper($row->keterangan);
                          echo "<br>";
                          echo "EXTENSION : ".strtoupper($row->ext);


                      ?>
                  </p>
                </div>
          <?php      
            } 
          ?>
     
      </div>
    
    </div>

    <div class="day mon">
      <div class="date" style="
    background-color: skyblue;
    /* border: 23px; */
    border: inset;
    align-items: center;
    justify-content: center;
">
<p class="date-num"  style="white-space: nowrap;color: azure;"><center style="
    font-weight: bold;
    font-size: initial;
    color: azure;
">&nbsp;&nbsp;KENDARAAN03<br><?php echo $kendaraan3->nopol; ?>&nbsp;&nbsp;</center></p>
      </div>
      <div class="events" style="border: inset;">


          <?php 
            foreach ($kend3 as $row) { 
                $staty = 0;
                foreach ($conf as $row2) { 
                  if ($row->start >= $row2->value )
                  {
                    $start = $row2->stats;
                  }
            
                  if ($row2->value >= $row->finish && $staty == 0)
                  {
                      $finish = $row2->stats;
                      $staty = 1;
                  }
                } 
                ?>

                <div class="event start-<?php echo $start; ?> end-<?php echo $finish; ?> securities" style="
                <?php
                    if ($row->proses == 0)
                    {
                      echo "background-color: #81ff81;";
                    } else if ($row->proses == 1)
                    {
                      echo "background-color: #fdff91;";
                    } else if ($row->proses == 2)
                    {
                      echo "background-color: #ffaf9d;";
                    } else
                    {
                      echo "background-color: #ffffff;";
                    }
                  ?>
                ">
                <p class="title" style="font-size: 10px;padding-bottom: 0px;
                  padding-left: 5px;
                  padding-top: 3px;
                  font-weight: 600;
                  padding-right: 5px;white-space: nowrap;
                  <?php
                    if ($row->proses == 0)
                    {
                      echo "background-color: #81ff81;";
                    } else if ($row->proses == 1)
                    {
                      echo "background-color: #fdff91;";
                    } else if ($row->proses == 2)
                    {
                      echo "background-color: #ffaf9d;";
                    } else
                    {
                      echo "background-color: #ffffff;";
                    }
                  ?>
                  ">
                      <?php
                          echo "USER : ".strtoupper($row->user);
                          echo "<br>";
                          echo "DRIVER : ".strtoupper($row->nama_mdriver)." / NO HP. ".strtoupper($row->no_hp);
                          echo "<br>";
                          echo "KEPERLUAN : ".strtoupper($row->keterangan);
                          echo "<br>";
                          echo "EXTENSION : ".strtoupper($row->ext);


                      ?>
                  </p>
                </div>
          <?php      
            } 
          ?>
     
      </div>
    
    </div>

    <div class="day mon">
      <div class="date" style="
    background-color: skyblue;
    /* border: 23px; */
    border: inset;
    align-items: center;
    justify-content: center;
">
<p class="date-num"  style="white-space: nowrap;color: azure;"><center style="
    font-weight: bold;
    font-size: initial;
    color: azure;
">&nbsp;&nbsp;KENDARAAN04<br><?php echo $kendaraan4->nopol; ?>&nbsp;&nbsp;</center></p>
      </div>
      <div class="events" style="border: inset;">


          <?php 
            foreach ($kend4 as $row) { 
                $staty = 0;
                foreach ($conf as $row2) { 
                  if ($row->start >= $row2->value )
                  {
                    $start = $row2->stats;
                  }
            
                  if ($row2->value >= $row->finish && $staty == 0)
                  {
                      $finish = $row2->stats;
                      $staty = 1;
                  }
                }
                ?>

                <div class="event start-<?php echo $start; ?> end-<?php echo $finish; ?> securities" style="
                <?php
                    if ($row->proses == 0)
                    {
                      echo "background-color: #81ff81;";
                    } else if ($row->proses == 1)
                    {
                      echo "background-color: #fdff91;";
                    } else if ($row->proses == 2)
                    {
                      echo "background-color: #ffaf9d;";
                    } else
                    {
                      echo "background-color: #ffffff;";
                    }
                  ?>
                ">
                <p class="title" style="font-size: 10px;padding-bottom: 0px;
                  padding-left: 5px;
                  padding-top: 3px;
                  font-weight: 600;
                  padding-right: 5px;white-space: nowrap;
                  <?php
                    if ($row->proses == 0)
                    {
                      echo "background-color: #81ff81;";
                    } else if ($row->proses == 1)
                    {
                      echo "background-color: #fdff91;";
                    } else if ($row->proses == 2)
                    {
                      echo "background-color: #ffaf9d;";
                    } else
                    {
                      echo "background-color: #ffffff;";
                    }
                  ?>
                  ">
                      <?php
                          echo "USER : ".strtoupper($row->user);
                          echo "<br>";
                          echo "DRIVER : ".strtoupper($row->nama_mdriver)." / NO HP. ".strtoupper($row->no_hp);
                          echo "<br>";
                          echo "KEPERLUAN : ".strtoupper($row->keterangan);
                          echo "<br>";
                          echo "EXTENSION : ".strtoupper($row->ext);


                      ?>
                  </p>
                </div>
          <?php      
            } 
          ?>
     
      </div>
    
    </div>

    <div class="day mon">
      <div class="date" style="
    background-color: skyblue;
    /* border: 23px; */
    border: inset;
    align-items: center;
    justify-content: center;
">
<p class="date-num"  style="white-space: nowrap;color: azure;"><center style="
    font-weight: bold;
    font-size: initial;
    color: azure;
">&nbsp;&nbsp;KENDARAAN05<br><?php echo $kendaraan5->nopol; ?>&nbsp;&nbsp;</center></p>
      </div>
      <div class="events" style="border: inset;">


          <?php 
            foreach ($kend5 as $row) { 
                $staty = 0;
                foreach ($conf as $row2) { 
                  if ($row->start >= $row2->value )
                  {
                    $start = $row2->stats;
                  }
            
                  if ($row2->value >= $row->finish && $staty == 0)
                  {
                      $finish = $row2->stats;
                      $staty = 1;
                  }
                } 
                ?>

                <div class="event start-<?php echo $start; ?> end-<?php echo $finish; ?> securities" style="
                <?php
                    if ($row->proses == 0)
                    {
                      echo "background-color: #81ff81;";
                    } else if ($row->proses == 1)
                    {
                      echo "background-color: #fdff91;";
                    } else if ($row->proses == 2)
                    {
                      echo "background-color: #ffaf9d;";
                    } else
                    {
                      echo "background-color: #ffffff;";
                    }
                  ?>
                ">
                <p class="title" style="font-size: 10px;padding-bottom: 0px;
                  padding-left: 5px;
                  padding-top: 3px;
                  font-weight: 600;
                  padding-right: 5px;white-space: nowrap;
                  <?php
                    if ($row->proses == 0)
                    {
                      echo "background-color: #81ff81;";
                    } else if ($row->proses == 1)
                    {
                      echo "background-color: #fdff91;";
                    } else if ($row->proses == 2)
                    {
                      echo "background-color: #ffaf9d;";
                    } else
                    {
                      echo "background-color: #ffffff;";
                    }
                  ?>
                  ">
                      <?php
                          echo "USER : ".strtoupper($row->user);
                          echo "<br>";
                          echo "DRIVER : ".strtoupper($row->nama_mdriver)." / NO HP. ".strtoupper($row->no_hp);
                          echo "<br>";
                          echo "KEPERLUAN : ".strtoupper($row->keterangan);
                          echo "<br>";
                          echo "EXTENSION : ".strtoupper($row->ext);


                      ?>
                  </p>
                </div>
          <?php      
            } 
          ?>
     
      </div>
    
    </div>

    <div class="day mon">
      <div class="date" style="
    background-color: skyblue;
    /* border: 23px; */
    border: inset;
    align-items: center;
    justify-content: center;
">
<p class="date-num"  style="white-space: nowrap;color: azure;"><center style="
    font-weight: bold;
    font-size: initial;
    color: azure;
">&nbsp;&nbsp;KENDARAAN06<br><?php echo $kendaraan6->nopol; ?>&nbsp;&nbsp;</center></p>
      </div>
      <div class="events" style="border: inset;">


          <?php 
            foreach ($kend6 as $row) { 
                $staty = 0;
                foreach ($conf as $row2) { 
                  if ($row->start >= $row2->value )
                  {
                    $start = $row2->stats;
                  }
            
                  if ($row2->value >= $row->finish && $staty == 0)
                  {
                      $finish = $row2->stats;
                      $staty = 1;
                  }
                } 
                ?>

                <div class="event start-<?php echo $start; ?> end-<?php echo $finish; ?> securities" style="
                <?php
                    if ($row->proses == 0)
                    {
                      echo "background-color: #81ff81;";
                    } else if ($row->proses == 1)
                    {
                      echo "background-color: #fdff91;";
                    } else if ($row->proses == 2)
                    {
                      echo "background-color: #ffaf9d;";
                    } else
                    {
                      echo "background-color: #ffffff;";
                    }
                  ?>
                ">
                <p class="title" style="font-size: 10px;padding-bottom: 0px;
                  padding-left: 5px;
                  padding-top: 3px;
                  font-weight: 600;
                  padding-right: 5px;white-space: nowrap;
                  <?php
                    if ($row->proses == 0)
                    {
                      echo "background-color: #81ff81;";
                    } else if ($row->proses == 1)
                    {
                      echo "background-color: #fdff91;";
                    } else if ($row->proses == 2)
                    {
                      echo "background-color: #ffaf9d;";
                    } else
                    {
                      echo "background-color: #ffffff;";
                    }
                  ?>
                  ">
                      <?php
                          echo "USER : ".strtoupper($row->user);
                          echo "<br>";
                          echo "DRIVER : ".strtoupper($row->nama_mdriver)." / NO HP. ".strtoupper($row->no_hp);
                          echo "<br>";
                          echo "KEPERLUAN : ".strtoupper($row->keterangan);
                          echo "<br>";
                          echo "EXTENSION : ".strtoupper($row->ext);


                      ?>
                  </p>
                </div>
          <?php      
            } 
          ?>
     
      </div>
    
    </div>

    <div class="day mon">
      <div class="date" style="
    background-color: skyblue;
    /* border: 23px; */
    border: inset;
    align-items: center;
    justify-content: center;
">
<p class="date-num"  style="white-space: nowrap;color: azure;"><center style="
    font-weight: bold;
    font-size: initial;
    color: azure;
">&nbsp;&nbsp;KENDARAAN07<br><?php echo $kendaraan7->nopol; ?>&nbsp;&nbsp;</center></p>
      </div>
      <div class="events" style="border: inset;">


          <?php 
            foreach ($kend7 as $row) { 
                $staty = 0;
                foreach ($conf as $row2) { 
                  if ($row->start >= $row2->value )
                  {
                    $start = $row2->stats;
                  }
            
                  if ($row2->value >= $row->finish && $staty == 0)
                  {
                      $finish = $row2->stats;
                      $staty = 1;
                  }
                } 
                ?>

                <div class="event start-<?php echo $start; ?> end-<?php echo $finish; ?> securities" style="
                <?php
                    if ($row->proses == 0)
                    {
                      echo "background-color: #81ff81;";
                    } else if ($row->proses == 1)
                    {
                      echo "background-color: #fdff91;";
                    } else if ($row->proses == 2)
                    {
                      echo "background-color: #ffaf9d;";
                    } else
                    {
                      echo "background-color: #ffffff;";
                    }
                  ?>
                ">
                <p class="title" style="font-size: 10px;padding-bottom: 0px;
                  padding-left: 5px;
                  padding-top: 3px;
                  padding-right: 5px;white-space: nowrap;
                  font-weight: 600;
                  <?php
                    if ($row->proses == 0)
                    {
                      echo "background-color: #81ff81;";
                    } else if ($row->proses == 1)
                    {
                      echo "background-color: #fdff91;";
                    } else if ($row->proses == 2)
                    {
                      echo "background-color: #ffaf9d;";
                    } else
                    {
                      echo "background-color: #ffffff;";
                    }
                  ?>
                  ">
                      <?php
                          echo "USER : ".strtoupper($row->user);
                          echo "<br>";
                          echo "DRIVER : ".strtoupper($row->nama_mdriver)." / NO HP. ".strtoupper($row->no_hp);
                          echo "<br>";
                          echo "KEPERLUAN : ".strtoupper($row->keterangan);
                          echo "<br>";
                          echo "EXTENSION : ".strtoupper($row->ext);


                      ?>
                  </p>
                </div>
          <?php      
            } 
          ?>
     
      </div>
    
    </div>

    <div class="day mon">
      <div class="date" style="
    background-color: skyblue;
    /* border: 23px; */
    border: inset;
    align-items: center;
    justify-content: center;
">
        <p class="date-num" style="white-space: nowrap;color: azure;"><center style="
    font-weight: bold;
    font-size: initial;
    color: azure;
">&nbsp;&nbsp;GRAB/GOJEK&nbsp;&nbsp;</center></p>
      </div>
      <div class="events" style="border: inset;">
          <?php 
            foreach ($kend8 as $row) { 
                $staty = 0;
                foreach ($conf as $row2) { 
                  if ($row->start >= $row2->value )
                  {
                    $start = $row2->stats;
                  }
            
                  if ($row2->value >= $row->finish && $staty == 0)
                  {
                      $finish = $row2->stats;
                      $staty = 1;
                  }
                } 
                ?>

                <div class="event start-<?php echo $start; ?> end-<?php echo $finish; ?> securities" style="
                <?php
                    if ($row->proses == 0)
                    {
                      echo "background-color: #81ff81;";
                    } else if ($row->proses == 1)
                    {
                      echo "background-color: #fdff91;";
                    } else if ($row->proses == 2)
                    {
                      echo "background-color: #ffaf9d;";
                    } else
                    {
                      echo "background-color: #ffffff;";
                    }
                  ?>
                ">
                <p class="title" style="font-size: 10px;padding-bottom: 0px;
                  padding-left: 5px;
                  padding-top: 3px;
                  padding-right: 5px;white-space: nowrap;
                  font-weight: 600;
                  <?php
                    if ($row->proses == 0)
                    {
                      echo "background-color: #81ff81;";
                    } else if ($row->proses == 1)
                    {
                      echo "background-color: #fdff91;";
                    } else if ($row->proses == 2)
                    {
                      echo "background-color: #ffaf9d;";
                    } else
                    {
                      echo "background-color: #ffffff;";
                    }
                  ?>
                  ">
                      <?php
                          echo "USER : ".strtoupper($row->user);
                          echo "<br>";
                          echo "DRIVER : ".strtoupper($row->nama_mdriver)." / NO HP. ".strtoupper($row->no_hp);
                          echo "<br>";
                          echo "KEPERLUAN : ".strtoupper($row->keterangan);
                          echo "<br>";
                          echo "EXTENSION : ".strtoupper($row->ext);


                      ?>
                  </p>
                </div>
          <?php      
            } 
          ?>  
     
      </div>
    
    </div>

    <div class="day mon">
      <div class="date" style="
    background-color: skyblue;
    /* border: 23px; */
    border: inset;
    align-items: center;
    justify-content: center;
">
        <p class="date-num" style="white-space: nowrap;color: azure;"><center style="
    font-weight: bold;
    font-size: initial;
    color: azure;
">&nbsp;&nbsp;KENDARAANLMG1<br><?php echo $kendaraan8->nopol; ?>&nbsp;&nbsp;</center></p>
      </div>
      <div class="events" style="border: inset;">
          <?php 
            foreach ($kend9 as $row) { 
                $staty = 0;
                foreach ($conf as $row2) { 
                  if ($row->start >= $row2->value )
                  {
                    $start = $row2->stats;
                  }
            
                  if ($row2->value >= $row->finish && $staty == 0)
                  {
                      $finish = $row2->stats;
                      $staty = 1;
                  }
                } 
                ?>

                <div class="event start-<?php echo $start; ?> end-<?php echo $finish; ?> securities" style="
                <?php
                    if ($row->proses == 0)
                    {
                      echo "background-color: #81ff81;";
                    } else if ($row->proses == 1)
                    {
                      echo "background-color: #fdff91;";
                    } else if ($row->proses == 2)
                    {
                      echo "background-color: #ffaf9d;";
                    } else
                    {
                      echo "background-color: #ffffff;";
                    }
                  ?>
                ">
                <p class="title" style="font-size: 10px;padding-bottom: 0px;
                  padding-left: 5px;
                  padding-top: 3px;
                  padding-right: 5px;white-space: nowrap;
                  font-weight: 600;
                  <?php
                    if ($row->proses == 0)
                    {
                      echo "background-color: #81ff81;";
                    } else if ($row->proses == 1)
                    {
                      echo "background-color: #fdff91;";
                    } else if ($row->proses == 2)
                    {
                      echo "background-color: #ffaf9d;";
                    } else
                    {
                      echo "background-color: #ffffff;";
                    }
                  ?>
                  ">
                      <?php
                          echo "USER : ".strtoupper($row->user);
                          echo "<br>";
                          echo "DRIVER : ".strtoupper($row->nama_mdriver)." / NO HP. ".strtoupper($row->no_hp);
                          echo "<br>";
                          echo "KEPERLUAN : ".strtoupper($row->keterangan);
                          echo "<br>";
                          echo "EXTENSION : ".strtoupper($row->ext);


                      ?>
                  </p>
                </div>
          <?php      
            } 
          ?>  
     
      </div>
    
    </div>

    <div class="day mon">
      <div class="date" style="
    background-color: skyblue;
    /* border: 23px; */
    border: inset;
    align-items: center;
    justify-content: center;
">
        <p class="date-num" style="white-space: nowrap;color: azure;"><center style="
    font-weight: bold;
    font-size: initial;
    color: azure;
">&nbsp;&nbsp;KENDARAANLMG2<br><?php echo $kendaraan9->nopol; ?>&nbsp;&nbsp;</center></p>
      </div>
      <div class="events" style="border: inset;">
          <?php 
            foreach ($kend10 as $row) { 
                $staty = 0;
                foreach ($conf as $row2) { 
                  if ($row->start >= $row2->value )
                  {
                    $start = $row2->stats;
                  }
            
                  if ($row2->value >= $row->finish && $staty == 0)
                  {
                      $finish = $row2->stats;
                      $staty = 1;
                  }
                } 
                ?>

                <div class="event start-<?php echo $start; ?> end-<?php echo $finish; ?> securities" style="
                <?php
                    if ($row->proses == 0)
                    {
                      echo "background-color: #81ff81;";
                    } else if ($row->proses == 1)
                    {
                      echo "background-color: #fdff91;";
                    } else if ($row->proses == 2)
                    {
                      echo "background-color: #ffaf9d;";
                    } else
                    {
                      echo "background-color: #ffffff;";
                    }
                  ?>
                ">
                <p class="title" style="font-size: 10px;padding-bottom: 0px;
                  padding-left: 5px;
                  padding-top: 3px;
                  padding-right: 5px;white-space: nowrap;
                  font-weight: 600;
                  <?php
                    if ($row->proses == 0)
                    {
                      echo "background-color: #81ff81;";
                    } else if ($row->proses == 1)
                    {
                      echo "background-color: #fdff91;";
                    } else if ($row->proses == 2)
                    {
                      echo "background-color: #ffaf9d;";
                    } else
                    {
                      echo "background-color: #ffffff;";
                    }
                  ?>
                  ">
                      <?php
                          echo "USER : ".strtoupper($row->user);
                          echo "<br>";
                          echo "DRIVER : ".strtoupper($row->nama_mdriver)." / NO HP. ".strtoupper($row->no_hp);
                          echo "<br>";
                          echo "KEPERLUAN : ".strtoupper($row->keterangan);
                          echo "<br>";
                          echo "EXTENSION : ".strtoupper($row->ext);


                      ?>
                  </p>
                </div>
          <?php      
            } 
          ?>  
     
      </div>
    
    </div>

    <div class="day mon">
      <div class="date">
        <p class="date-num" style="white-space: nowrap;">&nbsp;&nbsp;&nbsp;&nbsp;</p>
      </div>
     
    
    </div>


  </div>
</div>
						
</tbody>
					
					</table>
				</div>
			

			</div>	
		  </div>
</div>













