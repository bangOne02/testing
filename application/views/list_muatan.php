<div class="table-responsive">
	<table width="100%" id="table_1_muatan" class="table table-bordered table-striped dataTable">
		<thead>
			<tr>
				<th style="width: 10%;">NO</th>
				<th style="width: 50%;">NO SURAT JALAN</th>
                <th style="width: 50%;">TANGGAL</th>
				<th style="width: 20%;">ASAL</th>
				<th style="width: 20%;">TUJUAN</th>
				<th style="width: 20%;">MUATAN</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; foreach($table as $row){ ?>
			<tr>
				<td>1</td>
				<td><?php echo strtoupper($row->nomorsj); ?></td>
				<td><?php echo strtoupper($row->tanggalberangkat); ?></td>
				<td><?php echo strtoupper($row->asalsj); ?></td>
				<td><?php echo strtoupper($row->tujuann); ?></td>
				<td><?php echo strtoupper($row->jenismuatan); ?></td>
			</tr>
			<?php 
			$no++;
		} 
		?>
		</tbody>
	</table>
</div>