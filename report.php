<?php
	@include "lib/var.php";
	@include "lib/msqc.php";
	@include "content/header/header_rep.php";
?>
	
<main class="main main_settings">
	<?php 
	$thisdatabasename = 'si__'.$myname.'_set-general';
				//Getting MODULES from database
				$sql_mod = 'SELECT * FROM `'.$thisdatabasename.'` ORDER BY modid';
				$result_mod = mysqli_query($link, $sql_mod);
				
				while ($row_mod = mysqli_fetch_array($result_mod)) {
					if (($row_mod['modname'] != 'rec') && ($row_mod['modname'] != 'prog') && ($row_mod['modon'])){
						print('<div id="mod'.$row_mod['modid'].'" class="main_settings-gen-item main_settings-gen-item_low item-'.$row_mod['modname']);
					if (!$row_mod['modon']) {
						print(' inactive');
					}
					print('">');
					print('<a href="#'.$row_mod['modname'].'">');
					print($row_mod['modname']);
					print('</a>');
					print('</div>');
					}

					
				}?>
</main>				
<main class="main main_settings">
	<?php
	$thisdatabasename = 'si__'.$myname.'_set-general';
		//Getting MODULES from database
		$sql_mod = 'SELECT * FROM `'.$thisdatabasename.'` ORDER BY modid';
		$result_mod = mysqli_query($link, $sql_mod);
		
		while ($row_mod = mysqli_fetch_array($result_mod)) {
			if (($row_mod['modname'] != 'rec') && ($row_mod['modname'] != 'prog') && ($row_mod['modon'])){
				@include "content/report/rep_".$row_mod['modname'].".php";
			}
			
		}
	?>
	</main>
	<footer class="footer"></footer>


</body>

</html>