<form id="form-update" method="post">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-6">
	    		<div class="form-group">
	    			<label>NOMOR POLISI</label>
						<input style="text-transform:uppercase" readonly="true" class="form-control" name="nopol" value="<?php echo $table->nopol; ?>" required>
	    		</div>
	    		<div class="form-group">
	    			<label>NOMOR POLISI LAMA</label>
						<input style="text-transform:uppercase" readonly="true" class="form-control" name="nopollama" value="<?php echo $kendaraan->nopol; ?>">
	    		</div>
	    		<div class="form-group">
	    			<label>NOMOR POLISI BARU</label>
						<input style="text-transform:uppercase" class="form-control" name="nopolbaru" value="">
	    		</div>
	    	<!-- 	<div class="form-group">
	    			<label>NOMOR POLISI LAMA</label> -->
	    			<input style="text-transform:uppercase" type="hidden" class="form-control" name="nopol_lama" value="<?php echo $table->nopollama; ?>" required>
						<!-- <input style="text-transform:uppercase" class="form-control" name="nopol_lama" value="<?php echo $table->nopollama; ?>" required> -->
	    	<!-- 	</div> -->
	    		<div class="form-group">
	    			<label>NOMOR ASSET</label>
						<input style="text-transform:uppercase" class="form-control" name="no_asset" value="<?php echo $table->noasset; ?>" required>
	    		</div>
	    		<div class="form-group">
	    			<label>JENIS KENDARAAN</label>
	    			<select style="text-transform:uppercase" class="form-control select2" name="jenis">
						<?php foreach ($jenis as $row){
							if ($row->id == $table->jenis) {
								echo "<option value='".$row->id."' selected>".strtoupper($row->nama_jenis)."</option>";
							}else{
								echo "<option value='".$row->id."'>".strtoupper($row->nama_jenis)."</option>";
							}
						} ?>
					</select>
	    		</div>
	    		<div class="form-group">
	    			<label>NOMOR RANGKA</label>
						<input style="text-transform:uppercase" class="form-control" name="no_rangka" value="<?php echo $table->nomor_rangka; ?>" required>
	    		</div>
	    		<div class="form-group">
	    			<label>NOMOR MESIN</label>
						<input style="text-transform:uppercase" class="form-control" name="no_mesin" value="<?php echo $table->nomor_mesin; ?>" required>
	    		</div>
	    		
	    	</div>
	    	<div class="col-md-6">
	    		<div class="form-group">
	    			<label>TAHUN PEMBUATAN</label>
						<input style="text-transform:uppercase" class="form-control" name="tahun" value="<?php echo $table->tahun; ?>" required>
	    		</div>
	    		<div class="form-group">
	    			<label>A/N STNK</label>
						<input style="text-transform:uppercase" class="form-control" name="an_stnk" value="<?php echo $table->namastnk; ?>" required>
	    		</div>
	    		<div class="form-group">
	    			<label>STNK</label>
						<input class="form-control" type="date" name="tgl_stnk" value="<?php echo $table->habisstnk; ?>">
	    		</div>
	    		<div class="form-group">
	    			<label>KIR</label>
						<input style="text-transform:uppercase" class="form-control" name="kir" value="<?php echo $table->kir; ?>" required>
	    		</div>
	    	    <div class="form-group">
	    			<label>UKURAN KENDARAAN</label>
						<input style="text-transform:uppercase" readonly="true" class="form-control" name="ukuran" value="<?php echo $table->ukuran; ?>" required>
	    		</div>
	    		<div class="form-group">
	    			<label>COST CENTER</label>
						<input style="text-transform:uppercase" class="form-control" name="costcenter" value="<?php echo $table->costcenter; ?>" required>
	    		</div>
	    		<div class="form-group">
	    			<label>DIVISI</label>
	    			<select style="text-transform:uppercase" class="form-control select2" name="divisi">
						<?php foreach ($divisi as $row){
							if ($row->id == $table->divisi) {
								echo "<option value='".$row->id."' selected>".strtoupper($row->nama_divisi)."</option>";
							}else{
								echo "<option value='".$row->id."'>".strtoupper($row->nama_divisi)."</option>";
							}
						} ?>
					</select>
	    		</div>
	    	</div>	
		</div>
		<div class="col-md-12" align="right">
			<hr>
			<input type="hidden" name="id" value="<?php echo $table->id; ?>" required>
			<button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i> UPDATE</button>
		</div>
	</div>
</form>