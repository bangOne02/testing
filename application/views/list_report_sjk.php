
<div class="row" style="margin-left: 20px;margin-right: 20px;">
	<table class="table table-bordered" border="0" width="100%">
				<thead>
					<tr>
						<th width="50%">
							&nbsp;
						</th>
						<th width="19%">
							<img src="<?php echo base_url('assets/img/header.png')?>" style="width: 130px;height: 100px;margin-left: 10px;">
						</th>
						<td width="1%">&nbsp;</td>
						<th width="30%"><left><h3 style="font-size: 17px;transform: scale(1, 2);">SURAT MOBILISASI KENDARAAN</h3></left></th>
					</tr>
				</thead>
				<tbody>
					  <tr>
							<td width="50%">&nbsp;</td>
							<td>&nbsp;</td>
						    <td>&nbsp;</td>
						    <td>&nbsp;</td>
					  </tr>	
					  <tr>
							<td width="50%">&nbsp;</td>
							<td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang Bertanda Tangan Di Bawah Ini </td>
					  </tr>	
					  <tr>
							<td colspan="3">&nbsp;</td>
					  </tr>
					  <tr>
					  		<td width="50%">&nbsp;</td>	
							<td width="19%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor Mobilisasi</td>
							<td width="1%">:</td>
							<td width="30%"><left><?php echo $hasil[0]->nomorsj;?></left></td>
					  </tr>	
					  <tr>
					  		<td width="50%">&nbsp;</td>	
							<td width="19%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama PIC</td>
							<td width="1%">:</td>
							<td width="30%"><left><?php echo $hasil[0]->pic;?></left></td>
					  </tr>
				      <tr>
				      	    <td width="50%">&nbsp;</td>	
							<td colspan="3">&nbsp;</td>
					  </tr>	
					  <tr>
					  	    <td width="50%">&nbsp;</td>	
							<td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Memberikan Tugas Kepada </td>
					  </tr>
					  <tr>
							<td colspan="3">&nbsp;</td>
					  </tr>
					  <tr>
					  	    <td width="50%">&nbsp;</td>	
							<td width="19%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Driver</td>
							<td width="1%">:</td>
							<td width="30%"><left><?php echo $hasil[0]->nama;?></left></td>
					  </tr>
					  <tr>
					  	    <td width="50%">&nbsp;</td>	
							<td width="19%" style="vertical-align: text-top;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tugas</td>
							<td width="1%" style="vertical-align: text-top;">:</td>
							<td width="30%"><left>
								<textarea style="text-transform:uppercase;resize: none;height: 80px;border:none;font-size: 13px;" class="form-control" id="tugas" name="tugas"><?php echo str_replace('\r\n','<br>',str_replace('"','',json_encode($hasil[0]->tugas)));?></textarea>
								</left></td>
					  </tr>
					  <tr>
					  	    <td width="50%">&nbsp;</td>	
							<td width="19%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Keterangan</td>
							<td width="1%">:</td>
							<td width="30%"><left><?php echo $hasil[0]->keterangan;?></left></td>
					  </tr>
					  <tr>
					  	    <td width="50%">&nbsp;</td>	
							<td width="19%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tujuan Surat Jalan</td>
							<td width="1%">:</td>
							<td width="30%"><left><?php echo $hasil[0]->tujuansj;?></left></td>
					  </tr>
					  <tr>
					  		<td width="50%">&nbsp;</td>		
							<td width="19%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor Polisi</td>
							<td width="1%">:</td>
							<td width="30%"><left><?php echo $hasil[0]->nopol;?></left></td>
					  </tr> 
					  <tr>
					  		<td width="50%">&nbsp;</td>		
							<td width="19%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal Keberangkatan</td>
							<td width="1%">:</td>
							<td width="30%"><left><?php echo strtoupper(( $hasil[0]->tanggalberangkat <> '' ? date('d-m-Y',strtotime($hasil[0]->tanggalberangkat)) : '' )) ?></left></td>
					  </tr> 
		        </tbody>
	</table>
</div>
<br>
<br>
<br>
<div class="row">
	
		 <table class="table table-bordered" border="0" width="100%">
			<tr >
				<td width="10%">&nbsp;</td>
				<td width="10%">&nbsp;</td>
				<td width="10%">&nbsp;</td>
				<td width="10%">&nbsp;</td>
				<td width="20%"><center>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('assets/img/'.$hasil[0]->id.'.png')?>" style="width: 100px;height: 100px">
							</center></td>
			</tr>
		</table> 
</div>