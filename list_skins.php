<?php
include('menu.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1" >
    <link rel="stylesheet" href="estilo.css">
    <title>Lista de Skins</title>
</head>
<body>
    <div class="listmsg">
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    </div>
    <?php
        require('connect.php');
        echo "<div class =\"box\">";
        $skins = mysqli_query($con, "select * from `tb_skins` order by `nome`");
        while($skin = mysqli_fetch_array($skins)){
        echo "<div class =\"sc\">";
        echo "<p id= pag>$skin[nome] </p>";
        echo "<p id= pag>$skin[preco] </p>";
        echo "<p id= pagimg><img src=$skin[imagem]></p>";
        if(!isset($_SESSION['login']) || $_SESSION['login'] != true){
            
        }else{
            echo"<p><a href=alterar.php?cod=$skin[codigo]>Alterar</a></p>";
            echo"<p><a href=javascript:confirmar($skin[codigo])>Excluir</a></p>";
        }
        echo "</div>";
        }
        echo "</div>";
        
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