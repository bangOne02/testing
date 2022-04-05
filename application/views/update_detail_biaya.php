

<form id="form_update_biaya_detail" method="post">
	    <div class="box-body">
	    	<div class="col-md-12">
				<div class="form-group">
					<br>
	    			<label>REFERENSI NOMOR SURAT JALAN</label>
						<select id="myInput" class="form-control select2" name="nosuratjalan" >
							<?php foreach($suratjalan as $row){
									if ($row->id == $data_detail->id_sj) {
										echo "<option value='".$row->id."' selected>".$row->nomorsjj."</option>";
									}else{
										echo "<option value='".$row->id."'>".$row->nomorsjj."</option>";
									}
								} ?>
						</select>
	    		</div>
	    	</div> 
	    	<div class="col-md-6">
				<div class="form-group">
					<br>
	    			<label>GL ACCOUNT</label>
						<select class="form-control" id="gl" name="gl" style="color: black">
				    			<?php foreach($glaccount as $row){
									if ($row->id == $data_detail->glaccount) {
										echo "<option value='".$row->id."' selected>".$row->description."</option>";
									}else{
										echo "<option value='".$row->id."'>".$row->description."</option>";
									}
								} ?>
				    	</select>
	    		</div>
	    	</div>
	    	<div class="col-md-6">
				<div class="form-group">
					<br>
	    			<label>COST CENTER</label>
						<select class="form-control" id="gl" name="costcenter" style="color: black">
				    			<?php foreach($costcenter as $row){
									if ($row->id == $data_detail->costcenter) {
										echo "<option value='".$row->id."' selected>".$row->description.' ('.$row->cost_center.')'."</option>";
									}else{
										echo "<option value='".$row->id."'>".$row->description.' ('.$row->cost_center.')'."</option>";
									}
								} ?>
				    	</select>
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>NOMINAL</label>
						<input style="text-transform:uppercase" value="<?php echo $data_detail->nominal; ?>" placeholder="0" class="form-control" id="nominal" name="nominal" >
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>FEE DRIVER</label>
						 <input style="text-transform:uppercase" placeholder="0" class="form-control" value="<?php echo $data_detail->feedriver; ?>" id="fdriver" name="feedriver" >
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>LEMBUR DRIVER</label>
						 <input style="text-transform:uppercase" placeholder="0" class="form-control" value="<?php echo $data_detail->lemburdriver; ?>" id="ldriver" name="lemburdriver" >
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>FEE KERNET</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" value="<?php echo $data_detail->feekernet; ?>" id="fkernet" name="feekernet" >
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>LEMBUR KERNET</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" value="<?php echo $data_detail->lemburkernet; ?>" id="lkernet" name="lemburkernet" >
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>FEEINAP / UANG MAKAN</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" value="<?php echo $data_detail->feeinap; ?>" id="finap" name="feeinap" >
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>KELASJALAN</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" value="<?php echo $data_detail->kelasjalan; ?>" id="kelasjalan" name="kelasjalan" >
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>KULI</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" value="<?php echo $data_detail->kuli; ?>" id="kuli" name="kuli" >
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>PARKIR</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" value="<?php echo $data_detail->parkir; ?>" id="parkir" name="parkir" >
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>BIAYA TOL</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" value="<?php echo $data_detail->biayatol; ?>" id="biayatol" name="biayatol" >
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>GENSET</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" value="<?php echo $data_detail->genset; ?>" id="genset" name="genset">
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>BBM TUNAI</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" value="<?php echo $data_detail->bbmtunai; ?>" id="tunai" name="tunai" >
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>BBM NON TUNAI</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" value="<?php echo $data_detail->bbmnontunai; ?>" id="nontunai" name="nontunai" >
	    		</div>
	    	</div>
	    	<div class="col-md-10">
				<div class="form-group">
					<br>
	    			<label>NO MEMO</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" value="<?php echo $data_detail->nomemo; ?>" id="nomemo" name="nomemo" >
	    		</div>
	    	</div>
			<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>BIAYA LAIN-LAIN</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" value="<?php echo $data_detail->biayalain; ?>" id="biayalain" name="biayalain">
	    		</div>
	    	</div>
			<div class="col-md-10">
				<div class="form-group">
					<br>
	    			<label>KETERANGAN BIAYA LAIN-LAIN</label>
						<input style="text-transform:uppercase" placeholder="INPUT KETERANGAN BIAYA LAIN-LAIN" class="form-control" value="<?php echo $data_detail->keterangan; ?>" id="keterangan" name="keterangan">
	    		</div>
	    	</div>
	    </div>
	    <div id="myDIV" class="col-md-12">
	    <div class="box-footer">
	      <input type="hidden" name="id" value="<?php echo $data_detail->id; ?>" required>
	      <button type="submit" style="background-color: #005b71; border-color: #005b71;" class="btn btn-sm btn-primary btn-flat pull-right">UPDATE</button>
	    </div>
	    </div>
	    <div class="box-footer">
	      &nbsp;
	    </div>
	  </form>