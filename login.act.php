<?php
    extract($_POST);
    $senha = md5($senha);

    require('connect.php');
    @session_start();
    $busca = mysqli_query($con, "Select * from `tb_admin` where `email` = '$email'");

    if($busca->num_rows == 1){
        $login = mysqli_fetch_array($busca);
        if($senha === $login['senha']){
            $_SESSION['login'] = true;
            $_SESSION['nome'] = $login['nome'];
            $target = "location:list_skins.php";
        }else{
            $target = "location:login.php";
            $msg = "Email ou senha inválidos";
        }
    }else{
        $target = "location:login.php";
        $msg = "Email ou senha inválidos";
    }

    $_SESSION['msg'] = $msg;
    header($target);
?>