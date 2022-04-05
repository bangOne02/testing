<div class="table-responsive">
	<table width="100%" id="table_1_suhu" class="table table-bordered table-striped dataTable">
		<thead>
			<tr>
				<th style="width: 10%;">NO</th>
				<th style="width: 50%;">PIC</th>
				<th style="width: 20%;">TANGGAL</th>
				<th style="width: 20%;">JAM</th>
				<th style="width: 20%;">SUHU</th>
				<th style="width: 20%;">KETERANGAN</th>
				<th style="width: 10%;">ID</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; foreach($table as $row){ ?>
			<tr>
				<td>1</td>
				<td><?php echo strtoupper($row->pic); ?></td>
				<td><?php echo strtoupper($row->tanggal); ?></td>
				<td><?php echo strtoupper($row->jam); ?></td>
				<td><?php echo strtoupper($row->suhu); ?></td>
				<td><?php echo strtoupper($row->keterangan); ?></td>
				<td><?php echo "".strtoupper($row->id); ?></td>
			</tr>
			<?php 
			$no++;
		} 
		?>
		</tbody>
	</table>
</div>