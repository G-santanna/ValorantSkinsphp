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
    <title>Cadastro de Itens</title>
</head>
<body>
    
    <fieldset id="quadro_cad">
    <legend>Cadastro de itens</legend>

    <form class="formcad" action="cad_skins.act.php" method="post" enctype="multipart/form-data">
    <p>Arma: <input type="text" name="arma"></p>
    <p>Bundle: <input type="text" name="bundle"></p>
    <p>Valorant Points: <input type="number" name="preco"></p>
    <p>Imagem: <input type="file" name="imagem"></p>
    <p><input type="submit" id="botao" value="Salvar"></p>
    </form>

    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>

    </fieldset>

</body>
</html>