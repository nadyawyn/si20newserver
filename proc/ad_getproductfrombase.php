<?php
include '../lib/var.php';
include '../lib/msqc.php';

$thisdatabasename = 'si__'.$myname.'_calorbase';

$sql = 'SELECT * FROM `'.$thisdatabasename.'`';
$result = mysqli_query($link, $sql);

$q = $_REQUEST["q"];

$hint ="";// lookup all hints from array if $q is different from "" 

while ($row = mysqli_fetch_array($result)) {
	$a[] = $row['productname'];
} 

if($q !==""){
   $q = strtolower($q);
	$len=strlen($q);
	
	foreach($a as $name) { 
		if (stristr($q, substr($name, 0, $len))) { 
			if($hint === ""){
				//$hint = $name;
				$hint ='<div class="gothint">'. $name .'</div>';
			}
			else
			{
				//$hint .=" <br> $name";
				$hint .='<div class="gothint">'. $name .'</div>';
			}
		}
	}
}// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;

mysqli_close($link);
?>