<?php
//print_r($_POST);

@include '../lib/var.php';
@include '../lib/msqc.php';

$thisprodname = mysqli_real_escape_string($link, $_POST['thisprodname']);
$thiscal = mysqli_real_escape_string($link, $_POST['thiscal']);

$thisdatabasename = 'si__'.$myname.'_calorbase';

$sql = 'INSERT INTO `'.$thisdatabasename.'` SET `productname` = "'. $thisprodname .'", `productcal` = "'. $thiscal .'"';

$result = mysqli_query($link, $sql);


$sql = 'SELECT * FROM `'.$thisdatabasename.'` WHERE `productname` = "'. $thisprodname .'"';

$result = mysqli_query($link, $sql);

while ($row = mysqli_fetch_array($result)) {

	$allactdata = array(
		"newid" => $row['recid'],
		"newprodadded" => $row['productname'],
		"newcaladded" => $row['productcal']
	 );

	 echo json_encode( $allactdata );
} 

mysqli_close($link);
?>