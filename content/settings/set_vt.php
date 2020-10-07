<section class="main_settings-section">
	<h2>Vitamins</h2>
	<div class="set__list set__list_vt">
		<input type="text" name="vitaminins" placeholder="Vitamin name" class="ad__base-input ad__base-input_food" id="addvitinp">
		<button class="button button_em ad__base_button" id="addvitbutton">ADD</button>
	</div>
	<ul class="set__list set__list_vt">	
<?php
//Getting VITAMINS from base
$thisdatabasename = 'si__'.$myname.'_vtnames';

$sql_inpoutput = 'SELECT * FROM `'.$thisdatabasename.'` ORDER BY `vitaminname`';
		$result_inpoutput = mysqli_query($link, $sql_inpoutput);

		while ($row_inpoutput = mysqli_fetch_array($result_inpoutput)) {
			print('<li id="vtli'.$row_inpoutput['recid'].'">');
			print('<input type="text" name="vtname" id="vt'.$row_inpoutput['recid'].'" class="set__list-item vitamin" value="'.$row_inpoutput['vitaminname'].'">');
			print('<button class="button button_red set__button_del vitdel" id="vtdel'.$row_inpoutput['recid'].'">DEL</button>');
			print('</li>');
		}
?>
		
	</ul>
</section>