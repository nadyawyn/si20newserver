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

				print('<div class="fitness__day" id="ftday'.$i.'"><div class="fitness__day_date">');
				print $i;
				print('</div><div class="fitness__day_res">');
					//Выводим фитнес-занятия за текущую дату
					$thisdatabasename = 'si__'.$myname.'_fttracker';
					$sql_ftd = 'SELECT * FROM `'.$thisdatabasename.'` WHERE `recdate` = "2020-'.$today_m.'-'.$i.'"';
					$result_ftd = mysqli_query($link, $sql_ftd);
					while ($row_ftd = mysqli_fetch_array($result_ftd)) {
						print('<div class="fitness__day_res-item fitness__res-item" ');
						print('style="background-image:url(icons/fitness/'.$row_ftd['fitid'].'.png)">');
						print('</div>');
					}
				print('</div></div>');
			}
		?>

		</div>
</section>
