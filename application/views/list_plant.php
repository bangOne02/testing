<div class="table-responsive">
	<table id="table_1_plant" class="table table-bordered table-striped dataTable">
		<thead>
			<tr>
				<th width="10px;">NO</th>
				<th>NAMA_PLANT</th>
				<th>MUATAN</th>
				<th>BAGIAN</th>
				<th>PIC</th>
				<th><center>NON_ACTIVE</center></th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; foreach($table as $row){ ?>
			<tr>
				<td><?php echo strtoupper($no); ?></td>
				<td><?php echo strtoupper($row->nama_mplant); ?></td>
				<td><?php echo strtoupper($row->muatan); ?></td>
				<td><?php echo strtoupper($row->bagian); ?></td>
				<td><?php echo strtoupper($row->pic); ?></td>
				<td>
			            <div class="btn-group-horizontal">
			              <center><button type="button" class="btn btn-danger btn-sm" data-toggle="delete-pop" data-popout="true" data-id="<?php echo $row->id_mplant; ?>" ><i class="fa fa-trash"></i></button>
							</center>
						</div>
				</td> 
			</tr>
			<?php 
			$no++;
		} 
		?>
		</tbody>
	</table>
</div>