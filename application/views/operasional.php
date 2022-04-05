<div class="col-md-12">
	<div id="panel_1" class="box box-primary box-solid" >
	  <div class="box-header with-border">
	    <h3 class="box-title">UPDATE KENDARAAN OPERASIONAL</h3>
	    <div class="box-tools pull-right">
		</div>
	   
	  </div>
	  <form id="form_update_operasional" method="post" action="#">
	    <div class="box-body">
	    	<div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>KENDARAAN OPERASIONAL 1</label>
	    			<select class="form-control select2" name="kendaraan1">
                        <?php 
						echo "<option value='".$kendaraan1->id."' selected>".strtoupper($kendaraan1->nama_jenis).' / '.strtoupper($kendaraan1->nopol)."</option>";
						foreach ($kendaraan as $row){
							if ($row->id == $kendaraan1->id) {
								echo "<option value='".$row->id."' selected>".strtoupper($row->nama_jenis).' / '.strtoupper($row->nopol)."</option>";
							}else{
								echo "<option value='".$row->id."'>".strtoupper($row->nama_jenis).' / '.strtoupper($row->nopol)."</option>";
							}
						} ?>
	    			</select>
	    		</div>
            </div>
            <div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>KENDARAAN OPERASIONAL 2</label>
	    			<select class="form-control select2" name="kendaraan2">
                        <?php 
						echo "<option value='".$kendaraan2->id."' selected>".strtoupper($kendaraan2->nama_jenis).' / '.strtoupper($kendaraan2->nopol)."</option>";
						foreach ($kendaraan as $row){
							if ($row->id == $kendaraan2->id) {
								echo "<option value='".$row->id."' selected>".strtoupper($row->nama_jenis).' / '.strtoupper($row->nopol)."</option>";
							}else{
								echo "<option value='".$row->id."'>".strtoupper($row->nama_jenis).' / '.strtoupper($row->nopol)."</option>";
							}
						} ?>
	    			</select>
	    		</div>
            </div>
            <div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>KENDARAAN OPERASIONAL 3</label>
	    			<select class="form-control select2" name="kendaraan3">
					    <?php 
						echo "<option value='".$kendaraan3->id."' selected>".strtoupper($kendaraan3->nama_jenis).' / '.strtoupper($kendaraan3->nopol)."</option>";
						foreach ($kendaraan as $row){
							if ($row->id == $kendaraan3->id) {
								echo "<option value='".$row->id."' selected>".strtoupper($row->nama_jenis).' / '.strtoupper($row->nopol)."</option>";
							}else{
								echo "<option value='".$row->id."'>".strtoupper($row->nama_jenis).' / '.strtoupper($row->nopol)."</option>";
							}
						} ?>
	    			</select>
	    		</div>
            </div>
            <div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>KENDARAAN OPERASIONAL 4</label>
	    			<select class="form-control select2" name="kendaraan4">
					    <?php 
						echo "<option value='".$kendaraan4->id."' selected>".strtoupper($kendaraan4->nama_jenis).' / '.strtoupper($kendaraan4->nopol)."</option>";
						foreach ($kendaraan as $row){
							if ($row->id == $kendaraan4->id) {
								echo "<option value='".$row->id."' selected>".strtoupper($row->nama_jenis).' / '.strtoupper($row->nopol)."</option>";
							}else{
								echo "<option value='".$row->id."'>".strtoupper($row->nama_jenis).' / '.strtoupper($row->nopol)."</option>";
							}
						} ?>
	    			</select>
	    		</div>
            </div>
            <div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>KENDARAAN OPERASIONAL 5</label>
	    			<select class="form-control select2" name="kendaraan5">
					    <?php 
						echo "<option value='".$kendaraan5->id."' selected>".strtoupper($kendaraan5->nama_jenis).' / '.strtoupper($kendaraan5->nopol)."</option>";
						foreach ($kendaraan as $row){
							if ($row->id == $kendaraan5->id) {
								echo "<option value='".$row->id."' selected>".strtoupper($row->nama_jenis).' / '.strtoupper($row->nopol)."</option>";
							}else{
								echo "<option value='".$row->id."'>".strtoupper($row->nama_jenis).' / '.strtoupper($row->nopol)."</option>";
							}
						} ?>
	    			</select>
	    		</div>
            </div>
            <div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>KENDARAAN OPERASIONAL 6</label>
	    			<select class="form-control select2" name="kendaraan6">
					    <?php 
						echo "<option value='".$kendaraan6->id."' selected>".strtoupper($kendaraan6->nama_jenis).' / '.strtoupper($kendaraan6->nopol)."</option>";
						foreach ($kendaraan as $row){
							if ($row->id == $kendaraan6->id) {
								echo "<option value='".$row->id."' selected>".strtoupper($row->nama_jenis).' / '.strtoupper($row->nopol)."</option>";
							}else{
								echo "<option value='".$row->id."'>".strtoupper($row->nama_jenis).' / '.strtoupper($row->nopol)."</option>";
							}
						} ?>
	    			</select>
	    		</div>
            </div>
            <div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>KENDARAAN OPERASIONAL 7</label>
	    			<select class="form-control select2" name="kendaraan7">
					    <?php 
						echo "<option value='".$kendaraan7->id."' selected>".strtoupper($kendaraan7->nama_jenis).' / '.strtoupper($kendaraan7->nopol)."</option>";
						foreach ($kendaraan as $row){
							if ($row->id == $kendaraan7->id) {
								echo "<option value='".$row->id."' selected>".strtoupper($row->nama_jenis).' / '.strtoupper($row->nopol)."</option>";
							}else{
								echo "<option value='".$row->id."'>".strtoupper($row->nama_jenis).' / '.strtoupper($row->nopol)."</option>";
							}
						} ?>
	    			</select>
	    		</div>
            </div>
            <div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>KENDARAAN OPERASIONAL LAMONGAN 1</label>
	    			<select class="form-control select2" name="kendaraan8">
					    <?php 
						echo "<option value='".$kendaraan8->id."' selected>".strtoupper($kendaraan8->nama_jenis).' / '.strtoupper($kendaraan8->nopol)."</option>";
						foreach ($kendaraan as $row){
							if ($row->id == $kendaraan8->id) {
								echo "<option value='".$row->id."' selected>".strtoupper($row->nama_jenis).' / '.strtoupper($row->nopol)."</option>";
							}else{
								echo "<option value='".$row->id."'>".strtoupper($row->nama_jenis).' / '.strtoupper($row->nopol)."</option>";
							}
						} ?>
	    			</select>
	    		</div>
            </div>
            <div class="col-md-12">
	    		<div class="form-group">
	    			<br>
	    			<label>KENDARAAN OPERASIONAL LAMONGAN 2</label>
	    			<select class="form-control select2" name="kendaraan9">
					    <?php 
						echo "<option value='".$kendaraan9->id."' selected>".strtoupper($kendaraan9->nama_jenis).' / '.strtoupper($kendaraan9->nopol)."</option>";
						foreach ($kendaraan as $row){
							if ($row->id == $kendaraan9->id) {
								echo "<option value='".$row->id."' selected>".strtoupper($row->nama_jenis).' / '.strtoupper($row->nopol)."</option>";
							}else{
								echo "<option value='".$row->id."'>".strtoupper($row->nama_jenis).' / '.strtoupper($row->nopol)."</option>";
							}
						} ?>
	    			</select>
	    		</div>
            </div>	
	    </div>
	    <div class="box-footer">
	      <button type="submit" style="background-color: #005b71; border-color: #005b71;" class="btn btn-sm btn-primary btn-flat pull-right">UPDATE</button>
	    </div>
	  </form>
	</div>

</div> 

