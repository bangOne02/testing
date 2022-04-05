


<div class="col-md-12">
	
          <div class="nav-tabs-custom">
          	<div class="box-header with-border" style="height: 39px;background-color: #005b71;">
			    <div class="box-tools pull-right">
			    	
		        </div>
			</div>
                    <div class="box box-primary panel-hidden box-solid" style="display: block;">
					  <form id="form_biaya" method="post" action="#">
					    	<div class="col-md-12">
								<div class="form-group">
									<br>
					    			<label>NOMOR KASBON</label>
										<input style="text-transform:uppercase" placeholder="INPUT NOMOR KASBON" class="form-control" id="nkasbon" name="nomorkasbon" required>
					    		</div>
					    	</div>
					    	<div class="col-md-12">
									<div class="form-group">
										<br>
										<label>TANGGAL KASBON
										</label>
										<input class="form-control date" data-date-format="dd-mm-yyyy" placeholder="INPUT TANGGAL KASBON" id="tanggal2" name="tanggal" autocomplete="off" required>
									</div> 
							</div>
					    	<div class="col-md-12">
								<div class="form-group">
					    			<br>
					    			<label>NOMINAL KASBON</label>
										<input style="text-transform:uppercase" placeholder="0" value=0 class="form-control" id="nomi" name="nominal" required>
					    		</div>
					    	</div>
					    <div id="myDIV" class="col-md-12">
					    <div class="box-footer">
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

					  	
					  <div id="list_table_biaya" class="box-body"></div>
					</div>
          </div>
</div>


<div class="modal fade" id="modal-preview" role="dialog">
  <div class="modal-dialog" style="width: 80%;margin: auto;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">INPUT DETAIL BIAYA</h4>
      </div>
      <div id="target-preview" class="modal-body">
        
      </div> 
    </div>
  </div>
</div>