<?php

@include '../lib/var.php';
@include '../lib/msqc.php';

$thisdatabasename = 'si__'.$myname.'_vtnames';

$thisid = mysqli_real_escape_string($link, $_POST['thisid']);
$thisvitname = mysqli_real_escape_string($link, $_POST['thisvitname']);

$sql = 'UPDATE `'.$thisdatabasename.'` SET `vitaminname` = "'. $thisvitname .'" WHERE `recid` = "'. $thisid .'"';

$result = mysqli_query($link, $sql);

mysqli_close($link); 
?>