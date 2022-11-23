<?php
require('sec.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $codigo = $_GET['cod'];
        require('connect.php');
        $buscar = mysqli_query($con, "Select * from `tb_skins` where `codigo` = '$codigo'");
        $skin = mysqli_fetch_array($buscar);
    ?>

    <fieldset id="quadro_cad">
    <legend>Alteração de itens</legend>
    
    <form class="formcad" action="alterar.act.php" method="post" enctype="multipart/form-data">
    <p><input type="hidden" name="codigo" value="<?php echo $skin['codigo']?>"></p>
    <p><input type="hidden" name="foto_anterior" value="<?php echo $skin['imagem']?>"></p>
    <p>Arma: <input type="text" name="arma" value="<?php echo $skin['arma']?>"></p>
    <p>Bundle: <input type="text" name="bundle" value="<?php echo $skin['bundle']?>"></p>
    <p>Valorant Points: <input type="number" name="preco" value="<?php echo $skin['preco']?>"></p>
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