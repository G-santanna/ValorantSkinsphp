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

    $nome = "{$arma} {$bundle}";

    if(mysqli_query($con, "UPDATE `tb_skins` SET
                                  `nome` = '$nome',  
                                  `arma` = '$arma',
                                  `bundle` = '$bundle',
                                  `preco` = '$preco',
                                  `imagem` = '$endereco'
                                  WHERE `tb_skins`.`codigo` = '$codigo';")){
                                    $msg = "Alterado com sucesso";
                                  }else{
                                    $msg = "Erro na alteração";
                                  }

    $_SESSION['msg'] = $msg;                              
    header("location:list_skins.php");                           
?>