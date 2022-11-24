<?php
    @session_start();

    $texto = $_GET['texto'];

    require('connect.php');
        if(!$texto == ""){
            $skins = mysqli_query($con, "Select * from `tb_skins` where `nome` like '%$texto%'");

            echo "<div class = \"box\">";
            while($skin = mysqli_fetch_array($skins)){
                echo "<div><p> Nome: $skin[nome] </p>";
                echo "<p>Arma: $skin[arma] </p>";
                echo "<p>Bundle: $skin[bundle] </p>";
                echo "<p>Valorant Points: $skin[preco] </p>";
                echo "<p><img src=$skin[imagem]></p>";
                echo"<p><a href=alterar.php?cod=$skin[codigo]>Alterar</a></p>";
                echo"<p><a href=javascript:confirmar($skin[codigo])>Excluir</a></p></div>";
            }
            echo"</div>";
        }
?>