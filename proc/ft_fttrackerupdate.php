<?php

include '../lib/var.php';
include '../lib/msqc.php';

$thisid = mysqli_real_escape_string($link, $_POST['thisid']);
$thisval = mysqli_real_escape_string($link, $_POST['thisval']);

$thisdatabasename = 'si__'.$myname.'_fttracker';

if ( $thisval ){
	$sql = 'INSERT INTO `'.$thisdatabasename.'` SET `recdate` = "'. $fulldatetoday .'", `fitid` = "'. $thisid .'"';
	$result = mysqli_query($link, $sql);
}
else {
	$sql = 'DELETE FROM `'.$thisdatabasename.'` WHERE `recdate` = "'. $fulldatetoday .'" AND `fitid` = "'. $thisid .'"';
	$result = mysqli_query($link, $sql);
}




mysqli_close($link);

?>