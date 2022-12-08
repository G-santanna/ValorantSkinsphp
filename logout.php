<?php
@session_start();
unset($_SESSION['login']);
unset($_SESSION['nome']);
unset($_SESSION['codigo']);
$login['nome'] = "";
header("location:login.php");
?>