 <div class="nav-tabs-custom">
        
             
                <div class="box-header with-border" style="height: 39px;background-color: #222d32;color: beige;"">
                <b>LIST DATA CONTAINER ACTIVE</b>  
				<div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool call-refresh"><i class="fa fa-refresh"></i> REFRESH</button>
                  </div>
                 
                </div>

                    
                <div class="table-responsive">
	<table width="100%" id="table_1_container" class="table table-striped dataTable">
		<thead>
			<tr>
				<th>NO</th>
				<th>NOMOR CONTAINER</th>
				<th><center>INPUT</center></th>
				<th><center>DETAIL</center></th>
				<th><center>REPORT</center></th>
				<th>ID</th>
				<th><center>LOKASI</center></th>
				<th><center>ACTION</center></th>
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
						<?php
						$username = $this->session->userdata('username');
						if ($username != 'teknikdampit')
						{
						?>
			              <center><a class="btn btn-success btn-sm btn-flat" style="background-color: #005b71;" href="<?php echo base_url('Kendaraan/inputContainer/?idcontainer='.$row->id.'&nocontainer='.$row->container); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INPUT SUHU&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
							</center>
						<?php
						} else
						{ ?>
							<center><a class="btn btn-success btn-sm btn-flat" disabled style="background-color: #005b71;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INPUT SUHU&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
							</center>
						<?php	
						}
						?>
						</div>
				    </td>
					<td>
			            <div class="btn-group-horizontal">
                        <center><a class="btn btn-success btn-sm btn-flat" style="background-color: #005b71;" href="<?php echo base_url('Kendaraan/detailContainer/?idcontainer='.$row->id.'&nocontainer='.$row->container); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DETAIL HISTORY&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
							</center>
						</div>
				    </td>
					<td>
			            <div class="btn-group-horizontal">
                        <center><a class="btn btn-success btn-sm btn-flat" style="background-color: #005b71;" href="<?php echo base_url('Laporan/reportContainer/'.$row->id); ?>">&nbsp;&nbsp;&nbsp;&nbsp;REPORT INPUT SUHU&nbsp;&nbsp;&nbsp;&nbsp;</a>
							</center>
							
						</div>
				    </td>
				    <td><?php echo "".strtoupper($row->id); ?></td>
					<td><?php echo strtoupper($row->lokasi); ?></td>
					<td>
			            <div class="btn-group-horizontal">
							<?php
							$username = $this->session->userdata('username');
							if ($username == 'adminsby')
							{
							?>
			                <center><a style="background-color: #005b71; border-color: #005b71;"  class="btn btn-primary btn-sm btn-flat datacont-nonactive" data-id="<?php echo $row->id; ?>">NON ACTIVE</a>
							</center>
							<?php
							} else
							{ ?>
							<center><a style="background-color: #005b71; border-color: #005b71;"  class="btn btn-primary btn-sm btn-flat" data-id="<?php echo $row->id; ?>">&nbsp;&nbsp;&nbsp;</a>
							</center>
							<?php
							}
							?>
						</div>
				    </td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<?php
$username = $this->session->userdata('username');
if ($username == 'adminsby')
{
?>

<br>
<br>
<br>

<div class="box-header with-border" style="height: 39px;background-color: #222d32;color: beige;"">
                <b>LIST DATA CONTAINER NON ACTIVE</b>  
				<div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool call-refresh"><i class="fa fa-refresh"></i> REFRESH</button>
                  </div>
                 
                </div>

<div class="table-responsive">
	<table width="100%" id="table_1_container2" class="table table-bordered table-striped dataTable">
		<thead>
			<tr>
				<th>NO</th>
				<th>NOMOR CONTAINER</th>
				<th>TGL MASUK</th>
				<th><center>STATUS</center></th>
				<th><center>ACTION</center></th>
				<th>ID</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($table2 as $row){ ?>
				<tr id="<?php echo 'tr_'.$row->id; ?>">
					<td>1</td>
					<td><?php echo strtoupper($row->container); ?></td>
					<td><?php echo strtoupper($row->dateupdate); ?></td>
					<td><center>NON ACTIVE</center></td>
					<td>
			            <div class="btn-group-horizontal">
			              <center><a style="background-color: #005b71; border-color: #005b71;"  class="btn btn-primary btn-sm btn-flat datacont-active" data-id="<?php echo $row->id; ?>">ACTIVE</a>
							</center>
						</div>
				    </td>
				    <td><?php echo "".strtoupper($row->id); ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

</div>

<?php
} else
{
?>
<div class="table-responsive" hidden="true" style="visibility: hidden;">
	<table width="100%" id="table_1_container2" class="table table-bordered table-striped dataTable" >
	</table>
</div>
<?php
}
?>