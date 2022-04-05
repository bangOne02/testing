<div class="table-responsive">
	<table id="table_1_biaya2" class="table table-bordered display nowrap table-striped dataTable" style="width: 100%">
		<thead>
			<tr>
				<th>NO</th>
				<td>ID</th>
				<th>NOMOR SURAT JALAN</th>
				<th>GL ACCOUNT</th>
				<th>COST CENTER</th>
				<th>TOTAL BIAYA 1</th>
				<th>TOTAL BIAYA 2</th>
				<th>BIAYA CONT</th>
				<th>BBM</th>
				<th>BBM HEAD</th>
				<th>BBM GENSET</th>
				<th>BBM MEMO</th>
				<th>NO MEMO</th>
				<th>TOL</th>
				<th>PARKIR</th>
				<th>KULI</th>
				<th>KELAS JALAN</th>
				<th>UANG INAP/ MAKAN</th>
				<th>LAIN-LAIN</th>
				<th>TOTAL EXTRA DRIVER</th>
				<th>TOTAL EXTRA KERNET</th>
				<th>EXTRA DRIVER</th>
				<th>EXTRA KERNET</th>
				<th>LEMBUR DRIVER</th>
				<th>LEMBUR KERNET</th>
				<th>KETERANGAN</th>
				<th>ACTION</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($table as $row){ ?>
				<tr>
					<td>1</td>
					<td><?php echo "".strtoupper($row->iddetail); ?></td>
					<td><?php echo "".strtoupper($row->id_sj); ?></td>
					<td><?php echo "".strtoupper($row->glaccount); ?></td>
					<td><?php echo "".strtoupper($row->costcenter); ?></td>
					<td><?php echo "".strtoupper($row->totalbiaya1); ?></td>
					<td><?php echo "".strtoupper($row->totalbiaya2); ?></td>
					<td><?php echo "".strtoupper($row->biayacont); ?></td>
					<td><?php echo "".strtoupper($row->bbmtunai); ?></td>
					<td><?php echo "".strtoupper($row->bbmhead); ?></td>
					<td><?php echo "".strtoupper($row->genset); ?></td>
					<td><?php echo "".strtoupper($row->bbmnontunai); ?></td>
					<td><?php echo "".strtoupper($row->nomemo); ?></td>
					<td><?php echo "".strtoupper($row->biayatol); ?></td>
					<td><?php echo "".strtoupper($row->parkir); ?></td>
					<td><?php echo "".strtoupper($row->kuli); ?></td>
					<td><?php echo "".strtoupper($row->kelasjalan); ?></td>
					<td><?php echo "".strtoupper($row->feeinap); ?></td>
					<td><?php echo "".strtoupper($row->biayalain); ?></td>
					<td><?php echo "".strtoupper($row->totalfeedriver); ?></td>
					<td><?php echo "".strtoupper($row->totalfeekernet); ?></td>
					<td><?php echo "".strtoupper($row->feedriver); ?></td>
					<td><?php echo "".strtoupper($row->feekernet); ?></td>
					<td><?php echo "".strtoupper($row->lemburdriver); ?></td>
					<td><?php echo "".strtoupper($row->lemburkernet); ?></td>
					<td><?php echo "".strtoupper($row->keterangan); ?></td>
					<td>
					    <div class="btn-group-horizontal">
	            		<button type="button" class="btn btn-info btn-sm call-data-update" data-toggle="modal" data-target="#modal-update" data-id="<?php echo $row->iddetail; ?>"><i class="fa fa-pencil"></i></button> 
	            		<button type="button" class="btn btn-danger btn-sm" data-toggle="delete-pop" data-popout="true" data-id="<?php echo $row->iddetail; ?>"><i class="fa fa-trash"></i></button>
	          			</div>
					</td>	
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>