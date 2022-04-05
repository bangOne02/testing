<div class="table-responsive">
	<table width="100%" id="table_1_container" class="table table-bordered table-striped dataTable">
		<thead>
			<tr>
				<th>NO</th>
				<th>NOMOR CONTAINER</th>
				<th><center>INPUT SUHU</center></th>
				<th><center>DETAIL CONTAINER</center></th>
				<th><center>REPORT</center></th>
				<th>ID</th>
			<!-- 	<th><center>EDIT</center></th> -->
			</tr>
		</thead>
		<tbody>
			<?php foreach($table as $row){ ?>
				<tr id="<?php echo 'tr_'.$row->id; ?>">
					<td>1</td>
					<td><?php echo strtoupper($row->container); ?></td>
					<td>
			            <div class="btn-group-horizontal">
			              <center><a class="btn btn-success btn-sm btn-flat" style="background-color: #005b71;" href="<?php echo base_url('Kendaraan/inputContainer/?idcontainer='.$row->id.'&nocontainer='.$row->container); ?>">INPUT SUHU</a>
							</center>
						</div>
				    </td>
					<td>
			            <div class="btn-group-horizontal">
                        <center><a class="btn btn-success btn-sm btn-flat" style="background-color: #005b71;" href="<?php echo base_url('Kendaraan/detailContainer/?idcontainer='.$row->id.'&nocontainer='.$row->container); ?>">&nbsp;&nbsp;&nbsp;&nbsp;DETAIL&nbsp;&nbsp;&nbsp;&nbsp;</a>
							</center>
						</div>
				    </td>
					<td>
			            <div class="btn-group-horizontal">
                        <center><a class="btn btn-success btn-sm btn-flat" style="background-color: #005b71;" href="<?php echo base_url('Laporan/reportContainer/'.$row->id); ?>">&nbsp;&nbsp;&nbsp;&nbsp;REPORT&nbsp;&nbsp;&nbsp;&nbsp;</a>
							</center>
							
						</div>
				    </td>
				    <td><?php echo "".strtoupper($row->id); ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>