<div class="row">
	<div class="col-md-12">
			<i>
				&nbsp;
			</i>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<br>
	</div>
	<div class="col-md-12">
	    <LEFT>
			
				<b style="color: red;margin-left: 10%;">
				KENDARAAN <?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->nama_jenis);?> / <?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->nopol);?>
				</b>
			
		</LEFT>	
		
	</div>
</div>
<br>
<br>
<div class="table-responsive">
	<center>
	<table id="table_1" style="width: 80%" class="table table-bordered">
		<thead>
			<tr>
				<th width="40%">&nbsp;</th>
				<th width="40%">&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<tr>
					<td>NOMOR ASSET</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->noasset);?></td>
			</tr>
			<tr>
					<td>NOMOR POLISI</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->nopol);?></td>
			</tr>
			<tr>
					<td>JENIS KENDARAAN</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->nama_jenis);?></td>
			</tr>
			<tr>
					<td>NOMOR RANGKA</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->nomor_rangka);?></td>
			</tr>
			<tr>
					<td>NOMOR MESIN</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->nomor_mesin);?></td>
			</tr>
			<tr>
					<td>TAHUN</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->tahun);?></td>
			</tr>
			<tr>
					<td>A/N STNK</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->namastnk);?></td>
			</tr>
			<tr>
					<td>JENIS KENDARAAN</td>
					<td><?php echo "<b style='color:#337ab7'>KENDARAAN ".strtoupper($hasil[0]->ukuran);?></td>
			</tr>
			<tr>
					<td>STNK</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->habisstnk);?></td>
			</tr>
			<tr>
					<td>KIR</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->kir);?></td>
			</tr>
			<tr>
					<td>PAJAK</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->pajak);?></td>
			</tr>
			<tr>
					<td>NOMOR POLISI LAMA</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->nopollama);?></td>
			</tr>
			<tr>
					<td>COST CENTER</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->costcenter);?></td>
			</tr>
			<tr>
					<td>DIVISI</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->nama_divisi);?></td>
			</tr>

        </tbody>

	</table>
   </center>
</div>
<br>
<br>

<form id="form-update" method="post">
	<div class="row">
		
		<div class="col-md-12" align="right">
			<hr>
		</div>
	</div>
</form>