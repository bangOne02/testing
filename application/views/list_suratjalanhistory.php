
<div class="table-responsive">
	<table id="table_1" class="table table-bordered table-striped dataTable" style="width: 100%;">
		<thead>
			<tr>
				<th>NO</th>
				<th>NOMOR SURAT JALAN</th>			   
				<th>NOMOR POLISI</th>
				<th>NAMA KENDARAAN</th>
				<th>JENIS KENDARAAN</th>
				<th>SOPIR</th>
				<th>TGL RENCANA</th>
				<th>TGL BERANGKAT</th>
				<th>TGL DATANG</th>
				<th>TUJUAN
				 </th>
				<th><center>PREVIEW</center></th>
				<th >ID</th>
				<?php
					$admin_name = $this->session->userdata('admin_name');
					if ($admin_name == 'adminsecurity')
					{ ?>
						<th><center>REVISI</center></th>
					<?php		
					}
				?>
				
				
			</tr>
		</thead>
		<tbody>
			<?php foreach($table as $row){ ?>
				<tr id="<?php echo 'tr_'.$row->id; ?>">
					<td>1</td>
					<td><?php echo "<b style='color:#005b71'>".strtoupper($row->nomorsj); ?></td>
					<td><?php echo "".strtoupper($row->nopol); ?></td>
					<td><?php echo "".strtoupper($row->nama_jenis); ?></td>
					<td><?php echo "KENDARAAN ".strtoupper($row->ukuran); ?></td>
					<td><?php echo "".strtoupper(($row->namasopir == null ? $row->sopir : $row->namasopir)); ?></td>
					<td><?php echo "".strtoupper($row->tanggalberangkat); ?></td>
					<td><?php echo "".strtoupper($row->tglberangkat); ?></td>
					<td><?php echo "".strtoupper($row->tgltiba); ?></td>
					<td><?php echo "".strtoupper($row->tujuan); ?></td>
					<td> 
			            <div class="btn-group-horizontal">
			              <center><button type="button" class="btn btn-info btn-sm call-data-preview" data-toggle="modal" data-target="#modal-preview" data-id="<?php echo $row->id; ?>"><i class="fa fa-eye"></i></button></center>
			            </div>
					</td>
					<td><?php echo "".strtoupper($row->id); ?></td>
					<?php
						$admin_name = $this->session->userdata('admin_name');
						if ($admin_name == 'adminsecurity' && $row->proses == 2)
						{ ?>
					        <td><center>
								<div class="btn-group-horizontal">
										<a class="btn btn-success btn-sm btn-flat" style="background-color: #005b71;" href="<?php echo base_url('Proses/revisi/?nosj='.$row->nomorsj.'&proses=2'); ?>">EDIT</a>
					            </div>
					        </center></td>
						<?php
						} else if ($admin_name == 'adminsecurity' && $row->proses <> 2)
						{ ?>
						   	<td><center>
								<div class="btn-group-horizontal">
										<a class="btn btn-success btn-sm btn-flat" style="background-color: #005b71;">&nbsp;</a>
					            </div>
					        </center></td>
						   	<?php
					    } 
					?>
					
					
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
