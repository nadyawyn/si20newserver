<?php

//print_r($_POST);

include '../lib/var.php';
include '../lib/msqc.php';

$thisdatabasename = 'si__'.$myname.'_adtracker';

// Получаем значение калорийности за весь день
$sqltot = 'SELECT reccal FROM `'.$thisdatabasename.'` WHERE `recdate` = "' . $fulldatetoday . '"';
$resulttot = mysqli_query($link, $sqltot);

while ($rowtot = mysqli_fetch_array($resulttot)) {	
	$caloriesPerDay[] = $rowtot['reccal'];
}
echo json_encode( $caloriesPerDay );


mysqli_close($link);

?>