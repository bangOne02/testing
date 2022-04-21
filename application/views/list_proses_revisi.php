<script>
$('.select2').select2({width:'100%',placeholder: '-- select one --'});
</script>
<div class="table-responsive">
	<table id="table_rev" class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>ASPEK PEMERIKSAAN</th> 
				<th>HASIL PEMERIKSAAN</th>
				<th>PERUBAHAN DATA / REVISI</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		if ($proces == 1) 
		{ 
		?>
			<tr>
				<td>1<input type="hidden" value="<?php echo $proces; ?>" name="proces" placeholder="" required>
				<input type="hidden" value="<?php echo $table[0]->id; ?>" name="id" placeholder="" required>
				<input type="hidden" value="<?php echo $table[0]->proses; ?>" name="proses" placeholder="" required></td>
				<td>
					REALISASI_TANGGAL_KEBERANGKATAN
				</td>
				<td><input disabled="true" class="form-control" name="realisasitglberangkat" value="<?php 
				if (count($table) != 0) 
				{ 
					echo strtoupper($table[0]->tglberangkat); 
				} 
				?>"  placeholder="" > </td>
				<td><input  class="form-control" type="date"  name="tglberangkat" value="<?php echo $table[0]->tglberangkat; ?>" placeholder="PERUBAHAN TANGGAL BERANGKAT" > 
			</tr>
			<tr>
				<td>2</td>
				<td>
					JAM_KEBERANGKATAN
				</td>
				<td><input disabled="true" class="form-control" name="jamberangkat" value="<?php 
				if (count($table) != 0) 
				{ 
					echo strtoupper($table[0]->jamkeluar); 
				} 
				?>"  placeholder="" > </td>
				<td><input class="form-control" type="time" name="jamberangkat"  value="16:32:55" placeholder="PERUBAHAN JAM BERANGKAT" > </td>
			</tr>
			<tr>
				<td>3</td>
				<td>
					NOMOR_POLISI
				</td>
				<td><input disabled="true" class="form-control" name="" value="<?php 
				if (count($table) != 0) 
				{ 
					echo strtoupper($table[0]->nopol); 
				} 
				?>"  placeholder="" > </td>
				<td>
					<select class="form-control select2" id="nopol" name="nopol" style="color: black">
									<?php 
									$selected = false; 
									echo "<option value=null>&nbsp;</option>";
									foreach($kendaraan as $row){
										if ($row->id == $table[0]->nomorpolisi) {
											$selected = true;
											echo "<option value='".$row->id."' selected>".$row->nopol."</option>";
										}else{
											echo "<option value='".$row->id."'>".$row->nopol."</option>";
										}
									} 			
									?>
					</select>
				</td>
			</tr>
			<tr>
				<td>4</td>
				<td>
					NAMA_DRIVER
				</td>
				<td><input disabled="true" class="form-control" name="" value="<?php 
				if (count($table) != 0) 
				{ 
					echo strtoupper($table[0]->nama_mdriver); 
				} 
				?>"  placeholder="" > </td>
				<td>
					<select class="form-control select2" id="driver" name="driver" style="color: black">
								<?php 
								$selected = false;
								echo "<option value=null>&nbsp;</option>";
								foreach($driver as $row){
									if ($row->id_mdriver == $table[0]->namasopir) {
										$selected = true;
										echo "<option value='".$row->id_mdriver."' selected>".strtoupper($row->nama_mdriver)."</option>";
									}else{
										echo "<option value='".$row->id_mdriver."'>".strtoupper($row->nama_mdriver)."</option>";
									}
								} 								
								?>
					</select>
				</td>
			</tr>
			
			<?php 
			if ($table[0]->size == 1)
			{ 
			?>
				<tr>
					<td>5</td>
					<td>
						NAMA_CHASIS
					</td>
					<td><input disabled="true" class="form-control" name="" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->chasis); 
					} 
					?>"  placeholder="" > </td>
					<td> 
						<select class="form-control select2" id="chasis" name="chasis" style="color: black">
									<?php 
									$selected = false;
									echo "<option value=null>&nbsp;</option>";
									foreach($chasis as $row){
										if ($row->id == $table[0]->sasis) {
											$selected = true;
											echo "<option value='".$row->id."' selected>".strtoupper($row->chasis)."</option>";
										}else{
											echo "<option value='".$row->id."'>".strtoupper($row->chasis)."</option>";
										}
											
									} 				
									?>
						</select>			
					</td>
				</tr>
				<tr>
					<td>6</td>
					<td>
						JENIS_MUATAN
					</td>
					<td><input disabled="true" style="text-transform:uppercase" class="form-control" name="" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->jenismuatan); 
					} 
					?>"  placeholder="" > </td>
					<td><input style="text-transform:uppercase" class="form-control" name="jenismuatan" value="<?php echo strtoupper($table[0]->jenismuatan); ?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>7</td>
					<td>
						BERAT_KOSONG
					</td>
					<td><input disabled="true" style="text-transform:uppercase" class="form-control" name="" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->beratkosong); 
					} 
					?>"  placeholder="" > </td>
					<td><input style="text-transform:uppercase" class="form-control" name="beratkosong" value="<?php echo strtoupper($table[0]->beratkosong); ?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>8</td>
					<td>
						BERAT_ISI
					</td>
					<td><input disabled="true" style="text-transform:uppercase" class="form-control" name="" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->beratisi); 
					} 
					?>"  placeholder="" > </td>
					<td><input style="text-transform:uppercase" class="form-control" name="beratisi" value="<?php echo strtoupper($table[0]->beratisi); ?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>9</td>
					<td>
						GEMBOK
					</td>
					<td><input disabled="true" style="text-transform:uppercase" class="form-control" name="" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->gembok); 
					} 
					?>"  placeholder="" > </td>
					<td><input style="text-transform:uppercase" class="form-control" name="gembok" value="<?php echo strtoupper($table[0]->gembok); ?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>10</td>
					<td>
						NOMOR CONTAINER
					</td>
					<td><input disabled="true" style="text-transform:uppercase" class="form-control" name="" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->container); 
					} 
					?>"  placeholder="" > </td>
					<td>
								<select class="form-control select2" id="container" name="container" style="color: black">
									<?php 
									$selected = false; 
									echo "<option value=null>&nbsp;</option>";
									foreach($container as $row){
										if ($row->id == $table[0]->nocontainer) {
											$selected = true;
											echo "<option value='".$row->id."' selected>".$row->container."</option>";
										}else{
											echo "<option value='".$row->id."'>".$row->container."</option>";
										}
											
									} 			
									?>
								</select>
					</td>
				</tr>
				<tr>
					<td>11</td>
					<td>
						SEGEL_PELAYARAN
					</td>
					<td><input disabled="true" style="text-transform:uppercase" class="form-control" name="" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->segelpelayaran); 
					} 
					?>"  placeholder="" > </td>
					<td><input style="text-transform:uppercase" class="form-control" name="segelpelayaran" value="<?php echo strtoupper($table[0]->segelpelayaran); ?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>12</td>
					<td>
						SEGEL_BEACUKAI
					</td>
					<td><input disabled="true" style="text-transform:uppercase" class="form-control" name="" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->segelbeacukai); 
					} 
					?>"  placeholder="" > </td>
					<td><input style="text-transform:uppercase" class="form-control" name="segelbeacukai" value="<?php echo strtoupper($table[0]->segelbeacukai); ?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>13</td>
					<td>
						TEMPERATUR
					</td>
					<td><input disabled="true" style="text-transform:uppercase" class="form-control" name="" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->temperatur); 
					} 
					?>"  placeholder="" > </td>
					<td><input style="text-transform:uppercase" class="form-control" name="temperatur" value="<?php echo strtoupper($table[0]->temperatur); ?>"  placeholder="" > </td>
				</tr>
			<?php
			}
			?>
			<tr>
				<td>14</td>
				<td>
					KILOMENTER_AWAL
				</td>
				<td><input disabled="true" style="text-transform:uppercase" class="form-control" name="" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->kmawal); 
					} 
					?>"  placeholder="" > </td>
				<td><input style="text-transform:uppercase" type="number" class="form-control" name="kmawal" value="<?php echo strtoupper($table[0]->kmawal); ?>"  placeholder="" > </td>
			</tr>
			<tr>
				<td>15</td>
				<td>
					PIC 1
				</td>
				<td><input disabled="true" style="text-transform:uppercase" class="form-control" name="" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->pic1); 
					} 
					?>"  placeholder="" > </td>
				<td><input style="text-transform:uppercase"  class="form-control" name="pic1" value="<?php echo strtoupper($table[0]->pic1); ?>"  placeholder="" > </td>
			</tr>
			<tr>
				<td>16</td>
				<td>
					KETERANGAN
				</td>
				
				<td><textarea disabled="true"  style="text-transform:uppercase;resize: none;height: 150px;" class="form-control" name="">
					<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->keterangan); 
					} 
					?>
					</textarea> 
				</td>
				<td>
				<textarea style="text-transform:uppercase;resize: none;height: 150px;" class="form-control" name="keterangan">
				<?php echo strtoupper($table[0]->keterangan); ?>
				</textarea>
				</td>
			</tr>
		<?php
		
		} else
		{ 	
		?>
			<tr>
				<td>1<input type="hidden" value="<?php echo $proces; ?>" name="proces" placeholder="" required>
				<input type="hidden" value="<?php echo $table[0]->id; ?>" name="id" placeholder="" required>
				<input type="hidden" value="<?php echo $table[0]->proses; ?>" name="proses" placeholder="" required></td>
				<td>
					TANGGAL_TIBA
				</td>
				<td><input disabled="true" class="form-control" name="tgltiba" value="<?php 
				if (count($table) != 0) 
				{ 
					echo strtoupper($table[0]->tgltiba); 
				} 
				?>"  placeholder="" > </td>
				<td><input class="form-control" name="tgltiba" type="date" value="<?php echo strtoupper($table[0]->tgltiba); ?>" placeholder="PERUBAHAN TANGGAL KEDATANGAN" > </td>
			</tr>
			<tr>
				<td>2</td>
				<td>
					JAM_TIBA
				</td>
				<td><input disabled="true" class="form-control" name="jamtiba" value="<?php 
				if (count($table) != 0) 
				{ 
					echo strtoupper($table[0]->jammasuk); 
				} 
				?>"  placeholder="" > </td>
				<td><input class="form-control" name="jamtiba" type="time" value="16:32:55" placeholder="PERUBAHAN JAM TIBA" > </td>
			</tr>
			<tr>
				<td>3</td>
				<td>
					NOMOR_POLISI
				</td>
				<td><input disabled="true" class="form-control" name="" value="<?php 
				if (count($table) != 0) 
				{ 
					echo strtoupper($table[0]->nopol); 
				} 
				?>"  placeholder="" > </td>
				<td>
					<select class="form-control select2" id="nopol" name="nopol" style="color: black">
									<?php 
									$selected = false; 
									echo "<option value=null>&nbsp;</option>";
									foreach($kendaraan as $row){
										if ($row->id == $table[0]->nomorpolisi) {
											$selected = true;
											echo "<option value='".$row->id."' selected>".$row->nopol."</option>";
										}else{
											echo "<option value='".$row->id."'>".$row->nopol."</option>";
										}
									} 			
									?>
					</select>
				</td>
			</tr>
			<tr>
				<td>4</td>
				<td>
					NAMA_DRIVER
				</td>
				<td><input disabled="true" class="form-control" name="" value="<?php 
				if (count($table) != 0) 
				{ 
					echo strtoupper($table[0]->nama_mdriver); 
				} 
				?>"  placeholder="" > </td>
				<td>
					<select class="form-control select2" id="driver" name="driver" style="color: black">
								<?php 
								$selected = false;
								echo "<option value=null>&nbsp;</option>";
								foreach($driver as $row){
									if ($row->id_mdriver == $table[0]->namasopir) {
										$selected = true;
										echo "<option value='".$row->id_mdriver."' selected>".strtoupper($row->nama_mdriver)."</option>";
									}else{
										echo "<option value='".$row->id_mdriver."'>".strtoupper($row->nama_mdriver)."</option>";
									}
								} 								
								?>
					</select>
				</td>
			</tr>
			
			<?php 
			if ($table[0]->size == 1)
			{ 
			?>
				<tr>
					<td>5</td>
					<td>
						NAMA_CHASIS
					</td>
					<td><input disabled="true" class="form-control" name="" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->chasis); 
					} 
					?>"  placeholder="" > </td>
					<td> 
						<select class="form-control select2" id="chasis" name="chasis" style="color: black">
									<?php 
									$selected = false;
									echo "<option value=null>&nbsp;</option>";
									foreach($chasis as $row){
										if ($row->id == $table[0]->sasis) {
											$selected = true;
											echo "<option value='".$row->id."' selected>".strtoupper($row->chasis)."</option>";
										}else{
											echo "<option value='".$row->id."'>".strtoupper($row->chasis)."</option>";
										}
											
									} 				
									?>
						</select>			
					</td>
				</tr>
				<tr>
					<td>6</td>
					<td>
						JENIS_MUATAN
					</td>
					<td><input disabled="true" style="text-transform:uppercase" class="form-control" name="" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->jenismuatan); 
					} 
					?>"  placeholder="" > </td>
					<td><input style="text-transform:uppercase" class="form-control" name="jenismuatan" value="<?php echo strtoupper($table[0]->jenismuatan); ?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>7</td>
					<td>
						BERAT_KOSONG
					</td>
					<td><input disabled="true" style="text-transform:uppercase" class="form-control" name="" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->beratkosong); 
					} 
					?>"  placeholder="" > </td>
					<td><input style="text-transform:uppercase" class="form-control" name="beratkosong" value="<?php echo strtoupper($table[0]->beratkosong); ?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>8</td>
					<td>
						BERAT_ISI
					</td>
					<td><input disabled="true" style="text-transform:uppercase" class="form-control" name="" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->beratisi); 
					} 
					?>"  placeholder="" > </td>
					<td><input style="text-transform:uppercase" class="form-control" name="beratisi" value="<?php echo strtoupper($table[0]->beratisi); ?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>9</td>
					<td>
						GEMBOK
					</td>
					<td><input disabled="true" style="text-transform:uppercase" class="form-control" name="" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->gembok); 
					} 
					?>"  placeholder="" > </td>
					<td><input style="text-transform:uppercase" class="form-control" name="gembok" value="<?php echo strtoupper($table[0]->gembok); ?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>10</td>
					<td>
						NOMOR CONTAINER
					</td>
					<td>
					<input disabled="true" style="text-transform:uppercase" class="form-control" name="" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->container); 
					} 
					?>"  placeholder="" > </td>
					<td>
					    <?php
							if ( $table[0]->nocontainer == '' and $table[0]->jenis == 3)
							{
						?>
								<input style="text-transform:uppercase" class="form-control" name="container" value="" placeholder="" > 
								<input type="hidden" name="jnscontainer" value="0" required>

						<?php
							} else if ( $table[0]->nocontainer == '' and $table[0]->jenis == 1)
							{
						?>	
								<input style="text-transform:uppercase" class="form-control" name="container" value="" placeholder="" > 
								<input type="hidden" name="jnscontainer" value="0" required>
						<?php
							} else
							{
						?>
								<select class="form-control select2" id="container" name="container" style="color: black">
									<?php 
									$selected = false; 
									echo "<option value=0>&nbsp;</option>";
									foreach($container as $row){
										if ($row->id == $table[0]->nocontainer) {
											$selected = true;
											echo "<option value='".$row->id."' selected>".$row->container."</option>";
										}else{
											echo "<option value='".$row->id."'>".$row->container."</option>";
										}
									} 			
									?>
								</select>
					    		<input type="hidden" name="jnscontainer" value="1" required>
						<?php		
							}
						?>	
					</td>
				</tr>
				<tr>
					<td>11</td>
					<td>
						SEGEL_PELAYARAN
					</td>
					<td><input disabled="true" style="text-transform:uppercase" class="form-control" name="" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->segelpelayaran); 
					} 
					?>"  placeholder="" > </td>
					<td><input style="text-transform:uppercase" class="form-control" name="segelpelayaran" value="<?php echo strtoupper($table[0]->segelpelayaran); ?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>12</td>
					<td>
						SEGEL_BEACUKAI
					</td>
					<td><input disabled="true" style="text-transform:uppercase" class="form-control" name="" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->segelbeacukai); 
					} 
					?>"  placeholder="" > </td>
					<td><input style="text-transform:uppercase" class="form-control" name="segelbeacukai" value="<?php echo strtoupper($table[0]->segelbeacukai); ?>"  placeholder="" > </td>
				</tr>
				<tr>
					<td>13</td>
					<td>
						TEMPERATUR
					</td>
					<td><input disabled="true" style="text-transform:uppercase" class="form-control" name="" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->temperatur); 
					} 
					?>"  placeholder="" > </td>
					<td><input style="text-transform:uppercase" class="form-control" name="temperatur" value="<?php echo strtoupper($table[0]->temperatur); ?>"  placeholder="" > </td>
				</tr>
			<?php
			}
			?>
			<tr>
				<td>14</td>
				<td>
					KILOMENTER_AKHIR
				</td>
				<td><input disabled="true" style="text-transform:uppercase" class="form-control" name="" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->kmakhir); 
					} 
					?>"  placeholder="" > </td>
				<td><input style="text-transform:uppercase" type="number" class="form-control" name="kmakhir" value="<?php echo strtoupper($table[0]->kmakhir); ?>"  placeholder="" > </td>
			</tr>
			<tr>
				<td>15</td>
				<td>
					PIC 2
				</td>
				<td><input disabled="true" style="text-transform:uppercase" class="form-control" name="" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->pic2); 
					} 
					?>"  placeholder="" > </td>
				<td><input style="text-transform:uppercase" class="form-control" name="pic2" value="<?php echo strtoupper($table[0]->pic2); ?>"  placeholder="" > </td>
			</tr>
			<tr>
				<td>16</td>
				<td>
					KETERANGAN
				</td>
				
				<td><textarea disabled="true"  style="text-transform:uppercase;resize: none;height: 150px;" class="form-control" name="">
					<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->keterangan); 
					} 
					?>
					</textarea> 
				</td>
				<td>
				<textarea style="text-transform:uppercase;resize: none;height: 150px;"  class="form-control" name="keterangan">
				<?php echo strtoupper($table[0]->keterangan); ?>
			    </textarea>
				</td>
			</tr>
		<?php
		}
		?>
		</tbody>
	</table>

</div>