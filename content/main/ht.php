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
				
							$sql_ht = 'SELECT * FROM `'.$thisdatabasename.'`';
							$result_ht = mysqli_query($link, $sql_ht);

							while($row_ht = mysqli_fetch_array($result_ht)){
								print('<div class="habit__names-item">'.$row_ht['habit_name'].'</div>');
							}

						?>
					</div>
					<div class="habit__val">
						<ul class="habit__val-ul" id="val-ul-1">
							<li class="habit__val-li">1</li>
							<li class="habit__val-li"></li>
							<li class="habit__val-li"></li>
						</ul>
						<ul class="habit__val-ul" id="val-ul-2">
							<li class="habit__val-li complete">2</li>
							<li class="habit__val-li"></li>
							<li class="habit__val-li"></li>
						</ul>
						<ul class="habit__val-ul" id="val-ul-3">
							<li class="habit__val-li">3</li>
							<li class="habit__val-li complete"></li>
							<li class="habit__val-li"></li>
						</ul>
						<ul class="habit__val-ul" id="val-ul-4">
							<li class="habit__val-li">4</li>
							<li class="habit__val-li"></li>
							<li class="habit__val-li"></li>
						</ul>
						<ul class="habit__val-ul" id="val-ul-1">
							<li class="habit__val-li">5</li>
							<li class="habit__val-li"></li>
							<li class="habit__val-li"></li>
						</ul>
						<ul class="habit__val-ul" id="val-ul-2">
							<li class="habit__val-li">6</li>
							<li class="habit__val-li"></li>
							<li class="habit__val-li"></li>
						</ul>
						<ul class="habit__val-ul" id="val-ul-3">
							<li class="habit__val-li">7</li>
							<li class="habit__val-li"></li>
							<li class="habit__val-li"></li>
						</ul>
						<ul class="habit__val-ul" id="val-ul-4">
							<li class="habit__val-li">8</li>
							<li class="habit__val-li"></li>
							<li class="habit__val-li"></li>
							<li class="habit__val-li"></li>
						</ul>
						<ul class="habit__val-ul" id="val-ul-4">
							<li class="habit__val-li">9</li>
							<li class="habit__val-li"></li>
							<li class="habit__val-li"></li>
							<li class="habit__val-li"></li>
							<li class="habit__val-li"></li>
						</ul>
						<ul class="habit__val-ul" id="val-ul-4">
							<li class="habit__val-li">10</li>
							<li class="habit__val-li"></li>
							<li class="habit__val-li"></li>
							<li class="habit__val-li"></li>
							<li class="habit__val-li"></li>
						</ul>


					</div>
				</div>
			</div>
		</section>