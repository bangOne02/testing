<div class="col-md-12">
	<form id="form_add_1" method="post" action="<?php echo base_url('Proses/insertData'); ?>" enctype="multipart/form-data">
	   
	<div id="panel_1" class="box box-success box-solid">
	  <div class="box-header with-border" style="background-color: #337ab7; border-color: #337ab7;" >
	    <h3 class="box-title">PROSES PEMERIKSAAN</h3>
	  </div>
	    <div class="box-body">
	    	<div class="col-md-12">
				<label>NOMOR SURAT JALAN</label><input class="form-control" id="nosj"  value="<?php echo $nosj; ?>" name="nomorsj" placeholder="isi nomor surat jalan..." required> 
	    	</div>  
	    </div>
	    <div class="box-footer">
	      
	      <button type="button" id="mulai" class="btn btn-sm btn-primary btn-flat pull-right"> SUBMIT</button>
	    </div>
	 
	  
	</div>
	<div class="box box-success box-solid">
	  <div class="card card-primary card-outline card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item active">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">DETAIL SURAT JALAN</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">PEMERIKSAAN KENDARAAN</a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">PEMERIKSAAN KONTAINER</a>
                  </li> -->
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade active in" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">  
                  	<div>
					    <table style="margin-left: 30px;margin-top: 30px;">
					    	<tr>
					    		<td>NOMOR SURAT JALAN</td>
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
					    	<tr>
					    		<td>KETERANGAN</td>
					    		<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
					    		<td><p id="keterangan" style="margin: 0 0 0px;"></p></td>
					    	</tr>
					    	<tr>
					    		<td>&nbsp;</td>
					    		<td>&nbsp;</td>
					    		<td>&nbsp;</td>
					    	</tr>
					    </table>
					</div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                     <div>
					    <div id="list_table" class="box-body"></div>
					  </div>
                  </div>
                <!--   <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                     <div>
					    <div id="list_table2" class="box-body"></div>
					  </div>
                  </div> -->
                </div>
              </div>
      </div>	
	  <div class="box-footer" >	
	  	<button type="submit" id="selesai" class="btn btn-sm btn-primary btn-flat pull-right">SIMPAN</button>&nbsp;&nbsp;
	  </div>
	</div> 
	 </form>
</div>

