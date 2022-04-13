<div class="col-md-12">
	<div id="panel_1" class="box box-primary box-solid" >
	  <div class="box-header with-border" >
	    <h3 class="box-title"></h3> 
	    <div class="box-tools pull-right">
		</div>
	  </div>
	  <form id="form_add_1" method="post" action="#">
	    <div class="box-body">
	    	<div class="col-md-12">
	    		<div class="form-group">

	    			<table width="100%">
	    				<tr>
	    					<td width="20%"> 
	    						<label style="display: inline-flex;
  justify-content: flex-start;
  align-items: center;
  flex-wrap: nowrap;
  margin: 12px 0;
  cursor: pointer;
  position: relative;">
						  <input type="radio" id="u" name="jenis" value="0" checked style="margin: 0px 0 0;"><span class="circle" ></span><span class="text" style="color: var(--second-color);
  font-weight: bold;">&nbsp;EXPORT</span>
						<!--   <label for="male">KECIL</label><br>
						  <input type="radio" id="female" name="gender" value="female">
						  <label for="female">BESAR</label><br> -->
						</label>
	    					</td>
	    					<td width="20%">
	    						<label style="display: inline-flex;
  justify-content: flex-start;
  align-items: center;
  flex-wrap: nowrap;
  margin: 12px 0;
  cursor: pointer;
  position: relative;">
						  <input type="radio" id="u" name="jenis" value="1" style="margin: 0px 0 0;"><span class="circle" ></span><span class="text" style="color: var(--second-color);
  font-weight: bold;">&nbsp;IMPORT</span>
						<!--   <label for="male">KECIL</label><br>
						  <input type="radio" id="female" name="gender" value="female">
						  <label for="female">BESAR</label><br> -->
						</label>
	    					</td>
	    					<td width="20%">
	    						<label style="display: inline-flex;
  justify-content: flex-start;
  align-items: center;
  flex-wrap: nowrap;
  margin: 12px 0;
  cursor: pointer;
  position: relative;">
						  <input type="radio" id="u" name="jenis" value="2" style="margin: 0px 0 0;"><span class="circle" ></span><span class="text" style="color: var(--second-color);
  font-weight: bold;">&nbsp;PLANT</span>
						<!--   <label for="male">KECIL</label><br>
						  <input type="radio" id="female" name="gender" value="female">
						  <label for="female">BESAR</label><br> -->
						</label>
	    					</td>
	    					<td width="20%">
	    						<label style="display: inline-flex;
  justify-content: flex-start;
  align-items: center;
  flex-wrap: nowrap;
  margin: 12px 0;
  cursor: pointer;
  position: relative;">
						  <input type="radio" id="u" name="jenis" value="3" style="margin: 0px 0 0;"><span class="circle" ></span><span class="text" style="color: var(--second-color);
  font-weight: bold;">&nbsp;DEPO</span>
						<!--   <label for="male">KECIL</label><br>
						  <input type="radio" id="female" name="gender" value="female">
						  <label for="female">BESAR</label><br> -->
						</label>
	    					</td>
	    					<td width="20%">
	    						<label style="display: inline-flex;
  justify-content: flex-start;
  align-items: center;
  flex-wrap: nowrap;
  margin: 12px 0;
  cursor: pointer;
  position: relative;">
						  <input type="radio" id="u" name="jenis" value="4" style="margin: 0px 0 0;"><span class="circle" ></span><span class="text" style="color: var(--second-color);
  font-weight: bold;">&nbsp;KOTA2</span>
						<!--   <label for="male">KECIL</label><br>
						  <input type="radio" id="female" name="gender" value="female">
						  <label for="female">BESAR</label><br> -->
						</label>
	    					</td>
	    				</tr>	
	    			</table>	
	    			</div>
	    	</div>
	    	<div class="col-md-6">
	    		<div class="form-group">
	    			<br>
	    			<label>BULAN</label>
						<!-- <input style="text-transform:uppercase" placeholder="" class="form-control" autocomplete="off" name="bulan" required> -->
						<select class="form-control" name="bulan" style="color: black">
				    			<option value="I">I</option>
				    			<option value="II">II</option>
				    			<option value="III">III</option>
				    			<option value="IV">IV</option>
								<option value="V">V</option>
								<option value="VI">VI</option>
								<option value="VII">VII</option>
								<option value="VIII">VIII</option>
								<option value="IX">IX</option>
								<option value="X">X</option>
								<option value="XI">XI</option>
								<option value="XII">XII</option> 
				    	</select>
	    		</div>
	    	</div>
			<div class="col-md-6">
	    		<div class="form-group">
	    			<br>
	    			<label>DEPARTEMEN</label>
						<input style="text-transform:uppercase" placeholder="" class="form-control" autocomplete="off" name="departement" required>
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
						<input style="text-transform:uppercase" placeholder="" autocomplete="off" class="form-control" name="pic" required>
	    		</div>
	    	</div>
	    	<div class="col-md-9" id="formsasis">
				<div class="form-group" >
	    			<label>CHASIS KENDARAAN</label>
						<select id="sasis" class="form-control select2" name="sasis" >
						
						</select>
	    		</div>
	    	</div> 
	    	<div class="col-md-9" id="formcontainer">
				<div class="form-group">
					<br>
	    			<label>NOMOR CONTAINER</label>
						<select id="container" class="form-control select2" name="nocontainer" >
						
						</select>
	    		</div>
	    	</div> 
	    	<div class="col-md-9" id="formtugas">
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
	    	<div class="col-md-12">
				<div class="form-group">
	    			<br>
	    			<label>DRIVER KENDARAAN</label>
						<select id="sopir" class="form-control select2" name="sopir">
						
						</select>
	    		</div>
	    	</div> 
	    	<!-- <div class="col-md-8">
				<div class="form-group">
	    			<br>
	    			<label>&nbsp;</label>
						<input style="text-transform:uppercase" placeholder="OTHER..." id="isopir" class="form-control" name="isopir" disabled required>
	    		</div>
	    	</div>  -->
	    	<div class="col-md-12" id="formmuatan">
				<div class="form-group">
					<br>
	    			<label>JENIS MUATAN</label>
						<input style="text-transform:uppercase" placeholder="" class="form-control" id="isimuatan" name="isimuatan">
	    		</div>
	    	</div> 
			<div class="col-md-12" id="formgembok">
				<div class="form-group">
					<br>
	    			<label>GEMBOK</label>
						<input style="text-transform:uppercase" placeholder="" class="form-control" id="gembok" name="gembok">
	    		</div>
	    	</div>  
	    	<div class="col-md-12" id="formpelayaran">
				<div class="form-group">
					<br>
	    			<label>SEGEL PELAYARAN</label>
						<input style="text-transform:uppercase" placeholder="" class="form-control" id="segelpelayaran" name="segelpelayaran">
	    		</div>
	    	</div> 
	    	<div class="col-md-12" id="formbeacukai">
				<div class="form-group">
					<br>
	    			<label>SEGEL BEACUKAI</label>
						<input style="text-transform:uppercase" placeholder="" class="form-control" id="segelbeacukai" name="segelbeacukai">
	    		</div>
	    	</div> 
	    	<div class="col-md-12">
					<div class="form-group">
						<br>
						<label>TANGGAL RENCANA KEBERANGKATAN
						</label>
						<input class="form-control date" data-date-format="dd-mm-yyyy" placeholder="" name="tanggal" autocomplete="off" style="height: fit-content;" required>
					</div> 
			</div>

	    	<div class="col-md-12">
				<div class="form-group">
					<br>
	    			<label>KETERANGAN</label>
						<input style="text-transform:uppercase" placeholder="" class="form-control" name="keterangan">
	    		</div>
	    	</div> 
	    </div>
	    <!-- /.box-body -->
	    <div class="box-footer">
	      <button type="submit" id="buttn" style="background-color: #005b71; border-color: #005b71;" class="btn btn-sm btn-primary btn-flat pull-right">SIMPAN</button>
	    </div>
	  </form>
	</div>
 
</div> 
