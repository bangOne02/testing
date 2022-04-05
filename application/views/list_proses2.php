<div class="table-responsive">
	<table id="table_2" class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>ASPEK PEMERIKSAAN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> 
				<th>HASIL PEMERIKSAAN</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>3</td>
				<td>
					NOMOR KONTAINER
				</td>
				<td><input class="form-control" name="namakontainerc" value="<?php 
				if (count($table) != 0) 
				{ 
					echo $table[0]->namakontainerc; 
				} 
				?>" placeholder="" > </td>
			</tr>
			<tr>
				<td>4</td>
				<td>
					KONDISI KONTAINER ( ATAS )
				</td>
				<td><input class="form-control" name="kondisiatasc" value="<?php 
				if (count($table) != 0) 
				{ 
					echo $table[0]->kondisiatasc; 
				} 
				?>" placeholder="" > </td>
			</tr>
			<tr>
				<td>5</td>
				<td>
					KONDISI KONTAINER ( BAWAH )
				</td>
				<td><input class="form-control" name="kondisibawahc" value="<?php 
				if (count($table) != 0) 
				{ 
					echo $table[0]->kondisibawahc; 
				} 
				?>" placeholder="" > </td>
			</tr>
			<tr>
				<td>6</td>
				<td>
					KONDISI KONTAINER ( SAMPING KANAN )
				</td>
				<td><input class="form-control" name="kondisikananc" value="<?php 
				if (count($table) != 0) 
				{ 
					echo $table[0]->kondisikananc; 
				} 
				?>" placeholder="" > </td>
			</tr>
			<tr>
				<td>7</td>
				<td>
					KONDISI KONTAINER ( SAMPING KIRI )
				</td>
				<td><input class="form-control" name="kondisikiric" value="<?php 
				if (count($table) != 0) 
				{ 
					echo $table[0]->kondisikiric; 
				} 
				?>" placeholder="" > </td>
			</tr>
			<tr>
				<td>8</td>
				<td>
					KONDISI KONTAINER ( DEPAN )
				</td>
				<td><input class="form-control" name="kondisidepanc" value="<?php 
				if (count($table) != 0) 
				{ 
					echo $table[0]->kondisidepanc; 
				} 
				?>" placeholder="" > </td>
			</tr>
			<tr>
				<td>9</td>
				<td>
					KONDISI KONTAINER ( BELAKANG / PINTU )
				</td>
				<td><input class="form-control" name="kondisibelakangc" value="<?php 
				if (count($table) != 0) 
				{ 
					echo $table[0]->kondisibelakangc; 
				} 
				?>" placeholder="" > </td>
			</tr>
			<tr>
				<td>10</td>
				<td>
					KONDISI KONTAINER ( LANTAI )
				</td>
				<td><input class="form-control" name="kondisilantaic" value="<?php 
				if (count($table) != 0) 
				{ 
					echo $table[0]->kondisilantaic; 
				} 
				?>" placeholder="" > </td>
			</tr>
			<tr>
				<td>11</td>
				<td>
					KONDISI KONTAINER ( BAU / AROMA )
				</td>
				<td><input class="form-control" name="kondisibauc" value="<?php 
				if (count($table) != 0) 
				{ 
					echo $table[0]->kondisibauc; 
				} 
				?>" placeholder="" > </td>
			</tr>
			<tr>
				<td>12</td>
				<td>
					KONDISI KONTAINER ( KETERANGAN )
				</td>
				<td><input class="form-control" name="kondisiketerangan" value="<?php 
				if (count($table) != 0) 
				{ 
					echo $table[0]->kondisiketerangan; 
				} 
				?>" placeholder="" > </td>
			</tr>
			
		</tbody>
	</table>
	
</div>