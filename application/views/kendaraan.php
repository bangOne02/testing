

<div class="col-md-12">
	<div id="panel_1" class="box box-primary panel-hidden box-solid" >
	  <div class="box-header with-border">
	    <h3 class="box-title">TAMBAH KENDARAAN</h3>
	    <div class="box-tools pull-right">
		    <button type="button" class="btn btn-box-tool call-minimize"><i class="fa fa-minus"></i> MINIMIZE</button>
		</div>
	   
	  </div>
	  <form id="form_add_1" method="post" action="#">
	    <div class="box-body">
	    	<div class="col-md-6">
	    		<div class="form-group">
	    			<br>
	    			<label>NOMOR POLISI</label>
						<input style="text-transform:uppercase" class="form-control" name="nopol" required>
	    		</div>
	    		<!-- <div class="form-group">
	    			<br>
	    			<label>NOMOR POLISI LAMA</label>
	    			<select class="form-control select2" name="nopol_lama">
	    				<option value="0">-</option>
	    				<?php foreach ($kendaraan as $row){ ?>
			    			<option value="<?php echo $row->id; ?>"><?php echo str_replace(' ', '', $row->nopol); ?></option>
			    		<?php } ?>
	    			</select>
						
	    		</div> -->
	    		<div class="form-group">
	    			<br>
	    			<label>NOMOR ASSET</label>
						<input style="text-transform:uppercase" class="form-control" name="no_asset" required>
	    		</div>
	    		<div class="form-group">
	    			<br>
	    			<label>NAMA KENDARAAN</label>
	    			<select class="form-control select2" name="jenis">
	    				<?php foreach ($jenis as $row){ ?>
			    			<option value="<?php echo $row->id; ?>"><?php echo $row->nama_jenis; ?></option>
			    		<?php } ?>
	    			</select>
	    		</div>
	    		<div class="form-group">
	    			<br>
	    			<label>NOMOR RANGKA</label>
						<input style="text-transform:uppercase" class="form-control" name="no_rangka" required>
	    		</div>
	    		<div class="form-group">
	    			<br>
	    			<label>NOMOR MESIN</label>
						<input style="text-transform:uppercase" class="form-control" name="no_mesin" required>
	    		</div>
	    		<div class="form-group">
	    			<br>
	    			<label>TAHUN PEMBUATAN</label>
						<input style="text-transform:uppercase" class="form-control" name="tahun" required>
	    		</div>
	    	</div>
	    	<div class="col-md-6">
	    		<div class="form-group">
	    			<br>
	    			<label>A/N STNK</label>
						<input style="text-transform:uppercase" class="form-control" name="an_stnk" required>
	    		</div>
	    		<div class="form-group">
	    			<br>
	    			<label>STNK</label>
						<input class="form-control" type="date" placeholder="DD-MM-YYYY" name="tgl_stnk">
	    		</div>
	    		<div class="form-group">
	    			<br>
	    			<label>JENIS KENDARAAN</label>
						<select class="form-control select2" id="jeniskendaraan" name="jeniskendaraan">
				    			<option value="kecil">KENDARAAN KECIL</option>
				    			<option value="besar">KENDARAAN BESAR</option>
				    	</select>
	    		</div>
	    		<div class="form-group">
	    			<br>
	    			<label>KIR</label>
						<input style="text-transform:uppercase" class="form-control" name="kir" required>
	    		</div>
	    		<div class="form-group">
	    			<br>
	    			<label>COST CENTER</label>
						<input style="text-transform:uppercase" class="form-control" name="costcenter" required>
	    		</div>
	    		<div class="form-group">
	    			<br>
	    			<label>DIVISI</label>
	    			<select class="form-control select2" name="divisi">
	    				<?php foreach ($divisi as $row){ ?>
			    			<option value="<?php echo $row->id; ?>"><?php echo $row->nama_divisi; ?></option>
			    		<?php } ?>
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
	  <div class="box-header with-border" style="height: 35px;">
	 <!--    <select id="plant" style="color: black">
	    	<option value=""></option>
     	<?php foreach ($plant as $row){ ?>
    			<option value="<?php echo $row->id_mplant; ?>"><?php echo $row->nama_mplant; ?></option>
    	 	<?php } ?>
    	</select>  -->
	    
	    <div class="box-tools pull-right">
       		<button type="button" class="btn btn-box-tool call-add"><i class="fa fa-plus"></i> ADD NEW</button>
            <button type="button" class="btn btn-box-tool call-refresh"><i class="fa fa-refresh"></i> REFRESH</button>
          <!--   <button type="button" class="btn btn-box-tool call-refresh"><i class="fa fa-refresh"></i> DOWNLOAD TO EXCEL</button> -->
        </div>
	  </div>
	  <!-- /.box-header -->
	  <!-- form start -->
	    <div id="list_table" class="box-body"></div>
	    <!-- /.box-body -->
	</div> 
</div> 

<div class="modal fade" id="modal-update">
  <div class="modal-dialog" style="width: 80%;margin: auto;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">FORM UPDATE</h4>
      </div>
      <div id="target-update" class="modal-body">
        
      </div> 
    </div>
  </div>
</div>



<div class="modal fade" id="modal-preview">
  <div class="modal-dialog" style="width: 80%;margin: auto;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">PREVIEW DATA KENDARAAN</h4>
      </div>
      <div id="target-preview" class="modal-body">
        
      </div> 
    </div>
  </div>
</div>