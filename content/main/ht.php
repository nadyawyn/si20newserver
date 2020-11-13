<section class="main__section main__section_ht">
	<div class="container container_padh">
		<h2 class="main__title">HabitTracker</h2>
			<h3 class="habit__title">
				<?php 
					echo $today_mw;
				?>
				</h3>
				<div class="habit__wrapper">
					<div class="habit__names">
						<?php
							$thisdatabasename = 'si__'.$myname.'_htnames';
				
							$sql_ht = 'SELECT * FROM `'.$thisdatabasename.'` ORDER BY `habit_id`';
							$result_ht = mysqli_query($link, $sql_ht);
							$length = mysqli_num_rows($result_ht);

							while($row_ht = mysqli_fetch_array($result_ht)){
								print('<div class="habit__names-item">'.$row_ht['habit_name'].'</div>');
							}

						?>
					</div>
					<div class="habit__val">
					<!-- Смотрим, есть ли запись за текущую дату -->
						<?php
							$thisdatabasename1 = 'si__'.$myname.'_htdata';
				
							$sql_htt = 'SELECT * FROM `'.$thisdatabasename1.'` WHERE `recdate` = "'.$fulldatetoday.'"';
							$result_htt = mysqli_query($link, $sql_htt);

							$row_htt = mysqli_fetch_array($result_htt);

							if(!$row_htt) {
								for($j = 1; $j <= $length; $j++) {
									$sql_emptylines = 'INSERT INTO `'.$thisdatabasename1.'` SET `recdate` = "'. $fulldatetoday .'", habitid = "' . $j . '", habitres = "0"';
									$result_emptylines = mysqli_query($link, $sql_emptylines);
								}
							}
						?>

<!-- Выводим все данные привычек до сегодняшнего дня месяца -->
						<?php
							for($i = 1; $i <= $today_d; $i++) {
								//$sql_hab = 'SELECT * FROM `'.$thisdatabasename1.'` WHERE recdate BETWEEN "'.$today_y.'-'.$today_m.'-01" AND "'.$today_y.'-'.$today_m.'-'.$enddate.'"';

								if ($i < 10) {
									$i = '0'.$i;
								}
								
								//CHECK if there are records for this day!
								$sql_check = 'SELECT * FROM `'.$thisdatabasename1.'` WHERE recdate = "'.$today_y.'-'.$today_m.'-'.$i.'"';
								$result_check = mysqli_query($link, $sql_check);
								$row_check = mysqli_fetch_array($result_check);

								if($row_check) {
									$sql_hab = 'SELECT * FROM `'.$thisdatabasename1.'` WHERE recdate = "'.$today_y.'-'.$today_m.'-'.$i.'"';
									$result_hab = mysqli_query($link, $sql_hab);

										print('<ul class="habit__val-ul" id="val-ul-'.$i.'">');

											while ($row_hab = mysqli_fetch_array($result_hab)) {
												$thisday = substr($row_hab['recdate'], -2);
												print('<li class="habit__val-li ');
												if($row_hab['habitres'] == 1) {
													print('complete');
												}
												print('" id="hab'.$row_hab['recid'].'">');
													if($row_hab['habitid'] == 1){
														print($thisday);
													}
												print('</li>');
											}
										print('</ul>');
								}
							}

							

						?>
			</div>
		</div>
	</div>
</section>
<script src="js/ht_script.js"></script>