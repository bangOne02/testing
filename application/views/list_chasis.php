<div class="table-responsive">
	<table width="100%" id="table_1_chasis" class="table table-bordered table-striped dataTable">
		<thead>
			<tr>
				<th width="10px;">NO</th>
				<th>NAMA_CHASIS</th>
				<th>NO_KIR</th>
				<th>MASA_BERLAKU_KIR</th>
				<th>NAMA_PEMILIK</th>
				<th>COSTCENTER</th>
				<th>DESKRIPSI</th>
				<th>NOMOR_ASSET</th>
				<th><center>STATUS</center></th>
				<th><center>LOKASI</center></th>
				<th><center>NON_ACTIVE</center></th>
				<th><center>EDIT</center></th>
				<th><center>ID</center></th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; foreach($table as $row){ ?>
			<tr>
				<td>1</td>
				<td><?php echo strtoupper($row->chasis); ?></td>
				<td><?php echo strtoupper($row->nokir); ?></td>
				<td><?php echo strtoupper($row->masa_berlaku_kir); ?></td>
				<td><?php echo strtoupper($row->nama_pemilik); ?></td>
				<td><?php echo strtoupper($row->costcenter); ?></td>
				<td><?php echo strtoupper($row->desc); ?></td>
				<td><?php echo strtoupper($row->noasset); ?></td>
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
			<?php 
			$no++;
		} 
		?>
		</tbody>
	</table>
</div>