


<div class="table-responsive">
	<table width="100%" id="table_1" class="table table-bordered table-striped dataTable">
		<thead>
			<tr>
				<th>NO</th>
				<th>NOMOR_POLISI</th>
				<th>NAMA_KENDARAAN</th>
				<th>TAHUN</th>
				<th>COSTCENTER</th>
				<th>DIVISI</th>
				<th>JENIS_KENDARAAN</th>
				<th><center>STATUS</center></th>
				<th><center>LOKASI</center></th>
				<th><center>PREVIEW</center></th>
				<th><center>NON_ACTIVE</center></th>
				<th><center>EDIT</center></th>
				<th>ID</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($table as $row){ ?>
				<tr id="<?php echo 'tr_'.$row->id; ?>">
					<td>1</td>
					<td><?php echo "<b style='color:#005b71'>".strtoupper($row->nopol); ?></td>
					<td><?php echo strtoupper($row->nama_jenis); ?></td>
					<td><?php echo strtoupper($row->tahun); ?></td>
					<td><?php echo strtoupper($row->costcenter); ?></td>
					<td><?php echo strtoupper($row->nama_divisi); ?></td>
					<td>KENDARAAN <?php echo strtoupper($row->ukuran); ?></td>
					<td><center>
					<?php 
						if ($row->tglberangkat != null && $row->tgltiba == null)
						{
							?>
										<a class="btn btn-success btn-sm btn-flat" style="background-color: #00ff26;">RUNNING</a>
							<?php
						} else
						{
							?>
										<a class="btn btn-success btn-sm btn-flat" style="background-color: #fd0000;">STANDBY</a>
							<?php
						}
					?>
				    </center></td>
					<td><?php echo strtoupper($row->lokasi); ?></td>	
					</td>
					<td> 
			            <div class="btn-group-horizontal">
			              <center><button type="button" class="btn btn-info btn-sm call-data-preview" data-toggle="modal" data-target="#modal-preview" data-id="<?php echo $row->id; ?>"><i class="fa fa-eye"></i></button></center>
			            </div>
					</td>
					<td>
			            <div class="btn-group-horizontal">
			              <center><button type="button" class="btn btn-danger btn-sm" data-toggle="delete-pop" data-popout="true" data-id="<?php echo $row->id; ?>" ><i class="fa fa-trash"></i></button>
							</center>
						</div>
				    </td>
				    <td>
			            <div class="btn-group-horizontal">
			              <center><button type="button" class="btn btn-info btn-sm call-data-update" data-toggle="modal" data-target="#modal-update" data-id="<?php echo $row->id; ?>"><i class="fa fa-pencil"></i></button> 
							</center>
						</div>
				    </td>
				    <td><?php echo "".strtoupper($row->id); ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>