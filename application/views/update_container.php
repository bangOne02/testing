
<form id="form-update" method="post">
	<div class="row">
		<div class="col-md-12">
			<div class="box-body">
	    	<div class="col-md-8">
	    		<div class="form-group">
	    			<br>
	    			<label>NAMA CONTAINER</label>
						<input style="text-transform:uppercase" readonly="true" class="form-control" name="namacontainer" value="<?php echo $table->container; ?>" required>
	    		</div>
	    	</div>
	    	<div class="col-md-4">
	    		<div class="form-group">
	    			<br>
	    			<label>KONDISI</label>
						<input style="text-transform:uppercase" class="form-control" name="kondisi" value="<?php echo $table->kondisi; ?>" required>
	    		</div>
	    	</div>
	    	<div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>COST CENTER</label>
						<input style="text-transform:uppercase" class="form-control" name="costcenter" value="<?php echo $table->costcenter; ?>" required>
	    		</div>
	    	</div>
	    	<div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>NO ASSET</label>
						<input style="text-transform:uppercase" class="form-control" name="noasset" value="<?php echo $table->noasset; ?>" required>
	    		</div>
	    	</div>
	    	<div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>NO EQUIPMENT</label>
						<input style="text-transform:uppercase" class="form-control" name="noequipment" value="<?php echo $table->noequipment; ?>" required>
	    		</div>
	    	</div>
	    	<div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>DESKRIPSI</label>
						<input style="text-transform:uppercase" class="form-control" name="desc" value="<?php echo $table->desc; ?>" required>
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