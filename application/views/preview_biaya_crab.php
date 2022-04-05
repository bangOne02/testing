<div id="xx">
<div class="row">
	<div class="col-md-12">
			<i>
				&nbsp;
			<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
			</i>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<br>
	</div>
	<div class="col-md-12">
	    		<table width="100%;">	

	    			<tr>
	    				<td width="3%;">&nbsp;</td>
	    				<td width="13%;"><p><b style="color: red;">NOMOR KASBON</b></p></td>	
	    				<td width="1%;"><p><b style="color: red;"><?php echo '#';?></b></p></td>
	    				<td width="20%;"><p><b style="color: red;"><?php echo "".strtoupper($hasil[0]->nomor_kasbon);?></b></p></td>
	    				<td width="62%;">&nbsp;</td>
	    			</tr>
	    			<tr>
	    				<td width="3%;">&nbsp;</td>
	    				<td width="13%;"><p><b style="color: red;">TOTAL KASBON</b></p></td>	
						<td width="1%;"><p><b style="color: red;"><?php echo '#';?></b></p></td>
	    				<td width="20%;"><p><b style="color: red;"><?php echo "".strtoupper($hasil[0]->nominal);?></b></p></td>
	    				<td width="62%;">&nbsp;</td>
	    			</tr>
	    			<tr>
	    				<td width="3%;">&nbsp;</td>
	    				<td width="13%;"><p><b style="color: red;">TOTAL KELUAR</b></p></td>	
						<td width="1%;"><p><b style="color: red;"><?php echo '#';?></b></p></td>
	    				<td width="20%;"><p><b style="color: red;"><?php echo "".strtoupper($hasil[0]->total_keluar);?></b></p></td>
	    				<td width="62%;">&nbsp;</td>
	    			</tr>
	    			<tr>
	    				<td width="3%;">&nbsp;</td>
	    				<td width="13%;"><p><b style="color: red;">SISA KASBON</b></p></td>	
						<td width="1%;"><p><b style="color: red;"><?php echo '#';?></b></p></td>
	    				<td width="20%;"><p><b style="color: red;"><?php echo "".strtoupper($hasil[0]->sisa);?></b></p></td>
	    				<td width="62%;">&nbsp;</td>
	    			</tr>
	    		</table>
	</div>
</div>
<br>
<br>
<div class="col-md-12">
	<div id="panel_1" class="box box-primary panel-hidden box-solid" style="display: block;">
	  <div class="box-header with-border" >
	    <h3 class="box-title">FORM INPUT BIAYA</h3> 
	  </div>
	  <form id="form_biaya_detail" method="post">
	    <div class="box-body">
	    	<div class="col-md-12">
					<div class="form-group">
						<br>
						<label>FILTER TANGGAL</label>
						<input class="form-control date" onchange="myFunction()"  data-date-format="dd-mm-yyyy" style="height: fit-content;" placeholder="FILTER TANGGAL" id="tanggal" name="tanggalawal" autocomplete="off">
					</div> 
				</div>
	    	<div class="col-md-12">
				<div class="form-group">
					<br>
	    			<label>REFERENSI NOMOR SURAT JALAN</label>
						<select id="myInput" class="form-control select2" name="nosuratjalan" >
						
						</select>
	    		</div>
	    	</div> 
	    	<div class="col-md-6">
				<div class="form-group">
					<br>
	    			<label>GL ACCOUNT</label>
						<select class="form-control" id="gl" name="gl" style="color: black">
				    			<?php foreach($glaccount as $row){
										echo "<option value='".$row->id."'>".$row->description."</option>";
								} ?>
				    	</select>
	    		</div>
	    	</div>
	    	<div class="col-md-6">
				<div class="form-group">
					<br>
	    			<label>COST CENTER</label>
						<select class="form-control select2" id="gl" name="costcenter" style="color: black">
				    			<?php foreach($costcenter as $row){
										echo "<option value='".$row->id."'>".$row->description.' ('.$row->cost_center.')'."</option>";
								} ?>
				    	</select>
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>NOMINAL</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" id="nominal" name="nominal" >
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>FEE DRIVER</label>
						 <input style="text-transform:uppercase" placeholder="0" class="form-control" id="fdriver" name="feedriver" >
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>LEMBUR DRIVER</label>
						 <input style="text-transform:uppercase" placeholder="0" class="form-control" id="ldriver" name="lemburdriver" >
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>FEE KERNET</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" id="fkernet" name="feekernet" >
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>LEMBUR KERNET</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" id="lkernet" name="lemburkernet" >
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>FEE INAP / MAKAN</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" id="finap" name="feeinap" >
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>KELASJALAN</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" id="kelasjalan" name="kelasjalan" >
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>KULI</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" id="kuli" name="kuli" >
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>PARKIR</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" id="parkir" name="parkir" >
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>BIAYA TOL</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" id="biayatol" name="biayatol" >
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>GENSET</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" id="genset" name="genset">
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>BBM TUNAI</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" id="tunai" name="tunai" >
	    		</div>
	    	</div>
	    	<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>BBM NON TUNAI</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" id="nontunai" name="nontunai" >
	    		</div>
	    	</div>
	    	<div class="col-md-10">
				<div class="form-group">
					<br>
	    			<label>NO MEMO</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" id="nomemo" name="nomemo" >
	    		</div>
	    	</div>
			<div class="col-md-2">
				<div class="form-group">
					<br>
	    			<label>BIAYA LAIN-LAIN</label>
						<input style="text-transform:uppercase" placeholder="0" class="form-control" id="biayalain" name="biayalain">
	    		</div>
	    	</div>
			<div class="col-md-10">
				<div class="form-group">
					<br>
	    			<label>KETERANGAN BIAYA LAIN-LAIN</label>
						<input style="text-transform:uppercase" placeholder="INPUT KETERANGAN BIAYA LAIN-LAIN" class="form-control" id="keterangan" name="keterangan">
	    		</div>
	    	</div>
	    </div>
	    <!-- /.box-body -->
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
	  <div id="list_table_biaya2" class="box-body"></div>
	</div> 

</div> 


<br>


<form id="form-update" method="post">
	<div class="row">
		
		<div class="col-md-12" align="right">
			<hr>
		</div>
	</div>
</form>

<div class="modal fade" id="modal-update">
  <div class="modal-dialog" style="width: 100%;margin: auto;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">FORM UPDATE</h4>
      </div>
      <div id="target-update" class="modal-body">
      </div> 
    </div>
  </div>
</div>


<script src="<?php echo base_url('assets/js/biaya2crab.js')?>"></script>	
</div>