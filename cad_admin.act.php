<?php
    extract($_POST);
    extract($_FILES);
    require('connect.php');

    $destino = "pfp/".md5(time()).".jpg";
    move_uploaded_file($imagem['tmp_name'],$destino);

    $senha = md5($senha);

    if(mysqli_query($con,"INSERT INTO `tb_admin` (`nome`, `email`, `senha` , `imagem`) VALUES ('$nome', '$email', '$senha', '$destino' )")){
        $msg = "Administrador registrado com sucesso";
    }else{
        $msg = "Erro ao registrar novo administrador";
    }

    session_start();
        $_SESSION['msg'] = $msg;
        
    header("location:cad_admin.php");
?>