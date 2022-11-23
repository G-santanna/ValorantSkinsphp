<?php
@session_start();
unset($_SESSION['login']);
$login['nome'] = "";
header("location:home.php");
?>