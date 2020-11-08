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
		<div class="fitness__output_body">
		<h3 class="ad__title">My body progress</h3>
		<div class="fitness__overall">
			<div class="fitness__wrapper">
				<div class="fitness__wrapper_out fitness__wrapper_date"></div>
				<div class="fitness__wrapper_out name">Weight, kg</div>
				<div class="fitness__wrapper_out name">Breast, cm</div>
				<div class="fitness__wrapper_out name">Waist, cm</div>
				<div class="fitness__wrapper_out name">Hips, cm</div>
				<div class="fitness__wrapper_out name">Leg, cm</div>
				<div class="fitness__wrapper_out name">Belly, cm</div>
			</div>
			<div class="fitness__wrapper">
				<div class="fitness__wrapper_out fitness__wrapper_date">
					<?php
							$thisdatabasename1 = 'si__'.$myname.'_fitnesspar';
							
							//Выводим параметры тела за все даты
									
							$sql_bp = 'SELECT `recdate` FROM `'.$thisdatabasename1.'` ORDER BY `recdate` DESC';
							
							$result_bp = mysqli_query($link, $sql_bp);
							while ($row_bp = mysqli_fetch_array($result_bp)) {
								print('<div>');
								print($row_bp['recdate']);		
								print('</div>');	
							}			
					?>
				</div>
				<div class="fitness__wrapper_out">
					<?php
							$thisdatabasename1 = 'si__'.$myname.'_fitnesspar';
							
							//Выводим параметры тела за все даты
									
							$sql_bp = 'SELECT * FROM `'.$thisdatabasename1.'` ORDER BY `recdate` DESC';
							
							$result_bp = mysqli_query($link, $sql_bp);
							while ($row_bp = mysqli_fetch_array($result_bp)) {
								print('<div class="fitness__bp-value" style="width: '.$row_bp['myweight'].'px">');
								print($row_bp['myweight']);		
								print('</div>');	
							}			
					?>
				</div>
				<div class="fitness__wrapper_out">
					<?php
							$thisdatabasename1 = 'si__'.$myname.'_fitnesspar';
							
							//Выводим параметры тела за все даты
									
							$sql_bp = 'SELECT * FROM `'.$thisdatabasename1.'` ORDER BY `recdate` DESC';
							
							$result_bp = mysqli_query($link, $sql_bp);
							while ($row_bp = mysqli_fetch_array($result_bp)) {
								print('<div class="fitness__bp-value" style="width: '.$row_bp['mybreast'].'px">');
								print($row_bp['mybreast']);		
								print('</div>');	
							}			
					?>
				</div>
				<div class="fitness__wrapper_out">
					<?php
							$thisdatabasename1 = 'si__'.$myname.'_fitnesspar';
							
							//Выводим параметры тела за все даты
									
							$sql_bp = 'SELECT * FROM `'.$thisdatabasename1.'` ORDER BY `recdate` DESC';
							
							$result_bp = mysqli_query($link, $sql_bp);
							while ($row_bp = mysqli_fetch_array($result_bp)) {
								print('<div class="fitness__bp-value" style="width: '.$row_bp['mywaist'].'px">');
								print($row_bp['mywaist']);		
								print('</div>');	
							}			
					?>
				</div>
				<div class="fitness__wrapper_out">
					<?php
							$thisdatabasename1 = 'si__'.$myname.'_fitnesspar';
							
							//Выводим параметры тела за все даты
									
							$sql_bp = 'SELECT * FROM `'.$thisdatabasename1.'` ORDER BY `recdate` DESC';
							
							$result_bp = mysqli_query($link, $sql_bp);
							while ($row_bp = mysqli_fetch_array($result_bp)) {
								print('<div class="fitness__bp-value" style="width: '.$row_bp['myhips'].'px">');
								print($row_bp['myhips']);		
								print('</div>');	
							}			
					?>
				</div>
				<div class="fitness__wrapper_out">
					<?php
							$thisdatabasename1 = 'si__'.$myname.'_fitnesspar';
							
							//Выводим параметры тела за все даты
									
							$sql_bp = 'SELECT * FROM `'.$thisdatabasename1.'` ORDER BY `recdate` DESC';
							
							$result_bp = mysqli_query($link, $sql_bp);
							while ($row_bp = mysqli_fetch_array($result_bp)) {
								print('<div class="fitness__bp-value" style="width: '.$row_bp['myleg'].'px">');
								print($row_bp['myleg']);		
								print('</div>');	
							}			
					?>
				</div>
				<div class="fitness__wrapper_out">
					<?php
							$thisdatabasename1 = 'si__'.$myname.'_fitnesspar';
							
							//Выводим параметры тела за все даты
									
							$sql_bp = 'SELECT * FROM `'.$thisdatabasename1.'` ORDER BY `recdate` DESC';
							
							$result_bp = mysqli_query($link, $sql_bp);
							while ($row_bp = mysqli_fetch_array($result_bp)) {
								print('<div class="fitness__bp-value" style="width: '.$row_bp['mybelly'].'px">');
								print($row_bp['mybelly']);		
								print('</div>');	
							}			
					?>
				</div>
			</div>
		


		</div>
	</div>	
		
</section>
