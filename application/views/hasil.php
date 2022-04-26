<div class="col-md-12">

	<div class="box box-primary box-solid"> 
    <div class="box-body">

    	<form id="form-search" method="post" action="#" autocomplete="off">
				
				<div class="col-md-12">
					<div class="form-group">
	    			<label style="display: inline-flex;
  justify-content: flex-start;
  align-items: center;
  flex-wrap: nowrap;
  margin: 12px 0;
  cursor: pointer;
  position: relative;">
						  <input type="radio" id="ukuran" name="size" value="1"  checked="true" style="margin: 0px 0 0;"><span class="circle" ></span><span class="text" style="color: var(--second-color);
  font-weight: bold;">&nbsp;RENCANA KEBERANGKATAN</span>
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
  font-weight: bold;">&nbsp;REALISASI KEBERANGKATAN</span>
						<!--   <label for="male">KECIL</label><br>
						  <input type="radio" id="female" name="gender" value="female">
						  <label for="female">BESAR</label><br> -->
						</label>

	    			</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<br>
						<label>DARI TANGGAL</label>
						<input class="form-control date"  data-date-format="dd-mm-yyyy" style="height: fit-content;" placeholder="TANGGAL AWAL LAPORAN SURAT JALAN" name="tanggalawal" autocomplete="off" required>
					</div> 
				</div>

				<div class="col-md-12">
					<div class="form-group">
						<br>
						<label>SAMPAI TANGGAL</label>
						<input class="form-control date"  data-date-format="dd-mm-yyyy" style="height: fit-content;" placeholder="TANGGAL AKHIR LAPORAN SURAT JALAN" name="tanggalakhir" autocomplete="off" required>
					</div> 
				</div>

				<div class="col-md-6" align="center">
					<br>
					<button class="btn btn-primary btn-sm btn-flat"  style="width: 100%" value="button1" id="submit1"><i class="fa fa-search"></i> Tampilkan</button>
    				<!-- <input class="btn btn-primary btn-sm btn-flat"  style="width: 100%" type="submit" name="button2" value="Tampilkan"/> -->
				</div>
				<div class="col-md-6" align="center">
					<br>
					<button class="btn btn-primary btn-sm btn-flat"  style="width: 100%" value="button2" id="submit2" ><i class="fa fa-search"></i> Download Excel</button>
					<!-- <input class="btn btn-primary btn-sm btn-flat"  style="width: 100%" type="submit" name="button1" value="Export To Excel"/> -->
				</div>
    	</form>

    </div> 
	</div>

	<div class="box box-primary box-solid">
		<div id="list_table" class="box-body">
			<center>Klik <b>Tampilkan</b> untuk melihat hasil laporan</center>
		</div>
	</div>

</div>







