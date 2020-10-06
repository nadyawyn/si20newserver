<?php

include '../lib/var.php';
include '../lib/msqc.php';

$thisdatabasename = 'si__'.$myname.'_vttracker';

// Добавляем измененный тег в соответствующую строку
$sql = 'UPDATE `'.$thisdatabasename.'` SET `vitaminres` = "' . $_POST['thisval'] . '" WHERE `recvid` = "' . $_POST['thisid'] . '"';
$result = mysqli_query($link, $sql);


mysqli_close($link);

?>