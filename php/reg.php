<?php 
	include('bd.php');

	$name = $_POST["login"];
	$password = $_POST["password"];
        
  	mysql_query("INSERT INTO user (name,password) VALUES ('$name','$password')");
  	header("Location: http://localhost/test_Renovation/index.php");
?>	