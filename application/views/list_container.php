<div class="table-responsive">
	<table width="100%" id="table_1_container" class="table table-bordered table-striped dataTable">
		<thead>
			<tr>
				<th width="10px;">NO</th>
				<th>NAMA_CONTAINER</th>
				<th>KONDISI</th>
				<th>COSTCENTER</th>
				<th>NOMOR_ASSET</th>
				<th>NOMOR_EQUIPMENT</th>
				<th>DESKRIPSI</th>
				<th>EDIT</th>
				<th>ID</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; foreach($table as $row){ ?>
			<tr>
				<td>1</td>
				<td><?php echo $row->container; ?></td>
				<td><?php echo $row->kondisi; ?></td>
				<td><?php echo $row->costcenter; ?></td>
				<td><?php echo $row->noasset; ?></td>
				<td><?php echo $row->noequipment; ?></td>
				<td><?php echo $row->desc; ?></td>
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