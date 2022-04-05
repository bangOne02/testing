

<script>
    	var currDate = new Date();

		$('.date').datepicker({
			locale: {
			dateFormat: 'YYYY-MM-DD'
			},
			startDate : currDate,
		});
</script>


<form id="form-update" method="post">
	<div class="row">
		<div class="col-md-12">
			<div class="box-body">
	    	<div class="col-md-8">
	    		<div class="form-group">
	    			<br>
	    			<label>NAMA CHASIS</label>
						<input style="text-transform:uppercase" readonly="true" class="form-control" name="namachasis" value="<?php echo $table->chasis; ?>" required>
	    		</div>
	    	</div>
	    	<div class="col-md-4">
	    		<div class="form-group">
	    			<br>
	    			<label>NOMOR KIR</label>
						<input style="text-transform:uppercase" class="form-control" name="nomorkir" value="<?php echo $table->nokir; ?>" required>
	    		</div>
	    	</div>
	    	<div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>NAMA PEMILIK</label>
						<input style="text-transform:uppercase" class="form-control" name="namapemilik" value="<?php echo $table->nama_pemilik; ?>" required>
	    		</div>
	    	</div>
	    	<div class="col-md-12">
	    		<div class="form-group">
	    			<br>
						<label>MASA BERLAKU</label>
						<!-- <input class="form-control date" type="date" style="top: 34.2px;" data-date-format="yyyy-mm-dd" name="masaberlaku" autocomplete="off"> -->
						<!-- <input class="form-control date" data-date-format="dd-mm-yyyy" style="z-index: 1000;"  placeholder="ENTER MASA BERLAKU CHASIS" name="masaberlaku" value="<?php echo $table->masa_berlaku_kir; ?>" autocomplete="off" required> -->
						<input class="form-control date" data-date-format="dd-mm-yyyy" placeholder="" value="<?php echo $table->masa_berlaku_kir; ?>" name="masaberlaku" autocomplete="off" style="height: fit-content;" required>
                   
					</div> 
	    	</div>
	    	<div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>COSTCENTER</label>
						<input style="text-transform:uppercase" class="form-control" name="costcenter" value="<?php echo $table->costcenter; ?>" required>
	    		</div>
	    	</div>
	    	<div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>DESKRIPSI</label>
						<input style="text-transform:uppercase" class="form-control" name="deskripsi" value="<?php echo $table->desc; ?>" required>
	    		</div>
	    	</div>
	    	<div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>NOMOR ASSET</label>
						<input style="text-transform:uppercase" class="form-control" name="nomorasset" value="<?php echo $table->noasset; ?>" required>
	    		</div>
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