<?php

include '../lib/var.php';
include '../lib/msqc.php';

$thisdatabasename = 'si__'.$myname.'_fttracker';

$allftdata = array();

	$sql = 'SELECT * FROM `'.$thisdatabasename.'` WHERE `recdate` = "'. $fulldatetoday .'"';
	$result = mysqli_query($link, $sql);

	$i = 0;

	while ($row = mysqli_fetch_array($result)) {

		$allftdata[$i] = $row['fitid'];

		$i++;
	
	} 
	echo json_encode( $allftdata );
		//print_r ($allftdata);



mysqli_close($link);

?>