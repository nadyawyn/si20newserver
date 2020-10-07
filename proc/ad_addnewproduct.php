<?php
//print_r($_POST);

@include '../lib/var.php';
@include '../lib/msqc.php';


$thisprodname = mysqli_real_escape_string($link, $_POST['thisprodname']);
$thiscal = mysqli_real_escape_string($link, $_POST['thiscal']);

$thisdatabasename = 'si__'.$myname.'_calorbase';

//Проверяем, есть ли продукт с таким именем в базе

$sql0 = 'SELECT * FROM `'.$thisdatabasename.'` WHERE `productname` = "'. $thisprodname .'"';
$result0 = mysqli_query($link, $sql0);
$row0 = mysqli_fetch_array($result0);

if(!$row0){
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

}
else {
	$allactdata = array(
		"newid" => 0,
		"newprodadded" => 0,
		"newcaladded" => 0
	);
	echo json_encode( $allactdata );
}



mysqli_close($link);
?>