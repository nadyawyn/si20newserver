<?php

include '../lib/var.php';
include '../lib/msqc.php';

$thisdatabasename = 'si__'.$myname.'_set-general';

// Добавляем измененный тег в соответствующую строку
$sql = 'UPDATE `' .$thisdatabasename. '` SET `modon` = "' . $_POST['thisval'] . '" WHERE `modid` = "' . $_POST['thisid'] . '"';

$result = mysqli_query($link, $sql);


mysqli_close($link);

?>