<?php
    @session_start();

    $texto = $_GET['texto'];

    require('connect.php');
        if(!$texto == ""){
            $skins = mysqli_query($con, "Select * from `tb_skins` where `nome` like '%$texto%'");

            echo "<div class = \"box\">";
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
                
        }
?>