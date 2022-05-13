<style type="text/css">
.addBtn {
  padding: 10px;
  width: 25%;
  background: #d9d9d9;
  color: #555;
  float: left;
  text-align: center;
  font-size: 16px;
  cursor: pointer;
  transition: 0.3s;
  border-radius: 0;
}

.addBtn:hover {
  background-color: #bbb;
}
</style>

<?php
$admin_name = $this->session->userdata('admin_name');
if ($admin_name != 'accounting' && $admin_name != 'checker1' && $admin_name != 'checker2' && $admin_name != 'admin')
{ ?>

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
										<label>TANGGAL KASBON</label>
										<input class="form-control date" data-date-format="dd-mm-yyyy" style="height: fit-content;" placeholder="INPUT TANGGAL KASBON" id="tanggal2" name="tanggal" autocomplete="off" required>
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
<?php
} else
{
?>		
<div class="col-md-12">
	
          <div class="nav-tabs-custom">
			    
				    <div class="box box-primary box-solid">
					  <div class="box-header with-border" style="height: 39px;">
					    <div class="box-tools pull-right">
					    	<button type="button" class="btn btn-box-tool call-refresh"><i class="fa fa-refresh"></i> REFRESH</button>
				        </div>
					  </div>
					  <?php
			          if ($admin_name == 'accounting')
			          { ?>
						  <div class="box-header" style="height: 39px;background: white;color: black;">
							    <div class="table-wrapper">
								     	<span class="date-label">PERIODE TANGGAL KASBON:&nbsp; </span><input autocomplete="off" class="date" style="height: fit-content;"  data-date-format="dd-mm-yyyy" type="text" id="tanggall" />
						                &nbsp;&nbsp;&nbsp;&nbsp;
						                <button type="button" id="btn-tgl" data-toggle="modal" style="padding: 0px 14px;">SUBMIT</button> 						            
								</div>
						  </div> 
					  <?php } ?>
					  <div id="list_table_biaya" class="box-body"></div>
					</div>
              
          </div>
</div>
<?php
} 
?>

<div class="modal fade" id="modal-update-biaya">
  <div class="modal-dialog" style="width: 80%;margin: auto;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Update</h4>
      </div>
      <div id="target-update-biaya" class="modal-body">
      </div> 
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