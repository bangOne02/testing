<div class="col-md-12">
	<div id="panel_1" class="box box-primary panel-hidden box-solid" >
	  <div class="box-header with-border" >
	    <h3 class="box-title">&nbsp;</h3> 
	    <div class="box-tools pull-right">
		    <button type="button" class="btn btn-box-tool call-minimize-request"><i class="fa fa-minus"></i> MINIMIZE</button>
		</div>
	  </div>
	  <form id="form_add_request" method="post" action="#">
			<div class="col-md-12">
				<div class="bootstrap-timepicker">
				<div class="form-group">
					<br>
					<label>KEPERLUAN</label>
						<input style="text-transform:uppercase" class="form-control" type="text"  name="keperluan" required>
				</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<br>
					<label>EXTENSION</label>
						<input style="text-transform:uppercase" placeholder="" class="form-control" id="nkasbon" name="extension" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="bootstrap-timepicker">
				<div class="form-group">
					<br>
					<label>JUMLAH PENUMPANG</label>
						<input style="text-transform:uppercase" class="form-control" type="text"  name="jumlah" required>
				</div>
				</div>
			</div>
			<div class="col-md-6">
					<div class="form-group">
						<br>
						<label>TANGGAL REQUEST
						</label>
						<input class="form-control" type="date" data-date-format="dd-mm-yyyy" id="tanggal2" name="tanggalrequest" autocomplete="off" required>
					</div> 
			</div>
			<div class="col-md-6">
				<div class="bootstrap-timepicker">
				<div class="form-group">
					<br>
					<label>JAM</label>
						<input style="text-transform:uppercase" placeholder="00:00 AM" class="form-control" min="06:00:00" max="21:00:00" type="time" name="jamrequest" 
							required><span class="validity"></span>
				</div>
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
	        <button type="button" class="btn btn-box-tool call-add-request"><i class="fa fa-plus"></i> REQUEST BARU</button>
			<button type="button" class="btn btn-box-tool call-refresh"><i class="fa fa-refresh"></i> REFRESH</button>
        </div>
	  </div>
	  <div id="list_table_request" class="box-body"></div>
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
