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

<div class="col-md-12">
	
          <div class="nav-tabs-custom">
          	<div class="box-header with-border" style="height: 39px;background-color: #222d32;">
			    <div class="box-tools pull-right">
			    	
		        </div>
			</div>
                    <div class="box box-primary panel-hidden box-solid" style="display: block;">
					  <form id="form_jenis" method="post" action="#">
					    	<div class="col-md-12">
								<div class="form-group">
									<br>
					    			<label>NAMA JENIS KENDARAAN</label>
										<input style="text-transform:uppercase" placeholder="" class="form-control" id="nkasbon" name="namajenis" required>
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
					    	
				        </div>
				       
					  </div>

					  	
					  <div id="list_table_jenis" class="box-body"></div>
					</div>
          </div>
</div>
