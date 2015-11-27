<?php

if(isset($_POST['login']) && isset($_POST['password']))
{
    include('bd.php'); 

    $login = $_POST['login'];
    $password = $_POST['password'];

    $res = mysql_query("SELECT * FROM user WHERE name = '$login' and password = '$password'");
    $data = mysql_fetch_array($res);

    session_start();
 
    $_SESSION['login'] = $data['name'];
    header("Location: http://localhost/test_Renovation/index.php");
}

?>
