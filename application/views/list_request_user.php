

<div class="table-responsive">
	<table width="100%" id="table_1_request" class="table table-bordered table-striped dataTable">
		<thead>
			<tr>
				<th>NO</th>
				<th>USER REQUEST</th>
				<th>TANGGAL KEBERANGKATAN</th>
				<th>WAKTU KEBERANGKATAN</th>
				<th>KEPERLUAN</th>
				<th>JUMLAH PENUMPANG</th>
				<th>EXTENSION</th>
				<th><center>CANCEL</center></th>
				<th><center>STATUS</center></th>
				<th><center>ACTION</center></th>
				<th>ID</th>
			<!-- 	<th><center>EDIT</center></th> -->
			</tr>
		</thead>
		<tbody>
			<?php foreach($table as $row){ ?>
				<tr id="<?php echo 'tr_'.$row->id; ?>">
					<td>1</td>
					<td><?php echo strtoupper($row->user); ?></td>
					<td><?php echo strtoupper($row->tanggal); ?></td>
					<td><?php echo strtoupper($row->timestart); ?></td>
					<td><?php echo strtoupper($row->keterangan); ?></td>
					<td><?php echo strtoupper($row->jumlah); ?></td>
					<td><?php echo strtoupper($row->ext); ?></td>
					<td>
			            <div class="btn-group-horizontal">
			              <center><button type="button" class="btn btn-danger btn-sm" data-toggle="delete-pop" data-popout="true" data-id="<?php echo $row->id; ?>" ><i class="fa fa-trash"></i></button>
							</center>
						</div>
				    </td>
				    <td>
			            <div class="btn-group-horizontal">
							<?php
							if ($row->status == 0) 
							{
							?>
								<center><span>PENDING</span></center>
							<?php	
							} else if ($row->status == 1) {
							?>
								<center><span>APPROVE</span></center>
							<?php
							} else
							{
								?>
								<center><span>CANCEL</span>
							</center>
								<?php
							}
							?>
						</div>
				    </td>
					<!-- <td>
			            <div class="btn-group-horizontal">
							<a style="background-color: #337ab7; border-color: #337ab7;"  class="btn btn-primary btn-sm btn-flat data-approve" data-id="<?php echo $row->id; ?>">APROVE</a>
						</div>
				    </td> -->
					<td>
			            <div class="btn-group-horizontal">
						  <?php
						    $admin_name = $this->session->userdata('admin_name');
						    if ($admin_name != 'userkendaraan')
							{
								?>
								<center><button type="button" class="btn btn-info btn-sm call-data-approve" data-toggle="modal" data-target="#modal-approve" data-id="<?php echo $row->id; ?>">APPROVE</button> 
							</center>
								<?php
							}	else
							{?>
								<center><button type="button" disabled class="btn btn-info btn-sm call-data-approve" data-toggle="modal" data-target="#modal-approve" data-id="<?php echo $row->id; ?>"></button> 
							</center>
								<?php
							}
							?>

			              
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