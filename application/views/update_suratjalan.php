<form id="form-update" method="post">
	<div class="row">
		  <div class="box-body">
	    	<div class="col-md-12">
	    		<div class="form-group">
	    			<label>NOMOR SURAT JALAN</label>
						<input style="text-transform:uppercase" class="form-control" name="nomor" required>
	    		</div>
	    	</div>
	    	<div class="col-md-12">
				<div class="form-group">
	    			<label>TUJUAN ASAL SURAT JALAN</label>
						<select class="form-control" name="asal" style="color: black">
				    			<option value="surabaya">SURABAYA</option>
				    			<option value="lamongan">LAMONGAN</option>
				    			<option value="dampit">DAMPIT</option>
				    			<option value="lampung">LAMPUNG</option>
				    	</select>
	    		</div>
	    	</div>
	    	<div class="col-md-6">
				<div class="form-group">
	    			<label>TUJUAN AKHIR SURAT JALAN</label>
						<select id="tujuan" class="form-control select2" name="tujuan" style="height: 20px;">
						
						</select>
	    		</div>
	    	</div> 
	    	<div class="col-md-6">
				<div class="form-group">
	    			<label>&nbsp;</label>
						<input style="text-transform:uppercase" id="itujuan" class="form-control" name="itujuan" disabled required>
	    		</div>
	    	</div>  
	    	<div class="col-md-3">
				<div class="form-group">
	    			<label>UKURAN KENDARAAN</label>
	    			
	    			<br>
	    			<label style="display: flex;
  justify-content: flex-start;
  align-items: center;
  flex-wrap: nowrap;
  margin: 12px 0;
  cursor: pointer;
  position: relative;">
						  <input type="radio" id="ukuran" name="size" value="1" checked="true" style="margin: 0px 0 0;"><span class="circle" style="width: 16px;
  height: 20px;
  border: 1px solid var(--second-color);
  border-radius: 100%;
  margin-right: 15px;
  position: relative;"></span><span class="text" style="color: var(--second-color);
  font-weight: bold;">KENDARAAN BESAR</span>
						<!--   <label for="male">KECIL</label><br>
						  <input type="radio" id="female" name="gender" value="female">
						  <label for="female">BESAR</label><br> -->
						</label>

						<label style="display: flex;
  justify-content: flex-start;
  align-items: center;
  flex-wrap: nowrap;
  margin: 12px 0;
  cursor: pointer;
  position: relative;">
						  <input type="radio" id="ukuran" name="size" value="0" style="margin: 0px 0 0;"><span class="circle" style="width: 16px;
  height: 20px;
  border: 1px solid var(--second-color);
  border-radius: 100%;
  margin-right: 15px;
  position: relative;"></span><span class="text" style="color: var(--second-color);
  font-weight: bold;">KENDARAAN KECIL</span>
						<!--   <label for="male">KECIL</label><br>
						  <input type="radio" id="female" name="gender" value="female">
						  <label for="female">BESAR</label><br> -->
						</label>

	    		</div>
	    	</div>
	    	<div class="col-md-9">
				<div class="form-group" >
	    			<label>SASIS KENDARAAN</label>
						<select id="sasis" class="form-control select2" name="sasis" >
						
						</select>
	    		</div>
	    	</div> 
	    	<div class="col-md-9">
				<div class="form-group" id="idtugas">
	    			<label>TUGAS</label>
						<input style="text-transform:uppercase" class="form-control" id="tugas" name="tugas">
	    		</div>
	    	</div>  
	    	<div class="col-md-12">
				<div class="form-group">
	    			<label>NAMA KENDARAAN</label>
						<select id="kendaraan" class="form-control select2" name="kendaraan">
						
						</select>
	    		</div>
	    	</div> 
	    	<div class="col-md-4">
				<div class="form-group">
	    			<label>DRIVER KENDARAAN</label>
						<select id="sopir" class="form-control select2" name="sopir">
						
						</select>
	    		</div>
	    	</div> 
	    	<div class="col-md-8">
				<div class="form-group">
	    			<label>&nbsp;</label>
						<input style="text-transform:uppercase" id="isopir" class="form-control" name="isopir" disabled required>
	    		</div>
	    	</div> 
	    	<div class="col-md-12">
					<div class="form-group">
						<label>TANGGAL RENCANA KEBERANGKATAN
						</label>
						<input class="form-control date" data-date-format="yyyy-mm-dd" name="tanggal" autocomplete="off" required>
					</div> 
			</div>

	    	<div class="col-md-12">
				<div class="form-group">
	    			<label>KETERANGAN</label>
						<input style="text-transform:uppercase" class="form-control" name="keterangan" required>
	    		</div>
	    	</div> 
	    <!-- 	<div class="col-md-12">
					<div class="form-group">
						<label>TANGGAL TEST</label>
						<input class="form-control date" data-date-format="yyyy-mm-dd" name="tanggal" autocomplete="off" required>
					</div> 
			</div> -->
	    </div>	
	</div>
</form>




