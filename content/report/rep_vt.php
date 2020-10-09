<section class="main_report-section">
	<h2 id="vt">Vitamins</h2>
	
	<div class="vitamins__wrapper">
		<div class="vitamins__dates">
			<?php
			//Выводим даты месяца
				for($i=1; $i<=$enddate; $i++){
					print ('<div class="vitamins__dates-item">');
					print ($i);
					print ('</div>');
				} 
			?>
		</div> 

		<div class="vitamins__wrapper_output">
			<ul class="vitamins__names">
				<?php
				//Выводим названия витаминов
				$thisdatabasename1 = 'si__'.$myname.'_vtnames';
				$thisdatabasename2 = 'si__'.$myname.'_vttracker';

				$sql_vt4 = 'SELECT * FROM `'.$thisdatabasename2.'`, `'.$thisdatabasename1.'` WHERE '.$thisdatabasename2.'.vitaminid = '.$thisdatabasename1.'.vitaminid AND '.$thisdatabasename2.'.recdate = "'.$fulldatetoday.'" ORDER BY '.$thisdatabasename2.'.vitaminid';
				
				$result_vt4 = mysqli_query($link, $sql_vt4);
									
				while ($row_vt4 = mysqli_fetch_array($result_vt4)) {
					print('<li id="vtr'.$row_vt4['recvid'].'">'.$row_vt4['vitaminname'].'</li>');			
				}
				?>
				
			</ul>
				<?php 
				//Выводим списки результатов за каждую дату месяца
				$thisdatabasename3 = 'si__'.$myname.'_vttracker';
				
				for($j=1; $j<=$enddate; $j++){

					if ($j < 10) {
						$j = "0".$j;
					}

					//$sql_vtu = 'SELECT * FROM `'.$thisdatabasename.'` WHERE `recdate` = "2020-10-'.$j.'" ORDER BY `vitaminid`';
					$sql_vtu = 'SELECT * FROM `'.$thisdatabasename3.'` WHERE `recdate` = "2020-10-'.$j.'" ORDER BY `vitaminid`';

					$result_vtu = mysqli_query($link, $sql_vtu);
					print('<ul class="vitamins__results" id="vtru'.$j.'">');
					while ($row_vtu = mysqli_fetch_array($result_vtu)) {
						
						print('<li');
						if ($row_vtu['vitaminres']){
							print(' class="complete"');
						}
						print('></li>');
					}
					print('</ul>');
				}


				?>
			<!-- <ul class="vitamins__results">
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
			</ul> -->
		</div>
	</div>
</section>