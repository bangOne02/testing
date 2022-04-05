<div class="row">
	<div class="col-md-12">
	  	
		<table width='100%' style="border-collapse: collapse;">
            <tr>
                <!-- <td width="25%">
                    <img src="<?php echo base_url('assets/img/header.png')?>" style="width: 170px;height: 100px;">
                </td>  -->
                <td width="100%" style="font-size:25px;" colspan="6">
                   <center><b>&nbsp;<font>MONITORING SUHU CONTAINER / KENDARAAN BERPENDINGIN</font>&nbsp;</b></center>
                </td>  
            </tr> 
        </table>
	</div>
</div>
<br>
<div class="table-responsive">    
        <table>
          <tr>
              <td width="100%" >NO CONTAINER : <?php echo strtoupper($hasil[0]->container); ?></td>
          </tr>
        </table>  
        <br>  
		<table id="table_1" width="100%"  style="border-collapse: collapse;">
			<thead style="text-align: left;">
				<tr>
                    <th widht="5%" style="text-align: left;">NO</th>
                    <th widht="10%" style="text-align: left;">TANGGAL</th>
                    <th widht="5%" style="text-align: left;">JAM</th>
					<th width="10%" style="text-align: left;">SUHU</th>
					<th width="10%" style="text-align: left;">PIC</th>
					<th width="60%" style="text-align: left;">KETERANGAN</th>
				</tr>
			</thead>
			<tbody>
            <?php
            $temptanggal = '';
            $no = 1;
            $i = 0;
            foreach($hasil as $row)
            { ?>
				<tr>
                    <td style="text-align: left;"><?php echo $no; ?></td>
                    <td style="text-align: left;"><?php echo $row->tanggal; ?></td>
					<td style="text-align: left;"><?php echo $row->hour; ?></td>
					<td style="text-align: left;"><?php echo $row->suhu; ?></td>
					<td style="text-align: left;"><?php echo strtoupper($row->pic); ?></td>
					<td style="text-align: left;"><?php echo strtoupper($row->keterangan); ?></td>
				</tr>
            <?php
            $no++;
            }
            ?>    
	        </tbody>
	    </table>
</div>
<br>
<div class="table-responsive">
    <table id="table_1" width="40%" style="border-collapse: collapse;">
        <tbody>
                <tr rowspan="2">
                    <td colspan="2">Di Periksa Oleh,</td>
                </tr>   
                
                <tr>
                    <td><br><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><br><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                </tr>
                
        </tbody>
    </table>
</div>