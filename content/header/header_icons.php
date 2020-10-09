<div class="header__icons">

<?php
$thisdatabasename = 'si__'.$myname.'_set-general';
//Getting RECORD from database
$sql_modr = 'SELECT * FROM `'.$thisdatabasename.'`';
$result_modr = mysqli_query($link, $sql_modr);
		
while ($row_modr = mysqli_fetch_array($result_modr)) {
	if (($row_modr['modname'] == 'rec') && ($row_modr['modon'] == '1')) {
		print('<div class="header__icon header__icon_rec"><a href="record.php"></a></div>');
	}
}
?>

			
			<div class="header__icon header__icon_report">
				<a href="report.php"></a>
			</div>
			<div class="header__icon header__icon_settings">
				<a href="settings.php"></a>
			</div>
		</div>
		</div>
</div>