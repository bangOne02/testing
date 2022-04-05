<div class="table-responsive">
	<table width="100%" id="table_1_jenis" class="table table-bordered table-striped dataTable" style="width: 100%;" data-provide="datatable"
					data-display-rows="10"
					data-info="true"
					data-search="true"
					data-length-change="true"
					data-paginate="true" id="tbl-requestlist">
		<thead>
			<tr>
				<th>NO</th>
				<th>NAMA_JENIS</th>
				<th><center>HAPUS</center></th>
				<th>ID</th>
			<!-- 	<th><center>EDIT</center></th> -->
			</tr>
		</thead>
		<tbody>
			<?php foreach($table as $row){ ?>
				<tr id="<?php echo 'tr_'.$row->id; ?>">
					<td>1</td>
					<td><?php echo strtoupper($row->nama_jenis); ?></td>
					<td>
			            <div class="btn-group-horizontal">
			              <center><button type="button" class="btn btn-danger btn-sm" data-toggle="delete-pop" data-popout="true" data-id="<?php echo $row->id; ?>" ><i class="fa fa-trash"></i></button>
							</center>
						</div>
				    </td>
				    <td><?php echo "".strtoupper($row->id); ?></td>
				   <!--  <td>
			            <div class="btn-group-horizontal">
			              <center><button type="button" class="btn btn-info btn-sm call-data-update" data-toggle="modal" data-target="#modal-update" data-id="<?php echo $row->id; ?>"><i class="fa fa-pencil"></i></button> 
							</center>
						</div>
				    </td> -->

				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>