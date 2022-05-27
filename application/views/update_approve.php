<form id="form-approve" method="post">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-12">
	    		<div class="form-group">
	    			<label>USER REQUEST</label>
						<!-- <input style="text-transform:uppercase" readonly="true" class="form-control" name="nopol" value="<?php echo $table->nopol; ?>" required> -->
                        <input style="text-transform:uppercase" readonly="true" class="form-control" name="nopol" value="<?php echo $request->user; ?>" required>
	    		</div>
	    		<div class="form-group">
	    			<label>TANGGAL KEBERANGKATAN</label>
						<input style="text-transform:uppercase" readonly="true" class="form-control" name="nopollama"  value="<?php echo $request->tanggal; ?>">
	    		</div>
	    		<div class="form-group">
	    			<label>JAM KEBERANGKATAN</label>
						<input style="text-transform:uppercase" readonly="true" class="form-control" name="nopolbaru" value="<?php echo $request->timestart; ?>">
	    		</div>
                <div class="form-group">
	    			<label>KEPERLUAN</label>
						<input style="text-transform:uppercase" readonly="true" class="form-control" name="nopolbaru" value="<?php echo $request->keterangan; ?>">
	    		</div>
                <div class="form-group">
	    			<label>JUMLAH PENUMPANG</label>
						<input style="text-transform:uppercase" readonly="true" class="form-control" name="nopolbaru" value="<?php echo $request->jumlah; ?>">
	    		</div>
                <div class="form-group">
	    			<label>EXTENSION</label>
						<input style="text-transform:uppercase" readonly="true" class="form-control" name="nopolbaru" value="<?php echo $request->ext; ?>">
	    		</div>
	    		<div class="form-group">
	    			<label>KENDARAAN</label>
	    			<select style="text-transform:uppercase" class="form-control select2" name="kendaraan">
						<?php foreach ($kendaraan as $row) {
								if ($row->id == $request->kendaraan) {
									if ($row->operasional < 8)
									{
										echo "<option value='".$row->id."' selected>".strtoupper($row->nama_jenis).' / '.strtoupper($row->nopol). "</option>";
									} else
									{
										echo "<option value='".$row->id."' selected>".strtoupper($row->nama_jenis).' / '.strtoupper($row->nopol).' (KEND LAMONGAN)'."</option>";
									}
								}else{
									if ($row->operasional < 8)
									{
										echo "<option value='".$row->id."'>".strtoupper($row->nama_jenis).' / '.strtoupper($row->nopol). "</option>";
									} else
									{
										echo "<option value='".$row->id."'>".strtoupper($row->nama_jenis).' / '.strtoupper($row->nopol).' (KEND LAMONGAN)'."</option>";
									}
								}
						} 

						if ($request->kendaraan == 9999)
						{
							echo "<option value='9999' selected>GRAB / GOJEK</option>";
						} else
						{
							echo "<option value='9999'>GRAB / GOJEK</option>";
						}

						?>
					</select>
	    		</div>
                <div class="form-group">
	    			<label>NAMA DRIVER</label>
                    <select style="text-transform:uppercase" class="form-control select2" name="driver">
						<?php foreach ($driver as $row) {
								if ($row->id_mdriver == $request->driver) {
									echo "<option value='".$row->id_mdriver."' selected>".strtoupper($row->nama_mdriver)."</option>";
								}else{
									echo "<option value='".$row->id_mdriver."'>".strtoupper($row->nama_mdriver)."</option>";
								}
						} ?>
					</select>
	    		</div>
                <div class="form-group">
	    			<label>ESTIMASI WAKTU KEDATANGAN</label>
                    <!-- <input style="text-transform:uppercase" placeholder="00:00 AM" class="form-control timepicker" type="time" value="<?php echo $request->timefinish; ?>"  name="jamfinish" required> -->
					<input style="text-transform:uppercase" placeholder="00:00 AM" class="form-control" min="06:00:00" max="21:00:00" type="time" value="<?php echo $request->timefinish; ?>"  name="jamfinish"
							required><span class="validity"></span>	
				</div>
				<!-- <div class="form-group">
	    			<label>NOMOR SURAT JALAN</label>
                    <select style="text-transform:uppercase" class="form-control select2" name="idsj">
						<?php 
						// foreach ($suratjalan as $row) {
						// 	echo $request->idsj;
						// 		if ($row->id == $request->idsj) {
						// 			echo "<option value='".$row->id."' selected>".strtoupper($row->nomorsj)."</option>";
						// 		}else{
						// 			echo "<option value='".$row->id."'>".strtoupper($row->nomorsj)."</option>";
						// 		}
						// } 
						?>
					</select>
	    		</div> -->
	    		
	    		
	    	</div>
	    	
		</div>
		<div class="col-md-12" align="right">
			<hr>
            <input type="hidden" name="id" value="<?php echo $request->id; ?>" required>
			<button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i> APPROVE</button>
		</div>
	</div>
</form>