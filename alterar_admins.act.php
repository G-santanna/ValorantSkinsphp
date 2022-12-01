<?php
    session_start();                         
    require('connect.php');
    extract($_POST);
    extract($_FILES);

    $busca = mysqli_query($con, "Select * from `tb_admin` where `codigo` = '$codigo'");
    $admin = mysqli_fetch_array($busca);

    $senhaOld = md5($senhaOld);
    $senhaNew = md5($senhaNew);
    
    if($senhaOld==$admin['senha']){
      $senha = $senhaNew;
    }
    
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
                                  `imagem` = '$endereco',
                                  `senha` = '$senha'
                                  WHERE `tb_admin`.`codigo` = '$codigo';")){
                                    $msg = "Alterado com sucesso";
                                  }else{
                                    $msg = "Erro na alteração";
                                  }

    $_SESSION['msg'] = $msg;                              
    header("location:list_admins.php");                           
?>