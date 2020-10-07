<?php

@include '../lib/var.php';
@include '../lib/msqc.php';


$thisvitname = mysqli_real_escape_string($link, $_POST['vitaminname']);
 
$thisdatabasename = 'si__'.$myname.'_vtnames';

//Проверяем, есть ли ВИТАМИН с таким именем в базе
$sql0 = 'SELECT * FROM `'.$thisdatabasename.'` WHERE `vitaminname` = "'. $thisvitname .'"';
$result0 = mysqli_query($link, $sql0);
$row0 = mysqli_fetch_array($result0);

if(!$row0){

	//Считаем, сколько сейчас записей в базе

	$sql1 = 'SELECT * FROM `'.$thisdatabasename.'`';
	$result1 = mysqli_query($link, $sql1);
	 
	$row_cnt = $result1->num_rows;

	$newnumber = $row_cnt + 1;
	
	$sql = 'INSERT INTO `'.$thisdatabasename.'` SET `vitaminname` = "'. $thisvitname .'", `vitaminid` = "'. $newnumber .'"';

	$result = mysqli_query($link, $sql);


	$sql = 'SELECT * FROM `'.$thisdatabasename.'` WHERE `vitaminname` = "'. $thisvitname .'"';

	$result = mysqli_query($link, $sql);

	while ($row = mysqli_fetch_array($result)) {

		$allactdata = array(
			"newid" => $row['recid'],
			"newvitadded" => $row['vitaminname']
		);

		echo json_encode( $allactdata );
	} 

}
else {
	$allactdata = array(
		"newid" => 0,
		"newvitadded" => 0
	);
	echo json_encode( $allactdata );
}



mysqli_close($link);
?>