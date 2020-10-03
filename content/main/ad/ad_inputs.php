<?php
$thisdatabasename = 'si__'.$myname.'_adtracker';

	//Checking if there is entry for the CURRENT DATE 
	$sql_inpcheck = 'SELECT * FROM `'.$thisdatabasename.'` WHERE `recdate`="'.$fulldatetoday.'"';
	$result_inpcheck = mysqli_query($link, $sql_inpcheck);

	$row_inpcheck = mysqli_fetch_array($result_inpcheck); 
	
	//IF there are NO entries for today - INSERT THEM
	if(!$row_inpcheck) {

		for($i = 0; $i < 15; $i++) {
			$sql_inpform = 'INSERT INTO `'.$thisdatabasename.'` SET `recdate`="'.$fulldatetoday.'", recname=""';
			$result_inpform = mysqli_query($link, $sql_inpform);
		}

		//Getting ENTRIES from database
		$sql_inpoutput = 'SELECT * FROM `'.$thisdatabasename.'` WHERE `recdate`= "'.$fulldatetoday.'"';
		$result_inpoutput = mysqli_query($link, $sql_inpoutput);

		
		while ($row_inpoutput = mysqli_fetch_array($result_inpoutput)) {
	
		print('<div class="ad__list">');
		print('<input type="time" name="mealtime'.$row_inpoutput['recid'].'" placeholder="00:00" id="time'.$row_inpoutput['recid'].'" class="ad__list-item time" ');

		if($row_inpoutput['rectime'] != "00:00") {
			print('value="'.$row_inpoutput['rectime'].'"');
		}
		print('>');

		print('<input type="text" name="mealqty'.$row_inpoutput['recid'].'" placeholder="grams" id="qty'.$row_inpoutput['recid'].'" class="ad__list-item grams" ');

		if($row_inpoutput['recqty']) {
			print('value="'.$row_inpoutput['recqty'].'"');
		}
		print('>');

		print('<input type="text" name="mealcontent'.$row_inpoutput['recid'].'" placeholder="..." id="meal'.$row_inpoutput['recid'].'" class="ad__list-item ad__list-item_m meal" ');
		if($row_inpoutput['recname']) {

		print ('value="'.$row_inpoutput['recname'].'"');
		
		}
		print('>');

		print('<input type="text" name="mealcal'.$row_inpoutput['recid'].'" placeholder="kcal" id="cal'.$row_inpoutput['recid'].'" class="ad__list-item calories" ');
		
		if($row_inpoutput['reccal']) {
			print('value="'.$row_inpoutput['reccal'].'"');
		}
		print('>');
		
		print('<div class="ad__list-item hint" id="hint'.$row_inpoutput['recid'].'">');
		print('</div></div>');
		}   

	}
	else {
	
		//Getting ENTRIES from database
		$sql_inpoutput = 'SELECT * FROM `'.$thisdatabasename.'` WHERE `recdate` = "'.$fulldatetoday.'"';
		$result_inpoutput = mysqli_query($link, $sql_inpoutput);

		
		while ($row_inpoutput = mysqli_fetch_array($result_inpoutput)) {
	
		print('<div class="ad__list">');
		print('<input type="time" name="mealtime'.$row_inpoutput['recid'].'" id="time'.$row_inpoutput['recid'].'" class="ad__list-item time" ');
		
		if($row_inpoutput['rectime'] != "00:00") {
			print('value="'.$row_inpoutput['rectime'].'"');
		}
		print('>');

		print('<input type="text" name="mealqty'.$row_inpoutput['recid'].'" placeholder="grams" id="qty'.$row_inpoutput['recid'].'" class="ad__list-item grams" ');

		if($row_inpoutput['recqty']) {
			print('value="'.$row_inpoutput['recqty'].'"');
			
		}
		print('>');

		print('<input type="text" name="mealcontent'.$row_inpoutput['recid'].'" id="meal'.$row_inpoutput['recid'].'" class="ad__list-item ad__list-item_m meal" value="'.$row_inpoutput['recname'].'">');

		print('<input type="text" name="mealcal'.$row_inpoutput['recid'].'" placeholder="kcal" id="cal'.$row_inpoutput['recid'].'" class="ad__list-item calories" ');
		
		if($row_inpoutput['reccal']) {
			print('value="'.$row_inpoutput['reccal'].'"');
		}
		print('>');
		
		print('<div class="ad__list-item hint" id="hint'.$row_inpoutput['recid'].'">');
		print('</div></div>');
		}   
	}
					
?>
	

