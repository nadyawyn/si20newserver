<?php
//print_r($_POST);

@include '../lib/var.php';
@include '../lib/msqc.php';

$thisdatabasename = 'si__'.$myname.'_adtracker';

$thisid = mysqli_real_escape_string($link, $_POST['thisid']);
$thistime = mysqli_real_escape_string($link, $_POST['thistime']);
$thisprodname = mysqli_real_escape_string($link, $_POST['thisprodname']);
$thisqty = mysqli_real_escape_string($link, $_POST['thisqty']);
$thiscal = mysqli_real_escape_string($link, $_POST['thiscal']);

$sql = 'UPDATE `'.$thisdatabasename.'` SET `rectime` = "'. $thistime .'", `recname` = "'. $thisprodname .'", `recqty` = "'. $thisqty .'", `reccal` = "'. $thiscal .'" WHERE `recid` = "'. $thisid .'"';

$result = mysqli_query($link, $sql);

// Получаем значение калорийности за весь день
$sqltot = 'SELECT reccal FROM `'.$thisdatabasename.'` WHERE recdate = "' . $fulldatetoday . '"';
$resulttot = mysqli_query($link, $sqltot);

while ($rowtot = mysqli_fetch_array($resulttot)) {	
	$caloriesPerDay[] = $rowtot['reccal'];
}
echo json_encode( $caloriesPerDay );


mysqli_close($link);  
?>