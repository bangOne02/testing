<div class="table-responsive">
	<table id="table_1" class="table table-bordered table-striped dataTable" style="width: 100%;" data-provide="datatable"
					data-display-rows="10"
					data-info="true"
					data-search="true"
					data-length-change="true"
					data-paginate="true" id="tbl-requestlist">
		<thead>
			<tr>
				<th>NO&nbsp;&nbsp;</th>
				<th>NOMOR SURAT JALAN</th>			   
				<th>NOPOL</th>
				<th>KENDARAAN</th>
				<th>DRIVER</th>
				<th>TANGGAL</th>
				<th>ASAL</th>
				<th>TUJUAN</th>

				<th><center>CETAK</center></th>
				<th><center>PREVIEW</center></th>
				<?php
					$admin_name = $this->session->userdata('admin_name');
					if ($admin_name == 'security')
					{ ?>
						<th><center>ACTION</center></th>
					<?php	
					} else if ($admin_name == 'adminsecurity')
					{ ?>
						<th><center>REVISI</center></th>
					<?php		
					} else
					{?>
						<th><center>EDIT</center></th>
					<?php	
					}
				?>
				<th>Id</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($table as $row){ ?>
				<tr id="<?php echo 'tr_'.$row->id; ?>">
					<td>1</td>
					<td><?php echo "".strtoupper($row->nomorsj); ?></td>
					<td><?php echo "".strtoupper($row->nopol); ?></td>
					<td><?php echo "".strtoupper($row->nama_jenis); ?></td>
					<td><?php echo "".strtoupper(($row->namasopir == null ? $row->sopir : $row->namasopir)); ?></td>
					<td><?php echo "".strtoupper($row->tanggalberangkat); ?></td>
					<td><?php echo "".strtoupper($row->asalsj); ?></td>
					<td><?php echo "".strtoupper($row->tujuan); ?></td>
					<?php
					$admin_name = $this->session->userdata('admin_name');
					if ($admin_name == 'admin')
					{ ?>
						<td><center><a class="btn btn-success btn-sm btn-flat" target="_blank" href="<?php echo base_url('SuratJalan/reportSuratJalan/'.$row->id); ?>"><i class="fa fa-sign-in"></i></a></center></td>
					<?php
					} else
					{
					?>
						<td><center><a class="btn btn-success btn-sm btn-flat" disabled="true" target="_blank" href="<?php echo base_url('SuratJalan/reportSuratJalan/'.$row->id); ?>"><i class="fa fa-sign-in"></i></a></center></td>
					<?php
					}
					?>
					<td> 
			            <div class="btn-group-horizontal">
			              <center><button type="button" class="btn btn-info btn-sm btn-flat call-data-preview" data-toggle="modal" data-target="#modal-preview" data-id="<?php echo $row->id; ?>"><i class="fa fa-eye"></i></button></center>
			            </div>
					</td>

					<?php
						$admin_name = $this->session->userdata('admin_name');
						if ($admin_name == 'security')
						{ ?>
							<td><center>
								<div class="btn-group-horizontal">
							    <?php		
								    if ($row->proses == 2) 
									{ ?>
										<a class="btn btn-success btn-sm btn-flat" 
										 <?php if ($admin_name == 'security') 
										 { ?>
										 	href="<?php echo base_url('Proses/index/?nosj='.$row->nomorsj.'&proces='.$row->proces); ?>"
										 <?php	
										 } ?>
										>PROSES</a>
										<!-- <a class="btn btn-success btn-sm btn-flat" style="background-color: #fd0000;">CLOSED</a> -->
									<?php
									} else if ($row->proses == 1) 
									{ ?>
										<a class="btn btn-success btn-sm btn-flat" 
										 <?php if ($admin_name == 'security') 
										 { ?>
										 	href="<?php echo base_url('Proses/index/?nosj='.$row->nomorsj.'&proces='.$row->proces); ?>"
										 <?php	
										 } ?>
										>PROSES</a>
									<?php	
									} else	
									{ ?>
										<a class="btn btn-success btn-sm btn-flat" 
										<?php if ($admin_name == 'security') 
										 { ?>
										 	href="<?php echo base_url('Proses/index/?nosj='.$row->nomorsj.'&proces='.$row->proces); ?>"
										 <?php	
										 } ?>
										>PROSES</a>
							  <?php } ?> 	
					            </div>
					        </center></td>
					        <?php
						} else if ($admin_name == 'adminsecurity' && $row->proses == 2)
						{ ?>
					        <td><center>
								<div class="btn-group-horizontal">
									<a class="btn btn-success btn-sm btn-flat" style="background-color: #005b71;" href="<?php echo base_url('Proses/revisi/?nosj='.$row->nomorsj.'&proses=2'); ?>">EDIT</a>	
					            </div>
					        </center></td>
						<?php
						} else if ($admin_name == 'adminsecurity' && $row->proses == 1)
						{ ?>
						   	<td><center>
								<div class="btn-group-horizontal">
									<a class="btn btn-success btn-sm btn-flat" style="background-color: #005b71;" href="<?php echo base_url('Proses/revisi/?nosj='.$row->nomorsj.'&proses=1'); ?>">EDIT</a>
					            </div>
					        </center></td>
						   	<?php
					    } else if ($admin_name == 'adminsecurity' && $row->proses == 0)
						{ ?>
						   	<td><center>
								<div class="btn-group-horizontal">
									<a class="btn btn-success btn-sm btn-flat" style="background-color: #005b71;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
					            </div>
					        </center></td>
						   	<?php
					    } else
						{?>
							
							<td>
							<center>
					            <!-- <div class="btn-group-horizontal">
					              <button  type="button" class="btn btn-danger btn-sm btn-flat" data-toggle="delete-pop" data-popout="true" data-id="<?php echo $row->id; ?>"><i class="fa fa-trash"></i></button>
					            </div> -->
								<div class="btn-group-horizontal">
									<!-- <a class="btn btn-success btn-sm btn-flat" style="background-color: #005b71;" href="<?php echo base_url('Proses/revisi/?nosj='.$row->nomorsj.'&proses=1'); ?>">EDIT</a> -->
									<button type="button" class="btn btn-info btn-sm call-data-update" data-toggle="modal" data-target="#modal-update" data-id="<?php echo $row->id; ?>">UPDATE</button>
								</div>
					        </center>
							</td>	
							
						<?php	
						}
					?>
					<td><?php echo "".strtoupper($row->id); ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>