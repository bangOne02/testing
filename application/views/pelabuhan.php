
<div class="col-md-12">
	<div id="panel_1" class="box box-primary box-solid" >
	  <div class="box-header with-border" >
	    <h3 class="box-title">TAMBAH PELABUHAN</h3>
	    <div class="box-tools pull-right">
		    <button type="button" class="btn btn-box-tool call-minimize"><i class="fa fa-minus"></i> MINIMIZE</button>
		</div>
	   
	  </div>
	  <form id="form_add_pelabuhan" method="post" action="#">
	    <div class="box-body">
	    	<div class="col-md-8">
	    		<div class="form-group">
	    			<br>
	    			<label>NAMA PELABUHAN</label>
						<input style="text-transform:uppercase" placeholder="" class="form-control" name="namapelabuhan" required>
	    		</div>
	    	</div>
	    	<div class="col-md-4">
	    		<div class="form-group">
	    			<br>
	    			<label>IDX</label>
						<input style="text-transform:uppercase"  class="form-control" name="idx" required>
	    		</div>
	    	</div>
	    	<div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>NAMA ALAMAT</label>
						<input style="text-transform:uppercase" placeholder="" class="form-control" name="alamat" required>
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
	  <div id="list_table_pelabuhan" class="box-body"></div>
	    <!-- /.box-body -->
	</div> 
</div> 