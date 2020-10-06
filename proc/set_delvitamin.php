<?php

@include '../lib/var.php';
@include '../lib/msqc.php';

$thisdatabasename = 'si__'.$myname.'_vtnames';

$thisid = mysqli_real_escape_string($link, $_POST['thisid']); 

// Получаем VITAMINID витамина, который собираемся удалить
$sql00 = 'SELECT `vitaminid` FROM `'.$thisdatabasename.'` WHERE `recid` = "'. $thisid .'"';
$result00 = mysqli_query($link, $sql00);
$row00 = mysqli_fetch_array($result00);

$thisvitid = $row00['vitaminid'];

// Удаляем витамин с указанным выше RECID 

$sql = 'DELETE FROM `'.$thisdatabasename.'` WHERE `recid` = "'. $thisid .'"';
$result = mysqli_query($link, $sql);

//Считаем, сколько сейчас записей в базе

$sql1 = 'SELECT * FROM `'.$thisdatabasename.'`';
$result1 = mysqli_query($link, $sql1);
 
$row_cnt = $result1->num_rows;

$newnumber = $row_cnt + 1;

// Сдвигаем номера всех прочих записей (если они есть) на ЕДИНИЦУ

for ($i = $thisvitid + 1; $i <= $newnumber; $i++){
	$j = $i - 1;

	$sql = 'UPDATE `'.$thisdatabasename.'` SET `vitaminid` = "'. $j .'" WHERE `vitaminid` = "'. $i .'"';

	$result = mysqli_query($link, $sql);

}

mysqli_close($link); 

?>