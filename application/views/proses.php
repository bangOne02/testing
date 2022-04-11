<div class="col-md-12">
	<div id="panel_1" class="box box-success box-solid">
	  <div class="box-header with-border" style="background-color: #222d32; border-color: #337ab7;" >
	    <h3 class="box-title">PROSES PEMERIKSAAN</h3>
	  </div>
	    <div class="box-body">
	    	<div class="col-md-12">
	    	   <input class="form-control" onfocus="this.value=''" id="nosj" type="password" value="<?php echo $nosj; ?>" name="nomorsj" placeholder="" required>
			   <!-- <input id="proces" type="hidden" value="<?php echo $proces; ?>" name="proces" placeholder="" required> -->
			   <input disabled type="hidden" class="form-control" id="proces" value="<?php echo $proces; ?>" name="proces" required> 
			</div>  
	    </div>
	    <div class="box-footer">
	      <div id="qr-reader"></div>
          <div id="qr-reader-results"></div> 
	      <button type="button"  id="mulai" class="btn btn-sm btn-primary btn-flat pull-right" style="visibility: hidden;"> SUBMIT</button>
		</div>
		
	</div>

	<form id="form_add_1" method="post" action="<?php echo base_url('Proses/insertData'); ?>" enctype="multipart/form-data">

	<div class="box box-success box-solid">
	  <div class="card card-primary card-outline card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                 
                </ul>
              </div>
              <div class="card-body">
                  	<div>
					    <table style="margin-left: 30px;margin-top: 30px;">
					    	<tr>
					    		<td>NOMOR</td>
					    		<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
					    		<td><p id="nomorsuratjalan" style="margin: 0 0 0px;"></p>
					    			<input class="form-control"  id="nosuratjalan" name="nosuratjalan" type="hidden">
					    		</td>
					    	</tr>
					    	<tr>
					    		<td>&nbsp;</td>
					    		<td>&nbsp;</td>
					    		<td>&nbsp;</td>
					    	</tr>
					    	<tr>
					    		<td>TUJUAN</td>
					    		<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
					    		<td><p id="tujuan" style="margin: 0 0 0px;"></p></td>
					    	</tr>
					    	<tr>
					    		<td>&nbsp;</td>
					    		<td>&nbsp;</td>
					    		<td>&nbsp;</td>
					    	</tr>
					    </table>
					</div>
                  
                 
            <div>
					    <div id="list_table" class="box-body"></div>
					  </div>
                 
              </div>
      </div>	
	  <div class="box-footer" >	
	  	<button type="submit" id="selesai" disabled="true" class="btn btn-sm btn-primary btn-flat pull-right">SIMPAN</button>&nbsp;&nbsp;
	  </div>
	</div> 
	 </form>
</div>


