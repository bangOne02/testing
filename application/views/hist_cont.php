


<div class="col-md-12">
<div id="panel_1" class="box box-primary box-solid" >
	  <div class="box-header with-border">
	    <h3 class="box-title">&nbsp</h3>
	    <div class="box-tools pull-right">
		    <button type="button" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
		</div>
	   
	  </div>
    <?php
          $admin_name = $this->session->userdata('admin_name');
          if ($admin_name == 'admin')
          { ?>
	  <form id="form_add_container" method="post" action="#">
	    <div class="box-body">
	    	<div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>INPUT NOMOR CONTAINER</label>
            
						<input style="text-transform:uppercase" placeholder="ENTER NAMA CONTAINER" class="form-control" name="nomorcontainer" required>
	    		</div>	
	    	</div>
	    </div>
	    <div class="box-footer">
	      <button type="submit" style="background-color: #005b71; border-color: #005b71;" class="btn btn-sm btn-primary btn-flat pull-right">SUBMIT</button>
	    </div>
	  </form>
    <?php
          }
    ?>
	</div>
	
    <div class="nav-tabs-custom">
        
             
              <div class="box box-primary box-solid">
                <div class="box-header with-border" style="height: 39px;">
                  <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool call-refresh"><i class="fa fa-refresh"></i> REFRESH</button>
                  </div>
                 
                </div>

                    
                <div id="list_hist_cont" class="box-body"></div>
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

<div class="modal fade" id="modal-approve">
<div class="modal-dialog" style="width: 80%;margin: auto;">
<div class="modal-content">
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title">FORM APPROVE</h4>
</div>
<div id="target-approve" class="modal-body">
  
</div> 
</div>
</div>
</div>