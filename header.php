<?php
	@include "content/header/header_top.php";
	@include "content/header/header_icons.php";
	
	$thisdatabasename = 'si__'.$myname.'_set-general';

	//Getting PROGRESS from database
		$sql_mod = 'SELECT * FROM `'.$thisdatabasename.'` ORDER BY modid';
		$result_mod = mysqli_query($link, $sql_mod);
				
		while ($row_mod = mysqli_fetch_array($result_mod)) {
			if (($row_mod['modname'] == 'prog') && ($row_mod['modon'] == '1')) {
				@include "content/header/header_progress.php";
			}
		}
?>	
<div class="container">
	<div class="header__tabs">
		<?php 
		$thisdatabasename = 'si__'.$myname.'_set-general';

			//Getting MODULES from database
				$sql_mod = 'SELECT * FROM `'.$thisdatabasename.'` ORDER BY modid';
				$result_mod = mysqli_query($link, $sql_mod);
				
				while ($row_mod = mysqli_fetch_array($result_mod)) {
					if (($row_mod['modname'] != 'rec') && ($row_mod['modname'] != 'prog') && ($row_mod['modon'])){
						print('<div class="header__tab header__tab_'.$row_mod['modname'].'">');
						print($row_mod['modname']);
						print('</div>');
					}
					
				}
		?>
	
	</div>
</div>

</header>