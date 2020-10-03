<?php
//print_r($_POST);

@include '../lib/var.php';
@include '../lib/msqc.php';

$thisdatabasename = 'si__'.$myname.'_calorbase';
$thisprodname = mysqli_real_escape_string($link, $_POST['thisprodname']);

$sql = 'SELECT * FROM `'.$thisdatabasename.'` WHERE `productname` = "'. $thisprodname .'"';

$result = mysqli_query($link, $sql);

while ($row = mysqli_fetch_array($result)) {

	 echo $row['productcal'];
} 

mysqli_close($link);
?>