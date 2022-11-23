<?php
    extract($_POST);
    extract($_FILES);
    require('connect.php');

    $destino = "imgs/".md5(time()).".jpg";
    move_uploaded_file($imagem['tmp_name'],$destino);

    $nome = "{$arma} {$bundle}";

    if(mysqli_query($con,"INSERT INTO `tb_skins` (`nome`, `arma`, `bundle`, `preco`, `imagem`) VALUES ('$nome', '$arma', '$bundle', '$preco', '$destino')")){
        $msg = "<p class = sucesso>Skins cadastradas com sucesso</p>";
    }else{
        $msg = "<p class = erro>Erro no cadastro</p>";
    }

    session_start();
        $_SESSION['msg'] = $msg;

        header("location: cad_skins.php")
?>