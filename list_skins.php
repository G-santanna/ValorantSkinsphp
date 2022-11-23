<?php
include('menu.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Lista de Skins</title>
</head>
<body>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>

    <?php
        require('connect.php');
        $skins = mysqli_query($con, "select * from `tb_skins`");
        echo "<div class = box>";
        while($skin = mysqli_fetch_array($skins)){
        echo "<div><p>$skin[nome] </p>";
        echo "<p>$skin[arma] </p>";
        echo "<p>$skin[bundle] </p>";
        echo "<p>$skin[preco] </p>";
        echo "<div class = skinimg> <p><img src=$skin[imagem]></p> </div>";
        if(!isset($_SESSION['login']) || $_SESSION['login'] != true){
            echo "</div>";
        }else{
            echo"<p><a href=alterar.php?cod=$skin[codigo]>Alterar</a></p>";
            echo"<p><a href=javascript:confirmar($skin[codigo])>Excluir</a></p></div>";
        }
        }
    ?>
    <script>
        function confirmar(codigo){
            resposta = confirm("Deseja excluir o resgistro "+codigo+"?");

            if(resposta == true){
                window.location = "excluir.php?cod="+codigo;
            }
        }
        
    </script>
</body>
</html>