<?php
	$link = mysqli_connect($address, $username, $pass, $dbname);

	if ($link == false){
		$mes = "Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error();
	}
	else {
		$mes = "Соединение установлено успешно";
	}
	mysqli_set_charset($link, "utf8");

/* $sql = 'INSERT INTO si__actdata SET date_y = "2020", date_m = "8", date_d = "10", time_start = "1599054170362", time_finish = "1599059170362", act_tag = "relax", act_color = "e1bdff", act_comment = ""';
$result = mysqli_query($link, $sql);

if ($result == false) {
    print("Произошла ошибка при выполнении запроса");
}
else {
	print("Line added");
} */ 
?>