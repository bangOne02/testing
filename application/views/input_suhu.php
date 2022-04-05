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
          	<div class="box-header with-border" style="height: 39px;background-color: #222d32;">
			    <div class="box-tools pull-right">
			    	
		        </div>
			</div>
                    <div class="box box-primary panel-hidden box-solid" style="display: block;">
					  <form id="form_add_suhu" method="post" action="#">
                            <div class="col-md-6">
								<div class="form-group">
									<br>
					    			<label>PIC</label>
										<input style="text-transform:uppercase" placeholder="" class="form-control" id="nkasbon" name="pic" required>
                                        <input type="hidden" class="form-control" id="nocontainer" name="idcontainer" value="<?php echo $idcontainer; ?>">
					    		</div>
					    	</div>
                            <div class="col-md-6">
								<div class="form-group">
									<br>
					    			<label>SUHU</label>
										<input style="text-transform:uppercase" type="number" placeholder="" class="form-control" id="nkasbon" name="suhu" required>
					    		</div>
					    	</div>
					    	<div class="col-md-12">
								<div class="form-group">
									<br>
					    			<label>KETERANGAN</label>
										<input style="text-transform:uppercase" type="text" placeholder="" class="form-control" id="nkasbon" name="keterangan" required>
					    		</div>
					    	</div>
					   
					    <div id="myDIV" class="col-md-12">
					    <div class="box-footer">
					      <br>
					      	
					      <button type="submit" style="background-color: #005b71; border-color: #005b71;" class="btn btn-sm btn-primary btn-flat pull-right">SIMPAN</button>
					    </div>
					    </div>
					    <div class="box-footer">
					      &nbsp;
					    </div>
					  </form>
					</div>
				    <div class="box box-primary box-solid">
					  <div class="box-header with-border" style="height: 39px;">
					    <div class="box-tools pull-right">
					    	<button type="button" class="btn btn-box-tool call-refresh"><i class="fa fa-refresh"></i> REFRESH</button>
				        </div>
				       
					  </div>

					  	
					  <div id="list_table_suhu" class="box-body"></div>
					</div>
          </div>
</div>