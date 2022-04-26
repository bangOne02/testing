<!-- <div class="col-md-12">

	<div class="box box-primary box-solid"> 
    <div class="box-body">

    	<form id="form-search" method="post" action="#" autocomplete="off">
				
				<div class="col-md-12">
					<div class="form-group">
						<br>
						<label>DARI TANGGAL</label>
						<input class="form-control date"  data-date-format="dd-mm-yyyy" placeholder="ENTER TANGGAL AWAL LAPORAN SURAT JALAN" name="tanggalawal" autocomplete="off" required>
					</div> 
				</div>

				<div class="col-md-12">
					<div class="form-group">
						<br>
						<label>SAMPAI TANGGAL</label>
						<input class="form-control date"  data-date-format="dd-mm-yyyy" placeholder="ENTER TANGGAL AKHIR LAPORAN SURAT JALAN" name="tanggalakhir" autocomplete="off" required>
					</div> 
				</div>

				<div class="col-md-12" align="center">
					<br>
					<button class="btn btn-primary btn-sm btn-flat"  style="width: 100%"><i class="fa fa-search"></i> Tampilkan</button>
				</div>
    	</form>

    </div> 
	</div>

	<div class="box box-primary box-solid">
		<div id="list_table" class="box-body">
			<center>Klik <b>Tampilkan</b> untuk melihat hasil laporan</center>
		</div>
	</div>

</div> -->


<div class="col-md-12">
	
          <div class="nav-tabs-custom">
          	<!-- <div class="form-group">
						<br>
						<label>LAPORAN BIAYA</label>
			</div> -->
			<div class="box-header with-border" style="background-color: #005b71;color: white;">
			    <h3 class="box-title">LAPORAN BIAYA</h3> 
			</div>
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">REPORT ALL COLUMN BIAYA</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">REKAP TOTALAN BIAYA</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                    <!-- <div class="col-md-12"> -->
						<div class="box box-primary box-solid"> 
						    <div class="box-body">
						    	<form id="form-search" method="post" action="#" autocomplete="off">
										<div class="col-md-12">
											<div class="form-group">
												<br>
												<label>DARI TANGGAL</label>
												<input class="form-control date" style="height: fit-content;" data-date-format="dd-mm-yyyy" placeholder="ENTER TANGGAL AWAL KASBON" name="tanggalawal" autocomplete="off" required>
											</div> 
										</div>

										<div class="col-md-12">
											<div class="form-group">
												<br>
												<label>SAMPAI TANGGAL</label>
												<input class="form-control date" style="height: fit-content;" data-date-format="dd-mm-yyyy" placeholder="ENTER TANGGAL AKHIR KASBON" name="tanggalakhir" autocomplete="off" required>
											</div> 
										</div>

										<div class="col-md-6" align="center">
											<br>
											<button class="btn btn-primary btn-sm btn-flat"  style="width: 100%" value="button1" id="submit1" ><i class="fa fa-search"></i> Tampilkan</button>
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
					<!-- </div> -->
              </div>
              <div class="tab-pane" id="tab_2">
                	<!-- <div class="col-md-12"> -->
						<div class="box box-primary box-solid"> 
						    <div class="box-body">
						    	<form id="form-search-2" method="post" action="#" autocomplete="off">
										<div class="col-md-6">
											<div class="form-group">
												<br>
												<label>DARI TANGGAL</label>
												<input class="form-control date" style="height: fit-content;" data-date-format="dd-mm-yyyy" placeholder="ENTER TANGGAL AWAL KASBON" name="tanggalawal" autocomplete="off" required>
											</div> 
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<br>
												<label>SAMPAI TANGGAL</label>
												<input class="form-control date" style="height: fit-content;" data-date-format="dd-mm-yyyy" placeholder="ENTER TANGGAL AKHIR KASBON" name="tanggalakhir" autocomplete="off" required>
											</div> 
										</div>

										<div class="col-md-12" align="center">
											<br>
											<button class="btn btn-primary btn-sm btn-flat"  style="width: 100%"><i class="fa fa-search"></i> Tampilkan</button>
										</div>
						    	</form>
						    </div> 
						</div>
						<div class="box box-primary box-solid">
							<div id="list_table_2" class="box-body">
								<center>Klik <b>Tampilkan</b> untuk melihat hasil laporan</center>
							</div>
						</div>
					<!-- </div>	 -->
              </div>
            </div>
          </div>
</div>






