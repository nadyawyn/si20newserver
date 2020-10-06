<?php
	@include "lib/var.php";
	@include "lib/msqc.php";
	@include "content/header/header_set.php";
?>
	<main class="main main_settings">
		<?php
			@include "content/settings/set_general.php";
			//@include "content/settings/set_personal.php";
			//@include "content/settings/set_dt.php";
			//@include "content/settings/set_ht.php";
			@include "content/settings/set_ft.php";
			//@include "content/settings/set_el.php";
			@include "content/settings/set_vt.php";
		
		?>
	</main>
	<footer class="footer"></footer>

<script src="js/set_script.js"></script>

</body>

</html>