
<div class="row">
	<table class="table table-bordered" border="0" width="100%">
				<thead>
					<tr>
						<th width="70%" >
							<center>
								<img src="<?php echo base_url('assets/img/header2.png')?>" style="width: 500px;height: 100px;">
							</center>
						</th>
						<th width="30%" ><left><h3 style="font-size: 14px;margin-left: 50px;">KEPADA YTH<br><?php
				 		echo strtoupper($hasil[0]->tujuansj);
				    ?><br><font style="font-size: 7px;vertical-align: text-top;"> <?php
				 		echo strtoupper($hasil[0]->alamat);
				    ?></font> <br></h3></left></th>
					</tr>
					<tr>
						<th width="100%" colspan="2" style="font-size: 13px; font-weight: normal; ">
							<center>
								<p style="font-size: 18px;"><u>SURAT MOBILISASI KENDARAAN</u></p>


								No. <?php
				 		echo strtoupper($hasil[0]->nomorsj);	

				    ?> 
							</center>
						
							<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Harap Diterima Dengan Baik Dan Benar Barang-Barang Tersebut :

							<br>
							<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dikirim Dengan Kendaraan&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($hasil[0]->nama);?> &nbsp;&nbsp;&nbsp;&nbsp;No. Polisi&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($hasil[0]->nopol);?> 
						</th>
					</tr>
				</thead>
	</table>
</div>
<br>
<div class="table-responsive" style="border: 0px solid;margin-left: 20px;margin-right: 20px;">
	<table id="table_1" width="100%" border="1" class="table table-bordered" style="border-collapse: collapse;font-size: 12px;">
		<thead>
			<tr>
				<th width="18%">&nbsp;NO CHASIS</th>
				<th width="18%">&nbsp;NO CONTAINER</th>
				<th width="18%">&nbsp;NO SEGEL</th>
				<th width="18%">&nbsp;MUATAN</th>
				<th width="28%">&nbsp;KETERANGAN</th>
			</tr>
		</thead>
		<tbody>
		    <tr>
				<td><br><br>&nbsp;&nbsp;<?=( $hasil[0]->chasis <> '' ? $hasil[0]->chasis : '' );?><br><br><br></td>
				<td>&nbsp;&nbsp;<?=( $hasil[0]->container <> '' ? $hasil[0]->container : '' );?></td>
				<td>&nbsp;&nbsp;<?=( $hasil[0]->segelpelayaran <> '' ? $hasil[0]->segelpelayaran : '' );?></td>
				<td>&nbsp;&nbsp;<?=( $hasil[0]->jenismuatan <> '' ? $hasil[0]->jenismuatan : '' );?></td>
				<td><?=( $hasil[0]->keterangan <> '' ? $hasil[0]->keterangan : '' );?></td>
			</tr>
        </tbody>
	</table>
</div>
<br>
<div class="row">
	
		 <table class="table table-bordered" border="0" width="100%" style="font-size: 12px;">
			<tr >
				<td width="5%">&nbsp;</td>
				<td width="20%">Dibuat / <?php echo strtoupper(date('d-m-Y',strtotime($hasil[0]->tanggalberangkat)));?> <br><br><br><br><br><?php echo strtoupper($hasil[0]->pic);?></td>
				<td width="20%">&nbsp;<br><br><br><br><br>&nbsp;</td>
				<td width="20%">&nbsp;<br><br><br><br><br>&nbsp;</td>
				
				<td width="20%">-&nbsp;Putih&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;Arsip<br>-&nbsp;Merah&nbsp;&nbsp;&nbsp;:&nbsp;Penerima<br>-&nbsp;Kuning&nbsp;&nbsp;:&nbsp;SATPAM<br><br><br><br></td>
				<td width="20%"><center>
					<br>
								<img src="<?php echo base_url('assets/img/'.$hasil[0]->id.'.png')?>" style="width: 100px;height: 100px">
							</center></td>
			</tr>
		</table> 
</div>