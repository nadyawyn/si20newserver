<?php

include '../lib/var.php';
include '../lib/msqc.php';

$thisdatabasename = 'si__'.$myname.'_adwtracker';

// Добавляем измененный тег в соответствующую строку
$sql = 'UPDATE `'.$thisdatabasename.'` SET `waterres` = "' . $_POST['thisval'] . '" WHERE `recid` = "' . $_POST['thisid'] . '"';
$result = mysqli_query($link, $sql);


mysqli_close($link);

?>