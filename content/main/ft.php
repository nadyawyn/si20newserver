<section class="main__section main__section_ft">
	<div class="container container_padh">
		<h2 class="main__title">Fitness today</h2>
		
			<ul class="fitness__list">

			<?php
				$thisdatabasename = 'si__'.$myname.'_ftnames';
	
				$sql_ft = 'SELECT * FROM `'.$thisdatabasename.'`';
				$result_ft = mysqli_query($link, $sql_ft);

				while($row_ft = mysqli_fetch_array($result_ft)){
					print('<li class="fitness__list-item ft'.$row_ft['recid'].'" title="'.$row_ft['fitname'].'" style="background-image:url(icons/fitness/'.$row_ft['recid'].'.png)"></li>');
				}

			?>
			
			</ul>
			
	</div>
</section>