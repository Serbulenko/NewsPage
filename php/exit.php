<?php
session_start();

unset($_SESSION['login']);

header("location: http://localhost/test_Renovation/index.php");
?>