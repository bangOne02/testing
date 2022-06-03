<div class="table-responsive">
	<table width="100%" id="table_1_suhu" class="table table-bordered table-striped dataTable">
		<thead>
			<tr>
				<th style="width: 10%;">NO</th>
				<th style="width: 20%;">TANGGAL</th>
				<th style="width: 20%;">JAM</th>
				<th style="width: 20%;">SUHU</th>
				<th style="width: 50%;">PIC</th>
				<th style="width: 20%;">LOKASI</th>
				<th style="width: 20%;">KETERANGAN</th>
				
				<th style="width: 20%;">ACTION</th>
				<th style="width: 10%;">ID</th>
				<th style="width: 20%;">TANGGALL</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; foreach($table as $row){ ?>
			<tr>
				<td>1</td>
				<td><?php echo strtoupper(date('d-m-Y',strtotime($row->tanggal))); ?></td>
				<td><?php echo strtoupper($row->jam); ?></td>
				<td><?php echo strtoupper($row->suhu); ?></td>
				<td><?php echo strtoupper($row->pic); ?></td>
				<td><?php echo strtoupper($row->fk_plant); ?></td>
				<td><?php echo strtoupper($row->keterangan); ?></td>
				
				<td>
					<div class="btn-group-horizontal">
						<?php
						$username = $this->session->userdata('username');
						if ($username == 'adminsby')
						{
						?>
						<center><button type="button" class="btn btn-info btn-sm call-data-update" data-toggle="modal" data-target="#modal-update" data-id="<?php echo $row->id; ?>"><i class="fa fa-pencil"></i></button> 
						</center>
						<?php 
						} else
						{ ?>
						<center><button type="button" disabled class="btn btn-info btn-sm" data-toggle="modal" ><i class="fa fa-pencil"></i></button> 
						</center>
						<?php	
						} ?>
					</div>
				</td>
				<td><?php echo "".strtoupper($row->id); ?></td>
				<td><?php echo strtoupper($row->tanggal); ?></td>
			</tr>
			<?php 
			$no++;
		} 
		?>
		</tbody>
	</table>
</div>