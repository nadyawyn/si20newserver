
<?php

include '../lib/var.php';
include '../lib/msqc.php';

$thisid = mysqli_real_escape_string($link, $_POST['thisid']);
$thisval = mysqli_real_escape_string($link, $_POST['thisval']);

$thisdatabasename = 'si__'.$myname.'_htdata';


$sql = 'UPDATE `'.$thisdatabasename.'` SET `habitres` = "'. $thisval .'" WHERE `recid` = "'. $thisid .'"';
$result = mysqli_query($link, $sql);

mysqli_close($link);

?>