<section class="main__section main__section_vt">
			<div class="container container_padh">
				<h2 class="main__title">Vitamins</h2>

					<ul class="vitamins__list">
						<?php 
							$thisdatabasename = 'si__'.$myname.'_vtnames';
							$thisdatabasename2 = 'si__'.$myname.'_vttracker';

							//Getting NUMBER of VITAMINS from database
							$sql_vt = 'SELECT * FROM `'.$thisdatabasename.'` ORDER BY recid';
							$result_vt = mysqli_query($link, $sql_vt);
					
							$row_cnt = $result_vt->num_rows;
							//print($row_cnt);

							//Getting VITAMIN entries from database
							$sql_vt2 = 'SELECT * FROM `'.$thisdatabasename2.'` ORDER BY recid';
							$result_vt2 = mysqli_query($link, $sql_vt2);

							$row_vt2 = mysqli_fetch_array($result_vt2);

							if (!$row_vt2) {
							//Если в базе нет записей витаминов за сегодня, добавляем их!
								for($i = 1; $i <= $row_cnt; $i++){
									$sql_vt3 = 'INSERT INTO `'.$thisdatabasename2.'` SET recdate = "'.$fulldatetoday.'", vitaminid = "'.$i.'"';
									$result_vt3 = mysqli_query($link, $sql_vt3);
								}
		
								$sql_vt4 = 'SELECT * FROM `'.$thisdatabasename2.'`, `'.$thisdatabasename.'` WHERE '.$thisdatabasename2.'.vitaminid = '.$thisdatabasename.'.vitaminid ORDER BY `vitaminname`';
								$result_vt4 = mysqli_query($link, $sql_vt4);
								while ($row_vt4 = mysqli_fetch_array($result_vt4)) {
									print('<li class="vitamins__item" id="vt'.$row_vt4['recid'].'">'.$row_vt4['vitaminname'].'</li>');			
								}
							//Если есть, просто выводим	
							} else {
								$sql_vt4 = 'SELECT * FROM `'.$thisdatabasename2.'`, `'.$thisdatabasename.'` WHERE '.$thisdatabasename2.'.vitaminid = '.$thisdatabasename.'.vitaminid ORDER BY `vitaminname`';
								//$sql_vt4 = 'SELECT * FROM `'.$thisdatabasename2.'` ORDER BY recid';
								$result_vt4 = mysqli_query($link, $sql_vt4);
								while ($row_vt4 = mysqli_fetch_array($result_vt4)) {
									print('<li class="vitamins__item" id="vt'.$row_vt4['recid'].'">'.$row_vt4['vitaminname'].'</li>');			
								}

							}


							/* while ($row_vt = mysqli_fetch_array($result_vt)) {
							print('<li class="vitamins__item" id="vt'.$row_vt['recid'].'">'.$row_vt['vitaminid'].'<span>'.$row_vt['vitaminnote'].'</span> </li>');	
								
							} */
						?>
					</ul>
			</div>

		</section>