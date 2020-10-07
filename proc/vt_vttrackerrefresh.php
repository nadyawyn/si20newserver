<?php

include '../lib/var.php';
include '../lib/msqc.php';

$thisdatabasename = 'si__'.$myname.'_vttracker';
//$thisdatabasename2 = 'si__'.$myname.'_vtnames';

// Удаляем строки за сегодня

$sql = 'DELETE FROM `'.$thisdatabasename.'` WHERE `recdate` = "'. $fulldatetoday .'"';
$result = mysqli_query($link, $sql);

//Getting NUMBER of VITAMINS from database
/* $sql_vt = 'SELECT * FROM `'.$thisdatabasename2.'`';
$result_vt = mysqli_query($link, $sql_vt);

$row_cnt = $result_vt->num_rows;
 */


mysqli_close($link);

?>