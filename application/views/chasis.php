
<div class="col-md-12">
	<div id="panel_1" class="box box-primary panel-hidden box-solid" >
	  <div class="box-header with-border">
	    <h3 class="box-title">TAMBAH CHASIS</h3>
	    <div class="box-tools pull-right">
		    <button type="button" class="btn btn-box-tool call-minimize-chasis"><i class="fa fa-minus"></i> MINIMIZE</button>
		</div>
	   
	  </div>
	  <form id="form_add_chasis" method="post" action="#">
	    <div class="box-body">
	    	<div class="col-md-8">
	    		<div class="form-group">
	    			<br>
	    			<label>NOMOR CHASIS</label>
						<input style="text-transform:uppercase" type="number" class="form-control" name="namachasis" required>
	    		</div>
	    	</div>
	    	<div class="col-md-4">
	    		<div class="form-group">
	    			<br>
	    			<label>NOMOR KIR</label>
						<input style="text-transform:uppercase" class="form-control" name="nomorkir" required>
	    		</div>
	    	</div>
	    	<div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>NAMA PEMILIK</label>
						<input style="text-transform:uppercase" class="form-control" name="namapemilik" required>
	    		</div>
	    	</div>
	    	<div class="col-md-12">
	    		<div class="form-group">
	    			<br>
						<label>MASA BERLAKU</label>
						<!-- <input class="form-control date" type="date" style="top: 34.2px;" data-date-format="yyyy-mm-dd" name="masaberlaku" autocomplete="off"> -->
						<input class="form-control date" data-date-format="dd-mm-yyyy" style="height: fit-content;"  placeholder="ENTER MASA BERLAKU CHASIS" name="masaberlaku" autocomplete="off">
					</div> 
	    	</div>
	    	<div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>COSTCENTER</label>
						<input style="text-transform:uppercase" class="form-control" name="costcenter" required>
	    		</div>
	    	</div>
	    	<div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>DESKRIPSI</label>
						<input style="text-transform:uppercase" class="form-control" name="deskripsi" required>
	    		</div>
	    	</div>
	    	<div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>NOMOR ASSET</label>
						<input style="text-transform:uppercase" class="form-control" name="nomorasset" required>
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
       		<button type="button" class="btn btn-box-tool call-add-chasis"><i class="fa fa-plus"></i> ADD NEW</button>
            <button type="button" class="btn btn-box-tool call-refresh"><i class="fa fa-refresh"></i> REFRESH</button>
        </div>
	  </div>
	  <div id="list_table_chasis" class="box-body"></div>
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







