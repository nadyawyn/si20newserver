<section class="main_report-section">
	<h2 id="vt">Vitamins</h2>
	
	<div class="vitamins__wrapper">
		<div class="vitamins__dates">
			<?php
				for($i=1; $i<=$enddate; $i++){
					print ('<div class="vitamins__dates-item">');
					print ($i);
					print ('</div>');
				}
			?>
		</div>

		<div class="vitamins__wrapper_output">
			<ul class="vitamins__names">
				<li>vit 1</li>
				<li>vit 2</li>
				<li>vit 3</li>
			</ul>
			<ul class="vitamins__results">
				<li class="complete"></li>
				<li></li>
				<li></li>		
			</ul>
			<ul class="vitamins__results">
				<li></li>
				<li class="complete"></li>
				<li class="complete"></li>		
			</ul>
			<ul class="vitamins__results">
				<li class="complete"></li>
				<li></li>
				<li class="complete"></li>		
			</ul>
		</div>
	</div>
	
	<?php
		for($i=1; $i<=$enddate; $i++){
			//print $i;
		}

	
		/* $thisdatabasename = 'si__'.$myname.'_vttracker';
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
		} */
	?>
</section>