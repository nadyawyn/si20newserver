<section class="main_report-section">
	<h2 id="ad">Alimentation Diary</h2>
	<div class="ad__wrapper">
	<?php
	$thisdatabasename = 'si__'.$myname.'_adtracker';
		//Getting FOOD HISTORY from database

		//$enddate = 31;

		for($i=1; $i<=$enddate; $i++){

			if($i<10){
				$i = '0'.$i;
			}
			print('<div class="ad__day">');
			print('<h3>');
			print($today_mw.' ');
			print($i.'</h3>');

			$sql_adr = 'SELECT * FROM `'.$thisdatabasename.'` WHERE `recdate` = "'.$today_y.'-'.$today_m.'-'.$i.'"';
			//$sql_adr = 'SELECT * FROM `'.$thisdatabasename.'` WHERE `recdate` = "'.$today_y.'-09-'.$i.'"';
			$result_adr = mysqli_query($link, $sql_adr);
			
			$totalcal = 0;
			while ($row_adr = mysqli_fetch_array($result_adr)) {
			
				if($row_adr['recname']){
					print($row_adr['recname'].' - '.$row_adr['reccal']);
					print('<br>');
					$totalcal = $totalcal + $row_adr['reccal'];
				}	
			}
			print('<div class="totalcal">Total: '.$totalcal.' kcal</div>');
			print('</div>');
		}
	?>		
	</div>
</section>