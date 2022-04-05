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

<LEFT>
<div class="table-responsive" width="100%">
	<table id="table_download" class="table" border="0"  width="100%">
		<thead>
			<tr>
				<?php
							$i = 0;
							if (count($hasil) > 0)
							{
                            foreach ($hasil[0] as $key => $value) { 
								if ($i < 2)
								{
							    ?>
                                <th>
                                    <?= strtoupper($key); ?>
                                </th>
                            <?php
								}
								else
								{
								?>
                                <th>
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
					<?php	
                        		$j = 0;
	                            foreach ($hasil[$i] as $key => $value) 
	                            { 
									if ($j < 2)
									{
								    ?>
	                                <th>
	                                    <?= strtoupper($value); ?>
	                                </th>
	                            <?php
									}
									else
									{
									?>
	                                <th>
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
</LEFT>
