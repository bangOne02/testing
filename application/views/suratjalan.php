<div class="col-md-12">
	<div id="panel_1" class="box box-primary panel-hidden box-solid" >
	  <div class="box-header with-border" >
	    <h3 class="box-title">FORM SURAT JALAN</h3> 
	    <div class="box-tools pull-right">
		    <button type="button" class="btn btn-box-tool call-minimize-suratjalan"><i class="fa fa-minus"></i> MINIMIZE</button>
		</div>
	  </div>
	  <form id="form_add_1" method="post" action="#">
	    <div class="box-body">

	    	<div class="col-md-12">
	    		<div class="form-group">
	    			<label style="display: inline-flex;
  justify-content: flex-start;
  align-items: center;
  flex-wrap: nowrap;
  margin: 12px 0;
  cursor: pointer;
  position: relative;">
						  <input type="radio" id="ukuran" name="size" value="1" checked="true" style="margin: 0px 0 0;"><span class="circle" ></span><span class="text" style="color: var(--second-color);
  font-weight: bold;">&nbsp;BERDASARKAN TANGGAL RENCANA KEBERANGKATAN</span>
						<!--   <label for="male">KECIL</label><br>
						  <input type="radio" id="female" name="gender" value="female">
						  <label for="female">BESAR</label><br> -->
						</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<label style="display: inline-flex;
  justify-content: flex-start;
  align-items: center;
  flex-wrap: nowrap;
  margin: 12px 0;
  cursor: pointer;
  position: relative;">
						  <input type="radio" id="ukuran" name="size" value="0" style="margin: 0px 0 0;"><span class="circle" ></span><span class="text" style="color: var(--second-color);
  font-weight: bold;">&nbsp;BERDASARKAN TANGGAL REALISASI KEBERANGKATAN</span>
						<!--   <label for="male">KECIL</label><br>
						  <input type="radio" id="female" name="gender" value="female">
						  <label for="female">BESAR</label><br> -->
						</label>

	    			</div>
	    		</div>
	    	</div>
	    	<div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>NOMOR SURAT JALAN</label>
						<input style="text-transform:uppercase" placeholder="" class="form-control" autocomplete="off" name="nomor" required>
						<input style="text-transform:uppercase" placeholder="" class="form-control" autocomplete="off" name="nomor" required>
	    		</div>
	    	</div>
	    	<div class="col-md-12">
				<div class="form-group">
					<br>
	    			<label>ASAL SURAT JALAN</label>
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
					<br>
	    			<label>TUJUAN SURAT JALAN</label>
						<select id="tujuan" class="form-control select2" name="tujuan" style="height: 20px;">
						
						</select>
	    		</div>
	    	</div> 
	    	<div class="col-md-6">
				<div class="form-group">
					<br>
	    			<label>&nbsp;</label>
						<input style="text-transform:uppercase" id="itujuan" placeholder="OTHER..." class="form-control" name="itujuan" disabled required>
	    		</div>
	    	</div>  
	    	<div class="col-md-3">
				<div class="form-group">
					<br>
	    			<label>UKURAN KENDARAAN :</label>
	    			
	    			<br>
	    			<label style="display: flex;
  justify-content: flex-start;
  align-items: center;
  flex-wrap: nowrap;
  margin: 12px 0;
  cursor: pointer;
  position: relative;">
						  <input type="radio" id="ukuran" name="size" value="1" checked="true" style="margin: 0px 0 0;"><span class="circle" style="width: 16px;
  height: 30px;
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
  height: 30px;
  border: 1px solid var(--second-color);
  border-radius: 100%;
  margin-right: 15px;
  position: relative;"></span><span class="text" style="color: var(--second-color);
  font-weight: bold;">KENDARAAN KECIL</span>
						<!--   <label for="male">KECIL</label><br>
						  <input type="radio" id="female" name="gender" value="female">
						  <label for="female">BESAR</label><br> -->
						</label>
							<br>
								<br>
									<br>
										<br>

	    		</div>
	    	</div>
	    	<div class="col-md-9">
				<div class="form-group" >
					<br>
	    			<label>NAMA PIC</label>
						<input style="text-transform:uppercase" placeholder="INPUT NAMA PIC" autocomplete="off" class="form-control" name="pic" required>
	    		</div>
	    	</div>
	    	<div class="col-md-9">
				<div class="form-group" >
	    			<label>CHASIS KENDARAAN</label>
						<select id="sasis" class="form-control select2" name="sasis" >
						
						</select>
	    		</div>
	    	</div> 
	    	<div class="col-md-12">
				<div class="form-group">
					<br>
	    			<label>NOMOR CONTAINERER</label>
						<input style="text-transform:uppercase" class="form-control" placeholder="INPUT NOMOR CONTAINER" id="nomorcontainer" name="nomorcontainer">
	    		</div>
	    	</div> 
	    	<div class="col-md-9">
				<div class="form-group" id="idtugas">
	    			<label>TUGAS</label>
						<textarea style="text-transform:uppercase;resize: none;height: 150px;" class="form-control" id="tugas" name="tugas"></textarea>
	    		</div>
	    	</div>  
	    	<div class="col-md-12">
				<div class="form-group">
					<br>
	    			<label>NAMA KENDARAAN</label>
						<select id="kendaraan" class="form-control select2" name="kendaraan">
						
						</select>
	    		</div>
	    	</div> 
	    	<div class="col-md-4">
				<div class="form-group">
	    			<br>
	    			<label>DRIVER KENDARAAN</label>
						<select id="sopir" class="form-control select2" name="sopir">
						
						</select>
	    		</div>
	    	</div> 
	    	<div class="col-md-8">
				<div class="form-group">
	    			<br>
	    			<label>&nbsp;</label>
						<input style="text-transform:uppercase" id="isopir" class="form-control" name="isopir" disabled required>
	    		</div>
	    	</div> 
	    	<div class="col-md-12">
				<div class="form-group">
					<br>
	    			<label>JENIS MUATAN</label>
						<input style="text-transform:uppercase" placeholder="INPUT JENIS MUATAN" class="form-control" id="isimuatan" name="isimuatan">
	    		</div>
	    	</div> 
	    	
			<div class="col-md-12">
				<div class="form-group">
					<br>
	    			<label>GEMBOK</label>
						<input style="text-transform:uppercase" placeholder="INPUT GEMBOK" class="form-control" id="gembok" name="gembok">
	    		</div>
	    	</div>  
	    	<div class="col-md-12">
				<div class="form-group">
					<br>
	    			<label>SEGEL PELAYARAN</label>
						<input style="text-transform:uppercase" placeholder="INPUT SEGEL PELAYARAN" class="form-control" id="segelpelayaran" name="segelpelayaran">
	    		</div>
	    	</div> 
	    	<div class="col-md-12">
				<div class="form-group">
					<br>
	    			<label>SEGEL BEACUKAI</label>
						<input style="text-transform:uppercase" placeholder="INPUT SEGEL BEACUKAI" class="form-control" id="segelbeacukai" name="segelbeacukai">
	    		</div>
	    	</div> 
	    	<div class="col-md-12">
					<div class="form-group">
						<br>
						<label>TANGGAL RENCANA KEBERANGKATAN
						</label>
						<input class="form-control date" data-date-format="dd-mm-yyyy" placeholder="INPUT TANGGAL RENCANA KEBERANGAKATAN" name="tanggal" autocomplete="off" required>
					</div> 
			</div>

	    	<div class="col-md-12">
				<div class="form-group">
					<br>
	    			<label>KETERANGAN</label>
						<input style="text-transform:uppercase" placeholder="INPUT KETERANGAN" class="form-control" name="keterangan">
	    		</div>
	    	</div> 
	    </div>
	    <!-- /.box-body -->
	    <div class="box-footer">
	      <button type="submit" style="background-color: #005b71; border-color: #005b71;" class="btn btn-sm btn-primary btn-flat pull-right">SIMPAN</button>
	    </div>
	  </form>
	</div>

 	<div class="box box-primary box-solid">
	  <div class="box-header with-border" style="height: 39px;">
	    <div class="box-tools pull-right">
	    	  <?php
	          $admin_name = $this->session->userdata('admin_name');
	          if ($admin_name == 'admin')
	          { 
	          ?>
	          		<button type="button" class="btn btn-box-tool call-add-suratjalan"><i class="fa fa-plus"></i> ADD NEW</button>
					<button type="button" class="btn btn-box-tool call-refresh"><i class="fa fa-refresh"></i> REFRESH</button>
	          <?php
	      	  }
	          else
	          { ?>
	          		<button type="button" class="btn btn-box-tool call-refresh"><i class="fa fa-refresh"></i> REFRESH</button>
	          <?php	
	          }
	          ?>
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
