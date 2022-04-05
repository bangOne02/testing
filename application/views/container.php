<div class="col-md-12">
	<div id="panel_1" class="box box-primary panel-hidden box-solid" >
	  <div class="box-header with-border">
	    <h3 class="box-title">TAMBAH CONTAINER</h3>
	    <div class="box-tools pull-right">
		    <button type="button" class="btn btn-box-tool call-minimize-container"><i class="fa fa-minus"></i> MINIMIZE</button>
		</div>
	   
	  </div>
	  <form id="form_add_container" method="post" action="#">
	    <div class="box-body">
	    	<div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>NAMA CONTAINER</label>
						<input style="text-transform:uppercase" class="form-control" name="namacontainer" required>
	    		</div>
	    		<div class="form-group">
	    			<br>
	    			<label>KONDISI</label>
						<input style="text-transform:uppercase" class="form-control" name="kondisi" required>
	    		</div>
	    		<div class="form-group">
	    			<br>
	    			<label>COSTCENTER</label>
	    				<input style="text-transform:uppercase" class="form-control" name="costcenter" required>
	    		</div>
	    		<div class="form-group">
	    			<br>
	    			<label>NOMOR ASSET</label>
						<input style="text-transform:uppercase" class="form-control" name="noasset" required>
	    		</div>
	    		<div class="form-group">
	    			<br>
	    			<label>NOMOR EQUIPMENT</label>
						<input style="text-transform:uppercase" class="form-control" name="noequipment" required>
	    		</div>
	    		<div class="form-group">
	    			<br>
	    			<label>DESKRIPSI</label>
						<input style="text-transform:uppercase" class="form-control" name="deskripsi" required>
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
       		<button type="button" class="btn btn-box-tool call-add-container"><i class="fa fa-plus"></i> ADD NEW</button>
            <button type="button" class="btn btn-box-tool call-refresh"><i class="fa fa-refresh"></i> REFRESH</button>
        </div>
	  </div>
	  <!-- /.box-header -->
	  <!-- form start -->
	    <div id="list_table_container" class="box-body"></div>
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
      <div id="target-update-container" class="modal-body">
        
      </div> 
    </div>
  </div>
</div>





