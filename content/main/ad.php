<section class="main__section main__section_ad">
			<div class="container container_padh">
				<h2 class="main__title">AlimentationDiary</h2>
				<div class="wrapper">
					<div class="ad__data">
						<!-- Printing out WATER inputes -->
						<?php
							@include "ad/ad_water.php";
						?>
						<!-- Printing out ALIM inputes -->
						<?php
							@include "ad/ad_inputs.php";
						?>
						
					</div>
				<?php
					@include "ad/ad_caloriemeter.php";
				?>
				
				</div>

				<?php
					@include "ad/ad_database.php";
				?>


			</div>
		</div>
</section>