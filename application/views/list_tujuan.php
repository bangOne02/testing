<div class="table-responsive">
	<table id="table_1_tujuan" class="table table-bordered table-striped dataTable">
		<thead>
			<tr>
				<th width="10px;">NO</th>
				<th>DESKRIPSI</th>
				<th>HAPUS</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; foreach($table as $row){ ?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $row->description; ?></td>
				<td>
			            <div class="btn-group-horizontal">
			              <center><button type="button" class="btn btn-danger btn-sm" data-toggle="delete-pop" data-popout="true" data-id="<?php echo $row->id_mtujuan; ?>" ><i class="fa fa-trash"></i></button>
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