<div class="col-md-12">
	<div id="panel_1" class="box box-primary panel-hidden box-solid" >
	  <div class="box-header with-border" style="background-color: #337ab7; border-color: #337ab7;" >
	    <h3 class="box-title">FORM SURAT JALAN</h3> 
	    <div class="box-tools pull-right">
		    <button type="button" class="btn btn-box-tool call-minimize-suratjalan"><i class="fa fa-minus"></i> MINIMIZE</button>
		</div>
	  </div>
	  <form id="form_add_1" method="post" action="#">
	    <div class="box-body">
	    	<div class="col-md-12">
	    		<div class="form-group">
	    			<label>NOMOR SURAT JALAN</label>
						<input style="text-transform:uppercase" class="form-control" name="nomor" required>
	    		</div>
	    	</div>
	    	<div class="col-md-12">
				<div class="form-group">
	    			<label>TUJUAN ASAL SURAT JALAN</label>
						<select class="form-control" name="asal" style="color: black">
				    			<option value="surabaya">SURABAYA</option>
				    			<option value="lamongan">LAMONGAN</option>
				    			<option value="dampit">DAMPIT</option>
				    			<option value="lampung">LAMPUNG</option>
				    	</select>
	    		</div>
	    	</div>
	    	<div class="col-md-6">
				<div class="form-group">
	    			<label>TUJUAN AKHIR SURAT JALAN</label>
						<select id="tujuan" class="form-control select2" name="tujuan" style="height: 20px;">
						
						</select>
	    		</div>
	    	</div> 
	    	<div class="col-md-6">
				<div class="form-group">
	    			<label>&nbsp;</label>
						<input style="text-transform:uppercase" id="itujuan" class="form-control" name="itujuan" disabled required>
	    		</div>
	    	</div>  
	    	<div class="col-md-3">
				<div class="form-group">
	    			<label>UKURAN KENDARAAN</label>
	    			
	    			<br>
	    			<label style="display: flex;
  justify-content: flex-start;
  align-items: center;
  flex-wrap: nowrap;
  margin: 12px 0;
  cursor: pointer;
  position: relative;">
						  <input type="radio" id="ukuran" name="size" value="1" checked="true" style="margin: 0px 0 0;"><span class="circle" style="width: 16px;
  height: 20px;
  border: 1px solid var(--second-color);
  border-radius: 100%;
  margin-right: 15px;
  position: relative;"></span><span class="text" style="color: var(--second-color);
  font-weight: bold;">KENDARAAN BESAR</span>
						<!--   <label for="male">KECIL</label><br>
						  <input type="radio" id="female" name="gender" value="female">
						  <label for="female">BESAR</label><br> -->
						</label>

						<label style="display: flex;
  justify-content: flex-start;
  align-items: center;
  flex-wrap: nowrap;
  margin: 12px 0;
  cursor: pointer;
  position: relative;">
						  <input type="radio" id="ukuran" name="size" value="0" style="margin: 0px 0 0;"><span class="circle" style="width: 16px;
  height: 20px;
  border: 1px solid var(--second-color);
  border-radius: 100%;
  margin-right: 15px;
  position: relative;"></span><span class="text" style="color: var(--second-color);
  font-weight: bold;">KENDARAAN KECIL</span>
						<!--   <label for="male">KECIL</label><br>
						  <input type="radio" id="female" name="gender" value="female">
						  <label for="female">BESAR</label><br> -->
						</label>

	    		</div>
	    	</div>
	    	<div class="col-md-9">
				<div class="form-group" >
	    			<label>SASIS KENDARAAN</label>
						<select id="sasis" class="form-control select2" name="sasis" >
						
						</select>
	    		</div>
	    	</div> 
	    	<div class="col-md-9">
				<div class="form-group" id="idtugas">
	    			<label>TUGAS</label>
						<input style="text-transform:uppercase" class="form-control" id="tugas" name="tugas">
	    		</div>
	    	</div>  
	    	<div class="col-md-12">
				<div class="form-group">
	    			<label>NAMA KENDARAAN</label>
						<select id="kendaraan" class="form-control select2" name="kendaraan">
						
						</select>
	    		</div>
	    	</div> 
	    	<div class="col-md-4">
				<div class="form-group">
	    			<label>DRIVER KENDARAAN</label>
						<select id="sopir" class="form-control select2" name="sopir">
						
						</select>
	    		</div>
	    	</div> 
	    	<div class="col-md-8">
				<div class="form-group">
	    			<label>&nbsp;</label>
						<input style="text-transform:uppercase" id="isopir" class="form-control" name="isopir" disabled required>
	    		</div>
	    	</div> 
	    	<div class="col-md-12">
					<div class="form-group">
						<label>TANGGAL RENCANA KEBERANGKATAN
						</label>
						<input class="form-control date" data-date-format="yyyy-mm-dd" name="tanggal" autocomplete="off" required>
					</div> 
			</div>

	    	<div class="col-md-12">
				<div class="form-group">
	    			<label>KETERANGAN</label>
						<input style="text-transform:uppercase" class="form-control" name="keterangan" required>
	    		</div>
	    	</div> 
	    </div>
	    <!-- /.box-body -->
	    <div class="box-footer">
	      <button type="submit" style="background-color: #337ab7; border-color: #337ab7;" class="btn btn-sm btn-primary btn-flat pull-right">SIMPAN</button>
	    </div>
	  </form>
	</div>

 	<div class="box box-primary box-solid">
	  <div class="box-header with-border" style="background-color: #337ab7; border-color: #337ab7;height: 39px;">
	    <div class="box-tools pull-right">
	    	<button type="button" class="btn btn-box-tool call-add-suratjalan"><i class="fa fa-plus"></i> ADD NEW</button>
            <button type="button" class="btn btn-box-tool call-refresh"><i class="fa fa-refresh"></i> REFRESH</button>
        </div>
	  </div>
	  <div id="list_table" class="box-body"></div>
	</div>  
</div> 

<div class="modal fade" id="modal-update">
  <div class="modal-dialog" style="width: 80%;margin: auto;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Update</h4>
      </div>
      <div id="target-update" class="modal-body">
      </div> 
    </div>
  </div>
</div>


<div class="modal fade" id="modal-preview">
  <div class="modal-dialog" style="width: 80%;margin: auto;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">PREVIEW SURAT JALAN</h4>
      </div>
      <div id="target-preview" class="modal-body">
        
      </div> 
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
