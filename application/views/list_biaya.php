
<br>
<div class="table-responsive">
	<table id="table_1_biaya" class="table table-bordered display nowrap table-striped dataTable" style="width: 100%">
		<thead>
			<tr>
						
						<th>NO</th>
						<th>#</th>
					<!-- 	<th></th> -->
						<th>NOMOR KASBON</th>
						<th>AMOUNT</th>
						<th>TANGGAL KASBON</th>
						<th>TANGGAL DOWNLOAD</th>
						<th><center>EDIT</center></th>
						<th><center>INPUT DETAIL BIAYA</center></th>						
					    <th><center>REPORT BIAYA</center></th>
					    <th><center>FILE DOWNLOAD</center></th>
					    <th><center>STATUS CHECKER 1</center></th>
					    <th><center>STATUS CHECKER 2</center></th>
					    <th><center>STATUS JURNAL</center></th>
					    <th><center>DI BUAT OLEH</center></th>
					    <th><center>KETERANGAN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</center></th>
						<th>TGL CREATED</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($table as $row){ ?>
				<tr id="<?php echo $row->id; ?>">
				    <td>1</td>
					<td>
						<?php
						if ($row->statchecker2 == 1 and $row->approved <> 1) 
						{
						?>
							<input name="select_item[]" id="check" value="<?php echo $row->id; ?>" type="checkbox">
						<?php	
						} else {
						?>
							<input name="select_item[]" id="check" value="1" type="checkbox" disabled="true">
						<?php
						}
						?>
					</td>
			<!-- 		<th><input name="select_all" value="1" type="checkbox"></th> -->
					<td><?php echo "".strtoupper($row->nomor_kasbon); ?></td>
					<td><?php echo "".strtoupper(number_format($row->nominal,2,".",",")); ?></td>
					<!-- <td>
						<center>
						<?php 
							if($row->approved == 1){
								echo "APPROVED";
							}else{
								echo "PENDING";
							}
						?>
						</center>
					</td> -->
					<td><?php echo "".strtoupper(date('d-m-Y',strtotime($row->tanggal))); ?></td>
					<td><?php echo "".strtoupper($row->download); ?></td>
					<td> 
			            <div class="btn-group-horizontal">
                          <?php
					          $admin_name = $this->session->userdata('admin_name');
					          if ($admin_name == 'accounting' or $admin_name == 'checker1' or $admin_name == 'checker2'  or $admin_name == 'admin' or $row->statchecker1 == 1)
					          { ?>
					          		<center><button type="button" class="btn btn-info btn-sm" disabled="true" data-toggle="modal"><i class="fa fa-edit"></i></button></center>
					          <?php
					          } else
					          { ?>		
					          		<center>
					          			<button type="button" class="btn btn-info btn-sm call-data-update-biaya" data-toggle="modal" data-target="#modal-update-biaya" data-id="<?php echo $row->id; ?>"><i class="fa fa-edit"></i></button>
									</center>
					          <?php
					          } ?>		
			            </div>
					</td>
					<td> 
			            <div class="btn-group-horizontal">
                          <?php
					          $admin_name = $this->session->userdata('admin_name');
					          if ($admin_name == 'accounting' or $admin_name == 'checker1' or $admin_name == 'checker2'  or $admin_name == 'admin' or $row->statchecker1 == 1)
					          { ?>
					          		<center><button type="button" class="btn btn-info btn-sm" disabled="true" data-toggle="modal"><i class="fa fa-play"></i></button></center>
					          <?php
					          } else
					          { ?>		
					          		<center>
					          			<button type="button" class="btn btn-info btn-sm call-data-preview" data-toggle="modal" data-target="#modal-preview" data-id="<?php echo $row->id; ?>"><i class="fa fa-play"></i></button>
					          		<?php
					          			if ($row->statchecker1 == 2 or $row->statchecker2 == 2)
					          			{
					          		?>		
					          			<a style="background-color: #337ab7; border-color: #337ab7;"  class="btn btn-primary btn-sm btn-flat data-checker-resolve" data-id="<?php echo $row->id; ?>">RESOLVE</a>
					          		<?php
					          			}	
					          		?>	
					          		</center>
					          <?php
					          } ?>		
			            </div>
					</td>
					<td>
			            <div class="btn-group-horizontal">
			              <center><a style="background-color: #337ab7; border-color: #337ab7;"  class="btn btn-primary btn-sm btn-flat" href="<?php echo base_url('Laporan/reportBiaya/'.$row->id); ?>"><i class="fa-external-link"></i></a></center>
			            </div>
					</td>
					<td>
			            <div class="btn-group-horizontal">
			              <?php
				          $admin_name = $this->session->userdata('admin_name');
				          if ($admin_name == 'accounting' && $row->statchecker1 == 1 && $row->statchecker2 == 1 && $row->approved <> 1)
				          { 
				          	?>
			              		<!-- <center><a style="background-color: #337ab7; border-color: #337ab7;"  class="btn btn-primary btn-sm btn-flat" href="<?php echo base_url('Laporan/reportFileUpload/'.$row->id); ?>"><i class="fa-external-link"></i></a></center> -->
			              		<center><a style="background-color: #337ab7; border-color: #337ab7;" disabled="true"  class="btn btn-primary btn-sm btn-flat"><i class="fa-external-link"></i></a></center>
				          <?php
				          } else
				          { ?>
			              		<center><a style="background-color: #337ab7; border-color: #337ab7;" disabled="true"  class="btn btn-primary btn-sm btn-flat"><i class="fa-external-link"></i></a></center>
				          <?php
				          } ?>	
			            </div>
					</td>
					<td class="statusapproved">
			            <div class="btn-group-horizontal">
			              <?php
				          $admin_name = $this->session->userdata('admin_name');
				          if ($admin_name == 'checker1')
				          { 
				          		if($row->statchecker1 == 1){ ?>
									<center><a style="background-color: #d93015; border-color: #337ab7;" disabled="true" class="btn btn-primary btn-sm btn-flat">SUDAH DI APPROVE</a></center>
								<?php
								}else{
									if($row->statchecker1 == 2)
									{?>
										<center><a style="background-color: #0dc345; border-color: #337ab7;" disabled="true" class="btn btn-primary btn-sm btn-flat">STAT CHECK REJECT</a></center>
									<?php
									} else
									{	
									?>
										<center>
										<a style="background-color: #337ab7; border-color: #337ab7;"  class="btn btn-primary btn-sm btn-flat data-checker-approve" data-id="<?php echo $row->id; ?>">APROVE</a>
										<a style="background-color: #337ab7; border-color: #337ab7;"  class="btn btn-primary btn-sm btn-flat data-checker-reject" data-id="<?php echo $row->id; ?>">REJECT</a>
										</center>
									<?php
									}
								}
				          } else
				          { 
				          	    if($row->statchecker1 == 1){ ?>
									<center><a style="background-color: #d93015; border-color: #337ab7;" disabled="true" class="btn btn-primary btn-sm btn-flat">SUDAH DI APPROVE</a></center>
								<?php
								}else{
									if($row->statchecker1 == 2)
									{?>
										<center><a style="background-color: #0dc345; border-color: #337ab7;" disabled="true" class="btn btn-primary btn-sm btn-flat">STAT CHECK REJECT</a></center>
									<?php
									} else
									{	
									?>
										<center><a style="background-color: #337ab7; border-color: #337ab7;" disabled="true" class="btn btn-primary btn-sm btn-flat">BELUM DI APPROVE</a></center>
								<?php
									}
								}
				          } ?>	
			            </div>
					</td>
					<td class="statusapproved2">
			            <div class="btn-group-horizontal">
			              <?php
				          $admin_name = $this->session->userdata('admin_name');
				          if ($admin_name == 'checker2')
				          { 
				          		if($row->statchecker2 == 1){ ?>
									<center><a style="background-color: #d93015; border-color: #337ab7;" disabled="true" class="btn btn-primary btn-sm btn-flat">SUDAH DI APPROVE</a></center>
								<?php
								} else if($row->statchecker1 == 1){ ?>
									<center>
										<a style="background-color: #337ab7; border-color: #337ab7;"  class="btn btn-primary btn-sm btn-flat data-checker2-approve" data-id="<?php echo $row->id; ?>">APROVE</a>
										<a style="background-color: #337ab7; border-color: #337ab7;"  class="btn btn-primary btn-sm btn-flat data-checker2-reject" data-id="<?php echo $row->id; ?>">REJECT</a>	
									</center>
								<?php
								} else
								{ 
									if($row->statchecker2 == 2)
									{?>
										<center><a style="background-color: #0dc345; border-color: #337ab7;" disabled="true" class="btn btn-primary btn-sm btn-flat">STAT CHECK REJECT</a></center>
									<?php
									} else
									{	
									?>
										<center><a style="background-color: #337ab7; border-color: #337ab7;" disabled="true" class="btn btn-primary btn-sm btn-flat">BELUM DI APPROVE</a></center>
									<?php
									}
								}
				          } else
				          { 
				          	    if($row->statchecker2 == 1){ ?>
									<center><a style="background-color: #d93015; border-color: #337ab7;" disabled="true" class="btn btn-primary btn-sm btn-flat">SUDAH DI APPROVE</a></center>
								<?php
								}else{
									if($row->statchecker2 == 2)
									{?>
										<center><a style="background-color: #0dc345; border-color: #337ab7;" disabled="true" class="btn btn-primary btn-sm btn-flat">STAT CHECK REJECT</a></center>
									<?php
									} else
									{	
									?>
										<center><a style="background-color: #337ab7; border-color: #337ab7;" disabled="true" class="btn btn-primary btn-sm btn-flat">BELUM DI APPROVE</a></center>
									<?php
									}
								}
				          } ?>	
			            </div>
					</td>
					<td>
			            <div class="btn-group-horizontal">
			              <?php
				          $admin_name = $this->session->userdata('admin_name');
				          if ($admin_name == 'accounting')
				          { 
				          		if($row->approved == 1){ ?>
									<center><a style="background-color: #d93015; border-color: #337ab7;" disabled="true" class="btn btn-primary btn-sm btn-flat">SUDAH DI APPROVE</a></center>
								<?php
								} else if($row->statchecker2 == 1){
									?>
									<center><a style="background-color: #337ab7; border-color: #337ab7;"  class="btn btn-primary btn-sm btn-flat data-approved" data-id="<?php echo $row->id; ?>">BELUM DI APPROVE</a></center>
								<?php
								} else
								{ ?>
									<center><a style="background-color: #337ab7; border-color: #337ab7;" disabled="true" class="btn btn-primary btn-sm btn-flat">BELUM DI APPROVE</a></center>
								<?php
								}
				          } else
				          { 
				          	if($row->approved == 1){ ?>
									<center><a style="background-color: #d93015; border-color: #337ab7;" disabled="true" class="btn btn-primary btn-sm btn-flat">SUDAH DI APPROVE</a></center>
								<?php
								}else{ 
									?>
									<center><a style="background-color: #337ab7; border-color: #337ab7;" disabled="true" class="btn btn-primary btn-sm btn-flat">BELUM DI APPROVE</a></center>
								<?php
								}
				          } ?>		
			              
			            </div>
					</td>
					<td><?php echo "".strtoupper($row->username); ?></td>
					<td> 
			           <!-- <div class="btn-group-horizontal">
			              <center><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-id="<?php echo $row->id; ?>"><i class="fa fa-eye"></i></button></center>
			            </div> -->
						<?php echo "".strtoupper($row->keterangan); ?> 
					</td>
					
					<td><?php echo "".strtoupper($row->created_at); ?></td>
				</tr>
			<?php } ?>
		</tbody>
		<tfoot>
			<?php
			$admin_name = $this->session->userdata('admin_name');
			if ($admin_name == 'accounting')
			{ ?>
					    
			                <?php
							if (!empty($table[0]->statchecker1) and !empty($table[0]->statchecker12))
							{
								if ($table[0]->statchecker1 != 0 and $table[0]->statchecker2 != 0)
								{ ?>
									<tr>
										<th colspan="12" border="0">&nbsp;</th>
									</tr>
									<tr>
									<th colspan="12" border="0">	
										 <form method="post" target="_blank" action="<?php echo base_url('Laporan/reportFileUpload2'); ?>">
											<input name="tanggal" type="hidden" value="<?php echo $table[0]->tagtanggal; ?>" />
											<button type="submit" id="btn-dl" style="padding: 0px 14px;background-color: green;color: white;"><i class="fa fa-file-excel-o text-white"></i> <span>DOWNLOAD FILE</span></button>
										</form>
									</th>
									</tr>
									<tr>
										<th colspan="12" border="0">&nbsp;</th>
									</tr> 
								<?php
								}
							}
							?>
			<?php 
		    }?>		

        </tfoot>
	</table>

	<?php
	if ($admin_name == 'accounting')
	{ ?>
			<input type="submit" id="download_biaya" class="btn btn-info" value="DOWNLOAD FILE">
	
	<?php 
	} ?>
</div>