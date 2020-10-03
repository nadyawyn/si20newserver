<div class="ad__water">
<?php
$thisdatabasename = 'si__'.$myname.'_adwtracker';

//Checking if there is entry for the CURRENT DATE 
$sql_wcheck = 'SELECT * FROM `'.$thisdatabasename.'` WHERE `recdate`="'.$fulldatetoday.'"';
$result_wcheck = mysqli_query($link, $sql_wcheck);

$row_wcheck = mysqli_fetch_array($result_wcheck); 
if(!$row_wcheck) {

	for($i = 0; $i < 10; $i++) {
		$sql_wform = 'INSERT INTO `'.$thisdatabasename.'` SET `recdate`="'.$fulldatetoday.'"';
		$result_wform = mysqli_query($link, $sql_wform);
	}

	//Getting WATER ENTRIES from database
	$sql_woutput = 'SELECT * FROM `'.$thisdatabasename.'` WHERE `recdate` = "'.$fulldatetoday.'"';
	$result_woutput = mysqli_query($link, $sql_woutput);

	while ($row_woutput = mysqli_fetch_array($result_woutput)) {
		print('<div id="cup'.$row_woutput['recid'].'" class="ad__water-item');

		if($row_woutput['waterres']) {
			print(' complete');
		}

		print('"></div>');
	}
}
else {
	//Getting WATER ENTRIES from database
	$sql_woutput = 'SELECT * FROM `'.$thisdatabasename.'` WHERE `recdate` = "'.$fulldatetoday.'"';
	$result_woutput = mysqli_query($link, $sql_woutput);

	while ($row_woutput = mysqli_fetch_array($result_woutput)) {
		print('<div id="cup'.$row_woutput['recid'].'" class="ad__water-item');

		if($row_woutput['waterres']) {
			print(' complete');
		}

		print('"></div>');
	}
}
?>


</div>