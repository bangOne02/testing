<script>
$('.select2').select2({width:'100%',placeholder: '-- select one --'});
</script>
<div class="table-responsive">
	<table id="table_1" class="table table-bordered display nowrap">
		<thead>
			<tr>
				<th>#</th>
				<th>ASPEK_PEMERIKSAAN</th> 
				<th>HASIL_PEMERIKSAAN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		if (($proces == 1 && $table[0]->tglberangkat == null) or ($proces == 2 && $table[0]->tgltiba == null))
		{
		?>
			
			<tr>
				<td>1</td>
				<td>
					RENCANA_TANGGAL_KEBERANGKATAN
				</td>
				<td><input disabled="true" class="form-control" name="rencanatglberangkat" value="<?php 
				if (count($table) != 0) 
				{ 
					echo strtoupper($table[0]->tanggalberangkat); 
				} 
				?>"  placeholder="" > </td>
			</tr>

			<?php 
			if ($proces == 1)
			{ 
			?>
					<tr>
						<td>2</td>
						<td>
							REALISASI_TANGGAL_KEBERANGKATAN
						</td>
						<td><input disabled="true" class="form-control" name="realisasitglberangkat" value=""  placeholder="" > </td>
					</tr>
					<tr>
						<td>3</td>
						<td>
							JAM_KEBERANGKATAN
						</td>
						<td><input disabled="true" class="form-control" name="jamberangkat" value=""  placeholder="" > </td>
					</tr>
			<?php	
			} else 
			{ ?>
					<tr>
						<td>2</td>
						<td>
							TANGGAL_TIBA
						</td>
						<td><input disabled="true" class="form-control" name="tgltiba" value=""  placeholder="" > </td>
					</tr>
					<tr>
						<td>3</td>
						<td>
							JAM_TIBA
						</td>
						<td><input disabled="true" class="form-control" name="jamtiba" value=""  placeholder="" > </td>
					</tr>
			<?php	
			}
			?>
			
			<tr>
				<td>4</td>
				<td>
					NOMOR_POLISI
				</td>
				<td>


					<select class="form-control select2" id="nopol" name="nopol" style="color: black">
									<?php 
								//	$selected = false; 

									foreach($kendaraan as $row){
										// if ($row->id == $table[0]->kendaraan) {
										// 	$selected = true;
										// 	echo "<option value='".$row->id."' selected>".$row->nopol."</option>";
										// }else{
											echo "<option value='".$row->id."'>".$row->nopol."</option>";
										// }
									} 
								//	if ($selected == false){echo "<option value='".$table[0]->kendaraan."' selected>".$table[0]->kendaraan."</option>";}				
									?>
					</select>




				</td>
			</tr>
			<tr>
				<td>5</td>
				<td>
					NAMA_DRIVER
				</td>
				<td>
				    <select class="form-control select2" id="driver" name="namadriver" style="color: black">
				    			<?php 
								//$selected = false;
								foreach($driver as $row){
									// if ($row->id_mdriver == $table[0]->driver) {
									// 	$selected = true;
									// 	echo "<option value='".$row->id_mdriver."' selected>".strtoupper($row->nama_mdriver)."</option>";
									// }else{
										echo "<option value='".$row->id_mdriver."'>".strtoupper($row->nama_mdriver)."</option>";
								//	}
								} 						
							//	if ($selected == false){echo "<option value='".$table[0]->driver."' selected>".strtoupper($table[0]->driver)."</option>";}				
								?>
				    </select>
			    </td>
			</tr>
			<?php 
			if ($table[0]->size == 1)
			{ 
			?>
				<tr>
					<td>X</td>
					<td>
						NAMA_CHASIS
					</td>
					<td> 
						<select class="form-control select2" id="chasis" name="namachasis" style="color: black">
									<?php 
								//	$selected = false;
									foreach($chasis as $row){
										// if ($row->id == $table[0]->sasis) {
										// 	$selected = true;
										// 	echo "<option value='".$row->id."' selected>".strtoupper($row->chasis)."</option>";
										// }else{
											echo "<option value='".$row->id."'>".strtoupper($row->chasis)."</option>";
									//	}
									} 
								//	if ($selected == false){echo "<option value='".$table[0]->sasis."' selected>".strtoupper($table[0]->sasis)."</option>";}				
									?>
					    </select>			
					</td>
				</tr>
				<tr>
					<td>X</td>
					<td>
						GEMBOK
					</td>
					<td><input style="text-transform:uppercase" class="form-control" name="gembok" value=""  placeholder="" > </td>
				</tr>
				<tr>
					<td>X</td>
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
								//	$selected = false; 
									echo "<option value=0>&nbsp;</option>";
									foreach($container as $row){
										// if ($row->id === $table[0]->nocontainer) {
										// 	$selected = true;
										// 	echo "<option value='".$row->id."' selected>".$row->container."</option>";
										// }else{
											echo "<option value='".$row->id."'>".$row->container."</option>";
									//	}
									} 
								//	if ($selected == false){echo "<option value='".$table[0]->nocontainer."' selected>".$table[0]->nocontainer."</option>";}				
									?>
					    		</select>
					    		<input type="hidden" name="jnscontainer" value="1" required>
						<?php		
							}
						?>
					</td>
				</tr>
				<tr>
					<td>X</td>
					<td>
						SEGEL_PELAYARAN
					</td>
					<td><input style="text-transform:uppercase" class="form-control" name="segelpelayaran" value=""  placeholder="" > </td>
				</tr>
				<tr>
					<td>X</td>
					<td>
						SEGEL_BEACUKAI
					</td>
					<td><input style="text-transform:uppercase" class="form-control" name="segelbeacukai" value=""  placeholder="" > </td>
				</tr>
				<tr>
					<td>X</td>
					<td>
						TEMPERATUR
					</td>
					<td><input style="text-transform:uppercase" class="form-control" name="temperatur" value=""  placeholder="" > </td>
				</tr>
			<?php
			}
			?>
			<tr>
				<td>6</td>
				<td>
					JENIS_MUATAN
				</td>
				<td><input style="text-transform:uppercase" class="form-control" name="jenismuatan" value=""  placeholder="" > </td>
			</tr>
			<tr>
				<td>7</td>
				<td>
					BERAT_KOSONG
				</td>
				<td><input style="text-transform:uppercase" class="form-control" name="beratkosong" value=""  placeholder="" > </td>
			</tr>
			<tr>
				<td>8</td>
				<td>
					BERAT_ISI
				</td>
				<td><input style="text-transform:uppercase" class="form-control" name="beratisi" value=""  placeholder="" > </td>
			</tr>
			<?php 
			if ($proces == 1)
			{ 
			?>
					<tr>
						<td>9</td>
						<td>
							KILOMENTER_AWAL
						</td>
						<td><input style="text-transform:uppercase" type="number" class="form-control" name="kmawal" value=""  placeholder="" > </td>
					</tr>
					<tr>
						<td>10</td>
						<td>
							PIC_1
						</td>
						<td><input style="text-transform:uppercase" class="form-control" name="pic1" value=""  placeholder="" > </td>
					</tr>
			<?php	
			} else 
			{ ?>
					<tr>
						<td>9</td>
						<td>
							KILOMETER_AKHIR
						</td>
						<td><input style="text-transform:uppercase" type="number" class="form-control" name="kmakhir" value=""  placeholder="" > </td>
					</tr>
					<tr>
						<td>10</td>
						<td>
							PIC_2
						</td>
						<td><input style="text-transform:uppercase" class="form-control" name="pic2" value=""  placeholder="" > </td>
					</tr>
			<?php	
			}
			?>
			<tr>
				<td>11</td>
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
				<td>2</td>
				<td>
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
				<td>3</td>
				<td>
					REALISASI_TANGGAL_KEBERANGKATAN
				</td>
				<td><input disabled="true" class="form-control" name="realisasitglberangkat" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->tglberangkat); 
					} 
					?>"  placeholder="" > </td>
			</tr>
			<tr>
				<td>4</td>
				<td>
					JAM_KEBERANGKATAN
				</td>
				<td><input disabled="true" class="form-control" name="jamberangkat" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->jamkeluar); 
					} 
					?>"  placeholder="" > </td>
			</tr>

			<tr>
				<td>5</td>
				<td>
					TANGGAL_TIBA
				</td>
				<td><input disabled="true" class="form-control" name="tgltiba" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->tgltiba); 
					} 
					?>"  placeholder="" > </td>
			</tr>
			<tr>
				<td>6</td>
				<td>
					JAM_TIBA
				</td>
				<td><input disabled="true" class="form-control" name="jamtiba" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->jammasuk); 
					} 
					?>"  placeholder="" > </td>
			</tr>

			<tr>
				<td>7</td>
				<td>
					PIC_KEBERANGKATAN
				</td>
				<td><input disabled="true" style="text-transform:uppercase" class="form-control" name="pic1" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->pic1); 
					} 
					?>"  placeholder="" > </td>
			</tr>

			<tr>
				<td>8</td>
				<td>
					PIC_KEDATANGAN
				</td>
				<td><input disabled="true" style="text-transform:uppercase" class="form-control" name="pic2" value="<?php 
					if (count($table) != 0) 
					{ 
						echo strtoupper($table[0]->pic2); 
					} 
					?>"  placeholder="" > </td>
			</tr>	
		<?php
		}
		?>
		</tbody>
	</table>

</div>