
<div class="row">

	<div class="col-md-12">
	    <center>
			<i>
				<b style="color: red">
				&nbsp;
				</b>
			</i>
		</center>	
		
	</div>
</div>
<br>

<div class="table-responsive">
	<table id="table_1" width="100%" class="table">
		<thead style="text-align: left;">
			<tr>
				<td width="10%" style="text-align: left;">&nbsp;</td>
				<th widht="10%" style="text-align: center;">TGL TOTALAN</th>
				<th width="10%" style="text-align: left;">SOPIR</th>
				<th width="10%" style="text-align: center;">NO POL</th>
				<th width="10%" style="text-align: center;">T OPERASIONAL</th>
				<th width="20%" style="text-align: left;">TUJUAN</th>
				<th width="10%" style="text-align: center;">COST CENTER</th>
				<th width="10%" style="text-align: center;">NO GL</th>
				<th width="10%" style="text-align: right;">JUMLAH</th>
			</tr>
		</thead>
		<tbody>
			<?php
			    $no = 0;
			    $total = 0;
				foreach($hasil as $row){
					$total = $total + $row->totalbiaya2;
				?>
				<tr>
					<td>&nbsp;</td>
					<td style="text-align: center;"><?php echo "<b style='color:#337ab7'>".$row->tgltotalan; ?></td>
					<td style="text-align: left;"><?php echo $row->sopir; ?></td>
					<td style="text-align: center;"><?php echo $row->nopol; ?></td>
					<td style="text-align: center;"><?php echo $row->tglberangkat; ?></td>
					<td style="text-align: left;"><?php echo $row->tujuan; ?></td>
					<td style="text-align: center;"><?php echo $row->costcenter; ?></td>
					<td style="text-align: center;"><?php echo $row->glaccount; ?></td>
					<td style="text-align: right;"><?php echo $row->totalbiaya2; ?></td>
				</tr>
			<?php } 
			  ?>
		        <tr>
		        	<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr> 
			    <tr>
			    	<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td style="text-align: right;"><b style='color:#337ab7'>TOTAL JUMLAH</td>
					<td style="text-align: right;"><?php echo "<b style='color:#337ab7'>".$total; ?></td>
				</tr>
				
        </tbody>
	</table>
</div>
<br>
<div class="table-responsive">
	<table id="table_1" width="100%" border="0" class="table table-bordered">
		<tbody>
				<tr>
					<td>&nbsp;</td>
					<td style="text-align: left; border: 1;">KB</td>
					<td style="text-align: right;"><?php echo "<b style='color:#337ab7'>".$hasil[0]->nominal; ?></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>   
				<tr>
					<td>&nbsp;</td>
					<td style="text-align: left;">PEMAKAIAN</td>
					<td style="text-align: right;"><?php echo "<b style='color:#337ab7'>".$total; ?></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>NO KB</td>
					<td><?php echo "<b style='color:#337ab7'>".$hasil[0]->nomor_kasbon; ?></td>
					<td><?php echo "<b style='color:#337ab7'>".$total; ?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td style="text-align: left;">KURANG</td>
					<td style="text-align: right;"><?php echo "<b style='color:#337ab7'>".((int)$hasil[0]->nominal - (int)$total); ?></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				
        </tbody>
	</table>
</div>
<br>
<div class="table-responsive">
	<table id="table_1" width="100%" border="0" class="table table-bordered">
		<tbody>
				<tr>
					<td>&nbsp;</td>
					<td style="text-align: center; border: 1;">Di Buat Oleh,</td>
					<td>&nbsp;</td>
					<td style="text-align: center; border: 1;">Di Setujui Oleh,</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td style="text-align: center; border: 1;">Di Ketahui Oleh,</td>
				</tr>   
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td style="text-align: center; border: 1;">(&nbsp;<?php echo $hasil[0]->username; ?>&nbsp;)</td>
					<td>&nbsp;</td>
					<td style="text-align: center; border: 1;">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td style="text-align: center; border: 1;">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
				</tr>
				
        </tbody>
	</table>
</div>

<!-- <div class="row">
	
		 <table class="">
			<tr>
				<td>NOMOR WI </td>
				<td style="padding: 0 10px"> : &nbsp;<?php echo $row->no_wi; ?></td>
				<td>
					</td>
			</tr>
			<tr>
				<td>NOMOR FORM </td>
				<td style="padding: 0 10px"> : &nbsp;<?php echo $row->no_form; ?> </td>
				<td>
					</td>
			</tr>
		</table> 
</div> -->




