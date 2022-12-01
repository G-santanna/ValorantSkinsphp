<?php
    require('sec.php');
    $codigo = $_GET['cod'];
    require('connect.php');

    if(mysqli_query($con,"DELETE FROM `tb_admin` WHERE `tb_admin`.`codigo` = $codigo")){
        $msg = "<p class = sucesso>Excluido com sucesso!</p>";
    }else{
        $msg = "<p class = erro>Erro ao excluir!</p>";
    }

    @session_start();
    $_SESSION['msg'] = $msg;

    header("location: list_admins.php");
?>