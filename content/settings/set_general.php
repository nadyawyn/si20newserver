<section class="main_settings-section minified">
	<h2 class="main_settings-section-title">General <small>(click to open)</small></h2>
		<div class="main_settings-wrapper">
			<?php 
			$thisdatabasename = 'si__'.$myname.'_set-general';
				//Getting MODULES from database
				$sql_mod = 'SELECT * FROM `'.$thisdatabasename.'` ORDER BY `modid`';
				$result_mod = mysqli_query($link, $sql_mod);
				
				while ($row_mod = mysqli_fetch_array($result_mod)) {
					print('<div id="mod'.$row_mod['modid'].'" class="main_settings-gen-item item-'.$row_mod['modname']);
					if (!$row_mod['modon']) {
						print(' inactive');
					}
					print('">');
					print($row_mod['modname']);
					print('</div>');
				}
			?>
		</div>
</section>