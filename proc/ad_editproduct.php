<?php
//print_r($_POST);

@include '../lib/var.php';
@include '../lib/msqc.php';

$thisdatabasename = 'si__'.$myname.'_calorbase';

$thisid = mysqli_real_escape_string($link, $_POST['thisid']);
$thisprodname = mysqli_real_escape_string($link, $_POST['thisprodname']);
$thiscal = mysqli_real_escape_string($link, $_POST['thiscal']);

$sql = 'UPDATE `'.$thisdatabasename.'` SET `productname` = "'. $thisprodname .'", `productcal` = "'. $thiscal .'" WHERE `recid` = "'. $thisid .'"';

$result = mysqli_query($link, $sql);

mysqli_close($link);
?>