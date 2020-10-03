<?php
include '../lib/var.php';
include '../lib/msqc.php';

$thisdatabasename = 'si__'.$myname.'_fitnesspar';
// Проверяем, есть ли уже измерения за эту дату
$sql = 'SELECT * FROM `' .$thisdatabasename. '` WHERE `recdate` = "' . $fulldatetoday . '"';
$result = mysqli_query($link, $sql);
$row_res = mysqli_fetch_array($result);

if ($row_res) {
	echo "There is such entry";

	// ОБНОВЛЯЕМ информацию в строке с сегодняшней датой
	$sql = 'UPDATE `' .$thisdatabasename. '` SET `myage` = "' . $_POST['age'] . '", `myheight` = "' . $_POST['height'] . '", `myweight` = "' . $_POST['weight'] . '", `mybreast` = "' . $_POST['breast'] . '", `mywaist` = "' . $_POST['waist'] . '", `myhips` = "' . $_POST['hips'] . '", `myleg` = "' . $_POST['leg'] . '", `mybelly` = "' . $_POST['belly'] . '" WHERE `recdate` = "' . $fulldatetoday . '"';

	$result = mysqli_query($link, $sql);

}
else {
	echo "There is NO such entry";

// Добавляем новую строку с СЕГОДНЯШНЕЙ ДАТОЙ
$sql = 'INSERT INTO `' .$thisdatabasename. '` SET `recdate` = "' . $fulldatetoday . '",`myage` = "' . $_POST['age'] . '", `myheight` = "' . $_POST['height'] . '", `myweight` = "' . $_POST['weight'] . '", `mybreast` = "' . $_POST['breast'] . '", `mywaist` = "' . $_POST['waist'] . '", `myhips` = "' . $_POST['hips'] . '", `myleg` = "' . $_POST['leg'] . '", `mybelly` = "' . $_POST['belly'] . '"';

$result = mysqli_query($link, $sql);
}

mysqli_close($link);

?>