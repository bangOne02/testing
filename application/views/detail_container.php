<div class="col-md-12">
	<div id="panel_1" class="box box-success box-solid">
	    <div class="box-header with-border" style="background-color: #222d32; border-color: #222d32;" >
	        <h3 class="box-title">NOMOR CONTAINER</h3>
	    </div>
	    <div class="box-body">
	    	<div class="col-md-12">
	    	    <!-- <label>NOMOR CONTAINER : <?php echo strtoupper($nocontainer); ?></label>  -->
               <input disabled class="form-control" id="nocontainer" value="<?php echo $nocontainer; ?>">
               <input disabled type="hidden" class="form-control" id="idcontainer" value="<?php echo $idcontainer; ?>">
	    	</div>  
	    </div>
	</div>
</div>


<div class="col-md-12">
	
          <div class="nav-tabs-custom">
          
                    <div class="box box-primary box-solid">
					  <div class="box-header with-border" style="height: 39px;">
                        <h3 class="box-title">HISTORICAL MUATAN</h3>
					    <div class="box-tools pull-right">
					    	<button type="button" class="btn btn-box-tool call-refresh"><i class="fa fa-refresh"></i> REFRESH</button>
				        </div>
				       
					  </div>

					  	
					  <div id="list_table_muatan" class="box-body"></div>
					</div>
				    <div class="box box-primary box-solid">
					  <div class="box-header with-border" style="height: 39px;">
                        <h3 class="box-title">HISTORICAL SUHU</h3>
					    <div class="box-tools pull-right">
					    	<button type="button" class="btn btn-box-tool call-refresh"><i class="fa fa-refresh"></i> REFRESH</button>
				        </div>
				       
					  </div>

					  	
					  <div id="list_table_suhu" class="box-body"></div>
					</div>
          </div>
</div>