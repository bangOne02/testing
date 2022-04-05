<div class="table-responsive">
	<table id="table_1_depo" class="table table-bordered table-striped dataTable">
		<thead>
			<tr>
				<th width="10px;">NO</th>
				<th>NAMA_DEPO</th>
				<th>&nbsp;</th>
				<th>ALAMAT</th>
				<th><center>NON_ACTIVE</center></th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; foreach($table as $row){ ?>
			<tr>
				<td><?php echo strtoupper($no); ?></td>
				<td><?php echo strtoupper($row->nama_mdepo); ?></td>
				<td><?php echo strtoupper($row->idx); ?></td>
				<td><?php echo strtoupper($row->alamat); ?></td>
				<td>
			            <div class="btn-group-horizontal">
			              <center><button type="button" class="btn btn-danger btn-sm" data-toggle="delete-pop" data-popout="true" data-id="<?php echo $row->id_mdepo; ?>" ><i class="fa fa-trash"></i></button>
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