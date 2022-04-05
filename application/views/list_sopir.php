<div class="table-responsive">
	<table width="100%" id="table_1_sopir" class="table table-bordered table-striped dataTable">
		<thead>
			<tr>
				<th style="width: 10%;">NO</th>
				<th style="width: 50%;">NAMA_DRIVER</th>
				<th style="width: 20%;">NOMOR SIM</th>
				<th style="width: 20%;">JENIS SIM</th>
				<th style="width: 20%;">NOMOR HANDPHONE</th>
				<th style="width: 20%;">UKURAN_KENDARAAN</th>
				<th style="width: 20%;"><center>NON_ACTIVE</center></th>
				<th style="width: 10%;">ID</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; foreach($table as $row){ ?>
			<tr>
				<td>1</td>
				<td><?php echo strtoupper($row->nama_mdriver); ?></td>
				<td><?php echo strtoupper($row->nomorsim); ?></td>
				<td><?php echo strtoupper($row->jenissim); ?></td>
				<td><?php echo strtoupper($row->no_hp); ?></td>
				<td><?php echo strtoupper($row->jns_kendaraan); ?></td>
				<td>
			            <div class="btn-group-horizontal">
			              <center><button type="button" class="btn btn-danger btn-sm" data-toggle="delete-pop" data-popout="true" data-id="<?php echo $row->id_mdriver; ?>" ><i class="fa fa-trash"></i></button>
							</center>
						</div>
				</td>
				<td><?php echo "".strtoupper($row->id_mdriver); ?></td>
			</tr>
			<?php 
			$no++;
		} 
		?>
		</tbody>
	</table>
</div>