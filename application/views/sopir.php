
<div class="col-md-12">
	<div id="panel_1" class="box box-primary box-solid" >
	  <div class="box-header with-border">
	    <h3 class="box-title">TAMBAH DRIVER</h3>
	    <div class="box-tools pull-right">
		    <button type="button" class="btn btn-box-tool call-minimize"><i class="fa fa-minus"></i> MINIMIZE</button>
		</div>
	   
	  </div>
	  <form id="form_add_sopir" method="post" action="#">
	    <div class="box-body">
	    	<div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>NAMA DRIVER</label>
						<input style="text-transform:uppercase" placeholder="ENTER NAMA DRIVER" class="form-control" name="namadriver" required>
	    		</div>
	    		<div class="form-group">
	    			<br>
	    			<label>JENIS SIM</label>
						<input style="text-transform:uppercase" placeholder="ENTER JENIS SIM" class="form-control" name="jenissim" required>
	    		</div>
	    		<div class="form-group">
	    			<br>
	    			<label>NOMOR SIM</label>
						<input style="text-transform:uppercase" placeholder="ENTER NOMOR SIM" class="form-control" name="nomorsim" required>
	    		</div>
				<div class="form-group">
	    			<br>
	    			<label>NOMOR HANDPHONE</label>
						<input style="text-transform:uppercase" placeholder="ENTER HANDPHONE" class="form-control" name="nomorhp" required>
	    		</div>
	    		<div class="form-group">
	    			<br>
	    			<label>JENIS KENDARAAN</label>
						<select class="form-control select2" id="jeniskendaraan" name="jeniskendaraan">
				    			<option value="kecil">KENDARAAN KECIL</option>
				    			<option value="besar">KENDARAAN BESAR</option>
				    	</select>
	    		</div>
	    	</div>
	    </div>
	    <div class="box-footer">
	      <button type="submit" style="background-color: #005b71; border-color: #005b71;" class="btn btn-sm btn-primary btn-flat pull-right">SUBMIT</button>
	    </div>
	  </form>
	</div>

	<div class="box box-primary box-solid">
	  <div class="box-header with-border" style="height: 39px;">
	    <div class="box-tools pull-right">
       		<button type="button" class="btn btn-box-tool call-add"><i class="fa fa-plus"></i> ADD NEW</button>
            <button type="button" class="btn btn-box-tool call-refresh"><i class="fa fa-refresh"></i> REFRESH</button>
        </div>
	  </div>
	  <!-- /.box-header -->
	  <!-- form start -->
	  <div id="list_table_sopir" class="box-body"></div>
	    <!-- /.box-body -->
	</div> 
</div> 