<script>
    	var currDate = new Date();
		$('.date').datepicker({
			locale: {
			dateFormat: 'YYYY-MM-DD'
			},
			startDate : currDate,
		});
</script>

<form id="form-update-master-biaya" method="post">
	<div class="row">
		<div class="col-md-12">
			<div class="box-body">
                <div class="col-md-8">
                    <div class="form-group">
                        <br>
                        <label>NOMOR KASBON</label>
                            <input style="text-transform:uppercase" class="form-control" name="nomorkasbon" value="<?php echo $table->nomor_kasbon; ?>" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <br>
                        <label>TANGGAL KASBON</label>
                            <input class="form-control date" data-date-format="dd-mm-yyyy" style="height: fit-content;" placeholder="INPUT TANGGAL KASBON" id="tanggal2" name="tanggal" value="<?php echo $table->tanggal; ?>" autocomplete="off" required>
					</div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <br>
                        <label>NOMINAL</label>
                            <input style="text-transform:uppercase" class="form-control" name="nominal" value="<?php echo $table->nominal; ?>" required>
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