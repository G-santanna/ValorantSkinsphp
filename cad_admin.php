<?php
include('menu.php');
require('sec.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de administradores</title>
</head>
<body>
    <fieldset id="quadro_adm">
    <legend>Cadastro de administradores</legend>

    <form class="formcad" action="cad_admin.act.php" method="post" enctype="multipart/form-data">
    <p>Nome: <input type="text" name="nome"></p>
    <p>Email: <input type="text" name="email"></p>
    <p>Senha: <input type="password" name="senha"></p>
    <p>Foto: <input type="file" name="imagem"></p>
    <p><input type="submit" id="botao" value="Salvar"></p>
    

    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    </form>
    </fieldset>

</body>
</html>