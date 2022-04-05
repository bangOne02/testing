<style>
html { margin: 0px}
table thead tr td{
    font-family: Arial, Helvetica, sans-serif;
}
table tbody tr td{
    font-family: Arial, Helvetica, sans-serif;
}
.scrollStyle
{
overflow-x:auto;
}
</style>


<div class="table-responsive" width="100%">
	<table class="table table-bordered" border="1" width="100%">
				<thead>
					<tr>
					<?php 
							$z = 0;
							if (count($hasil) > 0)
							{
								foreach ($hasil[0] as $key => $value) { 
									$z++;
								}
							}
                            ?> 
						<th width="80%"   colspan="<?php echo $z+1;?>" style="padding-bottom: 20px"><center><h3>DETAIL BIAYA KASBON</h3></center></th>
					</tr>
				</thead>
	</table>
</div>
<div class="table-responsive" width="100%">
	<table id="table_download" class="table table-bordered" border="1"  width="100%">
		<thead>
			<tr>
				<th style="text-align: left;padding: 10px;font-size: 11px;font-family: monospace;">
                                   NO
                                </th>
				<?php
							$i = 0;
							if (count($hasil) > 0)
							{
                            foreach ($hasil[0] as $key => $value) { 
								if ($i < 2)
								{
							    ?>
                                <th style="text-align: left;padding: 10px;font-size: 11px;font-family: monospace;">
                                    <?= strtoupper($key); ?>
                                </th>
                            <?php
								}
								else
								{
								?>
                                <th style="text-align: left;padding: 10px;font-size: 11px;font-family: monospace;">
                                    <?= strtoupper($key); ?>
                                </th>
                            <?php	
								}	
								$i++;
							}
							}
                            ?>
			</tr>
		</thead>
		<tbody>
			<?php
					for($i=0;$i<count($hasil);$i++) { ?>
					<tr>
						<th style="text-align: left;padding: 10px;font-size: 11px;font-family: monospace;">
	                                    <?= $i+1; ?>
	                                </th>
					<?php	
                        		$j = 0;
	                            foreach ($hasil[$i] as $key => $value) 
	                            { 
									if ($j < 2)
									{
								    ?>
	                                <th style="text-align: left;padding: 10px;font-size: 11px;font-family: monospace;">
	                                    <?= strtoupper($value); ?>
	                                </th>
	                            <?php
									}
									else
									{
									?>
	                                <th style="text-align: left;padding: 10px;font-size: 11px;font-family: monospace;">
	                                    <?= strtoupper($value); ?>
	                                </th>
	                            <?php	
									}	
									$j++;
								}
                     ?>
                     </tr>	
                     <?php
					}
				?>
		</tbody>
	</table>
</div>

