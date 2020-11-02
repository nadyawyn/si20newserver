<section class="main_report-section">
	<h2 id="ft">Fitness</h2>
		<h3 class="ad__title ad__title_cal">
		<?php
			echo $today_mw;
		?>
		</h3>

		<div class="fitness__wrapper_output">
		<?php
			for($i=1; $i<=$enddate; $i++){
				if ($i < 10) {
					$i = "0".$i;
				}

				print('<div class="fitness__day"><div class="fitness__day_date">');
				print $i;
				print('</div><div class="fitness__day_res">');
				print('');
				print('</div></div>');
			}
		?>

		</div>
</section>