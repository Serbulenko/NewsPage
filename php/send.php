<?php 
	include("bd.php");
	
	error_reporting();

	$mes = $_POST['mes'];
	$send_date = date('d.m.Y');
	$time = date('H:i:s');


	mysql_query("INSERT INTO message (`report`,`send_date`,`time`) VALUES ('$mes','$send_date','$time')");

?>