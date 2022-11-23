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
        $buscar = mysqli_query($con, "Select * from `tb_admin` where `codigo` = '$codigo'");
        $admin = mysqli_fetch_array($buscar);
    ?>

    <fieldset id="quadro_cad">
    <legend>Alteração de administradores</legend>
    
    <form class="formcad" action="alterar_admins.act.php" method="post" enctype="multipart/form-data">
    <p><input type="hidden" name="codigo" value="<?php echo $admin['codigo']?>"></p>
    <p><input type="hidden" name="foto_anterior" value="<?php echo $admin['imagem']?>"></p>
    <p>Nome: <input type="text" name="nome" value="<?php echo $admin['nome']?>"></p>
    <p>Email: <input type="text" name="email" value="<?php echo $admin['email']?>"></p>
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