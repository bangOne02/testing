<script>
$('.select2').select2({width:'100%',placeholder: '-- select one --'});
</script>
<div class="table-responsive">

	<table id="table_1" class="table table-bordered display nowrap" style="width: 100%;">
		<thead>
			<tr>
				<th style="display: none;">&nbsp;</th> 
				<th style="display: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php
		if (count($table) != 0) 
		{ ?>
			<tr>
				<td colspan="2" style="font-weight: bolder;">RENCANA SURAT JALAN</td>
				<td style="display: none;"></td>
			</tr>
			<tr>
				<td >
					RENCANA_TANGGAL_KEBERANGKATAN
				</td>
				<td><input disabled="true" class="form-control" name="rencanatglberangkat" value="<?php 
				if (count($table) != 0) 
				{ 
					echo strtoupper($table[0]->tanggalberangkat); 
				} 
				?>"  placeholder="" > </td>
			</tr>

			<tr>
				<td>
					PIC SURAT JALAN
				</td>
				<td><input disabled="true" class="form-control" name="rencanatglberangkat" value="<?php 
				if (count($table) != 0) 
				{ 
					echo strtoupper($table[0]->pic); 
				} 
				?>"  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					KETERANGAN
				</td>
				<td><input disabled="true" class="form-control" name="rencanatglberangkat" value="<?php 
				if (count($table) != 0) 
				{ 
					echo strtoupper($table[0]->keterangansj); 
				} 
				?>"  placeholder="" > </td>
			</tr>
			<?php
			  if ($table[0]->nopol != '')
			  {?>
			  		<tr>
						<td>
							NOMOR KENDARAAN
						</td>
						<td><input disabled="true" class="form-control" name="rencanatglberangkat" value="<?php 
						if (count($table) != 0) 
						{ 
							echo strtoupper($table[0]->nopol); 
						} 
						?>"  placeholder="" > </td>
					</tr>
			  <?php
			  }
			?>
			<?php
			  if ($table[0]->driver != '')
			  {?>
			  		<tr>
						<td>
							NAMA DRIVER
						</td>
						<td><input disabled="true" class="form-control" name="rencanatglberangkat" value="<?php 
						if (count($table) != 0) 
						{ 
							echo strtoupper($table[0]->nama_mdriver); 
						} 
						?>"  placeholder="" > </td>
					</tr>
			  <?php
			  }
			?>
			<?php
			  if ($table[0]->sasis != '')
			  {?>
			  		<tr>
						<td>
							NAMA CHASIS
						</td>
						<td><input disabled="true" class="form-control" name="rencanatglberangkat" value="<?php 
						if (count($table) != 0) 
						{ 
							echo strtoupper($table[0]->chasis); 
						} 
						?>"  placeholder="" > </td>
					</tr>
			  <?php
			  }
			?>
			<?php
			  if ($table[0]->nocontainer != '')
			  {?>
			  		<tr>
						<td>
							NAMA CONTAINER
						</td>
						<td><input disabled="true" class="form-control" name="rencanatglberangkat" value="<?php 
						if (count($table) != 0) 
						{ 
							echo strtoupper($table[0]->container); 
						} 
						?>"  placeholder="" > </td>
					</tr>
			  <?php
			  }
			?>
			<?php
			  if ($table[0]->jenismuatan != '')
			  {?>
					<tr>
						<td>
							JENIS MUATAN
						</td>
						<td><input disabled="true" class="form-control" name="rencanatglberangkat" value="<?php 
						if (count($table) != 0) 
						{ 
							echo strtoupper($table[0]->jenismuatan); 
						} 
						?>"  placeholder="" > </td>
					</tr>

			  <?php
			  }
			?>
			<?php
			  if ($table[0]->gembok != '')
			  {?>
			  		<tr>
						<td>
							GEMBOK
						</td>
						<td><input disabled="true" class="form-control" name="rencanatglberangkat" value="<?php 
						if (count($table) != 0) 
						{ 
							echo strtoupper($table[0]->gembok); 
						} 
						?>"  placeholder="" > </td>
					</tr>
			  <?php
			  }
			?>
			<?php
			  if ($table[0]->segelpelayaran != '')
			  {?>
			  		<tr>
						<td>
							SEGEL PELAYARAN
						</td>
						<td><input disabled="true" class="form-control" name="rencanatglberangkat" value="<?php 
						if (count($table) != 0) 
						{ 
							echo strtoupper($table[0]->segelpelayaran); 
						} 
						?>"  placeholder="" > </td>
					</tr>
			  <?php
			  }
			?>
			<?php
			  if ($table[0]->segelbeacukai != '')
			  {?>
			  		<tr>
						<td>
							SEGEL BEACUKAI
						</td>
						<td><input disabled="true" class="form-control" name="rencanatglberangkat" value="<?php 
						if (count($table) != 0) 
						{ 
							echo strtoupper($table[0]->segelbeacukai); 
						} 
						?>"  placeholder="" > </td>
					</tr>
			  <?php
			  }
			?>
			<?php
			  if ($table[0]->tugas != '')
			  {?>
			  		<tr>
						<td>
							TUGAS
						</td>
						<td><textarea disabled style="text-transform:uppercase;resize: none;height: 100px;border:none;" class="form-control" id="tugas" name="tugas"><?php echo strtoupper($table[0]->tugas);?></textarea> </td>
					</tr>
			  <?php
			  }
			?>

        <?php 
		if (($proces == 1 && $table[0]->tglberangkat == null))
		{
		?>
			<tr>
				<td colspan="2">&nbsp;</td>
				<td style="display: none;"></td>
			</tr>
			<tr>
				<td colspan="2" style="font-weight: bolder;">DATA PEMERIKSAAN KEBERANGKATAN</td>
				<td style="display: none;"></td>
			</tr>
			<tr>
				<td>
					REALISASI_TANGGAL_KEBERANGKATAN<input type="hidden" value="<?php echo $proces; ?>" name="proces" placeholder="" required>
				</td>
				<td><input disabled="true" class="form-control" name="realisasitglberangkat" value=""  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					JAM_KEBERANGKATAN
				</td>
				<td><input disabled="true" class="form-control" name="jamberangkat" value=""  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					NOMOR_POLISI
				</td>
				<td>
				<!-- 	<input class="form-control" name="nopol" value="<?php 
				if (count($table) != 0) 
				{ 
					echo strtoupper($table[0]->nopol); 
				} 
				?>"
				placeholder="" > -->


					<select class="form-control select2" id="nopol" name="nopol" style="color: black">
									<?php 
									$selected = false; 

									foreach($kendaraan as $row){
										if ($row->id == $table[0]->kendaraan) {
											$selected = true;
											echo "<option value='".$row->id."' selected>".$row->nopol."</option>";
										}else{
											echo "<option value='".$row->id."'>".$row->nopol."</option>";
										}
									} 
									if ($selected == false){echo "<option value='".$table[0]->kendaraan."' selected>".$table[0]->kendaraan."</option>";}				
									?>
					</select>




				</td>
			</tr>
			<tr>
				<td>
					NAMA_DRIVER
				</td>
				<td>
				    <select class="form-control select2" id="driver" name="namadriver" style="color: black">
				    			<?php 
								$selected = false;
								foreach($driver as $row){
									if ($row->id_mdriver == $table[0]->driver) {
										$selected = true;
										echo "<option value='".$row->id_mdriver."' selected>".strtoupper($row->nama_mdriver)."</option>";
									}else{
										echo "<option value='".$row->id_mdriver."'>".strtoupper($row->nama_mdriver)."</option>";
									}
								} 						
								if ($selected == false){echo "<option value='".$table[0]->driver."' selected>".strtoupper($table[0]->driver)."</option>";}				
								?>
				    </select>
			    </td>
			</tr>
			<?php 
			if ($table[0]->size == 1)
			{ 
			?>
				<tr>
					<td>
						NAMA_CHASIS
					</td>
					<td> 
						<select class="form-control select2" id="chasis" name="namachasis" style="color: black">
									<?php 
									$selected = false;
									foreach($chasis as $row){
										if ($row->id == $table[0]->sasis) {
											$selected = true;
											echo "<option value='".$row->id."' selected>".strtoupper($row->chasis)."</option>";
										}else{
											echo "<option value='".$row->id."'>".strtoupper($row->chasis)."</option>";
										}
									} 
									if ($selected == false){echo "<option value='".$table[0]->sasis."' selected>".strtoupper($table[0]->sasis)."</option>";}				
									?>
					    </select>			
					</td>
				</tr>
				<tr>
					<td>
						GEMBOK
					</td>
					<td><input style="text-transform:uppercase" class="form-control" name="gembok" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->gembok); 
					} 
					?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>
						NOMOR CONTAINER
					</td>
					<td>
						<?php
							if ( $table[0]->nocontainer == '' and $table[0]->jenis == 3)
							{
						?>
								<input style="text-transform:uppercase" class="form-control" name="nocontainer" value="" placeholder="" > 
								<input type="hidden" name="jnscontainer" value="0" required>
						<?php
							} else if ( $table[0]->nocontainer == '' and $table[0]->jenis == 1)
							{
						?>	
								<input style="text-transform:uppercase" class="form-control" name="nocontainer" value="" placeholder="" > 
								<input type="hidden" name="jnscontainer" value="0" required>
						<?php
							} else
							{
						?>
								<select class="form-control select2" id="container" name="nocontainer" style="color: black">
									<?php 
									$selected = false; 
									echo "<option value=0>&nbsp;</option>";
									foreach($container as $row){
										if ($row->id === $table[0]->nocontainer) {
											$selected = true;
											echo "<option value='".$row->id."' selected>".$row->container."</option>";
										}else{
											echo "<option value='".$row->id."'>".$row->container."</option>";
										}
									} 
									if ($selected == false){echo "<option value='".$table[0]->nocontainer."' selected>".$table[0]->nocontainer."</option>";}				
									?>
					    		</select>
					    		<input type="hidden" name="jnscontainer" value="1" required>
						<?php		
							}
						?>
					</td>
				</tr>
				<tr>
					<td>
						SEGEL_PELAYARAN
					</td>
					<td><input style="text-transform:uppercase" class="form-control" name="segelpelayaran" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->segelpelayaran); 
					} 
					?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>
						SEGEL_BEACUKAI
					</td>
					<td><input style="text-transform:uppercase" class="form-control" name="segelbeacukai" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->segelbeacukai); 
					} 
					?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>
						TEMPERATUR
					</td>
					<td><input style="text-transform:uppercase" class="form-control" name="temperatur" value=""  placeholder="" > </td>
				</tr>
			<?php
			}
			?>
			<tr>
				<td>
					JENIS_MUATAN
				</td>
				<td><input style="text-transform:uppercase" class="form-control" name="jenismuatan" value="<?php 
				if (count($table) != 0) 
				{ 
					echo strtoupper($table[0]->jenismuatan); 
				} 
				?>"  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					BERAT_KOSONG
				</td>
				<td><input style="text-transform:uppercase" class="form-control" name="beratkosong" value=""  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					BERAT_ISI
				</td>
				<td><input style="text-transform:uppercase" class="form-control" name="beratisi" value=""  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					KILOMENTER_AWAL
				</td>
				<td><input style="text-transform:uppercase" type="number" class="form-control" name="kmawal" value=""  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					PIC_1
				</td>
				<td><input style="text-transform:uppercase" class="form-control" name="pic1" value=""  placeholder="" required> </td>
			</tr>	
			<tr>
				<td>
					KETERANGAN
				</td>
				<td>
				<textarea style="text-transform:uppercase;resize: none;height: 150px;"  class="form-control" name="keterangan"
					>
					
					</textarea>
			    </td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
				<div class="box-footer" >	
					<button type="submit" id="selesai" class="btn btn-sm btn-primary btn-flat pull-right">SIMPAN</button>&nbsp;&nbsp;
				</div>

				</td>
			</tr>	

		<?php
		} else
		{
		?>
			<tr>
				<td colspan="2">&nbsp;</td>
				<td style="display: none;"></td>
			</tr>
			<tr>
				<td colspan="2" style="font-weight: bolder;">DATA PEMERIKSAAN KEBERANGKATAN</td>
				<td style="display: none;"></td>
			</tr>
			<tr>
				<td>
					REALISASI_TANGGAL_KEBERANGKATAN
				</td>
				<td><input disabled="true" class="form-control"  value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->ktglberangkat); 
					} 
					?>"  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					JAM_KEBERANGKATAN
				</td>
				<td><input disabled="true" class="form-control"  value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->kjamkeluar); 
					} 
					?>"  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					NOMOR_POLISI
				</td>
				<td>
					<select class="form-control select2" id="nopol" disabled="true" style="color: black">
									<?php 
									$selected = false; 

									foreach($kendaraan as $row){
										if ($row->id == $table[0]->knomorpolisi) {
											$selected = true;
											echo "<option value='".$row->id."' selected>".$row->nopol."</option>";
										}else{
											echo "<option value='".$row->id."'>".$row->nopol."</option>";
										}
									} 
									if ($selected == false){echo "<option value='".$table[0]->knomorpolisi."' selected>".$table[0]->knomorpolisi."</option>";}				
									?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					NAMA_DRIVER
				</td>
				<td>
				    <select disabled="true" class="form-control select2" id="driver" style="color: black">
				    			<?php 
								$selected = false;
								foreach($driver as $row){
									if ($row->id_mdriver == $table[0]->knamasopir) {
										$selected = true;
										echo "<option value='".$row->id_mdriver."' selected>".strtoupper($row->nama_mdriver)."</option>";
									}else{
										echo "<option value='".$row->id_mdriver."'>".strtoupper($row->nama_mdriver)."</option>";
									}
								} 						
								if ($selected == false){echo "<option value='".$table[0]->knamasopir."' selected>".strtoupper($table[0]->knamasopir)."</option>";}				
								?>
				    </select>
			    </td>
			</tr>
			<?php 
			if ($table[0]->size == 1)
			{ 
			?>
				<tr>
					<td>
						NAMA_CHASIS
					</td>
					<td> 
						<select class="form-control select2" id="chasis" disabled="true" style="color: black">
									<?php 
									$selected = false;
									foreach($chasis as $row){
										if ($row->id == $table[0]->ksasis) {
											$selected = true;
											echo "<option value='".$row->id."' selected>".strtoupper($row->chasis)."</option>";
										}else{
											echo "<option value='".$row->id."'>".strtoupper($row->chasis)."</option>";
										}
									} 
									if ($selected == false){echo "<option value='".$table[0]->ksasis."' selected>".strtoupper($table[0]->ksasis)."</option>";}				
									?>
					    </select>			
					</td>
				</tr>
				<tr>
					<td>
						GEMBOK
					</td>
					<td><input style="text-transform:uppercase" class="form-control" disabled="true" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->kgembok); 
					} 
					?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>
						NOMOR CONTAINER
					</td>
					<td>
						<select disabled="true" class="form-control select2" id="container"  style="color: black">
							<?php 
							$selected = false; 
							echo "<option value=0>&nbsp;</option>";
							foreach($container as $row){
								if ($row->id === $table[0]->knocontainer) {
									$selected = true;
									echo "<option value='".$row->id."' selected>".$row->container."</option>";
								}else{
									echo "<option value='".$row->id."'>".$row->container."</option>";
								}
							} 
							if ($selected == false){echo "<option value='".$table[0]->knocontainer."' selected>".$table[0]->knocontainer."</option>";}				
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						SEGEL_PELAYARAN
					</td>
					<td><input style="text-transform:uppercase" class="form-control" disabled="true" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->ksegelpelayaran); 
					} 
					?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>
						SEGEL_BEACUKAI
					</td>
					<td><input style="text-transform:uppercase" class="form-control" disabled="true" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->ksegelbeacukai); 
					} 
					?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>
						TEMPERATUR
					</td>
					<td><input style="text-transform:uppercase" class="form-control" disabled="true" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->ktemperatur); 
					} 
					?>"  placeholder="" > </td>
				</tr>
			<?php
			}
			?>
			<tr>
				<td>
					JENIS_MUATAN
				</td>
				<td><input style="text-transform:uppercase" class="form-control" disabled="true" value="<?php 
				if (count($table) != 0) 
				{ 
					echo strtoupper($table[0]->kjenismuatan); 
				} 
				?>"  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					BERAT_KOSONG
				</td>
				<td><input style="text-transform:uppercase" class="form-control" disabled="true" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->kberatkosong); 
					} 
					?>"  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					BERAT_ISI
				</td>
				<td><input style="text-transform:uppercase" class="form-control" disabled="true" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->kberatisi); 
					} 
					?>"  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					KILOMENTER_AWAL
				</td>
				<td><input style="text-transform:uppercase" type="number" class="form-control" disabled="true" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->kkmawal); 
					} 
					?>"  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					PIC_1
				</td>
				<td><input style="text-transform:uppercase" class="form-control" disabled="true" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->kpic1); 
					} 
					?>"  placeholder="" > </td>
			</tr>	
			<tr>
				<td>
					KETERANGAN
				</td>
				<td>
				<textarea style="text-transform:uppercase;resize: none;height: 150px;"  class="form-control" disabled="true"
					>
					<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->kketerangan); 
					} 
					?>
					</textarea>
			    </td>
			</tr>
		<?php	
		}
		?>

		<?php
		if (($proces == 2 && $table[0]->tgltiba == null))
		{
		?>
			<tr>
				<td colspan="2">&nbsp;</td>
				<td style="display: none;"></td>
			</tr>
			<tr>
				<td colspan="2" style="font-weight: bolder;">DATA PEMERIKSAAN KEDATANGAN</td>
				<td style="display: none;"></td>
			</tr>
			<tr>
				<td>
					TANGGAL_TIBA<input type="hidden" value="<?php echo $proces; ?>" name="proces" placeholder="" required>
				</td>
				<td><input disabled="true" class="form-control" name="tgltiba" value=""  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					JAM_TIBA
				</td>
				<td><input disabled="true" class="form-control" name="jamtiba" value=""  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					NOMOR_POLISI
				</td>
				<td>
				<!-- 	<input class="form-control" name="nopol" value="<?php 
				if (count($table) != 0) 
				{ 
					echo strtoupper($table[0]->nopol); 
				} 
				?>"
				placeholder="" > -->


					<select class="form-control select2" id="nopol" name="nopol" style="color: black">
									<?php 
									$selected = false; 

									foreach($kendaraan as $row){
										if ($row->id == $table[0]->kendaraan) {
											$selected = true;
											echo "<option value='".$row->id."' selected>".$row->nopol."</option>";
										}else{
											echo "<option value='".$row->id."'>".$row->nopol."</option>";
										}
									} 
									if ($selected == false){echo "<option value='".$table[0]->kendaraan."' selected>".$table[0]->kendaraan."</option>";}				
									?>
					</select>




				</td>
			</tr>
			<tr>
				<td>
					NAMA_DRIVER
				</td>
				<td>
				    <select class="form-control select2" id="driver" name="namadriver" style="color: black">
				    			<?php 
								$selected = false;
								foreach($driver as $row){
									if ($row->id_mdriver == $table[0]->driver) {
										$selected = true;
										echo "<option value='".$row->id_mdriver."' selected>".strtoupper($row->nama_mdriver)."</option>";
									}else{
										echo "<option value='".$row->id_mdriver."'>".strtoupper($row->nama_mdriver)."</option>";
									}
								} 						
								if ($selected == false){echo "<option value='".$table[0]->driver."' selected>".strtoupper($table[0]->driver)."</option>";}				
								?>
				    </select>
			    </td>
			</tr>
			<?php 
			if ($table[0]->size == 1)
			{ 
			?>
				<tr>
					<td>
						NAMA_CHASIS
					</td>
					<td> 
						<select class="form-control select2" id="chasis" name="namachasis" style="color: black">
									<?php 
									$selected = false;
									foreach($chasis as $row){
										if ($row->id == $table[0]->sasis) {
											$selected = true;
											echo "<option value='".$row->id."' selected>".strtoupper($row->chasis)."</option>";
										}else{
											echo "<option value='".$row->id."'>".strtoupper($row->chasis)."</option>";
										}
									} 
									if ($selected == false){echo "<option value='".$table[0]->sasis."' selected>".strtoupper($table[0]->sasis)."</option>";}				
									?>
					    </select>			
					</td>
				</tr>
				<tr>
					<td>
						GEMBOK
					</td>
					<td><input style="text-transform:uppercase" class="form-control" name="gembok" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->gembok); 
					} 
					?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>
						NOMOR CONTAINER
					</td>
					<td>
						<?php
							if ( $table[0]->nocontainer == '' and $table[0]->jenis == 3)
							{
						?>
								<input style="text-transform:uppercase" class="form-control" name="nocontainer" value="" placeholder="" > 
								<input type="hidden" name="jnscontainer" value="0" required>
						<?php
							} else if ( $table[0]->nocontainer == '' and $table[0]->jenis == 1)
							{
						?>	
								<input style="text-transform:uppercase" class="form-control" name="nocontainer" value="" placeholder="" > 
								<input type="hidden" name="jnscontainer" value="0" required>
						<?php
							} else
							{
						?>
								<select class="form-control select2" id="container" name="nocontainer" style="color: black">
									<?php 
									$selected = false; 
									echo "<option value=0>&nbsp;</option>";
									foreach($container as $row){
										if ($row->id === $table[0]->nocontainer) {
											$selected = true;
											echo "<option value='".$row->id."' selected>".$row->container."</option>";
										}else{
											echo "<option value='".$row->id."'>".$row->container."</option>";
										}
									} 
									if ($selected == false){echo "<option value='".$table[0]->nocontainer."' selected>".$table[0]->nocontainer."</option>";}				
									?>
					    		</select>
					    		<input type="hidden" name="jnscontainer" value="1" required>
						<?php		
							}
						?>
					</td>
				</tr>
				<tr>
					<td>
						SEGEL_PELAYARAN
					</td>
					<td><input style="text-transform:uppercase" class="form-control" name="segelpelayaran" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->segelpelayaran); 
					} 
					?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>
						SEGEL_BEACUKAI
					</td>
					<td><input style="text-transform:uppercase" class="form-control" name="segelbeacukai" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->segelbeacukai); 
					} 
					?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>
						TEMPERATUR
					</td>
					<td><input style="text-transform:uppercase" class="form-control" name="temperatur" value=""  placeholder="" > </td>
				</tr>
			<?php
			}
			?>
			<tr>
				<td>
					JENIS_MUATAN
				</td>
				<td><input style="text-transform:uppercase" class="form-control" name="jenismuatan" value="<?php 
				if (count($table) != 0) 
				{ 
					echo strtoupper($table[0]->jenismuatan); 
				} 
				?>"  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					BERAT_KOSONG
				</td>
				<td><input style="text-transform:uppercase" class="form-control" name="beratkosong" value=""  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					BERAT_ISI
				</td>
				<td><input style="text-transform:uppercase" class="form-control" name="beratisi" value=""  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					KILOMETER_AKHIR
				</td>
				<td><input style="text-transform:uppercase" type="number" class="form-control" name="kmakhir" value=""  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					PIC_2
				</td>
				<td><input style="text-transform:uppercase" class="form-control" name="pic2" value=""  placeholder="" required> </td>
			</tr>
			<tr>
				<td>
					KETERANGAN
				</td>
				<td>
				<textarea style="text-transform:uppercase;resize: none;height: 150px;"  class="form-control" name="keterangan"
					>
					
					</textarea>
			    </td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
				<div class="box-footer" >	
					<button type="submit" id="selesai" class="btn btn-sm btn-primary btn-flat pull-right">SIMPAN</button>&nbsp;&nbsp;
				</div>

				</td>
			</tr>	

		<?php
		} else
		{
		?>
			<tr>
				<td colspan="2">&nbsp;</td>
				<td style="display: none;"></td>
			</tr>
			<tr>
				<td colspan="2" style="font-weight: bolder;">DATA PEMERIKSAAN KEDATANGAN</td>
				<td style="display: none;"></td>
			</tr>
			<tr>
				<td>
					TANGGAL_TIBA
				</td>
				<td><input disabled="true" class="form-control" name="tgltiba" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->dtgltiba); 
					} 
					?>"  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					JAM_TIBA
				</td>
				<td><input disabled="true" class="form-control" name="jamtiba" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->djammasuk); 
					} 
					?>"  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					NOMOR_POLISI
				</td>
				<td>
					<select class="form-control select2" id="nopol" disabled="true" style="color: black">
									<?php 
									$selected = false; 

									foreach($kendaraan as $row){
										if ($row->id == $table[0]->dnomorpolisi) {
											$selected = true;
											echo "<option value='".$row->id."' selected>".$row->nopol."</option>";
										}else{
											echo "<option value='".$row->id."'>".$row->nopol."</option>";
										}
									} 
									if ($selected == false){echo "<option value='".$table[0]->dnomorpolisi."' selected>".$table[0]->dnomorpolisi."</option>";}				
									?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					NAMA_DRIVER
				</td>
				<td>
				    <select class="form-control select2" id="driver" disabled="true" style="color: black">
				    			<?php 
								$selected = false;
								foreach($driver as $row){
									if ($row->id_mdriver == $table[0]->dnamasopir) {
										$selected = true;
										echo "<option value='".$row->id_mdriver."' selected>".strtoupper($row->nama_mdriver)."</option>";
									}else{
										echo "<option value='".$row->id_mdriver."'>".strtoupper($row->nama_mdriver)."</option>";
									}
								} 						
								if ($selected == false){echo "<option value='".$table[0]->dnamasopir."' selected>".strtoupper($table[0]->dnamasopir)."</option>";}				
								?>
				    </select>
			    </td>
			</tr>
			<?php 
			if ($table[0]->size == 1)
			{ 
			?>
				<tr>
					<td>
						NAMA_CHASIS
					</td>
					<td> 
						<select class="form-control select2" id="chasis" disabled="true" style="color: black">
									<?php 
									$selected = false;
									foreach($chasis as $row){
										if ($row->id == $table[0]->dsasis) {
											$selected = true;
											echo "<option value='".$row->id."' selected>".strtoupper($row->chasis)."</option>";
										}else{
											echo "<option value='".$row->id."'>".strtoupper($row->chasis)."</option>";
										}
									} 
									if ($selected == false){echo "<option value='".$table[0]->dsasis."' selected>".strtoupper($table[0]->dsasis)."</option>";}				
									?>
					    </select>			
					</td>
				</tr>
				<tr>
					<td>
						GEMBOK
					</td>
					<td><input style="text-transform:uppercase" class="form-control" disabled="true" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->dgembok); 
					} 
					?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>
						NOMOR CONTAINER
					</td>
					<td>
								<select class="form-control select2" id="container" disabled="true" style="color: black">
									<?php 
									$selected = false; 
									echo "<option value=0>&nbsp;</option>";
									foreach($container as $row){
										if ($row->id === $table[0]->dnocontainer) {
											$selected = true;
											echo "<option value='".$row->id."' selected>".$row->container."</option>";
										}else{
											echo "<option value='".$row->id."'>".$row->container."</option>";
										}
									} 
									if ($selected == false){echo "<option value='".$table[0]->dnocontainer."' selected>".$table[0]->dnocontainer."</option>";}				
									?>
					    		</select>
					</td>
				</tr>
				<tr>
					<td>
						SEGEL_PELAYARAN
					</td>
					<td><input style="text-transform:uppercase" class="form-control" disabled="true" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->dsegelpelayaran); 
					} 
					?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>
						SEGEL_BEACUKAI
					</td>
					<td><input style="text-transform:uppercase" class="form-control" disabled="true" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->dsegelbeacukai); 
					} 
					?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>
						TEMPERATUR
					</td>
					<td><input style="text-transform:uppercase" class="form-control" disabled="true" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->dtemperatur); 
					} 
					?>"  placeholder="" > </td>
				</tr>
			<?php
			}
			?>
			<tr>
				<td>
					JENIS_MUATAN
				</td>
				<td><input style="text-transform:uppercase" class="form-control" disabled="true" value="<?php 
				if (count($table) != 0) 
				{ 
					echo strtoupper($table[0]->djenismuatan); 
				} 
				?>"  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					BERAT_KOSONG
				</td>
				<td><input style="text-transform:uppercase" class="form-control" disabled="true" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->dberatkosong); 
					} 
					?>"  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					BERAT_ISI
				</td>
				<td><input style="text-transform:uppercase" class="form-control" disabled="true" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->dberatisi); 
					} 
					?>"  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					KILOMETER_AKHIR
				</td>
				<td><input style="text-transform:uppercase" type="number" class="form-control" disabled="true" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->dkmakhir); 
					} 
					?>"  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					PIC_2
				</td>
				<td><input style="text-transform:uppercase" class="form-control" disabled="true" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->dpic2); 
					} 
					?>"  placeholder="" > </td>
			</tr>
			<tr>
				<td>
					KETERANGAN
				</td>
				<td>
				<textarea style="text-transform:uppercase;resize: none;height: 150px;"  class="form-control" disabled="true"
					>
					<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->dketerangan); 
					} 
					?>
					
					</textarea>
			    </td>
			</tr>
		<?php
		}
		}
		?>
		
		</tbody>
	</table>

</div>