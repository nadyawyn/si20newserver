<?php
//print_r($_POST);

@include '../lib/var.php';
@include '../lib/msqc.php';

$thisdatabasename = 'si__'.$myname.'_fitnesspar';
$thisprodname = mysqli_real_escape_string($link, $_POST['thisprodname']);

$sql = 'SELECT * FROM `'.$thisdatabasename.'` ORDER BY recid DESC LIMIT 1';

$result = mysqli_query($link, $sql);

while ($row = mysqli_fetch_array($result)) {

	$allpersonalpar = array(
		"age" => $row['myage'],
		"height" => $row['myheight'],
		"weight" => $row['myweight']
	 );

	 echo json_encode( $allpersonalpar );
} 

mysqli_close($link);
?>