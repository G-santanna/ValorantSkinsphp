<?php
    session_start();                         
    require('connect.php');
    extract($_POST);
    extract($_FILES);
    
    if($foto_anterior == ""){
        $endereco = "imgs/".md5(time()).".jpg";
    }else{
        $endereco = $foto_anterior; 
    }
    if($imagem['name'] != ""){
        move_uploaded_file($imagem['tmp_name'],$endereco);
    }
    
    if(mysqli_query($con, "UPDATE `tb_admin` SET
                                  `nome` = '$nome',  
                                  `email` = '$email',
                                  `imagem` = '$endereco'
                                  WHERE `tb_admin`.`codigo` = '$codigo';")){
                                    $msg = "Alterado com sucesso";
                                  }else{
                                    $msg = "Erro na alteração";
                                  }

    $_SESSION['msg'] = $msg;                              
    header("location:list_admins.php");                           
?>