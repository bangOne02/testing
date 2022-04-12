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
					MASTER FORM MOBILISASI 
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
					<td>NOMOR SURAT JALAN</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->nomorsj);?></td>
			</tr>
			<tr>
					<td>ASAL</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->asalsj);?></td>
			</tr>
			<tr>
					<td>TUJUAN</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->tujuan);?></td>
			</tr>
			<tr>
					<td>PIC SURAT JALAN</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->pic);?></td>
			</tr>
			<tr>
					<td>RENCANA TANGGAL KEBERANGKATAN</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper(date('d-m-Y',strtotime($hasil[0]->tanggalberangkat)));?></td>
			</tr>
			<tr>
					<td>KETERANGAN</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->keterangan);?></td>
			</tr>
			<?php
			  if ($hasil[0]->nopol != '')
			  {?>
			  		<tr>
					<td>RENCANA KENDARAAN</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->nopol);?></td>
					</tr>
			  <?php
			  }
			?>
			<?php
			  if ($hasil[0]->sopir != '')
			  {?>
			  		<tr>
					<td>RENCANA DRIVER</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->sopir);?></td>
					</tr>
			  <?php
			  }
			?>
			<?php
			  if ($hasil[0]->chasis != '')
			  {?>
			  		<tr>
					<td>RENCANA CHASIS</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->chasis);?></td>
					</tr>
			  <?php
			  }
			?>
			<?php
			  if ($hasil[0]->nocontainer != '')
			  {?>
			  		<tr>
					<td>RENCANA NOMOR CONTAINER</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->nocontainer);?></td>
					</tr>
			  <?php
			  }
			?>
			<?php
			  if ($hasil[0]->jenismuatan != '')
			  {?>
			  		<tr>
					<td>RENCANA JENIS MUATAN</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->jenismuatan);?></td>
					</tr>
			  <?php
			  }
			?>
			<?php
			  if ($hasil[0]->gembok != '')
			  {?>
			  		<tr>
					<td>RENCANA GEMBOK</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->gembok);?></td>
					</tr>
			  <?php
			  }
			?>
			<?php
			  if ($hasil[0]->segelpelayaran != '')
			  {?>
			  		<tr>
					<td>RENCANA SEGEL PELAYARAN</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->segelpelayaran);?></td>
					</tr>
			  <?php
			  }
			?>
			<?php
			  if ($hasil[0]->segelbeacukai != '')
			  {?>
			  		<tr>
					<td>RENCANA SEGEL BEACUKAI</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->segelbeacukai);?></td>
			  		</tr>
			  <?php
			  }
			?>
			<?php
			  if ($hasil[0]->tugas != '')
			  {?>
			  		<tr>
					<td>TUGAS</td>
					<td><textarea style="text-transform:uppercase;resize: none;height: 100px;border:none;" class="form-control" id="tugas" name="tugas"><?php echo strtoupper($hasil[0]->tugas);?></textarea></td>
			  		</tr>
			  <?php
			  }
			?>


		</tbody>
	</table>
