<section class="main_settings-section">
	<h2>Fitness</h2>
	<h3 class="ad__title">Personal parameters</h3>
	<?php
	$thisdatabasename = 'si__'.$myname.'_fitnesspar';

		//Getting FITNESSPAR from database
		$sql_ft = 'SELECT * FROM `'.$thisdatabasename.'` ORDER BY recid DESC
		LIMIT 1';
		$result_ft = mysqli_query($link, $sql_ft);
	?>
	<div class="set__list">
		<?php
			while ($row_ft = mysqli_fetch_array($result_ft)) {
				print('<input type="text" name="ftage" id="ftage" class="set__list-item set__list-item_body age" placeholder="Age" ');
				if ($row_ft['myage']){
					print('value="'.$row_ft['myage'].'"');
				} 	
				print('>');
				print('<input type="text" name="ftheight" id="ftheight" class="set__list-item set__list-item_body height" placeholder="Height, cm" ');
				if ($row_ft['myheight']){
					print('value="'.$row_ft['myheight'].'"');
				} 	
				print('>');
				print('<input type="text" name="ftweight" id="ftweight" class="set__list-item set__list-item_body weight" placeholder="Weight, kg" ');
				if ($row_ft['myweight']){
					print('value="'.$row_ft['myweight'].'"');
				} 	
				print('>');
				
			}
		?>	
		<button class="button button_em ad__base_button" id="setppupdate">UPDATE</button>
	</div>
	<h3 class="ad__title">Body dimensions, cm</h3>
	<?php
	$thisdatabasename = 'si__'.$myname.'_fitnesspar';

		//Getting FITNESSPAR from database
		$sql_ft2 = 'SELECT * FROM `'.$thisdatabasename.'` ORDER BY recid DESC
		LIMIT 1';
		$result_ft2 = mysqli_query($link, $sql_ft2);
	?>
	<div class="set__list">
	<?php
			while ($row_ft2 = mysqli_fetch_array($result_ft2)) {
				print('<input type="text" name="ftbreast" id="ftbreast" class="set__list-item set__list-item_body breast" placeholder="Breast" ');
				if ($row_ft2['mybreast'] != '0.0'){
					print('value="'.$row_ft2['mybreast'].'"');
				} 	
				print('>');
				print('<input type="text" name="ftwaist" id="ftwaist" class="set__list-item set__list-item_body waist" placeholder="Waist" ');
				if ($row_ft2['mywaist'] != '0.0'){
					print('value="'.$row_ft2['mywaist'].'"');
				} 	
				print('>');
				print('<input type="text" name="fthips" id="fthips" class="set__list-item set__list-item_body hips" placeholder="Hips" ');
				if ($row_ft2['myhips'] != '0.0'){
					print('value="'.$row_ft2['myhips'].'"');
				} 	
				print('>');
				print('<input type="text" name="ftleg" id="ftleg" class="set__list-item set__list-item_body leg" placeholder="Leg" ');
				if ($row_ft2['myleg'] != '0.0'){
					print('value="'.$row_ft2['myleg'].'"');
				} 	
				print('>');
				print('<input type="text" name="ftbelly" id="ftbelly" class="set__list-item set__list-item_body belly" placeholder="Belly" ');
				if ($row_ft2['mybelly'] != '0.0'){
					print('value="'.$row_ft2['mybelly'].'"');
				} 	
				print('>');
			}
		?>	
		 
		<button class="button button_em ad__base_button" id="setbpupdate">UPDATE</button>
	</div>

</section>