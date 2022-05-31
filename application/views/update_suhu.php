<script>
    $(document).ready(function(){
        $('.date').datepicker({
            locale: {
            dateFormat: 'YYYY-MM-DD'
            },
        });
    });
</script>

<form id="form-update" method="post">
	<div class="row">
		<div class="col-md-12">
			<div class="box-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <br>
                        <label>TANGGAL</label>
                        <!-- <input class="form-control date" placeholder="" value="<?php echo $table->tanggal; ?>" name="tanggal" autocomplete="off" style="height: fit-content;" required> -->
                        <!-- <input class="form-control" type="date" value="<?php echo $table->tanggal; ?>" data-date-format="dd-mm-yyyy" id="tanggal2" name="tanggalrequest" autocomplete="off" required> -->
                        <input class="form-control date" data-date-format="dd-mm-yyyy" placeholder="" value="<?php echo date('d-m-Y',strtotime($table->tanggal)); ?>" name="tanggal" autocomplete="off" style="height: fit-content;" required>          
                    </div>
                </div>    
                <div class="col-md-12">
                    <div class="form-group">
                        <br>
                        <label>JAM</label>
                        <input style="text-transform:uppercase" placeholder="00:00 AM" class="form-control" type="time" value="<?php echo $table->jam; ?>"  name="jam"
                                required><span class="validity"></span>	
                    </div>
                </div>    
                <div class="col-md-12">
                    <div class="form-group">
                        <br>
                        <label>SUHU</label>
                            <!-- <input style="text-transform:uppercase" type="" class="form-control" name="suhu" value="<?php echo $table->suhu; ?>" required> -->
                            <input style="text-transform:uppercase" type="number" step="0.01" value="-0" placeholder="" value="<?php echo $table->suhu; ?>" class="form-control" name="suhu" required>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <br>
                        <label>PIC</label>
                            <input style="text-transform:uppercase" class="form-control" name="pic" value="<?php echo $table->pic; ?>" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <br>
                        <label>KETERANGAN</label>
                            <input style="text-transform:uppercase" class="form-control" name="keterangan" value="<?php echo $table->keterangan; ?>" required>
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