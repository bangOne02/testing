
<div class="col-md-12">
	<div id="panel_1" class="box box-primary panel-hidden box-solid" >
	  <div class="box-header with-border" style="background-color: #337ab7; border-color: #337ab7;" >
	    <h3 class="box-title">TAMBAH KENDARAAN</h3>
	    <div class="box-tools pull-right">
		    <button type="button" class="btn btn-box-tool call-minimize-tujuan"><i class="fa fa-minus"></i> MINIMIZE</button>
		</div>
	   
	  </div>
	  <form id="form_add_tujuan" method="post" action="#">
	    <div class="box-body">
	    	<div class="col-md-6">
	    		<div class="form-group">
	    			<label>TUJUAN SURAT JALAN</label>
						<input style="text-transform:uppercase" class="form-control" name="nopol" required>
	    		</div>
	    	</div>
	    </div>
	    <div class="box-footer">
	      <button type="submit" style="background-color: #337ab7; border-color: #337ab7;" class="btn btn-sm btn-primary btn-flat pull-right">SUBMIT</button>
	    </div>
	  </form>
	</div>

	<div class="box box-primary box-solid">
	  <div class="box-header with-border" style="background-color: #337ab7; border-color: #337ab7; height: 39px;">
	    <div class="box-tools pull-right">
       		<button type="button" class="btn btn-box-tool call-add-tujuan"><i class="fa fa-plus"></i> ADD NEW</button>
            <button type="button" class="btn btn-box-tool call-refresh"><i class="fa fa-refresh"></i> REFRESH</button>
        </div>
	  </div>
	  <!-- /.box-header -->
	  <!-- form start -->
	    <div id="list_table_tujuan" class="box-body"></div>
	    <!-- /.box-body -->
	</div> 
</div> 











