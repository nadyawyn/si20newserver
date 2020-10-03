<?php
	@include "lib/var.php";
	@include "lib/msqc.php";
	@include "header.php";
?>
	<main class="main">
		<?php
		$thisdatabasename = 'si__'.$myname.'_set-general';
		//Getting MODULES from database
		$sql_mod = 'SELECT * FROM `'.$thisdatabasename.'` ORDER BY modid';
		$result_mod = mysqli_query($link, $sql_mod);
		
		while ($row_mod = mysqli_fetch_array($result_mod)) {
			if (($row_mod['modname'] != 'rec') && ($row_mod['modname'] != 'prog') && ($row_mod['modon'])){
				@include "content/main/".$row_mod['modname'].".php";
			}
			
		}
		?>

		test change
	</main>
	<footer class="footer"></footer>
	<script src="js/tab.js"></script>
	<script src="js/fd_script.js"></script>
</body>

</html>