</div>
<div class="row">
	<div class="col-md-12">
		<br>
	</div>
	<div class="col-md-12">
	    <LEFT>
			
				<b style="color: red;margin-left: 10%;">
			<!-- 	KENDARAAN <?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->nama_jenis);?> / <?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->nopol);?> -->
					DATA KEBERANGKATAN
				</b>
			</i>
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
					<td>REALISASI TANGGAL KEBERANGKATAN</td>
					<!-- <td><?php echo "<b style='color:#337ab7'>".strtoupper(( $hasil[0]->tglberangkat <> '' ? date('d-m-Y',strtotime($hasil[0]->tglberangkat)) : '' ));?> -->
						<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->tglberangkat);?>
					</td>
			</tr>
			<tr>
					<td>JAM KEBERANGKATAN</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->jamkeluar);?>
					</td>
			</tr>
			<!-- <tr>
					<td>NAMA KENDARAAN</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->nama_kendaraan);?></td>
			</tr> -->
			<tr>
					<td>NOMOR POLISI</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->knomorpolisi);?></td>
			</tr>
			<tr>
					<td>NAMA DRIVER</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->knamasopir);?></td>
			</tr>


			<?php
			if ($hasil[0]->size == 1)
			{
			?>	
				<tr>
					<td>NAMA CHASIS</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->ksasis);?></td>
				</tr>
				<!-- <tr>
						<td>NOMOR KIR</td>
						<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->nokir);?></td>
				</tr> -->
				
				<tr>
						<td>GEMBOK</td>
						<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->kgembok);?></td>
				</tr>
				<tr>
						<td>NOMOR CONTAINER</td>
						<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->knocontainer);?></td>
				</tr>
				<tr>
						<td>SEGEL PELAYARAN</td>
						<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->ksegelpelayaran);?></td>
				</tr>
				<tr>
						<td>SEGEL BEACUKAI</td>
						<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->ksegelbeacukai);?></td>
				</tr>
				<tr>
						<td>TEMPERATUR</td>
						<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->ktemperatur);?></td>
				</tr>

			<?php
			}	
			?>
			<tr>
					<td>JENIS MUATAN</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->kjenismuatan);?></td>
			</tr>
			<tr>
					<td>BERAT KOSONG</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->kberatkosong);?></td>
			</tr>
			<tr>
					<td>BERAT ISI</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->kberatisi);?></td>
			</tr>
			<tr>
					<td>KILOMETER AWAL</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->kmawal);?></td>
			</tr>
			<tr>
					<td>PIC 1</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->pic1);?></td>
			</tr>
			<tr>
					<td>KETERANGAN</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->kketerangan);?></td>
			</tr>
		</tbody>
	</table>
</div>	
<div class="row">
	<div class="col-md-12">
		<br>
	</div>
	<div class="col-md-12">
	    <LEFT>
			
				<b style="color: red;margin-left: 10%;">
			<!-- 	KENDARAAN <?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->nama_jenis);?> / <?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->nopol);?> -->
					DATA KEDATANGAN
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
					<td>TANGGAL TIBA</td>
					<!-- <td><?php echo "<b style='color:#337ab7'>".strtoupper(( $hasil[0]->tgltiba <> '' ? date('d-m-Y',strtotime($hasil[0]->tgltiba)) : '' ));?> -->
						<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->tgltiba);?>
					</td>
			</tr>
			<tr>
					<td>JAM TIBA</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->jammasuk);?>
					</td>
			</tr>
			<!-- <tr>
					<td>NAMA KENDARAAN</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->nama_kendaraan);?></td>
			</tr> -->
			<tr>
					<td>NOMOR POLISI</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->dnomorpolisi);?></td>
			</tr>
			<tr>
					<td>NAMA DRIVER</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->dnamasopir);?></td>
			</tr>

			<?php
			if ($hasil[0]->size == 1)
			{
			?>	
				<tr>
					<td>NAMA CHASIS</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->dsasis);?></td>
				</tr>
			<!-- 	<tr>
						<td>NOMOR KIR</td>
						<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->nokir);?></td>
				</tr> -->
				
				<tr>
						<td>GEMBOK</td>
						<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->dgembok);?></td>
				</tr>
				<tr>
						<td>NOMOR CONTAINER</td>
						<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->dnocontainer);?></td>
				</tr>
				<tr>
						<td>SEGEL PELAYARAN</td>
						<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->dsegelpelayaran);?></td>
				</tr>
				<tr>
						<td>SEGEL BEACUKAI</td>
						<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->dsegelbeacukai);?></td>
				</tr>
				<tr>
						<td>TEMPERATUR</td>
						<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->dtemperatur);?></td>
				</tr>

			<?php
			}	
			?>
			<tr>
					<td>JENIS MUATAN</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->djenismuatan);?></td>
			</tr>
			<tr>
					<td>BERAT KOSONG</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->dberatkosong);?></td>
			</tr>
			<tr>
					<td>BERAT ISI</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->dberatisi);?></td>
			</tr>
			<tr>
					<td>KILOMETER AKHIR</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->kmakhir);?></td>
			</tr>
			<tr>
					<td>PIC 2</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->pic2);?></td>
			</tr>
			<tr>
					<td>KETERANGAN</td>
					<td><?php echo "<b style='color:#337ab7'>".strtoupper($hasil[0]->dketerangan);?></td>
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