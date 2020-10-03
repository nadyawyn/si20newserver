<?php
$address = 'localhost';
$username = 'siuser';
$pass = 'nnMwgdKB44mZ0R7p';
$dbname = 'si20';

$myname = 'me';
//$myname = 'mama';

$today_y = date("Y");
$today_m = date("m");
$today_d = date("d");

$fulldatetoday = $today_y . '-' . $today_m . '-' . $today_d;
//$fulldatetoday = "2020-08-15";

//$currentversion = "1.3.1";

switch ($today_m) {
	case "01":
		$today_mw = "January";
		$enddate = "31";
		break;
	case "02":
		$today_mw = "February";
		$enddate = "28";
		break;
	case "03":
		$today_mw = "March";
		$enddate = "31";
		break;	
	case "04":
		$today_mw = "April";
		$enddate = "30";
		break;
	case "05":
		$today_mw = "May";
		$enddate = "31";
		break;
	case "06":
		$today_mw = "June";
		$enddate = "30";
		break;	
	case "07":
		$today_mw = "July";
		$enddate = "31";
		break;
	case "08":
		$today_mw = "August";
		$enddate = "31";
		break;
	case "09":
		$today_mw = "September";
		$enddate = "30";
		break;
	case "10":
		$today_mw = "October";
		$enddate = "31";
		break;
	case "11":
		$today_mw = "November";
		$enddate = "30";
		break;
	case "12":
		$today_mw = "December";
		$enddate = "31";
		break;
}



?>